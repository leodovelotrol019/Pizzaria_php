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
$sql = "select * from tb_fornecedor";
$comando = $conexao->prepare($sql);
$comando->execute();
$fornecedores = $comando ->fetchALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>LISTA DE FORNECEDORES</title>
</head>
<body>
   <header>
    <h1>
        LISTA DE FORNECEDORES
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
        <th>PRODUTO</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($fornecedores as $fornecedor):?>
    <tr>
        <td><?php echo $fornecedor ['id'];?></td>
        <td><?php echo $fornecedor ['nome'];?></td>
        <td><?php echo $fornecedor ['email'];?></td>
        <td><?php echo $fornecedor ['telefone'];?></td>
        <td><?php echo $fornecedor ['produto'];?></td>
        <td><a class="btn-dell" href="deletar-fornecedor.php?id=<?php echo $fornecedor ['id'];?>">DELETAR</a>
        <a class="btn-edit" href="editar-fornecedor.php?id=<?php echo $fornecedor ['id'];?>">EDITAR</a></td>
        
    </tr>
    <?php endforeach; ?>
</table>
</div>

   </main>
</body>
</html>
