@extends('layout')

@section('content')
	<div class="container">
		<h1>Creacion de Contacto</h1>
		<form class="card card-body " method="post" action="{{ route('printer-post') }}">
            @csrf
			<input type="text" class="form-control mb-4" name="contact-create-name" placeholder="Nombre...">
			<input type="text" class="form-control mb-4" name="contact-create-lastname" placeholder="Apellido...">
			<input type="text" class="form-control mb-4" name="contact-create-phone" placeholder="Telefono...">
			<input type="text" class="form-control mb-4" name="contact-create-email" placeholder="Email...">
			<input type="text" class="form-control mb-4" name="contact-create-address" placeholder="Direccion...">

			<select class="form-control mb-2" name="contact-create-grupo" id="contact-create-grupo">
				<option value="-1" selected disabled>Seleccione un grupo</option>
				<option value="1">Familia</option>
				<option value="2">Amigos</option>
				<option value="3">Trabajo</option>
				<option value="4">Otros</option>
			</select>

			<button type="submit" class="btn btn-primary">Crear Contacto</button>
		</form>
	</div>
@endsection
