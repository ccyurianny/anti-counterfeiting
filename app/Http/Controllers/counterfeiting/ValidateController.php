<?php

namespace App\Http\Controllers\counterfeiting;

use App\City;
use App\Product;
use App\Statistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ValidateController extends Controller
{
    function index()
    {
        $cities = City::all();
        return response()->json(['cities' => $cities]);

    }

    public function check(Request $request)
    {
        $product = Product::where('code', $request->get('code'))->first();

        if (!$product) {
             return response()->json(['messageNot' => 'Product is NOT the original']);
        }else{
            if ($request->get('city_id')){
                Statistic::create([
                    'city_id' => $request['city_id'],
                    'product_id' => $product->id,
                ]);
            }
            return response()->json(['message' => 'Product is the original']);
        }

    }

}
