<?php 

class Shapes {

}

class Rectangle extends Shapes {

    private float $height;
    private float $width;

    public function __construct(float $height, float $width){
        $this->height = $height;
        $this->width  = $width; 
    }

    public function area(){
        return round($this->height * $this->width,2);
    }
}


class Circle extends Shapes {
    private float $radius;

    public function __construct(float $radius){
        $this->radius = $radius;
    }

    public function area(){
        return round(pi() * $this->radius * $this->radius,2);
    }
}


$rec = new Rectangle(5.14, 2.65);
echo "</br> Rectangle area is : ".$rec->area();

$circle = new Circle(2);
echo "</br> Circle area is :".$circle->area();