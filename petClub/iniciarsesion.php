<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetClub</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>

<?php
        $request=$_REQUEST;
        require 'database.php';
		session_start();

		if (isset($_POST['email'])) {

            if (!empty($request['email']) && !empty($request['password'])) {
			
                $email = $request['email'];
                $password = $request['password'];
                $query ="SELECT * FROM usuario WHERE email ='$email' and password ='".md5($password)."'";
                if($query){
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_array($result);
                if(!empty($result) AND mysqli_num_rows($result) > 0){
                 $_SESSION['username'] = $row[5]; 
                 $_SESSION['idusuario'] = $row[0];
                 $_SESSION["tipoUsuario"] = $row[3];
                  
                    if($_SESSION["tipoUsuario"] == 2){
                        $_SESSION['veterinario'] = $row[3];
                        header("Location: usuario.php");
                    }else{
                        $_SESSION['cliente'] = $row[3];
                        header("Location: usuario.php");
                    }
                 
                }else{
                    echo'<script type="text/javascript"> alert("contraseña/email incorrectos"); 
                    window.location.href="iniciarsesion.php";</script>';
                }	
             }else{
                echo mysqli_error($query);   
            }		
            }
		}else{	
?>
     <?php
        require_once("header.php");
    ?>
    <main class="contenedor contenedor-iniciar-sesion">
        <div class="usuario-login">
            <img src="img/usuariologin.png" alt="Usuario login">
            <h1>LOGIN</h1>
        </div>

        <div class="formulario-login">
            <form action="iniciarsesion.php" method="POST">
                <div class="campo">
                    <img src="img/arroba.png" alt="Icono arroba">
                    <input type="email" id="email" placeholder="Email" name="email" required/>
                </div>

                <div class="campo">
                    <img src="img/candado.png" alt="Icono candado">
                    <input type="password" id="contraseña" placeholder="Contraseña" name="password" required/>
                </div>
                <a href="#">¿Olvidó su contraseña?</a>
                <div class="inferior">
                    <input class="boton-sesionn" type="submit" value="Entrar">
                    <div class="registro">
                        <p class="no-margin">¿No tienes una cuenta?</p><a href="#">Regístrate</a>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <?php
        require_once("footer.php");
    ?>
<?php } ?>

</body>

</html>