<?PHP
class NightsWatch implements IFighter {
    private $array;

	public function recruit( $p )
	{
		if ($p instanceof IFighter)
		{
			$this->array[] = $p;
		}
	}
	public function fight()
	{
		foreach ($this->array as $key=>$value) {
			$value->fight();
		}
	}
}
?>