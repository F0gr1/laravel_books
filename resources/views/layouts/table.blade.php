<div class="row">
    <div class="col-12">
        <table class="table text-center">
            @if($books->count())
                <tr>
                    <!-- <th class="text-center">ID</th> -->
                    <th class="text-center">商品名</th>
                    <th class="text-center">価格</th>
                    <th class="text-center">タグ</th>
                    @if($is_index)
                        <th class="text-center">ユーザー</th>
                    @endif
                    <th class="text-center">編集</th>
                    <th class="text-center">削除</th>
                </tr>
                @foreach($books as $book)
                    <tr class="table-content">
                    <span class="clickable">
                        <td onclick="jump({{$book->id}})" class="mw-100 py-auto px-0 content-value"> <span class="content-value">{{ $book->name }}</span> </td>
                        <td onclick="jump({{$book->id}})" class="mw-100 py-auto px-0 content-value"> <span class="content-value">{{ $book->price }}</span> </td>
                        <td onclick="jump({{$book->id}})" class="mw-100 py-auto px-0 content-value"> <span class="content-value">{{ $book->tag }}</span> </td>
                        @if($is_index)
                            <td onclick="jump({{$book->id}})" class="mw-100 py-auto px-0 content-value"> <span class="content-value">{{ $book->player }}</span> </td>
                        @endif
                    </span>

                    @if( ($book->userid == Auth::user()->id) || (Auth::user()->email == config('app.mail1') ) || (Auth::user()->email == config('app.mail2') ) )
                        <td class="mw-100 ">
                            <button type="button" class="btn btn-lg btn-info py-auto" aria-label="Left Align" id="edit-button" onclick="location.href='/book/{{$book->id}}/edit'">
                                <i class="far fa-edit"></i>
                            </button>
                        </td>
                        <td class="mw-100 ">
                            <form action="book/{{ $book->id }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-lg btn-danger py-auto" aria-label="Left Align" id="delete-button">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    @endif
                    </tr>
                @endforeach
            @else
                <p>見つかりませんでした</p>
            @endif
        </table>
    </div>
</div>


<script type="text/javascript">
    let jump = function (id){
        let path = "/bookhome/" + id;
        window.location.href= path;
        //alert("詳細画面へ");
    };
</script>
