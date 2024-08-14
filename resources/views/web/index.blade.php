@extends('web.layout.app')

@section('content')
    <div class="container-fluid px-0 my-4">
        <div class="row no-gutters">
            <!-- Categorías -->
            <div class="col-md-3 col-lg-2 mb-4">
                <div class="card border-success rounded-lg shadow-sm" style="background-color: #D4D4D4;">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Categorías</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/') }}">
                            <div class="form-check">
                                @if(count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input form-check-lg" name="category[]" value="{{ $category['id'] }}" {{ in_array($category['id'], $search) ? 'checked' : '' }} id="category{{ $category['id'] }}">
                                            <label class="form-check-label font-weight-bold" for="category{{ $category['id'] }}" style="font-size: 1.2rem;">{{ $category['name'] }}</label>
                                        </div>
                                    @endforeach
                                @else 
                                    <p class="mt-2 text-start">No hay categorías disponibles</p>
                                @endif
                            </div>
                            <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success btn-block">Filtrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Productos -->
            <div class="col-md-9 col-lg-10">
                <div class="card border-success rounded-lg shadow-sm" style="background-color: #D4D4D4;"> <!-- Gris claro -->
                    <div class="card-header bg-success text-white">
                        <h1 class="mb-0">Todos Nuestros Productos</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                                        <div class="card border-light rounded shadow-sm">
                                            <a class="text-decoration-none" href="/show/{{$product['id']}}" style="color: black;">
                                                <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                                    <img class="card-img-top" src="{{ asset('storage/' . $product['img_url']) }}" alt="" style="object-fit: contain; max-height: 100%; width: auto; max-width: 100%;">
                                                </div>
                                                <div class="card-body p-2">
                                                    <h6 class="card-title">{{ $product['name'] }}</h6>
                                                    <p class="card-text text-muted">{{ $product['category']['name'] }}</p>
                                                    <p class="card-text">Marca: {{ $product['brand'] }}</p>
                                                    <h6 class="card-text text-dark">₡ {{ $product['price'] }}</h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h2 class="text-center">No hay productos agregados!</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
