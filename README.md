# JolE-sport 🎾 + 🖥 = 🤘🏻

JolE-sport is a web application that allows you to follow e-sport activity. 
You can find the main teams and the next matches of each game.
There are also articles about e-sport news.
By creating an account, you can add the games and teams you like as 'favorite' to see the articles and matches about them in first.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine to browse the app.

### Prerequisites

Go to the GitHub page of the JolE-sport project : ```https://github.com/LeanaMartinez/JolE-sport/tree/master```

Download the project with the green button ```Clone or download``` and ```Download ZIP```.

Extract the directory, place it where you want in your computer and memorize the path of the directory.

Exemple of path : ```Documents/GitHub/JolE-sport```

### Installing

Open your terminal

Install composer

```
$ curl -sS https://getcomposer.org/installer | php
```

Go to the JolE-sport project

```
# customize the path
$ cd path/JolE-sport
```

Install the requires and depedencies

```
$ composer install
```

## Database

### Configuring the Database

Open your WAMP/MAMP/LAMP and start server

In the project, open the ```.env``` file and configure the Database

```
# .env

# customize this line
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/jole-sport"
```

### Create the Database

In your Database administrator, create a Database named ```jole-sport```

In the terminal, create the Database.

```
$ bin/console doctrine:schema:create
```

### Load datas in the Database

Now you have 2 solutions to import datas : 

- Load the fixtures (repetitive and basic datas)

```
$ bin/console doctrine:fixtures:load
```

or 

- Import the ```data.sql``` file in your Database administrator.
- The file is in the repo

## Using the app

### Start server

In the terminal, start the server.

```
$ bin/console server:start

# enter yes
Do you want to execute server:run immediately? (yes/no) [no]:
 > yes
```

### Load the application 🎉🍻

Open your favorite browser.

Enter the home page adress.

```
http://127.0.0.1:8000/
```

You can browse JolE-sport application !
