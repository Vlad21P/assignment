<?php

class Book extends ProductAppearance
{      
    public function setWeight($w)
    {
        $this->weight = 'Weight: '.htmlspecialchars(trim($w),
                    ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
    }     
    
    private function getWeight()
    {
        return $this->weight;
    }
    
    public function insert()
    {
        $mysqli = new mysqli(self::SERVER, self::USERNAME, 
            self::PASSWORD, self::DBNAME);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $one = $mysqli->real_escape_string($this->getSku());
        $two = $mysqli->real_escape_string($this->getName());
        $three = $mysqli->real_escape_string($this->getPrice());
        $four = $mysqli->real_escape_string($this->getWeight());
        $a = [' ', ' ', ' ', ' ']; // filler
        $sql = "INSERT INTO products (sku, name, price, size, weight, height, "
                . "width, length) VALUES (?,?,?,?,?,?,?,?) "
                . "ON DUPLICATE KEY UPDATE price=price+1";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('ssssssss', $one, $two, $three, $a[0], $four, $a[1], $a[2], $a[3]);
        $stmt->execute();
        $mysqli->close();
    }  
    
    public function delete() 
    {
        foreach ($this->getDeletes() as $del) {
            $mysqli = new mysqli(self::SERVER, self::USERNAME, 
                self::PASSWORD, self::DBNAME);
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $del_query = "DELETE FROM products WHERE sku = ?";
            $stmt = $mysqli->stmt_init();
            $stmt->prepare($del_query);
            $stmt->bind_param('s', $del);
            $stmt->execute();
            $mysqli->close();
        }

    }
}

