<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'content' => 'required|string|min:3',
            'tags.*' => 'string|max:255',
        ];
    }

    protected function prepareForValidation()
    {
        // Split and trim tags by commas
        if ($this->tags) {
            $tags = Str::of($this->tags)
                ->split('/(\s*,*\s*)*,+(\s*,*\s*)*/')
                ->toArray();

            $this->merge([
                'tags' => $tags,
            ]);
        }
    }
}
