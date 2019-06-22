<?php


namespace Engine\Category;
use Engine\Category\CategoryRepository;

class CategoryService{

    public function CreateACategory(){

        $CategoryRepository = new CategoryRepository;
        $CategoryRepository->CategoryCreate();
    }