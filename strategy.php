<?php
/***
 *  поведенческий шаблон
 *  strategy
 *  определяет подение
 *
 */


function foo($a, $b){
    if($a == $b) return 0;
    return $a<$b ? 1 : -1;
}


$a = [3,2,5,6,1];
usort($a,"foo");

var_dump($a);

interface Strategy{
    function doOperation($n1,$n2);
}

class Add implements Strategy{

    function doOperation($n1,$n2)
    {
        return $n1+$n2;
    }

}

class Sub implements Strategy{

    function doOperation($n1,$n2)
    {
        return $n1-$n2;
    }

}

class Mult implements Strategy{

    function doOperation($n1,$n2)
    {
        return $n1*$n2;
    }

}

class Context{

    private $s;

    function __construct(Strategy $s)//тайп хинтинг
    {
        $this->s = $s;
    }

    function execute($n1,$n2){
        return $this->s->doOperation($n1,$n2);
    }

}

$c = new Context(new Mult);

echo $c->execute(8,5);