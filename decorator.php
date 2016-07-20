<?php


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
abstract class ShapeDecorator implements Shape{

    protected $decoratorShape;

    public function __construct(Shape $decoratorShape)
    {
        $this->decoratorShape = $decoratorShape;
    }

    function draw()
    {
        $this->decoratorShape->draw();
    }
}

class RedShapeDecorator extends ShapeDecorator{

    public function __construct(Shape $decoratorShape)
    {
       parent::__construct($decoratorShape);
    }

    private function setRedBorder(){
        echo 'BORDER RED'.PHP_EOL;
    }

    private function setTopRedBorder(){
        echo 'BORDER RED TOP'.PHP_EOL;
    }

    function draw()
    {
        $this->setTopRedBorder();
       $this->decoratorShape->draw();
        $this->setRedBorder();
    }
}

$c = new Circle();
$rc = new RedShapeDecorator(new Circle());

//$c->draw();
$rc->draw();