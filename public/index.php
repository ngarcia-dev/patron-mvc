<?php

require_once '../app/Controllers/TaskController.php';

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
