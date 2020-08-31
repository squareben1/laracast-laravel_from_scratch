<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        // the $article in refactor above has to match the {wildcard} in routes
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        Article::create($this->validateArticle()); // TASTY refactor there - replaced array with var
        // tutorial recommends inlining all of this...didnt make sense from readability standpoint
        // until extracted to it's own method

        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article)
    {
        /* 
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        REFACTORED TO:
        */

        $article->update($this->validateArticle());
        // update() and create() methods assign attributes and save to DB in one go

        return redirect($article->path());
        // note the above where we call Article method as opposed to:
        // return redirect(route('articles.show', $article));
    }

    public function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);
    }
}
