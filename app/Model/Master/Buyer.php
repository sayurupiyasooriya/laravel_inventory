<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $tabel = 'buyers';
    public function modified_by(){
        return $this->belongsTo('/APP/User', 'modified_by');
    }
}
