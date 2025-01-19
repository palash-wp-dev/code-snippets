<?php
composer // to check whether composer is installed globally or not

composer --version // to check the installed version of composer

composer init // it will initialize composer and will add composer.json file in the project

composer install // it will download and install packages based on composer.json (and composer.lock if present) file requirements.

composer require // it will install whatever dependency you want to add (for both development and deployment)
e.g. composer require psr/log

composer require --dev // it will install whatever dependency you want to add (for both development)

composer update // it will update all outdated things

composer show // it will show all install depencies in the project

composer outdate // it will show all outdated dependencies of the project

composer remove // it will remove dependency from the composer
e.g. composer remove psr/log

composer dump-autoload // ensures that Composer’s autoloader is up-to-date with your project structure.

composer install --no-dev --optimize-autoloader // it will automatically add vendor folder with necessary dependancy 

require('vendor/autoload.php'); // to use any package via composer in any php file, you need to require this file into the file