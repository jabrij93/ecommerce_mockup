<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\ItemType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "items";

    protected $guarded = [];

    public function itemType()
    {
        return $this->belongsTo(ItemType::class, 'type_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'product_id', 'product_id');
    }
}
