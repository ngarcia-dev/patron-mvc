<?php

require_once 'models/Task.php';

class TaskController
{
  public function index()
  {
    $tasks = Task::all();
    require_once 'views/tasks/index.phtml';
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $task = new Task(null, $_POST['description']);
      $task->save();
      header('Location: index.php');
    } else {
      require_once 'views/tasks/task-form.phtml';
    }
  }

  public function edit($id)
  {
    $task = Task::find($id);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $task->description = $_POST['description'];
      $task->save();
      header('Location: index.php');
    } else {
      require_once 'views/tasks/task-form.phtml';
    }
  }

  public function delete($id)
  {
    $task = Task::find($id);
    $task->delete();
    header('Location: index.php');
  }
}
