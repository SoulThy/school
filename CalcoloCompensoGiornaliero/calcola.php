<html>
    <head>
        <title>Calcolo Compensi Giornalieri</title>
        <link rel="stylesheet" href="style.css">
        <?php
        function toMinuti($ora, $minuti){
            return ($ora*60)+$minuti;
        }
        function calcoloCompenso($tempoDiLavoro){
            $guadagnoAlMinuto = 20/60;
            return ($tempoDiLavoro * $guadagnoAlMinuto);
        }
        function calcoloStraordinario($tempoDiLavoro){
            $guadagnoAlMinuto = 25/60;
            $minutiStaordinari = $tempoDiLavoro - 8*60;
            return ($minutiStaordinari * $guadagnoAlMinuto);
        }
        ?>
    </head>
    <body>
        <?php


        $oraIngresso = substr($_GET['oraIngresso'],0,2);
        $minIngresso = substr($_GET['oraIngresso'],3,4);
        $oraUscita = substr($_GET['oraUscita'],0,2);
        $minUscita = substr($_GET['oraUscita'],3,4);


        $guadagnoTotale;
        $guadagnoStraordinario = 0;
        $tempoDiLavoro = toMinuti($oraUscita,$minUscita)-toMinuti($oraIngresso,$minIngresso);
        if ($tempoDiLavoro <= 8*60){
            $guadagnoTotale = calcoloCompenso($tempoDiLavoro);
        }
        else{
            $guadagnoStraordinario = calcoloStraordinario($tempoDiLavoro);
            $guadagnoTotale = $guadagnoStraordinario + calcoloCompenso(8*60);
        }
        ?>

        <p>Guadagno Totale</p>
        <input type="text" name="guadagno-totale" value="<?php echo $guadagnoTotale;?>" readonly>
        <p>Tempo di lavoro totale (minuti)</p>
        <input type="text" name="lavoro-totale" value="<?php echo $tempoDiLavoro;?>" readonly>
        <p>Guadagno su 8 ore</p>
        <input type="text" name="guadagno-8ore" value="<?php echo $guadagnoTotale-$guadagnoStraordinario;?>" readonly>
        <p>Tempo di lavoro su straordinari (minuti)</p>
        <input type="text" name="lavoro-straordinari" value="<?php if(($tempoDiLavoro - 8*60) > 0){echo $tempoDiLavoro - 8*60;}else{echo 0;}?>" readonly>
        <p>Guadagno Straordinari</p>
        <input type="text" name="guadagno-straordinario" value="<?php echo $guadagnoStraordinario;?>" readonly>
    </body>
</html>