<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //jadi variabel id tidak dapat diisi
    protected $guarded = ["id"];
    public function category()
    {
        return $this->hasMany(Destination::class);
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
