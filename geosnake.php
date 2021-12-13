<?php

include('/home2-1/t/tuomakuh/config/config.php');

$url = $_SERVER['REQUEST_URI'];
$url_comps = parse_url($url);
parse_str($url_comps['query'], $params);

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pw, $mysql_db);

if($con){
    switch($params['action']) {
    case "get":
        $sql = "SELECT * FROM `Players` WHERE `UID` = " . intval($params['uid']);
        $res = mysqli_query($con,$sql);
        if($res){
            header("Content-Type: JSON");
            $row = mysqli_fetch_assoc($res);
            echo json_encode($row,JSON_PRETTY_PRINT);
        }
        break;
    case "set":
        $highscore = intval($params['highscore']);
        $nickname = $params['nickname'];
        $sql = "INSERT INTO Players(nickname, highscore) VALUES ('$nickname', '$highscore')";
        $res =  mysqli_query($con,$sql);
        if($res){
            echo json_encode(array("message" => $res));
        }
        break;

    case "top":
        $players = array();

        $sql = "SELECT nickname, MAX(highscore) AS highscore FROM `Players` GROUP BY nickname ORDER BY highscore DESC";
        $res = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($res)) {
            header("Content-Type: JSON");
            $players[] = $row;
        }
            header("Content-Type: JSON");
            echo json_encode($players,JSON_PRETTY_PRINT);
        break;
    }


} else {
    echo "Failed to connect";
}
?>