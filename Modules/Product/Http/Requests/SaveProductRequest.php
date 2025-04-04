<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Product\Entities\Product;
use Modules\Core\Http\Requests\Request;

class SaveProductRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'product::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->getSlugRules());
        return [
            'slug' => $this->getSlugRules(),
            'name' => 'required',
            'short_name' => 'string|nullable',
            'description' => 'required',
            'brand_id' => ['nullable', Rule::exists('brands', 'id')],
            'tax_class_id' => ['nullable', Rule::exists('tax_classes', 'id')],
            'is_active' => 'required|boolean',
            'is_hidden' => 'required|boolean',
            'price' => 'required|numeric|min:0|max:99999999999999',
            'special_price' => 'nullable|numeric|min:0|max:99999999999999',
            'special_price_type' => ['nullable', Rule::in(['fixed', 'percent'])],
            'special_price_start' => 'nullable|date',
            'special_price_end' => 'nullable|date',
            'manage_stock' => 'required|boolean',
            'qty' => 'required_if:manage_stock,1',
            'in_stock' => 'required|boolean',
            'new_from' => 'nullable|date',
            'new_to' => 'nullable|date',
            'contact_for_price' => 'required|boolean',
            'created_at' => 'nullable|string',
            'gift_note' => 'nullable|string',
            'info_1' => 'nullable|string',
            'info_2' => 'nullable|string',
            'banner_link' => 'nullable|string'
        ];
    }

    private function getSlugRules()
    {
        $rules = $this->route()->getName() === 'admin.products.update'
            ? ['required']
            : ['sometimes'];

        $slug = Product::withoutGlobalScope('active')
            ->withoutGlobalScope('checkHidden')
            ->where('id', $this->id)->value('slug');

        $rules[] = Rule::unique('products', 'slug')->ignore($slug, 'slug');

        return $rules;
    }
}
