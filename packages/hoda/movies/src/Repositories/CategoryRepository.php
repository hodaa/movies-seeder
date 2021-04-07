<?php

namespace  Hoda\Movies\Repositories;

use Hoda\Movies\Models\Category;
use Hoda\Movies\Contracts\RepositoryInterface;

class CategoryRepository extends Repository implements RepositoryInterface
{
    public function sync()
    {
        $data = $this->fetch('genre/movie/list')->genres;

        foreach ($data as $row) {
            Category::updateOrCreate(
                ['third_party_category_id' => $row->id],
                ['name' => $row->name,'third_party_category_id'=>$row->id]
            );
        }
    }
}
