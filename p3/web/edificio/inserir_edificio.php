<html>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
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

        $sql = "INSERT INTO edificio(`morada`)VALUES(:morada);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);    

        $stmt->execute();

        $db->query("commit;");

        echo("<p>Edifício inserido com sucesso.</p>");

        $db = null;
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    <div style="text-align:center;"><input action="action" type="button" value="Voltar" onclick="history.go(-2);"/></div>
    </body>
</html>
