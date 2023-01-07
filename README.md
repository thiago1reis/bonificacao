
# Bonificação

## Sobre

Sistema para gerenciar bonificações de pontos para funcionários.
## Tecnologias utilizadas

- **[Laravel v8](https://laravel.com/docs/8.x)**
- **[PHP v8.1.10](https://www.php.net/releases/8.1/pt_BR.php)**
- **[Bootstrap v5.2](https://getbootstrap.com/docs/5.2/getting-started/introduction/)**
- **[Icofont](https://icofont.com/)**

## Executando o projeto
### Requisitos 

- **[PHP v8.1.10](https://www.php.net/releases/8.1/pt_BR.php)**
- **[Composer v2.4.1](https://getcomposer.org/)**
- **[Git](https://git-scm.com/)**
### Configurando o projeto
#### Clone o projeto
```
git clone https://github.com/thiago1reis/bonificacao.git
```
#### Entre no diretório do projeto
```
cd bonificacao
```
#### Comando para instalar as dependências
```
composer install
```
#### Crie o arquivo *.env* com o comando a baixo
```
cp .env.example .env
```
#### Rode esse comando para criar uma chave para a aplicação
```
php artisan key:generate
```
#### Em seguida use esse comando para executar as migrates e criar as tabelas do banco
```
php artisan migrate --seed
```
#### Depois instale as demais dependências
```
npm install
```
```
npm run dev
```
### Inicializando o projeto
#### Execute esse comando para inicizalizar o servidor
```
php artisan serve
```
#### A aplicação estará rodando nesse endereço **[http://localhost:8000](http://localhost:8000)** 