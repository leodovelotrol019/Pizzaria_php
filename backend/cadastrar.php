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
$sabor            = $_POST['Sabor'];
$ingrediente       = $_POST['Ingrediente'];
$tamanho          = $_POST['Tamanho'];
$valor            = $_POST['Valor'];

$sql = "insert into tb_pizza (sabor,ingrediente,tamanho,valor) values('$sabor','$ingrediente','$tamanho','$valor')";

$comando = $conexao->prepare($sql);

$comando->execute();

echo"cadastro realizado com sucesso";


}catch(PDOExeption $erro){
    echo"Erro ao conectar no banco de dados ".$erro;
}




?>