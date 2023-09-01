<?php
session_start();

$_SESSION['dadospag'] = "";

$usuario = (isset($_SESSION['usuario']['usuario']) ? $_SESSION['usuario']['usuario'] : "");
$nome = (isset($_SESSION['usuario']['nome']) ? $_SESSION['usuario']['nome'] : "");
$endereco = (isset($_SESSION['usuario']['endereco']) ? $_SESSION['usuario']['endereco'] : "");
$valorTotal = (isset($_SESSION['valortotal']) ? $_SESSION['valortotal'] : "");
$metpag = (isset($_SESSION['dadospag']['metpag']) ? $_SESSION['dadospag1']['metpag'] : "");
$numcartao_avista = (isset($_SESSION['dadospag1']['numcartao-avista']) ? $_SESSION['dadospag1']['numcartao_avista'] : "");
$numcartao_credito = (isset($_SESSION['dadospag1']['numcartao-credito']) ? $_SESSION['dadospag1']['numcartao-credito'] : "");


if(isset($_POST['confirmar'])){
    header('Location: confirmacaocompra.php', true, 303);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main-css.css'>
    <script src='main.js'></script>
</head>
<body>
<table>
        <tr>
            <th colspan="2">Dados do Usuário</th>
        </tr>
        <tr>
            <td>Usuário</td>
            <td><?php echo $usuario; ?></td>
        </tr>
        <tr>
            <td>Nome Completo</td>
            <td><?php echo $nome; ?></td>
        </tr>
        <tr>
            <td>Endereço</td>
            <td><?php echo $endereco; ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="comprar" value="Logar">
            </td>
        </tr>
    </table> 
    <br>
    <table>
            <tr>
                <th colspan="5">Itens da Compra</th>
            </tr>
            <tr>
                <th>#</th>
                <th>N. Item</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Valor</th>
            </tr>
            <?php
            $i = 0;
            if(isset($_SESSION['itens'])){
            foreach($_SESSION['itens'] as $item){ 
            ?>
            <tr>
                <td> <?php echo $i; ?> </td>
                <td><?php echo $item['ni']; ?></td>
                <td><?php echo $item['desc']; ?></td>
                <td><?php echo $item['qtd']; ?></td>
                <td><?php echo $item['vl']; ?></td>
            </tr>

            <?php
                        $i++;   
                    }
                }
            
            ?>
            <tr>
                <th colspan="3"></th>
                <th>Valor Total</th>
                <th><?php echo $valorTotal; ?></th>
            </tr>
    </table> 
    <br>
    <table>
            <tr>
                <th colspan="4">Dados do Pagamento</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Método de Pagamento</th>
                <th colspan="2">Dados da Cobranca</th>
            </tr>
            <tr>
                <td>#</td>
                <td>
                    <?php
                    if($metpag == "deb-avista"){
                        echo "Débito à Vista";
                    }else if($metpag == "credito"){
                        echo "Crédito à Vista";
                    }else if($metpag == "pix"){
                        echo "PIX";
                    }
                    ?>
                </td>
                <td>Número do Cartão</td>
                <td>
                <?php
                    if($metpag == "deb-avista"){
                        echo $numcartao_avista;
                    }else if($metpag == "credito"){
                        echo $numcartao_credito;
                    }
                    ?>
                </td>
            </tr> 
        </table>
        <form action="resumocompra.php" method="post">
        <table>
            <tr>
                <td>Confirmar Compra</td>
                <td><input type="submit" name="confirmar" value="confirmar"> </td>
            </tr>
                </table>
</body>
</html>