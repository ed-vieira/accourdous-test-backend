
## Descrição

  Tecnologias
   <p>Front-end</p>
   <ul>
     <li>Vue 2.5</li>
     <li>Bootstrap 4</li>
     <li>Bootstrap-vue 2</li>
     <li>Template: Core UI - Vue</li>
     <li>Docker / Docker-compose</li>
   </ul> 

   <p> Back-end</p> 
     <ul>
     <li>Framework: Laravel 5.8</li>
     <li>Banco de dados: MySQL 5.7</li>
     <li>Docker / Docker-compose</li>
   </ul> 

## Requisitos
  <p>preparado para ser executado utilizando <u>Linux</u> como sistema operacional,
    utilizando <u>docker versão 20.10.*</u> e <u>docker-compose versão 1.28.*</u>.
  </p>


## Clonar o projeto (back-end)

<a href="https://github.com/ed-vieira/laravel-test-backend" target="_blank">
  Projeto back-end
</a>

```bash
$ git clone git@github.com:ed-vieira/laravel-test-backend.git
```

## Clonar o projeto (front-end)

<a href="https://github.com/ed-vieira/accordous-test-frontend" target="_blank">
  Projeto front-end
</a>

```bash
$ git clone git@github.com:ed-vieira/accordous-test-frontend.git
```


## Instalação
  <p> Para ser executado corretamente é necessário executar os comandos necessários na ordem 
  correta  </p>
  <p> Para auxiliar nesta tarefa é utilizado o <strong>Makefile</strong> para simplificar e organizar os comandos, de forma que comandos mais complexos ou que precisam ser executados em uma ordem determinada possam ser executados de maneira correta. 
  </p> 

 <a href="https://github.com/ed-vieira/laravel-test-backend" target="_blank">
  <h4>Back-end</h4>
 </a>

 <p> Para executar o projeto pela primeira vez execute os comandos na pasta do projeto: </p>

Instale as dependencias:
```bash
$ make install
```

Execute o build dos containers:
```bash
$ make init
```

<p> Execute as migrations e o seeder para criar e popular as tebelas: </p>

```bash
$ make migrate-seed
```


<p> Os comandos irão prepara os arquivos de configuração e iniciarão os processos do docker-compose, os comandos podem ser vistos no arquivo <strong>Makefile</strong> na pasta do projeto.</p>

<p>O comando migrate-seed irá criar e preencher as tabelas com dados do Faker</p>

<p>É necessário alguns segundos de diferença entre a execução dos comandos "make init" e "make migrate-seed" porque o cointainer do banco de dados pode ja ter iniciado com sucesso mas ainda não estar pronto para estabelecer conexões. </p>


Para executar testes
```bash
$ make test
```

<a href="https://github.com/ed-vieira/accordous-test-frontend" target="_blank">
 <h4>Front-end</h4>
</a> 

 <p> Para executar o projeto front-end pela primeira vez execute o comando na pasta do projeto: </p>

```bash
$ make install
```
 <p>Este comando prepara os arquivos de configuração e inicia o container</p>


 <p> O container do projeto do front-end estara sendo executado na porta 80 e o back-end estara sendo executado na porta 8080 </p>  
 
<hr/>
<p>Login:</p>
<p>Email: admin@developer.com</p>
<p>Senha: admin</p>
<hr/>

<p>
 <a href="http://localhost" target="_blank"> 
  http://localhost
 </a> 
</p>


<p>* Possíveis erros</p>

<p>Se sua configuração do docker exigir privilégios de usuario basta executar os mesmos comandos como sudo</p>
<p>exemplo:</p>

```bash
$ sudo make install
```

<p>Problemas com o comando <strong>make</strong> ?</p>
<p>Normalmente este comando vem instalado por padrão, caso este comando não seja reconhecido em sua distro:</p>

<p>
<a href="https://askubuntu.com/questions/192645/make-command-not-found" target="_blank">https://askubuntu.com/questions/192645/make-command-not-found</a>
</p>


## License

[MIT licensed](LICENSE).
