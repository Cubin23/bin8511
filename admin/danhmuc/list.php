<style>
    .row {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
  }
  
  /* Tiêu đề bảng */
  .fretitle h1 {
    font-size: 24px;
    text-align: center;
    color: #333;
    margin-bottom: 20px;
  }
  
  /* Khung chứa bảng */
  .framcontent {
    width: 100%;
    overflow-x: auto; /* Cho phép cuộn ngang nếu bảng quá rộng */
  }
  
  .dsloai table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 10px;
  }
  
  .dsloai th,
  .dsloai td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ccc;
  }
  
  .dsloai th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: #333;
  }
  
  .dsloai td {
    background-color: #ffffff;
  }
  
  /* Style cho các hàng xen kẽ */
  .dsloai tr:nth-child(even) td {
    background-color: #f9f9f9;
  }
  
  /* Style cho checkbox và các nút */
  .dsloai input[type="checkbox"] {
    width: 16px;
    height: 16px;
  }
  
  .dsloai input[type="button"] {
    padding: 5px 10px;
    margin: 0 5px;
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
  }
  
  .dsloai input[type="button"]:hover {
    background-color: #45a049;
  }
  
</style>

<div class="row">
          <div class="row fretitle">
            <h1>DANH SÁCH DANH MỤC</h1>
          </div>
          <div class="row framcontent">
            <div class="row mb10 dsloai">
              <table>
                <tr>
                  <th></th>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Mô tả</th>
                  <th></th>
                </tr>
                <?php 
                foreach($listcategory as $danhmuc){
                    extract($danhmuc);
                    $suadm="index.php?act=suadm&category_id=".$category_id;
                    $xoadm="index.php?act=xoadm&category_id=".$category_id;
                    echo '<tr>
                  <td><input type="checkbox" name="" id=""></td>
                  <td>'.$category_id.'</td>
                  <td>'.$name.'</td>
                  <td>'.$description.'</td>
                  <td> <a href="'.$suadm.'"><input type="button" value="Sửa"></a><a href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>
                </tr>';
                }
                

                ?>
                
              </table>
              <a href="index.php?act=adddm"><input style="cursor: pointer" type="submit" value="Thêm danh mục"></a>
            </div>

          </div>
        </div>