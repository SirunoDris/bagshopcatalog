<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BagController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $response = $client->get("https://magical-lamarr.82-223-123-69.plesk.page/api/bags",[
            'headers' => [
                'Authorization' => 'Bearer 4|UWCOwItyfa7uVgfnNG7EIHC9L5oituLfHjEYAt3M',
                'Accept' => 'application/json',        
            ]
        ]);
        $bags = json_decode($response->getBody(),true);
        return view('catalog') ->with('bags',$bags);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function addProduct(Request $request)
    {
        $request->all();
        $bagId = $request->input('bag_id');
        $bagName = $request->input('bag_name');
        $bagPrice = $request->input('bag_price');
        $bagMaterial = $request->input('bag_material');

        $cart = Session::get('cart', []);
        $product = [
            'bag_id' => $bagId,
            'bag_name' => $bagName,
            'bag_price' => $bagPrice,
            'bag_material' => $bagMaterial,
        ];
        $cart[] = $product;
    
        Session::put('cart', $cart);
        $message = 'Bolso añadido al carrito';
        session()->flash('success', $message);

        // Redirigir a la página anterior (opcional)
        return back();
        //return back()->with('success', $message);
    }
        
        

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

}