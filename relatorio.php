<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Relatório</title>
</head>
<body>
    <?php
    require 'config.php';

    $lista = [];
    $sql = $pdo->query("SELECT * FROM votos");
    if ($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <h1>Relatório de Votos</h1>

    <table border="1" width="70%">
        <tr>
            <th>Nome da Chapa</th>
            <th>Quantia de Votos</th>
            <th>Percentual</th>
        </tr>
        <?php
            $sql = $pdo->query("SELECT voto, COUNT(*) AS total_votos FROM votos GROUP BY voto");
            $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

            $sql = $pdo->query("SELECT * FROM votos");
            $somatorio_final = $sql->rowCount()
        ?>
        <?php foreach($resultados as $resultado): ?>
            <tr>
                <td><?= $resultado['voto'] ?></td>
                <td><?= $resultado['total_votos'] ?></td>
                <td>
                    <?php
                    $percentual = ($resultado['total_votos'] / $somatorio_final) * 100;
                    $formatado = number_format($percentual, 2) ."%";
                    echo $formatado;
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td><strong>TOTAL</strong></td>
            <td><?= "<strong>$somatorio_final</strong>" ?></td>
            <td><strong>100%</strong></td>
        </tr>
    </table>

    <a href="votacao.php">Voltar para Votação</a>
</body>
</html>