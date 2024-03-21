<?php
    namespace App\Controller;
    use App\Database\Database;

    class ClientController {
        private $conn;
        private $cliente;
        public function __construct($cliente) {
            $database = new Database();
            $this->conn = $database->getConnection();
            $this->cliente = $cliente;
        }

        public function insertClient() {
            $id = $this->cliente->getCliente_id();
            $nome = $this->cliente->getNome();
            $email = $this->cliente->getEmail();
            $cidade = $this->cliente->getCidade();
            $estado = $this->cliente->getEstado();
            $query = 'INSERT INTO clientes (nome, email, cidade, estado) VALUES (:nome, :email, :cidade, :estado)';

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':estado', $estado);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }
    }
?>
