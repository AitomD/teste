<?php
header('Content-Type: application/json');
require_once '../core/Database.php'; // ajuste o caminho se necessário

try {
    $pdo = Database::conectar();

    // Consulta produtos com JOIN na tabela produto_info
    $sql = "SELECT p.id_produto, p.nome, p.preco, p.quantidade, p.id_categoria,
                   pi.descricao, pi.cor, pi.marca, pi.ram, pi.armazenamento,
                   pi.processador, pi.placa_mae, pi.placa_video, pi.fonte, pi.imagem
            FROM produto p
            JOIN produto_info pi ON p.id_info = pi.id_info";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($produtos);

} catch (PDOException $e) {
    echo json_encode(["erro" => "Erro ao buscar produtos: " . $e->getMessage()]);
}
