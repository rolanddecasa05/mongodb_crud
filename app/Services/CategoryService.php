<?php

namespace App\Services;

use App\M_Repositories\EloquentRepository;
use App\Models\Category;

class CategoryService extends EloquentRepository {
    public function __construct(public Category $category) {
        parent::__construct($this->category);
    }
}
