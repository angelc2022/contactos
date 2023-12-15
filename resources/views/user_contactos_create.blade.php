@extends("layout")

@section("content")
	<div class="container mt-3">
		<div class="w-75 m-auto">
            {{-- si existe un error --}}
            @if (session("error"))
                <div class="alert alert-danger mt-2" role="alert">{{ session("error") }}</div>
            @endif
			<h1 class="">Creacion de Contacto</h1>
			<form class="card card-body" method="POST" action="{{ route("contactos_create_post") }}">
				@csrf
                @error("nombre")<div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>@enderror
				<input type="text" class="form-control mb-4" name="nombre" placeholder="Nombre...">
                @error("apellido")<div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>@enderror
				<input type="text" class="form-control mb-4" name="apellido" placeholder="Apellido...">
                @error("telefono")<div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>@enderror
				<input type="text" class="form-control mb-4" name="telefono" placeholder="Telefono...">
                @error("email")<div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>@enderror
				<input type="text" class="form-control mb-4" name="email" placeholder="Email...">
                @error("direccion")<div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>@enderror
				<input type="text" class="form-control mb-4" name="direccion" placeholder="Direccion...">

				<select class="form-control mt-2 mb-4" name="select_grupo" id="select_grupo">
					<option selected disabled>Seleccione un grupo</option>
					@foreach ($grupos as $grupo)
						<option value="{{ $grupo["id"] }}">{{ $grupo["nombre"] }}</option>
					@endforeach
				</select>

				<button type="submit" class="btn btn-primary">Crear Contacto</button>
			</form>
		</div>
	</div>
@endsection
