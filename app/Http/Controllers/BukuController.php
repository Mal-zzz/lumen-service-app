<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // UNTUK MENGAMBIL DATA KESELURUHAN / BY ID
    public function getBuku($id = null)
    {
        if ($id != null) {
            $buku = Buku::find($id);

            if (!$buku) {
                abort(404);
            }

            return response()->json($buku, 200);
        }

        $buku = Buku::orderBy("id", "ASC")->paginate(10);

        return response()->json($buku, 200);
    }

    // UNTUK MENAMBAH DATA
    public function storeBuku(Request $request)
    {
        $input = $request->all();
        $buku = Buku::create($input);

        return response()->json($buku, 200);
    }

    // UNTUK MENGUBAH DATA
    public function updateBuku(Request $request, $id)
    {
        $inputs = $request->all();
        $buku = Buku::find($id);

        if (!$buku) {
            abort(404);
        }

        $buku->fill($inputs);
        $buku->save();

        return response()->json($buku);
    }

    // UNTUK MENGHAPUS DATA
    public function destroyBuku($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            abort(404);
        }

        $buku->delete();
        $message = ['message' => 'delete successfully', 'buku_id' => $id];

        return response()->json($message, 200);
    }
}
