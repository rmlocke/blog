<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['post_id', 'author', 'content', 'parent'];

    /**
     * Post for comment
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
