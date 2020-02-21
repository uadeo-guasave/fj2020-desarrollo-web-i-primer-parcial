<?php
class MyConnection extends mysqli {
    public function __construct() {
        parent::__construct('127.0.0.1', 'root', '123', 'demo', 3308);
    }
}
