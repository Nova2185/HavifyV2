<?php require_once("view/encabezado.php"); ?>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="post">
			<h1 class="Crear">Crear mi cuenta</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>o usa tus datos de email</span>
			<input type="text" name="crearNombre" id="crearNombre" placeholder="Name"/>
			<input type="email" name="crearEmail" id="crearEmail" placeholder="Email"/>
			<input type="password" name="crearContrasena" id="crearContrasena" placeholder="Password"/>
			<button>Registrame!</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" method="post">
			<h1>Inicia sesión</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>O usa tu cuenta</span>
			<input type="email" name="Email" id="Email" placeholder="Email" />
			<input type="password" name="Contrasena" id="Contrasena" placeholder="Password" />
			<a href="#">Olvidaste tu contraseña?</a>
			<button>Iniciar sesión</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bienvenido de nuevo!</h1>
				<p>Para que podamos seguir ayudándote con tus hábitos, por favor inicia sesión con tus datos de usuario!</p>
				<button class="ghost" id="signIn">Inicia sesión</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hola, amig@!</h1>
				<p>Introduce tus datos personales para que comiences tu camino con nosotros!</p>
				<button class="ghost" id="signUp">Registrate</button>
			</div>
		</div>
	</div>
</div>
<script src="js/script.js"></script>

<?php require_once("view/pie.php"); ?>