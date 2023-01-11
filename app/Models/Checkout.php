<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Checkout extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    //relasi one to one ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //relasi one to one ke destinasi
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
