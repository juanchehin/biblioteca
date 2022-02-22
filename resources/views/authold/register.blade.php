@extends('layout.front')

@section('content')
    <div class="login-area">
        <div class="bg-image">
            <div class="login-signup">
                <div class="container">
                    <div class="login-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="login-logo">
                                    <img src="{{asset('img/logo-ciidept.png')}}" alt="Agenda CIIDEPT" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="login-details">
                                    <ul class="nav nav-tabs navbar-right">
                                        <li class="active"><a  href="{{route('auth/register')}}">Registrar</a></li>
                                        <li ><a  href="{{route('auth/login')}}">Ingresar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="tab-content">
                        <div id="register" class="tab-pane fade in active">
                           <div class="login-inner">
                                <div class="title">
                                    <h1>Registro de usuarios</h1>
                                    @if (Session::has('errors'))
                                        <div class="alert alert-warning" role="alert">
                                        <ul>
                                         
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif  
                                </div>
                                <div class="login-form">
                                  {!! Form::open(['route' => 'auth/register', 'class' => 'form']) !!}
                                             {!! csrf_field() !!}
                                        <div class="form-details">
                                            <label class="user">
                                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" id="username" required>
                                            </label>
                                            <label class="mail">
                                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" id="email" required>
                                            </label>
                                            <label class="pass">
                                                <input type="password" name="password" placeholder="Password" id="password" required>
                                            </label>
                                            <label class="pass">
                                                <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password" required>
                                            </label>
                                        </div>
                                        <button type="submit" class="form-btn" onsubmit="">Sent</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

