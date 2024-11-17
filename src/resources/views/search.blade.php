    @extends('layouts.app')

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/search.css')}}">
    @endsection

    @section('content')
    <div class="search-list">
        <div class=search-list__heading>
            <h2 class="content__heading">"{{request('keyword')}}"の商品一覧</h2>
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

        <div class="search-list__content">
            @foreach ($products as $product)
                <div class="product__card">
                        <form action="{{ url('/products/' . $product->id) }}" method="get">
                        @csrf
                            <div class="card__img">
                                <input type="image" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" >
                            </div>
                            <div class="card__content">
                                <p class="card__name">{{$product->name}}</p>
                                <p class="card__price">{{$product->price}}</p>
                            </div>
                        </form>
                </div>
            @endforeach
        </div>

    </div>
    @endsection
