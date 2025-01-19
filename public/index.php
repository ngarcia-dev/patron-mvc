<?php

use App\Controllers\TaskController;

require_once __DIR__ . '/../vendor/autoload.php';

$controller = new TaskController();

if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'create':
      $controller->create();
      break;
    case 'edit':
      $controller->edit($_GET['id']);
      break;
    case 'delete':
      $controller->delete($_GET['id']);
      break;
  }
} else {
  $controller->index();
}
