<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllDataController extends Controller
{
    // ==========================================
    // GET METHODS (Ambil Data)
    // ==========================================

    public function getAllData()
    {
        $data = [
            'users'    => DB::table('users')->get(),
            'products' => DB::table('products')->get(),
            'stocks'   => DB::table('stocks')->get(),
            'students' => DB::table('students')->get(),
            'teachers' => DB::table('teachers')->get(),
        ];

        return response()->json([
            'message' => 'success',
            'results' => $data
        ], 200);
    }

    // public function getUsers($id = null)
    // {
    //     if ($id != null) {
    //         $data = DB::table('users')->where('id', $id)->first();
    //         if (!$data) {
    //             return response()->json(['message' => 'Data user tidak ditemukan'], 404);
    //         }
    //         return response()->json($data, 200);
    //     }
    //     return response()->json(DB::table('users')->get(), 200);
    // }

    // public function getProducts($id = null)
    // {
    //     if ($id != null) {
    //         $data = DB::table('products')->where('id', $id)->first();
    //         if (!$data) {
    //             return response()->json(['message' => 'Data product tidak ditemukan'], 404);
    //         }
    //         return response()->json($data, 200);
    //     }
    //     return response()->json(DB::table('products')->get(), 200);
    // }

    // public function getStocks($id = null)
    // {
    //     if ($id != null) {
    //         $data = DB::table('stocks')->where('id', $id)->first();
    //         if (!$data) {
    //             return response()->json(['message' => 'Data stock tidak ditemukan'], 404);
    //         }
    //         return response()->json($data, 200);
    //     }
    //     return response()->json(DB::table('stocks')->get(), 200);
    // }

    // public function getStudents($id = null)
    // {
    //     if ($id != null) {
    //         $data = DB::table('students')->where('id', $id)->first();
    //         if (!$data) {
    //             return response()->json(['message' => 'Data student tidak ditemukan'], 404);
    //         }
    //         return response()->json($data, 200);
    //     }
    //     return response()->json(DB::table('students')->get(), 200);
    // }

    // public function getTeachers($id = null)
    // {
    //     if ($id != null) {
    //         $data = DB::table('teachers')->where('id', $id)->first();
    //         if (!$data) {
    //             return response()->json(['message' => 'Data teacher tidak ditemukan'], 404);
    //         }
    //         return response()->json($data, 200);
    //     }
    //     return response()->json(DB::table('teachers')->get(), 200);
    // }


    // // ==========================================
    // // POST METHODS (Tambah Data Baru)
    // // ==========================================

    // public function storeUser(Request $request)
    // {
    //     DB::table('users')->insert([
    //         'name'       => $request->name,
    //         'email'      => $request->email,
    //         'created_at' => date('Y-m-d H:i:s'),
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);

    //     return response()->json(['message' => 'Data user berhasil ditambahkan'], 201);
    // }

    // public function storeProduct(Request $request)
    // {
    //     DB::table('products')->insert([
    //         'name'       => $request->name,
    //         'price'      => $request->price,
    //         'created_at' => date('Y-m-d H:i:s'),
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);

    //     return response()->json(['message' => 'Data product berhasil ditambahkan'], 201);
    // }

    // public function storeStock(Request $request)
    // {
    //     DB::table('stocks')->insert([
    //         'product_id' => $request->product_id,
    //         'quantity'   => $request->quantity,
    //         'created_at' => date('Y-m-d H:i:s'),
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);

    //     return response()->json(['message' => 'Data stock berhasil ditambahkan'], 201);
    // }

    // public function storeStudent(Request $request)
    // {
    //     DB::table('students')->insert([
    //         'name'       => $request->name,
    //         'nis'        => $request->nis,
    //         'created_at' => date('Y-m-d H:i:s'),
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);

    //     return response()->json(['message' => 'Data student berhasil ditambahkan'], 201);
    // }

    // public function storeTeacher(Request $request)
    // {
    //     DB::table('teachers')->insert([
    //         'name'       => $request->name,
    //         'nip'        => $request->nip,
    //         'created_at' => date('Y-m-d H:i:s'),
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);

    //     return response()->json(['message' => 'Data teacher berhasil ditambahkan'], 201);
    // }


    // // ==========================================
    // // PUT METHODS (Update Data Berdasarkan ID)
    // // ==========================================

    // public function updateUser(Request $request, $id)
    // {
    //     $exists = DB::table('users')->where('id', $id)->exists();
    //     if (!$exists) {
    //         return response()->json(['message' => 'Data user tidak ditemukan'], 404);
    //     }

    //     DB::table('users')->where('id', $id)->update([
    //         'name'       => $request->name,
    //         'email'      => $request->email,
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);

    //     return response()->json(['message' => 'Data user berhasil diperbarui'], 200);
    // }

    // public function updateProduct(Request $request, $id)
    // {
    //     $exists = DB::table('products')->where('id', $id)->exists();
    //     if (!$exists) {
    //         return response()->json(['message' => 'Data product tidak ditemukan'], 404);
    //     }

    //     DB::table('products')->where('id', $id)->update([
    //         'name'       => $request->name,
    //         'price'      => $request->price,
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);

    //     return response()->json(['message' => 'Data product berhasil diperbarui'], 200);
    // }

    // public function updateStock(Request $request, $id)
    // {
    //     $exists = DB::table('stocks')->where('id', $id)->exists();
    //     if (!$exists) {
    //         return response()->json(['message' => 'Data stock tidak ditemukan'], 404);
    //     }

    //     DB::table('stocks')->where('id', $id)->update([
    //         'product_id' => $request->product_id,
    //         'quantity'   => $request->quantity,
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);

    //     return response()->json(['message' => 'Data stock berhasil diperbarui'], 200);
    // }

    // public function updateStudent(Request $request, $id)
    // {
    //     $exists = DB::table('students')->where('id', $id)->exists();
    //     if (!$exists) {
    //         return response()->json(['message' => 'Data student tidak ditemukan'], 404);
    //     }

    //     DB::table('students')->where('id', $id)->update([
    //         'name'       => $request->name,
    //         'nis'        => $request->nis,
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);

    //     return response()->json(['message' => 'Data student berhasil diperbarui'], 200);
    // }

    // public function updateTeacher(Request $request, $id)
    // {
    //     $exists = DB::table('teachers')->where('id', $id)->exists();
    //     if (!$exists) {
    //         return response()->json(['message' => 'Data teacher tidak ditemukan'], 404);
    //     }

    //     DB::table('teachers')->where('id', $id)->update([
    //         'name'       => $request->name,
    //         'nip'        => $request->nip,
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);

    //     return response()->json(['message' => 'Data teacher berhasil diperbarui'], 200);
    // }
}