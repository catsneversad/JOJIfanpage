<?php
    $item_id = $_GET['id'];
    $string = file_get_contents ("data.json");
    $array = json_decode ($string);
    if (isset($_POST['deleteButton'])) {
        
        //print_r ($array);
        $newarray = [];
        foreach ($array as $key => $value) {
            if ($value->id != $item_id) {
                array_push ($newarray, $value);
            } else {
                continue;
            }
        }
        $array = $newarray;
        //unset($array[$item_id]);
        //print_r ($array);
        $json = json_encode($array);
        file_put_contents ("data.json", $json);
        header("Location: ../index.php");
        exit ();
    } else if (isset ($_POST['changeButton'])) {
        foreach ($array as $key => $value) {
            if ($value->id == $item_id) {
                $value->price = $_POST['changeamount'];
                break;
            }
        }
        $json = json_encode($array);
        file_put_contents ("data.json", $json);
        header("Location: ../index.php");
        exit ();
    } else {
        header("Location: ../index.php");
        exit (); 
    }
?>