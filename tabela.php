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
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>

<body>

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
            $acc1       = 0;
        }
        $acc2           =   $_SESSION["receber2"];
        if ($acc2==1){
            $ac2        = " Acessório B – R$40,00 ";
            $acc2       = 40.00;
        }else {
            $acc2       = 0;
        }
        $acc3           =   $_SESSION["receber3"];
        if ($acc3==1){
            $ac3        = " Acessório C – R$60,00 ";
            $acc3       = 60.00;
        }else {
            $acc3       = 0;
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

    <h1>Tabela - Dados dos Formulários</h1>
    <table class="content-table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>CPF</th>
                <th>Celular</th>
                <th>Endereço</th>
                <th>Bairro</th>
                <th>CEP</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Tipo</th>
                <th>Qtd.</th>
                <th>Forma de Pagamento</th>
                <th>Total dos produtos</th>
                <th>Frete</th>
                <th>Valor Total</th>
                <th>Valor Total + Frete</th>
            </tr>
        </thead>
        <tbody>
            <tr id="1" onclick=location.href='calcula.php'>
                <td>1</td>
                <td>Robson</td>
                <td>robson@gmail.com</td>
                <td>robson123</td>
                <td>123.456.789-10</td>
                <td>99876-5432</td>
                <td>Rua da minha casa</td>
                <td>Bairro 1</td>
                <td>12345-001</td>
                <td>Uma cidade qualquer</td>
                <td>Um estado qualquer</td>
                <td>Produto tipo 1 R$100.00</td>
                <td>1</td>
                <td>Boleto Bancário</td>
                <td>R$100.00</td>
                <td>Expresso R$10.00</td>
                <td>$100.00</td>
                <td>R$110.00</td>
            </tr>
            <tr id="2" onclick=location.href='calcula.php'>
                <td>2</td>
                <td>Roberto</td>
                <td>roberto@gmail.com</td>
                <td>roberto123</td>
                <td>123.456.789-11</td>
                <td>99876-5433</td>
                <td>Rua da minha casa</td>
                <td>Bairro 2</td>
                <td>12345-002</td>
                <td>Uma cidade qualquer</td>
                <td>Um estado qualquer</td>
                <td>Produto tipo 2 R$200.00</td>
                <td>2</td>
                <td>A vista 10% desconto</td>
                <td>R$400.00</td>
                <td>Sedex 10 - R$30.00</td>
                <td>R$400.00</td>
                <td>R$930.00</td>
            </tr>
            <tr id="3" onclick=location.href='calcula.php'>
                <td>3</td>
                <td>Pedro</td>
                <td>pedro@gmail.com</td>
                <td>pedro123</td>
                <td>123.456.789-12</td>
                <td>99876-5434</td>
                <td>Rua da minha casa</td>
                <td>Bairro 3</td>
                <td>12345-003</td>
                <td>Uma cidade qualquer</td>
                <td>Um estado qualquer</td>
                <td>Produto tipo 3 R$300.00</td>
                <td>3</td>
                <td>3 x – Sem Juros</td>
                <td>R$900.00</td>
                <td>Correio R$0.00</td>
                <td>R$900.00</td>
                <td>R$900.00</td>
            </tr>
            <tr id="4" onclick=location.href='calcula.php'>
                <td>4</td>
                <?php
                echo "<td>$nome</td>";
                echo "<td>$email</td>";
                echo "<td>$senha</td>";
                echo "<td>$cpf</td>";
                echo "<td>$cel</td>";
                echo "<td>$ender</td>";
                echo "<td>$bairro</td>";
                echo "<td>$cep</td>";
                echo "<td>$cidade</td>";
                echo "<td>$estado</td>";
                echo "<td>$prod R$$preco</td>";
                echo "<td>$qtd</td>";
                echo "<td>$formapag</td>";
                echo "<td>R$$valpr </td>";
                echo "<td>$fretetipo R$$valorfrete</td>";
                echo "<td>R$$formpag</td>";
                echo "<td>R$$total</td>";
                ?>
            </tr>
        </tbody>
    </table>
    
    <input type="button" onclick="history.back();" value="Voltar">

</body>
</html>