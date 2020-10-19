<?php
declare(strict_types=1);

namespace App\Validators\Api\Product;

use Illuminate\Validation\Validator;

interface ProductValidatorInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function validate(array $data): Validator;
}
