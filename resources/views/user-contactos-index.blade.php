@extends('layout')

@section('content')
	<div class="container">
		<h1>Contactos</h1>
		<table class="table table-hover table-primary ">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Lorem</th>
					<th scope="col">Ipsum</th>
					<th scope="col">Dolor</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>

				@for ($i = 0; $i < 7; $i++)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>Sit</td>
						<td>Amet</td>
						<td>Consectetur</td>
						<td>
                            <div class='d-flex' style="gap:2rem">
                                <div style='display: inline'>
                                    <form method="get" action="{{ route('user-contactos-update')}}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                    </form>
                                </div>
                                <div style='display: inline'>
                                    <form method="post" action="{{ route('user-contactos-destroy', ['id_usuario' => $i]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
						</td>
					</tr>
				@endfor
			</tbody>

		</table>
	</div>
@endsection
