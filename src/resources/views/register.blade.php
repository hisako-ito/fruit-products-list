    @extends('layouts.app')

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css')}}">
    @endsection

    @section('content')

    <div class="register-form">
        <div class=register-form__heading>
            <h2 class="content__heading">商品登録</h2>
        </div>

        <form class="" action="/products/register" method="post" enctype="multipart/form-data">
        @csrf
            <div class="register-form__item">
                <label class="register-form__item-label" for="name">商品名</label>
                <input class="register-form__item-input" type="text" name="name" id="name" value="">
                <p class="register-form__error-message">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__item">
                <label class="register-form__item-label" for="price">値段</label>
                <input class="register-form__item-input" type="text" name="price" id="price" value="">
                <p class="register-form__error-message">
                    @error('price')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__item">
                <label class="register-form__item-label" for="春">季節</label>
                <label><input class="register-form__item-input" type="checkbox" name="season_id" value="1">
                            春</label>
                <label><input class="register-form__item-input" type="checkbox" name="season_id" value="2">
                            夏</label>
                <label><input class="register-form__item-input" type="checkbox" name="season_id" value="3">
                            秋</label>
                <label><input class="register-form__item-input" type="checkbox" name="season_id" value="4">
                            冬</label>
                <p class="register-form__error-message">
                    @error('season_id')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register__item-textarea">
                <label class="register-form__item-label" for="description">商品説明</label>
                <textarea class="register-form__item" name="description" id="description" cols="50" rows="6"></textarea>
                <p class="register-form__error-message">
                    @error('description')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__btn-inner">
                <input class="register-form__back-btn btn" type="submit" value="戻る" name="back">
                <input class="register-form__send-btn btn" type="submit" value="登録" name="send">
            </div>
        </form>

    </div>
    @endsection
