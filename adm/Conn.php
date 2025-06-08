<?php

    class Conn{
        public $host = "localhost";
        public $user = "root";
        public $pass = "81160596";
        public $dbname = "bd_pizzaria";
        public $port = 3306;
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
    