<?php
session_start();

$ni = 0;
$_SESSION['itens'] = array();
$_SESSION['valortotal'] = 0.0;
$valorTotal = 0.0;

if(isset($_POST['comprar'])){
    for($i=0;$i < 8; $i++){
        if(isset($_POST['ch'.$i])){
            $c = $ni;
            $desc = $_POST['desc'.$i];
            $qtd = $_POST['qtd'.$i];
            $vl = $_POST['vl'.$i];

            $valorTotal += ($vl * $qtd);

            //echo $i . " [x] " . $desc . "<br>";

            $_SESSION['itens'] = array_merge( $_SESSION['itens'], 
                                  array( $c => array(
                                      'ni' => $i,
                                      'desc' => $desc,
                                      'qtd' => $qtd,
                                      'vl' => $vl
                                  ) ) );
            $ni += 1;
        }
    
        
        
    }
    if($ni > 0){
      for($i = 0;$i < $ni; $i++){  
        echo $i .  $_SESSION['itens'][$i]['desc'] . " - " . $_SESSION['itens'][$i]['vl']. "<br>";  
    }
 }
 echo 'Valor Total ' . $valorTotal;

 $_SESSION['valortotal'] = $valorTotal;
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
    <form action="compras.php" method="post">
        <table>
            <tr>
                <th colspan="5">Lista de Compras</th>
            </tr>
            <tr>
                <th>#</th>
                <th>[x]</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>1</td>
                <td><input type="checkbox" name="ch0"></td>
                <td><input type="text" name="desc0" value="Tênis Nike Revolution 6 - Feminino" readonly></td>
                <td><input type="number" name="qtd0" value="0"></td>
                <td><input type="text" name="vl0" value="399.00" readonly></td>
            </tr>
            <tr>
                <td>2</td>
                <td><input type="checkbox" name="ch1"></td>
                <td><input type="text" name="desc1" value="Tênis Nike Downshifter 12 - Feminino" readonly></td>
                <td><input type="number" name="qtd1" value="0"></td>
                <td><input type="text" name="vl1" value="258.00" readonly></td>
            </tr>
            <tr>
                <td>3</td>
                <td><input type="checkbox" name="ch2"></td>
                <td><input type="text" name="desc2" value="Tênis Nike Revolution 6 - Masculino" readonly></td>
                <td><input type="number" name="qtd2" value="0"></td>
                <td><input type="text" name="vl2" value="400.00" readonly></td>
            </tr>
            <tr>
                <td>4</td>
                <td><input type="checkbox" name="ch3"></td>
                <td><input type="text" name="desc3" value="Tênis Adidas Speed Run - Masculino" readonly></td>
                <td><input type="number" name="qtd3" value="0"></td>
                <td><input type="text" name="vl3" value="129.00" readonly></td>
            </tr>
            <tr>
                <td>5</td>
                <td><input type="checkbox" name="ch4"></td>
                <td><input type="text" name="desc4" value="Tênis Adidas Latin Run - Masculino" readonly></td>
                <td><input type="number" name="qtd4" value="0"></td>
                <td><input type="text" name="vl4" value="239.00" readonly></td>
            </tr>
            <tr>
                <td>6</td>
                <td><input type="checkbox" name="ch5"></td>
                <td><input type="text" name="desc5" value="Tênis Adidas Advantage Base - Feminino" readonly></td>
                <td><input type="number" name="qtd5" value="0"></td>
                <td><input type="text" name="vl5" value="187.00" readonly></td>
            </tr>
            <tr>
                <td>7</td>
                <td><input type="checkbox" name="ch6"></td>
                <td><input type="text" name="desc6" value="Tênis Nike Revolution 6 - Feminino" readonly></td>
                <td><input type="number" name="qtd6" value="0"></td>
                <td><input type="text" name="vl6" value="149.00" readonly></td>
            </tr>
            <tr>
                <td>8</td>
                <td><input type="checkbox" name="ch7"></td>
                <td><input type="text" name="desc7" value="Tênis Rainha VL 2500 - Masculino" readonly></td>
                <td><input type="number" name="qtd7" value="0"></td>
                <td><input type="text" name="vl7" value="278.00" readonly></td>
            </tr>
            <tr>
                <td colspan="5">
                    <input type="submit" name="comprar" value="Comprar">
                </td>
            </tr>
        </table>
    
    </form>
</body>
</html>