# CEA Trial Task

Simplified GWWC clone

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

PHP 7.1
```
brew update
brew install homebrew/php/php71
```

Run `php -v` in the terminal and make sure it says `PHP 7.1.4`.

Composer
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

Laravel Valet (requires macOS, if you prefer using `vagrant` see https://laravel.com/docs/5.4/homestead)
```
composer global require laravel/valet
```

Make sure the  `~/.composer/vendor/bin` directory is in your system's "PATH" and nothing else is listening on `localhost:80`.

```
valet install
```

This will configure and install Valet and DnsMasq, and register Valet's daemon to launch when your system starts.

Now create a new directory by running something like `mkdir ~/Sites`. Next, `cd ~/Sites` and run `valet park`. This command will register your current working directory as a path that Valet should search for sites.


### Installation

Clone repo

```
git clone https://github.com/naokoon/gwwc.git
cd gwwc/
```

Install dependencies

```
composer install
```

Now rename `.env.example` to `.env` and configure DB connection.

If you're testing locally and don't have a DB

```
brew install mysql
brew services start mysql
mysql -uroot -h 127.0.0.1
```

### Running migrations and load seed data
This creates the tables in the database and fills them with dummy data

```
php artisan migrate:refresh --seed
```

Now you should be able to load the frontend on `http://gwwc.dev/`

You can now log in with any email of dummy user in the `users` table and the password `gwwc`, e.g.

```
User: admin@test.com
Pass: gwwc
```

## API

The API is accessible under http://gwwc.dev/api/ and uses API tokens for authorization. The default user (ID: 1) always has the token `LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc`. New tokens can be generated by calling `POST api/login` with the email of a dummy user (see `users` table) and the password `gwwc`.

API documentation: /gwwc/public/docs/index.html

## Running the tests

```
composer tests
```

Don't forget to run migrations again afterwards.

## Sharing the site

Navigate to the site's directory in your terminal and run

```
valet share
```

A publicly accessible URL will be inserted into your clipboard and is ready to paste directly into your browser.

To stop sharing your site, hit Control + C to cancel the process.

## Built With

* [Laravel 5.4](https://laravel.com/docs/5.4) - The web framework used

## License

This project is licensed under the MIT License
