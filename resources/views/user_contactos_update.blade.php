@extends('layout')

@section('content')
	<div class="container mt-3">
		<div class="m-auto w-75">
			<h1>Actualizar contacto</h1>
			<form class="card card-body " method="POST" action="{{ route('contactos_update_post', ['usuario_id' => $contacto->id]) }}">
				@csrf
				<input value="{{ $contacto->nombre ?? null }}" type="text" class="form-control mb-4" name="contact-update-name"
					placeholder="Nombre...">
				<input value="{{ $contacto->apellido ?? null }}" type="text" class="form-control mb-4"
					name="contact-update-lastname" placeholder="Apellido...">
				<input value="{{ $contacto->telefono ?? null }}" type="text" class="form-control mb-4" name="contact-update-phone"
					placeholder="Telefono...">
				<input value="{{ $contacto->email ?? null }}" type="text" class="form-control mb-4" name="contact-update-email"
					placeholder="Email...">
				<input value="{{ $contacto->direccion ?? null }}" type="text" class="form-control mb-4"
					name="contact-update-address" placeholder="Direccion...">

				<select class="form-control mb-2" name="contact-update-grupo" id="contact-update-grupo">

					@if ($contacto->grupo_id == null)
						<option value="null" disabled selected>Sin Grupo</option>
						@foreach ($grupos as $grupo)
							<option>{{ $grupo['nombre'] }}</option>
						@endforeach
					@else
						@foreach ($grupos as $grupo)
							@if ($grupo['id'] == $contacto->grupo_id)
								<option selected>{{ $grupo['nombre'] }}</option>
							@else
								<option>{{ $grupo['nombre'] }}</option>
							@endif
						@endforeach
					@endif

				</select>
				<button type="submit" class="btn btn-success mt-4">Actualizar</button>
			</form>
		</div>
	</div>
@endsection
