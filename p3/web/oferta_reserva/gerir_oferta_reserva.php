<html>
<head>
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8">
    <style type="text/css">
        body
        {
            font-family: Verdana, Geneva, sans-serif;   
        }
        h1,h2,h3,table,th,tr,td,.menu,p
        {
            margin: auto;
            text-align: center;
        }
        p
        {
            font-size: large;
        }
        table,th,tr,td
        {
             border: 1px solid black;
        }
    </style>
</head>
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
    </body>
</html>