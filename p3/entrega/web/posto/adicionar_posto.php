<html>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
        <h3>Adicionar Posto</h3>
        <form action="inserir_posto.php" method="post">
            <p>Morada: <input type="text" name="morada"/></p>
            <p>Código: <input type="text" name="code"/></p>
            <p>Código do Espaço: <input type="text" name="code_space"/></p>
            <p>NIF: <input type="number" name="nif"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
        <div style="text-align:center;"><a href="gerir_posto.php">Voltar</a></div>
    </body>
</html>