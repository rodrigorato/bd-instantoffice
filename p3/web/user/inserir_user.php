<html>
    <body>
<?php
    $nif = $_REQUEST['nif'];
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181500";
        $password = "tovv0904";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");

        $sql = "INSERT INTO user(`nif`,`nome`,`telefone`)VALUES(:nif,:name,:phone);";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':nif',$nif,PDO::PARAM_STR);
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $stmt->bindParam(':phone',$phone,PDO::PARAM_STR);

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
