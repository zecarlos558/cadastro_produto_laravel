---

typora-root-url: doc
---

# Desafio Promobit - Modelo de cadastro de Produto e Tags


## Tópicos

* [O Projeto](#O-Projeto)
* [Desenvolvedor](#Desenvolvedor)
* [Estrutura do Software](#Estrutura-do-Software)
  * [Diagrama do Banco de Dados](#Diagrama-do-Banco-de-Dados)
  * [Script Relatório](#Script-Relatório)
* [Tecnologias](#Tecnologias)
  * [Instalar e utilizar](#Como-instalar-e-utilizar)
* [Endpoints](#Endpoints)
* [Agradecimentos](#Agradecimentos)

## O Projeto

Esse projeto tem como objetivo avaliar o conhecimento e habilidade em desenvolvimento Back-End e Front-End. Para isso foi desenvolvido uma aplicação de modelo WEB de cadastro de produtos, tags e geração de relatório dos Produtos com sua respectiva Tag vinculada. Esse software foi desenvolvido conforme os requisitos descritos no documento do [Desafio Promobit](https://github.com/Promobit/teste-cadastro-produtos).

## Desenvolvedor

Projeto desenvolvido individualmente para Resolução do [Desafio Promobit](https://github.com/Promobit/teste-cadastro-produtos).

<table>
  <tr>
      <td align="center"><a href="https://github.com/zecarlos558"><img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/zecarlos558" width="100px;" alt=""/><br /><sub><b>José Carlos</b></sub></a><br /><a href="https://github.com/hellomp" title="José Carlos"></a></td>
    </tr>
</table>

## Estrutura do Software

O sistema consiste nas funcionalidades de CRUD para Produtos, Tag e geração de relatório dos produtos. As funcionalidades são acessadas através de páginas WEB para a listagem/cadastro/edição/deleção de Produto e Tags, as páginas devem ter navegação entre elas, e uma página para exibir o relatório dos produtos. Permite ser vinculado uma mais Tags aos produtos dentro do cadastro ou edição de Produto. O projeto foi desenvolvido dentro do Padrão da Arquitetura MVC. O sistema possui autenticação do usuário para acessar as funcionalidades do CRUD e relatório.

### Diagrama do Banco de Dados

Apresentação do Diagrama de Entidade Relacionamento desenvolvido no projeto.

![Diagrama do Banco de Dados](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/Diagrama_do_Banco_de_Dados.png)

### Script Relatório

Aqui está o script SQL utilizado para extrair as informações necessárias para listagem de Tags mais um sumarizador de Produtos atrelado a cada Tag.

```sql
select tags.id as idTag,tags.name as nomeTag,products.id as idProduto,products.name as nomeProduto from `product_tag` 
right join `products` on `product_tag`.`product_id` = `products`.`id` 
right join `tags` on `product_tag`.`tag_id` = `tags`.`id` 
group by `tags`.`id`, `tags`.`name`, `products`.`id`, `products`.`name` 
order by `tags`.`name` asc, `products`.`name` asc
```



## Tecnologias

- PHP 8.0
- MySQL 8.0.27
- Laravel 9.0
- Bootstrap 5
- Git

### Como instalar e utilizar

  - Baixar ou clonar o projeto do Github. 

  - Instalar o PHP (Versão 8.0 ou superior).

  - Instalar uma base de dados MySQL([MySQL Workbench](https://dev.mysql.com/downloads/workbench/)) para armazenamento dos dados (Ou uma base de dados de sua preferência).

  - Configurar o arquivo .env, alterando as informações do banco de dados como o modelo a seguir

      - ```php
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME=root
        DB_PASSWORD=
        ```

  - Abra o terminal na pasta do projeto e digite

      - ```less
        php artisan serve
        ```

  - Pronto, a aplicação está rodando!

  - Vá ao navegador e digite a url:

      - ```http
        http://127.0.0.1:8000/
        ```

## Endpoints e Telas

Aqui está listado os Endpoints da aplicação, para melhor orientação na utilização do sistema. A página inicial é a única que não precisa de autenticação do usuário, para acessar todas as outras páginas é necessário o Login para confirmar a autenticação do usuário. Possui um menu com opção de expandir barra lateral que permitirá navegação entre as páginas do sistema.

##### Página Inicial

Tela de apresentação, possui acesso as principais funcionalidades do sistema em seu corpo.

```http
http://127.0.0.1:8080/inicial
```

![HOME](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/pagina_inicial.png)

##### Login

Tela para realizar login do usuário

```http
http://127.0.0.1:8080/login
```

![Login](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/login.png)

##### Cadastrar Usuário

Tela para cadastrar usuário

```http
http://127.0.0.1:8080/register
```

![Register](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/register.png)

##### Produtos - CREATE

Tela para cadastro de produtos

```http
http://127.0.0.1:8080/product/create
```

![Produtos - CREATE](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/produto_cadastrar.png)

##### Produtos - READ

Lista o produtos cadastrados com as opções de cadastrar, editar e deletar produto

```http
http://127.0.0.1:8080/product/
```

![Produtos - READ](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/produto_listar.png)

##### Produtos - UPDATE

Tela para editar dados do produtos

```http
http://127.0.0.1:8080/product/edit/{id}
```

![Produtos - UPDATE](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/produto_editar.png)

##### Produtos - DELETE

Caminho para deletar produto

```http
http://127.0.0.1:8080/product/{id}
```

##### Tag - CREATE

Tela para cadastro de Tag

```http
http://127.0.0.1:8080/tag/create
```

![Tag - CREATE](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/tag_cadastrar.png)

##### Tag - READ

Lista as Tags cadastradas com as opções de cadastrar, editar e deletar Tag

```http
http://127.0.0.1:8080/tag/
```

![Tag - READ](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/tag_listar.png)

##### Tag - UPDATE

Tela para editar dados da Tag

```http
http://127.0.0.1:8080/tag/edit/{id}
```

![Tag - UPDATE](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/tag_editar.png)

##### Tag - DELETE

Caminho para deletar Tag

```http
http://127.0.0.1:8080/tag/{id}
```

##### Relatório Tag - INDEX

Tela para exibir relatório dentro do sistema

```http
http://127.0.0.1:8080/relatorio
```

![Relatório - Sistema](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/relatorio_site.png)

##### Relatório Tag - gera_pdf

Tela para exibir relatório como página para impressão ou PDF

```http
http://127.0.0.1:8080/tag/gera_pdf
```

![Relatório - PDF](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/relatorio_pdf.png)

##### Relatório Tag - gera_sql

Tela para exibir script sql da consulta do relatório

```http
http://127.0.0.1:8080/tag/gera_sql
```

##### ![Relatório - SQL](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/relatorio_script.png)



## Agradecimentos

![Promobit](https://github.com/zecarlos558/modelo_cadastro_produto/tree/main/doc/screenshots/Logo_Promobit_Azul.png)
