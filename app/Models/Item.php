<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'items';

    protected $fillable = [
        "name",
        "description",
        "price",
        "quantity",
        "category_id"
    ];

    public function category()
    {
        return $this->hasMany(Category::class, '_id', 'category_id');
    }
}
