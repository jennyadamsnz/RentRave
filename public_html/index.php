<?php
  
  date_default_timezone_set("Pacific/Auckland");

  error_reporting(E_ALL);

  require "vendor/autoload.php";

  session_start();

  session_regenerate_id(true);

  require "routes.php";

