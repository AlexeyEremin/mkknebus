<?php

namespace App\Http\Requests\Building;

use App\Models\Building;
use App\Rules\FloatRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchDistanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'latitude' => ['required', new FloatRule],
            'longitude' => ['required', new FloatRule],
            'type' => ['required', Rule::in([Building::TYPE_RADIUS_SEARCH, Building::TYPE_RECTANGLE_SEARCH])],
            'radius' => ['required_if:type,'.Building::TYPE_RADIUS_SEARCH, new FloatRule],
            'radiusX' => ['required_if:type,'.Building::TYPE_RECTANGLE_SEARCH, new FloatRule],
            'radiusY' => ['required_if:type,'.Building::TYPE_RECTANGLE_SEARCH, new FloatRule],
        ];
    }
}
