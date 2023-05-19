
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catalog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table  class="table table-striped">
                        <thead class="thead-dark">
                            <th scope="col"><h1>TU CARRITO DE COMPRA</h1></th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio(€)</th>
                            <th scope="col">Material</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                        @foreach($cart as $bag)
                            <tr>
                                <!-- <td><img src="<?php //echo '/img/bag ('.rand(1,7).').jpg'; ?>"></td> -->
                                <td><img src="https://m.media-amazon.com/images/I/61zzJzljcKL._CR0,204,1224,1224_UX256.jpg"></td>
                                <td>{{$bag['bag_name']}} </td>
                                <td>{{$bag['bag_price']}}</td>
                                <td>{{$bag['bag_material']}}</td>
                                
                                <form action="/cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="bag_id" value="{{$bag['bag_id']}}">
                                    <input type="hidden" name="bag_name" value="{{$bag['bag_name']}}">
                                    <input type="hidden" name="bag_price" value="{{$bag['bag_price']}}">
                                    <input type="hidden" name="bag_material" value="{{$bag['bag_material']}}">
                                    <td><button class="btn btn-outline-danger" type="submit">Eliminar del carrito</button></td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table> 
                    <div class="d-flex">
                        <h1 class="font-bold text-2xl text-gray-800 leading-tight">PRECIO TOTAL:</h1>
                        <h2 class="d-flex font-normal text-xl text-gray-600 leading-tight place-self-end">GRATIS (porque eres tu eh🤍)</h2>
                    </div><br>
                    <form action="/cart" method="POST">
                        @csrf   
                        <button type="button" class="btn btn-outline-info btn-lg btn-block">COMPRAR</button>
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-block"><a href="{{ url('/bags') }}">Seguir comprando</a></button>             
                    </form>
                                   
                  
                </div>     
            </div>
            
            
        </div>
    </div>
</x-app-layout>
