@extends('admin.layout.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header bg-success text-white">Editar Producto</div> <!-- Cambiado a bg-success -->

                <div class="card-body">

                    <form action="{{ url('product/'. $product->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="_method" value="PUT">

                        @include('admin.product.form.form')

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection
