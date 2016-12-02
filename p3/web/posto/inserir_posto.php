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
    $nif = $_REQUEST['nif'];
    $code_space = $_REQUEST['code_space'];
    $foto = 'http://lorempixel.com/400/200/';
    try
    {
        include "../setup.php";
        $db = getPDO();
    
        $db->query("start transaction;");

        $sql = "INSERT INTO alugavel(`morada`,`codigo`,`foto`)VALUES(:morada,:code,:foto);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);
        $stmt->bindParam(':foto',$foto,PDO::PARAM_STR);

        $stmt->execute();

        $sql = "INSERT INTO arrenda(`morada`,`codigo`,`nif`)VALUES(:morada,:code,:nif);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);
        $stmt->bindParam(':nif',$nif,PDO::PARAM_STR);
            
        $stmt->execute();

        $sql = "INSERT INTO posto(`morada`,`codigo`,`codigo_espaco`)VALUES(:morada,:code,:codigo_espaco);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);
        $stmt->bindParam(':codigo_espaco',$code_space,PDO::PARAM_STR);


        $stmt->execute();

        $db->query("commit;");

        echo("<p>Posto inserido com sucesso!</p>");

        $db = null;
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    <div style="text-align:center;"><a href="gerir_posto.php">Voltar</a></div>
    </body>
</html>
