<?php

abstract class Product
{   
    protected $sku;
    protected $name;
    protected $price;
    protected $size;
    protected float $weight;
    protected float $height;
    protected float $width;
    protected float $length;
    protected array  $deletes;
    protected const SERVER    = 'localhost';
    protected const DBNAME    = 'abc';
    protected const USERNAME  = 'root';
    protected const PASSWORD  = 'root';
    
    public function dbConnect() {
    	$mysqli = new mysqli(self::SERVER, self::USERNAME, 
            self::PASSWORD, self::DBNAME);
        if ($mysqli->connect_errno) {
	    exit();
	}
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $sql = "CREATE TABLE IF NOT EXISTS products ("
                                        ."sku varchar(255) NOT NULL, "
                                        ."name varchar(255) NOT NULL, "
                                        ."price varchar(255) NOT NULL, "
                                        ."size varchar(255) NOT NULL, "
                                        ."weight varchar(255) NOT NULL, "
                                        ."height varchar(255) NOT NULL, "
                                        ."width varchar(255) NOT NULL, "
                                        ."length varchar(255) NOT NULL"
                                      .") ENGINE=InnoDB DEFAULT CHARSET=utf8";
        $mysqli->query($sql);
        $mysqli->close();
    }
    
    public function uniqueSku()
    {
        $mysqli = new mysqli(self::SERVER, self::USERNAME, 
            self::PASSWORD, self::DBNAME);
        if ($mysqli->connect_errno) {
	    exit();
	}
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $sql = "ALTER TABLE products ADD UNIQUE(sku)";
        $mysqli->query($sql);
        $mysqli->close();
    }

    public function setSku($s) 
    {
        $this->sku = htmlspecialchars(trim($s),
                ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
    }   
        
    protected function getSku()
    {
        return $this->sku;
    }
    
    public function setName($n)
    {
        $this->name = htmlspecialchars(trim($n),
                ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
    }
            
    protected function getName()
    {
        return $this->name;
    }
    
    public function setPrice($p)
    {
        $this->price = htmlspecialchars(trim($p),
                ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
    }   
    
    protected function getPrice()
    {
        return $this->price;
    }
    
    public function setDeletes(array $post)
    {
        $this->deletes = $post;
    }
    
    private function getDeletes()
    {
       return $this->deletes; 
    }

    abstract public function insert();
    
    abstract public function delete();
}

