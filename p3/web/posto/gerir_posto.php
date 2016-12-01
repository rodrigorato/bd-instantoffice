<html>
    <body>
    <h3>Posto</h3>
<?php
    try
    {

        $host = "db.ist.utl.pt";
        $user ="ist181500";
        $password = "tovv0904";
        $dbname = $user;
    
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = "SELECT * FROM posto;";
    
        $result = $db->query($sql);
    
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
    
        $db = null;
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
        <a href="adicionar_posto.php">Inserir Posto</a></td>
    </body>
</html>
        
