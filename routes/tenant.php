<?php 

$this->get('/', 'HomeController@index')->name('home');

$this->resource('entidades', 'Admin\CompanyController');

$this->resource('usuarios', 'Admin\UserController');

