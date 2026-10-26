<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\AcceptHeader;

class PostsController extends Controller
{
    /**
     * MENAMPILKAN DATA (Bisa semua data dengan pagination, atau detail berdasarkan ID)
     */
    public function getPosts(Request $request, $id = null)
    {
        // Ambil nilai header 'Accept'
        $acceptHeader = $request->header('Accept');

        // Validasi: Client wajib meminta format application/json atau application/xml
        if ($acceptHeader === 'application/json' || $acceptHeader === 'application/xml') {

            // 1. KONDISI JIKA $id DIISI (Mencari 1 data spesifik)
            if ($id != null) {
                $post = Post::find($id);

                // Jika data tidak ditemukan, kembalikan error 404
                if (!$post) {
                    abort(404, 'Post not found');
                }

                // Kembalikan JSON jika diminta JSON
                if ($acceptHeader === 'application/json') {
                    return response()->json($post, 200);
                }

                // Kembalikan XML tunggal jika diminta XML
                else {
                    $xml = new \SimpleXMLElement('<post/>');

                    $xml->addChild('id', $post->id);
                    $xml->addChild('title', $post->title);
                    $xml->addChild('status', $post->status);
                    $xml->addChild('content', $post->content);
                    $xml->addChild('user_id', $post->user_id);
                    $xml->addChild('created_at', $post->created_at);
                    $xml->addChild('updated_at', $post->updated_at ?? '');

                    return response($xml->asXml(), 200)->header('Content-Type', 'application/xml');
                }
            }

            // 2. KONDISI JIKA $id KOSONG (Menampilkan semua data dengan Pagination)
            $posts = Post::orderBy("id", "DESC")->paginate(10);

            // Jika format yang diminta adalah JSON
            if ($acceptHeader === 'application/json') {
                return response()->json($posts, 200);
            }

            // Jika format yang diminta adalah XML (Banyak data / list)
            else {
                $xml = new \SimpleXMLElement('<posts/>');

                foreach ($posts->items() as $item) {
                    $xmlItem = $xml->addChild('post');

                    $xmlItem->addChild('id', $item->id);
                    $xmlItem->addChild('title', $item->title);
                    $xmlItem->addChild('status', $item->status);
                    $xmlItem->addChild('content', $item->content);
                    $xmlItem->addChild('user_id', $item->user_id);
                    $xmlItem->addChild('created_at', $item->created_at);
                    $xmlItem->addChild('updated_at', $item->updated_at ?? '');
                }

                return response($xml->asXml(), 200)->header('Content-Type', 'application/xml');
            }
        } else {
            return response()->json(['message' => 'Not Acceptable!'], 406);
        }
    }
    

    /**
     * MENAMBAH DATA BARU
     */
    public function storePost(Request $request)
    {
        $acceptHeader = $request->header('Accept');

        // Validasi header Accept: Hanya mengizinkan JSON atau XML
        if ($acceptHeader === 'application/json' || $acceptHeader === 'application/xml') {

            $contentTypeHeader = $request->header('Content-Type');

            // Validasi header Content-Type: Body request yang dikirim client wajib berupa application/json
            if ($contentTypeHeader === 'application/json') {
                $input = $request->all();

                // Menyimpan data baru ke database menggunakan Eloquent Model
                $post = Post::create($input);

                return response()->json($post, 201); // Status 201 Created lebih ideal untuk penambahan data
            } else {
                // Jika body bukan JSON, kembalikan status 415 Unsupported Media Type
                return response()->json(['message' => 'Unsupported Media Type'], 415);
            }
        } else {
            return response()->json(['message' => 'Not Acceptable!'], 406);
        }
    }

    /**
     * MENGUBAH DATA BERDASARKAN ID
     */
    public function updatePost(Request $request, $id)
    {
        $acceptHeader = $request->header('Accept');

        // Validasi header Accept
        if ($acceptHeader === 'application/json' || $acceptHeader === 'application/xml') {

            $contentTypeHeader = $request->header('Content-Type');

            // Validasi Content-Type body request harus JSON
            if ($contentTypeHeader === 'application/json') {
                $inputs = $request->all();
                $posts = Post::find($id);

                // Cek apakah data yang mau diubah ada
                if (!$posts) {
                    abort(404, 'Post not found');
                }

                // Melakukan update data
                $posts->fill($inputs);
                $posts->save();

                return response()->json($posts, 200);
            } else {
                return response()->json(['message' => 'Unsupported Media Type'], 415);
            }
        } else {
            return response()->json(['message' => 'Not Acceptable!'], 406);
        }
    }

    /**
     * MENGHAPUS DATA BERDASARKAN ID
     */
    public function destroyPost(Request $request, $id)
    {
        $acceptHeader = $request->header('Accept');

        // Validasi header Accept ditambahkan agar konsisten
        if ($acceptHeader === 'application/json' || $acceptHeader === 'application/xml') {

            $posts = Post::find($id);

            // Cek apakah data yang akan dihapus tersedia
            if (!$posts) {
                abort(404, 'Post not found');
            }

            // Eksekusi hapus data
            $posts->delete();
            $message = ['message' => 'delete successfully', 'post_id' => $id];

            return response()->json($message, 200);
        } else {
            return response()->json(['message' => 'Not Acceptable!'], 406);
        }
    }
}
