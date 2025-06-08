<?php
class Vendida extends Conn {
    public object $conn;
    public array $formData;
    public int $id;

    public function list(): array {
        $this->conn = $this->conectar();
        $query = "SELECT * FROM mais_vendidas ORDER BY nome";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }

    public function inserir(): bool {
        $this->conn = $this->conectar();
        $query = "INSERT INTO mais_vendidas (nome, descricao, imagem) 
                  VALUES (:nome, :descricao, :imagem)";
        $add = $this->conn->prepare($query);
        $add->bindParam(':nome', $this->formData['nome']);
        $add->bindParam(':descricao', $this->formData['descricao']);
        $add->bindParam(':imagem', $this->formData['imagem']);
        $add->execute();

        return $add->rowCount() > 0;
    }

    public function view() {
        $this->conn = $this->conectar();
        $query = "SELECT * FROM mais_vendidas WHERE id = :id LIMIT 1";
        $result = $this->conn->prepare($query);
        $result->bindParam(':id', $this->id);
        $result->execute();
        return $result->fetch();
    }

    public function edit(): bool {
        $this->conn = $this->conectar();
        $query = "UPDATE mais_vendidas 
                  SET nome = :nome, descricao = :descricao, imagem = :imagem
                  WHERE id = :id";
        $edit = $this->conn->prepare($query);
        $edit->bindParam(':nome', $this->formData['nome']);
        $edit->bindParam(':descricao', $this->formData['descricao']);
        $edit->bindParam(':imagem', $this->formData['imagem']);
        $edit->bindParam(':id', $this->formData['id']);
        $edit->execute();

        return $edit->rowCount() > 0;
    }

    public function delete(): bool {
        $this->conn = $this->conectar();
        $query = "DELETE FROM mais_vendidas WHERE id = :id";
        $del = $this->conn->prepare($query);
        $del->bindParam(':id', $this->id);
        return $del->execute();
    }
}
?>

