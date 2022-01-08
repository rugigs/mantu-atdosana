<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;


    protected $guarded = [];

    //atgriez vērtētāju
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    //atgriez novērtēto lietotāju
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
