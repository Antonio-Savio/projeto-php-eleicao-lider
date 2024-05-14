<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votação</title>
    <link rel="stylesheet" href="style.css">
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
    <h1>Votação</h1>
    <form action="votacao.php" method="post">
        <label for="matricula">Matrícula do aluno</label>
        <input type="number" name="matricula" min="0" required>
        <fieldset>
            <legend>Escolher Chapa</legend>
            <?php foreach($lista as $id => $chapa): ?>
                <input type="radio" name="chapa" value="<?= $chapa['nome_chapa'] ?>" id="<?= $id ?>" required>
                <label for="<?= $id ?>">
                    <strong>Chapa:</strong> <?= $chapa['nome_chapa'] ?> | 
                    <strong>Líder:</strong> <?= $chapa['nome_lider'] ?> | 
                    <strong>Vice-líder:</strong> <?= $chapa['nome_vice'] ?>
                </label>
                <br><br>
            <?php endforeach; ?>
        </fieldset>
        
        <button type="submit">Votar</button>
    </form>

    <a href="consulta.php">Consultar Chapas</a>
    <a href="relatorio.php">Ver Relatório da Votação</a>

    <?php
        $matricula = filter_input(INPUT_POST, 'matricula');
        $voto = filter_input(INPUT_POST, 'chapa');

        if (!empty($voto)) {
            $sql = $pdo->prepare("SELECT * FROM votos WHERE matricula_aluno = :matricula");
            $sql->bindValue(':matricula', $matricula);
            $sql->execute();
    
            if ($sql->rowCount() === 0) {
                $sql = $pdo->prepare("INSERT INTO votos (matricula_aluno, voto) VALUES (:matricula, :voto)");
    
                $sql->bindValue(':matricula', $matricula);
                $sql->bindValue(':voto', $voto);
                $sql->execute();
            }
        }
        exit;
    ?>
</body>
</html>