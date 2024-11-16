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
            <form class="update-form" action="{{ url('/products/' . $product->id . '/update/') }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="update-form__item-img">
                    <img src="{{ asset($product->image) }}" alt="商品画像">
                    <input class="update-form__item-input" type="file" name="image">
                    <p class="update-form__error-message">
                        @error('image')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="update-form__items">
                    <div class="update-form__item">
                        <label class="update-form__item-label" for="name">商品名</label>
                        <input class="update-form__item-input" type="text" name="name" id="name" value="{{$product->name}}">
                        <p class="update-form__error-message">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="update-form__item">
                        <label class="update-form__item-label" for="price">値段</label>
                        <input class="update-form__item-input" type="text" name="price" id="price" value="{{$product->price}}">
                        <p class="update-form__error-message">
                            @error('price')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="update-form__item update-form__season-item">
                        <label class="update-form__item-label" for="春">季節</label>
                        <div class="update-form__season-items-input">
                            <label><input class="update-form__item-input" type="checkbox" name="season_id" value="1">
                            春</label>
                            <label><input class="update-form__item-input" type="checkbox" name="season_id" value="2">
                            夏</label>
                            <label><input class="update-form__item-input" type="checkbox" name="season_id" value="3">
                            秋</label>
                            <label><input class="update-form__item-input" type="checkbox" name="season_id" value="4">
                            冬</label>
                        </div>
                        <p class="update-form__error-message">
                            @error('season_id')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="update-form__item-textarea">
                    <label class="update-form__item-label" for="description">商品説明</label>
                    <textarea class="update-form__item" name="description" id="description" cols="50" rows="6">{{$product->description}}</textarea>
                    <p class="update-form__error-message">
                        @error('description')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="forms__btn">
                    <div class="update-form__btn-inner">
                        <a href="/products" ><button class="update-form__back-btn btn" type="button">戻る</button></a>
                        <input type="hidden" name="update" value="">
                        <input class="update-form__send-btn btn" type="submit" value="変更を保存" name="send">
                    </div>
            </form>
                    <div class="delete-form" class="delete-form__btn-inner">
                        <form action="{{ url('/products/' . $product->id . '/delete/') }}" method="POST">
                        @method('DELETE')
                        @csrf
                            <button class="delete-form__btn" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    @endsection
