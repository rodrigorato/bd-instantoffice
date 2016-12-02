<html>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
    <h3>Posto</h3>
<?php
    try
    {
        include "../setup.php";
        $db = getPDO();

        $sql = "SELECT * FROM posto;";
    
        $result = $db->query($sql);

        echo "<div class=\"menu\"> <br>";
    
        echo("<table border=\"0\" cellspacing=\"5\">\n");
        echo "<th> Morada </th>";
        echo "<th> Código </th>";
        echo "<th> Código de Espaço </th>";
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td>{$row['codigo']}</td>\n");
            echo("<td>{$row['codigo_espaco']}</td>\n");
            echo("<td><a href=\"remover_posto.php?morada={$row['morada']}&code={$row['codigo']}&code_space={$row['codigo_espaco']}\">Remover Posto</a></td>\n");
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
        <br><p><a href="adicionar_posto.php">Inserir Posto</a></p>
    <div style="text-align:center;"><a href="../index.html">Voltar</a></div>
    </body>
</html>
        
