<?php

/**
 * 
 *  Patern factory
 * 
 *  
 * 
 */

interface Shape{
    
    function draw();

}

class Rectangle implements Shape{
    
    function draw()
    {
        echo __METHOD__.PHP_EOL;
    }
    
}

class Sqare implements Shape{

    function draw()
    {
        echo __METHOD__.PHP_EOL;
    }

}

class Circle implements Shape{

    function draw()
    {
        echo __METHOD__.PHP_EOL;
    }
}

//////////////////////////////////////////////////

class ShapeFactory{
    
    function getShape($type){
        $type = strtolower($type);
        if(!$type) return null;
        
        switch($type){
            case "r": return new Rectangle();
            case "s": return new Sqare();
            case "c": return new Circle();
            default: throw  new Exception("Wrong type !");
        }
        
    } // это и есть фабричный метод
}

//////////////////////////////

$f = new ShapeFactory();

$r = $f->getShape('r');
$s = $f->getShape('s');
$c = $f->getShape('c');

$r->draw();
$s->draw();
$c->draw();

