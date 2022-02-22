@extends('layouts.app')

@section('content')
    <section class="content-header">
        
    </section>

        <div class="col-md-12" style="align:center; position:relative" >
            <div class="box box-primary">
                <div class="box-body">
                {!! Form::open(['route'=>'qr.pdf','method'=>'POST', 'target'=>'_blank','class'=>'form-horizontal row-border']) !!}

                    <div class="row" style="margin-left: 8px">
                        @foreach ($array as $items)

                            @if($items==null) 

                                <h4>No hay libros seleccionados</h4><hr/>   
                            @else
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        {!! Form::label('Libro Nº','Libro Nº') !!}
                                        {!! Form::text('ids[]',$items->id,
                                       ['class'=>'form-control','readonly']
                                        ) !!}
                                        </div>
                                        <div class="form-group">
                                        {!! Form::label('Titulo','Titulo') !!}
                                        {!! Form::text('titulos',$items->titulo,
                                       ['class'=>'form-control','readonly']
                                        ) !!}
                                        </div>
                       
                                        <div class="form-group">
                                            {!! Form::label('Autor','Autor') !!}
                                            {!! Form::text('autores',$items->autor,
                                            ['class'=>'form-control','readonly']
                                        ) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-offset-2"><br></br><br></br>
                                        <div class="form-group">           
                                        {!! Form::label('QR', 'Codigo QR:   ') !!}
                                            <img src="data:image/png;base64,{!!$items->qr_img!!}" alt="barcode"></img>
                                        </div> 
                                    </div>
                                </div>
                            @endif  
                            <hr style="border-top: 2px solid #3c8dbc"/>
                        @endforeach
                        
                    </div>  
                    <div class="box-footer">
                        <div class="form-group col-sm-10 col-md-10 col-lg-10" align="right">
                            {!! Form::submit('Generar PDF',['class'=>'btn btn-primary pull-right']) !!}
                            <a href="{!! route('libros.index') !!}" class="btn btn-default">Cancelar</a>
                    {!! Form::close() !!}
                        </div>
                    </div>                  
            </div>
        </div>            
    </div>
    
@endsection