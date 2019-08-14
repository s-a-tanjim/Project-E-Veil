<?php
session_start();
if (isset($_SESSION['email']) == false) {   //Checking Session['email'] is set or not
    header("Location: ../login.php?login=invalid_action");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>
    <link rel="icon" href="./img/avatar.png" type="image/icon type">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style>
        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }

        .profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 70%;
            height: 100%;
        }

        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-head h5 {
            color: #333;
        }

        .profile-head h6 {
            color: #0062cc;
        }

        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }

        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }

        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }

        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }

        .profile-work {
            padding: 14%;
            margin-top: -15%;
        }

        .profile-work p {
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }

        .profile-work ul {
            list-style: none;
        }

        .profile-tab label {
            font-weight: 600;
        }

        .profile-tab p {
            font-weight: 600;
            color: #0062cc;
        }

        .deletebutton {
            background-color: white;
            color: black;
            border-radius: 5px;
            border: 2px solid #555555;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
        }

        .deletebutton:hover {
            background-color: #555555;
            color: white;
        }

        .deletebutton_a {
            color: white;
            border: 2px solid #555555;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
        }

        .deletebutton_a:hover {
            color: red;
        }

        /* customModal edit.........................*/
        .customModal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* customModal Content */
        .customModal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .customModal-header {
            padding: 2px 16px;
            background-color: #555;
            color: white;
        }

        .customModal-body {
            padding: 2px 16px;
        }

        .customModal-footer {
            padding: 2px 16px;
            background-color: #555;
            color: white;
        }
    </style>
</head>
<?php
include_once 'header.php';
?>

<div class="container emp-profile">

    <div class="row">
        <div class="col-md-6">
            <div class="profile-head">
                <h5>
                    User Name
                </h5>
                <h6>
                    <?php echo $_SESSION['email']; ?>
                </h6>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4" style="margin-left:4%;">
            <div class="profile-img">
                <?php
                $pic_src = './profile_pic/' . $_SESSION['pro_pic'];
                echo '<img src="' . $pic_src . '" alt="pro_pic">';
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $_SESSION['first_name'] . "   " . $_SESSION['last_name']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $_SESSION['email']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $_SESSION['p_number']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Address</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php if (is_null($_SESSION['country'])) {
                                    echo "n/a";
                                } else {
                                    echo $_SESSION['country'];
                                } ?></p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Joind</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $_SESSION['creation_date']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Sent email</label>
                        </div>
                        <div class="col-md-6">
                            <p>count</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Received mail</label>
                        </div>
                        <div class="col-md-6">
                            <p>count</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button id="deleteAccount" class="deletebutton"><i style="margin-right:2px;" class="far fa-trash-alt"></i>Delete Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="deletecustomModal" class="customModal">
    <div class="customModal-content">
        <div class="customModal-header">
            <h2>Delete E-Veil Account</h2>
            <span class="close">&times;</span>
        </div>
        <div class="customModal-body">
            <p>Are you sure you want to delete your account?</p>
            <p><i class="fas fa-exclamation-triangle"></i> All of your data will be deleted permanently! </p>
        </div>
        <div class="customModal-footer">
            <a class="deletebutton_a" style="text-decoration:none;" href="user_db/db_deleteAccount.php">YES</a>
            <a class="Noclose deletebutton_a" style="text-decoration:none;" href="#">NO</a>
        </div>
    </div>
</div>
<script>
    var customModal = document.getElementById("deletecustomModal");
    var btn = document.getElementById("deleteAccount");
    var span = document.getElementsByClassName("close")[0];
    var no_close = document.getElementsByClassName("Noclose")[0];

    btn.onclick = function() {
        customModal.style.display = "block";
    }

    span.onclick = function() {
        customModal.style.display = "none";
    }
    no_close.onclick = function() {
        customModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == customModal) {
            customModal.style.display = "none";
        }
    }
</script>


<?php
include_once 'footer.php';
?>