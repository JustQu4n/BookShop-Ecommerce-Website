<?php 

    use App\Models\Category;
    use App\Models\Brand; 

    function getCategory(){
        $db = new Category();
        $list = $db -> getListCategories();
        return $list;
    }


    function getBrands() {
        $db = new Brand();
        $list = $db -> getListBrands();
        return $list; 
    }

    


?>