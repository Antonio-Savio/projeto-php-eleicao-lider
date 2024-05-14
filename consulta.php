<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Consulta</title>
</head>
<body> 
    <?php
    require 'config.php';

    $lista = [];
    $sql = $pdo->query("SELECT * FROM `cadastro-chapas`");
    if ($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <h1>Chapas Cadastradas</h1>
    <table border="1" width="70%">
        <tr>
            <th>Nome da Chapa</th>
            <th>Código da Chapa</th>
            <th>Matrícula do Líder</th>
            <th>Líder</th>
            <th>Matrícula do Vice-líder</th>
            <th>Vice-líder</th>
        </tr>
        <?php foreach($lista as $cadastro): ?>
            <tr>
                <td><?= $cadastro['nome_chapa']; ?></td>
                <td><?= $cadastro['codigo_chapa']; ?></td>
                <td><?= $cadastro['matricula_lider']; ?></td>
                <td><?= $cadastro['nome_lider']; ?></td>
                <td><?= $cadastro['matricula_vice']; ?></td>
                <td><?= $cadastro['nome_vice']; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

    <a href="index.html">Cadastrar Chapas</a>
    <a href="votacao.php">Votar Agora</a>
</body>
</html>