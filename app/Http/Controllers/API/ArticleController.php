<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

// use OpenApi\Serializer;
/**
 * @OA\Info(
 * title="My First API", version="0.1",
 *  @OA\Contact(
 *          email="ossei@max.lt"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */


class ArticleController extends Controller
{



/**
 * @OA\Get(
 *     path="/blog/public/api/articles",
 *     @OA\Response(response="200", description="An example resource")
 * )
 */
    public function index()
    {
        return Article::all();
    }

    /**
 * @OA\Post(
 *     path="/blog/public/api/articles",
 *     @OA\Response(response="200", description="An example resource")
 * )
 */
    public function show(Article $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
