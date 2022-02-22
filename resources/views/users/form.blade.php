           
            <div class="form-group">
                {!! Form::label('name','Nombre')!!}
                {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Nombre','requiered'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('username','Usuario')!!}
                {!! Form::text('username',old('username'),['class'=>'form-control','placeholder'=>'Usuario','requiered'])!!}
            </div>
             <div class="form-group">
                {!! Form::label('email','Email')!!}
                {!! Form::email('email',old('email'),['class'=>'form-control','placeholder'=>'email','autocomplete'=>"off",'requiered'])!!}
            </div>

             <div class="form-group">
                {!! Form::label('password','Contraseña')!!}
                {!! Form::password('password',['class'=>'form-control','requiered'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('type','Tipo')!!}
                {!! Form::select('type',$roles,old('type')?old('type'):isset($rol[0])?$rol[0]:3,['class'=>'form-control','requiered'])!!}
            </div>
            
