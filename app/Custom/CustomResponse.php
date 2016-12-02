<?php namespace App\Custom;

    trait CustomResponse
    {               
        private function json_response($state,$title,$message)
        {
            return response()->json(["state"=>$state,"title"=>$title,"message"=>$message]);
        }
        
        public function json_fail_response($title,$message)
        {
            return $this->json_response(false,$title,$message);
        }
        
        public function json_success_response($title,$message)
        {
            return $this->json_response(true,$title,$message);
        }    
    }