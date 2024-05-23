# Operações CRUD

## Resumo

- C: CREATE (INSERT) -> inserir dados
- R: READ (SELECT) -> carregar/ler dados
- U: UPDATE (UPDATE) -> atualizar dados
- D: DELETE (DELETE) -> deletar/excluir dados


## EXEMPLOS

### INSERT na tabela de usuários

```sql
INSERT INTO usuarios(
    nome, email, senha, tipo
)
VALUES ('Bernardo', 'bernardo@gmail.com', '123senac', 'admin');


INSERT INTO usuarios(
    nome, email, senha, tipo
)
VALUES ('Fulano', 'fulano@gmail.com', 'senac789', 'editor');


INSERT INTO usuarios(
    nome, email, senha, tipo
)
VALUES ('Chaves', 'chaves@gmail.com', '123456', 'editor');
```


### SELECT na tabela de usuários

```sql
SELECT nome, email FROM usuarios;
```


```sql
SELECT nome, email FROM usuarios
WHERE tipo = 'admin';
```

```sql
SELECT * FROM usuarios WHERE id > 1;
```
