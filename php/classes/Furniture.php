<?php

class Furniture extends ProductAppearance
{      
    public function setHeight($h)
    {   
        $this->height = 'Dimensions: '.htmlspecialchars(trim($h),
                    ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
    }
    
    private function getHeight()
    {
        return $this->height;
    }
    
    public function setWidth($w2)
    {
        $this->width = '/'.htmlspecialchars(trim($w2),
                ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
    }
    
    private function getWidth()
    {
        return $this->width;
    }
    
    public function setLength($l)
    {
        $this->length = '/'.htmlspecialchars(trim($l),
                ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
          
    } 
    
    private function getLength()
    {
        return $this->length;
    }
    
    public function insert()
    {
        $mysqli = new mysqli(self::SERVER, self::USERNAME, 
            self::PASSWORD, self::DBNAME);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $one = $mysqli->real_escape_string($this->getSku());
        $two = $mysqli->real_escape_string($this->getName());
        $three = $mysqli->real_escape_string($this->getPrice());
        $four = $mysqli->real_escape_string($this->getHeight());
        $five = $mysqli->real_escape_string($this->getWidth());
        $six = $mysqli->real_escape_string($this->getLength());
        $a = [' ', ' ']; // filler
        $sql = "INSERT INTO products (sku, name, price, size, weight, height, "
."width, length) VALUES (?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE size=size+1";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('ssssssss', $one, $two, $three, $a[0], $a[1], $four, $five, $six);
        $stmt->execute();
        $mysqli->close();
    }     
  
    public function delete() 
    {
        foreach ($this->getDeletes() as $delete) {
            $mysqli = new mysqli(self::SERVER, self::USERNAME, 
                self::PASSWORD, self::DBNAME);
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $del_query = "DELETE FROM products WHERE sku = ?";
            $stmt = $mysqli->stmt_init();
            $stmt->prepare($del_query);
            $stmt->bind_param('s', $delete);
            $stmt->execute();
            $mysqli->close();
        }
    }
}

