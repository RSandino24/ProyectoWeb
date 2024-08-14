<div class="form-row">
    @if (isset($product))
    <div class="d-flex justify-content-center items-center">
    <img src="{{ asset('storage/' . $product['img_url']) }}" class="img-fluid rounded shadow" style="width: 200px; height:200px;" alt="">
    </div>
    @endif

    <div class="form-group mb-4">

        <label for="name">Nombre</label>

        <input type="text" 
        class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }} mt-2" id="name" 
        name="name" placeholder="" value="{{ isset($product) ? $product->name : old('name') }}">

        @if ($errors->has('name'))

        <div class="error invalid-feedback">

            <strong>{{ $errors->first('name') }}</strong>

        </div>

        @endif

    </div>

    

    <div class="form-group mb-4">

        <label for="stock">Cantidad</label>

        <input type="number" 
        class="form-control {{ $errors->has('stock') ? ' is-invalid' : '' }} mt-2" id="stock" 
        name="stock"
        value="{{ isset($product) ? $product->stock : old('stock') }}">

        @if ($errors->has('stock'))

        <div class="error invalid-feedback">

            <strong>{{ $errors->first('stock') }}</strong>

        </div>

        @endif

    </div>

    <div class="row mb-4 col-12">
        <div class="form-group col-6">
            <label for="unit_price">Precio unitario</label>
    
            <input type="number" 
            class="form-control {{ $errors->has('unit_price') ? ' is-invalid' : '' }} mt-2" id="unit_price" 
            name="unit_price"
            value="{{ isset($product) ? $product->unit_price : old('unit_price') }}">
    
            @if ($errors->has('unit_price'))
    
            <div class="error invalid-feedback">
    
                <strong>{{ $errors->first('unit_price') }}</strong>
    
            </div>
    
            @endif
        </div>

        <div class="form-group col-6">
            <label for="price">Precio Total</label>
        
            <input type="number" 
            class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }} mt-2" id="price" 
            name="price"
            value="{{ isset($product) ? $product->price : old('price') }}">
        
            @if ($errors->has('price'))
        
            <div class="error invalid-feedback">
        
                <strong>{{ $errors->first('price') }}</strong>
        
            </div>
        
            @endif
            
        </div>

    </div>

    <div class="form-group mb-4">

        <label for="brand">Marca</label>

        <input type="text" 
        class="form-control {{ $errors->has('brand') ? ' is-invalid' : '' }} mt-2" id="brand" 
        name="brand"
        value="{{ isset($product) ? $product->brand : old('brand') }}">

        @if ($errors->has('brand'))

        <div class="error invalid-feedback">

            <strong>{{ $errors->first('brand') }}</strong>

        </div>

        @endif

    </div>

    <div class="form-group mb-4">

        <label for="img_url">Imagen</label>

        <input type="file" 
        class="form-control {{ $errors->has('img_url') ? ' is-invalid' : '' }} mt-2" id="img_url" 
        name="img_url">

        @if ($errors->has('img_url'))

            <div class="error invalid-feedback">

                <strong>{{ $errors->first('img_url') }}</strong>

            </div>

        @endif

    </div>

    <div class="form-group mb-4">

        <label for="category_id" class="mb-2">Categoría</label>

        @if(isset($categories) && count($categories) > 0)
            <select class="form-control custom-select" name="category_id" id="category_id">

                <option value="">--- Seleccione la Categoría ---</option>

                @foreach($categories as $value)

                    <option value="{{ $value->id }}"
                    
                    @if(isset($product) && $product->category_id == $value->id)
                        selected
                    @elseif(old('category_id') == $value->id)
                        selected
                    @endif>

                        {{ $value->name }}
 
                    </option>

                @endforeach

            </select>
        @else 
            <p>
                No hay categorías agregadas 
            </p>
        @endif

        @if ($errors->has('category_id'))

            <div class="error invalid-feedback">

                <strong>{{ $errors->first('category_id') }}</strong>

            </div>

        @endif

    </div>

    <div class="form-group mb-4">
        <label for="description">Descripción</label>

        <textarea class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }} mt-2" 
        id="description" name="description" placeholder="Descripción del producto">{{ isset($product) ? $product->description : old('description') }}</textarea>

        @if ($errors->has('description'))

        <div class="error invalid-feedback">

            <strong>{{ $errors->first('description') }}</strong>

        </div>

        @endif
    </div>

    @if(isset($categories) && count($categories) > 0)
        @if(isset($product))

            <button type="submit" class="btn btn-success">Actualizar</button> <!-- Cambiado a btn-success -->

        @else

            <button type="submit" class="btn btn-success">Guardar</button> <!-- Cambiado a btn-success -->

        @endif
    @else
        <p>Tiene que agregar categorías primero <a href="/category">ir a Categorías</a></p>
    @endif

    <a href="/product" class="btn btn-secondary"> Regresar</a> <!-- Cambiado a btn-secondary para gris -->
</div>