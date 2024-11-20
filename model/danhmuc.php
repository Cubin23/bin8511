<?php 

function insert_categories($tensp,$description){
    $sql = "INSERT INTO categories (name, description) 
                            VALUES (:tensp, :description)";
    pdo_execute($sql, [
        ':tensp' => $tensp,
        ':description' => $description
    ]);
}

function delete_categories($category_id){
    $sql = "delete from categories where category_id=".$category_id; 
    pdo_execute($sql);
}

function loadall_categories(){
    $sql = "select * from categories order by name";
    $listcategory = pdo_query($sql);
    return $listcategory;
}

function loadone_categories($category_id){
    $sql = "select * from categories where category_id=".$category_id;
    $dm=pdo_query_one($sql);
    return $dm;
}

function update_categories($category_id, $tensp, $description) {
    $sql = "UPDATE categories SET name = :tensp, description = :description WHERE category_id = :category_id";
    return pdo_execute($sql, [
        'tensp' => $tensp,
        'description' => $description,
        'category_id' => $category_id
    ]);
}





?>