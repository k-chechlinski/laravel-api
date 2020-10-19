<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Validators\Api\Product\ProductValidatorInterface;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;

class ProductController extends Controller
{
    /**
     * @var ProductValidatorInterface
     */
    private $productValidator;

    public function __construct(
        ProductValidatorInterface $productValidator
    )
    {
        $this->productValidator = $productValidator;
    }

    public function store(Request $request): ?JsonResponse
    {
        /** @var Validator $validator */
        $validator = $this->productValidator->validate($request->all());

        if ($validator->fails()) {
            $returnData = [
                'messages' => $validator->getMessageBag(),
                'product_id' => 'null',
                'status' => 'error'
            ];
            return response()->json($returnData, 400);

        }

        $product  = Product::create($request->all());

        return response()->json([
            'messages' => ['New product has been created successfully.'],
            'product' => $product,
            'status' => 'ok'
        ], 201);
    }

}
