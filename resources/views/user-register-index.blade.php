@extends('layout')

@section('content')
	<section class="vh-100 gradient-custom">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card bg-dark text-white" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">
							{{-- corregir enviar mediante post a la ruta de validacion y qeu retorne al incio de contactos --}}
							<form method="get" action="{{ route('user-contactos-index') }}" class="mb-md-5 mt-md-4">
								@csrf
								<h2 class="fw-bold mb-2 text-uppercase">Iniciar Sesion</h2>
								<p class="text-white-50 mb-4">Ingrese su usuario y contraseña.</p>

								<div class="form-outline form-white mb-4">
									<input type="text" id="login_username" class="form-control form-control-lg" name="login_username"
										placeholder="Usuario" />
								</div>
								<div class="form-outline form-white mb-4 ">
									<input type="password" id="login_password" class="form-control form-control-lg" name="login_password"
										placeholder="Contraseña" />
								</div>

								{{-- <p class="small mb-3 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> --}}

								<button class="btn btn-outline-light btn-lg px-5" type="buttom">Iniciar</button>

							</form>

							<div>
								<p class="mb-0">Aun no tienes una cuenta? <a href="{{ route('user-register-create') }}"
										class="text-white-50 fw-bold">Registrarse.</a>
								</p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
