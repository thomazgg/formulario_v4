<?php
	session_start();
	if (isset($_POST["botao"])) {
		$_SESSION["frete"]        =   $_POST["frete"];
        Header("location: tabela.php");
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

        <!-- Tela 6 – Frete -->

        <h2>Frete e/ou taxa de entrega</h2>
        <form method="POST" action="etapa6.php">

            <div class="campo">

            <label><strong>Frete</strong></label>
            <select name="frete" required>
                <option selected disabled value="">Selecione</option>
                <option value="1" >Expresso – 10% de Taxa</option>
                <option value="2" >Sedex 10 – R$30,00 de Taxa</option>
                <option value="3" >Correio – qualquer lugar do brasil - Sem Taxa</option>
                <option value="4" >Estado SP – independente do frete escolhido - Sem Taxa</option>
            </select>
            </div></br></br></br></br></br></br>

            <input type="submit" value="Continuar"  name="botao">
            <input type="button" onclick="history.back();" value="Voltar" value="Back">
        </form>

    </main>
</body>
</html>