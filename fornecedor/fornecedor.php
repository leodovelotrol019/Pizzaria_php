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
$produto = $_POST['produto'];

$sql = "insert into tb_fornecedor (nome,email,telefone,produto) values ('$nome','$email','$telefone','$produto')";
$comando = $conexao->prepare($sql);
$comando->execute();
echo"FORNECEDOR cadastrado";
}
catch (PDOExeption $erro){
    echo"ERRO ao conectar ao BANCO DE DADOS";

}







?>