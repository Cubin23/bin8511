<?php

if (!function_exists('getUserClientByEmailAndPassword')) {
    function getUserClientByEmailAndPassword($email, $password)
    {
        try {
            $sql = "SELECT * FROM tb_nguoi_dung WHERE email = :email AND mat_khau = :password LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getUserClientByEmail')) {
    function getUserClientByEmail($email)
    {
        try {
            $sql = "SELECT * FROM tb_nguoi_dung WHERE email = :email LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
