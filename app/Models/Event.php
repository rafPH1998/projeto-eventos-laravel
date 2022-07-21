<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'city',
        'private',
        'items',
        'image',
        'user_id',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public function getCreatedAtAttribute($value)
    {
      return $this->attributes['created_at'] = Carbon::make($value)->format('d/m/Y');
    }

    //um evento pertence a um usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //um evento pode pertencer a muitos usuarios
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
