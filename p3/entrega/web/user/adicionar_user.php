<html>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <title>BD 2016/2017 - InstantOffice</title>
    <meta charset="UTF-8" http-equiv="content-language" content="pt">
    <link rel="stylesheet" href="../styles.css">
</head>
    <body>
        <h3>Adicionar User</h3>
        <form action="inserir_user.php" method="post">
            <p>NIF: <input type="number" min="0" name="nif"/></p>
            <p>Nome: <input type="text" name="name"/></p>
            <p>Telefone: <input type="text" name="phone"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
        <div style="text-align:center;"><a href="gerir_user.php">Voltar</a></div>
    </body>
</html>