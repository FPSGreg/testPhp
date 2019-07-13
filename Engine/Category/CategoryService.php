<?php


namespace Engine\Category;
use Engine\Category\CategoryRepository;

class CategoryService{

    public $CategoryRepository;

    public function __construct(){

        $this->CategoryRepository = new CategoryRepository;
    }


    public function CreateACategory(string $categorys){

        $this->CategoryRepository->CategoryCreate($categorys);

    }

    public function DeleteACategory(int $id){

        $this->CategoryRepository->CategoryDelete($id);

    }

    public function GetAllCategory(){

        return $this->CategoryRepository->GetAll();
        

    }

    public function GetThisCategory(int $id){

        return $this->CategoryRepository->GetCategory($id);
         
    }

}