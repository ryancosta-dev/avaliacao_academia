<?php

/**
 * listar_alunos.php
 * Lista todos os alunos cadastrados na academia com o total do contrato.
 */

require_once __DIR__ . '/config/conexao.php';
require_once __DIR__ . '/class/Aluno.php';
require_once __DIR__ . '/helpers.php';

// Busca todos os alunos ordenados pelo código (mais recente primeiro)
$sql  = "SELECT codigo, nome, plano, mensalidade, meses FROM alunos ORDER BY codigo DESC";
$stmt = $pdo->query($sql);

// Percorre os resultados e cria objetos Aluno
$alunos = [];
while ($row = $stmt->fetch()) {
    $alunos[] = new Aluno(
        $row['nome'],
        $row['plano'],
        (float) $row['mensalidade'],
        (int)   $row['meses'],
        (int)   $row['codigo']
    );
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia – Alunos Cadastrados</title>
    <style>
        /* Reset básico */
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            color: #333;
            padding: 30px 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 24px;
            color: #2c3e50;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,.15);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #2c3e50;
            color: #fff;
        }

        thead th {
            padding: 12px 16px;
            text-align: left;
        }

        tbody tr:nth-child(even) { background: #f9f9f9; }
        tbody tr:hover            { background: #eaf4ff; }

        tbody td {
            padding: 10px 16px;
            border-bottom: 1px solid #ddd;
        }

        .total-col { font-weight: bold; color: #27ae60; }

        .sem-alunos {
            padding: 20px;
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>

<h1>Alunos Cadastrados</h1>

<div class="container">
    <?php if (empty($alunos)): ?>
        <p class="sem-alunos">Nenhum aluno cadastrado.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Plano</th>
                    <th>Mensalidade</th>
                    <th>Meses</th>
                    <th>Total do contrato</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                <tr>
                    <td><?= htmlspecialchars($aluno->getCodigo()) ?></td>
                    <td><?= htmlspecialchars($aluno->getNome()) ?></td>
                    <td><?= htmlspecialchars($aluno->getPlano()) ?></td>
                    <td><?= formatarMoeda($aluno->getMensalidade()) ?></td>
                    <td><?= htmlspecialchars($aluno->getMeses()) ?></td>
                    <td class="total-col">
                        <?= formatarMoeda($aluno->calcularTotalContrato()) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</body>
</html>
