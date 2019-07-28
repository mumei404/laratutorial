<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticlesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

	public function index()
	{
		$articles = Article::latest('published_at')->latest('created_at')
			->published()
			->get();

		return view('articles.index', compact('articles'));
	}

	public function show(Article $article)
	{
		return view('articles.show', compact('article'));
	}

	public function create()
	{
		return view('articles.create');
	}

	public function store(ArticleRequest $request)
	{
		Auth::user()->articles()->create($request->validated());

		return redirect()->route('articles.index')->with('message', '記事を作成しました。');
	}

	public function edit(Article $article)
	{
		return view('articles.edit', compact('article'));
	}

	public function update(ArticleRequest $request, Article $article)
	{
		$article->update($request->validated());

		return redirect()->route('articles.show', [$article->id])->with('message', '記事を編集しました。');
	}

	public function destroy(Article $article)
	{
		$article->delete();

		return redirect()->route('articles.index')->with('message', '記事を削除しました。');
	}
}
