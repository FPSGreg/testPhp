<?php

namespace Engine\Category;
use RedBeanPHP\R as R;
use Engine\Category\Category;

class CategoryRepository{

    public function CategoryCreate($category){
        
        echo $category;   

       $BDCategory = R::dispense("category");
    //    $BDCategory->name = $category->name;
    //    $BDCategory->id = R::store($category);
        
    //    echo $BDCategory;   



    }
    
}