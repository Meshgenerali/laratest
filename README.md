<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel user registration and authentication website

- The project is a simple website that impliments user registration using laravel jetstream to register and authenticate users traditionally. I also implimented passwordless register and login using webauthn package. users can chooce which way to be authenticated either traditionally or by us of fingerprint credentials.

- when a user chooces to use traditonal system, email verification is done to be sure that the user trying to register really he is. an email is sent to the new user with a verify button.

- the webauthn technique captures the user browser fingerprints. when a user clicks passwordless register, the project checks if the browser supports webauthn authentication. if yes, it captures as much info as it can to identify the user. now when the user tries to login passwordless, the code checks if there exists a user with credentials similar to the ones submitted and handles the responses corectly. Due to security i implimented a clone featuer to check for cloned credentials and disable them.



## Requirements
to get started and run this project locally in your device, you need to have:
- PHP latest version installed in your device 
- mysql database 
- local server
- access to a terminal


## Getting started

Having the environment setup, clone the project and navigate to the project folder in your local environment.

Locate .env file in the root of your project and configure your database connection. Adjust database name, password and username. be keen not to mess.

After successful database connection, open terminal on the root of your project folder then run database migrations. Use command below:
    - php artisan migrate

After successful migration, you can now start the local server by the following command
     - php artisan serve

on another terminal run
     - npm run dev

the project runs at localhost port 8000. in your browser, access localhost:8000 and see the project.
you can now click login or register to authenticate or register a new user.
after a successful login, a log out button appears on the header to confirm that the user is logged in. one can choose to logout or stay logged in.




## Note

  -  instructions given are to run the code locally. if you want to test all features you can deploy it depending on the documentaion of your hosting provider
  -  webauthn is not supported by all browsers. to test this make sure you have latest version of your browser and updated your system for latest releases.


## Contributing

Thank you for considering contributing laravel user registration and authentication project. Any insights will be higly appreaciated.


## bugs and vulnerabilities

Be free to report any bugs and vulnereabilities found to me.

