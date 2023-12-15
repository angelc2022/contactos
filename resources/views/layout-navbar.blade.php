<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-secondary navbar-light ">
	<div class="container">
		<ul class="col-12 navbar-nav">
			<li class="nav-item col-1"><a class="navbar-brand" href="#">Inicio</a></li>
            <li class="nav-item col-1"><a class="navbar-brand" href="#">- {{Auth()->User()->name}}</a></li>
            <li class="nav-item col-7"><a class="navbar-brand" href="#"></a></li>
            <li class="nav-item col-3 text-end">
                <form action="{{ route('user_register_logout') }}" method="post">
                    @csrf
                    <a href="#" class="navbar-brand" onclick="this.closest('form').submit()">Cerrar Session</a>
                </form>
            </li>
		</ul>
	</div>
</nav>
<!-- Navbar -->
