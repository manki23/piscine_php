<?PHP
abstract class House {

    abstract function getHouseName();
    abstract function getHouseMotto();
    abstract function getHouseSeat();

    public function introduce() {
        print("House ". static::getHouseName() ." of ". static::getHouseSeat() ." : \"". static::getHouseMotto() ."\"\n");
    }
}
?>