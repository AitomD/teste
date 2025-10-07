<?php
require_once '../../core/Database.php';

class Produto {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::conectar();
    }

    // 1️⃣ Listar todos os produtos com todas as informações
    public function listarTodos() {
        $sql = "SELECT 
                    p.id_produto,
                    p.nome,
                    p.preco,
                    p.quantidade,
                    p.data_att,
                    m.nome AS marca,
                    c.nome AS categoria,
                    pi.descricao,
                    pi.cor,
                    pi.ram,
                    pi.armazenamento,
                    pi.processador,
                    pi.placa_mae,
                    pi.placa_video,
                    pi.fonte
                FROM produto p
                INNER JOIN marca m ON p.id_marca = m.id_marca
                INNER JOIN categoria c ON p.id_categoria = c.id_categoria
                LEFT JOIN produto_info pi ON p.id_info = pi.id_info
                ORDER BY p.nome ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2️⃣ Filtrar por categoria
    public function filtrarPorCategoria($id_categoria) {
        $sql = "SELECT 
                    p.id_produto,
                    p.nome,
                    p.preco,
                    p.quantidade,
                    p.data_att,
                    m.nome AS marca,
                    c.nome AS categoria,
                    pi.descricao,
                    pi.cor,
                    pi.ram,
                    pi.armazenamento,
                    pi.processador,
                    pi.placa_mae,
                    pi.placa_video,
                    pi.fonte
                FROM produto p
                INNER JOIN marca m ON p.id_marca = m.id_marca
                INNER JOIN categoria c ON p.id_categoria = c.id_categoria
                LEFT JOIN produto_info pi ON p.id_info = pi.id_info
                WHERE p.id_categoria = ?
                ORDER BY p.nome ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_categoria]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 3️⃣ Filtrar por marca
    public function filtrarPorMarca($id_marca) {
        $sql = "SELECT 
                    p.id_produto,
                    p.nome,
                    p.preco,
                    p.quantidade,
                    p.data_att,
                    m.nome AS marca,
                    c.nome AS categoria,
                    pi.descricao,
                    pi.cor,
                    pi.ram,
                    pi.armazenamento,
                    pi.processador,
                    pi.placa_mae,
                    pi.placa_video,
                    pi.fonte
                FROM produto p
                INNER JOIN marca m ON p.id_marca = m.id_marca
                INNER JOIN categoria c ON p.id_categoria = c.id_categoria
                LEFT JOIN produto_info pi ON p.id_info = pi.id_info
                WHERE p.id_marca = ?
                ORDER BY p.nome ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_marca]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 4️⃣ Buscar produto específico
    public function buscarPorId($id_produto) {
        $sql = "SELECT 
                    p.id_produto,
                    p.nome,
                    p.preco,
                    p.quantidade,
                    p.data_att,
                    m.nome AS marca,
                    c.nome AS categoria,
                    pi.descricao,
                    pi.cor,
                    pi.ram,
                    pi.armazenamento,
                    pi.processador,
                    pi.placa_mae,
                    pi.placa_video,
                    pi.fonte
                FROM produto p
                INNER JOIN marca m ON p.id_marca = m.id_marca
                INNER JOIN categoria c ON p.id_categoria = c.id_categoria
                LEFT JOIN produto_info pi ON p.id_info = pi.id_info
                WHERE p.id_produto = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_produto]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
