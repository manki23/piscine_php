<?php
class Vector {
    private $_x;
    private $_y;
    private $_z;
    private $_w;
    public static $verbose = False;

    //Constructor:
    public function __construct( array $kwargs )
    {
        if (array_key_exists('dest', $kwargs))
        {
            if (array_key_exists('orig', $kwargs))
                $vertex = $kwargs['orig'];
            else
                $vertex = new Vertex ( array ('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
            $this->_x = $kwargs['dest']->getX() - $vertex->getX();
            $this->_y = $kwargs['dest']->getY() - $vertex->getY();
            $this->_z = $kwargs['dest']->getZ() - $vertex->getZ();
            $this->_w = $kwargs['dest']->getW() - $vertex->getW();

            if (self::$verbose)
                print('Vector( x:' . sprintf("%.2f", $this->_x) .', y:'. sprintf("%.2f", $this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w) . ' ) constructed'.PHP_EOL);
        }
        else {
            $this->ft_error("Wrong arguments.");
        }
            
    }
    //Destructor:
    public function __destruct()
    {
        if (self::$verbose)
            print('Vector( x:' . sprintf("%.2f", $this->_x) .', y:'. sprintf("%.2f", $this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).' ) destructed'.PHP_EOL);
    }
    //toString:
    public function __toString()
    {
        $str = 'Vector( x:' . sprintf("%.2f", $this->_x) .', y:'. sprintf("%.2f", $this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w);
        return ($str.' )');
    }
    //methods:
    public function magnitude() {
        $norme = sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
        return $norme;
    }
    public function normalize() {
        $norme = $this->magnitude();
        $vertex = new Vertex(['x' => $this->_x / $norme, 'y' => $this->_y / $norme, 'z' => $this->_z / $norme]);
        return ( new Vector(['dest' => $vertex]));
    }
    public function add( Vector $rhs ) {
        $vertex = new Vertex( array('x' => ($this->_x + $rhs->getX()), 'y' => ($this->_y + $rhs->getY()), 'z' => ($this->_z + $rhs->getZ())));
        $vector = new Vector( array( 'dest' => $vertex));
        return $vector;
    }
    public function sub( Vector $rhs ) {
        $vertex = new Vertex( array('x' => ($this->_x - $rhs->getX()), 'y' => ($this->_y - $rhs->getY()), 'z' => ($this->_z - $rhs->getZ())));
        $vector = new Vector( array( 'dest' => $vertex));
        return $vector;
    }
    public function opposite() {
        $vertex = new Vertex( array('x' => ($this->_x * -1), 'y' => ($this->_y * -1), 'z' => ($this->_z * -1)));
        $vector = new Vector( array( 'dest' => $vertex));
        return $vector;
    }
    public function scalarProduct( $k ) {
        $vertex = new Vertex( array('x' => ($this->_x * $k), 'y' => ($this->_y * $k), 'z' => ($this->_z * $k)));
        $vector = new Vector( array( 'dest' => $vertex));
        return $vector;
    }
    public function dotProduct( Vector $rhs ) {
        return ( $this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->getZ() * $rhs->getZ() );
    }
    public function cos( Vector $rhs ) {
        return ( $this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude()));
    }
    public function crossProduct(Vector  $rhs ) {
        $x = $this->_y * $rhs->_z - $this->_z * $rhs->_y;
        $y = $this->_z * $rhs->_x - $this->_x * $rhs->_z;
        $z = $this->_x * $rhs->_y - $this->_y * $rhs->_x;
        $vertex = new Vertex (array('x' => $x, 'y' => $y, 'z' => $z));
        $vector = new Vector(array('dest' => $vertex));
        return $vector;
    }
    //getters:
    public function getX() {
        return ($this->_x);
    }
    public function getY() {
        return ($this->_y);
    }
    public function getZ() {
        return ($this->_z);
    }
    public function getW() {
        return ($this->_w);
    }
    static function doc()
    {
        return (file_get_contents('Vector.doc.txt'));
    }
    private static function ft_error($msg) {
        echo "ERROR: ".$msg."\n";
        exit(-1);
    }
}
?>