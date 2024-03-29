<?php 

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (empty($id)) {
	header('Location: index.php');
	exit;
};

// you only need to connect to the database if the id is not empty
require_once '../includes/db.php';

// prepare() creates a stored procedure 
$sql = $db->prepare('
	SELECT id, dino_name, period
	FROM dinasaurs
	WHERE id = :id
');


$sql->bindValue(':id', $id, PDO::PARAM_INT);

// executes the stored procedure
$sql->execute();
// gets the results from the quey and put it into the variable
// fetch() is for one result
// fetchAll is if we expect more than one result
$results = $sql->fetch();

if (empty($results)) {
	header('Location: index.php');
	exit;
};


?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $results['dino_name'];?> &middot;s Dinosaurs</title>
</head>

<body>
	<h1><?php echo $results['dino_name'];?></h1>
	<p>Period: <?php echo $results['period']; ?></p>

</body>
</html>