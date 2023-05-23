<?php 
function dangky($link, $user_name, $user_email, $user_password, $user_phone, $user_address){
    chayTruyVanKhongTraVeDL($link, "insert into tbl_users values (NULL,
                                                                '".mysqli_real_escape_string($link, $user_name)."',
                                                                '".$user_email."',
                                                                '".$user_password."',
                                                                '".$user_phone."',
                                                                '".mysqli_real_escape_string($link, $user_address)."'
                                                                )"
    );
}

function dangnhap($link, $user_phone, $user_password,){
    $result = chayTruyVanTraVeDL($link, "select * from tbl_users where user_phone='".($user_phone)."'                                                                
                                                                            and user_password='".($user_password)."'");
    $row = mysqli_fetch_array($result);
    mysqli_free_result($result);
    if ($row==NULL)
    return false;
    if (count($row)>0) {
        $_SESSION['user_id'] = $row['user_id'];
        return true;
    }else
        return false;                                                                        
}

function dangxuat(){
    if(isset($_SESSION['user_id'])){
        unset($_SESSION['user_id']);
        return true;
    }else
        return false;
}
?>