<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $tabel = 'buyers';
    public function modified_by(){
        return $this->belongsTo('/APP/User', 'modified_by');
    }

    public function product_category_id(){
        return $this->belongsTo('/APP/Model/Master/ProductionCategory', 'product_category_id');
    }

    public function supplier_id(){
        return $this->belongsTo('/APP/Model/Master/ProductionCategory', 'supplier_id');
    }
}
