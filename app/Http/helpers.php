<?php

function gameDate($date) {

$gamedate = new DateTime($date, new DateTimeZone('America/Los_Angeles'));

$game_date = date_sub($date, date_interval_create_from_date_string('3 hour'));
$game_date = $game_date->format('M jS Y');

return $gamedate;

}



?>