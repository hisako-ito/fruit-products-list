    @extends('layouts.app')

    @section('bootstrap')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css')}}">
    @endsection

    @section('content')
    <div class="products-list">
        <div class=products-list__heading>
            <h2 class="content__heading">商品一覧</h2>
            <form class="add-form" action="/products/register" method="get">
            @csrf
                <input class="add-form__btn btn" type="submit" value="+ 商品を追加">
            </form>
        </div>

        <div class="products-list__sidebar">
            <form class="search-sort-form" action="/products/search" method="get">
            @csrf
                <input class="search-form__keyword-input" type="text" name="keyword" placeholder="商品名で検索" value="{{request('keyword')}}">
                <div class="search-form__btn">
                    <input class="search-form__search-btn btn" type="submit" value="検索">
                </div>
                <div class="sort-form">
                    <h3 class="sort-form__heading">価格順で表示</h3>
                    <div class="sort-form__select-inner">
                        <select class="sort-form__select" name="" id="">
                            <option disabled selected>価格で並べ替え</option>
                            <option value="">高い順に表示</option>
                            <option value="">低い順に表示</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div class="products-list__content">
            @foreach ($products as $product)
                <div class="product__card">
                    <form action="{{ url('/products/' . $product->id) }}" method="get">
                    @csrf
                        <div class="card__img">
                            <input type="image" src="{{ asset($product->image) }}" alt="商品画像" >
                        </div>
                        <div class="card__content">
                            <p class="card__name">{{$product->name}}</p>
                            <p class="card__price">{{$product->price}}</p>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="products-list__pagination">
            <div>{{ $products->appends(request()->query())->links('vendor.pagination.custom') }}</div>
        </div>

    </div>
    @endsection
