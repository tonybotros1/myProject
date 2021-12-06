<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tonyController extends Controller
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


    public function updateNameByID(Request $request,$nameID){

        $name1 = $request->input('name');

        if(!$name1)
        {
            return response()->json([
                'message'=>'you need to add new name !!!'
            ]);
        }

        $filePath = ('C:\xampp\htdocs\tb.json');
        $fileContent = file_get_contents($filePath);
        $jsonContent = json_decode($fileContent,true);
        if($nameID < 0 || $nameID > count($jsonContent)){
            return response()->json([
                'message'=>404
            ],400);
        }
        
        else {
            $content0 = $jsonContent;
            $content0[$nameID-1]['name']=$name1;
        }
        unset($jsonContent[$nameID-1]);
        file_put_contents($filePath,json_encode(array_values($content0)));
        return response()->json([
            'message'=>'name changed correctly !'
        ]);

    }
}
