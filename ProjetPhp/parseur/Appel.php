<html>
<body>


<?php


include ('XmlParser.php');
global $base,$login,$mdp;
$co = new Connection($base,$login,$mdp);
$querry='Select fluRl, url from Flux';
$co->executeQuery($querry);
$result = $co->getResults();
/*
foreach ($result as $row){
    $parser = new XmlParser($row['fluRl'], $row['url']);

    $parser ->parse();

}
*/
$parser = new XmlParser("/var/www/html/rss.xml","jv.com");
$parser->parse();
?>

</body>
</html>