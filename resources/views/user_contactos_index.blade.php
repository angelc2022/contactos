@extends('layout')

@section('content')
	<div class="container">
		<h1>Contactos</h1>
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
                        <td>{{ Str::ucfirst($contacto->nombre) }} {{Str::ucfirst($contacto->apellido)}}</td>
                        <td>{{ $contacto->grupo }}</td>
                        <td>{{ $contacto->telefono }}</td>
                        <td>{{ $contacto->correo }}</td>
                        <td>{{ $contacto->direccion }}</td>
                        <td>
                            <div class='d-flex' style="gap:2rem">
                                <div style='display: inline'>
                                    <form method="get" action="{{ route('user_contactos_update', ['id' => $contacto->id])}}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                    </form>
                                </div>
                                <div style='display: inline'>
                                    <form method="post" action="{{ route('contactos_destroy_post', ['id' => $contacto->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
			</tbody>

		</table>
	</div>
@endsection
