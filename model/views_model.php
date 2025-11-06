<?php
class viewModel{
    protected static function get_view($view)
    {
         $white_list = ["home", "products", "users", "new-user", "categories","vista-producto", "update", "edit-producto", "edit-categoria", "categoria", "produc", "new-cliente", "new-proveedor", "proveedor", "cliente", "edit-client", "edit-proveedor"];
        if (in_array($view, $white_list)){
            if(is_file("./view/".$view.".php")){
                $content ="./view/".$view.".php";
        
            }else{
                $content = "404";
            }
        }elseif ($view == "login") {
            $content = "login";
        }else{
            $content = "404";
        }
        return $content;
    
    }
}



?>