<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{


    protected $table = 'gastos';
    protected $fillable = ['id', 'monto', 'user_fk', 'descripcion', 'created_at'];


    public function user()
    {
        return $this->belongsTo('App\User','user_fk');
    }





}
