<?php
session_start();

$_SESSION['dadospag'] = "";

$usuario = (isset($_SESSION['usuario']['usuario']) ? $_SESSION['usuario']['usuario'] : "");
$nome = (isset($_SESSION['usuario']['nome']) ? $_SESSION['usuario']['nome'] : "");
$endereco = (isset($_SESSION['usuario']['endereco']) ? $_SESSION['usuario']['endereco'] : "");
$valorTotal = (isset($_SESSION['valortotal']) ? $_SESSION['valortotal'] : "");

if(isset($_POST['pagar'])){
    if(isset($_POST['metpag'])){
        $metpag = $_POST['metpag'];
        $numcartao_avista = (isset($_POST['numcartao-avista']) ? $_POST['numcartao-avista'] : "");
        $numcartao_credito = (isset($_POST['numcartao-credito']) ? $_POST['numcartao-credito'] : "");

        $_SESSION['dadospag1'] = array('metpag' => $metpag,
                                        'numcartao-avista' => $numcartao_avista,
                                        'numcartao-credito' => $numcartao_credito);
                                        
        header('Location: resumocompra.php', true, 303);
    }
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
    
    <form action="dadospag.php" method="post">
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
                <td><input type="radio" name="metpag" value="deb-avista"></td>
                <td>Débito à Vista</td>
                <td>Número do Cartão</td>
                <td><input type="text" name="numcartao-avista"></td>
            </tr>
            <tr>
                <td><input type="radio" name="metpag" value="credito"></td>
                <td>Crédito à Vista</td>
                <td>Número do Cartão</td>
                <td><input type="text" name="numcartao-credito"></td>
            </tr>
            <tr>
                <td><input type="radio" name="metpag" value="pix"></td>
                <td>PIX</td>
                <td>Número do PIX</td>
                <td>4545454545454</td>
            </tr>
            <tr>
                <th colspan="2"></th>
                <th>Valor Total</th>
                <th><?php echo $valorTotal; ?></th>
            </tr>
            <tr>
                <td colspan="4"><input type="submit" name="pagar" value="Pagar"></td>
            </tr>
        </table>
</body>

</html>