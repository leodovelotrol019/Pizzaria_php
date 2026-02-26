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

$id = $_GET['id'];
$sql = "select * from tb_fornecedor";
$comando = $conexao->prepare($sql);
$comando->execute();
$fornecedor = $comando->fetchALL(PDO::FETCH_ASSOC);
// echo"<pre>";
// var_dump($pizzas);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../funcionarios/func.css">
    <title>fornecedor - EDIT</title>
</head>

<body>
    <header>
        <h1>fornecedor - EDIT</h1>
    </header>
    <main>
        <div id="container">
            <form class="formulario" action="../backend/atualizar-fornecedor.php?id=<?php echo $fornecedor[0] ['id'];?>" method="post">
                <div id="form-grid">
                    <div>

                        <label for="Nome"> Nome</label>
                        <input value="<?php echo $fornecedor[0] ['nome'];?>" type="text" name="nome" id="nome" required>


                    </div>

                    <div>

                        <label for="E-mail">E-mail</label>
                        <input value="<?php echo $fornecedor[0] ['email'];?>" type="email" name="email" id="email" required>

                    </div>


                    <div>
                        <label for="Telefone">Telefone</label>
                        <input value="<?php echo $fornecedor[0] ['telefone'];?>" type="text" name="telefone" id="telefone" required  >

                    </div>
                    <div>
                        <label for="produto">produto</label>
                        <input value="<?php echo $fornecedor[0] ['produto'];?>" type="text" name="produto" id="produto" required  >

                    </div>


                </div>
                <input type="submit" value="EDITAR" class="btn">


            </form>
        </div>
    </main>
</body>

</html>

















