<html>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
    <h3>Utilizadores</h3><br>
<?php
    try
    {
        include "../setup.php";
        $db = getPDO();
    
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
            echo("<td>");
            echo(utf8_encode("{$row['nome']}"));
            echo("</td>\n");
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
        <div style="text-align:center;"><input action="action" type="button" value="Voltar" onclick="history.go(-1);"/></div>
    </body>
</html>