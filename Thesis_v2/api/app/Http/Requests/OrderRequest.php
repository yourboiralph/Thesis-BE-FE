<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust this according to your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'nullable|exists:customers,id',
            'order_date' => 'required|date',
            'total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'order_status' => 'required|in:pending,processing,completed',
        ];
    }
}
