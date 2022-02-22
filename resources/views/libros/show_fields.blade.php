<div class="col-md-12">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('id', 'Id del libro:') !!}
            <p>{!! $libro->id !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('categoria', 'Categoría del Libro:') !!}
            <p>{!! $libro->categoria !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('area', 'Área:') !!}
            <p>{!! $libro->area !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('genero', 'Género:') !!}
            <p>{!! $libro->genero !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('titulo', 'Título:') !!}
            <p>{!! $libro->titulo !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('autor', 'Autor:') !!}
            <p>{!! $libro->autor !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('editorial', 'Editorial:') !!}
            <p>{!! $libro->editorial['nombre'] !!}</p>
        </div>
    
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('cant_ejemplares', 'Cantidad de Ejemplares:') !!}
            <p>{!! $libro->cant_ejemplares !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('anio', 'Año:') !!}
            <p>{!! $libro->anio !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('nivel', 'Nivel:') !!}
            <p>{!! $libro->nivel !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('region', 'Región:') !!}
            <p>{!! $libro->region !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('coleccion', 'Colección:') !!}
            <p>{!! $libro->coleccion['nombre'] !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('num_coleccion', 'N° Colección:') !!}
            <p>{!! $libro->num_coleccion !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('ubicacion', 'Ubicación:') !!}
            <p>{!! $libro->ubicacion !!}</p>
        </div>
    
    </div>
    <a href="{!! route('libros.index') !!}" class="btn btn-primary pull-right">Volver</a>
</div>
