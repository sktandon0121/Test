<?php


$team_query = $connection->createCommand("SELECT * FROM teams GROUP BY name")->queryAll();
$team_array = ArrayHelper::map($team_query, 'id', 'name');

/**
* getting opponent team id 
* Reference to ticket No #163 , Comment No #22
* Added by subodh 
*/


?>