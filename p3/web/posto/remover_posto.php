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
    $code_space = $_REQUEST['code_space'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181500";
        $password = "tovv0904";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");

        $sql = "DELETE FROM posto WHERE posto.morada = :morada AND posto.codigo = :code AND posto.codigo_espaco = :code_space;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);    
        $stmt->bindParam(':code',$code,PDO::PARAM_STR); 
        $stmt->bindParam(':code_space',$code_space,PDO::PARAM_STR); 

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
