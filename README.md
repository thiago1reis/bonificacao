
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
#### Rode esse comando para clonar o projeto
```
git clone https://github.com/thiago1reis/bonificacao.git
```
#### Entre no diretório do projeto
```
cd bonificacao
```
#### Rode esses comandos para instalar as dependências 
```
composer install
```
```
composer update
```
#### Rode esse comando para copiar o arquivo .env.example
```
cp .env.example .env
```
#### Rode esse comando para criar uma chave para a aplicação
```
php artisan key:generate
```
#### Em seguida configure seu arquivo .env e depois rode esse comando para executar as migrates
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