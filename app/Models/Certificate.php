<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'issuer',
        'date_awarded',
        'description',
        'image',
    ];

    
    protected $casts = [
        'date_awarded' => 'date',
    ];

    
    public function getFormattedDateAttribute()
    {
        return $this->date_awarded->format('M j, Y');
    }
}
