<?php
namespace App\Http\Controllers\todo;

use App\Http\Controllers\Todo\functions\Create;
use App\Http\Controllers\Todo\functions\Delete;
use App\Http\Controllers\Todo\functions\Read;
use App\Http\Controllers\Todo\functions\Update;
use App\Repository\TodoRepoImpl;

class TodoController
{
    use Create, Read, Update, Delete;
    
    // this property will be inherited to its child, in this case is traits
    private $repository_todo;

    // Inject the repository
    // this can be done if you have registered the repository on the provider
    public function __construct(TodoRepoImpl $repository_todo)
    {
        $this->repository_todo = $repository_todo;
    }
}
