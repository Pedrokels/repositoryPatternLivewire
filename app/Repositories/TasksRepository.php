<?php

namespace App\Repositories;

use App\Models\Task;

class TasksRepository implements TaskRepositoryInterface
{
    public function getAllTask()
    {
        return Task::all();
    }
}
