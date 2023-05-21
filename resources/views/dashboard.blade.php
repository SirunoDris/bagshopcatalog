<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tu Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Bienvenido Usuari@ hermos@</h1>
                    <p>Aquí encontrarás la gestión del catalogo</p>
                    <br>
                    <h2 class="font-bold text-2xl text-gray-800 leading-tight"> AGREGAR NEW BAG</h2>
                    <form  method="POST" action="/dashboard" >
                    @csrf
                        <div class="form-group">
                            <label for="bagName">Nombre</label>
                            <input type="text" name="pname" class="form-control" id="bagName" aria-label="Default" placeholder="Lemonade Bag" aria-describedby="inputGroup-sizing-default">
                            <small id="bagNameHelp" class="form-text text-muted">Be original please.</small>
                        </div>
                        <div class="form-group">
                            <label for="bagPrice">Precio</label>
                            <input type="number" name="pprice" class="form-control" id="bagPrice" aria-label="Default" placeholder="1000€" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="form-group">
                            <label for="bagMaterial">Material</label>
                            <input type="text" name="pmaterial" class="form-control" id="bagMaterial" aria-label="Default" placeholder="Material de..." aria-describedby="inputGroup-sizing-default">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                    <br><br><br>
                    <h2 class="font-bold text-2xl text-gray-800 leading-tight">LISTA DE BAGS</h2>
                    <table  class="table table-striped">
                        <thead class="thead-dark">
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio(€)</th>
                            <th scope="col">Material</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                        @foreach($bags as $bag)

                            <tr>              
                                <td contenteditable>{{$bag['id']}} </td>
                                <td contenteditable>{{$bag['name']}} </td>
                                <td contenteditable>{{$bag['price']}}€</td>
                                <td contenteditable>{{$bag['material']}}</td>
                                <form method="POST" action="/dashboard/{{ $bag['id'] }}">
                                    @csrf
                                    <input type="hidden" name="pname" value="{{ $bag['name']}}">
                                    <input type="hidden" name="pprice" value="{{ $bag['price'] }}">
                                    <input type="hidden" name="pmaterial" value="{{ $bag['material'] }}">
                                    <td>
                                        <button class="btn btn-outline-info" type="submit">Editar</button>
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" onclick="return confirm('¿Seguro que quieres eliminar esta Bag definitivamente?')" type="submit">Eliminar</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table> 
                </div>
               
               
            </div>
        </div>
        @if (session('success'))
                    <script>
                    alert("{{ session('success') }}");
                    </script>
                    @endif
    </div>
</x-app-layout>
