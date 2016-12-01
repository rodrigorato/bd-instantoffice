<html>
    <body>
<?php
    $morada = $_REQUEST['morada'];
    $code = $_REQUEST['code'];
    $code_space = $_REQUEST['code_space'];
    $foto = 'http://lorempixel.com/400/200/';
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181500";
        $password = "tovv0904";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");

        $sql = "INSERT INTO alugavel(`morada`,`codigo`,`foto`)VALUES(:morada,:code,:foto);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);
        $stmt->bindParam(':foto',$foto,PDO::PARAM_STR);

        echo("<p>$sql</p>");

        $stmt->execute();

        $sql = "INSERT INTO posto(`morada`,`codigo`,`codigo_espaco`)VALUES(:morada,:code,:codigo_espaco);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);
        $stmt->bindParam(':codigo_espaco',$code_space,PDO::PARAM_STR);

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
