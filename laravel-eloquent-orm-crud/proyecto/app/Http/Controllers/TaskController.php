<?php 
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;

use Request;
use View;
use App\Models\Task;

class TaskController extends BaseController
{

    /**
     * task 
     *
     * @var [Task object]
     */
    private $task;    

    public function index(){
        $this->task = new Task();
        $tasks = $this->task->getAll();
        
        return View::make('index',['tasks' => $tasks]);
    }

    public function add(){
        if ($_POST){
            $this->task = new Task();
            $this->task->saveTask($_POST);
            return redirect()->action('TaskController@index');
        }
        return View::make('add');
    }

    public function edit($id = null){
        if ($_POST){
            $this->task = new Task();
            $this->task->saveTaskById($_POST);
            return redirect()->action('TaskController@index');
        }else{
            $this->task = new Task();
            $tasks = $this->task->getTaskById($id);
        }
        return View::make('edit',['tasks' => $tasks]);
    }

    public function delete($id){
        $this->task = new Task();
        $this->task->deleteById($id);
        return redirect()->action('TaskController@index');
    }

}
?>