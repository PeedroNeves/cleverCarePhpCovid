# Informações sobre COVID-19

Este projeto consiste em uma aplicação web que permite aos usuários obter informações sobre casos confirmados e mortes relacionadas ao COVID-19 em diferentes países. Os dados são obtidos de uma API pública e exibidos dinamicamente na página.

## Inicialização e Configuração

### Pré-requisitos

- Servidor web (ex: Apache)
- PHP instalado
- Banco de dados MySQL ou MariaDB
- Conexão com a internet para acessar a API

### Configuração do Banco de Dados

1. Crie um banco de dados MySQL.
2. Execute o script SQL `covid_acess_logs.sql` para criar a tabela `access_logs` necessária para registrar os acessos.

### Configuração do Projeto

1. Clone este repositório para o seu ambiente local.
2. Certifique-se de que o servidor web esteja configurado corretamente para executar arquivos PHP.
3. Configure as credenciais do banco de dados no arquivo `index.php` nas variáveis `$host`, `$username`, `$password` e `$dbname`.
4. Certifique-se de que o arquivo `index.php` tenha permissões de leitura e escrita para interagir com o banco de dados.
5. Abra um navegador da web e acesse o arquivo `index.php` para verificar se o projeto está funcionando corretamente.

### API de Último Acesso

Para obter informações sobre o último acesso registrado, o projeto também inclui uma API simples.

1. Certifique-se de que o arquivo `getLastAccess.php` esteja acessível pelo servidor.
2. O endpoint da API está definido como `/api/getLastAccess`. Você pode acessá-lo diretamente via navegador ou integrá-lo em outros aplicativos conforme necessário.

## Tecnologias Utilizadas

- PHP: Para interação com o banco de dados e obtenção de dados da API.
- HTML/CSS: Para estrutura e estilo da página web.
- JavaScript: Para fazer requisições assíncronas à API de último acesso.
- MySQL: Banco de dados para armazenar registros de acesso.

## Autor

Este projeto foi desenvolvido por [Seu Nome](https://github.com/PeedroNeves).

