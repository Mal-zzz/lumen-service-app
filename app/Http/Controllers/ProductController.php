<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // UNTUK MENGAMBIL DATA KESELURUHAN
    public function getProducts($id = null)
    {
        if ($id != null) {

            $products = Product::find($id);

            if (!$products) {
                // abort(404);
                $message = ['message' => 'Data id tidak di temukan', 'product_id' => $id];
                return response()->json($message, 404);
            };

            // UNTUK MENAMPILKAN DATA BERDASARKAN ID ATAU SINGLE RECORD
            return response()->json($products, 200);
        }

        $products = Product::OrderBy("id", "ASC")->paginate(10);

        $output = [
            "message" => "products",
            "result" => $products
        ];

        return response()->json($products, 200);
    }






    // UNTUK MENAMBAH DATA
    public function storeProduct(Request $request)
    {
        $input = $request->all();
        $product = Product::create($input);

        return response()->json($product, 200);
    }




    // UNTUK MENGUBAH DATA
    public function updateProduct(Request $request, $id)
    {
        $inputs = $request->all();

        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $product->fill($inputs);
        $product->save();

        return response()->json($product);
    }




    // UNTUK MENGHAPUS DATA
    public function destroyProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $product->delete();
        $message = ['message' => 'delete successfully', 'product_id' => $id];

        return response()->json($message, 200);
    }
}
