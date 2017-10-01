namespace Application;

trait Base {
    public function Module ($Module) {
        $Class = "\\Application\Module\" . $Module;
        return new $Class;
    }
}