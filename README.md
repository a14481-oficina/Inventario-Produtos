# Inventario de Produtos

Este é um sistema web simples para gestão de produtos, com funcionalidades de login, criação de contas, adição e visualização de produtos. Pode ser usado como base para projetos de inventário ou loja online.

📁 Estrutura do Projeto
```bash

EXP.004/
├── conn.php                   # Conexão com a base de dados
├── contas.php                 # Lista de contas de utilizadores
├── criar_conta.php            # Página de registo de novos utilizadores
├── functions.php              # Funções auxiliares
├── index.php                  # Página principal (login)
├── inventario_produtos.sql    # Script SQL para a base de dados
├── login.php                  # Autenticação de utilizador
├── logout.php                 # Logout do utilizador
├── loja.php                   # Interface principal da loja
├── produtos.php               # Listagem de produtos
├── style.css / styles.css     # Estilos da aplicação
├── imagens/                   # Imagens dos produtos e ícones
└── produtos/
    ├── adicionar_produtos.php
    ├── adicionar_produtos_update.php
    └── conn.php               # Conexão duplicada (sugestão: reutilizar a principal)
```
🛠️ Tecnologias Utilizadas  

PHP(7 ou superior)  
MySQL  
HTML/CSS  

🧰 Funcionalidades  
✅Login e logout de utilizadores  
✅Criação de novas contas  
✅Visualização de produtos  
✅Adição de produtos à base de dados  
✅Interface de loja com imagens  
