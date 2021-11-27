@section('head')
  @if($target == 'store')
    <title>Add new item</title>
  @elseif($target == 'update')
    <title>Edit item</title>
  @endif
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <script type="text/javascript" src="{{asset('js/formCounter.js')}}"></script>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('商品登録') }}</div>

          <div class="card-body">
            @if($target == 'store')
              <form method="POST" action="/book">
            @elseif($target == 'update')
              <form action="/book/{{ $book->id }}" method="POST">
              <input type="hidden" name="_method" value="PUT">
            @endif
                @csrf

                <div class="form-group row" onkeyup="setCounter(50,'name', 'name-counter')">
                  <label for="name" class="col-md-4 col-form-label text-md-right">
                    商品名<span class="required">*</span>
                  </label>

                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ $book->name }}" required autofocus maxlength="50">
                    <p class="guide right" id="name-counter">0/50</p>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="price" class="col-md-4 col-form-label text-md-right">
                    価格 <span class="required" >*</span>
                  </label>

                  <div class="col-md-6">
                    <input id="price" type="number" class="form-control" name="price"
                           value="{{ $book->price }}" required min="0" max="2147483647">
                    <p class="guide right">半角数字</p>
                  </div>
                </div>

		  <div class="form-group row">
                  <label for="tag" class="col-md-4 col-form-label text-md-right">
                    分別 <span class="required" >*</span>
                  </label>

                  <div class="col-md-6">
                    <input id="price" type="text" class="form-control" name="tag"
                           value="{{ $book->tag }}" required min="0" max="2147483647">
                    <p class="guide right">半英数字</p>
                  </div>
                </div>


                <div class="form-group row" onkeyup="setCounter(2000, 'explain', 'explain-counter')">
                  <label for="explain" class="col-md-4 col-form-label text-md-right">商品説明</label>

                  <div class="col-md-6">
                    <textarea id="explain" class="form-control" name="explain"
                              value="{{ $book->explain }}">
                    </textarea>
                    <p class="guide right" id="explain-counter">0/2000</p>
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-success">
                      @if($target == 'store')
                        登録
                      @elseif($target == 'update')
                        更新
                      @endif
                    </button>
                    <button type="button" class="btn btn-secondary prev" onclick="history.back()">
                      戻る
                    </button>
                  </div>
                </div>
              </form>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
