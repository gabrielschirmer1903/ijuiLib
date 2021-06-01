<?php
    function checkPage($currentPage){
        if ($currentPage == 0){  
            $page = 1;
            return $page;  
        } else {  
            $page = $currentPage;  
            return $page;
        }
    }
