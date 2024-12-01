<?php 
function insert_products($tensp, $description, $price, $category_id) {
    $sql = "INSERT INTO products (name, description, price, category_id) 
            VALUES (:tensp, :description, :price, :category_id)";
    pdo_execute($sql, [
        ':tensp' => $tensp,
        ':description' => $description,
        ':price' => $price,
        ':category_id' => $category_id,
    ]);
}


function delete_products($product_id){
    $sql ="delete from sanpham where id=".$product_id;
    pdo_execute($sql);
}


function loadall_products(){
    $sql = "select * from products order by name";
    $listproduct = pdo_query($sql);
    return $listproduct;
}

function loadone_products($product_id){
    $sql = "select * from products where product_id=".$product_id;
    $dm=pdo_query_one($sql);
    return $dm;
}

function update_products($product_id, $tensp, $description, $category_id) {
    $sql = "UPDATE products SET name = :tensp, description = :description, category_id = :category_id WHERE product_id = :product_id";
    return pdo_execute($sql, [
        'product_id' => $product_id,
        'tensp' => $tensp,
        'description' => $description,
        'category_id' => $category_id
    ]);
}

?>