<?php

namespace Hoda\Movies\Controllers;

use App\Http\Controllers\Controller;
use Hoda\Movies\Models\Movie;
use Hoda\Movies\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index(Request $request)
    {
        $filters= $request->all();
        $query = Movie::query();

        if (isset($filters['category_id']) && $filters['category_id']) {
            $query= $this->movieService->getMoviesByCategoryId($query, $filters['category_id']);
        }
        $query = $this->movieService->orderByFilters($query, $filters);

        return response()->json($query->paginate(20));
    }
}
