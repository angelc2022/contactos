@extends('layout')

@section('content')
	<section class="vh-100 gradient-custom">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card bg-dark text-white" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">

							<form method="get" action="{{route ('user-contactos-index')}}" class="mb-md-5 mt-md-4">
                                @csrf
								<h2 class="fw-bold mb-2 text-uppercase">Registro de usuario</h2>
								<p class="text-white-50 mb-4">Ingrese las credenciales</p>

								<div class="form-outline form-white mb-4">
									<input type="text" id="logup_username" class="form-control form-control-lg" name="logup_username"
										placeholder="Usuario" />
								</div>
								<div class="form-outline form-white mb-4">
									<input type="email" id="logup_email" class="form-control form-control-lg" name="logup_email"
										placeholder="Correo electronico" />
								</div>

								<div class="form-outline form-white mb-4 ">
									<input type="password" id="logup_password" class="form-control form-control-lg" name="logup_password"
										placeholder="Contraseña" />
								</div>

								{{-- <p class="small mb-3 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> --}}

								<button class="btn btn-outline-light btn-lg px-5" type="submit">Iniciar</button>

							</form>

							<div>
								<p class="mb-0">Ya tienes una cuenta? <a href="{{ route('user-register-index') }}"
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
