<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
class BookHomeController extends Controller
{
    public function index()
  {
      // DBよりBookテーブルの値を全て取得
      $books = Book::all();

      // 取得した値をビュー「book/index」に渡す
      return view('book/bookhome/index', compact('books'));
  }

  public function edit($id)
  {
      // DBよりURIパラメータと同じIDを持つBookの情報を取得
      $book = Book::findOrFail($id);

      // 取得した値をビュー「book/edit」に渡す
      return view('book/bookhome/edit', compact('book'));
  }

  public function update(Request $request, $id)
  {
    $book = Book::findOrFail($id);
    $book->name = $request->name;
    $book->price = $request->price;
    $book->player = $request->player;
    $book->explain = $request->explain;
    $book->save();

    return redirect("book/bookhome");
  }

   public function destroy($id)
   {
    $book = Book::findOrFail($id);
    $book->delete();

    return redirect("book/bookhome");
   }
   public function create()
   {
    // 空の$bookを渡す
    $book = new Book();
    return view('book/bookhome/create', compact('book'));
   }

   public function store(Request $request)
   {
    $book = new Book();
    $book->name = $request->name;
    $book->price = $request->price;
    $book->player = $request->player;
    $book->expalin = $request->expalin;
    $book->save();

    return redirect("book/bookhome");
    }

    public function show($id){
        $book = Book::findOrFail($id);
        return view('book/bookhome/index', ['book'=>$book]);
    }
}
