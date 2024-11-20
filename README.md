# Sistema de Gerenciamento de Biblioteca

Este é um sistema de gerenciamento de biblioteca simples desenvolvido em PHP. O sistema permite que **alunos** emprestem e devolvam livros, e que **bibliotecários** cadastrem, excluam e listem os livros da biblioteca. O sistema utiliza um menu interativo no terminal para facilitar a interação com os usuários.

## Funcionalidades

### Para Alunos:
- **Emprestar Livro**: Consultar livros disponíveis e escolher quais deseja emprestar.
- **Devolver Livro**: Devolver livros emprestados à biblioteca.
- **Listar Livros**: Consultar todos os livros da biblioteca, incluindo os emprestados.

### Para Bibliotecários:
- **Cadastrar Livro**: Adicionar novos livros à biblioteca, especificando título, autor, ano de publicação, etc.
- **Excluir Livro**: Remover livros da biblioteca com base no ID do livro.
- **Listar Livros**: Consultar todos os livros cadastrados na biblioteca.

### Funcionalidades Comuns:
- **Verificação de Disponibilidade**: Verifica se os livros estão disponíveis ou emprestados antes de permitir operações de empréstimo e devolução.
- **Interface Interativa**: O sistema interage com o usuário por meio de um menu simples e fácil de usar no terminal.

## Como Funciona

1. O sistema começa com uma tela de login, onde o usuário escolhe entre **Aluno** ou **Bibliotecário**.
2. Dependendo do tipo de usuário, o sistema apresenta um menu com as opções apropriadas (emprestar, devolver, cadastrar livros, etc.).
3. As ações de **emprestar** e **devolver** são realizadas com base na disponibilidade dos livros.
4. Os **bibliotecários** têm acesso completo ao gerenciamento de livros, incluindo cadastro e exclusão.

## Estrutura do Projeto

- **modelo/Aluno.php**: Classe que representa os alunos e suas funcionalidades no sistema.
- **modelo/Bibliotecario.php**: Classe que representa os bibliotecários e suas funcionalidades administrativas.
- **modelo/IPessoa.php**: Interface que define os métodos comuns para todas as pessoas (aluno e bibliotecário).
- **modelo/Livro.php**: Classe que representa os livros da biblioteca.
- **modelo/Pessoa.php**: Classe base para os tipos de pessoa, com atributos comuns (nome, idade, CPF).
- **execucao.php**: Arquivo principal que executa o sistema e interage com o usuário.

## Autor

Feito por [Sarah](https://github.com/SarahElizabeteTDS).

---

**Nota**: Este sistema é simples e pode ser expandido para incluir funcionalidades adicionais, como persistência de dados em banco de dados, autenticação de usuários e uma interface gráfica mais sofisticada.
