<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css">
    <!-- SCRIPT -->
    <script src="./main.js" defer></script>
    <title>Ex1</title>
</head>

<body>

    <h1>Exercici 1</h1>
    <form action="numeroMagico.php" method="post">
        <input type="number" id="numero" name="numero">
        <input type="submit" value="jugar">
    <?php
    $intentos = $_REQUEST['numIntentos'] ?? 0;
    $numeroUser = $_REQUEST['numero'] ?? '';
    $numMagic = $_REQUEST['numMagic'] ?? rand(1,100);
    $arrayNums = isset($_REQUEST['arrayNums']) ? explode(',', $_REQUEST['arrayNums']) : [];
    
    if($numeroUser !== '') {
        $arrayNums[] = $numeroUser;
        echo "<input type='hidden' name='arrayNums' value='" . implode(',', $arrayNums) . "'>";
        echo "·";
        foreach ($arrayNums as $num) {
            echo "$num ";
        }
        echo "·";
        if($numeroUser==$numMagic){ 
            echo "<p> Eso es! En hora buena! </p>";
            $numMagic = rand(1,100); 
            normas();
        }
        else if($numeroUser>$numMagic) { 
            echo "<p> Necesitarás algo más pequeño... </p>";
        }
        else {
            echo "<p> No tan pequeño... </p>";
        }
        echo "<input type='hidden' name='numMagic' value='$numMagic'>";
        intentos(1, $intentos);
    } else {
        normas();
    }
    ?>
    </form>
    <?php
    function intentos($suma, &$intentos){
        $intentos += $suma;
        echo "<input type='hidden' name='numIntentos' value='$intentos'>";
    }

    function normas(){
        echo"<p> Intenta averiguar el número oculto introduciendo un valor entre 0 y 100. Suerte! </p>";
    }
    ?>
</body>
</html>