<?php

namespace Hoda\Movies\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable =['adult','backdrop_path','third_party_id','popularity','poster_path','release_date','title',
        'vote_average','vote_count'];

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'movie_category', 'movie_id', 'category_id', 'third_party_id','third_party_category_id');
    }
}
