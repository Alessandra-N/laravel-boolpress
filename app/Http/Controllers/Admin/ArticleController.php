<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all()->sortByDesc('id');
        $tags = Tag::all();
        return view('admin.index', compact('articles', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save(); */

        //ddd($request->all());
        $validData = $request->validate([
            'title' => ["required", "unique:articles",  "max:255"],
            'image' => 'nullable|mimes:jpg,jpeg,gif|max:500',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
            'content' => 'min:5',
        ]);
        //ddd($validData);
        /* $file_path = Storage::disk('public')->put('article_images', $validated['image']);
        ddd($file_path); */
        if($request->hasFile('image')) {
            $file_path = Storage::put('article_images', $validData['image']);
            $validData['image'] = $file_path;
        }
        
        $article = Article::create($validData);
        $article->tags()->attach($request->tags);
        //ddd($article);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('guest.posts.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required | min:1 | max:255',
            'image' => 'nullable|mimes:jpg,jpeg,gif|max:500',
            'category_id' => 'nullable | exists:categories,id',
            'tags' => 'exists:tags,id',
            'content' => 'nullable | min:5'
        ]);
        
        if($request->hasFile('image', $validated)) {
            $file_path = Storage::put('article_images', $validated['image']);
            $validated['image'] = $file_path;
        }

        $article->update($validated);
        $article->tags()->sync($request->tags);
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();
        $article->delete();
        return redirect()->route('admin.articles.index');
    }
}