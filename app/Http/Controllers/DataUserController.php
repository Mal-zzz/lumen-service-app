<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // UNTUK MENGAMBIL DATA KESELURUHAN / BY ID
    public function getUsers($id = null)
    {
        if ($id != null) {
            $user = User::find($id);

            if (!$user) {
                abort(404);
            }

            return response()->json($user, 200);
        }

        $users = User::orderBy("id", "ASC")->paginate(10);

        return response()->json($users, 200);
    }

    // UNTUK MENAMBAH DATA
    public function storeUser(Request $request)
    {
        $input = $request->all();

        // Opsional: Jika password ingin di-hash otomatis saat disimpan
        if (isset($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        }

        $user = User::create($input);

        return response()->json($user, 200);
    }

    // UNTUK MENGUBAH DATA
    public function updateUser(Request $request, $id)
    {
        $inputs = $request->all();
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        // Opsional: Hash ulang password jika ikut diubah
        if (isset($inputs['password'])) {
            $inputs['password'] = Hash::make($inputs['password']);
        }

        $user->fill($inputs);
        $user->save();

        return response()->json($user);
    }

    // UNTUK MENGHAPUS DATA
    public function destroyUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        $user->delete();
        $message = ['message' => 'delete successfully', 'user_id' => $id];

        return response()->json($message, 200);
    }
}
