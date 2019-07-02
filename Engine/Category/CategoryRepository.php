<?php

namespace Engine\Category;
use RedBeanPHP\R as R;
use Engine\Category\Category;

class CategoryRepository{

    public function CategoryCreate($Category){
        
          var_dump($Category);   
          $BDCategory = R::dispense("category");
          $BDCategory->name = $Category->name;
          R::store($BDCategory);
        
        var_dump($BDCategory);   



    }
    
}