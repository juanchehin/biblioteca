@extends('layouts.app')

@section('content')
    <section class="content-header">
        
    </section>

        <div class="col-md-12" style="align:center; position:relative" >
            <div class="box box-primary">
                <div class="box-body">
                {!! Form::open(['route'=>'qr.pdf_repeat','method'=>'POST', 'target'=>'_blank','class'=>'form-horizontal row-border']) !!}

                    <div class="row" style="margin-left: 8px">
                            @if($libro==null) 

                                <h4>No hay libros seleccionados</h4><hr/>   
                            @else
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        {!! Form::label('Libro Nº','Libro Nº') !!}
                                        {!! Form::text('id',$libro->id,
                                       ['class'=>'form-control','readonly']
                                        ) !!}
                                        </div>
                                        <div class="form-group">
                                        {!! Form::label('Titulo','Titulo') !!}
                                        {!! Form::text('titulo',$libro->titulo,
                                       ['class'=>'form-control','readonly']
                                        ) !!}
                                        </div>
                       
                                        <div class="form-group">
                                            {!! Form::label('Autor','Autor') !!}
                                            {!! Form::text('autor',$libro->autor,
                                            ['class'=>'form-control','readonly']
                                        ) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-md-offset-1"> <br></br><br></br>
                                        <div class="form-group">           
                                        {!! Form::label('QR', 'Codigo QR:   ') !!}
                                            <img src="data:image/png;base64,{!!$libro->qr_img!!}" alt="barcode"></img>                                           
                                        </div>
                                    </div>
                                    <div style="margin-top:9%" class="col-md-3">
                                        <div class="form-group">  
                                        {!! Form::label('Cantidad a imprimir','Cantidad a imprimir') !!}
                                        {!! Form::selectRange('cantidad_imp', 1, 10,
                                            ['class'=>'form-control']
                                        ) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif  
                            <hr style="border-top: 2px solid #3c8dbc"/>
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