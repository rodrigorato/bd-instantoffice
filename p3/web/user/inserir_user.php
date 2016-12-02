<html>
<head>
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
<?php
    $nif = $_REQUEST['nif'];
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    try
    {
        include "../setup.php";
        $db = getPDO();

        $db->query("start transaction;");

        $sql = "INSERT INTO user(`nif`,`nome`,`telefone`)VALUES(:nif,:name,:phone);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':nif',$nif,PDO::PARAM_STR);
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $stmt->bindParam(':phone',$phone,PDO::PARAM_STR);


        $stmt->execute();

        $db->query("commit;");

        echo("<p>User inserido com sucesso!</p>");

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
