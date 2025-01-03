<?php

require_once 'models/Task.php';

function getTasks()
{
  $tasks = array(
    array('id' => 1, 'description' => 'Buy milk'),
    array('id' => 2, 'description' => 'Clean the house'),
    array('id' => 3, 'description' => 'Go to the gym'),
  );
  return array_map(function ($task) {
    return new Task($task['id'], $task['description']);
  }, $tasks);
}

$allTasks = getTasks();
print_r($allTasks);
