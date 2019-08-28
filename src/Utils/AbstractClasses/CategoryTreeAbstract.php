<?php
namespace App\Utils\AbstractClasses;


 use Doctrine\ORM\EntityManagerInterface;
 use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


 abstract class CategoryTreeAbstract {

     public $categoriesArrayFromDb;
     protected static $dbconnection; //now I'm going to create a singleton pattern to query my DB only once, with only one execution of php script;

     public function __construct(EntityManagerInterface $entitymanager, UrlGeneratorInterface $urlgenerator)
     {
         $this->entitymanager = $entitymanager;
         $this->urlgenerator = $urlgenerator;
         $this->categoriesArrayFromDb = $this->getCategories();
     }

     abstract public function getCategoryList(array $categories_array);

     private function getCategories(): array
     {
         if(self::$dbconnection) //I am using singleton to create single mysql connections and using it across multiple objects 
         {
             return self::$dbconnection;
         }
         else
         {
             $conn = $this->entitymanager->getConnection();
             $sql = "SELECT * FROM categories";
             $stmt = $conn->prepare($sql);
             $stmt->execute();
             return self::$dbconnection = $stmt->fetchAll(); //return array, Ionly have to query Db once
           }
         }
     }

     ?>
