<html>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
    <h3>Edifício</h3>
    <?php
        try{
            include "../setup.php";
            $db = getPDO(); 
            
            $sql = "SELECT * FROM edificio;";
        
            $result = $db->query($sql);
        
            echo "<div class=\"menu\"> <br>";
            echo("<table border=\"0\" cellspacing=\"5\">\n");
            echo "<th>Morada</th>";
            foreach($result as $row)
            {
                echo("<tr>\n");
                echo("<td>{$row['morada']}</td>\n");
                echo("<td><a href=\"remover_edificio.php?morada={$row['morada']}\">Remover Edifício</a></td>\n");
                echo "<td><a href=\"verificar_total_realizado_espaco.php?morada={$row['morada']}\">Verificar Total Realizado</a></td>\n";
                echo("</tr>\n");
            }
            echo("</table>\n");
            echo "</div>";
        
            $db = null;
        }
        catch (PDOException $e)
        {
            echo("<p>ERROR: {$e->getMessage()}</p>");
        }
    ?>
        <br><p><a href="adicionar_edificio.php">Inserir Edifício</a></p>
        <div style="text-align:center;"><a href="../index.html">Voltar</a></div>
    </body>
</html>
        
