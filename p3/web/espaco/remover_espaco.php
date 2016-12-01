<html>
    <body>
<?php
    $morada = $_REQUEST['morada'];
    $code = $_REQUEST['code'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181500";
        $password = "tovv0904";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");
        

        $sql = "DELETE FROM espaco WHERE espaco.morada = :morada AND espaco.codigo = :code;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);    
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);    

        echo("<p>$sql</p>");

        $stmt->execute();

        $sql = "DELETE FROM alugavel WHERE alugavel.morada = :morada AND alugavel.codigo = :code;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);    
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);    

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
