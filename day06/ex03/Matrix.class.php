<?php
class Matrix {
    public static $verbose = False;
    const IDENTITY = "IDENTITY";
    const SCALE = "SCALE";
    const RX = "Ox ROTATION";
    const RY = "Oy ROTATION";
    const RZ = "Oz ROTATION";
    const TRANSLATION = "TRANSLATION";
    const PROJECTION = "PROJECTION";
    public $x;
    public $y;
    public $z;
    public $w;

    //Constructor:
    public function __construct( array $kwargs )
    {
        if ($this->ft_check_args($kwargs))
        {
            $this->ft_init();
            if ($kwargs['preset'] == self::IDENTITY)
                $this->ft_identity( 1.0 );
            else if ($kwargs['preset'] == self::SCALE)
                $this->ft_identity( $kwargs['scale'] );
            else if ($kwargs['preset'] == self::TRANSLATION)
                $this->ft_translation( $kwargs );
            else if ($kwargs['preset'] == self::RX)
                $this->ft_rotationx( $kwargs );
            else if ($kwargs['preset'] == self::RY)
                $this->ft_rotationy( $kwargs );
            else if ($kwargs['preset'] == self::RZ)
                $this->ft_rotationz( $kwargs );
            else if ($kwargs['preset'] == self::PROJECTION)
                $this->ft_projection( $kwargs );
            if (self::$verbose)
                $this->ft_print_matrix( $kwargs );
        }
        else {
            $this->ft_error("Wrong arguments.");
        }
            
    }

    private function ft_init()
    {
        $this->x = array('vtcX' => 0.0, 'vtcY' => 0.0, 'vtcZ' => 0.0, 'vtcO' => 0.0);
        $this->y = array('vtcX' => 0.0, 'vtcY' => 0.0, 'vtcZ' => 0.0, 'vtcO' => 0.0);
        $this->z = array('vtcX' => 0.0, 'vtcY' => 0.0, 'vtcZ' => 0.0, 'vtcO' => 0.0);
        $this->w = array('vtcX' => 0.0, 'vtcY' => 0.0, 'vtcZ' => 0.0, 'vtcO' => 0.0);
    }

    private function ft_identity( $value )
    {
        $this->x['vtcX'] = $value;
        $this->y['vtcY'] = $value;
        $this->z['vtcZ'] = $value;
        $this->w['vtcO'] = 1.0;
    }

    private function ft_translation( $kwargs ) {
        $this->ft_identity( 1.0 );
        $this->x['vtcO'] = $kwargs['vtc']->getX();
        $this->y['vtcO'] = $kwargs['vtc']->getY();
        $this->z['vtcO'] = $kwargs['vtc']->getZ();
    }

    private function ft_rotationx( $kwargs ) {
        $this->ft_identity( 1.0 );
        $this->y['vtcY'] = cos($kwargs['angle']);
        $this->y['vtcZ'] = -sin($kwargs['angle']);
        $this->z['vtcY'] = sin($kwargs['angle']);
        $this->z['vtcZ'] = cos($kwargs['angle']);
    }

    private function ft_rotationy( $kwargs ) {
        $this->ft_identity( 1.0 );
        $this->x['vtcX'] = cos($kwargs['angle']);
        $this->x['vtcZ'] = sin($kwargs['angle']);
        $this->y['vtcY'] = 1;
        $this->z['vtcX'] = -sin($kwargs['angle']);
        $this->z['vtcZ'] = cos($kwargs['angle']);
    }

    private function ft_rotationz( $kwargs ) {
        $this->ft_identity( 1.0 );
        $this->x['vtcX'] = cos($kwargs['angle']);
        $this->x['vtcY'] = -sin($kwargs['angle']);
        $this->y['vtcX'] = sin($kwargs['angle']);
        $this->y['vtcY'] = cos($kwargs['angle']);
        $this->z['vtcZ'] = 1;
    }

    private function ft_projection( $kwargs ) {
        $this->ft_identity( 1.0 );
        $this->y['vtcY'] = 1 / tan(0.5 * deg2rad($kwargs['fov']));
        $this->x['vtcX'] = $this->y['vtcY'] / $kwargs['ratio'];
        $this->z['vtcZ'] = -1 * ((-$kwargs['near'] - $kwargs['far']) / ($kwargs['near'] - $kwargs['far']));
        $this->w['vtcZ'] = -1;
        $this->z['vtcO'] = (2 * $kwargs['near'] * $kwargs['far']) / ($kwargs['near'] - $kwargs['far']);
        $this->w['vtcO'] = 0;
    }

    private function ft_check_args( array $kwargs)
    {
        if (!array_key_exists('preset', $kwargs))
            return FALSE;
        if ($kwargs['preset'] == self::SCALE && !array_key_exists('scale', $kwargs))
            return FALSE;
        if (($kwargs['preset'] == self::RX || $kwargs['preset'] == self::RY
        || $kwargs['preset'] == self::RZ) && !array_key_exists('angle', $kwargs))
            return FALSE;
        if ($kwargs['preset'] == self::TRANSLATION && !array_key_exists('vtc', $kwargs))
            return FALSE;
        if ($kwargs['preset'] == self::PROJECTION && (!array_key_exists('fov', $kwargs)
        || !array_key_exists('ratio', $kwargs) || !array_key_exists('near', $kwargs)
        || !array_key_exists('far', $kwargs)))
            return FALSE;
        return TRUE;
    }

    private function ft_print_matrix( $kwargs )
    {
        if (Self::$verbose) {
            if ($this->_preset == Self::IDENTITY)
                echo "Matrix " . $kwargs['preset'] . " instance constructed\n";
            else
                echo "Matrix " . $kwargs['preset'] . " preset instance constructed\n";
        }
        echo "M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\nx";
        foreach ($this->x as $key=>$vtc)
            echo " | ".sprintf("%.2f", $vtc);
        echo "\ny";
        foreach ($this->y as $key=>$vtc)
            echo " | ".sprintf("%.2f", $vtc);
        echo "\nz";
        foreach ($this->z as $key=>$vtc)
            echo " | ".sprintf("%.2f", $vtc);
        echo "\nw";
        foreach ($this->w as $key=>$vtc)
            echo " | ".sprintf("%.2f", $vtc);
        echo "\n";
    }

    
    //Destructor:
    public function __destruct()
    {
        if (self::$verbose)
            printf("Matrix instance destructed\n");
    }
    //toString:
    public function __toString()
    {
        $str = '';
        return ($str);
    }
    //methods:
   
    //getters:

    //setters:
    
    static function doc()
    {
        return (file_get_contents('Matrix.doc.txt'));
    }
    private static function ft_error($msg) {
        echo "ERROR: ".$msg."\n";
        exit(-1);
    }
}
?>