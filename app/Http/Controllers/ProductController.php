<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
      $products = product::all();
// دى طريقه احلا علشان تظر رساله او ممكن تعرضها عادى بالطريقه العاديه
      $massage=[
     "products"=>$products,
     "massage"=>"select done",
     "status"=> 200
      ];

      return response($massage,200);
    }


    public function store(Request $request)
    {
      $request->validate([
     "name"=>"string|required",
      "category"=>"required|string",
      "price"=>"required|numeric"
      ]);


       $product =new product();
       $product->name=$request->name;
       $product->category=$request->category;
       $product->price=$request->price;
       $product->save();
       $massage=[
        "products"=>$product,
        "massage"=>"create done",
        // دى ارقام بين المبرمجين عادى
        "status"=> 201
         ];

         return response($massage,201);
    }

    public function show($id)
    {
        $products = product::find($id);

    if($products == null){

        $massage=[
            "products"=>"this product not avlible",
            "massage"=>"select done",
            "status"=> 200
             ];

             return response($massage,200);
           }

else{
    $massage=[
        "products"=>$products,
        "massage"=>"select done",
        "status"=> 200
         ];

         return response($massage,200);
       }


}




    public function update(Request $request,$id)
    {

      $request->validate([
        "name"=>"string|required",
         "category"=>"required|string",
         "price"=>"required|numeric"
         ]);

         $product = product::find($id);
           $product->name=$request->name;
          $product->category=$request->category;
          $product->price=$request->price;
          $product->save();
          $massage=[
           "products"=>$product,
           "massage"=>"updated  done",
           // دى ارقام بين المبرمجين عادى
           "status"=> 201
            ];

            return response($massage,201);
    }

    public function destroy($id)
    {
        $product = product::destroy($id);
        $massage=[
            "products"=>$product,
            "massage"=>"deleted  done",
            "status"=> 201
             ];
             return response($massage,201);
    }

    public function search($name)
{
    $product = product::where("name","like","%".$name."%")->get();
    $massage=[
        "products"=>$product,
        "massage"=>"search done",
        "status"=> 201
         ];
         return response($massage,201);
}

}


