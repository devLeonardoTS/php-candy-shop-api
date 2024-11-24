
# Sistema de Gestão de Vendas e Estoque - Mad Kandy

Bem-vindo ao sistema de gestão de vendas e estoque da Mad Kandy, uma solução desenvolvida para integrar o controle de estoque com as vendas de forma eficiente e automatizada.

## Requisitos

Este guia assume que o usuário tem alguma experiência com o uso de terminais de comando para execução de comandos simples e acesso à internet. Caso essa seja sua primeira vez utilizando um sistema Laravel, siga os passos abaixo para configurar sua máquina.

### Ferramentas Necessárias

Antes de executar o sistema, certifique-se de ter os seguintes programas instalados:

1. **XAMPP**  
   - [Baixar XAMPP](https://www.apachefriends.org/pt_br/index.html)  
   - **Configuração Adicional**:  
     Após a instalação, abra o arquivo de configuração do PHP `php.ini` localizado na pasta `php` do XAMPP e habilite a extensão `zip` removendo o `;` antes dela. Isso é necessário para que o Composer possa instalar as bibliotecas.

2. **Composer** (Gerenciador de dependências do PHP)  
   - [Baixar Composer](https://getcomposer.org/download/)  
   - **Atenção**: Durante a instalação, certifique-se de configurar corretamente o PATH do PHP para que ele seja reconhecido no terminal.

3. **Laravel** (Framework PHP)  
   - Após instalar o Composer, abra o terminal e execute o seguinte comando para instalar o Laravel globalmente:  
     ```bash
     composer global require laravel/installer
     ```

## Instalação do Projeto

### 1. Baixando o Projeto

Clone o repositório ou faça o download do projeto diretamente pelo GitHub:  
[Repositório do Projeto](https://github.com/devLeonardoTS/php-candy-shop-api)

Após o download, extraia o conteúdo para um diretório de sua preferência. Acesse o diretório `back-end` via terminal.

### 2. Instalação de Dependências

No terminal, dentro da pasta `back-end`, execute o comando:  
```bash
composer install
```

Esse comando fará com que o Composer instale todas as dependências necessárias para o funcionamento do servidor web.

### 3. Configuração das Variáveis de Ambiente

Localize o arquivo `.env.example` no diretório `back-end` e crie uma cópia dele renomeando para `.env` (remova a parte `.example`).  
Esse arquivo permite configurar as informações de acesso ao banco de dados. Caso utilize algo além do SQLite (como MySQL), atualize as variáveis correspondentes.

### 4. Gerar a Chave de Segurança e Configurar o Banco de Dados

Com o arquivo `.env` configurado, execute os seguintes comandos no terminal:

1. Gere a chave de segurança:  
   ```bash
   php artisan key:generate
   ```

2. Crie um vínculo simbólico para os recursos de armazenamento:  
   ```bash
   php artisan storage:link
   ```

3. Execute as migrações para configurar o banco de dados:  
   ```bash
   php artisan migrate
   ```  
   - Caso precise resetar o banco de dados no futuro, utilize:  
     ```bash
     php artisan migrate:refresh
     ```

### 5. Iniciar o Web Server

Para iniciar o servidor, execute o seguinte comando no terminal, ainda no diretório `back-end`:  
```bash
php artisan serve
```

Esse comando deve ser repetido sempre que for necessário iniciar o sistema.

## Utilizando o Sistema

Com o servidor em execução, navegue até o diretório `front-end` e abra o arquivo `index.html` em seu navegador. Isso permitirá acessar o sistema de gestão de vendas e estoque da Mad Kandy.

---

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE). Contribuições são bem-vindas!
