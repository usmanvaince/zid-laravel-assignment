<?php

namespace App\Models;

use App\Collections\ItemCollections;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function newCollection(array $models = []): ItemCollections
    {
        return new ItemCollections($models);
    }
}
