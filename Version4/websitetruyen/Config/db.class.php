<?php
class Db
{
    //biến kết nối CSDL
    protected static $connection;
    //hàm khởi tạo kết nối
    public function connect()
    {
        //kết nối tới CSDL trong trường hợp kết nối chưa được khởi tạo
        if (!isset(self::$connection))
        {
            //Lấy thông tin kết nối từ tập tin config.ini_alter
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);
        }
        //xử lý lỗi nếu không kết nối được tới CSDL
        if (self::$connection == false)
        {
            //xử lý ghi file tại đây
            return FALSE;
        }
        return self::$connection;
    }
    //hàm thực hiện xử lý câu lệnh truy vấn
    public function query_execute($queryString)
    {
        //khởi tạo kết nối
        $connection = $this->connect();
        //thực hiện excute truy vấn
        $connection->query("SET NAMES utf-8");
        $result = $connection->query($queryString);
        // $connection->close();
        return $result;
    }
    public function insert_id($queryString)
    {
        $connection= $this->connect();
        $result = $connection->query($queryString);
        if($result===TRUE)
        {
            $last_id=$connection->insert_id;
        }
        return $last_id;
    }
    //hàm thực hiện trở về một mảng danh sách kết quả
    public function select_to_array($queryString)
    {
        $rows = array();
        $result = $this->query_execute($queryString);
        if ($result == false)
            return false;
        while ($item = $result->fetch_assoc())
        {
            $rows[] = $item;
        }
        return $rows;
    }
}
?>