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


}catch(PDOExeption $erro){
    echo"Erro ao conectar no banco de dados ".$erro;
}
$sql = "select * from tb_funcionario";
$comando = $conexao->prepare($sql);
$comando->execute();
$funcionarios = $comando ->fetchALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>LISTA DE FUNCIONARIOS</title>
</head>
<body>
   <header>
    <h1>
        LISTA DE FUNCIONARIOS
    </h1>
   </header>

   <main>
<div id="container">
<table>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>E-MAIl</th>
        <th>TELEFONE</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($funcionarios as $funcionario):?>
    <tr>
        <td><?php echo $funcionario ['id'];?></td>
        <td><?php echo $funcionario ['nome'];?></td>
        <td><?php echo $funcionario ['email'];?></td>
        <td><?php echo $funcionario ['telefone'];?></td>
        <td><a class="btn-dell" href="deletar-funcionario.php?id=<?php echo $funcionario ['id'];?>">DELETAR</a>
    <a class="btn-edit" href="editar-funcionario.php?id=<?php echo $pizza ['id'];?>">EDITAR</a></td>
    </tr>
    <?php endforeach; ?>
</table>
</div>

   </main>
</body>
</html>

















