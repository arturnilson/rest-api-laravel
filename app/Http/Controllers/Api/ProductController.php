<?php

namespace App\Http\Controllers\Api;

use App\API\ApiError;
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

    public function store(Request $request) // Método salvar
    {
        // dd($request->all());

        try {

            $productData = $request->all();
            $this->product->create($productData);

            $return = ['data' => ['msg' => 'Produto criado com sucesso!']];

            return response()->json($return, 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010));
            }

            return response()->json(ApiError::errorMessage('Erro ao realizar operação', 1010));
        }
    }

    public function update(Request $request, $id) // Método update
    {
        try {

            $productData = $request->all();
            $product     = $this->product->find($id);
            dd($product);
            $product->update($productData);

            $return = ['data' => ['msg' => 'Produto atualizado com sucesso!']];

            return response()->json($return, 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010));
            }

            return response()->json(ApiError::errorMessage('Erro ao realizar operação', 1010));
        }
    }

    // TODO update não funcionou... video: 1:08
}
