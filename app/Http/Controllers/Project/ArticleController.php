<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    public function index()
    {
        return view('projects.article.index');
    }

    public function getArticle(Request $request)
    {
        $query = $request->get('q', 'gender equality');
        $page = $request->get('per_page', 20);
        $language = $request->get('lang', 'en');

        $response = Http::get('https://newsapi.org/v2/everything', [
            'q' => $query,
            'language' => $language,
            'pageSize' => $page,
            'sortBy' => 'relevancy',
            'apiKey' => env('NEWS_API_KEY'),
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch articles'], 500);
        }

        $articles = collect($response->json('articles'))->map(function ($item, $index) {
            return [
                'id' => 'newsapi_' . $index,
                'title' => $item['title'],
                'description' => $item['description'],
                'url' => $item['url'],
                'image_url' => $item['urlToImage'],
                'source' => $item['source']['name'] ?? 'Unknown',
                'published_at' => $item['publishedAt'],
                'author' => $item['author'] ?? 'Unknown',
            ];
        });

        return response()->json($articles);
    }
}
