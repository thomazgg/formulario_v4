<?php

	session_start();
    
    // Variaveis de erro
    $erro_ender     = "";
    $erro_bairro    = "";
    $erro_cep       = "";
    $erro_cidade    = "";
    $erro_estado    = "";
	$erro_validacao = 0;

	if (isset($_POST["botao"])) {
        // Recebendo variaveis
        $_SESSION["ender"]  =   $_POST["ender"];
        $_SESSION["bairro"] =   $_POST["bairro"];
        $_SESSION["cep"]    =   $_POST["cep"];
        $_SESSION["cidade"] =   $_POST["cidade"];
        $_SESSION["estado"] =   $_POST["estado"];
        $_SESSION["ref"]    =   $_POST["ref"];

        // Sanitizações
        $_SESSION["ender"]  = filter_var($_SESSION["ender"] , FILTER_SANITIZE_SPECIAL_CHARS);
		$_SESSION["bairro"] = filter_var($_SESSION["bairro"], FILTER_SANITIZE_SPECIAL_CHARS);
        $_SESSION["cep"]    = filter_var($_SESSION["cep"]   , FILTER_SANITIZE_SPECIAL_CHARS);
        $_SESSION["cidade"] = filter_var($_SESSION["cidade"], FILTER_SANITIZE_SPECIAL_CHARS);
        $_SESSION["estado"] = filter_var($_SESSION["estado"], FILTER_SANITIZE_SPECIAL_CHARS);

        // Validações
        if ($_SESSION["ender"] == "") {
			$erro_ender = "<br><p><b>Observação:</b> Preencha o endereco corretamente</p>";
			$erro_validacao ++;
		}
        if ($_SESSION["bairro"] == "") {
			$erro_bairro = "<br><p><b>Observação:</b> Preencha o bairro corretamente</p>";
			$erro_validacao ++;
		}
        if ($_SESSION["cep"] == "") {
			$erro_cep = "<br><p><b>Observação:</b> Preencha o cep corretamente</p>";
			$erro_validacao ++;
		}
        if ($_SESSION["cidade"] == "") {
			$erro_cidade = "<br><p><b>Observação:</b> Preencha a cidade corretamente</p>";
			$erro_validacao ++;
		}
        if ($_SESSION["estado"] == "" ) {
			$erro_estado = "<br><p><b>Observação:</b> Preencha o estado corretamente</p>";
			$erro_validacao ++;
		}

		// SEM ERRO DE VALIDAÇÃO => VAI PARA PROXIMA ETAPA
		if ($erro_validacao == 0) {
			Header("location: etapa3.php");
		}

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

        <!-- Tela 2 – Endereço de Entrega-->

        <h2>Endereço de Entrega</h2>
        <form method="POST" action="etapa2.php">
            <div class="input-field">
                <input type="text"      name="ender"    maxlength="40"
                    value="<?php 
                        if (isset($_SESSION["ender"])) 
                        echo $_SESSION["ender"] 
                        ?>"
                    placeholder="Endereço">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="text"      name="bairro"    maxlength="40"
                    value="<?php 
                            if (isset($_SESSION["bairro"])) 
                            echo $_SESSION["bairro"] 
                            ?>"    
                placeholder="Bairro">
                <div class="underline"></div>
            </div><br>
            <div class="input-field">
                <input type="text"      name="cep"          maxlength="09"
                    value="<?php 
                            if (isset($_SESSION["cep"])) 
                            echo $_SESSION["cep"] 
                            ?>"
                    placeholder="CEP">
                <div class="underline"></div>
            </div><br>
            <div class="input-field">
                <input type="text"      name="cidade"   maxlength="20"
                    value="<?php 
                            if (isset($_SESSION["cidade"])) 
                            echo $_SESSION["cidade"] 
                            ?>"    
                placeholder="Cidade">
                <div class="underline"></div>
            </div><br>
            <div class="input-field">
                <input type="text"      name="estado"   maxlength="02"
                    value="<?php 
                            if (isset($_SESSION["estado"])) 
                            echo $_SESSION["estado"] 
                            ?>"
                    placeholder="Estado">
                <div class="underline"></div>
            </div><br>
            <div class="input-field">
                <input type="text"      name="ref"   maxlength="100"
                    value="<?php 
                            if (isset($_SESSION["ref"])) 
                            echo $_SESSION["ref"] 
                            ?>"
                    placeholder="Referência (Opcional): Deixe uma mensagem para o vendedor">
                <div class="underline"></div>
            </div><br>
            
            <input type="submit" value="Continuar"  name="botao">
            <input type="button" onclick="history.back();" value="Voltar">
            <?php echo $erro_ender ?>
            <?php echo $erro_bairro ?>
            <?php echo $erro_cep ?>
            <?php echo $erro_cidade ?>
            <?php echo $erro_estado ?>
        </form>
    </main>
</body>
</html>