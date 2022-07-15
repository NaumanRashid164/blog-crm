<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => ["required", 'unique:posts,title,' . $this->id],
            "seo_title" => ["required", 'unique:posts,seo_title,' . $this->id],
            "slug" => ["required", 'unique:posts,slug,' . $this->id],
            "author_id" => ["required"],
            "category_id" => ["required"],
            "comments_status" => ["required"],
            "featured_img_alt" => ["required"],
            "published_at" => ["required"],
            "meta_desc" => ["required"],
            "meta_tags" => ["required"],
            "additional_tags" => ["required"],
            "detail" => ["required"],
            "featured_img" => ["mimes:jpeg,jpg,png,gif", "max:2048"] //max= 2MB
        ];
    }
}
