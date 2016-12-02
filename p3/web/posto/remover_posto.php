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
    $code_space = $_REQUEST['code_space'];
    try
    {
        include "../setup.php";
        $db = getPDO();
    
        $db->query("start transaction;");

        $sql = "DELETE FROM posto WHERE posto.morada = :morada AND posto.codigo = :code AND posto.codigo_espaco = :code_space;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);    
        $stmt->bindParam(':code',$code,PDO::PARAM_STR); 
        $stmt->bindParam(':code_space',$code_space,PDO::PARAM_STR); 

        $stmt->execute();

        $sql = "DELETE FROM alugavel WHERE alugavel.morada = :morada AND alugavel.codigo = :code;";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':morada',$morada,PDO::PARAM_STR);    
        $stmt->bindParam(':code',$code,PDO::PARAM_STR);    


        $stmt->execute();

        $db->query("commit;");

        echo("<p>Posto removido com sucesso!</p>");

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
