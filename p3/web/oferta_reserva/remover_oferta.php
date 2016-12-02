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
    $code = $_REQUEST['code'];
    $start_date = $_REQUEST['start_date'];
    try
    {
        include "../setup.php";
        $db = getPDO();
    
        $db->query("start transaction;");

        $sql = "DELETE FROM oferta WHERE oferta.morada = :morada AND oferta.codigo = :code AND oferta.data_inicio = :start_date;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);
        $stmt->bindParam(':start_date',$start_date,PDO::PARAM_STR);

        $stmt->execute();

        $db->query("commit;");

        echo("<p>Oferta removida com sucesso.</p>");

        $db = null;
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    <div style="text-align:center;"><input action="action" type="button" value="Voltar" onclick="history.go(-1);"/></div>
    </body>
</html>
