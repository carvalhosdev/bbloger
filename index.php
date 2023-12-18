<?php 
    include_once 'vendor/autoload.php';

    use Source\Core\BLoger;

    $filename = "log/arquivo.txt";
    $log = (new BLoger($filename))->set("Bosta2")->set("bosta3")->txt(true);
    var_dump($log);
    
  
