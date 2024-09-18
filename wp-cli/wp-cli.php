<?php 
// check whether wp-cli is installed or not
wp --info

//create .pot file for plugin or theme in the languages folder
wp i18n make-pot . languages/hexcoupon.pot // replace hexcoupon.pot with your own plugin file name. like myplugin.pot

