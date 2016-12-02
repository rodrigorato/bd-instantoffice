<html>
<head>
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
    <h3>Ofertas e Reservas</h3>
<?php
    try
    {
        include "../setup.php";
        $db = getPDO();

        $sql = "SELECT * FROM oferta;";
    
        $result = $db->query($sql);

        echo "<div class=\"menu\">";

        echo "<br><p>Ofertas</p> <br>";
    
        echo("<table border=\"0\" cellspacing=\"5\">\n");
        echo "<th>Morada </th>";
        echo "<th>Código </th>";
        echo "<th>Data de Início</th>";
        echo "<th>Data de Fim</th>";
        echo "<th>Tarifa</th>";
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td>{$row['codigo']}</td>\n");
            echo("<td>{$row['data_inicio']}</td>\n");
            echo("<td>{$row['data_fim']}</td>\n");
            echo("<td>{$row['tarifa']}</td>\n");
            echo("<td><a href=\"remover_oferta.php?morada={$row['morada']}&code={$row['codigo']}&start_date={$row['data_inicio']}\">Remover Oferta</a></td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");
        echo "</div>";
        echo  "<br><p><a href=\"adicionar_oferta.php\">Criar Oferta</a></p>";
        echo  "<br><p><a href=\"adicionar_reserva.php\">Reservar Oferta</a></p><br>";

        $sql = "SELECT * FROM aluga;";
    
        $result = $db->query($sql);

        echo "<div class=\"menu\">";

        echo "<p>Reservas</p> <br>";

        echo("<table border=\"0\" cellspacing=\"5\">\n");
        echo "<th>Morada</th>";
        echo "<th>Código</th>";
        echo "<th>Data de Início</th>";
        echo "<th>NIF</th>";
        echo "<th>Número</th>";
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td>{$row['codigo']}</td>\n");
            echo("<td>{$row['data_inicio']}</td>\n");
            echo("<td>{$row['nif']}</td>\n");
            echo("<td>{$row['numero']}</td>\n");
            echo("<td><a href=\"remover_reserva.php?morada={$row['morada']}&code={$row['codigo']}&start_date={$row['data_inicio']}&nif={$row['nif']}&number={$row['numero']}\">Anular Reserva</a></td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");
        echo "</div> <br>";

         $sql = "SELECT * FROM estado;";
    
        $result = $db->query($sql);

        echo "<div class=\"menu\">";

        echo "<p>Estados das Reservas</p> <br>";

        echo("<table border=\"0\" cellspacing=\"5\">\n");
        echo "<th>Número</th>";
        echo "<th>Timestamp</th>";
        echo "<th>Estado</th>";
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['numero']}</td>\n");
            echo("<td>{$row['time_stamp']}</td>\n");
            echo("<td>{$row['estado']}</td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");
        echo "</div> <br>";
        echo  "<p><a href=\"pagar_reserva.php\">Pagar Reserva</a></p>";

        $db = null;
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    <div style="text-align:center;"><input action="action" type="button" value="Voltar" onclick="history.go(-1);"/></div>
    </body>
</html>