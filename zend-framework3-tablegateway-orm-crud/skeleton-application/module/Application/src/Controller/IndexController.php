<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Model\Task;
use Application\Model\TaskTable;

class IndexController extends AbstractActionController
{
    private $table;

    public function __construct(TaskTable $taskTable)
    {
        $this->table = $taskTable;
    }
    
    public function indexAction()
    {   
            
        $tasks  = $this->table->fetchAll(true);
        $params = array('tasks' => $tasks);
        return new ViewModel($params);
    }

    public function addAction(){
        if ($_POST){
            // post
            $title       = $_POST["title"];
            $description = $_POST["description"];
            $created_at  = $_POST["created_at"];
            // task object
            $task = new Task();
            $task->setId(null);
            $task->setTitle($title);
            $task->setDescription($description);
            $task->setCreated_at($created_at);
            // task table
            $this->table->saveTask($task);
            // redirect to index
            return $this->redirect()->toRoute('application', ['action' => 'index']);
        }else{
            return new ViewModel();    
        }        
    }

    public function editAction(){
        if ($_POST){
            // save
            // post
            $title       = $_POST["title"];
            $description = $_POST["description"];
            $created_at  = date("Y-m-d H:i:s",strtotime($_POST["created_at"]));
            $id          = $_POST["id"];
            // task object
            $task = new Task();
            $task->setId($id);
            $task->setTitle($title);
            $task->setDescription($description);
            $task->setCreated_at($created_at);
            // task table
            $this->table->saveTask($task);
            // redirect to index
            return $this->redirect()->toRoute('application', ['action' => 'index']);
        }else{
            $id = $this->params()->fromRoute('id', 0);
            // edit
            $task = $this->table->getTask($id);
            $params = array('my_task' => $task);
            return new ViewModel($params);
        }   
    }

    public function deleteAction(){
        $id = $this->params()->fromRoute('id', 0);
        $this->table->deleteTask($id);
        // redirect to index
        return $this->redirect()->toRoute('application', ['action' => 'index']);    
    }

}
