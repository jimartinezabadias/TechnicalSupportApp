# TechSupportApp
[![codecov](https://codecov.io/gh/jimartinezabadias/TechnicalSupportApp/branch/master/graph/badge.svg)](https://codecov.io/gh/jimartinezabadias/TechnicalSupportApp)
![PHP Unit](https://github.com/jimartinezabadias/TechnicalSupportApp/workflows/Laravel/badge.svg)
![Static Code Analysis](https://github.com/jimartinezabadias/TechnicalSupportApp/workflows/Static%20Code%20Analysis/badge.svg)
![Dusk Tests](https://github.com/jimartinezabadias/TechnicalSupportApp/workflows/Dusk%20Tests/badge.svg)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/0888955c12db43a1b52963ba39df7dba)](https://www.codacy.com/gh/jimartinezabadias/TechnicalSupportApp/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jimartinezabadias/TechnicalSupportApp&amp;utm_campaign=Badge_Grade)

## About this project
This application was build as a practical exercise for Programación Web 2, TUPAR 2020. FCE, UNICEN.

Thanks to professors **Ignacio Jonas** and **Alejandro Pérez**.



The following concepts and technologies where applied:

##### DevOps


* Docker and Docker Compose
* Advanced Git
* Test Automation 
* CI w/Github Actions
* CD w/Github Actions and Heroku
* Code Quality


##### Laravel 


* MVC
* ORM w/Eloquent
* Testing w/Php Unit and Laravel Dusk
* TDD
* Composer
* Authentication and Authorization w/Jetstream
* API REST
* Tailwind Css


## Deployed demo
<a href="https://technical-support-app.herokuapp.com/">technical-support-app.herokuapp.com</a>


## Install project

##### Clone the project

`$ git clone https://github.com/jimartinezabadias/TechnicalSupportApp.git`

##### Install dependencies w/composer

`$ docker run -it --rm --volume $PWD:/app --user $(id -u):$(id -g) composer:1.10.10 composer -vvv install`

##### Create .env from .env.example

`$ cp .env.example .env`

##### Edit .env

* Set APP_ENV to local `APP_ENV=local`
    
* Add Selenuim URL `SELENIUM_URL=http://selenium:4444/wd/hub`
    
* Set DB_HOST to database `DB_HOST=database`
    
* Set DB_PORT to 5432 `DB_PORT=5432`

##### Run docker containers

`$ docker-compose up -d`

##### Generate Key

`$ docker exec -it Laravel-app php artisan key:generate`

##### Run Migrations

`$ docker exec -it Laravel-app php artisan migrate`

