<html>
    <head>
        <title>Divisores</title>
    </head>
    <body>
        <h1>Divisores para la tabla</h1>
        <form action="tabla3.php" method="POST">
            <label for="num1">Número inicial (entre 1 y 10):</label>
            <input type="number" id="num1" name="num1" min="1" max="10" required>
            <br><br>
            <label for="num2">Número final (entre 10 y 20):</label>
            <input type="number" id="num2" name="num2" min="10" max="20" required>
            <br><br>
            <button type="submit" value="tabla">Done</button>
        </form>
        <?php  
            function recupera($num1, $num2) {
                if($num1 < 1 || $num1 > 10 || $num2 < 10 || $num2 > 20 || $num1 >= $num2) {
                    return false;
                }
            return range($num1, $num2);
            }
?>
    </body>
</html>
   