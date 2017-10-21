<?php

//provide the date in preferred format for blogs and elsewhere on site where date is part of dataset...

function gameDate($date) {

$gamedate = new DateTime($date, new DateTimeZone('America/Los_Angeles'));

$game_date = date_sub($gamedate, date_interval_create_from_date_string('3 hour'));
$game_date = $game_date->format('M jS Y');

return $game_date;

}


//provide article author to app DRY it up...

function written_by($author) {

    if($author != null) {

        $writer = App\User::find($author)->name;


    }

else {

        $writer = "admin";

}


    return $writer;




}


?>