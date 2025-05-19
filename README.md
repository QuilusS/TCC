
# Primus Autopeças - Projeto TCC

Este repositório contém o código e as instruções para o desenvolvimento do site do projeto **Primus Autopeças**, parte do nosso TCC. O objetivo é criar uma plataforma para autopeças que ofereça informações sobre produtos, história, localização, contatos, notícias e outros conteúdos que facilitem o acesso dos clientes à empresa.

---

## Pré-requisitos

Para executar este projeto, você precisará ter instalado:

- **XAMPP** (ou outro servidor local compatível com PHP e MySQL)
- **MySQL** (incluído no XAMPP)

### Configuração do Banco de Dados

1. Clone este repositório para o seu computador.
2. Dentro do repositório clonado, localize a pasta **banco de dados** e o arquivo chamado  `Dump20250518.sql`.
3. Importe esse arquivo para o seu servidor MySQL:
   - Acesse o painel do XAMPP e clique na caixa de **Config** do MySQL.
   - Selecione **Browse** para abrir o diretório de instalação do MySQL.
   - Volte um diretório e entre na pasta **htdocs**.
4. Mova a pasta **Primus** (do repositório clonado) para dentro da pasta **htdocs**.
5. Crie a conexão no MySQL com as seguintes informações:

```php
<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "primus_bd";
?>
```

6. Agora você pode acessar o projeto no navegador, usando o endereço:

```
localhost/PRIMUS/TelaInicial.php
```

---

## Atualizações

- **Última atualização:** 18/05/2025

Fique à vontade para explorar, modificar e contribuir com o nosso projeto! 😊

---

## Equipe

Desenvolvido como parte do trabalho de conclusão de curso. Agradecemos a todos os envolvidos!

