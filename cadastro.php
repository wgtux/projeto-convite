<?php
session_start();
require 'conection.php';

//VERIFICA SE O CODIGO FOI ENVIADO
if(!empty($_GET['codigo'])){
    $cod = addslashes($_GET['codigo']);
    //VERIFICA SE O CODIGO EXISTE NO BANCO
    $sql = "SELECT * FROM userslogin WHERE codigo = '$cod'";
    $sql = $pdo->query($sql);
    //VERIFICA SE TEM ALGUM CODIGO
    if($sql->rowCount()==0){
        header("Location: login.php");
        exit;
    }
}
else{
    header("Location: login.php");
    exit;
}

//VERIFICA
if(!empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    //VERIFICA SE JÁ EXISTE O EMAIL CADASTRADO
    $sql = "SELECT * FROM userslogin WHERE email = '$email'";
    $sql = $pdo->query($sql);
    
    //CADASTRANDO NO BANCO, SE O EMAIL NÃO EXISTIR
    if($sql->rowCount() <=0){

        $cod = md5(rand(0,9999).rand(0,9999));
        $sql = "INSERT INTO userslogin (email, senha, codigo) VALUES ('$email', '$senha', '$cod')";
        $sql = $pdo->query($sql);

        unset($_SESSION['logado']);
        header("Location: index.php");
        exit;
    }
}
?>

<h2>Faça seu Cadastro</h2>
<br />
<form method="POST">
    <span>Email: </span>
    <input type="text" name="email" /> </br></br>
    <span>Senha: </span>
    <input type="password" name="senha" /><br /></br>
    <input type="submit" value="Cadastrar"/>
</form>
