<html>
<head>
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8">
    <style type="text/css">
        body
        {
            font-family: Verdana, Geneva, sans-serif;   
        }
        h1,h2,h3,table
        {
            text-align: center;
        }
        .menu
        {
            text-align: center;
        }
    </style>
</head>
    <body>
<?php
    $method = $_REQUEST['method'];
    $num = $_REQUEST['number'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181500";
        $password = "tovv0904";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
    </body>
</html>
