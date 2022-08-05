<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded=[];
    //belongs to item
    public function item(){
        return $this->belongsTo('App\Item');
    }
}
