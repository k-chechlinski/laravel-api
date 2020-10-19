<?php
declare(strict_types=1);

namespace App\Validators\Api\Product;

use Illuminate\Validation\Validator;
use App\Validators\Api\Product\ProductValidatorInterface;

class ProductValidator implements ProductValidatorInterface
{
    /**
     * @inheritDoc
     */
    public function validate(array $data): Validator
    {
        $validator = \Illuminate\Support\Facades\Validator::make($data, [
            'name' => 'required|unique:products|max:255',
            'price' => 'required|integer'
        ]);

        return $validator;
    }
}
