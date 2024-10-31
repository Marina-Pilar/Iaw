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
        <?php
        /* funcion recupera */
        function recupera($key, $min, $max) {
            if(isset($_POST[$key])) {
                $value = intval($_POST[$key]);
                if($value >= $min && $value <= $max) {
                    return $value;
                }
            }
            return null;
        }
        /* obtenemos los divisores */
        $num1 = recupera('num1', 1, 10);
        $num2 = recupera('num2', 10, 20);

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
                    <th class="header-fa"></th>
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
                        $bg = ($index % 2 == 0) ? "yellow-bg" : "orange-bg";
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