<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $primaryKey = 'codigo';
    protected $table = 'pessoas';
    public $dates = ['created_at','updated_at'];
    public $timestamps = true;
    protected $fillable = [
        'nome',
        'email',
        'categoria_codigo'
    ];

    public function categoria(){
        return $this->hasOne(Categoria::class,'codigo','categoria_codigo');
    }
}
