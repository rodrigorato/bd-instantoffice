<html>
    <body>
<?php
    $morada = $_REQUEST['morada'];
    $code = $_REQUEST['code'];
    $start_date = $_REQUEST['start_date'];
    $nif = $_REQUEST['nif'];
    $num = $_REQUEST['number'];
    date("Y-m-d H:i:s");
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181500";
        $password = "tovv0904";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");

        $sql = "INSERT INTO reserva(`numero`)VALUES(:num);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':num',$num,PDO::PARAM_STR);

        echo("<p>$sql</p>");

        $stmt->execute();

        $sql = "INSERT INTO aluga(`morada`,`codigo`,`data_inicio`,`nif`,`numero`)VALUES(:morada,:code,:start_date,:nif,:num);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);
        $stmt->bindParam(':start_date',$start_date,PDO::PARAM_STR);
        $stmt->bindParam(':nif',$nif,PDO::PARAM_STR);
        $stmt->bindParam(':num',$num,PDO::PARAM_STR);

        echo("<p>$sql</p>");

        $stmt->execute();

        $sql = "INSERT INTO estado(`numero`,`time_stamp`,`estado`)VALUES(:num,:ts,'Pendente');";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':num',$num,PDO::PARAM_STR);
        $timestamp = date("Y-m-d H:i:s");
        $stmt->bindParam(':ts',$ts,PDO::PARAM_STR);

        echo("<p>$sql</p>");

        $stmt->execute();

        $db->query("commit;");

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
