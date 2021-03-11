<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRentFlatRequest extends FormRequest
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
            'town' => 'required|min:3|max:20',
            'address' => 'required|min:3|max:255',
            'total_area' => 'required|min:1|max:255',
            'living_area' => 'required|min:1|max:255',
            'kitchen_area' => 'required|min:1|max:255',
            'floor' => 'required|min:1|max:255',
            'total_floors' => 'required|min:1|max:255',
            'images' => 'required',
            'description' => 'required|min:3',
            'rent_per_month' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        $messages = [
            'town.min' => 'Поле Город должно содержать не менее :min символов',
            'town.max' => 'Поле Город должно содержать не более :max символов',
            'adrress.min' => 'Поле Адрес должно содержать не менее :min символов',
            'address.max' => 'Поле Адрес должно содержать не более :max символов',
            'total_area.min' => 'Поле Общая площадь должно содержать не менее :min символов',
            'total_area.max' => 'Поле Общая площадь должно содержать не более :max символов',
            'living_area.min' => 'Поле Жилая площадь должно содержать не менее :min символов',
            'living_area.max' => 'Поле Жилая площадь должно содержать не более :max символов',
            'kitchen_area.min' => 'Поле Площадь кухни должно содержать не менее :min символов',
            'kitchen_area.max' => 'Поле Площадь кухни должно содержать не более :max символов',
            'floor.min' => 'Поле Этаж должно содержать не менее :min символов',
            'floor.max' => 'Поле Общее кол-во этажей должно содержать не более :max символов',
            'images.required' => 'Поле Фотографии должно быть заполнено',
            'description.min' => 'Поле Описание должно содержать не менее :min символов',
            'rent_per_month.min' => 'Поле Цена должно содержать не менее :min символов',
        ];

        return $messages;
    }
}
