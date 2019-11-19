<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
      $article = Article::all()->sortByDesc('created_at');

      return view('admin.dashboard', ['article' => $article]);
    }

    public function store(Request $request)
    {
      $request->validate(['title' => 'required']);

      $article = new Article;
      $article->title = $request->title;
      $article->content = $request->content;
      if($article->save()){
        return redirect()->back()->with('success', 'Berhasil menambahkan artikel');
      }else{
        return redirect()->back()->with('error', 'Gagal menambahkan artikel');
      }
    }

    public function update(Article $article, Request $request)
    {
      $request->validate(['title' => 'required']);

      $article->title = $request->title;
      $article->content = $request->content;

      if($article->save()){
        return redirect()->back()->with('success', 'Berhasil mengupdate artikel');
      }else{
        return redirect()->back()->with('error', 'Gagal mengupdate artikel');
      }
    }

    public function destroy(Article $article)
    {
      if($article->delete()){
        return redirect()->back()->with('success', 'Berhasil menghapus artikel');
      }else{
        return redirect()->back()->with('error', 'Gagal menghapus artikel');
      }
    }
}
