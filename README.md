# Sistema de Gestão de Vendas e Estoque - Mad Kandy

Este repositório contém o código para o sistema de gestão de vendas e estoque da **Mad Kandy**, uma loja de doces com temática de Halloween. O sistema foi desenvolvido com **Laravel** para o back-end e oferece integração com o banco de dados e o controle de estoque de forma automatizada.

## Requisitos

Antes de executar o sistema, você precisa instalar as seguintes ferramentas:

- **XAMPP**: Para configurar o servidor Apache, PHP e MySQL.
  - [Baixar XAMPP](https://www.apachefriends.org/pt_br/index.html)
  - **Atenção**: Garanta que o **PATH** para o PHP seja configurado corretamente durante a instalação.

- **Composer**: Gerenciador de dependências do PHP.
  - [Baixar Composer](https://getcomposer.org/download/)

- **Laravel**: Framework PHP para o desenvolvimento do sistema.
  - Após instalar o Composer, execute o seguinte comando no terminal (Powershell no Windows ou Bash no Linux) para instalar o Laravel:
  
    ```bash
    composer global require laravel/installer
    ```

## Instruções de Execução

Siga os passos abaixo para configurar e executar o sistema em sua máquina.

### 1. Baixar o Projeto

Clone o repositório ou faça o download do projeto. Extraia o conteúdo para um diretório de sua escolha.

### 2. Instalar Dependências

Abra o terminal e navegue até o diretório `back-end` do projeto. Execute o seguinte comando para instalar as dependências necessárias:

```bash
composer install
```

Isso fará com que o Composer baixe e instale todas as bibliotecas necessárias para o funcionamento do servidor web.

### 3. Configuração das Variáveis de Ambiente

No diretório `back-end`, localize o arquivo `.env.example` e crie uma cópia dele com o nome `.env`:

```bash
cp .env.example .env
```

Abra o arquivo `.env` e configure as informações do banco de dados, como host, usuário e senha. Se você estiver utilizando o **SQLite**, não será necessário modificar essas configurações, mas se estiver usando MySQL ou outro banco de dados, ajuste conforme necessário.

### 4. Gerar a Chave de Segurança e Configurar o Banco de Dados

Ainda no diretório `back-end`, execute os seguintes comandos no terminal para gerar a chave de segurança, criar um vínculo simbólico para os recursos de armazenamento e executar as migrações no banco de dados:

```bash
php artisan key:generate
php artisan storage:link
php artisan migrate:fresh
```

Esses comandos irão configurar sua aplicação, gerenciar arquivos de armazenamento e criar as tabelas do banco de dados.

### 5. Iniciar o Servidor Web

Para iniciar o servidor, execute o seguinte comando no terminal dentro do diretório `back-end`:

```bash
php artisan serve
```

Este comando iniciará o servidor web que ficará ativo enquanto o sistema estiver sendo utilizado. Você precisará executá-lo sempre que desejar usar o sistema.

### 6. Acessando o Sistema

Após iniciar o servidor, você pode acessar o sistema de gestão de vendas e estoque da Mad Kandy. Para isso, navegue até o diretório `front-end` e abra o arquivo `index.html` em seu navegador.

---

## Contribuições

Se você quiser contribuir para o projeto, por favor, faça um fork e envie pull requests. Certifique-se de que suas alterações sejam bem documentadas e testadas antes de submeter.

---

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).
