<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'product_name',
        'description',
        'retail_price',
        'wholesale_price',
        'origin',
        'quantity',
        'product_image',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                // ID dari kombinasi tanggal dan nomor urut
                $latest = Product::latest('id')->first();
                $nextId = $latest ? ((int)substr($latest->id, -3) + 1) : 1;
                $model->id = 'PR' . date('Ymd') . str_pad($nextId, 1, '0', STR_PAD_LEFT);
            }
        });
    }

    protected $append = [
        'avatar_url',
    ];

    public function getAvatarUrlAttribute() {
        if (filter_var($this->product_image, FILTER_VALIDATE_URL)) {
            return $this->product_image;
        }

        return $this->product_image ? Storage::url($this->product_image) : null;
    }
}
