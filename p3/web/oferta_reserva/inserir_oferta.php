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
    $end_date = $_REQUEST['end_date'];
    $tarifa = $_REQUEST['tarifa'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181500";
        $password = "tovv0904";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");

        $sql = "INSERT INTO oferta(`morada`,`codigo`,`data_inicio`,`data_fim`,`tarifa`)VALUES(:morada,:code,:start_date,:end_date,:tarifa);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);
        $stmt->bindParam(':start_date',$start_date,PDO::PARAM_STR);
        $stmt->bindParam(':end_date',$end_date,PDO::PARAM_STR);
        $stmt->bindParam(':tarifa',$tarifa,PDO::PARAM_STR);

        $stmt->execute();

        $db->query("commit;");

        echo("<p>Oferta criada com sucesso.</p>");

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