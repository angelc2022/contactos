@extends('layout')

@section('content')
	<div class="container mt-3">
		<div class="m-auto w-75">
			@if (session('error'))
				<div class="alert alert-danger mt-2" role="alert">{{ session('error') }}</div>
			@endif
			<h1>Actualizar contacto</h1>
			<form class="card card-body " method="POST"
				action="{{ route('contactos_update_post', ['contacto_id' => $contacto->id]) }}">
				@csrf
				@error('nombre')
					<div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
				@enderror
				<input value="{{ $contacto->nombre ?? null }}" type="text" class="form-control mb-4"
					name="nombre"
					placeholder="Nombre...">
				@error('apellido')
					<div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
				@enderror
				<input value="{{ $contacto->apellido ?? null }}" type="text" class="form-control mb-4"
					name="apellido" placeholder="Apellido...">
				@error('telefono')
					<div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
				@enderror
				<input value="{{ $contacto->telefono ?? null }}" type="text" class="form-control mb-4"
					name="telefono"
					placeholder="Telefono...">
				@error('email')
					<div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
				@enderror
				<input value="{{ $contacto->email ?? null }}" type="text" class="form-control mb-4"
					name="email"
					placeholder="Email...">
				@error('direccion')
					<div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
				@enderror
				<input value="{{ $contacto->direccion ?? null }}" type="text" class="form-control mb-4"
					name="direccion" placeholder="Direccion...">
				<select class="form-control mb-2" name="select_grupo" id="select_grupo">

					@if ($contacto->grupo_id == null)
						<option value="null" disabled selected>Sin Grupo</option>
						@foreach ($grupos as $grupo)
							<option value="{{ $grupo['id'] }}">{{ $grupo['nombre'] }}</option>
						@endforeach
					@else
						@foreach ($grupos as $grupo)
							@if ($grupo['id'] == $contacto->grupo_id)
								<option value="{{ $grupo['id'] }}" selected>{{ $grupo['nombre'] }}</option>
							@else
								<option value="{{ $grupo['id'] }}">{{ $grupo['nombre'] }}</option>
							@endif
						@endforeach
					@endif

				</select>
				<button type="submit" class="btn btn-success mt-4">Actualizar</button>
			</form>
		</div>
	</div>
@endsection
