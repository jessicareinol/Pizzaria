<?php
    class User extends Conn {
        public object $conn;
        public array $formData;
        public int $id;//10

        public function list(): array {
            $this->conn = $this->conectar();
            $query = "SELECT u.* FROM usuarios u ORDER BY u.nome";
            $result = $this->conn->prepare($query);
            $result->execute();
            $retorno = $result->fetchAll();
            return $retorno;
        }

        public function inserir(): bool {
            $this->conn = $this->conectar();
            //criptografar a senha
            $senha = $this->formData['senha'];
            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

            $query = "INSERT INTO usuarios (nome, email, senha, created) VALUES (:nome, :email, :senha, NOW())";
            $add = $this->conn->prepare($query);
            $add->bindParam(':nome', $this->formData['nome']);
            $add->bindParam(':email', $this->formData['email']);
            $add->bindParam(':senha', $senhaCriptografada); //usar senha criptografada
            $add->execute();
            if ($add->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function view() {
            $this->conn = $this->conectar();
            $query = "SELECT * FROM usuarios WHERE id = :id LIMIT 1";
            $result = $this->conn->prepare($query);
            $result->bindParam(':id', $this->id);//2
            $result->execute();
            $valor = $result->fetch();
            return $valor;
        }

        public function edit(): bool {
            $this->conn = $this->conectar();
            $query = "UPDATE usuarios SET nome = :nome, 
                                          email = :email, 
                                          modified = NOW() 
                                          WHERE id = :id";
            $edit = $this->conn->prepare($query);
            $edit->bindParam(':nome', $this->formData['nome']);
            $edit->bindParam(':email', $this->formData['email']);
            $edit->bindParam(':id', $this->formData['id']);
            $edit->execute();

            if ($edit->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete(): bool {
            $this->conn = $this->conectar();
            $query = "DELETE FROM usuarios WHERE id = :id";
            $del = $this->conn->prepare($query);
            $del->bindParam(':id', $this->id);
            $value = $del->execute();
            return $value;
        }

        public function validaEmail(string $email) {
            $this->conn = $this->conectar();
            $query = "SELECT u.* FROM usuarios u WHERE u.email = :email LIMIT 1";
            $result = $this->conn->prepare($query);
            $result->bindParam(':email', $email);
            $result->execute();

            if ($result->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function loginDados(string $email): mixed {
            $this->conn = $this->conectar();
            $query = "SELECT u.* FROM usuarios u WHERE u.email = :email";
            $result = $this->conn->prepare($query);
            $result->bindParam(':email', $email);
            $result->execute();
            $value = $result->fetch();
            return $value;
        }
    }
    