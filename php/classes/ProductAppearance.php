<?php

class ProductAppearance extends Product
{
    public function select()
    {   
        $mysqli = new mysqli(self::SERVER, self::USERNAME, 
            self::PASSWORD, self::DBNAME);
        if ($mysqli->connect_errno) {
	    exit();
	}
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $sql = "SELECT * FROM products ORDER BY sku";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $num = 0;
            while ($row = $result->fetch_assoc()) {
                $_SESSION['products'][$num] = $row;
                $num++;
            }
            return true;
        } 
        $mysqli->close();
    }
    
    public function insert() {}
    
    public function delete() {}
}
