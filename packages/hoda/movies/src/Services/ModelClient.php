<?php


namespace Hoda\Movies\Services;

use Hoda\Movies\Contracts\RepositoryInterface;

class ModelClient
{
    public function seed(RepositoryInterface $repository)
    {
        $repository->sync();
    }
}
