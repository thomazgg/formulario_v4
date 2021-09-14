<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulario v3</title>
    
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="style4.css">
</head>

<body>
    <main class="container">

    <?php

        //dados etapa 1

        $nome           =   $_SESSION["nome"]; 
        $email          =   $_SESSION["email"];
        $senha          =   $_SESSION["senha"];
        $cpf            =   $_SESSION["cpf"];
        $cel            =   $_SESSION["cel"];

        //dados etapa 2

        $ender          =   $_SESSION["ender"];
        $bairro         =   $_SESSION["bairro"];
        $cep            =   $_SESSION["cep"];
        $cidade         =   $_SESSION["cidade"];
        $estado         =   $_SESSION["estado"];
        $ref            =   $_SESSION["ref"];

        //dados etapa 3

                // Tipo \\

            $tipopro        =   $_SESSION["tipo"];
            if ($tipopro==1){
                $prod       = " Produto tipo 1 ";
                $preco      = 100.00;
            }
            elseif ($tipopro==2){
                $prod       = " Produto tipo 2 ";
                $preco      = 200.00;
            }
            else {
                $prod       = " Produto tipo 3 ";
                $preco      = 300.00;
            }

                // Cor \\

            $tipocor        =   $_SESSION["cor"];
            if ($tipocor==1){
                $tipodacor  = " Azul ";
            }
            elseif ($tipocor==2){
                $tipodacor  = " Vermelho ";
            }
            elseif ($tipocor==3){
                $tipodacor  = " Preto ";
            }
            else {
                $tipodacor  = " Branco ";
            }

            $qtd            =   $_SESSION["qtd"];

            $acc1           =   $_SESSION["receber1"];
            if ($acc1==1){
                $ac1        = " Acessório A – R$20,00 ";
                $acc1       = 20.00;
            }else {
                $ac1        = "";
                $acc1       = 0;
            }
            $acc2           =   $_SESSION["receber2"];
            if ($acc2==1){
                $ac2        = " + Acessório B – R$40,00 ";
                $acc2       = 40.00;
            }else {
                $ac2        = "";
                $acc2       = 0;
            }
            $acc3           =   $_SESSION["receber3"];
            if ($acc3==1){
                $ac3        = " + Acessório C – R$60,00 ";
                $acc3       = 60.00;
            }else {
                $ac3        = "";
                $acc3       = 0;
            }

            if ($acc1==0){
                $ac2        = "Acessório B – R$40,00 ";
            }

            if ($acc2==0){
                $ac2        = "";
            }

            if ($acc1==0 && $acc2==0){
                $ac3        = "Acessório C – R$60,00 ";
            }

        //dados etapa 4

        $cartao         =   $_SESSION["cartao"];
        $num            =   $_SESSION["num"];
        $val            =   $_SESSION["val"];
        $cod            =   $_SESSION["cod"];

                // Tipo Bandeira \\

            $tipoband           =   $_SESSION["band"];
            if ($tipoband==1){
                $bandeira   = " Mastercard ";
            }
            elseif ($tipoband==2){
                $bandeira   = " Visa ";
            }
            else {
                $bandeira   = " Elo ";
            }

        //dados etapa 5

                // Forma de Pagamento \\

            $valpr = $preco  *  $qtd + ($acc1 + $acc2 + $acc3);
                
            $tipopag        = $_SESSION["frete"];["pag"];
            if ($tipopag==1){
                $formapag   = " Boleto Bancário ";
                $formpag    = $valpr;
            }
            elseif ($tipopag==2){
                $formapag   = " A vista – 10% desconto ";
                $formpag    = $valpr * 0.9;
            }
            elseif ($tipopag==3){
                $formapag   = " 3 x – Sem Juros ";
                $formpag    = $valpr;
                $pagamento  = $formpag / 3;
            }
            elseif ($tipopag==4){
                $formapag   = " 6 x – Sem Juros ";
                $formpag    = $valpr  ;
                $pagamento  = $formpag / 6  ;
            }
            else {
                $formapag   = " 10 x – 15% de Juros ";
                $formpag    = $valpr * 1.15 ;
                $pagamento  = $formpag / 10  ;
            }

        //dados etapa 6

                // Frete \\

            $tipofrete      = $_SESSION["frete"];
            if ($tipofrete==1){
                $fretetipo  = " Expresso – 10% de Taxa ";
                $valorfrete = ( $formpag * 1.1 ) - $formpag;
                $totalfrete = $formpag * 1.1;
            }
            elseif ($tipofrete==2){
                $fretetipo  = " Sedex 10 – R$30,00 de Taxa ";
                $valorfrete = ( $formpag + 30 ) - $formpag;
                $totalfrete = $formpag + 30;
            }
            elseif ($tipofrete==3){
                $fretetipo  = " Correio – qualquer lugar do brasil - Sem Taxa ";
                $valorfrete = ( $formpag ) - $formpag;
                $totalfrete = $formpag ;
            }
            else {
                $fretetipo  = " Estado SP – independente do frete escolhido - Sem Taxa ";
                $valorfrete = ( $formpag ) - $formpag;
                $totalfrete = $formpag;
            }

        //total

        $total = $totalfrete;

        ?>

        <h2>Dados do Formulário</h2>

        <div>
            <div class="field">
                <div class="campo">
                    <?php
                    echo "<h3>Dados do Cliente</h3>";
                    echo "Nome: $nome <br/>";
                    echo "Email: $email <br/>";
                    echo "Senha: $senha <br/>";
                    echo "CPF: $cpf <br/>";
                    echo "Celular: $cel <br/>";
                    ?>
                    <div class="underline"></div>
                </div>
            </div><br>
            <div class="field">
                <div class="campo">
                    <?php
                    echo "<h3>Endereço de Entrega</h3>";
                    echo "Endereço: $ender <br/>";
                    echo "Bairro: $bairro <br/>";
                    echo "CEP: $cep <br/>";
                    echo "Cidade: $cidade <br/>";
                    echo "Estado: $estado <br/>";
                    if ($ref!== ""): echo "Rêferencia: $ref <br/>"; endif;
                    ?>
                    <div class="underline"></div>
                </div>
            </div><br>
            <div class="field">
                <div class="campo">
                    <?php
                    echo "<h3>Dados do Pedido</h3>";
                    echo "Tipo: $prod (<b>R$$preco</b>) | Cor: $tipodacor  | 
                    Quantidade: (<b>$qtd</b>)<br/>";
                    echo "Acessórios opcionais: $ac1 $ac2 $ac3<br/>";
                    ?>
                    <div class="underline"></div>
                </div>
            </div><br>
            <div class="field">
                <div class="campo">
                    <?php
                    echo "<h3>Dados do Cartão</h3>";
                    echo "Nome Cartão: $cartao<br/>";
                    echo "Número: $num<br/>";
                    echo "Data de validade: $val<br/>";
                    echo "Código de Segurança: $cod<br/>";
                    echo "Bandeira: $bandeira<br/>";
                    ?>
                    <div class="underline"></div>
                </div>
            </div><br>
            <div class="field">
                <div class="campo">
                    <?php
                    echo "<h3>Formas de Pagamento</h3>";
                    echo "Pagamento: $formapag  <br/>";
                    echo "Total dos produtos: (<b>R$$preco</b> x <b>$qtd</b>) + 
                    (<b>R$$acc1</b> + <b>R$$acc2</b> + <b>R$$acc3</b>) 
                    = <b>R$$valpr</b> <br/>";
                    ?>
                    <div class="underline"></div>
                </div>
            </div><br>
            <div class="field">
                <div class="campo">
                    <?php
                    echo "<h3>Frete e/ou Taxa de Entrega</h3>";
                    echo "Frete: $fretetipo = <b>R$$valorfrete</b><br/>";
                    ?>
                    <div class="underline"></div>
                </div>
            </div><br>
            <div class="field">
                <div class="campo">
                    <?php
                    echo "<h3>Total</h3>";
                    echo "Valor Total + Frete: <b>R$$total</b>"; 
                    ?>
                    <div class="underline"></div>
                </div>
            </div>
            <input type="button" onclick="history.back();" value="Voltar">
        </div>
    </main>
</body>
</html>