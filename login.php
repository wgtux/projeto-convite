<?php
session_start();
require 'conection.php';

if(!empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);

    $sql = "SELECT id FROM userslogin WHERE email = '$email' AND senha = '$senha'";
    $sql = $pdo->query($sql);

    if($sql->rowCount()>0){
        $info = $sql->fetch();

        $_SESSION['logado'] = $info['id'];
        header("Location: index.php");
        exit;
    }
}
?>

<h2>Faça seu Login</h2>
<br />
<form method="POST">
    <span>Email: </span>
    <input type="text" name="email" /> </br></br>
    <span>Senha: </span>
    <input type="password" name="senha" /><br /></br>
    <input type="submit" value="Entrar"/>
    <span><a href="cadastro.php">Cadastro</a></span>
</form>

