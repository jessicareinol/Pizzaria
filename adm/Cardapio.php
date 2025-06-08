<?php
class Cardapio extends Conn {
    public object $conn;
    public array $formData;
    public int $id;

    public function list(): array {
        $this->conn = $this->conectar();
        $query = "SELECT * FROM cardapio ORDER BY nome";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }

    public function inserir(): bool {
        $this->conn = $this->conectar();
        $query = "INSERT INTO cardapio (nome, descricao, preco, imagem, created) 
                  VALUES (:nome, :descricao, :preco, :imagem, NOW())";
        $add = $this->conn->prepare($query);
        $add->bindParam(':nome', $this->formData['nome']);
        $add->bindParam(':descricao', $this->formData['descricao']);
        $add->bindParam(':preco', $this->formData['preco']);
        $add->bindParam(':imagem', $this->formData['imagem']);
        $add->execute();

        return $add->rowCount() > 0;
    }

    public function view() {
        $this->conn = $this->conectar();
        $query = "SELECT * FROM cardapio WHERE id = :id LIMIT 1";
        $result = $this->conn->prepare($query);
        $result->bindParam(':id', $this->id);
        $result->execute();
        return $result->fetch();
    }

    public function edit(): bool {
        $this->conn = $this->conectar();

        //se a imagem tiver vazia, mantem a imagem atual
        if (empty($this->formData['imagem'])) {
            $this->formData['imagem'] = $this->formData['imagem_atual'] ?? '';
        }

        $query = "UPDATE cardapio 
                  SET nome = :nome, descricao = :descricao, preco = :preco, imagem = :imagem, modified = NOW()
                  WHERE id = :id";
        $edit = $this->conn->prepare($query);
        $edit->bindParam(':nome', $this->formData['nome']);
        $edit->bindParam(':descricao', $this->formData['descricao']);
        $edit->bindParam(':preco', $this->formData['preco']);
        $edit->bindParam(':imagem', $this->formData['imagem']);
        $edit->bindParam(':id', $this->formData['id']);
        $edit->execute();

        return $edit->rowCount() > 0;
    }

    public function delete(): bool {
        $this->conn = $this->conectar();
        $query = "DELETE FROM cardapio WHERE id = :id";
        $del = $this->conn->prepare($query);
        $del->bindParam(':id', $this->id);
        return $del->execute();
    }
}

