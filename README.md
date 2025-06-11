
# Gerenciador de Cardápio de Pizzaria 🍕

#### 📌 Sobre o projeto

Esse projeto faz parte da disciplina de **Tecnologias Emergentes** e tem como proposta criar uma aplicação simples, mas funcional, para gerenciar o cardápio de uma pizzaria fictícia chamada "La Bella Pizzaria". A ideia é desenvolver um sistema onde seja possível cadastrar, consultar, editar e excluir pizzas, ou seja, implementar um CRUD completo com persistência em banco de dados.

Cada pizza terá informações como:
- Nome
- Descrição
- Preço
- Imagem ilustrativa

Tudo isso será salvo em um banco de dados, garantindo que os dados fiquem organizados e fáceis de atualizar quando necessário.
O objetivo principal da aplicação é facilitar a administração de um cardápio da pizzaria, onde o dono ou funcionário responsável pode manter as informações do cardápio sempre atualizadas, sem precisar editar arquivos manualmente ou depender de sistemas complicados.

---

#### Ambiente de Desenvolvimento

- **Sistema Operacional**: Windows 10
- **Servidor Web**: Apache via XAMPP
- **Editor de Código**: Visual Studio Code
- **Gerenciador de Banco de Dados**: phpMyAdmin
- **Controle de Versão**: Git e GitHub
- **Testes Automatizados**: PHPUnit

---

#### Tecnologias Utilizadas

- **Linguagem de Programação**: PHP 7.4+
- **Banco de Dados**: MySQL
- **Frameworks / Bibliotecas**:
    - Bootstrap (para estilização básica da interface);
    - PHPUnit (para testes automatizados).
- **Outros**:
    - HTML5, CSS3 e JavaScript para construção da interface;
    - Git para versionamento;
    - XAMPP para ambiente de servidor local (Apache + MySQL).

---

#### Como instalar e executar a aplicação

1. Clone este repositório:
   ```bash
   git clone https://github.com/jessicareinol/Pizzaria.git
   ```

2. Copie a pasta do projeto para a pasta `htdocs` do XAMPP:
   ```
   C:\xampp\htdocs\
   ```

3. Inicie o XAMPP e ative os serviços:
   - Apache
   - MySQL

4. Importe o banco de dados:
   - Acesse `http://localhost/phpmyadmin`
   - Crie um banco de dados chamado `bd_pizzaria`
   - Importe o arquivo `bd_pizzaria.sql` que está na raiz do projeto

5. Acesse o sistema:
   ```
   http://localhost/Pizzaria/
   ```

---

#### Como executar os testes automatizados

1. Instale o PHPUnit (veja instruções no site oficial)
2. Coloque o arquivo `PizzaTest.php` na pasta `tests/`
3. No terminal, dentro da pasta do projeto, execute:
   ```bash
   php phpunit.phar tests/PizzaTest.php
   ```
4. O teste irá inserir uma pizza de teste, verificar sua inserção e excluí-la em seguida.

---

#### Requisitos do sistema

- Sistema operacional: Windows 10 ou superior;
- PHP 7.4 ou superior;
- MySQL 5.7 ou superior;
- Navegador atualizado (Chrome, Firefox, etc.);
- XAMPP ou outro ambiente de servidor com suporte a PHP e MySQL.

---

#### Como contribuir

1. Fork este repositório
2. Crie uma branch com sua feature:
   ```bash
   git checkout -b minha-nova-feature
   ```
3. Commit suas alterações:
   ```bash
   git commit -m 'Minha nova feature'
   ```
4. Faça push para a branch:
   ```bash
   git push origin minha-nova-feature
   ```
5. Abra um Pull Request

---

#### Práticas de Código Limpo Aplicadas

- Separação de responsabilidades (arquivos para conexão, lógica e visual separadas);
- Código comentado em pontos estratégicos para melhor entendimento;
- Uso de funções e reaproveitamento de trechos comuns;
- Estrutura de pastas organizada (`adm/`, `img/`, `tests/`).

---

#### Testes Automatizados

- Implementado teste no banco de dados com PHPUnit;
- Os testes validam a conexão, a inserção, verificação e remoção de dados no banco;
- Testes são limpos após execução para não poluir o banco de dados.

---

#### Autor

Desenvolvido por **Jéssica Araujo Reinol** para a disciplina de **Tecnologias Emergentes** para o curso de **Análise e Desenvolvimento de Sistemas** da **Toledo Prudente Centro Universitário**.
