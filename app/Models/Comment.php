<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'comment',
        
    ];
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
