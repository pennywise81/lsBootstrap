<?php

$paramstring = $_SERVER["REQUEST_URI"];
$paramstring = '/' == substr($paramstring, 0, 1) ?
  substr($paramstring, 1) : $paramstring;
$paramstring = '/' == substr($paramstring, -1, 1) ?
  substr($paramstring, 0, strlen($paramstring) - 1) : $paramstring;
$params = strlen($paramstring) == 0 ? array() : explode('/', $paramstring);

$content_name = false === empty($params[0]) ? $params[0] : 'homepage';
$subcontent_name = false === empty($params[1]) ? $params[1] : '';

$content_file = 'content/' . $content_name;
if (false === empty($subcontent_name))
{
  $content_file .= '_' . $subcontent_name . '.php';
}
else
{
  $content_file .= '.php';
}

if (false === is_file($content_file)) $content_file = 'content/404.php';

$titles = array(
  'homepage' => 'Homepage',
  '404' => 'Error'
);

$title = 'Project Name ' . (false === empty($titles[$content_name]) ?
  ' | ' . $titles[$content_name] : '');

?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="author" content="Lars Schweisthal" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0 maximum-scale=1.0" />

  <title><?php echo $title; ?></title>

  <link rel="stylesheet" href="style/style.css" />

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
  <div class="wrapper main">
    <header class="main">
      <a href="/" class="logo">
        <img src="http://placekitten.com/g/140/90" alt="Logo">
      </a>
      <nav class="main">
        <ul>
          <li><a href="#">Just</a></li>
          <li><a href="#">Some</a></li>
          <li><a href="#">Internal</a></li>
          <li><a href="#">Links</a></li>
        </ul>
      </nav>
    </header>
    <div class="content main">
      <?php include_once $content_file; ?>
    </div>
  </div>
  <script src="js/init.js"></script>
</body>
</html>