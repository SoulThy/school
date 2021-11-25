<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Equazione Risolta</title>
    </head>
    <body>
        <h1>Risultato Dell'Equazione</h1>
        <?php      
        
        $A = $_GET['A'];
        $B = $_GET['B'];
        $C = $_GET['C'];

        if (!is_numeric($A) || !is_numeric($B) || !is_numeric($C))      
            die('<h1 style="color:red;">Inserisci tutte le informazioni necessarie!</h1>');

        $delta = pow($B, 2) - (4 * $A * $C);
        if ($delta<0)
            echo "<h2>L'equazione non ha soluzioni reali</h2>";
            else{
                $x1 = (int)(-$B + sqrt($delta)) / (2 * $A);
                $x2 = (int)(-$B - sqrt($delta)) / (2 * $A);

                if ($delta == 0)
                    echo "<h2>L'equazione ha due soluzioni reali e coincidenti</h1>";
                    else 
                        echo "<h2>L'equazione ha due soluzioni reali e distinte</h1>";

                echo "<p>x1= ". $x1 ."</p> <p>x2= ". $x2 ."</p>";
            }
        ?>
    </body>
</html>