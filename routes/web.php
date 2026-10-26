<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// $router->get('/', function () {
//     return "<h1>Welcome</h1> <p>Selamat datang di Lumen Service App</p>";
// });

// $router->get('/hello-lumen', function () {
//     return "<h1>Hello Lumen</h1> <p>Hi, Welcome to Lumen Service App</p>";
// });

// $router->get('/hello-lumen/{name}', function ($name) {
//     return "<h1>Hello Lumen</h1> <p>Hi " . $name . ", Welcome to Lumen Service App</p>";
// });

// $router->get('/scores', ['middleware' => 'login', function () {
//     return "<h1>Selamat</h1> <p>Nilai anda 100</p>";
// }]);



// $router->get('/users', 'UsersController@index'); //jika tidak ada parameter id, maka akan mengembalikan semua user

// $router->get('/users/{id}', 'UsersController@index'); // jika ada parameter id, maka akan mengembalikan user dengan id tersebut, jika tidak ada maka akan mengembalikan "User tidak ditemukan"

// Untuk Latihan Post
$router->get('/posts', 'PostsController@getposts');
$router->get('/posts/{id}', 'PostsController@getposts');
$router->post('/posts', 'PostsController@storePost');
$router->put('/posts/{id}', 'PostsController@updatePost');
$router->delete('/posts/{id}', 'PostsController@destroyPost');


$router->get('/all-data', 'AlldataController@getAllData');


// Route untuk melihat semua data sekaligus
$router->get('/all-data', 'AllDataController@getAllData');

// 1. Users
$router->get('/users', 'UserController@getUsers');
$router->get('/users/{id}', 'UserController@getUsers');
$router->post('/users', 'UserController@storeUser');
$router->put('/users/{id}', 'UserController@updateUser');
$router->delete('/users/{id}', 'UserController@destroyUser');

// 2. Products
$router->get('/products', 'ProductController@getProducts');
$router->get('/products/{id}', 'ProductController@getProducts');
$router->post('/products', 'ProductController@storeProduct');
$router->put('/products/{id}', 'ProductController@updateProduct');
$router->delete('/products/{id}', 'ProductController@destroyProduct');

// 3. Stocks
$router->get('/stocks', 'StockController@getStocks');
$router->get('/stocks/{id}', 'StockController@getStocks');
$router->post('/stocks', 'StockController@storeStock');
$router->put('/stocks/{id}', 'StockController@updateStock');
$router->delete('/stocks/{id}', 'StockController@destroyStock');

// 4. Students
$router->get('/students', 'StudentController@getStudents');
$router->get('/students/{id}', 'StudentController@getStudents');
$router->post('/students', 'StudentController@storeStudent');
$router->put('/students/{id}', 'StudentController@updateStudent');
$router->delete('/students/{id}', 'StudentController@destroyStudent');

// 5. Teachers
$router->get('/teachers', 'TeacherController@getTeachers');
$router->get('/teachers/{id}', 'TeacherController@getTeachers');
$router->post('/teachers', 'TeacherController@storeTeacher');
$router->put('/teachers/{id}', 'TeacherController@updateTeacher');
$router->delete('/teachers/{id}', 'TeacherController@destroyTeacher');

// 6. Buku
$router->get('/buku', 'BukuController@getBuku');
$router->get('/buku/{id}', 'BukuController@getBuku');
$router->post('/buku', 'BukuController@storeBuku');
$router->put('/buku/{id}', 'BukuController@updateBuku');
$router->delete('/buku/{id}', 'BukuController@destroyBuku');

// 7. Perpustakaan
$router->get('/perpustakaan', 'PerpustakaanController@getPerpustakaan');
$router->get('/perpustakaan/{id}', 'PerpustakaanController@getPerpustakaan');
$router->post('/perpustakaan', 'PerpustakaanController@storePerpustakaan');
$router->put('/perpustakaan/{id}', 'PerpustakaanController@updatePerpustakaan');
$router->delete('/perpustakaan/{id}', 'PerpustakaanController@destroyPerpustakaan');    