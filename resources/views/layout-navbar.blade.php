<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-secondary navbar-light ">
	<!-- Container wrapper -->
	<div class="container">

		<!-- Navbar brand -->
        <a class="navbar-brand text-dark" href="{{route('user-contactos-index')}}">Home</a>

		<!-- Toggle button -->
		<button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navDropDown"
			aria-controls="navDropDown" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-bars"></i>
		</button>

		<!-- Collapsible wrapper -->
		<div class="collapse navbar-collapse" id="navDropDown">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0 col-md-12">
				<!-- Link -->
				<li class="nav-item col-md-8">
                    <a class="navbar-brand text-dark">{{"UserName"}}</a>
				</li>
                <li class="nav-item col-md-2">
					<a class="navbar-brand text-dark" href="{{route('user-contactos-create')}}">Crear Contacto</a>
				</li>
				<li class="nav-item col-md-2">
					<a class="navbar-brand text-dark" href="{{route('user-register-index')}}">Cerrar Session</a>
				</li>
			</ul>

		</div>
	</div>
	<!-- Container wrapper -->
</nav>
<!-- Navbar -->
