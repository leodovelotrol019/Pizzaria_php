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
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="func.css">
    <title>Funcionarios - EDIT</title>
</head>

<body>
    <header>
        <h1>Funcionarios - EDIT</h1>
    </header>
    <main>
        <div id="container">
            <form class="formulario" action="func.php" method="post">
                <div id="form-grid">
                    <div>

                        <label for="Nome"> Nome</label>
                        <input value="<?php echo $funcionarios[0] ['nome'];?>" type="text" name="nome" id="nome" required>


                    </div>

                    <div>

                        <label for="E-mail">E-mail</label>
                        <input value="<?php echo $funcionarios[0] ['email'];?>" type="email" name="email" id="email" required>

                    </div>


                    <div>
                        <label for="Telefone">Telefone</label>
                        <input value="<?php echo $funcionarios[0] ['telefone'];?>" type="text" name="telefone" id="telefone" required  >

                    </div>


                </div>
                <input type="submit" value="EDITAR" class="btn">


            </form>
        </div>
    </main>
</body>

</html>