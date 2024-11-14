    @extends('layouts.app')

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/details.css')}}">
    @endsection

    @section('content')
    <div class="product-details">
        <div class="product-details__inner">
            <div class="product-details__nav">
                <nav>
                    <ol class="product-details__nav-list">
                        <li><a href="/products">商品一覧</a></li>
                        <li>{{$product->name}}</li>
                    </ol>
                </nav>
            </div>
            <form class="update-form" action="{{ url('/products/' . $product->id . '/update/') }}" method="post">
                @csrf
                <div class="update-form__item-img">
                    <img src="{{ asset($product->image) }}" alt="商品画像">
                    <input class="update-form__item-input--image" type="file" name="image">
                </div>
                <div class="update-form__items">
                    <div class="update-form__item">
                        <label class="update-form__item-label" for="name">商品名</label>
                        <input class="update-form__item-input" type="text" name="name" id="name" value="{{$product->name}}">
                    </div>
                    <div class="update-form__item">
                        <label class="update-form__item-label" for="price">値段</label>
                        <input class="update-form__item-input" type="text" name="price" id="price" value="{{$product->price}}">
                    </div>
                    <div class="update-form__item">
                        <label class="update-form__item-label" for="season">季節</label>
                        <input class="update-form__item-input--checkbox" type="checkbox" name="season_id" id="season" value="1">春
                        <input class="update-form__item-input--checkbox" type="checkbox" name="season_id" id="season" value="2">夏
                        <input class="update-form__item-input--checkbox" type="checkbox" name="season_id" id="season" value="3">秋
                        <input class="update-form__item-input--checkbox" type="checkbox" name="season_id" id="season" value="4">冬
                    </div>
                </div>
                <div class="update-form__item-textarea">
                    <label class="update-form__item-label" for="description">商品説明</label>
                    <textarea class="update-form__item" name="description" id="description" cols="30" rows="10">{{$product->description}}</textarea>
                </div>
                <div class="update-form__btn-inner">
                    <input class="update-form__back-btn btn" type="submit" value="戻る" name="back">
                    <input class="update-form__send-btn btn" type="submit" value="変更を保存" name="send">
                </div>
            </form>
        </div>
    </div>
    @endsection
