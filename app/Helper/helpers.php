<?php

use App\Activity;

function generate_activity($table, $message, $id, $type = 'add')
{
    $activity = new Activity();
    $activity->table = $table;
    $activity->message = $message;
    $activity->foreign_key = $id;
    $activity->type = $type;
    $activity->save();
    return $activity;
}
