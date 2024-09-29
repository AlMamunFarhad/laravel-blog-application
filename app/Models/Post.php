<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
// use App\Models\Comment;
class Post extends Model
{
    use HasFactory;

    public function comments() : hasMany {

    return $this->hasMany(Comment::class);

    }

    public function user() : belongsTo {
        return $this->belongsTo(User::class);
    }

    public function slug(): Attribute {

    return Attribute::make(
    get: fn (string $value) => $value,
    set: fn (string $value) => Str::slug($this->title)

    );

    }

    // public function getRouteKeyName(){
    //     return 'slug';
    // }
}
