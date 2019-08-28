<?php
namespace App\Utils;

use App\Utils\AbstractClasses\CategoryTreeAbstract;

class CategoryTreeFrontPage extends CategoryTreeAbstract {

  public $html_1 = '<ul>';
  public $html_2 = '<li>';
  public $html_3 = '<a href="';
  public $html_4 = '">';
  public $html_5 = '</a>';
  public $html_6 = '<li>';
  public $html_7 = '</ul>';

    public function getCategoryList(array $categories_array)
    {

          $this->categorylist .= $this->html_1;
          foreach ($categories_array as $value)
          {

              $catName = $value['name'];
              $url = $this->urlgenerator->generate('video_list', ['categoryname' => $catName, 'id' => $value['id']]);
              $this->categorylist .= $this->html_2 . $this->html_3 . $url . $this->html_4 . $catName . $this->html_5;

              if (!empty($value['children']))
               {
                  $this->getCategoryList($value['children']);
              }
              $this->categorylist .= $this->html_6;
          }
      $this->categorylist .= $this->html_7;
      return $this->categorylist;
    }

    public function getMainParent(int $id ) :
    {

      $key = array_search($id, array_column($this->$categoriesArrayFromDb, 'id'));

    }
}


 ?>
