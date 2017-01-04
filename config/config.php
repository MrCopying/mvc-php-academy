<?php

Config::set('site_name', 'Your Site Name');

Config::set('languages', array('en', 'fr', 'ru', 'ua'));

Config::set('routes', array(
    'default'   => '',
    'admin'     => 'admin_',
));

Config::set('default_route','default');
Config::set('default_language','en');
Config::set('default_controller','page');
Config::set('default_action','index');