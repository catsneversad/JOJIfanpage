<?php
    session_start ();
    if (!isset ($_SESSION['userUid'])) {
        header("Location: ../../index.php");
        exit ();
    }

    $cur_username = $_SESSION['userUid'];
    require '../Database.php';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die ("ERROR: ".mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM full_info WHERE username=?";
    $stmt = mysqli_stmt_init ($conn);
    if (!mysqli_stmt_prepare ($stmt, $sql)) {
        echo mysqli_stmt_error($stmt);
        exit ();
    } else {
        mysqli_stmt_bind_param ($stmt, "s", $cur_username);
        mysqli_stmt_execute ($stmt);
        $result = mysqli_stmt_get_result ($stmt);
        $row = mysqli_fetch_assoc($result);
        $cur_id = $row['id'];
        $cur_email = $row['email'];
        $cur_name = $row['name'];
        $cur_surname = $row['surname'];
        $cur_phone_number = $row['phone_number'];
        $cur_short_info = $row['short_info'];
        $cur_img = $row['img'];
        $cur_role = $row['role'];
        $cur_join_date = $row['join_date'];
    }

    if ($cur_name == null) {
        $cur_name = "no_name";
    }
    if ($cur_surname == null) {
        $cur_surname = "no_surname";
    }
    if ($cur_phone_number == null) {
        $cur_phone_number = "no_phone_number";
    }
    if ($cur_short_info == null) {
        $cur_short_info = "no_short_info";
    }
    if ($cur_img == null) {
        $cur_img = "default.jpg";
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" type="text/css" href="../../css/lgstyle.css">
    <style>
    body {
        margin-top: 20px;
        background-color: #202224
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 140px;
        height: 140px;
    }

    .good {
        display: inline;
        font-size: 10px;
        /* font-family: "Montserrat", sans-serif; */
        color: #CCFFCC;
    }

    .bad {
        display: inline;
        font-size: 10px;
        /* font-family: "Montserrat", sans-serif; */
        color: #ef2e6c;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        function isEmail(email) {
            const re =
                /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        function isAlreadyUsed(tmpMail) {
            var xhttp;
            if (isEmail(tmpMail)) {
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == "GOOD") {
                            $("#goodfromAjax_mail").html("Good EMAIL");
                            return;
                        } else {
                            $("#badfromAjax_mail").html("Already used");
                            return;
                        }
                    }
                }

                xhttp.open("GET", "../checkMail.php?q=" + tmpMail, true);
                xhttp.send();
            }
        }

        function isAlreadyUsername(Username) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == "GOOD") {
                        $("#goodfromAjax_username").html("Good username");
                        return;
                    } else {
                        $("#badfromAjax_username").html("Already used");
                        return;
                    }
                }
            }
            xhttp.open("GET", "../checkUsername.php?q=" + Username, true);
            xhttp.send();
        }

        function debounce(func, wait, immediate) {
            var timeout;
            return function() {
                var context = this,
                    args = arguments;
                var later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        };


        $('#mail').on('keyup', debounce(function() {
            var tmp = document.getElementById("mail").value;
            $("#goodfromAjax_mail").html("x");
            $("#badfromAjax_mail").html("");
            if (isEmail(tmp)) {
                isAlreadyUsed(tmp)
            }
        }, 200));

        $('#uid').on('keyup', debounce(function() {
            var tmp = document.getElementById("uid").value;
            $("#goodfromAjax_username").html("");
            $("#badfromAjax_username").html("");
            if (tmp.length)
                isAlreadyUsername(tmp);
        }, 200));

        $('#curPassword').on('keyup', debounce(function() {
            var tmp = document.getElementById("curPassword").value;
            if (tmp.length)
                document.getElementById("edit_save").disabled = false;
            else 
                document.getElementById("edit_save").disabled = true;
        }, 200));
    });
    </script>
</head>

<body>
    <nav>
      <div class="logo">
        <ul>
          <li><a href="../../index.php">home</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="profile-img">
                                                <img src="../../img/profile_images/<?php echo $cur_img?>" alt="" />
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                                                    <?php echo $cur_surname. " ".$cur_surname;?></h4>
                                                <p class="mb-0">@<?php echo $cur_username;?></p>
                                            </div>
                                            <div class="text-center text-sm-right">
                                                <span class="badge badge-secondary"><?php echo $cur_role;?></span>
                                                <div class="text-muted"><small>Joined
                                                        <?php echo $cur_join_date;?></small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form class="form" action="edit_profile.inc.php" method="post">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input class="form-control" type="text" name="name"
                                                                        placeholder="John" id="name"
                                                                        value="<?php echo $cur_name;?>">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Surname</label>
                                                                    <input class="form-control" type="text"
                                                                        name="surname" id="surname" placeholder="Smith"
                                                                        value="<?php echo $cur_surname;?>">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Username</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="johnny.s"
                                                                        value="<?php echo $cur_username;?>" id="uid"
                                                                        name="uid">
                                                                    <p class="good" id="goodfromAjax_username"></p>
                                                                    <p class="bad" id="badfromAjax_username"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="user@example.com"
                                                                        value="<?php echo $cur_email;?>" id="mail"
                                                                        name="mail">
                                                                    <p class="good" id="goodfromAjax_mail"></p>
                                                                    <p class="bad" id="badfromAjax_mail"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>New img name</label>
                                                                    <input class="form-control" type="text" name="img"
                                                                        id="img" value="<?php echo $cur_img;?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>New phone name</label>
                                                                    <input class="form-control" type="text" name="phone_number"
                                                                        id="phone_number" value="<?php echo $cur_phone_number;?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <div class="form-group">
                                                                    <label>About</label>
                                                                    <textarea class="form-control" rows="5"
                                                                        placeholder="My Bio" name="myInfo"
                                                                        id="myInfo"><?php echo $cur_short_info;?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mb-3">
                                                        <div class="mb-2"><b>Change Password</b></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Current Password</label>
                                                                    <input class="form-control" type="password"
                                                                        placeholder="••••••" name="curPassword"
                                                                        id="curPassword">
                                                                    <div class="text-danger"><small>*required to save changes</small></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>New Password</label>
                                                                    <input class="form-control" type="password"
                                                                        placeholder="••••••" name="newPassword1"
                                                                        id="newPassword1">
                                                                    <div class="text-muted"><small>If you don't wanna
                                                                            change
                                                                            your password just leave this input
                                                                            clear</small></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Confirm<span
                                                                            class="d-none d-xl-inline">Password</span></label>
                                                                    <input class="form-control" type="password"
                                                                        placeholder="••••••" id="newPassword2"
                                                                        id="newPassword2">
                                                                    <div class="text-muted"><small>If you don't wanna
                                                                            change
                                                                            your password just leave this input
                                                                            clear</small></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-primary" type="submit" name="edit_save"
                                                            id="edit_save" disabled>Save
                                                            Changes</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>