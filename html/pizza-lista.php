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
$sql = "select * from tb_pizza";
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
    <title>Pizzaria - listagem</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1>
            Pizzaria - Listagem
        </h1>
    </header>
    <main>
        <div id="container">
            <table >
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        sabor
                    </th>
                    <th>
                        ingrediente
                    </th>
                    <th>
                        tamanho
                    </th>
                    <th>valor</th>
                    <th>Ações</th>
                </tr>
                <?php
                foreach ($pizzas as $pizza):
                    
                ?>
<tr>
    <td><?php echo $pizza ['id'];?></td>
    <td><?php echo $pizza ['sabor'];?></td>
    <td><?php echo $pizza ['ingrediente'];?></td>
    <td><?php echo $pizza ['tamanho'];?></td>
    <td><?php echo $pizza ['valor'];?></td>
    <td><a class="btn-dell" href="../backend/deletar-pizza.php?id=<?php echo $pizza ['id'];?>">DELETAR</a></td>
</tr>                    
<?php endforeach;?>

            </table>
        </div>
    </main>
</body>

</html>