@extends('admin.layout.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header bg-success text-white">Editar Categoría</div> <!-- Cambiado a bg-success -->

                <div class="card-body">

                    <form action="{{ url('category/'. $category->id) }}" method="POST">

                        @csrf

                        <input type="hidden" name="_method" value="PUT">

                        @include('admin.category.form.form')

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
