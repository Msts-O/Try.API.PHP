<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'comment' => 'required|max:300',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.max' => '名前は30文字以内で入力してください',
            'comment.required' => '投稿内容を入力してください',
            'comment.max' => '投稿内容は300文字以内で入力してください',
        ];
    }
}
