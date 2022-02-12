<!DOCTYPE HTML>
<!--
	Eventually by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>X-Educación</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css"/>

		<link rel="stylesheet" href="{{ asset('web/css/custom.css') }}">

		<!-- Styles -->
        <style>
            
            
        </style>

	</head>
	<body class="is-preload">
		<div class="relative flex py-4 sm:pt-0">
			@if (Route::has('login'))
				<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
					@auth
						<a href="{{ url('/home') }}" class="text-sm">Inicio</a>
					@else
						<a href="{{ route('login') }}" class="text-sm">Entrar</a>

						@if (Route::has('register'))
							<a href="{{ route('register') }}" class="ml-4 text-sm">Registrarse</a>
						@endif
					@endauth
				</div>
			@endif
		</div>

		<!-- Header -->
			<header id="header">
				<h1>Cruzada por la eduación</h1>
				<p>Debes registrar tu correo para poder disfrutar<br />
				de las descargas educativas. </p>
			</header>

		

		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; pocketEducation.</li></li>
				</ul>
			</footer>

		<!-- Scripts -->		
			<script src="{{ asset('assets/js/main.js') }}"></script>

	</body>
</html>