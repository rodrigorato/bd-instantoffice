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
    date("Y-m-d H:i:s");
    try
    {
        include "../setup.php";
        $db = getPDO();
    
        $db->query("start transaction;");

        $sql = "DELETE FROM aluga WHERE aluga.morada = :morada 
                AND aluga.codigo = :code 
                AND aluga.data_inicio = :start_date 
                AND aluga.nif = :nif 
                AND aluga.numero = :num;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);
        $stmt->bindParam(':start_date',$start_date,PDO::PARAM_STR);
        $stmt->bindParam(':nif',$nif,PDO::PARAM_STR);
        $stmt->bindParam(':num',$num,PDO::PARAM_STR);

        $stmt->execute();

        $sql = "DELETE FROM estado where estado.numero = :num;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':num',$num,PDO::PARAM_STR);


        $stmt->execute();

        $sql = "DELETE FROM paga where paga.numero = :num;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':num',$num,PDO::PARAM_STR);

        $stmt->execute();

        $sql = "DELETE FROM reserva WHERE reserva.numero = :num;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':num',$num,PDO::PARAM_STR);

        $stmt->execute();

        $db->query("commit;");

        echo("<p>Reserva removida com sucesso.</p>");

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
