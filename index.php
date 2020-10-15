<?php
session_start();
require 'conection.php';

//SE NÃO ESTIVER LOGADO, VAI PARA A TELA DE LOGIN
if(empty($_SESSION['logado'])){
    header("Location: login.php");
    exit;
}

$email ='';
$cod = '';

$sql = "SELECT email, codigo FROM userslogin WHERE id='".addslashes($_SESSION['logado'])."'";
$sql = $pdo->query($sql);
if($sql->rowCount()>0){
    $info = $sql->fetch();
    $email = $info['email'];
    $cod = $info['codigo'];
}
?>

<h1>AREA INTERNA DO SISTEMA</h1>
<p>Usuário: <?php echo $email; ?> - <a href="sair.php">Sair</a></p>
<p>Link: http://localhost/projeto_convite/cadastro.php?codigo=<?php echo $cod; ?></p>