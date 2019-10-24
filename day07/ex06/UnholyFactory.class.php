<?php
class UnholyFactory
{
	private $fighter_array;
	private $fabricate;
	private $absorb;
    private $status;

    public function __construct() {
        $this->fighter_array = array();
        $this->fabricate = array();
    }

	public function absorb( $fighter )
	{
		if ($fighter instanceof Fighter)
		{
			if (in_array($fighter, $this->fighter_array))
				print("(Factory already absorbed a fighter of type ");
			else
			{
				print("(Factory absorbed a fighter of type ");
				$this->fighter_array[] =  $fighter;
			}
			print($fighter->getStatus() . ")" . PHP_EOL);
		}
		else
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
    }
    
	public function fabricate( $rf )
	{
		foreach ( $this->fighter_array as $key=>$value ) {
			if (strtolower(get_class($value)) == strtolower(str_replace(' ','',$rf)))
			{
				$new = clone $this->fighter_array[$key];
				print("(Factory fabricates a fighter of type " . $rf . ")". PHP_EOL);
				return ($new);
			}
		}
		print("(Factory hasn't absorbed any fighter of type ". $rf . ")". PHP_EOL);
	}
	public function fight( $t )
	{
		echo "OK";
		print_r($this->fabricate);
	}
}
?>