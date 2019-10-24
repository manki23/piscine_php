<?PHP
class Tyrion extends Lannister {
    public function with($p) {
        if (get_parent_class($p) !== "Lannister")
            return ("Let's do this.");
        else
            return ("Not even if I'm drunk !");
    }
}
?>