# Documentation for Scooter App
## Introduction
The following instructions will enable the Scooter App project up and running on your local machine for devlopment and testing purposes. Thanks to 

## Prerequisites
What things you need to install the software.

- Git.
- Docker.

## Setup
- Clone the git repository on your computer
```
$ git clone https://github.com/TunjiTofu/scooter-app-tofunmi.git
```
You can also download the entire repository as a zip file and unpack on your computer.

- After cloning the application, you need to install its dependencies.
```
$ cd scooter-app-tofunmi
$ docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
- Create your .env file
```
$ cp .env.example .env
```
- Sail up the application
```
$ ./vendor/bin/sail up -d
```
- Generate an App Encryption Key
```
$ ./vendor/bin/sail artisan key:generate
```
- Open the directory with your desired code editor
- Open the .env file and do the following
    - Update the following variables in the .env file
    ```
    B_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE= << use a desired database name >>
    DB_USERNAME= << use a desired user name >>
    DB_PASSWORD=<< use a desired password >>
    ```
- Using any Database Management System (DBMS), create a database that conforms with the database variable name in your .env file
- Run the following command to run the database migrations
```
$ ./vendor/bin/sail artisan migrate
```
- Run the following command to seed the database
```
$ ./vendor/bin/sail artisan db:seed
```
# Database Structure
- Client Table (clients)
    | Column      | Description |
    | ----------- | ----------- |
    | id          | bigIncrements (PK)       |
    | uuid         | uuid        |
    | created_at   | timestamp        |
    | updated_at   | timestamp        |

- Scooter Table (scooters)
    | Column      | Description |
    | ----------- | ----------- |
    | id          | bigIncrements (PK)       |
    | uuid        | uuid        |
    | location    | point       |
    | status      | integer     |
    | created_at  | timestamp   |
    | updated_at  | timestamp   |

- Trip Table (trips)
    | Column            | Description |
    | -----------       | ----------- |
    | id                | bigIncrements (PK)|
    | uuid              | uuid        |
    | scooter_id        | foreignId (FK)|
    | client_id         | foreignId (FK)|
    | start_location    | point       |
    | current_location  | point       |
    | end_location      | point       |
    | status            | integer     |
    | created_at        | timestamp   |
    | updated_at        | timestamp   |


## Running the Client Commands
### Before running the client commands, it is important to open laravel.log file to see the result of the commands (see file path below)
```
    /storage/logs/laravel.log
```
  - Searching for Nearby Scooters:
      - This returns all Scooters within a particular radius of the client's current location
      - Below is the code to run the client command to locate scooters
      - `./vendor/bin/sail artisan scooter:location {radius} {clientCurrentLat} {clientCurrentLng}`. For example:
        ```
        $ ./vendor/bin/sail artisan scooter:location 10 34.211 51.232
        ```
 - Starting a Scooter Trip:
      - This commences a trip and return details associated with the trip
      - Below is the code to run the client command to start a trip
      - `./vendor/bin/sail artisan scooter:start {scooter_id} {client_id} {startLatitude} {startLongitude}`. For example:
        ```
        $ ./vendor/bin/sail artisan scooter:start 1 1 34.0201 54.454
        ```
 - Updating a Scooter Location:
      - This updates the scooter's locationat intervals. Currently, both latitude and longitude are updated by 0.11points (which represents every 11 seconds)
      - Below is the code to run the client command to update a scooter location on a trip
      - `./vendor/bin/sail artisan scooter:update {scooterId}`. For example:
        ```
        $ ./vendor/bin/sail artisan scooter:update 1
        ```
 - Ending a Trip:
      - This terminates a particular trip and register the last location.
      - Below is the code to run the client command to end a trip
      - `./vendor/bin/sail scooter:end {trip_id} {scooterId} {endLatitude} {endLongitude`. For example:
        ```
        $ ./vendor/bin/sail artisan scooter:end 1 1 40.123, 11.3444
        ```
 - Runing the three processes concurrently:
      - This runs the three processes concurrently every one minute
      - If the previous commands have tampered with, It is advisable to run a fresh migration in order to get the expected output
        ```
        $ ./vendor/bin/sail artisan migrate:refresh
        $ ./vendor/bin/sail artisan db:seed
        ```
      - Below is the code to run the three process concurrently
      - `./vendor/bin/sail artisan run:clients`. For example:
        ```
            ./vendor/bin/sail artisan run:clients
        ```

## To Execute the Test:
- It is important to have a test table. Run the command below to create and seed the testing table
- Configure the .env.testing file as shown below:
    ```
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=

    API_KEY=tofunmiScooter

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=testing
    DB_USERNAME=root
    DB_PASSWORD=
    ```
  ```
  $ ./vendor/bin/sail artisan migrate --seed --env=testing
  ``` 
- Run the test using the command below
  ```
  $ ./vendor/bin/sail test
  ``` 

## Further Improvements:
 - Reduce expensive calls to the database while updating the scooter location by utilizing Redis ✅
 - Implement a more proper child process ✅
 - Improved test cases ✅

## API Documentation
[Click this Link Access the API Documentation](https://app.gitbook.com/o/XXNaAkNtCMRanbfyrTQm/s/ItbDDRlpa0Wz2QwfIG8F/~/changes/gruTgx99ts0O1WV5Af8O/)

[Click this Link to View Assumptions Associated With This Project](/ASSUMPTIONS.md)