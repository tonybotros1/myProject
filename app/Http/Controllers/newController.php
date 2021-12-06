<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newController extends Controller
{
    public function createProduct(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $brand = $request->input('brand');

        if(!$name || !$description || !$price || !$brand){
            return response()->json(['message'=>'Invalid payload, all fields are required.',
            'data'=> null],400);
        }

        $filePath = 'C:\xampp\htdocs\tb.json';
        $fileContent = file_get_contents($filePath);
        $jsonContent = json_decode($fileContent, true);
        $payload = [
            'name'=> $name,
            'description'=> $description,
            'price'=>$price,
            'brand'=> $brand,
        ];

        if (!$jsonContent || !is_array($jsonContent)){
            $content = [
                $payload
            ];
            file_put_contents($filePath, json_encode($content));

        } else {
            $jsonContent[] = $payload;
            file_put_contents($filePath,json_encode($jsonContent));
        }

        return response()->json(['message'=>'Product has been added successfully','data'=>$payload]);

    }

    public function deletProductById($productId)
    {

        $filePath = ('C:\xampp\htdocs\tb.json');
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

    public function listAllProducts()
    {
        $filePath = 'C:\xampp\htdocs\tb.json';
        $fileContent = file_get_contents($filePath);
        $jsonContent = json_decode($fileContent, true);
        return response()->json([
            'message'=> 'Retrieved successfully !',
            'data'=> $jsonContent,
        ]);

    }
}
