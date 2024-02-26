<?php

namespace App\Services;

use App\M_Repositories\EloquentRepository;
use App\Models\Item;

class ItemService extends EloquentRepository {
    public function __construct(public Item $item) {
        parent::__construct($this->item);
    }

    public function getLookup() {
        return $this->item::with('category')->get();
    }
}
