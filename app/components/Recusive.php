<?php
    namespace App\components;
    
    class Recusive{
        private $data;
        private $html='';
        public function __construct($data)
        {
            $this->data=$data;
        }
        public function IDcategory(){
            
            foreach($this->data as $value)
            {
                $this->html .="<option>".$value['name']."</option>";
            }
            return $this->html;
        }
    }

    
?>