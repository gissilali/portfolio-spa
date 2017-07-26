<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="{{ asset('assets/semantic/dist/semantic.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
	<link rel="stylesheet" href="{{ asset('css/iziToast.css') }}">
	<script>
		window.loggedIn = {{ Auth::check() ? 'true' : 'false' }}
	</script>
	<style>
		.slide-enter-active {
		  transition: all .3s ease;
		}
		.slide-leave-active {
		  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
		}
		.slide-enter, .slide-leave-to
		/* .slide-fade-leave-active for <2.1.8 */ {
		  transform: translateX(10px);
		  opacity: 0;
		}
	</style>
</head>
<body>
	<div id="app">
		@yield('content')
	</div>
	<script src="{{ asset('js/dashboard/main.js') }}"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			crossorigin="anonymous"></script>
	<script src="{{ asset('assets/semantic/dist/semantic.js') }}"></script>
	<script src="{{ asset('js/dashboard/ui-interactions.js') }}"></script>
</body>
</html>