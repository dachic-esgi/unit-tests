<?php
class Calculatrice 
{
    public static function add($a, $b)
    {
        return (new self)->cast($a) + (new self)->cast($b);
    }
    public static function sub($a, $b){
        return (new self)->cast($a) - (new self)->cast($b);
    }
    public static function mul($a, $b){
        return (new self)->cast($a) * (new self)->cast($b);
    }
    public static function div($a, $b){
        if($b == 0)
            return "Divison par zéro impossible !";
        else
            return (new self)->cast((new self)->cast($a)) / (new self)->cast($b);
    }
    public static function avg($tab){
        // $numargs = func_num_args();
        $ind = count($tab);
        $som = array_sum($tab);
        return $som/$ind;
    }

    protected function cast($nb){
        return (int)$nb;
    }
}
