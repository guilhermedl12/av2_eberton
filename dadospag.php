<?php
session_start();

$_SESSION['dadospag'] = "";

$usuario = (isset($_SESSION['usuario']['usuario']) ? $_SESSION['usuario']['usuario'] : "");
$nome = (isset($_SESSION['usuario']['nome']) ? $_SESSION['usuario']['nome'] : "");
$endereco = (isset($_SESSION['usuario']['endereco']) ? $_SESSION['usuario']['endereco'] : "");
$valorTotal = (isset($_SESSION['usuario']['valortotal']) ? $_SESSION['usuario']['valortotal'] : "");

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
                
            </tr>

        </table>
</body>

</html>