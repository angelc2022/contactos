@extends('layout')

@section('content')
	<section class="vh-100 gradient-custom">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card bg-light text-dark" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">
							{{-- corregir enviar mediante post a la ruta de validacion y qeu retorne al incio de contactos --}}
							<form method="POST" action="{{ route('user_register_index_post') }}" class="mb-md-5 mt-md-4">
								<h2 class="fw-bold mb-2 text-uppercase">inicio de sesión</h2>
								<p class="text-dark mb-4">Ingrese las credenciales</p>
								@csrf
								<div class="form-outline form-white m-2">
									<input type="email" id="email" class="form-control form-control-lg" name="email"
										placeholder="Correo electronico" />
								</div>
								@error('email')
									<div class="alert alert-danger m-2" role="alert">
										{{ $message }}
									</div>
								@enderror
								<div class="form-outline form-white m-2">
									<input type="password" id="password" class="form-control form-control-lg" name="password"
										placeholder="Contraseña" />
								</div>
								@error('password')
									<div class="alert alert-danger m-2" role="alert">
										{{ $message }}
									</div>
								@enderror
								<button class="btn btn-outline-dark btn-lg px-5" type="submit">Iniciar</button>
							</form>
							<div>
								<p class="mb-0">Aun no tienes una cuenta? <a href="{{ route('user_register_create') }}"
										class="text-dark fw-bold">Registrarse.</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
