@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css')}}">
@endsection

@section('content')
    <div class="products-list">
        <div class="products-list__heading content__heading">
            <h2>商品一覧</h2>
            <form class="add-form" action="/products/register" method="get">
            @csrf
                <input class="add-form__btn" type="submit" value="+ 商品を追加">
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
                    <h3>価格順で表示</h3>
                    <select class="search-form__sort-select" name="category_id" id="">
                        <option disabled selected>価格で並べ替え</option>
                        <option value="">高い順に表示</option>
                        <option value="">低い順に表示</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="products-list__content">
            <div class="products-list__content-card">
                <div class="card__img">
                    <img src="" alt="" />
                </div>
                <div class="card__content">
                    <span class="card__name">商品名</span>
                    <span class="card__price">価格</span>
                </div>
            </div>
            <div class="products-list__content-card">box4</div>
            <div class="products-list__content-card">box5</div>
            <div class="products-list__content-card">box6</div>
            <div class="products-list__content-card">box7</div>
            <div class="products-list__content-card">box8</div>
        </div>

        <div class="products-list__pagination">
            <div class="box9">box9</div>
        </div>

    </div>
@endsection