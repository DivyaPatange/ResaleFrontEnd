<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        return view('auth.adByCategory');
    }

    public function postAdForm($id)
    {
        return view('auth.postAdForm');
    }

    public function storeCarPost(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'model_name' => 'required',
            'year_of_registration' => 'required',
            'fuel' => 'required', 
            'transmission' => 'required',
            'km_driven' => 'required',
            'no_of_owners' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);
        $carPost = new Car();
        $carPost->brand_id = $request->brand_name;
        $carPost->model_id = $request->model_name;
        $carPost->year_of_registration = $request->year_of_registration;
        $carPost->fuel = $request->fuel;
        $carPost->transmission = $request->transmission;
        $carPost->km_driven = $request->km_driven;
        $carPost->no_of_owners = $request->no_of_owners;
        $carPost->ad_title = $request->ad_title;
        $carPost->description = $request->description;
        $carPost->price = $request->price;
        $files = [];

        if($request->hasfile('photos'))

         {

            foreach($request->file('photos') as $file)

            {

                $name = time().rand(1,100).'.'.$file->extension();

                $file->move(public_path('adPhotos'), $name);  

                $files[] = $name;  

            }

         }
        $carPost->photos = $files;
        $carPost->state_id = $request->state_name;
        $carPost->city_id = $request->city_name;
        $carPost->location = $request->location;
        $carPost->save();
    }

    public function submitCarAd(Request $request)
    {
        $file = $request->userfile;
        dd($file);
    }
}
