<?php

namespace  Hoda\Movies\Repositories;

use Hoda\Movies\Models\Movie;
use Hoda\Movies\Contracts\RepositoryInterface;

class MovieRepository extends Repository implements RepositoryInterface
{
    /**
     * @return array
     */
    public function getAllData(): array
    {
        $page_num = config('movie.record_number');
        $pages_count = ceil($page_num/20);
        $movies =[];

        for ($i=1; $i<=$pages_count; $i++) {
            $movies = array_merge($movies, $this->fetch('movie/top_rated', $i)->results);
        }
        return $movies;
    }

    public function sync()
    {
        $data = $this->getAllData();

        foreach ($data as $row) {
            $movie= Movie::updateOrCreate(
                ['third_party_id' =>$row->id],
                [
                    'adult'=>$row->adult,
                    'backdrop_path' =>$row->backdrop_path,
                    'poster_path' => $row->poster_path,
                    'title' => $row->title,
                    'third_party_id' =>  $row->id,
                    'popularity' => $row->popularity,
                    'release_date' => $row->release_date,
                    'vote_average' => $row->vote_average,
                    'vote_count'=>$row->vote_count
                ]
            );
            $movie->categories()->sync($row->genre_ids);
        }
    }
}
