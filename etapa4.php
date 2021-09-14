<?php
	session_start();
	if (isset($_POST["botao"])) {
		$_SESSION["cartao"]     =   $_POST["cartao"];
		$_SESSION["num"]        =   $_POST["num"];
		$_SESSION["val"]        =   $_POST["val"];
        $_SESSION["cod"]        =   $_POST["cod"];
        $_SESSION["band"]       =   $_POST["band"];
        Header("location: etapa5.php");
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

        <!-- Tela 4 – Cartão de Crédito -->

        <h2>Informações do Cartão</h2>
        <form method="POST" action="etapa4.php">
            
            <div class="input-field">
                <input type="text"          name="cartao"   maxlength="40" required
                    placeholder="Nome Cartão">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="text"          name="num"       maxlength="40" required
                    placeholder="Número">
                <div class="underline"></div>
            </div><br>
            <div class="input-field">
                <input type="datetime"      name="val"      maxlength="09" required
                    placeholder="Data de validade">
                <div class="underline"></div>
            </div><br>
            <div class="input-field">
                <input type="text"          name="cod"      maxlength="03" required
                    placeholder="Código de Segurança">
                <div class="underline"></div>
            </div><br>
            <div class="campo">
                <input type="radio" name="band" value="1" required /> Mastercard    </br>
		        <input type="radio" name="band" value="2" required /> Visa          </br>
                <input type="radio" name="band" value="3" required /> Elo           
            </div>

            <input type="submit" value="Continuar"  name="botao">
            <input type="button" onclick="history.back();" value="Voltar">

        </form>

    </main>
</body>
</html>