<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Profil Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#0f172a;
            color:white;
        }

        .profile-card{
            max-width:600px;
            margin:auto;
            margin-top:50px;
            background:#1e293b;
            border:none;
            border-radius:25px;
            box-shadow:0 5px 20px rgba(0,0,0,.3);
            overflow:hidden;
        }

        .profile-header{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            padding:30px;
            text-align:center;
        }

        .profile-avatar{
            font-size:90px;
            color:white;
        }

        .profile-body{
            padding:30px;
        }

        .info-box{
            background:#334155;
            border-radius:15px;
            padding:15px;
            margin-bottom:15px;
        }

        .label{
            color:#94a3b8;
            font-size:14px;
        }

        .value{
            font-size:18px;
            font-weight:bold;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="card profile-card">

        <div class="profile-header">

            <i class="bi bi-person-circle profile-avatar"></i>

            <h3 class="mt-3">
                Administrator
            </h3>

        </div>

        <div class="profile-body">

            <div class="info-box">

                <div class="label">
                    Nama
                </div>

                <div class="value">
                    <?php echo $_SESSION['username']; ?>
                </div>

            </div>

            <div class="info-box">

                <div class="label">
                    Role
                </div>

                <div class="value">
                    Admin
                </div>

            </div>

            <div class="info-box">

                <div class="label">
                    Sistem
                </div>

                <div class="value">
                    Toko Sembako Sederhana
                </div>

            </div>

            <div class="d-flex gap-2 mt-4">

                <a href="dashboard.php"
                   class="btn btn-light">

                    <i class="bi bi-arrow-left"></i>
                    Dashboard

                </a>

                <a href="logout.php"
                   class="btn btn-danger">

                    <i class="bi bi-box-arrow-right"></i>
                    Logout

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>