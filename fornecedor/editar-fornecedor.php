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
$sql = "select * from tb_fornecedor where id = $id";
$comando = $conexao->prepare($sql);
$comando->execute();
$pizzas = $comando->fetchALL(PDO::FETCH_ASSOC);
// echo"<pre>";
// var_dump($pizzas);
?>




















<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Pizzaria do Bom</title>
</head>

<body>
    <header>
        <h1>Pizzaria - EDITAR</h1>
    </header>
    <main>
        <div id="container">
            <form class="formulario" action="../backend/atualizar-pizza.php" method="post">
                <div id="form-grid">
                    <div>

                        <label for="Sabor"> Sabor</label>
                        <input value="<?php echo $pizzas[0] ['sabor'];?>" type="text" name="Sabor" id="Sabor" required>


                    </div>

                    <div>

                        <label for="Ingrediente">Ingrediente</label>
                        <input value="<?php echo $pizzas[0] ['ingrediente'];?>" type="text" name="Ingrediente" id="Ingrediente" required>

                    </div>


                    <div>
                        <label for="Tamanho">Tamanho</label>
                        <select name="Tamanho" id="Tamanho" required>
                            
                            <option value="<?php if($pizzas[0] ['tamanho']=='P') echo 'selected' ?>">P</option>
                            <option value=""<?php if($pizzas[0] ['tamanho']=='M') echo 'selected' ?>"">M</option>
                            <option value=""<?php if($pizzas[0] ['tamanho']=='G') echo 'selected' ?>"">G</option>


                        </select>

                    </div>

                    <div>
                        <label for="Valor">Valor</label>
                        <input value="<?php echo $pizzas[0] ['valor'];?>" type="number" name="Valor" id="Valor" required step="0.01" min="1" >

                    </div>


                </div>
                <input type="submit" value="SALVAR" class="btn">


            </form>
        </div>
    </main>
</body>

</html>