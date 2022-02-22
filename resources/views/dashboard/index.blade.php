@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/lib/w3.css">

    <section class="content-header">
        <h1 class="pull-left"> @yield('title')
        </h1>
        <h1 class="pull-right">
            @yield('botonqr')
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href=" @yield('url') ">
            @yield('agregar')
            
            </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('dashboard.msjFlash')

        <div class="clearfix"></div>
        <div class="box box-primary">
          
                 @yield('datoin')

                   
          
        </div>
    </div>   
@endsection
