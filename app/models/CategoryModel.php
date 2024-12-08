
<?php

class CategoryModel {
    private $conn;
    private $table_name = "categories";

    public function __construct($db) {
        $this->conn = $db;
    }

    function readAll() {
        $query = "SELECT id, name FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function countCategory() {
        $query = "SELECT c.*, COUNT(p.id) AS count
        FROM demo.categories c
        JOIN demo.products p ON c.id = p.category_id
        GROUP BY c.id
        ORDER BY COUNT(p.id);";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    function createCategory($name)
    {
        // Kiểm tra ràng buộc đầu vào
        $errors = [];
        if (empty($name)) {
            $errors['name'] = 'Tên danh mục không được để trống';
        }

        if (count($errors) > 0) {
            return $errors;
        }

        // Truy vấn tạo danh mục mới

        $query = "INSERT INTO " . $this->table_name . " (name) VALUES (:name)";
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $name = htmlspecialchars(strip_tags($name));

        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':name', $name);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function getCategoryById($id){

        $query = "SELECT * FROM " . $this->table_name . " where id = $id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function updateCategory($id, $name){

        $query = "UPDATE " . $this->table_name . " SET name=:name WHERE id=:id";

        $stmt = $this->conn->prepare($query);
        // Làm sạch dữ liệu
        $name = htmlspecialchars(strip_tags($name));
        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    function deleteCategoryById($id) {
        try {
            // Xóa các sản phẩm liên quan đến danh mục
            $query = "DELETE FROM products WHERE category_id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
    
            // Xóa danh mục
            $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
    
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Error deleting category: " . $e->getMessage());
        }
    }
    
}