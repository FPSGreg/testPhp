<?php

namespace Engine\Category;
use RedBeanPHP\R as R;
use Engine\Category\Category;

class CategoryRepository{

    public function CategoryCreate($Category){

          var_dump($Category);   
          $BDCategory = R::dispense("category");
          $BDCategory->name = $Category;
          R::store($BDCategory);



    }

    public function CategoryDelete($id){

        $category = R::findOne( 'category', ' id = :id ', ["id" => $id] );
        $Category = $category->id;
        if(isset($category->id)){
            R::trash( $category );
            echo ("запись $Category успешно удалена");
       }else{
        throw new \Exception("id {$id} не существует");
       }

    }

    public function GetAll(){

        $Categorys  = R::getAll( 'SELECT * FROM category' );

        foreach ($Categorys as $key => $value) {
            $refl = new \ReflectionClass(category::class);
            $Category = $refl->newInstanceWithoutConstructor();
            $Category->name = $value["name"];
            $array[] = $Category;
        }

        return $array;

    }
    
    public function GetCategory($CategoryID){

        $Category = R::getAll( 'SELECT * FROM category WHERE id = :id',
            [':id' => $CategoryID]
    );
        return $Category;
    }
}