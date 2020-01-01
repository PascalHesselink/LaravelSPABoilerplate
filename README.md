# Laravel SPA Boilerplate

Boilerplate for Laravel including Tailwind, Vue, Vuex, Vue-router, Sass, Font Awesome and Laravel-mix.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Installing

[Download](https://github.com/PascalHesselink/LaravelSPABoilerplate/archive/master.zip) the project and open it in your terminal and code editor!


1 - Install the packages via [composer](https://getcomposer.org/):
```
composer install
```

2 - Install the packages via [npm](https://www.npmjs.com/):
```
npm install 
```

3 - Copy the `.env` file
```
cp .env.example .env
```

4 - Setup your `.env` file with correct database settings

5 - Run the migrations
```
php artisan migrate
```

6 - Run the seeder to create the default admin user
```
php artisan db:seed
```

## Start coding

Serve the website
```
php artisan serve
```

While developing run:
```
npm run watch
```


## Deployment

Before deploying your project run the following command to use PurgeCSS:
```
npm run production
```

## Built Mainly With

  - TailwindCSS [https://tailwindcss.com]
  - VueJS [https://vuejs.org/]
  - Vuex [https://vuex.vuejs.org/guide/]
  - Vue-router [https://router.vuejs.org/]
  - SASS [https://sass-lang.com/]
  - Font Awesome [https://fontawesome.com/]
  - Laravel-Mix (for compiling) [https://laravel.com/docs/5.8/mix]


## Credits

* **[Adam Wathan](https://adamwathan.me/)** - *Creating the awesome TailwindCSS*
* **[Evan You](https://evanyou.me/)** - *Creating the awesome VueJS*
* **[Pascal Hesselink](https://pascalhesselink.nl)** - *Setting up this boilerplate*


## License

This project is licensed under the MIT License
