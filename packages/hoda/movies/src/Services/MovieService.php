<?php

namespace  Hoda\Movies\Services;

use Illuminate\Database\Eloquent\Builder;

class MovieService
{
    private $mappings = [
        'popular' => 'popularity',
        'rated'=> 'vote_count'
    ];
    /**
     * @param $filters
     * @return mixed
     */
    public function orderByFilters(Builder $query, array  $filters)
    {
        if (isset($filters)) {
            foreach ($filters as $key=>$filter) {
                if (\Str::contains($key, '|')) {
                    $parts = explode('|', $key);
                    $query->orderBy($this->mappings[$parts[0]], $parts[1]);
                }
            }
        }
        return $query;
    }

    /**
     * @param $query
     * @param $category_id
     * @return mixed
     */
    public function getMoviesByCategoryId(Builder $query, int $category_id)
    {
        return $query->whereHas('categories', function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        });
    }
}
