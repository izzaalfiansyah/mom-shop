<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public $table = 'produk';

    public $fillable = [
        'nama',
        'foto',
        'stok',
        'harga',
    ];

    public $appends = [
        'fotoUrl',
    ];

    public function getFotoUrlAttribute()
    {
        return asset($this::fotoPath . $this->foto);
    }

    const fotoPath = 'assets/produk/';

    public static function rules()
    {
        return [
            'nama' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'foto' => [
                'nullable', function ($attr, $val, $fail) {
                    if (!str_contains($val, ';base64,')) {
                        return $fail("The $attr not valid.");
                    }
                }
            ],
        ];
    }
}
