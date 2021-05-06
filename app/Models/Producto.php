<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'idProducto';
    public $timestamps = false;

    public function relMarca(){
        return $this->belongsTo('\App\Models\Marca','idMarca','idMarca');
    }
    public function relCategoria(){
        return $this->belongsTo('\App\Models\Categoria','idCategoria','idCategoria');
    }
}
