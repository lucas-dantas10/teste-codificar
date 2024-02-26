<div style="text-align: center">
    <img style="width: 100px;text-align: center" src="./frontend/src/assets/splash_logo.png">
</div>

# CloudTxt

### É uma plataforma dinâmica projetada para conectar pessoas, ideias e histórias em um espaço digital colaborativo. Com uma interface intuitiva e recursos poderosos, o CloudTxt capacita os usuários a compartilharem seus pensamentos, experiências e conhecimentos de maneira fácil e eficiente.

## Ferramentas Utilzadas

### 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- [Laravel](https://laravel.com/)
- [VueJs](https://vuejs.org/)
- [Vuex](https://vuex.vuejs.org/)
- [VueRouter](https://router.vuejs.org/)
- [Axios](https://axios-http.com/ptbr/docs/intro)
- [Tailwind](https://tailwindcss.com/) 

## Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git](https://git-scm.com), [Node.js](https://nodejs.org/en/), [Composer](https://getcomposer.org/download/), [PHP](https://www.php.net/). 
Além disto é bom ter um editor para trabalhar com o código como [VSCode](https://code.visualstudio.com/)

### 🎲 Rodando o Back End (servidor)

```bash
# Clone este repositório
$ git clone <https://github.com/lucas-dantas10/teste-codificar.git>

# Acesse a pasta do projeto de backend no terminal/cmd
$ cd teste-codificar/backend

# Crie e edite seu arquivo .env
$ cp .env.example .env

# Instale as dependências
$ composer install

# Realize a criação do banco e das tabelas
$ php artisan migrate

# Caso queira criar as tabelas e popular, rode este outro comando
$ php artisan migrate --seed

# Caso já tenha rodado o 'php artisan migrate' e queira popular as tabelas, rode este outro comando
$ php artisan db:seed

# Execute a aplicação em modo de desenvolvimento
$ php artisan serve

# O servidor inciará na porta:8000 - acesse <http://localhost:8000>
# endpoint <http://localhost:8000/api/v1/>

```
### 🖥️ Rodando o Frond End (cliente)

```bash
# Clone este repositório, caso ja tenha clonado no passo do 'backend' não precisa clonar
$ git clone <https://github.com/lucas-dantas10/teste-codificar.git>

# Acesse a pasta do projeto de backend no terminal/cmd
$ cd teste-codificar/frontend

# Instale as dependências
$ pnpm install

# Caso não tenha 'pnpm', apague o arquivo frontend/pnpm-lock.yaml e rode o comando abaixo
$ npm install

# Execute a aplicação em modo de desenvolvimento
$ pnpm/npm run dev

# O servidor inciará na porta:5173 - acesse <http://localhost:5173>
```

## Login
```json
email: # qualquer email dos usuarios populados no banco 
password: 'password' //todas as senhas dos usuarios fictícios é 'password'
```