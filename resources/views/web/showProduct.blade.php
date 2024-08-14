@extends('web.layout.app')

@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0 shadow rounded-4">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">Información del producto</h4>
                        </div>
                        <div class="card-body p-4">
                            <h2 class="mb-4 text-center text-success">{{ $product->name }}</h2>

                            @if (isset($product))
                                <div class="d-flex justify-content-center mb-4">
                                    <img src="{{ asset('storage/' . $product['img_url']) }}" class="img-fluid rounded" style="width: 200px; height: 200px; object-fit: cover;" alt="">
                                </div>
                            @endif

                            <div class="mb-4">
                                <h4><span class="text-success">Categoría:</span> {{ $product->category->name }}</h4>
                            </div>

                            <div class="mb-4">
                                <h4><span class="text-success">Marca:</span> {{ $product->brand }}</h4>
                            </div>

                            <div class="mb-4">
                                <h4><span class="text-success">Disponible:</span> {{ $product->stock }}</h4>
                            </div>

                            <div class="mb-4">
                                <h4><span class="text-success">Descripción:</span> {{ $product->description }}</h4>
                            </div>
                        </div>
                        <div class="card-footer bg-light text-center">
                            <a href="/" class="btn btn-secondary btn-lg">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
