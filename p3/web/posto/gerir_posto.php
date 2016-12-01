<html>
<head>
    <title>BD 2016/2017 - InstantOffice</title>
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
    </body>
</html>
        
