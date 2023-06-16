<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public static function buscaDocumento($id) {
        return self::find($id);
    }

    protected $fillable = [
        'name',
        'user_id',
        'text'
    ];
}
