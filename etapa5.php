<?php
	session_start();
	if (isset($_POST["botao"])) {
		$_SESSION["pag"]        =   $_POST["pag"];
        Header("location: etapa6.php");
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

        <!-- Tela 5 – Forma de Pagamento -->

        <h2>Forma de Pagamento</h2>
        <form method="POST" action="etapa5.php">

            <div class="campo">

            <label><strong>Selecione a forma de pagamento</strong></label>
            <select name="pag" id="pag" required>
                <option selected disabled value="">Selecione</option>
                <option value="1" >Boleto Bancário</option>
                <option value="2" >A vista – 10% desconto</option>
                <option value="3" >3 x – Sem Juros</option>
                <option value="4" >6 x – Sem Juros</option>
                <option value="5" >10 x – 15% de Juros</option>
            </select>
            </div></br></br></br></br></br></br>

            <input type="submit" value="Continuar"  name="botao">
            <input type="button" onclick="history.back();" value="Voltar" value="Back">

        </form>

    </main>
</body>
</html>