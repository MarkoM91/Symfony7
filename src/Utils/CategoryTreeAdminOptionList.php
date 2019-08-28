<?php
namespace App\Utils;

use App\Utils\AbstractClasses\CategoryTreeAbstract;

class CategoryTreeAdminOptionList extends CategoryTreeAbstract
{

  foreach ($categories_array as $value)
  {
      $this->categorlist[] = ['name'=> str_repeat("-", $repeat). $value
      ['name'], 'id'=>$value['id']];

      if (!empty($value['children']))
      {
          $repeat = $repeat + 2;
          $this->getCategoryList($value['children'], $repeat);
          $repeat = $repeat + 2;

      }
  }
  return $this->categorylist;
}
}
