@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Datos del Préstamo
        </h1>
    </section>
   {!! Form::open(['route'=>'prestamos.devolver','method'=>'POST', 'class'=>'form-horizontal row-border']) !!}
 
        <div class="col-md-12" style="align:center; position:relative" >
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row" style="margin-left: 10px;">
                        @include('prestamos.show_fields')    
                    </div>                    
                </div>
            </div>                
            <div class="box-footer">
                <div class="col-md-12" align="right">
                    {{-- <a href="{!! route('barcode.barcode') !!}" class="btn btn-default">Generar Código</a> --}}
                    <a href="{!! route('prestamos.index') !!}" class="btn btn-default">Cancelar</a>
                   {!! Form::submit('Devolver Libros',['class'=>'btn btn-primary'])!!}
                </div>
            </div> 
        </div>  
    {!! Form::close() !!}

@endsection