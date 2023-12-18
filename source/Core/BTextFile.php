<?php 
 namespace Source\Core;

 class BTextFile{

    private $path;
    private $data;
    private $file;
    private $fileName;
    private $message;

    public function __construct($path, $data=array())
    {
        $this->path = $path;
        $this->data = $data;
        $this->checkFile($this->path);
        $this->file = fopen($this->path, 'a');

    }

    private function checkFile($path)
    {
        $pathArr = explode("/", $path);
        $filename= end($pathArr);
        array_pop($pathArr);
        $directory = implode("/" , $pathArr) . "/";
        
        if(!file_exists($directory)){
            mkdir($directory, 0777, true);
            chmod($directory, 0777);
        }else{
            chmod($path, 0777);
        }
        $this->fileName = $filename;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function build(): bool
    {
        if (is_writable($this->path)) 
        {
            if (!$this->file = fopen($this->path, 'a')) {
                $this->message =  "Não foi possível abrir o arquivo ($this->path)";
                return false;
            }
            
            $text = implode(PHP_EOL, $this->data);
            if (fwrite($this->file, $text . PHP_EOL) === FALSE) {
                $this->message =  "Não foi possível escrever no arquivo ($this->path)";
                return false;
            }

            $this->message = "Arquivo salvo com sucesso!";
            fclose($this->file);
            return true;


        }else{
            $this->message = "O arquivo não pode ser alterado";
            return false;
        }

    }



 }