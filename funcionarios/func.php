<?php
define('SERVIDOR','localhost');
define('USUARIO','root');
define('SENHA','');
define('BANCO','db_pizzaria');

try {
    
$conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset=utf8",USUARIO,SENHA);

$conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$sql = "insert into tb_funcionario (nome,email,telefone) values('$nome','$email','$telefone')";
$comando = $conexao->prepare($sql); 
$comando-> execute();

echo"Funcionario cadastrado com sucesso";


} catch (PDOException $erro) {
    echo"Erro ao conectar ao banco de dados";
}






?>