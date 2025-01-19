<?php

return [
  '' => [
    'controller' => 'TaskController',
    'action' => 'index'
  ],
  'tasks/create' => [
    'controller' => 'TaskController',
    'action' => 'create'
  ],
  'tasks/edit/([0-9]+)' => [
    'controller' => 'TaskController',
    'action' => 'edit'
  ],
  'tasks/delete/([0-9]+)' => [
    'controller' => 'TaskController',
    'action' => 'delete'
  ]
];
