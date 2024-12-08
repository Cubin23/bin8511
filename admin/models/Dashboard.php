<?php
if (!function_exists('getSales')) {
    function getSales($year = '', $month = '', $day = '')
    {
        try {
            $sql = "SELECT SUM(tong_tien) as total
                    FROM `tb_don_hang`
                    WHERE id_tt = 6";

            if ($year != '') {
                $sql .= " AND YEAR(ngay_dat) = $year";
            }

            if ($month != '') {
                $sql .= " AND MONTH(ngay_dat) = $month";
            }

            if ($day != '') {
                $sql .= " AND DAY(ngay_dat) = $day";
            }

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('thong_ke_theo_ngay')) {
    function thong_ke_theo_ngay()
    {
        try {
            $sql = "SELECT SUM(tong_tien) AS total, ngay_dat, DAY(ngay_dat) AS day   
                    FROM`tb_don_hang`
                    WHERE id_tt = 6 
                    AND MONTH(ngay_dat) = MONTH(CURDATE())
                    AND YEAR(ngay_dat) = YEAR(CURDATE())
                    GROUP BY DAY(ngay_dat)
                    ORDER BY DAY(ngay_dat);";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('thong_ke_theo_thang')) {
    function thong_ke_theo_thang()
    {
        try {
            $sql = "SELECT SUM(tong_tien) AS total, DATE_FORMAT(ngay_dat, '%m') AS month
                    FROM `tb_don_hang`
                    WHERE YEAR(ngay_dat) = YEAR(CURDATE())
                    AND id_tt = 6
                    GROUP BY DATE_FORMAT(ngay_dat, '%m')
                    ORDER BY DATE_FORMAT(ngay_dat, '%m')";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('thong_ke_theo_nam')) {
    function thong_ke_theo_nam()
    {
        try {
            $sql = "SELECT  YEAR(ngay_dat) AS year, SUM(tong_tien) AS total
                    FROM `tb_don_hang`
                    WHERE YEAR(ngay_dat) - 5  AND id_tt = 6
                    GROUP BY YEAR(ngay_dat)
                    ORDER BY YEAR(ngay_dat);";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
