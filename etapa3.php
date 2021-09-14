<?php
	session_start();
	if (isset($_POST["botao"])) {
		$_SESSION["tipo"]       =   $_POST["tipo"];
		$_SESSION["cor"]        =   $_POST["cor"];
		$_SESSION["qtd"]        =   $_POST["qtd"];
        $_SESSION["receber1"]   =   $_POST["receber1"];
        $_SESSION["receber2"]   =   $_POST["receber2"];
        $_SESSION["receber3"]   =   $_POST["receber3"];
        Header("location: etapa4.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulario v3</title>
    
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <main class="container">

        <!-- Tela 3 – Dados do Pedido -->

        <h2>Informações do Produto</h2>
        <form method="POST" action="etapa3.php">
            <fieldset>
            <div class="campo">
            <label><strong>Tipo do ProdutoㅤㅤㅤㅤㅤㅤㅤCorㅤㅤㅤㅤㅤㅤㅤㅤQuantidade</strong></label>
                <select name="tipo" required>
                    <option selected disabled value="">Selecione</option>
                    <option value="1">Produto 1 - R$100,00</option>
                    <option value="2">Produto 2 - R$200,00</option>
                    <option value="3">Produto 3 - R$300,00</option>
                </select>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <select name="cor" id="cor" required>
                    <option selected disabled value="">Selecione</option>
                    <option value="1" >Azul</option>
                    <option value="2" >Vermelho</option>
                    <option value="3" >Preto</option>
                    <option value="4" >Branco</option>
                </select>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="number" name="qtd" value="1" min="1" max="99" required ><br></br></br>
            <fieldset>
                <label><strong>Acessórios opcionais:</strong></label>
                <input type="checkbox" name="receber1" value="1"> 
                    Acessório A – R$20,00<br>
                <input type="checkbox" name="receber2" value="1"> 
                    Acessório B – R$40,00<br>
                <input type="checkbox" name="receber3" value="1"> 
                    Acessório C – R$60,00<br>
		    </fieldset>
            </div></br>

            <input type="submit" value="Continuar"  name="botao">
            <input type="button" onclick="history.back();" value="Voltar">

            </div>
        </form>
    </main>
</body>
</html>