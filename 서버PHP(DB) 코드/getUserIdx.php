<?php


  include "./dbconfig.php";

  $id = $_POST["userId"];
  $requestCode = $_POST["requestCode"];


  //유저정보 불러오기
  $sql = "select count(*) as cnt from memberInfo where id= '".$id."'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

   if($row['cnt'] == 1){  // 아이디가 존재
      //아이디가 존재하면 비번 해쉬를 불러옴;
      $sqlForHash = "select * from memberInfo where id= '".$id."'";
      $resultForHash = $conn->query($sqlForHash);
      $rowForHash = $resultForHash->fetch_assoc();

      $arr = array ('task'=>'getUserIdx', 'result'=>'Success', 'userIdx'=>$rowForHash['sequence']);

      echo json_encode($arr);
    } else {
        $arr = array ('task'=>'getUserIdx','result'=>'Fail : memberDoesNotExist');
        echo json_encode($arr);
    }

    $conn->close();


 ?>
