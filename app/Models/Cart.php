<?php

namespace App\Models;

use App\Models\Item;
use App\Models\ItemType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{   
    use HasFactory;

    protected $table = "cart";

    public function item()
    {
        return $this->belongsTo(Item::class, 'product_id');
    }
    
    public function itemType()
    {
        return $this->belongsTo(ItemType::class, 'type_id');
    }
}
