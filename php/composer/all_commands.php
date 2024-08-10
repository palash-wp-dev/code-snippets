<?php
composer --version // to check the installed version of composer

composer init // it will initialize composer and will add composer.json file in the project

composer install // it will install composer.lock file if there are no composer.lock does not exist

composer require // it will install whatever dependency you want to add
e.g. composer require psr/log

composer update // it will update all outdated things

composer show // it will show all install depencies in the project

composer outdate // it will show all outdated dependencies of the project

composer remove // it will remove dependency from the composer
e.g. composer remove psr/log

composer dump-autoload // it will 

composer install --no-dev --optimize-autoloader // it will automatically add vendor folder with necessary dependancy 