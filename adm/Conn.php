<?php

    //configurações para conexão com o banco de dados MySQL
    class Conn{
        public $host = "localhost"; //endereço do servidor do banco de dados (normalmente 'localhost' em ambiente local)
        public $user = "root"; //nome de usuário do banco de dados (alterar caso preciso)
        public $pass = "";  //senha do usuário do banco (acrescentar caso preciso)
        public $dbname = "bd_pizzaria"; //nome do banco de dados que será utilizado (colocar o nome da forma que for criado no phpMyAdmin)
        public $port = 3306; //porta padrão
        public $connect = null;

        public function conectar(): bool|PDO{
            try {
                /* Conexão com porta */
                /* $this->connect = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname, username: $this->user, password: $this->pass); */

                /* Conexão sem porta */
                $this->connect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, username: $this->user, password: $this->pass);
                

                //echo "Conexão realizada com sucesso!";
                return $this->connect;
            } catch (Exception $err) {
                echo "Erro: Conexão não realizada com sucesso! Erro gerado: " . $err;
                return false;
            }
        }
    }
    