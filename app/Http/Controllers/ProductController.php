<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\productRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;
    public function __construct(productRepositoryInterface $productRepository)
    {
        $this->productRepository= $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();
        return view('products.index',compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $this->productRepository->create($request->all());

        return redirect()->route('products.index')
            ->with('success','Product created successfully.');
    }

    public function show($id)
    {
        $product = $this->productRepository->show($id);
        return view('products.show',compact('product'));
    }


    public function edit($id)
    {
        $product = $this->productRepository->show($id);
        return view('products.edit',compact('product'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $this->productRepository->update($id,$request->all());

        return redirect()->route('products.index')
            ->with('success','Product updated successfully');
    }


    public function destroy($id)
    {
        $this->productRepository->delete($id);

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    }
}
