<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    
    protected $tabel = 'product_categories';
    public function created_by(){
        return $this->belongsTo('/APP/User', 'created_by');
    }


}
