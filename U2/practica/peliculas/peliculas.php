<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $categoriaSeleccionada=$_GET['categoria'];

        switch($categoriaSeleccionada){
            case 'terror':
                echo '<link rel="stylesheet" href="styles/terror.css">';
                break;
            case 'pelea':
                echo '<link rel="stylesheet" href="styles/martialarts.css">';
                break;
        }
    ?>
    <title>Películas</title>
</head>
<body>
    
</body>
</html>