<?php

//provide the date in preferred format for blogs and elsewhere on site where date is part of dataset...

function gameDate($date) {

$gamedate = new DateTime($date, new DateTimeZone('America/Los_Angeles'));

$game_date = date_sub($gamedate, date_interval_create_from_date_string('3 hour'));
$game_date = $game_date->format('M jS Y');

return $game_date;

}


//provides article author to app DRY it up...

function written_by($author) {

    if($author != null) {
        $writer = App\User::find($author)->name;

    }

else {
        $writer = "admin";
}

    return $writer;

}

//short news feed snippet 50 characters...
function snippet($body){

    $variable= strip_tags($body);
    $variable =substr($variable,0, 50);

    return $variable;

}

//longer news feed snippet for welcome.php page...
function snippety($body){

    $variable= strip_tags($body);
    $variable =substr($variable,0, 150);

    return $variable;

}


function route_articles($category) {

    if($category=='news'){

        $output = "news/general";
    }
    elseif($category=='former_players'){
        $output = "news/former-players";
    }

    else{
        $output = "news/".$category;
    }

   return $output;

}


?>