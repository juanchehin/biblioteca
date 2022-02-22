@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/lib/w3.css">

    <section class="content-header">
        <h1 class="pull-left"> @yield('title')
        </h1>
    </section>

    <div class="content">
        @include('dashboard.msjFlash')
        <div class="clearfix"></div>
                @yield('datos')
        <div class="row">
            <div class="col-md-12">
                    <div class="box box-primary">
                        @yield('datoin')
                    </div>         
            </div>
            
            <div class="col-md-12">
                <div class="clearfix"></div>
                    <div class="box box-primary">
                        @yield('botones_prestamo')
                    </div>         
            </div>
        </div>
    </div>
@endsection
