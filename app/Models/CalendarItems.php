<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarItems extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'news_article_id',
        'slug',
        'title',
        'description',
        'start_at',
    ];

    public function newsarticle() :BelongsTo
    {
        return $this->belongsTo(NewsArticles::class, 'news_article_id', 'id');
    }
}
