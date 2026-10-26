<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    // UNTUK MENGAMBIL DATA KESELURUHAN / BY ID
    public function getPerpustakaan($id = null)
    {
        if ($id != null) {
            $perpustakaan = Perpustakaan::find($id);

            if (!$perpustakaan) {
                abort(404);
            }

            return response()->json($perpustakaan, 200);
        }

        $perpustakaan = Perpustakaan::orderBy("id", "ASC")->paginate(10);

        return response()->json($perpustakaan, 200);
    }

    // UNTUK MENAMBAH DATA
    public function storePerpustakaan(Request $request)
    {
        $input = $request->all();
        $perpustakaan = Perpustakaan::create($input);

        return response()->json($perpustakaan, 200);
    }

    // UNTUK MENGUBAH DATA
    public function updatePerpustakaan(Request $request, $id)
    {
        $inputs = $request->all();
        $perpustakaan = Perpustakaan::find($id);

        if (!$perpustakaan) {
            abort(404);
        }

        $perpustakaan->fill($inputs);
        $perpustakaan->save();

        return response()->json($perpustakaan);
    }

    // UNTUK MENGHAPUS DATA
    public function destroyPerpustakaan($id)
    {
        $perpustakaan = Perpustakaan::find($id);

        if (!$perpustakaan) {
            abort(404);
        }

        $perpustakaan->delete();
        $message = ['message' => 'delete successfully', 'perpustakaan_id' => $id];

        return response()->json($message, 200);
    }
}
