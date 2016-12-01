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
    <h3>Utilizadores</h3><br>
<?php
    try
    {

        $host = "db.ist.utl.pt";
        $user ="ist181500";
        $password = "tovv0904";
        $dbname = $user;
    
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = "SELECT * FROM user;";
    
        $result = $db->query($sql);

        echo "<div class=\"menu\">";
        echo("<table border=\"0\" cellspacing=\"5\">\n");
        echo "<th> NIF </th>";
        echo "<th> Nome </th>";
        echo "<th> Telefone</th>";
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['nif']}</td>\n");
            echo("<td>{$row['nome']}</td>\n");
            echo("<td>{$row['telefone']}</td>\n");
            echo("<td><a href=\"remover_user.php?nif={$row['nif']}\">Remover User</a></td>\n");
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
        <br><p><a href="adicionar_user.php">Criar User</a></p>
    </body>
</html>