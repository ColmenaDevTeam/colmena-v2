@extends('layouts.main_layout')
@section('customcss')

@endsection

@section('content')
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">{{isset($user) ? 'Edición' : 'Registro'}} de usuarios</h2>
				</div>
			</div>
		</div>
	</section>
	<section id="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<p> </p>
					@if (Session::has('status'))
						@if (Session::pull('status') == 'success')
							<div class="alert alert-success hidden" id="userDataSuccess">
								<strong>Success!</strong> Your message has been sent to us.
							</div>
						@else
							<div class="alert alert-error hidden" id="userDataError">
								<strong>Error!</strong> There was an error sending your message.
							</div>
						@endif
					@endif

				</div><!-- /.col-md-1-->
				@if ($errors->has('cedula'))
					<div class="alert alert-warning help-block">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>{{ $errors->first('cedula') }}</strong>
					</div>
				@endif
				@if ($errors->has('firstname'))
					<div class="alert alert-warning help-block">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>{{ $errors->first('firstname') }}</strong>
					</div>
				@endif
				@if ($errors->has('lastname'))
					<div class="alert alert-warning help-block">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>{{ $errors->first('lastname') }}</strong>
					</div>
				@endif
				@if ($errors->has('user_type'))
					<div class="alert alert-warning help-block">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>{{ $errors->first('user_type') }}</strong>
					</div>
				@endif
				@if ($errors->has('email'))
					<div class="alert alert-warning help-block">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>{{ $errors->first('email') }}</strong>
					</div>
				@endif
				@if ($errors->has('phone'))
					<div class="alert alert-warning help-block">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>{{ $errors->first('phone') }}</strong>
					</div>
				@endif
				@if ($errors->has('birthdate'))
					<div class="alert alert-warning help-block">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>{{ $errors->first('birthdate') }}</strong>
					</div>
				@endif
				@if ($errors->has('gender'))
					<div class="alert alert-warning help-block">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>{{ $errors->first('gender') }}</strong>
					</div>
				@endif
			</div><!-- /..row-->
			<div class="row">
				<div class="user-data-form">
					<form id="user-data-form" role="form" method="post">
						{{ csrf_field() }}
						@if(isset($user))
							<input type="hidden" name="id" value="{{ $user->id }}">
						@endif
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="form-group has-feedback">
									<label for="cedula">Cedula</label>
									<input type="text" class="form-control" id="cedula" name="cedula" placeholder="23850459" value="{{ isset($user) ? $user->cedula : ''}}{{ old('cedula') ? old('cedula') : ''}}">
									<i class="fa fa-user form-control-feedback"></i>
								</div>
							</div><!-- /.col-xs-1 col-sm-4 col-md-4 col-lg-3 -->
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="form-group has-feedback">
									<label for="firstname">Nombres</label>
									<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Simon Jose" value="{{ isset($user) ? $user->firstname : ''}}">
									<i class="fa fa-user form-control-feedback"></i>
								</div>

							</div><!-- /.col-xs-1 col-sm-4 col-md-4 col-lg-3 -->
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="form-group has-feedback">
									<label for="lastname">Apellidos</label>
									<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Bolivar Palacios" value="{{ isset($user) ? $user->lastname : ''}}">
									<i class="fa fa-user form-control-feedback"></i>
								</div>
							</div><!-- /.col-xs-1 col-sm-4 col-md-4 col-lg-3 -->

							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="form-group has-feedback">
									<label for="user_type">Tipo de Usuario</label><br>
									<select name="user_type" id="user_type" class="form-control">
									   <option value="Docente">Docente</option>
									   <option value="Administrativo">Administrativo</option>
									   <option value="Mantenimiento">Mantenimiento</option>
									</select>
								</div>
							</div><!-- /.col-xs-1 col-sm-4 col-md-4 col-lg-3 -->
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="form-group has-feedback">
									<label for="email">Correo Electronico</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="ElLiber@Latam.com" value="{{ isset($user) ? $user->email : ''}}">
									<i class="fa fa-envelope form-control-feedback"></i>
								</div>
							</div><!-- /.col-xs-1 col-sm-4 col-md-4 col-lg-3 -->
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="form-group has-feedback">
									<label for="phone">Numero de telefono</label>
									<input type="tel" class="form-control" id="phone" name="phone" placeholder="04265529587" value="{{ isset($user) ? $user->phone : ''}}">
									<i class="fa fa-user form-control-feedback"></i>
								</div>
								@if ($errors->has('phone'))
									<span class="help-block">
										<strong>{{ $errors->first('phone') }}</strong>
									</span>
								@endif
							</div><!-- /.col-xs-1 col-sm-4 col-md-4 col-lg-3 -->
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="form-group has-feedback">
									  <label for="birthdate">Fecha de nacimiento</label>
									  <input type="date" name="birthdate" class="form-control input-group" data-inputmask="'mask': '99/99/9999'" value="{{ isset($user) ? $user->birthdate : ''}}">
									  <i class="fa fa-calendar form-control-feedback"></i>
									  @if ($errors->has('birthdate'))
										  <span class="help-block">
											  <strong>{{ $errors->first('birthdate') }}</strong>
										  </span>
									  @endif
								</div>
							</div><!-- /.col-xs-1 col-sm-4 col-md-4 col-lg-3 -->
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="form-group has-feedback">
									<label for="gender">Sexo</label><br>
									Masculino <input type="radio" name="gender" value="1" {{ isset($user) && $user->gender ? 'checked' : ''}}>
									Femenino <input type="radio" name="gender" value="0" {{ isset($user) && !$user->gender ? 'checked' : ''}}>
								</div>
								@if ($errors->has('gender'))
									<span class="help-block">
										<strong>{{ $errors->first('gender') }}</strong>
									</span>
								@endif
							</div><!-- /.col-xs-1 col-sm-4 col-md-4 col-lg-3 -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<input type="submit" value="{{isset($user) ? 'Editar' : 'Registrar'}} usuario" class="btn btn-default">
							</div> <!-- /.col-xs-12 col-sm-12 col-md-12 col-lg-12-->
						</div><!-- -/.row-->
					</form>
				</div><!-- /.contact-form -->
			</div><!-- /.row -->
		</div><!-- /.container-->
	</section>
@endsection

@section('customjs')
	<script type="text/javascript" src="/js/jquery.inputmask.bundle.min.js"></script>
@endsection
