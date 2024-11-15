<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required|integer|digits_between:0,10000',
            'image' => 'file|mimes:png,jpeg',
            'season_id' => 'required',
            'description' => 'required|max:120'
        ];
    }

    public function messages()
    {
        return [
        'name.required' => '商品名を入力してください',
        'price.required' => '値段を入力してください',
        'price.integer' => '数値で入力してください',
        'price.digits_between' => '0~10000円以内で入力してください',
        'image.file' => '商品画像を登録してください',
        'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
        'season_id.required' => '季節を選択してください',
        'description.required' => '商品説明を入力してください',
        'description.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
