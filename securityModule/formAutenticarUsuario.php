<?php
class formAutenticarUsuario
{
  public function formAutenticarUsuarioShow() 
  {
    ?>
  
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link href="./styles/login.css" rel="stylesheet" type="text/css">

</head>

<body>

  <div class="login">
    <div class="login-triangle"></div>

    <h2 class="login-header">INGRESE SU CUENTA</h2>

    <form name="formAuntenticarUsuario" method="POST" action="./securityModule/getUsuario.php" class="login-container">
      <p><input type="text" name="txtusuario" placeholder="Usuario"></p>
      <p><input type="password" name="txtpassword" placeholder="Password"></p>
      <p><input name="btnLogin" type="submit" value="Ingresar" /></p>
    </form>
    <img class="logotipo"></img>
  </div>
  </form>
</body>

</html>
<?php
  }
}
?>