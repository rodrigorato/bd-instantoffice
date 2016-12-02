<html>
<head>
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
<?php
    $morada = $_REQUEST['morada'];
    try
    {
        include "../setup.php";
            $db = getPDO();

        $db->query("start transaction;");

        $sql = "DELETE FROM edificio WHERE edificio.morada = :morada;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);    

        $stmt->execute();

        $db->query("commit;");

        echo("<p>Edifício removido com sucesso.</p>");

        $db = null;
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    <div style="text-align:center;"><a href='javascript:window.location = document.referrer;'>Voltar</a></div>
    </body>
</html>
