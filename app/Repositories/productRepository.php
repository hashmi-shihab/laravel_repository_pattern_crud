<?php

namespace App\Repositories;
use App\Models\Product;
use App\Repositories\Interfaces\productRepositoryInterface;

class productRepository implements productRepositoryInterface{

    public function all()
    {
        return Product::latest()->simplePaginate(5);
    }

    public function create(array $attributes)
    {
        Product::create($attributes);
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function update($id, array $attributes)
    {
        $this->show($id)->update($attributes);
    }

    public function delete($id)
    {
        $this->show($id)->delete($id);
    }
}
