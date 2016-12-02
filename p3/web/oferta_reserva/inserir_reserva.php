<html>
<head>
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
<?php
    $morada = $_REQUEST['morada'];
    $code = $_REQUEST['code'];
    $start_date = $_REQUEST['start_date'];
    $nif = $_REQUEST['nif'];
    $num = $_REQUEST['number'];
    try
    {
        include "../setup.php";
        $db = getPDO();
    
        $db->query("start transaction;");

        $sql = "INSERT INTO reserva(`numero`)VALUES(:num);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':num',$num,PDO::PARAM_STR);

        $stmt->execute();

        $sql = "INSERT INTO aluga(`morada`,`codigo`,`data_inicio`,`nif`,`numero`)VALUES(:morada,:code,:start_date,:nif,:num);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);
        $stmt->bindParam(':start_date',$start_date,PDO::PARAM_STR);
        $stmt->bindParam(':nif',$nif,PDO::PARAM_STR);
        $stmt->bindParam(':num',$num,PDO::PARAM_STR);

        $stmt->execute();

        $sql = "INSERT INTO estado(`numero`,`time_stamp`,`estado`)VALUES(:num,:ts,'Aceite');";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':num',$num,PDO::PARAM_STR);
        $ts = date("Y-m-d H:i:s");
        $stmt->bindParam(':ts',$ts,PDO::PARAM_STR);

        $stmt->execute();

        $db->query("commit;");

        echo("<p>Reserva criada com sucesso.</p>");

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
