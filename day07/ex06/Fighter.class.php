<?PHP
abstract class Fighter
{
    protected $_status;

    abstract function fight($k);
    	
	public function __construct( $status )
	{
		$this->_status = $status;
	}
	public function getStatus()
	{
		return ($this->_status);
	}
}
?>