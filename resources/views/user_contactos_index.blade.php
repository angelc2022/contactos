@extends('layout')

@section('content')
	<div class="container mt-3">
		<div class="d-flex col-12 align-items-center">
			<div class="col-10">
				<h1 class="">Contactos</h1>
			</div>
			<div class="col-2 text-end">
				<form action="{{ route('user_contactos_create') }}" method="get">
					@csrf
					<a class="btn btn-primary" href="#" onclick="this.closest('form').submit()">Crear Contacto</a>
				</form>
			</div>
		</div>
		<table class="table table-hover table-primary ">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre Completo</th>
					<th scope="col">Grupo</th>
					<th scope="col">Telefono</th>
					<th scope="col">Correo</th>
					<th scope="col">Direccion</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>

				@foreach ($contactos as $contacto)
					<tr>
						<th scope="row">{{ $contacto->id }}</th>
						<td>{{ Str::ucfirst($contacto->nombre) }} {{ Str::ucfirst($contacto->apellido) }}</td>
						@if ($contacto->grupo_id == null)
							<td>Sin Grupo</td>
						@else
							@foreach ($grupos as $grupo)
								@if ($grupo['id'] == $contacto->grupo_id)
									<td>{{ $grupo['nombre'] }}</td>
								@endif
							@endforeach
						@endif
						<td>{{ $contacto->telefono }}</td>
						<td>{{ $contacto->email }}</td>
						<td>{{ $contacto->direccion }}</td>
						<td>
							<div class='d-flex' style="gap:2rem">
								<div style='display: inline'>
									<a class="btn btn-success"
										href="{{ route('user_contactos_update') }}?contacto_id={{ $contacto->id }}">Modificar</a>
								</div>
								<div style='display: inline'>
									<form id="eliminarForm" method="POST"
										action="{{ route('contactos_destroy_post', ['contacto_id' => $contacto->id]) }}">
										@csrf
										<!-- Agrega el evento onclick para mostrar la confirmación -->
										<a type="button" class="btn btn-danger" href="#" onclick="confirmarEliminacion()">Eliminar</a>
									</form>
								</div>

								<!-- Agrega el script de confirmación -->
								<script>
									function confirmarEliminacion() {
										// Utiliza la función confirm de JavaScript
										if (confirm('¿Estás seguro de que deseas eliminar este contacto?')) {
											// Si el usuario confirma, envía el formulario
											document.getElementById('eliminarForm').submit();
										}
									}
								</script>

							</div>
						</td>
					</tr>
				@endforeach
			</tbody>

		</table>
		{{-- inserta paginacion para los contactos --}}
		<nav aria-label="Page navigation ">
			<ul class="pagination justify-content-center">
				<li class="page-item"><a class="page-link" href="{{ $contactos->previousPageUrl() }}">Página Anterior</a>
				</li>
				<li class="page-item"><a class="page-link" href="{{ $contactos->nextPageUrl() }}">Siguiente Página</a></li>
			</ul>
		</nav>
	</div>
@endsection
