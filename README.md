# 🧪 Teste ProbY - Sistema de Gerenciamento de Projetos

Este é um sistema web criado com Laravel para gerenciamento de projetos, com funcionalidades de cadastro, login, visualização, criação, edição e exclusão de projetos.

## ✅ Requisitos

Antes de clonar e rodar este projeto, verifique se você possui instalado:

- PHP >= 8.2
- Composer
- MySQL
- Node.js e NPM
- Laravel CLI (opcional, mas recomendado)

---

## 🚀 Como rodar o projeto localmente

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

### 2. Instale as dependências PHP
```bash
composer install
```

### 3. Copie o arquivo de ambiente
```bash
cp .env.example .env
```

### 4. Gere a chave da aplicação
```bash
php artisan key:generate
```

### 5. Configure o banco de dados
Edite o arquivo .env com suas credenciais do MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=teste_proby
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 6. Execute as migrations
```bash
php artisan migrate
```

### 7. Instale as dependências front-end
```bash
npm install && npm run dev
```

### 8. Rode o servidor de desenvolvimento
```bash
php artisan serve
```
Acesse: http://localhost:8000