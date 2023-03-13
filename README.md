# **Desafio OM30**

### **Tecnologias**

-   PHP
-   Laravel

---

### **Executando o Projeto**

**Docker:**

É necessário que você tenha o composer instalado na sua maquina

```bash
composer install
```

```bash
docker-compose up -d
```

---

**Importante:**

Para que os comandos de criação das migrations e seeds funcionem é necessário estar dentro do container
Para entrar no container execute o comando abaixo.

```bash
docker-compose exec app bash
```

---

**Criando as migrations:**

```bash
php artisan make:migration
```

---

**Executando as seeds:**

```bash
php artisan db:seed --class=DatabaseSeeder
```

---

### **Rotas**

O servidor sera exposto na porta 8989 (http://localhost:8989/)

Para melhor referencia da api utilize o postman, importando a collection que esta na raiz do projeto, com o nome de: [Desafio_OM30.postman_collection.json](./Desafio_OM30.postman_collection.json)

```

```
