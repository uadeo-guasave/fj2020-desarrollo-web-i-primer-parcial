<?php
class MyConnection extends mysqli {
    public function __construct() {
        // host, user, passwd, dbname, port
        parent::__construct('127.0.0.1', 'demo', '123', 'demo', 3308);
    }
}
