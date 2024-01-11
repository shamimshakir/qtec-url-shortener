<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UrlShortener extends Model
{
    use HasFactory;

    protected $table = "urls";
    protected $fillable = [
        'user_id',
        'title',
        'long_url',
        'short_url',
        'visit_count'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
