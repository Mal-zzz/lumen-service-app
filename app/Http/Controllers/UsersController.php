<?php

namespace App\Http\Controllers;

class UsersController extends Controller
{

    public function __construct()
    {
        return "Lumen Controller";
    }

    public function index($id = null)
    {
        $users = array(
            array('id' => 1, 'name' => 'Sumatrana', 'email' => 'sumatrana@gmail.com', 'address' => 'Padang', 'gender' => 'Laki-laki'),
            array('id' => 2, 'name' => 'Jawarianto', 'email' => 'jawarianto@gmail.com', 'address' => 'Cimahi', 'gender' => 'Laki-laki'),
            array('id' => 3, 'name' => 'Kalimantano', 'email' => 'kalimantano@gmail.com', 'address' => 'Samarinda', 'gender' => 'Laki-laki'),
            array('id' => 4, 'name' => 'Sulawesiani', 'email' => 'sulawesiani@gmail.com', 'address' => 'Makasar', 'gender' => 'Perempuan'),
            array('id' => 5, 'name' => 'Papuani', 'email' => 'papuani@gmail.com', 'address' => 'Javapura', 'gender' => 'Perempuan'),
        );

        if ($id != null) {
            $filtered = array_filter($users, function ($user) use ($id) {
                return $user['id'] == $id;
            });

            // Mengambil elemen pertama jika ketemu, atau kirim null jika tidak ada
            return !empty($filtered) ? array_values($filtered)[0] : "User tidak ditemukan";
        }

        return $users; // Mengembalikan semua user jika $id null
    }
}
