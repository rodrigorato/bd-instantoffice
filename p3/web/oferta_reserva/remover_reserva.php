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

        echo("<p>$sql</p>");

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
    </body>
</html>
