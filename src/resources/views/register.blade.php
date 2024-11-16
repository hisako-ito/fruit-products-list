    @extends('layouts.app')

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css')}}">
    @endsection

    @section('content')

    <div class="register-form">
        <div class="register-form__inner">
            <h2 class="register-form__heading content__heading">商品登録</h2>
            <form class="register-form__form" action="/products/register" method="post" enctype="multipart/form-data">
            @csrf
                <div class="register-form__item">
                    <label class="register-form__item-label" for="name">商品名<span class="register-form__item-label-required">必須</span></label>
                    <input class="register-form__item-input" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="商品名を入力">
                    <p class="register-form__error-message">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="register-form__item">
                    <label class="register-form__item-label" for="price">値段<span class="register-form__item-label-required">必須</span></label>
                    <input class="register-form__item-input" type="text" name="price" id="price" value="{{ old('price') }}" placeholder="値段を入力">
                    <p class="register-form__error-message">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="register-form__item">
                    <label class="register-form__item-label" for="price">商品画像<span class="register-form__item-label-required">必須</span></label>
                    <input class="register-form__item-input" type="file" name="image" id="price" value="{{ old('image') }}">
                    <p class="register-form__error-message">
                        @error('image')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="register-form__item">
                    <label class="register-form__item-label" for="春">季節<span class="register-form__item-label-required">必須</span><span class="register-form__item-label-checkbox-guide">複数選択可</span></label>
                    <div class="register-form__season-items-input">
                        <label><input class="register-form__item-input" type="checkbox" name="season_id" value="1" {{
                old('season_id')==1 ? 'checked' : '' }}>
                                    春</label>
                        <label><input class="register-form__item-input" type="checkbox" name="season_id" value="2" {{
                old('season_id')==2 ? 'checked' : '' }}>
                                    夏</label>
                        <label><input class="register-form__item-input" type="checkbox" name="season_id" value="3" {{
                old('season_id')==3 ? 'checked' : '' }}>
                                    秋</label>
                        <label><input class="register-form__item-input" type="checkbox" name="season_id" value="4" {{
                old('season_id')==4 ? 'checked' : '' }}>
                                    冬</label>
                    </div>
                    <p class="register-form__error-message">
                        @error('season_id')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="register__item-textarea">
                    <label class="register-form__item-label" for="description">商品説明<span class="register-form__item-label-required">必須</span></label>
                    <textarea class="register-form__item" name="description" id="description" cols="50" rows="6" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                    <p class="register-form__error-message">
                        @error('description')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="register-form__btn-inner">
                    <a href="/products" ><button class="register-form__back-btn btn" type="button">戻る</button></a>
                    <input class="register-form__send-btn btn" type="submit" value="登録" name="send">
                </div>
            </form>
        </div>
    </div>
    @endsection
