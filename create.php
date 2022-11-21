<?php
//create.php
if(count($_POST)>0){
    require_once('settings.php');
    $query=$connection->prepare('INSERT INTO categories (name) Values (?)');
    $query->execute([$_POST['name']]);
}


?>

<form method="POST">
    Category name: <input name ="name" type="text"/>
    <button type="submit">Submit</button>
</form>
