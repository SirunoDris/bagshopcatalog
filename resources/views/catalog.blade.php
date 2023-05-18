
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catalog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1>CATALOGO DE BOLSOS</h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table>
                        <thead>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Material</th>
                            <th>Comprar</th>
                        </thead>
                        <tbody>
                            @foreach($bags as $bag)
                            <tr>
                                <td>{{$bag['name']}} </td>
                                <td>{{$bag['price']}}</td>
                                <td>{{$bag['material']}}</td>
                                <form action="/bags" method="POST">
                                    @csrf
                                    <input type="hidden" name="bag_id" value="{{$bag['id']}}">
                                    <input type="hidden" name="bag_name" value="{{$bag['name']}}">
                                    <input type="hidden" name="bag_price" value="{{$bag['price']}}">
                                    <input type="hidden" name="bag_material" value="{{$bag['material']}}">
                                    <td><button type="submit">COMPRAR</button></td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                            
                </div>
                @if (session('success'))
                <script>
                alert("{{ session('success') }}");
                </script>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
