<?php

	session_start();
    
    // Variaveis de erro
    $erro_nome      = "";
    $erro_email     = "";
    $erro_senha     = "";
    $erro_cpf       = "";
    $erro_cel       = "";
	$erro_validacao = 0;

	if (isset($_POST["botao"])) {
        // Recebendo variaveis
        $_SESSION["nome"]   =   $_POST["nome"];
		$_SESSION["email"]  =   $_POST["email"];
		$_SESSION["senha"]  =   $_POST["senha"];
        $_SESSION["cpf"]    =   $_POST["cpf"];
        $_SESSION["cel"]    =   $_POST["cel"];

        // Sanitizações
        $_SESSION["nome"]   = filter_var($_SESSION["email"] , FILTER_SANITIZE_SPECIAL_CHARS);
		$_SESSION["email"]  = filter_var($_SESSION["email"] , FILTER_SANITIZE_EMAIL);
        $_SESSION["nome"]   = filter_var($_SESSION["email"] , FILTER_SANITIZE_SPECIAL_CHARS);
        $_SESSION["cpf"]    = filter_var($_SESSION["cpf"]   , FILTER_SANITIZE_SPECIAL_CHARS);
        $_SESSION["cel"]    = filter_var($_SESSION["cel"]   , FILTER_SANITIZE_NUMBER_INT);

        // Validações
        if ($_SESSION["nome"] == "") {
			$erro_nome = "<br><p><b>Observação:</b> Preencha o nome</p>";
			$erro_validacao ++;
		}
        if ($_SESSION["email"] == "") {
			$erro_email = "<br><p><b>Observação:</b> Preencha o email corretamente</p>";
			$erro_validacao ++;
		}
        if ($_SESSION["senha"] == "") {
			$erro_senha = "<br><p><b>Observação:</b> Preencha a senha</p>";
			$erro_validacao ++;
		}
        if ($_SESSION["cpf"] == "") {
			$erro_cpf = "<br><p><b>Observação:</b> CPF precisa ser inteiro</p>";
			$erro_validacao ++;
		}
        if ($_SESSION["cel"] < 1 ) {
			$erro_cel = "<br><p><b>Observação:</b> Celular precisa ser inteiro</p>";
			$erro_validacao ++;
		}

		// SEM ERRO DE VALIDAÇÃO => VAI PARA PROXIMA ETAPA
		if ($erro_validacao == 0) {
			Header("location: etapa2.php");
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

        <!-- Tela 1 – Dados Cadastrais-->

        <h2>Dados Cadastrais</h2>
        <form method="POST" action="index.php">
            <div class="input-field">
                <input type="text"      name="nome"     maxlength="40" 
                    value="<?php 
                            if (isset($_SESSION["nome"])) 
                            echo $_SESSION["nome"] 
                            ?>"
                    placeholder="Nome de usuário"> 
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="email"     name="email"    maxlength="40"
                    value="<?php 
                            if (isset($_SESSION["email"])) 
                            echo $_SESSION["email"] 
                            ?>"
                    placeholder="Email">
                <div class="underline"></div>
            </div><br>
            <div class="input-field">
                <input type="password"  name="senha"    maxlength="40"
                    value="<?php 
                            if (isset($_SESSION["senha"])) 
                            echo $_SESSION["senha"] 
                            ?>"
                    placeholder="Senha">
                <div class="underline"></div>
            </div><br>
            <div class="input-field">
                <input type="text"      name="cpf"      maxlength="15"
                    value="<?php 
                            if (isset($_SESSION["cpf"])) 
                            echo $_SESSION["cpf"] 
                            ?>"
                    placeholder="CPF">
                <div class="underline"></div>
            </div><br>
            <div class="input-field">
                <input type="text"      name="cel"  maxlength="16"
                    value="<?php 
                            if (isset($_SESSION["cel"])) 
                            echo $_SESSION["cel"] 
                            ?>"
                    placeholder="Celular">
                <div class="underline"></div>
            </div>
            <input type="submit" value="Continuar" name="botao" class="btn">
            <?php echo $erro_nome ?>
            <?php echo $erro_email ?>
            <?php echo $erro_senha ?>
            <?php echo $erro_cpf ?>
            <?php echo $erro_cel ?>
        </form>
    </main>
</body>
</html>