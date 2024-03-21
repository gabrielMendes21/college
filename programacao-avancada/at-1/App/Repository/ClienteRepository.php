<?php
namespace App\Repository;

use App\Database\Database;
use App\Model\Cliente;
use PDO;

class ClienteRepository
{
    private $conn;
    private $cliente;

    public function __construct(Cliente $cliente) {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->cliente = $cliente;
    }

    public function insert(){
        $nome = $this->cliente->getNome();
        $email = $this->cliente->getEmail();
        $cidade = $this->cliente->getCidade();
        $estado = $this->cliente->getEstado();

        $query = "INSERT INTO clientes (nome, email, cidade, estado) VALUES (:nome, :email, :cidade, :estado)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":cidade", $cidade);
        $stmt->bindParam(":estado", $estado);

        if($stmt->execute())
            return true;
        else
            return false;
    }

    public function getAll(){
        $query = "SELECT * FROM clientes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(){
        $id = $this->cliente->getCliente_id();
        $query = "SELECT * FROM clientes WHERE cliente_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(){
        $id = $this->cliente->getCliente_id();
        $nome = $this->cliente->getNome();
        $email = $this->cliente->getEmail();
        $cidade = $this->cliente->getCidade();
        $estado = $this->cliente->getEstado();

        $query = "UPDATE clientes SET  nome = :nome, email = :email, cidade = :cidade, estado = :estado WHERE cliente_id = :cliente_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":cliente_id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":cidade", $cidade);
        $stmt->bindParam(":estado", $estado);

        if($stmt->execute())
            return true;
        else
            return false;
    }

    public function delete(){
        $id = $this->cliente->getCliente_id();
        $query = "DELETE FROM clientes WHERE cliente_id = :cliente_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":cliente_id", $id, PDO::PARAM_INT);
        
        if($stmt->execute())
            return true;
        else
            return false;
    }
}