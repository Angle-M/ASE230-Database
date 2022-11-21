<?php
//index.php

//uses the conection settings
require_once('settings.php');
// Simple query
$result=$connection->query('SELECT * FROM categories');

//link to create.php

echo '<a href="create.php">Create category</a>';

echo '<table>';

while($category=$result->fetch()){
echo '<tr>
        <td>'.$category['ID'].'</td>
        <td>    <a href="details.php?id='.$category['ID'].'">'.$category['name'].'</a>   </td>
        <td>    <a href="delete.php?id='.$category['ID'].'">'.'DELETE CATEGORY</a>   </td>
    </tr>';
}

echo '</table>';
die();
?>
