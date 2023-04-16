# Laravel 8 FindMyTelU Project = Places Map with Google Maps API and Adminpanel

## In collaborations with Zahwa Dewi Artika

This project is transformed [free WordPress theme Directory Starter](https://wpgeodirectory.com/downloads/directory-starter/) into fully manageable Laravel 8 project with adminpanel generated with [QuickAdminPanel](https://quickadminpanel.com) to manage all the places.

## Purposes
Due to course project assignment "Aplikasi Berbasis Web" in semester 6 = Create website related to the campus environment using HTML, Javascript, css, bootstrap, and so on.

## Features

- __Adminpanel__ with administrator user managing places, categories, and user settings.
- __Registration__ for new members who are defaulted to user status.
- Adminpanel uses Google Places API with autocomplete to __automatically get coordinates from address__
- Front-end uses Google Maps API to __view the map of places__


- - - - -

## Screenshots 

![Overview](https://user-images.githubusercontent.com/90541985/232350640-e3ccb5c8-9335-4d8e-b521-d4656a54476d.png)

- - - - -

![Laravel Places Google Maps Autocomplete Address](https://laraveldaily.com/wp-content/uploads/2019/12/Screen-Shot-2019-12-11-at-11.00.12-AM.png)

- - - - -

## How To Use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- In your __.env__ file add your Google Maps API key: `GOOGLE_MAPS_API_KEY=AIzaSyBi2dVBkdQSUcV8_xxxxxxxxxxxx`
- That's it: launch the main URL. 
- You can login to adminpanel by going go `/login` URL and login with credentials __admin@admin.com__ - __password__
- Click __Register__ on top right to add new place owner and their places


- - - - -

## Helpful Articles

- [Laravel: Find Addresses with Coordinates via Google Maps API](https://laraveldaily.com/laravel-find-addresses-with-coordinates-via-google-maps-api/)


- - - - -


## References and Credit to

- Laravel-Shop-Maps-QuickAdminPanel (https://github.com/LaravelDaily/Laravel-Shops-Map-QuickAdminPanel)
- QuickAdminPanel (https://quickadminpanel.com)
- 
