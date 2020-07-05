<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::all();
        return view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'isi' => 'required',
            'tag' => 'required',
        ]);

        Article::create($request->all());
        return redirect('/articles')->with('status', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('edit', compact('article'));
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
        // validasi
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'isi' => 'required',
            'tag' => 'required',
        ]);

        Article::where('id', $article->id)
            ->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'isi' => $request->isi,
                'tag' => $request->tag,
            ]);
        return redirect('/articles')->with('status', 'Data Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        return redirect('/articles')->with('status', 'Data Deleted');
    }
}
