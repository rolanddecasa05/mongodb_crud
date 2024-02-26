<?php

namespace App\M_Repositories;

use Illuminate\Database\Eloquent\Model;

class EloquentRepository {

    public function __construct(public Model $model) {}

    public function create($data) {
        return $this->model::create($data);
    }

    public function update($attr, $id) {
        return $this->model::findOrFail($id)->update($attr);
    }

    public function delete($id) {
        return $this->model::findOrFail($id)->delete();
    }

    public function get($id) {
        return $this->model::find($id);
    }

    public function getAll($attr) {
        $query = $this->model->query();

        if(array_key_exists('name', $attr)) {
            $query->where('name', 'LIKE', '%'.$attr['name'].'%');
        }

        if(array_key_exists('description', $attr)) {
            $query->where('description', 'LIKE', '%'.$attr['description'].'%');
        }
        
        return $query->paginate(array_key_exists('paginate', $attr) ? $attr['paginate'] : 10);
    }
}