 
    @foreach ($libros as $items)
            <div class="form-group">
                <div style="display: none">
                {!! Form::text('ids_prest[]',$items->id_prest_lib, ['class'=>'form-control']) !!}
                {!! Form::text('ids_libros[]',$items->id, ['class'=>'form-control']) !!}
                {!! Form::text('ids_cantidades[]',$items->cantidad_prestadas, ['class'=>'form-control']) !!}
                </div>
            <u><h4>Libro Nº  {!! $items->id !!}</h4></u>   
                {!! Form::label('titulo', 'Título:') !!}
                {!! $items->titulo !!}
            </div> 
            <div class="form-group">
                {!! Form::label('autor', 'Autor:') !!}
                {!! $items->autor !!}
            </div>
            <div class="form-group">
                {!! Form::label('fecha', 'Fecha Préstamo:') !!}
                {!! $items->fecha !!}
            </div>   
            <div class="form-group">
                {!! Form::label('ubicacion', 'Ubicación:') !!}
                {!! $items->ubicacion !!}
            </div>
            <div class="form-group">
                {!! Form::label('cantidad_prestadas', 'Cantidad de ejemplares prestados:') !!}
                {!! $items->cantidad_prestadas !!}
            </div> 
    @endforeach
