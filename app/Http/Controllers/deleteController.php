<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class deleteController extends Controller
{
    public function deletProductById($productId)
    {
        $filePath = ('C:\xampp\htdocs\products_list.json');
        $fileContent = file_get_contents($filePath);
        $jsonContent = json_decode($fileContent,true);
        if($productId < 0 || $productId > count($jsonContent)){
            return response()->json([

                'message'=>'Invaild ID'
            ],400);
        }

        unset($jsonContent[$productId-1]);
        file_put_contents($filePath,json_encode(array_values($jsonContent)));
        return response()->json([
            'message'=>'Deleted !'
        ]);

    }

    public function listAllProducts(){

        $filePath = ('C:\xampp\htdocs\products_list.json');
        $fileContent = file_get_contents($filePath);
        $jsonContent = json_decode($fileContent,true);

        return response()->json([

            'message'=>'Retrived Successfully!',
            'data'=> $jsonContent,
        ],);

    }


}
