@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Datos del Libro
        </h1>
    </section>
    
        <div class="col-md-12" style="align:center; position:relative" >
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row" align="padding-right: 20px">
                        @include('libros.show_fields')
                        
                    </div>                    
                </div>
            </div>            
        </div>
    
@endsection