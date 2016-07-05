<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
    protected $fillable = ['id','tipopago', 'monto', 'user_fk', 'fechaexpira', 'created_at'];


public function user()
{
    return $this->belongsTo('App\User','user_fk');
}




}