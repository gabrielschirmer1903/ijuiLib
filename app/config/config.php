<?php
  // DB Params
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'ijuilib');

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root
  define('URLROOT', 'http://localhost/ijuiLib');
  // Site Name
  define('SITENAME', 'IjuiLib');
  $var = substr_replace(APPROOT, "", -3);
  define('PUBROOT' , $var . 'public\img\bookimages\a');
  define('IMGUSEROOT' , $var . 'public\img\userimages\a');
  define('IMGOFFERROOT' , $var . 'public\img\offerimages\a');
