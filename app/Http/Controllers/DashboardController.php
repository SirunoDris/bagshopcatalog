<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DashboardController extends Controller
{
    /**
     * Muestra todos los bolsos del catalogo des de la API
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
        return view('dashboard') ->with('bags',$bags);
    }

    /**
     * Recoge datos del formulario y crea un nuevo producto (bag) para el catalogo
     */
    public function create(Request $request)
    {
        $client = new Client();
        //dd($request->all());
        $data = [
            'name' => $request->input('pname'),
            'price' => $request->input('pprice'),
            'material' => $request->input('pmaterial')
        ];

        $json = json_encode($data);

        $response = Http::withToken('Bearer 3|Oo3J3nknCnGsjvP8vpwmdyN4WXtNjA1DF5BrZOi0')
        ->withBody($json, 'application/json')
        ->post('https://magical-lamarr.82-223-123-69.plesk.page/api/bags');
        
        return back()->with('success', '¡Nueva Bag añadida al catalogo!');
    }

    /**
     * Elimina por id el producto bag del catalogo haciendolo por API
     */
    public function destroy($id)
    {
        $client = new Client();
        $response = $client->delete('https://magical-lamarr.82-223-123-69.plesk.page/api/bags/' . $id, [
            'headers' => [
                'Authorization' => 'Bearer 4|UWCOwItyfa7uVgfnNG7EIHC9L5oituLfHjEYAt3M',
                'Accept' => 'application/json',
            ],
        ]);

        return back()->with('success', 'Bag del catalogo BORRADO');
    }
}
