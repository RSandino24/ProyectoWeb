@extends('admin.layout.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card border-0 shadow rounded-4">

                <div class="card-header bg-success text-white">Crear Producto</div> <!-- Cambiado a bg-success -->

                <div class="card-body">

                    <form action="{{ url('product') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        
                        @include('admin.product.form.form')

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection
