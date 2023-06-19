<?php
    class Pipeline
    {
     public static function make_pipeline()
     {
         $args       =   func_get_args();
         $function   =   function($arg) use ($args)
         {
             foreach($args as $function) {
                 if(!isset($value))
                     $value  =   $function($arg);
                 else
                     $value  =   $function($value);
             }
             return $value;
         };
         return $function;
     }
    }
 
    $fun = Pipeline::make_pipeline(
        function($x) { return $x * 3; }, 
        function($x) { return $x + 1; },         
        function($x) { return $x / 2; }
    );

    echo $fun(3); #print result
?>