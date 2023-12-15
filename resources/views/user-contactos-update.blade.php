@extends('layout')

@section('content')
	<div class="container">
		<h1>Actualizando Contacto con ID: <span>{{ session('_token') }}</span></h1>
		<form class="card card-body " method="POST" action="{{ route('printer-post') }}">
			@csrf
			<input type="text" class="form-control mb-2" name="contact-update-name" placeholder="Nombre...">
			<input type="text" class="form-control mb-2" name="contact-update-lastname" placeholder="Apellido...">
			<input type="text" class="form-control mb-2" name="contact-update-phone" placeholder="Telefono...">
			<input type="text" class="form-control mb-2" name="contact-update-email" placeholder="Email...">
			<input type="text" class="form-control mb-2" name="contact-update-address" placeholder="Direccion...">

			<select class="form-control mb-2" name="contact-update-grupo" id="contact-update-grupo">
				<option value="-1" selected disabled>Seleccione un grupo</option>
				<option value="1">Familia</option>
				<option value="2">Amigos</option>
				<option value="3">Trabajo</option>
				<option value="4">Otros</option>
			</select>
			<button type="submit" class="btn btn-success">Actualizar</button>
		</form>
	</div>
@endsection
