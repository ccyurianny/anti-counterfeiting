<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importUsers(Request $request)
    {
        Excel::load($request->excel, function($reader) {

            $excel = $reader->get();
            // iteracción
            $reader->each(function($row) {
                $product = new Product();
                $product->code = $row->codigo;
                $product->save();
            });

        })->get();

        return "Productos Cargados";
    }
}
