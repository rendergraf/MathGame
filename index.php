<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MathGame | by Joan Araque</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

<?php
    $min        = 10;
    $max        = 99;
    $aNumber    = rand($min,$max);
    $bNumber    = rand($min,$max);
    $result     = $aNumber + $bNumber;
    //
    // Random para botones erroneos
    function errorNumber($r, $a, $b) {
        $c = $a + 20;
        $d = $b + 20;
        $aa = rand(5, $c);
        $bb = rand(5, $d);
        $rr = $r;
        $aFailure = $aa + $bb;
        if($rr == $aFailure ){
            $adic = rand(5, 20);
            $aFailure = $aFailure + $adic ;
            return $aFailure;
        } else {
            return $aFailure;
        }
    }

    // Pasos

    $botones = array();
    array_push($botones, $result);
    for ($x = 0; $x <= 2; $x++) {
        $botonValor = errorNumber($result, $aNumber, $bNumber);
        array_push($botones, $botonValor);
    }
    foreach($botones as $boton){
        ?>
        <form action="index.php" method="post">
            <button type="submit"><?php echo $boton ?></button><br>
        </form>
        <?php      
    }
    //print_r($botones);
    

    if(isset($_POST['myCheckbox']) && $_POST['myCheckbox'] == 'Yes'){

    }
?>

<h3><?php echo $aNumber . ' + ' . $bNumber ?></h3>

<!-- <form action="index.php" method="post">
    <button type="submit"><?php //echo $result; ?></button><br>
</form> -->
<!-- <form action="index.php" method="post">
    <button type="submit"><?php //errorNumber($result, $aNumber, $bNumber) ?></button><br>
</form> -->

    
</body>
</html>