<?php 

/** List of  youtube to learn phpunit */
1. Bitfumes // https://www.youtube.com/watch?v=okYKN1o_dIk&list=PLe30vg_FG4OTsFRc1eWppZfYwZdMlLuhE

/** Basic Introduction -- what is unit test? */
1. Unit means one, one test for one function
2. Each method test one thing only
3. Only one assert in one method
4. Unit test has to be decoupled
5. Test doesn't interfere each other
6. Don't share data with tests
7. Ensure that each part of program is working fine as an isolate system


/** All commands */
to install phpunit you should check the compatible version of phpunit based on your php version
composer require --dev phpunit/phpunit ^12 //use this to install phpunit in your project as devlopment dependencies
./vendor/bin/phpunit --version or vendor/bin/phpunit --version //use this to check intall phpunit version
php vendor/bin/phpunit --version //use this command if the above command is not working, that's because windows sometimes does not allow the above command

php vendor/bin/phpunit tests // use this command to check phpunit test is working or not, but before you have to create folder named 'tests'