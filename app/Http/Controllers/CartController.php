<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
     /**
     * Muestra todos los bolsos que añadiste al carrito
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Session::get('cart',[]);
        //dd($cart);
        return view('cart')->with('cart',$cart);
    }

 
    /**
     * Display all the bags
     * 
     */
    public function read($id)
    {
 
    }

    /**
     * Actualiza el registro del Bag por id
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Elimina el Bag por ID
     */
function delete($id)
    {
        $bag = Purchase::find($id);
        if(!$bag){
            return "bag no encontrada";
        }
        $bag->delete();

        // return response()->json(['message' => 'bag borrada'], 204);
        return back()->with('success', 'bag borrada');

    }

}
