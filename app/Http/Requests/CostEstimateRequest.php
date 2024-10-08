<?php

namespace App\Http\Requests;

use App\Data\CostEstimateRequestData;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CostEstimateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'base_price' => ['required', 'numeric', 'min:0.01'],
            'category' => ['required', 'string', 'exists:product_categories,name'],
            'location' => ['required', 'string', 'exists:sales_locations,city'],
            'quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'base_price.required' => 'Base price is required.',
            'base_price.numeric' => 'Base price must be a number.',
            'base_price.min' => 'Base price must be at least 0.01.',
            'category.required' => 'Product category is required.',
            'category.exists' => 'Selected product category does not exist.',
            'location.required' => 'Sales location is required.',
            'location.exists' => 'Selected sales location does not exist.',
            'quantity.required' => 'Quantity is required.',
            'quantity.integer' => 'Quantity must be an integer.',
            'quantity.min' => 'Quantity must be at least 1.',
        ];
    }

    public function getDto(): CostEstimateRequestData
    {
        return new CostEstimateRequestData(
            base_price: $this->get('base_price'),
            category: $this->get('category'),
            location: $this->get('location'),
            quantity: $this->get('quantity')
        );
    }
}
