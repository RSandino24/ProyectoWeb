<div class="form-row">
    <div class="form-group mb-4">
        <label for="name">Nombre</label>
        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="" value="{{ isset($category) ? $category->name : old('name') }}">
        @if ($errors->has('name'))
        <div class="error invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </div>
        @endif
    </div>

    <div class="form-group mb-4">
        <label for="description">Descripción</label>
        <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description" placeholder="Descripción de la categoría">{{ isset($category) ? $category->description : old('description') }}</textarea>
        @if ($errors->has('description'))
        <div class="error invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
        </div>
        @endif
    </div>

    <div class="form-group">
        @if(isset($category))
            <button type="submit" class="btn btn-success">Actualizar</button> <!-- Cambiado a btn-success -->
        @else
            <button type="submit" class="btn btn-success">Guardar</button> <!-- Cambiado a btn-success -->
        @endif
        <a href="/category" class="btn btn-secondary">Regresar</a> <!-- Cambiado a btn-secondary -->
    </div>
</div>
