<?php
 namespace Source\Core;

 use Source\Core\BTextFile;
 use Source\Support\BEmail;

 class BLoger{

    private $data;
    private $email;
    private $date;
    private $path;
    private $destEmail;
    private $destName;

    public function __construct($path=null)
    {
        $this->path = is_null($path) ? "arquivo.txt": $path;
        $this->date = date("Y-m-d H:i:s");
    }

    function set(string $texto){
        $ser = $_SERVER['REMOTE_ADDR'];
        $this->data[] = "[{$this->date} | $ser] - {$texto}";
        return $this;
    }

    function get(){
        return $this->data;
    }

    function json($email=false)
    {
       //todo
    }

    function txt($email=false)
    {
        $date = date("d/m/Y H:i:s", strtotime($this->date));
        $txt = (new BTextFile($this->path, $this->data))->build();
        if($txt){
            return $txt;
        }
    }

 }