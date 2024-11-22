<div class="row">
          <div class="row fretitle">
            <h1>DANH SÁCH SẢN PHẨM</h1>
          </div>
          <div class="row framcontent">
            <div class="row mb10 dsloai">
              <table>
                <tr>
                  <th></th>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Mô tả</th>
                  <th></th>
                </tr>
                <?php 
                foreach($listcategory as $sanpham){
                    extract($sanpham);
                    $suasp="index.php?act=suasp&product_id=".$product_id;
                    $xoasp="index.php?act=xoasp&product_id=".$product_id;
                    echo '<tr>
                  <td><input type="checkbox" name="" id=""></td>
                  <td>'.$product_id.'</td>
                  <td>'.$name.'</td>
                  <td>'.$price.'</td>
                  <td>'.$description.'</td>
                  <td>'.$category_id .'</td>
                  <td>'.$created_at.'</td>
                  <td>'.$updated_at.'</td>
                  <td> <a href="'.$suasp.'"><input type="button" value="Sửa"></a><a href="'.$xoasp.'"><input type="button" value="Xóa"></a></td>
                </tr>';
                }
                

                ?>
                
              </table>
              <a href="index.php?act=adddm"><input style="cursor: pointer" type="submit" value="Thêm danh mục"></a>
            </div>

          </div>
        </div>