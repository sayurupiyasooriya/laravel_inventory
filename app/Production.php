<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $tabel = 'productions';
    public function created_by(){
        return $this->belongsTo('/APP/User', 'created_by');
    }

    public function supplier_id(){
        return $this->belongsTo('/APP/Model/Master/Buyer', 'supplier_id');
    }

    public function product_category_id(){
        return $this->belongsTo('/APP/Model/Master/ProductCategory', 'product_category_id');
    }

}
