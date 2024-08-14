@extends('web.layout.app')

@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow rounded-4">
                        <div class="card-body p-4">
                            <h2 class="fs-4 fw-bold text-center text-success mb-4"> {{ config('app.name', 'Laravel') }} Administrador</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-grid mb-3">
                                    <button class="btn btn-success btn-lg" type="submit">Iniciar Sesión</button>
                                </div>
                                <div class="d-grid">
                                    <a href="{{ url('/') }}" class="btn btn-secondary btn-lg">Regresar</a> <!-- Botón de Regresar -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
