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
                <button class="add-form__btn">+ 商品を追加</button>
            </form>
        </div>

        <div class="search-form">
            <form action="/products/search" method="get">
            @csrf
                <input class="search-form__keyword-input" type="text" name="keyword" placeholder="商品名で検索" value="{{request('keyword')}}">
                <div class="search-form__btn">
                    <input class="search-form__search-btn btn" type="submit" value="検索">
                </div>
                <div class="sort-form">
                    <h3>価格順で表示</h3>
                    <>
                </div>
            </form>
        </div>

        <div class="box3">box3</div>
        <div class="box4">box4</div>
        <div class="box5">box5</div>
        <div class="box6">box6</div>
        <div class="box7">box7</div>
        <div class="box8">box8</div>
        <div class="box9">box9</div>
</div>
@endsection