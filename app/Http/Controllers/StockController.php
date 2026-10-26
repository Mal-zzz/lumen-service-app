<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // UNTUK MENGAMBIL DATA KESELURUHAN / BY ID
    public function getStocks($id = null)
    {
        if ($id != null) {
            $stock = Stock::find($id);

            if (!$stock) {
                abort(404);
            }

            return response()->json($stock, 200);
        }

        $stocks = Stock::orderBy("id", "ASC")->paginate(10);

        return response()->json($stocks, 200);
    }

    // UNTUK MENAMBAH DATA
    public function storeStock(Request $request)
    {
        $input = $request->all();
        $stock = Stock::create($input);

        return response()->json($stock, 200);
    }

    // UNTUK MENGUBAH DATA
    public function updateStock(Request $request, $id)
    {
        $inputs = $request->all();
        $stock = Stock::find($id);

        if (!$stock) {
            abort(404);
        }

        $stock->fill($inputs);
        $stock->save();

        return response()->json($stock);
    }

    // UNTUK MENGHAPUS DATA
    public function destroyStock($id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            abort(404);
        }

        $stock->delete();
        $message = ['message' => 'delete successfully', 'stock_id' => $id];

        return response()->json($message, 200);
    }
}
