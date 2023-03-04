<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'name_ar' => 'required|string|min:3|max:255|unique:categories,name_ar,' . $this->category->id,
            'name_en' => 'required|string|min:3|max:255|unique:categories,name_en,' . $this->category->id,
            'sort_order' => 'nullable|integer|gte:1',
            'desc_ar' => 'nullable|string|min:3|max:255',
            'desc_en' => 'nullable|string|min:3|max:255',
            'icon' => 'nullable|mimes:svg|max:256',
            'image' => 'nullable',
        ];
    }
}
