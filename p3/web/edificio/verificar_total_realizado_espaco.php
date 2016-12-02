<html>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
    <h3>Total Realizado por Edifício</h3>
<?php
    $morada = $_REQUEST['morada'];
    try
    {
        include "../setup.php";
        $db = getPDO();
    
        $sql = "SELECT DISTINCT morada, codigo, SUM(DATEDIFF(data_fim, data_inicio)*tarifa) as montante_pago_2016
                FROM paga NATURAL JOIN aluga NATURAL JOIN espaco NATURAL JOIN oferta NATURAL JOIN estado
                WHERE
                    estado = 'Aceite' AND
                    morada = :morada
                GROUP BY morada, codigo
                UNION
                SELECT DISTINCT morada, codigo_espaco, SUM(DATEDIFF(data_fim, data_inicio)*tarifa) as montante_pago_2016
                FROM paga NATURAL JOIN aluga NATURAL JOIN posto NATURAL JOIN oferta NATURAL JOIN estado
                WHERE
                    estado = 'Aceite' AND
                    morada = :morada
                GROUP BY morada, codigo_espaco;";
    
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);

        $stmt->execute();

        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        echo("<table border=\"0\" cellspacing=\"5\">\n");
        echo "<th>Morada</th>";
        echo "<th>Código</th>";
        echo "<th>Total Realizado</th>";
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td>{$row['codigo']}</td>\n");
            echo("<td>{$row['montante_pago_2016']}</td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");
    
        $db = null;
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    </body>
    
    <div style="text-align:center;"><input action="action" type="button" value="Voltar" onclick="history.go(-1);"/></div>
</html>
        
