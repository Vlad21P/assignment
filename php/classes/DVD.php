<?php

class DVD extends ProductAppearance
{      
    public function setSize($s2)
    {
        $this->size = 'Size: '.htmlspecialchars(trim($s2),
                    ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
    } 
    
    private function getSize()
    {
        return $this->size;
    }
    
    public function insert()
    {
        $mysqli = new mysqli(self::SERVER, self::USERNAME, 
            self::PASSWORD, self::DBNAME);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $one = $mysqli->real_escape_string($this->getSku());
        $two = $mysqli->real_escape_string($this->getName());
        $three = $mysqli->real_escape_string($this->getPrice());
        $four = $mysqli->real_escape_string($this->getSize());
        $a = [' ', ' ', ' ', ' ']; // filler
        $sql = "INSERT INTO products (sku, name, price, size, weight, height, "
                . "width, length) VALUES (?,?,?,?,?,?,?,?) "
                . "ON DUPLICATE KEY UPDATE price=price+1";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('ssssssss', $one, $two, $three, $four, $a[0], $a[1], $a[2], $a[3]);
        $stmt->execute();
        $mysqli->close();
    }        
    
    public function delete() 
    {
        foreach ($this->getDeletes() as $d) {
            $mysqli = new mysqli(self::SERVER, self::USERNAME, 
                self::PASSWORD, self::DBNAME);
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $del_query = "DELETE FROM products WHERE sku = ?";
            $stmt = $mysqli->stmt_init();
            $stmt->prepare($del_query);
            $stmt->bind_param('s', $d);
            $stmt->execute();
            $mysqli->close();
        }
    }
}
