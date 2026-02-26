<?php
 
//conexao do PHP com o banco de dados MYSQL
 define('SERVIDOR','localhost' );
 define('USUARIO','root');
 define('SENHA','');
 define('BANCO','db_pizzaria');

// string de conexao usando PDO
try{
$conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset=utf8",USUARIO,SENHA);

$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo "Conectado com sucesso!";

// Inserir os dados no banco
$nome            = $_POST['nome'];
$email       = $_POST['email'];
$telefone          = $_POST['telefone'];
$produto            =$_POST['produto'];
$id               = $_GET['id'];

$sql = "UPDATE tb_fornecedor SET nome='$nome', email='$email', telefone = '$telefone', produto = '$produto' WHERE id = $id ";

$comando = $conexao->prepare($sql);

$comando->execute();

// echo"cadastro realizado com sucesso";
header('Location: ../fornecedor/listagem-de-fornecedor.php');



}catch(PDOException $erro){
    echo"Erro ao conectar no banco de dados ".$erro;
}




?>