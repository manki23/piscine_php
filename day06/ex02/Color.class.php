<?php
class Color {
    private $_red;
    private $green;
    private $blue;
    public static $verbose = False;

    public function __construct( array $kwargs )
    {
        if (array_key_exists('rgb', $kwargs))
        {
            $str = strval(dechex($kwargs['rgb']));
            $i = 0;
            $len = strlen($str);
            while ($i < 6 - $len)
            {
                $str = "0".$str;
                $i++;
            }
            $this->_blue = intval(hexdec(substr($str, -2)));
            $this->_green = intval(hexdec(substr($str, -4, 2)));
            $this->_red = intval(hexdec(substr($str, 0, 2)));
            if (self::$verbose)
                print('Color( red: ' . sprintf("%3s", $this->_red) .', green: '. sprintf("%3s", $this->_green). ', blue: '. sprintf("%3s", $this->_blue) .' ) constructed.'. PHP_EOL);
        }
        else if ($kwargs['red'] !== NULL && $kwargs['green'] !== NULL
        && $kwargs['blue'] !== NULL)
        {
            $this->_red = intval(round($kwargs['red']));
            $this->_green = intval(round($kwargs['green']));
            $this->_blue = intval(round($kwargs['blue']));
            if (self::$verbose)
                print('Color( red: ' . sprintf("%3s", $this->_red) .', green: ' . sprintf("%3s", $this->_green)     . ', blue: '. sprintf("%3s", $this->_blue) .' ) constructed.'.PHP_EOL);
        }
        else {
            $this->_red = 255;
            $this->_green = 255;
            $this->_blue = 255;
        }
    }
    public function __destruct()
    {
        if (self::$verbose)
            print('Color( red: ' . sprintf("%3s", $this->_red) .', green: ' . sprintf("%3s", $this->_green)     . ', blue: '. sprintf("%3s", $this->_blue) .' ) destructed.'.PHP_EOL);
    }
    public function __toString()
    {
         return('Color( red: ' . sprintf("%3s", $this->_red) .', green: ' . sprintf("%3s", $this->_green) . ', blue: '. sprintf("%3s", $this->_blue) .' )');
    }
    public function add( $color )
    {
        $elem = new Color( array( 'red' => $this->_red + $color->getRed(), 'green' => $this->_green + $color->getGreen(), 'blue' => $this->_blue + $color->getBlue()));
        return ($elem);
    }
    public function sub( $color )
    {
        return (new Color( array( 'red' =>$this->_red - $color->getRed(), 'green' => $this->_green - $color->getGreen(), 'blue' => $this->_blue - $color->getBlue())));
    }
    public function mult( $f)
    {
        return (new Color( array( 'red' =>$this->_red * $f, 'green' => $this->_green * $f, 'blue' => $this->_blue * $f)));
    }
    //getters:
    public function getRed() {
        return ($this->_red);
    }
    public function getGreen() {
        return ($this->_green);
    }
    public function getBlue() {
        return ($this->_blue);
    }
    //setters:
    public function setRed( $red ) {
        $this->_red = $red;
    }
    public function setGreen( $green ) {
        $this->_green = $green;
    }
    public function setBlue( $blue ) {
        $this->_blue = $blue;
    }
    static function doc()
    {
        return (file_get_contents('Color.doc.txt'));
    }
    private static function ft_error($msg) {
        echo "ERROR: ".$msg."\n";
        exit(-1);
    }
}
?>