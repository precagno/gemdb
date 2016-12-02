<?php namespace App\Custom;

    trait CustomTestMethods
    {
        
        public function mergeArrays($data=array(),$custom=array())
        {
            return array_merge($data,$custom);
        }
        
        public function madeCallAjax()
        {
            return
            [
                "X-Requested-With"=>"XMLHttpRequest",
            ];
        }
        
    }

