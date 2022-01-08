<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];     //properties in the database that cannot be assigned manually

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=>     //virsrakstu filtrs
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, int $category)=>  //kategoriju filtrs
            $query->whereHas('category', fn($query) =>
                $query->where('id', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author)=>  //autoru filtrs
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function category()      //post realation to categories
    {
        return $this->belongsTo(Category::class);
    }

    public function author()        //post realation to author(user)
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
