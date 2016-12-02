<html>
<head>
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
<?php
    $method = $_REQUEST['method'];
    $num = $_REQUEST['number'];
    try
    {
        include "../setup.php";
        $db = getPDO();
        
        $db->query("start transaction;");

        $sql = "INSERT INTO estado(`numero`,`time_stamp`,`estado`)VALUES(:num,:ts,'Paga');";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':num',$num,PDO::PARAM_STR);
        $ts = date("Y-m-d H:i:s");
        $stmt->bindParam(':ts',$ts,PDO::PARAM_STR);

        $stmt->execute();

        $sql = "INSERT INTO paga(`numero`,`data`,`metodo`)VALUES(:num,:ts,:method);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':num',$num,PDO::PARAM_STR);
        $stmt->bindParam(':ts',$ts,PDO::PARAM_STR);
        $stmt->bindParam(':method',$method,PDO::PARAM_STR);

        $stmt->execute();

        $db->query("commit;");

        echo("<p>Reserva paga com sucesso.</p>");

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
