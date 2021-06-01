<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => ['required','max:30'],
            'body' => ['required','max:300'],
        ];
    }

    public function messages()
     {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルは30文字以内で入力してください',
            'body.required' => '投稿内容を入力してください',
            'body.max' => '投稿内容は300文字以内で入力してください'
        ];
     }
}
