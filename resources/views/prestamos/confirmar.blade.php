@extends('layouts.app')

@section('content')
    <section class="content-header">
        
    </section>

        <div class="col-md-12" style="align:center; position:relative" >
            <div class="box box-primary">
                <div class="box-body">
                {!! Form::open(['route'=>'prestamos.confirmar','method'=>'POST', 'class'=>'form-horizontal row-border']) !!}
                     <div class="row" style="margin-left: 8px">
                        <?php $i = 0; ?>
                        @foreach ($array as $items)
                            
                            @if($items==null) 

                                <h4>No hay libros seleccionados</h4><hr/>   
                            @else
                                <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('Libro Nº','Libro Nº') !!}
                                                {!! Form::text('ids[]',$items->id, ['class'=>'form-control','readonly']
                                                ) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('Titulo','Titulo') !!}
                                                {!! Form::text('titulo',$items->titulo, ['class'=>'form-control','readonly']
                                                ) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('Autor','Autor') !!}
                                                {!! Form::text('autor',$items->autor,
                                                ['class'=>'form-control','readonly']
                                                ) !!}
                                            </div>
                                        </div>
                                        <div style="margin-top:9%; margin-left: 20%;" class="col-md-4">
                                            <div class="form-group">  
                                            {!! Form::label('Cantidad a prestar','Cantidad a prestar') !!}
                                            {!! Form::selectRange('cantidad_prestar[]', 1, $cant_prest[$i],
                                            ['class'=>'form-control']
                                            ) !!}
                                            </div>
                                        </div>
                                
                                        {{-- <div class="form-group">
                                            {!! Form::label('Us Nº','User Nº') !!}
                                            {!! Form::text('user',$user,
                                            ['class'=>'form-control','readonly']
                                        ) !!}
                                        </div> --}}
                                </div>
                            @endif  
                            <hr style="border-top: 2px solid #3c8dbc"/>
                            <?php $i++; ?>
                        @endforeach
                            
                        
                    </div>
                    <input type="hidden" name="user" value="{!! $user !!}">

                    <div class="box-footer">
                        <div class="form-group col-sm-10 col-md-10 col-lg-10" align="right">
                            {!! Form::submit('Confirmar Préstamo',['class'=>'btn btn-primary pull-right']) !!}
                            <a href="{!! url('/prestamos') !!}" class="btn btn-default">Cancelar</a>
                            {!! Form::close() !!}
                        </div>
                    </div>                  
            </div>
        </div>            
    </div>
    
@endsection