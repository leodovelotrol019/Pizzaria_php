<?php
 
//conexao do PHP com o banco de dados MYSQL
 define('SERVIDOR','localhost' );
 define('USUARIO','root');
 define('SENHA','');
 define('BANCO','db_pizzaria');

// string de conexao usando PDO
try{
$conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset=utf8",USUARIO,SENHA);

$id = $_GET['id'];

$sql = "delete from tb_funcionario where id = $id";

$comando = $conexao->prepare($sql);

$comando->execute();

header('Location: list.php');




}catch(PDOExeption $erro){
    echo"Erro ao conectar no banco de dados ".$erro;
}

