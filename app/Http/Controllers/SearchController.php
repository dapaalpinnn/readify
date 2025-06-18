<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function welcome(Request $request)
    {
        $search = trim($request->query('search', ''));

        $articles = Article::query()
            ->when($search, fn($query, $search) => $query->where(
                fn($subQuery) => $subQuery
                    ->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('content', 'LIKE', "%{$search}%")
            ))
            ->with(['category', 'author.user'])
            ->orderBy('created_at', 'desc')
            ->paginate(9)
            ->appends(['search' => $search]);

        return view('welcome', compact('articles', 'search'));
    }


    public function dashboard(Request $request)
    {
        $search = trim($request->query('search', ''));

        $articles = Article::query()
            ->when(Auth::check() && Auth::user()->role->name === 'writer', function ($query) {
                return $query->where('author_id', Auth::user()->author->id);
            })
            ->when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('content', 'LIKE', "%{$search}%");
            })
            ->with(['category', 'author.user'])
            ->paginate(9)
            ->appends(['search' => $search]);

        return view('dashboard', compact('articles', 'search'));
    }
}
