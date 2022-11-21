<?php
//detail.php
require_once('settings.php');

// Prepared query
$query=$connection->prepare('DELETE FROM categories WHERE ID=?');
$query->execute([$_GET['id']]);
echo 'The Category has been deleted';
?>
