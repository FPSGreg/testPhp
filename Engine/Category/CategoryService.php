<?php


namespace Engine\Category;
use Engine\Category\CategoryRepository;

class CategoryService{

    public $CategoryRepository;

    // public function __construct(){

    //     $this->CategoryRepository = new CategoryRepository;
    // }


    public function CreateACategory(string $categorys){

        $Category = new Category($categorys);
        $CategoryRepository = new CategoryRepository;
        $CategoryRepository->CategoryCreate($Category);

    }
}