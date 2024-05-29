# Operações CRUD

## Resumo

- C: CREATE (INSERT) -> inserir dados
- R: READ (SELECT) -> carregar/ler dados
- U: UPDATE (UPDATE) -> atualizar dados
- D: DELETE (DELETE) -> deletar/excluir dados


## EXEMPLOS: tabela de usuários

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


### UPDATE na tabela de usuários
```sql
UPDATE usuarios SET tipo = 'editor'
WHERE id = 1;
/*  OBS: NUNCA esqueça de passar pelo menos uma condição para o UPDATE!  */
```

### DELETE na tabela de usuários 

```sql
DELETE FROM usuarios WHERE id = 2;
```

## Exercícios

1) Insira mais 2 usuários com quaisquer dados. Deixe um como `admin` e outro como `editor`.

2) Em uma nova conseulta SQL, mostre os `id`, `nome`, e `tipo` de todos os usuários atuais.
---


```sql
INSERT INTO usuarios(
    nome, email, senha, tipo
)
VALUES ('Cássio', 'cassio@gmail.com', '312senac', 'editor');

INSERT INTO usuarios(
    nome, email, senha, tipo
)
VALUES ('DomPedro', 'dompedro@gmail.com', '412senac', 'admin');
```

```sql
SELECT nome, id, tipo FROM usuarios;
```

## Exemplos para tabela de noticias 

### Inserir notícias

```sql
INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'Meu pai ganhou na mega-sena',
    'Jogou bons números e deu sorte',
    'Vai pegar o prêmio',
    'premio.jpg',
    1
);
```

```sql
INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'Real Madrid é o melhor time do mundo',
    'Verdadeeeee',
    'Ta ganhando tudo',
    'realmadrid.jpg',
    3
);
```


```sql
INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'Todo mundo que se chama Gabriel é gay',
    'É uma curiosidade incrivel',
    'Foi comprovado pela nasa',
    'gaybriel.jpg',
    4
);
```

### Select em notícias

```sql
SELECT titulo, data FROM noticias;
```
```sql
SELECT titulo, data FROM noticias ORDER BY data DESC;
-- Usamos o ORDER BY data DESC par classificar em orde decrescente pela data
```

### SELECT com JOIN (consulta com junção de tabelas)

**Objetivo** realizar uma consulta que mostre a data e o título da notícia **e** o nome do autor da notícia.

```sql
-- selecionando as tabelas em que estão
SELECT
    noticias.data,
    noticias.titulo,
    usuarios.nome

    -- especificamos as tabelas que serão "juntadas/combinadas"
FROM noticias JOIN usuarios

-- critério da junção/relação entre as tabelas
-- usamos as referências de FK e PK
ON noticias.usuario_id = usuarios.id    
```

