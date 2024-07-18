<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Director;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Rating;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function getAllMovies()
    {
        $movies = Movie::with('director', 'actors', 'genres')->get();
        return response()->json($movies);
    }

    public function getMovieById($id)
    {
        $movie = Movie::with('director', 'actors', 'genres')->find($id);
        if (!$movie) {
            return response()->json(['error' => 'Movie not found'], 404);
        }
        return response()->json($movie);
    }

    public function getDirectorById($id)
    {
        $director = Director::with('movies')->find($id);
        if (!$director) {
            return response()->json(['error' => 'Director not found'], 404);
        }
        return response()->json($director);
    }

    public function getActorById($id)
    {
        $actor = Actor::with('movies')->find($id);
        if (!$actor) {
            return response()->json(['error' => 'Actor not found'], 404);
        }
        return response()->json($actor);
    }

    public function getMoviesWithGenres()
    {
        $movies = Movie::with('genres')->get();
        return response()->json($movies);
    }

    public function getMoviesWithRatings()
    {
        $movies = Movie::with('ratings.rater')->get();
        return response()->json($movies);
    }
}

