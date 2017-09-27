<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/style.css">

</head>

<body>
	
	<nav class="navbar navbar-default bg-primario">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">
					Age of Philosophy 
				</a>
			</div>
		</div>
	</nav>

	<div class="inner-screen">
		<form class="form" method="post" action="valida.php">
			<input id="loginInput" name="usuario" type="text" class="zocial-dribbble" placeholder="Login" /> 
			<input id="passwdInput" name="senha" type="password" placeholder="Senha" /> 
			<input type="submit" value="Login"/>
		</form>
	</div>

</body>
</html>
