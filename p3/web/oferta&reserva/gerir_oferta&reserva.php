<html>
    <body>
    <h3>Ofertas e Reservas</h3>
<?php
    try
    {

        $host = "db.ist.utl.pt";
        $user ="ist181500";
        $password = "tovv0904";
        $dbname = $user;
    
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = "SELECT * FROM oferta;";
    
        $result = $db->query($sql);

        echo "<p>Ofertas</p>";
    
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
        echo  "<p><a href=\"adicionar_oferta.php\">Criar Oferta</a></td></p>";
        echo  "<p><a href=\"adicionar_reserva.php\">Reservar Oferta</a></td></p>";

        $sql = "SELECT * FROM aluga;";
    
        $result = $db->query($sql);

        echo "<p>Reservas</p>";

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
            echo("<td><a href=\"\">Anular Reserva</a></td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");

         $sql = "SELECT * FROM estado;";
    
        $result = $db->query($sql);

        echo "<p>Estados das Reservas</p>";

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
            echo("<td><a href=\"\">????</a></td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");
        echo  "<p><a href=\"pagar_reserva.php\">Pagar Reserva</a></td></p>";

        $db = null;
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    </body>
</html>