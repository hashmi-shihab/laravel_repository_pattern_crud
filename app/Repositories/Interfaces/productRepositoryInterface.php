<?php

namespace App\Repositories\Interfaces;

Interface productRepositoryInterface{
    public function all();
    public function create(array $attributes);
    public function show($id);
    public function update($id,array $attributes);
    public function delete($id);
}
