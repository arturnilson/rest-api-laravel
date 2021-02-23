<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        // $data = ['data' => $this->product->all()];
        // Para trazer todos os registros, paginate já contem a paginação e a data
        // Utilizar api/products?page=2 para acessar demais páginas

        return response()->json($this->product->paginate(5));
    }

    public function show(Product $id)
    {
        $data = ['data' => $id];

        return response()->json($data);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
