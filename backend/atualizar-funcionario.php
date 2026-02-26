<?php
 
//conexao do PHP com o banco de dados MYSQL
 define('SERVIDOR','localhost' );
 define('USUARIO','root');
 define('SENHA','');
 define('BANCO','db_pizzaria');

// string de conexao usando PDO
try{
$conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset=utf8",USUARIO,SENHA);

$conexao->setATTribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// echo "Conectado com sucesso!";

// Inserir os dados no banco
$nome            = $_POST['nome'];
$email       = $_POST['email'];
$telefone          = $_POST['telefone'];
$id               = $_GET['id'];

$sql = "UPDATE tb_funcionario SET nome='$nome', email='$email', telefone = '$telefone' WHERE id = $id ";

$comando = $conexao->prepare($sql);

$comando->execute();

// echo"cadastro realizado com sucesso";
header('Location: ../funcionarios/list.php ');


}catch(PDOExeption $erro){
    echo"Erro ao conectar no banco de dados ".$erro;
}




?>