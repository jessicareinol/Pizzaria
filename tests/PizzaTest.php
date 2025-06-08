<?php
use PHPUnit\Framework\TestCase;

class PizzaTest extends TestCase {
    private $conn;

    protected function setUp(): void {
        $this->conn = new mysqli("localhost", "root", "", "bd_pizzaria"); //manter de acordo com as informações de conexão que estão no Conn.php
        if ($this->conn->connect_error) {
            die("Conexão falhou: " . $this->conn->connect_error);
        }
    }

    public function testInserirPizza() {
        $sql = "INSERT INTO cardapio (nome, descricao, preco, imagem) VALUES ('Teste Pizza', 'Descrição de teste', 99.99, 'img/teste.jpg')";
        $this->assertTrue($this->conn->query($sql), "Falha ao inserir pizza.");

        //verifica se a pizza foi inserida
        $result = $this->conn->query("SELECT * FROM cardapio WHERE nome = 'Teste Pizza'");
        $this->assertGreaterThan(0, $result->num_rows, "Pizza não encontrada após inserção.");

        //limpa o banco (remove a pizza de teste)
        $this->conn->query("DELETE FROM cardapio WHERE nome = 'Teste Pizza'");
    }

    protected function tearDown(): void {
        $this->conn->close();
    }
}
