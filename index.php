<?php 
require_once '../includes/db.php';
$results = $db->query('SELECT id, dino_name, period 
		FROM dinasaurs 
		ORDER BY dino_name ASC');


?>


<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Dinosaurs</title>
	<link href="css/general.css" rel="stylesheet">
</head>

<body>
<ul>
<?php foreach ($results as $dino) : ?>
 <li> <a href="single.php?id=<?php echo $dino['id'];?>"><?php  echo $dino['dino_name']; ?> </a>
 &bull;
<a href="delete.php?id=<?php echo $dino['id'];?>">Delete</a>
</li>
 <?php endforeach ?>
</ul>


</body>
</html>