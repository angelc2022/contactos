<!doctype html>
<html lang="en">

	<head>
		<title>Agenda Contactos</title>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no" />

		<!-- Bootstrap CSS v5.2.1 -->

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	</head>

	<body>
		@auth
			<header>
				@include('layout-navbar')
			</header>
			<main>
				@yield('content')
			</main>
			{{-- <footer class="bg-light text-center footer" id="footer">
				@include('layout-footer')
			</footer> --}}
		@endauth
		@guest
			<main class="bg-dark">
				@yield('content')
			</main>
		@endguest
		<!-- Bootstrap JavaScript Libraries -->
		<script
			src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
			integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
			crossorigin="anonymous"></script>

		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
			integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
			crossorigin="anonymous"></script>
	</body>

</html>
