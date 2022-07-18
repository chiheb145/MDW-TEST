
# Getting started

## Installation

Clone the repository

    git clone https://github.com/chiheb145/MDW-TEST.git

Switch to the repo folder

    cd MDW-TEST

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

add this line in .env

ASSET_URL="./public"

database .env

import the attached database mdw_db

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mdw_db
DB_USERNAME=root
DB_PASSWORD=

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

