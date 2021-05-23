<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $primaryKey = 'codigo';
    protected $table = 'categorias';
    public $dates = ['created_at','updated_at'];
    public $timestamps = true;
    protected $fillable = [
        'nome'
    ];

    public function pessoa(){
        return $this->belongsToMany(Pessoa::class);
    }
}
