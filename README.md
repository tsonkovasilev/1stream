<p align="center"><a href="https://1-stream.com/" target="_blank"><img src="https://media.licdn.com/dms/image/v2/D4D0BAQFtRE55TiWz6A/company-logo_200_200/company-logo_200_200/0/1716463497277/1_stream_logo?e=2147483647&v=beta&t=fFOgAfiNiZuxsjwVPVvQz1Y7NsFEWm1XFhCO2AqYoD8"></a></p>


## Create the tables

<<<<<<< Updated upstream
<ul>
<li>php artisan make:model Stream -m</ul>
<li>php artisan make:model StreamType -m</li>
</ul>
=======
-php artisan make:model Stream -m
-php artisan make:model StreamType -m


Create new middleware for the api to check the api key
php artisan make:middleware ApiKeyAuth

Register the new separate route api like web and console
bootstrap/app.php 

add route to the API with ApiKeyAuth in 
routes/api.php 
>>>>>>> Stashed changes
