<html>
    <body>
    <h3>Edifício</h3>
<?php
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181500";
        $password = "tovv0904";
        $dbname = $user;
    
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = "SELECT * FROM Edificio;";
    
        $result = $db->query($sql);
    
        echo("<table border=\"0\" cellspacing=\"5\">\n");
        echo "<th>Morada</th>";
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td><form><a href=\"remover_edificio.php?morada={$row['morada']}\">Remover Edifício</a></form</td>\n");
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
        <a href="adicionar_edificio.php">Inserir Edifício</a></td>
    </body>
</html>
        
