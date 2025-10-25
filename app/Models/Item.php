<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "tbl_items";
    protected $fillable = ["sku", "brand", "year", "capacity", "price_FOB", "price_CIF", "category_id"];

    public function category(){
        return $this->belongsTo(Category::class, "category_id");
    }

}
