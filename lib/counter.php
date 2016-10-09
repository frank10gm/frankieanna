<?php

interface DataProvider
{
    public function storeVisits($visits);
    public function readVisits();
}

class FileDataProvider implements DataProvider
{
    const FILE_PATH = 'counter.txt';
   
    private $fp;
   
    public function __construct()
    {
        if(!file_exists(FileDataProvider::FILE_PATH))
        {
            $fp = fopen(FileDataProvider::FILE_PATH, 'w+');
            fwrite($fp, '0');
            fclose($fp);
        }
       
        $this->fp = fopen(FileDataProvider::FILE_PATH, 'r+');
    }

    public function readVisits()
    {
        return intval(file_get_contents(FileDataProvider::FILE_PATH));
    }
   
    public function storeVisits($visits)
    {
        ftruncate($this->fp, 0);
        fseek($this->fp, 0);
        fwrite($this->fp, strval($visits));
    }
   
    public function __destruct()
    {
        fclose($this->fp);
    }
}

class SimpleCounter
{
    private $provider;
   
    public $visits;
   
    public function __construct(DataProvider $provider)
    {
        $this->provider = $provider;
        $this->visits = $this->provider->readVisits();
        if($this->isValid())
        {
            $this->provider->storeVisits(++$this->visits);
        }
    }
   
    protected function isValid()
    {
        return true;
    }
}

?>