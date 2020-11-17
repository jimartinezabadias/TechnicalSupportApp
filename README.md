# TechSupportApp
[![codecov](https://codecov.io/gh/jimartinezabadias/TechnicalSupportApp/branch/master/graph/badge.svg)](https://codecov.io/gh/jimartinezabadias/TechnicalSupportApp)
![PHP Unit](https://github.com/jimartinezabadias/TechnicalSupportApp/workflows/Laravel/badge.svg)
![Static Code Analysis](https://github.com/jimartinezabadias/TechnicalSupportApp/workflows/Static%20Code%20Analysis/badge.svg)
![Dusk Tests](https://github.com/jimartinezabadias/TechnicalSupportApp/workflows/Dusk%20Tests/badge.svg)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/0888955c12db43a1b52963ba39df7dba)](https://www.codacy.com/gh/jimartinezabadias/TechnicalSupportApp/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jimartinezabadias/TechnicalSupportApp&amp;utm_campaign=Badge_Grade)

## About this project
Application for Programación Web 2, TUPAR 2020. FCE, UNICEN.

## Deployed demo
<a href="https://technical-support-app.herokuapp.com/">technical-support-app.herokuapp.com</a>

## Install project

* Clone the project

`$ git clone https://github.com/jimartinezabadias/TechnicalSupportApp.git`

* Install dependencies w/composer

`$ docker run -it --rm --volume $PWD:/app --user $(id -u):$(id -g) composer:1.10.10 composer -vvv install`

* Create .env from .env.example

`$ cp .env.example .env`

* Run Migrations

`$ docker exec -it LaravelApp-app php artisan migrate`

* Run docker containers

`$ docker-compose up -d`

