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
    $nif = $_REQUEST['nif'];
    try
    {
        include "../setup.php";
        $db = getPDO();

        $db->query("start transaction;");

        $sql = "DELETE FROM user WHERE user.nif = :nif;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':nif',$nif,PDO::PARAM_STR);


        $stmt->execute();

        $db->query("commit;");

        echo("<p>User removido com sucesso!</p>");

        $db = null;
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    <div style="text-align:center;"><a href="gerir_user.php">Voltar</a></div>
    </body>
</html>
