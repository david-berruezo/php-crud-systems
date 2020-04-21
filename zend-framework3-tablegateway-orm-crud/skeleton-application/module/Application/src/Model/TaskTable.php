<?php 
namespace Application\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class TaskTable{
    
    protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function getTableGateway()
	{
		return $this->tableGateway;
    }
    
    public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getTask($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveTask(Task $task)
     {
        $data = array(
          'title'        => $task->getTitle(),
          'description'  => $task->getDescription(),
          'created_at'   => $task->getCreated_at(),
        );
        $id = (int) $task->getId();
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getTask($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Task id does not exist');
            }
        }
     }

     public function deleteTask($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }

}
?>