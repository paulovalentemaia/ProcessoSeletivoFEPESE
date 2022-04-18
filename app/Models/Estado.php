<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';
    protected $primaryKey = 'estado_id';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'sigla'
    ];

    public static function createEstado(Estado $estado){
        return $estado->save();
    }

    public static function updateEstado(Estado $estado){
        return $estado->update();
    }

    public static function loadEstadoById($id){
        return Estado::find($id)->first();
    }

    public static function deleteEstado(Estado $estado){
        $estado = self::loadEstadoById($estado);
        return $estado->delete();
    }
}
