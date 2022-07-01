<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome','endereco','numero','cidade','uf'];

    public function departamento() {
        return $this->hasMany(Departamento::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($cliente) {
            $cliente->departamento()->delete();
        });
    }
}
