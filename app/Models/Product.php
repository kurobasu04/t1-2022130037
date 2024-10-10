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

    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $latest = Product::latest('id')->first();
                $nextId = $latest ? ((int)substr($latest->id, -4) + 1) : 1;
                $model->id = 'PR' . date('ymd') . str_pad($nextId, 4, '0', STR_PAD_LEFT);

                $model->updated_at = null;
            }
        });
    }

    protected $appends = [
        'avatar_url',
    ];

    public function getAvatarUrlAttribute()
    {
        if (filter_var($this->product_image, FILTER_VALIDATE_URL)) {
            return $this->product_image;
        }

        return $this->product_image ? Storage::url($this->product_image) : null;
    }
}
