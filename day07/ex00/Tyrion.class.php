<?PHP

class Tyrion extends Lannister {
    //Constructor:
    public function __construct()
    {
        parent::__construct();
        print("My name is Tyrion" . PHP_EOL);
    }
    public function getSize() {
		return "Short";
	}
}
?>