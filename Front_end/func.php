<?php
    function add_review($conn, $idroomtype, $iduser, $starValue, $comment){
        $sql = "INSERT INTO danhgia(IDLoaiphong, IDTaikhoan, Sosao, Binhluan) VALUES ('".$idroomtype."','".$iduser."','".$starValue."','".$comment."')";
        mysqli_query($conn, $sql);
    }

    function add_account($conn, $u, $p){
        $hashedP = md5($p);
        $sql = "INSERT INTO taikhoan(Tendangnhap, Matkhau) VALUES ('".$u."','".$hashedP."')";
        mysqli_query($conn, $sql);
    }

    function get_comments($conn, $idroomtype) {
        $sql = "SELECT c.*, u.Avatar, u.Tendangnhap 
        FROM danhgia c 
        JOIN taikhoan u 
        ON c.IDTaikhoan = u.IDTaikhoan 
        WHERE c.IDLoaiphong = $idroomtype";
        return mysqli_query($conn, $sql);
    }
    function get_averages($conn, $idroomtype){
        $sql = "SELECT AVG(Sosao) AS Trungbinh FROM danhgia WHERE IDLoaiphong=$idroomtype";
        return mysqli_query($conn, $sql);
    }
    function check_account1($conn, $u){
        $sql = "select * from taikhoan where Tendangnhap='$u'";
        return mysqli_query($conn, $sql);
    }

    function check_account2($conn, $id){
        $sql = "select * from taikhoan where IDTaikhoan='$id'";
        return mysqli_query($conn, $sql);
    }

    function check_discount($conn, $id){
        $sql = "SELECT * FROM uudai WHERE IDLoaiphong=$id AND Trangthai = 1";
        return mysqli_query($conn, $sql);
    }

    function check_utilities($conn, $id){
        $sql = "SELECT * FROM nhantienich AS n,tienich AS t WHERE n.IDTienich=t.IDTienich AND IDLoaiphong=$id";
        return mysqli_query($conn, $sql);
    }

    function check_images($conn, $id){
        $sql = "SELECT * FROM hinhphong WHERE IDLoaiphong=$id";
        return mysqli_query($conn, $sql);
    }

    function check_rooms($conn, $id){
        $sql = "SELECT * FROM phong WHERE IDLoaiphong=$id";
        return mysqli_query($conn, $sql);
    }


    function check_roomtypeinfo($conn, $id){
        $sql = "SELECT lp.*
                FROM loaiphong lp
                JOIN phong p ON lp.IDLoaiPhong = p.IDLoaiPhong
                JOIN datphong dp ON p.IDPhong = dp.IDPhong
                WHERE dp.IDPhong=$id
                GROUP BY lp.IDLoaiphong";
        return mysqli_query($conn, $sql);
    }

    function check_eventinfo($conn, $id){
        $sql = "SELECT *
                FROM sukien
                WHERE IDSukien=$id";
        return mysqli_query($conn, $sql);
    }

    function check_review($conn, $id){
        $sql = "SELECT *
                FROM danhgia
                WHERE IDLoaiphong=$id";
        return mysqli_query($conn, $sql);
    }

    function filter_roombooked($conn, $start_date, $end_date, $status, $userID){
        if($status == "all"){
            if($start_date=="" && $end_date==""){
                $sql = "SELECT * FROM datphong WHERE IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date!="" && $end_date==""){
                $sql = "SELECT * FROM datphong WHERE '$start_date'<=Ngaydat AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date=="" && $end_date!=""){
                $sql = "SELECT * FROM datphong WHERE Ngaydat<='$end_date' AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date!="" && $end_date!=""){
                $sql = "SELECT * FROM datphong WHERE Ngaydat BETWEEN '$start_date' AND '$end_date' AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
        }else{
            if($start_date=="" && $end_date==""){
                $sql = "SELECT * FROM datphong WHERE trangthai=$status AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date!="" && $end_date==""){
                $sql = "SELECT * FROM datphong WHERE '$start_date'<=Ngaydat AND trangthai=$status AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date=="" && $end_date!=""){
                $sql = "SELECT * FROM datphong WHERE Ngaydat<='$end_date' AND trangthai=$status AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date!="" && $end_date!=""){
                $sql = "SELECT * FROM datphong WHERE Ngaydat BETWEEN '$start_date' AND '$end_date' AND trangthai=$status AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
        }
    }

    function filter_eventbooked($conn, $start_date, $end_date, $status, $userID){
        if($status == "all"){
            if($start_date=="" && $end_date==""){
                $sql = "SELECT * FROM datsk WHERE IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date!="" && $end_date==""){
                $sql = "SELECT * FROM datsk WHERE '$start_date'<=Ngaydat AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date=="" && $end_date!=""){
                $sql = "SELECT * FROM datsk WHERE Ngaydat<='$end_date' AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date!="" && $end_date!=""){
                $sql = "SELECT * FROM datsk WHERE Ngaydat BETWEEN '$start_date' AND '$end_date' AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
        }else{
            if($start_date=="" && $end_date==""){
                $sql = "SELECT * FROM datsk WHERE trangthai=$status AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date!="" && $end_date==""){
                $sql = "SELECT * FROM datsk WHERE '$start_date'<=Ngaydat AND trangthai=$status AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date=="" && $end_date!=""){
                $sql = "SELECT * FROM datsk WHERE Ngaydat<='$end_date' AND trangthai=$status AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
            elseif($start_date!="" && $end_date!=""){
                $sql = "SELECT * FROM datsk WHERE Ngaydat BETWEEN '$start_date' AND '$end_date' AND trangthai=$status AND IDTaikhoan='$userID'";
                return mysqli_query($conn, $sql);
            }
        }
    }
?>