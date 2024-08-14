@extends('admin.layout.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header bg-success text-white">Categorías</div> <!-- Cambiado a bg-success -->

                <div class="card-body">

                    <div class="buttons level mb-4">
                        <div class="flex">
                            <a href="/category/create" class="btn btn-success">Agregar Categoría</a> <!-- Cambiado a btn-success -->
                        </div>
                    </div>

                    <div class="table-responsive mt-4">

                        <table class="table">

                            <thead class="thead-light">

                                <tr>
                                    <th scope="col" style="background-color: lightgray;">#</th>
                                    <th scope="col" style="background-color: lightgray;">Nombre</th>
                                    <th scope="col" style="background-color: lightgray;">Descripción</th>
                                    <th scope="col" style="background-color: lightgray;"></th>
                                </tr>

                            </thead>

                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td class="text-center"> <!-- Cambiado a text-center -->
                                            <a class="btn btn-secondary btn-sm mx-2" href="/category/{{ $category->id }}/edit">Editar</a> <!-- Cambiado a btn-secondary -->
                                            <form method="POST" action="{{ url('category/'. $category->id) }}" data-confirm="¿Estás Seguro?" class="d-inline">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button> <!-- Botón eliminar ya en btn-danger -->
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection
