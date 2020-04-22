<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model{
    
    /**
     * id
     *
     * @var [int]
     * 
     */
    private $id; 
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var int
     */
    protected $keyType = 'int';    

    /**
     * title
     *
     * @var [String]
     */
    private $title; 
    
    /**
     * description
     *
     * @var [String]
     */
    private $description;
    

    /**
     * crated_at
     *
     * @var [DateTime]
     */
    private $created_at;


    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * Constructor function
     */
    public function __construct(){
        // construimos funcion;
    }

    /**
     * function get all tasks
     *
     * @return tasks
     */
    public function getAll(){
        $tasks = DB::table('task')->get();
        
        return $tasks;
    }

    /**
     * function task by id
     *
     * @return task
     */
    public function getTaskById($id){
        $task = DB::table('task')->where('id', $id)->get();
        return $task;  
    }

    /**
     * function save new task
     *
     * @return void
     */
    public function saveTask($data){
        $id = DB::table('task')->insertGetId(
            [
                'title'       => $data["title"], 
                'description' => $data["description"],
                'created_at'  => date('Y-m-d H:i:s'),
            ]
        );
    }    

    /**
     * function save task by id
     *
     * @param [type] $id
     * @return void
     */
    public function saveTaskById($data){
        $affected = DB::table('task')
         ->where('id', $data['id'])
         ->update(
             [
               'title'       => $data["title"], 
               'description' => $data["description"],
             ]
         );
    }

    public function deleteById($id){
        DB::table('task')->where('id', $id)->delete();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
}
?>