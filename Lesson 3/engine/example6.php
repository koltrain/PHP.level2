<?php
//include 'Twig/Autoloader.php';
//Twig_Autoloader::register();
// подключение к бд
try {
//  $dbh = new PDO('mysql:dbname=world;host=localhost', 'root', 'guessme');
	$dbh = new PDO("mysql:dbname=" . DB . ";host=" . HOST, USER, PASS);
} catch (PDOException $e) {
  echo "Ошибка подключения: Нет возможности подключиться к БД. " . $e->getMessage();
}

// установка error режима
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// выполняем запрос
try {
  // формируем SELECT запрос
  // в результате каждая строка таблицы будет объектом
  $sql = "SELECT country.Code AS code, country.Name AS name, country.Region AS region, country.Population AS population, countrylanguage.Language AS language, city.Name AS capital FROM country, city, countrylanguage WHERE country.Code = city.CountryCode AND country.Capital = city.ID AND country.Code = countrylanguage.CountryCode AND countrylanguage.IsOfficial = 'T' ORDER BY population DESC LIMIT 0,20";
  $sth = $dbh->query($sql);
  while ($row = $sth->fetchObject()) {
    $data[] = $row;
  }
  
  // закрываем соединение
  unset($dbh); 

  //$loader = new Twig_Loader_Filesystem('templates');
  $loader = new Twig_Loader_Filesystem(PATH . 'templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('countries2.tmpl');

echo "<pre>";
print_r($data);
echo "</pre>";

  echo $template->render(array (
    'data' => $data
  ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>