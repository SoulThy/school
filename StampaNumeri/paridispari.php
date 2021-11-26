<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stampa pari-dispari</title>
</head>
<body>
    <?php
    $titolo = 'Stampa dei numeri:';
    if (isset($_GET['pari']))
        $titolo = $titolo . " Pari";
    if (isset($_GET['dispari']))
        $titolo = $titolo . " Dispari";
    echo "<h1>". $titolo ."</h1>";
    ?>
    <ul>
   <?php
    $input1 = $_GET['input1'];
    $input2 = $_GET['input2'];
    if ($input1 > $input2){         //swap nel caso in cui il primo valore è maggiore del secondo
        $input1 = $_GET['input2'];
        $input2 = $_GET['input1'];
    }

   for ($i=$input1; $i <= $input2; $i++) { 
       if (($i % 2 == 0 && isset($_GET['pari'])) || ($i % 2 != 0 and isset($_GET['dispari']))){
           echo "<li>". $i ."</li>";
       }
    }
    ?>
    </ul>
</body>
</html>