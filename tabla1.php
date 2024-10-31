<!DOCTYPE html>
<html>
    <head>
        <title>Tabla</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #000;
                text-align: center;
                padding: 8px;
            }
            /* fondo azul de la celda izquierda superior */
            .header-fa {
                background-color: #4344AB;
            }
            /* fondo morado para la columna de los divisores y la fila del 50 al 60 */
            .header-number, .divisor-column {
                background-color: #A44FF2;
            }
            /* fondo amarillo para los divisores impares */
            .yellow-bg {
                background-color: #EBEF8A;
            }
            /* fondo naranja para los divisores pares */
            .orange-bg {
                background-color: #EFC78A;
            }
        </style>
    </head>
    <body>
        <h1>Divisores</h1>
        <form method="numbers">
            <label for="num1">Número inicial:</label><br>
            <input type="number" id="num1" name="num1" required>
            <br><br>
            <label for="num2">Número final:</label><br>
            <input type="number" id="num2" name="num2" required>
            <br><br>
            <button type="submit">Done</button>
        </form> 
        <?php
        /* obtenemos los divisores */
        $num1 = isset($_numbers['num1']);
        $num2 = isset($_numbers['num2']);

        /* validamos el número inicial sea menor que el final */
        if ($num1 > $num2) {
            echo "<p> El número incial debe ser menor o igual que el final </p>";
            exit;
        }

        /* array de divisores entre el rango */
        $divisores = range($num1, $num2);

        /* array de los números del 50 al 60 */
        $nums = range(50, 60);

        /* resultados de la divisibilidad */
        $res = array();
        foreach ($divisores as $divisor) {
            $res[$divisor] = array();
            /* si es divisible se marca con * si no lo es con - */
            foreach ($nums as $num) {
                $res[$divisor][$num] = ($num % $divisor == 0) ? '*' : '-';
            }
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th class="head-fa"></th>
                    <?php
                        /* encabezado de los números del 50 al 60 */
                        foreach ($nums as $num) {
                            echo "<th class='header-number'>$num</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    /* recorremos divisores y resultados para generar filas */
                    foreach ($divisores as $index => $divisor) {
                        /* alterar color de fondo entre amarillo para los impares y naranja para los pares */
                        $bg = ($index % 2 == 0) ? "orange-bg" : "yellow-bg";
                        echo "<tr class='$bg'>";
                        /* columna de divisores con el fondo morado */
                        echo "<td class='divisor-column'>$divisor</td>";

                        /* recorremos cada número y mostramos si es o no divisible */
                        foreach ($nums as $num) {
                            echo "<td>" . $res[$divisor][$num] . "</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>    
    </body>
</html>