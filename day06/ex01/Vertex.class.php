<?php
class Vertex {
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    private $_color;
    public static $verbose = False;

    //Constructor:
    public function __construct( array $kwargs )
    {
        if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs)
        && array_key_exists('z', $kwargs))
        {
            $this->_x = $kwargs['x'];
            $this->_y = $kwargs['y'];
            $this->_z = $kwargs['z'];
            $this->_w = 1.0;
            if (array_key_exists('w', $kwargs))
                $this->_w = $kwargs['w'];
            if (array_key_exists('color', $kwargs))
                $this->_color = $kwargs['color'];
            else
                $this->_color = new Color( array ( 'rgb' => 0xffffff));
            if (self::$verbose)
                print('Vertex( x: ' . sprintf("%.2f", $this->_x) .', y: '. sprintf("%.2f", $this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).', ' . $this->_color .' ) constructed'.PHP_EOL);
        }
        else {
            $this->ft_error("Wrong arguments.");
        }
            
    }
    //Destructor:
    public function __destruct()
    {
        if (self::$verbose)
            print('Vertex( x: ' . sprintf("%.2f", $this->_x) .', y: '. sprintf("%.2f", $this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).', ' . $this->_color .' ) destructed'.PHP_EOL);
    }
    //toString:
    public function __toString()
    {
        $str = 'Vertex( x: ' . sprintf("%.2f", $this->_x) .', y: '. sprintf("%.2f", $this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w);
        if (self::$verbose)
            $str = $str.', '.$this->_color;
        return ($str.' )');
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
    public function getColor() {
        return ($this->_color);
    }
    //setters:
    public function setX( $x ) {
        $this->_x = $x;
    }
    public function setY( $y ) {
        $this->_y = $y;
    }
    public function setZ( $z ) {
        $this->_z = $z;
    }
    public function setW( $w ) {
        $this->_w = $w;
    }
    public function setColor( $kwargs ) {
        $this->_color = new Color ( $kwargs );
    }
    static function doc()
    {
        return (file_get_contents('Vertex.doc.txt'));
    }
    private static function ft_error($msg) {
        echo "ERROR: ".$msg."\n";
        exit(-1);
    }
}
?>