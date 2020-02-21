<?php

ini_set('display_errors', 1);

require 'Router.php';

new Router($_SERVER['REQUEST_URI']);
//include 'views/PasswordResetView.php';