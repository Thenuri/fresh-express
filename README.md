## CRM System for FRESH EXPRESS

<p align="center"><img src="public/images/main.png" width="400" alt="Fresh express LOGO"></p>

## About the project

This  project is a  CRM system for a grocery store (FRESH EXPRESS) that provides fresh items such as Meat, Vegetable, Fruits, and seafood. 

The CRM system manages inventory, measure sales, keep track of the client information, order management, supplier management, send promotion details to customer.

### CRM  system is built using 

<div>
<p><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo"></a>
<a href="https://laravel-livewire.com/" target="_blank"><img src="public/images/image.png" width="100" alt="Livewire Logo"></a>
<a href="https://tailwindcss.com/" target="_blank"><img src="public/images/tailwind-css-svgrepo-com.png" width="100" alt="tailwind css"></a>
<a href="https://alpinejs.dev/" target="_blank"><img src="public/images/Alpine.js.png" width="100" alt="alphine js"></a>
</p> 
</div>
Laravel , Livewire , Tailwind CSS , Alphine JS

Authentication is done using laravle Jetstream.

### Project Documemt
[View the report here](https://github.com/Thenuri/fresh-express/blob/a2f9dfd9406559d83f2fadc68f1eda771b7f9a48/ssp-2-document%20(1).pdf)


### Customer Interactions

For the customer interactions a mobile application has been developed using Flutter & Dart.
<div>
<p align="center"><a href="" target="_blank"><img src="public/images/flutter-svgrepo-com.png" width="100" alt="Laravel Logo"></a>
<a href="" target="_blank"><img src="public/images/dart-svgrepo-com.png" width="100" alt="Livewire Logo"></a>
</p> 
GitHub repo Link:<a href="https://github.com/Thenuri/mad_fresh_express.git" target="_blank">Mobile Application(FRESH EXPRESS)</a>

</div>

### Other technologies used 

#### Mailtrap 
- On completion of dispatch of each order system will send an email to the customer saying the order has been dispatched with the orderinformation this is been done by mailtrap.
<p align="center"><a href="https://mailtrap.io/" target="_blank"><img src="public/images/1667565915_Mailtrap_Icon.png" width="100" alt="Laravel Logo"></a>
</p> 

#### Pusher 
- To inform the CRM users an order has been arrived to the system this is been done using pusher.
<p align="center"><a href="https://pusher.com/" target="_blank"><img src="public/images/pusher-svgrepo-com.png" width="100" alt="Laravel Logo"></a>
</p> 


This project is being developed as a requirement of a second year module called Server Side Programming.


If you want to download the project locally , follow the [installation](#installation) below.
</div>

## Features

#### Admin Features 
- Manage Accounts 
- Admin Login
- Can see customer details
- Can see the drivers and other employees in the system
- Add Promotions
- Add Products
- Dispatch an order
- View Dliverd Orders

#### Employee Features
- Login
- Register
- Can see customer details
- Can see the drivers in the system
- Add Promotions
- Add Products
- Dispatch an order

#### Customer Features
- Add item to cart
- Redeem loyalty points
- Choose favorite item
- Customer can see promotions
- Login
- Register
- Update Profile
- View Products
- Select Favorite 
- Send Feedback or Complain

## Screenshots

Below are the screenshots of the CRM system and the Mobile Application

### CRM System

<figure>
<figcaption align="center">Login Page</figcaption>
<img src="public/reademe-images/login.png">
</figure>

<figure>
<figcaption align="center">Register Page</figcaption>
<img src="public/reademe-images/register.png">
</figure>

<figure>
<figcaption align="center">Admin & employe dashboard Page</figcaption>
<img src="public/reademe-images/dash1.png">
<img src="public/reademe-images/dash2.png">
<img src="public/reademe-images/dash3.png">
</figure>

<figure>
<figcaption align="center">Customer Page</figcaption>
<img src="public/reademe-images/customer.png">
</figure>

<figure>
<figcaption align="center">Products Page</figcaption>
<img src="public/reademe-images/product.png">
</figure>

<figure>
<figcaption align="center">Promotions Page</figcaption>
<img src="public/reademe-images/promotions.png">
</figure>

<figure>
<figcaption align="center">Employee Page</figcaption>
<img src="public/reademe-images/employee.png">
</figure>

<figure>
<figcaption align="center">Supplier Page</figcaption>
<img src="public/reademe-images/supplier.png">
</figure>

<figure>
<figcaption align="center">Order Page</figcaption>
<img src="public/reademe-images/order.png">
</figure>

<figure>
<figcaption align="center">Deliverd Order Page</figcaption>
<img src="public/reademe-images/delivery.png">
</figure>

<figure>
<figcaption align="center">Driver Dashboard Page</figcaption>
<img src="public/reademe-images/deriver.png">
</figure>

### Mobile application
<figure>
<figcaption align="center">Mobile</figcaption>
<img src="public/reademe-images/Screenshot 2023-10-16 at 15-57-55 ssp-2-document (1).pdf.png">
<img src="public/reademe-images/Screenshot 2023-10-16 at 15-58-08 ssp-2-document (1).pdf.png">
<img src="public/reademe-images/Screenshot 2023-10-16 at 15-58-27 ssp-2-document (1).pdf.png">
</figure>

## Installation

pre-requisites  that are needed to run the project

-   [Composer](https://getcomposer.org/download/)
-   [Node.js](https://nodejs.org/en/download/)
-   [NPM](https://www.npmjs.com/get-npm)
-   [PHP](https://www.php.net/downloads.php)
-   [Sqlite](or you can use [MySQL] https://dev.mysql.com/downloads/installer/)

[ XAMPP ](https://www.apachefriends.org/download.html) or [WAMP server](https://www.wampserver.com/en/download-wampserver-64bits/) can be used for PHP and MySQL.


1.  Clone the repo

    ```sh
    git clone https://github.com/Thenuri/fresh-express.git
    ```
2.  Move in to the CRM folder

    ```sh
    cd crm
    ```  
3.  Composer Install

    ```sh
    composer install
    ``` 
4.  NPM Install

    ```sh
    npm install
    ```
5. Create a new .env file and copy the .env.example file and past it to the .env file

6. Create a database and add the database credentials to the .env file

If you are using sqlite use laravel docs and follow the instructions https://laravel.com/docs/10.x/database#sqlite-configuration

8.  Run the migrations

    ```sh
    php artisan migrate
    ```
9.  Run the seeders

    ```sh
    php artisan db:seed
    ```
10. Run the project

    ```sh
    npm run dev
    ```

    open a new terminal and run without closing the above code 

    ```sh
    php artisan serve
    ```
11. Click on the site address to check the site in your terminal after typing this (php artisan serve) command 
http://127.0.0.1:8000

The admin user and some of the employees are being created using the database seeder,
The credentials are as follows
Admin<br>
email : 'admin@freshgmail.com'<br>
password : 'password'

Employee<br>
email : 'employee@gr.com'<br>
password :'customerpassword'