<p align="center">
    <h1 align="center">Desafio Cast</h1>
    <br>
</p>


REQUERIMENTOS
------------

MYSQL [WINDOWS DONWLOAD](https://dev.mysql.com/downloads/installer/)<br>
APACHE [WINDOWS DONWLOAD](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.33/xampp-windows-x64-7.4.33-0-VC15-installer.exe)<br>
COMPOSER [WINDOWS DONWLOAD](https://getcomposer.org/Composer-Setup.exe)<br>
PROGRAMA PARA TESTE DE API A CRITÉRIO<br>
A CONFIGURAÇÃO PODE SER FEITA PARA LINUX TAMBÈM SEGUINDO OS MESMOS COMANDOS BASTA INSTALAR ESSAS VERSÕES PARA LINUX.

INSTALAÇÃO
------------

### INSTALAR

1 - INSTALAR O MYSQL<br>
2 - INSTALAR O APACHE(XAMPP) (xampp-windows-x64-7.4.33-0-VC15-installer)<br>
3 - ADICIONAR A PASTA DO 'C:\xampp\php' AO PATH(VARIAVÉIS DE AMBIENTE) OU PODE MARCAR A CAIXA PARA ADICIONAR AO PATH NA INSTALAÇÃO DO COMPOSER<br>
4 - INSTALAR O COMPOSER<br>
5 - INSTALAR GIT [DONWLOAD](https://git-scm.com/download/win) (OPCIONAL)



### CONFIGURAÇÃO
DEPOIS DE TUDO INSTALADO VAMOS AOS PASSOS PARA RODAR O PROJETO<br>
IR NA PASTA DO C:\XAMPP\HTDOCS E CLONAR O REPOSITÓRIO [DESAFIO CAST](https://github.com/Gabrielunb/desafio-cast),
CASO NÃO TENHA O GIT INSTALADO BASTA FAZER O DONWLOAD DO ZIP E EXTRAIR DENTRO DA PASTA.<br>

COMANDO PARA CLONAR

~~~
git clone https://github.com/Gabrielunb/desafio-cast
~~~

COM O MYSQL JÁ INSTALADO E CONFIGURADO A SENHA ROOT, RODE O SEGUINTE SQL NO CONSOLE

~~~
CREATE SCHEMA IF NOT EXISTS desafiocast;
~~~

DENTRO DA PASTA DO PROJETO ABRA O TERMINAL E DIGITE O SEGUINTE COMANDO, PARA QUE SEJA INSTALADA
AS DEPENDÊNCIAS DO PROJETO

~~~
composer install
~~~

CONFIGURAÇÃO
-------------

### Banco de Dados

DENTRO DO PROJETO EDITAR O SEGUINTE ARQUIVO `config/db.php` COMO NO EXEMPLO ABAIXO:<br>
EM PASSWORD COLOQUE A SENHA DE ROOT CONFIGURADA AO INSTALAR O MYSQL.

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=desafiocast',
    'username' => 'root',
    'password' => 'DIGITE A SENHA ROOT AQUI',
    'charset' => 'utf8',
];
```

### MIGRATION

OS SCRIPTS DO BANCO DE DADOS SE ENCONTRA NA PASTA <b>'MIGRATIONS'</b> PARA MELHOR CONTROLE SOBRE O QUE ESTÁ SENDO FEITO NO BANCO DE DADOS, JÁ QUE PODEMOS DESFAZER DE FORMA SIMPLES.<br>
PARA RODAR AS MIGRATIONS É PRECISO JÁ TER CRIADO O SCHEMA E CONFIGURADO BANCO DE DADOS NO PROJETO NO ARQUIVO `config/db.php`.<br>
COMANDO PARA RODAR AS MIGRATIONS

~~~
php yii migrate
~~~

NO CASO ELE PEDE CONFIRMAÇÃO ENTÃO BASTA DIGITAR.

~~~
yes
~~~

TESTANDO
-------

ABRA O XAMPP E START O APACHE.<br>
POR PADRÃO O APACHE USA A PORTA 80<br>

~~~
http://localhost/desafio-cast/web/
~~~


API
-------
PARA UTILIZAÇÃO DA API PRECISA DE ALGUM PROGRAMA COMO <b>INSOMNIA/POSTMAN</b>
BASTA UTILIZAR A SEGUINTE URL PARA ACESSO A API<br>

~~~
http://localhost/desafio-cast/web/api/cursos
~~~


GET /cursos: listar todos os cursos página por página;<br>
HEAD /cursos: mostrar a informações gerais da listagem de cursos;<br>
POST /cursos: criar um novo curso;<br>
GET /cursos/123: retorna detalhes do curso 123;<br>
PATCH /cursos/123 e PUT /users/123: atualiza o curso 123;<br>
DELETE /cursos/123: deleta o curso 123;<br>

HOOKS
-------
NÃO FOI UTILIZADO HOOKS NESSE PROJETO.


TELAS
-------

ABAIXO ESTÁ A TELA PRINCIPAL DO PROJETO.<br><br>
PARA ACESSAR A TELA DE CURSOS BASTA CLICAR NO MENU CURSOS QUE VOCÊ IRÁ SER REDIRECIONADO.
![Tela Principal](https://github.com/Gabrielunb/desafio-cast/blob/master/web/imagens/home-page.png?raw=true)

ABAIXO ESTÁ A INDEX DA TELA DE CURSOS .<br><br>
NESSA TELA A PARTE DE CIMA SÃO OS CAMPOS DE PESQUISA QUE IRÁ RETORNA NENHUMA, UMA OU VÁRIAS LINHAS NO CONTAINER DE BAIXO, BASTA ADICIONAR OS CAMPOS E CLICAR EM PESQUISAR.
![Tela Principal Cursos](https://github.com/Gabrielunb/desafio-cast/blob/master/web/imagens/index.png?raw=true)

ABAIXO ESTÁ O FORMULÁRIO PARA PREENCHIMENTO PARA CADASTRO/ATUALIZAÇÃO DE CURSOS, BASTA CLICAR EM CADASTRAR CURSO NA TELA ANTERIOR.<br><br>
CONFORME PROJETO NO DOCUMENTO FOI IMPLEMENTADO CAMPOS OBRIGATÓRIOS E NÃO OBRIGATÓRIOS, UM SELECT COM AS OPÇÕES DE CATEGORIA ATRAVÉS DO WIDGET DATEPICKER E FOI FEITAS VALIDAÇÕES NA MODEL DE CURSO PARA SEGUIR AS REGRAS DESCRITAS NO DOCUMENTO.
![Tela de Cadastro de Curso](https://github.com/Gabrielunb/desafio-cast/blob/master/web/imagens/form-cursos.png?raw=true)

NESTA TELA SE ENCONTRA AS CATEGORIAS CADASTRADAS<br>
<br>
APENAS PARA QUESTÃO DE CURIOSIDADE É POSSÍVEL VIZUALIZAR OS REGISTROS FEITOS NA TABELA CATEGORIAS
![Tela Principal Categorias](https://github.com/Gabrielunb/desafio-cast/blob/master/web/imagens/index-categorias.png?raw=true)

PADRÃO
-------
COMO SUGERIDO PELA DOCUMENTAÇÃO DO YII2 FOI GERADO O MVC DAS RESPECTIVAS TABELAS ATRAVÉS DO GII, PARA QUE SEJAM MITIGADOS ERROS POR PARTE DO DESENVOLVEDOR E MAIOR PRODUTIVIDADE. FOI EXCLUIR ALGUMAS ACTION E VIEWS QUE NÃO FORAM USADAS NESSE PROJETO.