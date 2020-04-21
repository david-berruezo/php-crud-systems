<?php 
namespace Application\Model;

class Task{
   
    /**
 	 * @var int
 	 */
 	 protected $id;
     
 	 /**
 	  * @var String
 	  */
 	 private $title;
 	 
 	 /**
 	  * @var String
 	  */
     private $description;
 	 
     /**
      * @var DateTime
      */
     private $created_at;


    // Guardar el objeto
    public function exchangeArray($data)
    {
        $this->id     		    = (!empty($data['id'])) ? $data['id'] : null;
        $this->title     	    = (!empty($data['title'])) ? $data['title'] : null;
        $this->description     	= (!empty($data['description'])) ? $data['description'] : null;
        $this->created_at 		= (!empty($data['created_at'])) ? $data['created_at'] : null;
    }
     
    // Add the following method:
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }


    /**
     * Get the value of crated_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of crated_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

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
}
?>