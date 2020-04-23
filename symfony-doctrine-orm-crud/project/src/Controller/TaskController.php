<?php
namespace App\Controller;

// Controller
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
// Route
use Symfony\Component\Routing\Annotation\Route;
// Orm
use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class TaskController extends AbstractController
{
  
    /**
     * @Route("/task")
     */

    public function index()
    {
        
        $entityManager = $this->getDoctrine()->getManager();
        $tasks = $this->getDoctrine()->getRepository(Task::class)->findAll();
        
        return $this->render('task/index.html.twig',['tasks' => $tasks]);
        
    }

    /**
     * @Route("/task/edit")
     */

    public function edit($id=null)
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        if ($_POST){
            $task = $entityManager->getRepository(Task::class)->find($id);
            $task->setTitle($_POST['title']);
            $task->setDescription($_POST['description']);
            $entityManager->flush();
            return $this->redirectToRoute('task_index_controller');
        }else{
            $task = $entityManager->getRepository(Task::class)->find($id);
            $parametters = array('errors' => 0 ,'message' => 'All right','task' => $task);
            return $this->render('task/edit.html.twig',['parametters' => $parametters]);    
        }
    }

    /**
     * @Route("/task/add")
     */

    public function add()
    {
        $entityManager = $this->getDoctrine()->getManager();

        if ($_POST){
            $task = new Task();
            $task->setTitle($_POST['title']);
            $fecha = new DateTime(date('Y-m-d H:i:s'));
            $task->setCreated_at($fecha);
            $task->setDescription($_POST['description']);
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirectToRoute('task_index_controller');
        }else{
            return $this->render('task/add.html.twig');    
        }
    }  

    /**
     * @Route("/task/delete")
     */

    public function delete($id=null)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $task = $entityManager->getRepository(Task::class)->find($id);
        $entityManager ->remove($task);
        $entityManager->flush();
        return $this->redirectToRoute('task_index_controller');
    }
}
?>