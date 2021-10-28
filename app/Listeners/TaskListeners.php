<?php

namespace App\Listeners;

use App\Events\TaskEvent;
// use App\Models\User;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TaskListeners
{
    public $search;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TaskEvent  $event
     * @return void
     */
    public function handle(TaskEvent $event)
    {
       
        // $search=$event->request['search'];
        // $users=User::where('name',"LIKE","%$search%")->orWhere('email',"LIKE","%$search%")->simplePaginate(5);
        // return $users;
    }
}
