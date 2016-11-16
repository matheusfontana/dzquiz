# Q: WHOAMI?
#### A: DZQUIZ!

### Requisitos

* PHP 5.5.9 + Symfony 2.8
* MySQL 5.5
* Git
* [Composer](https://getcomposer.org/)

### Instalação

#### Clonar o projeto
```sh
$ git clone https://github.com/matheusfontana/whoami.git
```
**Dentro do diretório do projeto...**

#### Executar o composer (evitando memory leak)
```sh
$ php -d memory_limit=-1 /bin/composer install
```
**Caso o Symfony pergunte por parâmetros de BD, alteraremos isso depois ;)**

#### Inicializar o Phinx

```sh
$ bin/phinx init
```
**Este comando irá gerar o arquivo phinx.yml na raiz do projeto**

#### Alterar o phinx.yml e o app/config/parameters.yml

```sh
$ vim phinx.yml
```
**Alterar o parâmetro** ***name*** **da seção** ***development*** **para** ***dzquiz***, **sem aspas. Os outros parâmetros dependem de seu servidor ;)**

```sh
$ vim app/config/parameters.yml
```
**Alterar o parâmetro** ***database_name*** **da seção** ***parameters*** **para** ***dzquiz***, **sem aspas. Os outros parâmetros iniciados por** ***database*** **dependem de seu servidor ;)**

#### Criar a estrutura de banco de dados
```sh
$ ./bin/phinx migrate -v
```

#### Alimentar o banco de dados com alguns dados default, através de seeds.
```sh
$ ./bin/phinx seed:run -v -s TypeSurveySeed -s TemplateSurveySeed -s IdentitySurveySeed -s QuestionSeed -s AnswerSeed
```

#### Startar o server
```sh
$ php app/console server:run
```

### Acessar o website

http://localhost:8000/app_dev.php/

##### Fim! :)






