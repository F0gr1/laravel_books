<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Book;
use Auth;
class ShohinController extends Controller
{
    public function index(Request $request)
  {
      // DBよりBookテーブルの値を全て取得
     // $books = DB::table('books')->orderBy('id', 'desc')->paginate(3);
      $name = $request->input('name');
      $tag = $request->input('tag'); 
      $query = Book::query();
      if(!empty($name)){
      $query->where('name', 'LIKE', "%$name%")->where('tag' , 'LIKE' , "%$tag%")->get();
      }
      $books = $query->orderBy('id' , 'desc')->paginate(10);
      // 取得した値をビュー「book/index」に渡す
      return view('book/index' ,compact('books' , 'name' , 'tag'));

  }

  public function edit($id)
  {

      // DBよりURIパラメータと同じIDを持つBookの情報を取得
      $book = Book::findOrFail($id);

      // 取得した値をビュー「book/edit」に渡す
      return view('book/edit', compact('book'));
  }

  public function update(Request $request, $id)
  {
    $book = Book::findOrFail($id);
    $book->name = $request->name;
    $book->price = $request->price;
    $book->player = Auth::user()->name;
    $book->explain = $request->explain;
    $book->tag = $request->tag;
    $book->save();

    return redirect("/book");
  }
   public function destroy($id)
   {
    $book = Book::findOrFail($id);
    $book->delete();
    return redirect("/book");
   }
   public function create()
   {
    // 空の$bookを渡す
    $book = new Book();
    return view('/book/create', compact('book'));
   }

   public function store(Request $request)
   {
    $book = new Book();
    $book->name = $request->name;
    $book->price = $request->price;
    $book->player = Auth::user()->name;
    $book->explain =$request->explain;
    $book->userid = Auth::user()->id;
    $book->tag = $request ->tag;
    $book->save();

    return redirect("/book");
    }
  
}
