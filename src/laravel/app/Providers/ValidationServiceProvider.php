<?php
declare(strict_types=1);


namespace App\Providers;


use App\Validators\Api\Product\ProductValidatorInterface;
use App\Validators\Api\Product\ProductValidator;

class ValidationServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public $bindings = [
        ProductValidatorInterface::class => ProductValidator::class
    ];
}
