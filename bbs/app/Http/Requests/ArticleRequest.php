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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:30',
            'description' => 'required|max:300',
        ];
    }

    public function messages()
     {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルは30文字以内で入力してください',
            'description.required' => '投稿内容を入力してください',
            'description.max' => '投稿内容は300文字以内で入力してください',
        ];
     }
}    
