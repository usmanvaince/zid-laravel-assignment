<?php

namespace App\Http\Requests\Item;

use App\Http\Requests\AbstractFormRequest;
use League\CommonMark\CommonMarkConverter;

class AddOrUpdateItemRequest extends AbstractFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'url' => ['required', 'url'],
            'description' => ['required', 'string'],
        ];
    }

    protected function prepareForValidation()
    {
        $converter = new CommonMarkConverter(['html_input' => 'escape', 'allow_unsafe_links' => false]);

        $this->merge([
            'description' => $converter->convert($this->description)->getContent()
        ]);
    }
}
