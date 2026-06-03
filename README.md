## Nome do projeto: `Atividade CRUD`
## Nome do desenvolvedor: `Daniel Tonioti`

## Tecnologias Utilizadas
- Back-end: PHP 8
- Banco de dados: MySQL
- Front-end: HTML5
- Autenticação: PHP Sessions
- Servidor local: Apache / XAMPP
---

## Estrutura de arquivos
- `index.php` — Página de login, valida credenciais e inicia sessão
- `public/home.php` — Painel principal com formulários CRUD
- `public/logout.php` — Encerra sessão e redireciona ao login
- `public/components/table.php` — Lista todos os usuários em tabela HTML
- `infra/db/connect.php` — Estabelece conexão com o banco de dados
- `banco.sql` — Script SQL de criação do banco e registro inicial

---

## Objetivo da aplicação
Sistema web para gerenciamento de usuários com autenticação por sessão. Permite cadastrar, listar, atualizar e excluir usuários armazenados em banco MySQL.

---

## Funcionalidade de exclusão
A exclusão foi implementada em `home.php`. Um formulário envia o ID do usuário via POST; o PHP verifica se o botão `btn-deletar` foi acionado e executa um `DELETE` filtrando pelo ID recebido.

```php
if(isset($_POST['btn-deletar'])){
    $deleteId = $_POST['id-delete'];
    $sql = "DELETE FROM usuarios WHERE id = $deleteId";
    $conn->query($sql);
}
```

## Arquivos alterados na atividade 1
- `Todos` - Foram adicionados comentarios em cima do código do professor explicando o que cada coisa no código faz para um melhor entendimento

---

## Arquivos alterados na atividade 2
- `public/home.php` — adicionada lógica PHP de exclusão e formulário com campo ID
- `README.md` — atualizado com documentação da nova funcionalidade

---

## Dificuldades
- Fora encontradas diversas dificuldades pois eu desconhecia o que deveria ser utilizadoe  e a sensibilidade do PHP foi algo que veio a se tornar uma dor de cabeça prévia e após algumas pesquisas para lembrar os comandos de sql e observar o código mais de perto, as dificuldades foram desaparecendo


## Aprendizados
- Ciclo completo de um CRUD em PHP puro
- Uso de sessões para autenticação de usuários
- Integração entre formulários HTML e queries SQL.
