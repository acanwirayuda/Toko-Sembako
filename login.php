<?php
session_start();
include 'config/koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi,
        "SELECT * FROM users
         WHERE username='$username'
         AND password='$password'");

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];

        header("Location: dashboard.php");
        exit;

    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Toko Sembako</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background: linear-gradient(135deg,#0d6efd,#6610f2);
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .login-card{
            border:none;
            border-radius:20px;
            box-shadow:0 15px 35px rgba(0,0,0,.2);
            overflow:hidden;
        }

        .login-header{
            text-align:center;
            padding:30px 20px 10px;
        }

        .login-icon{
            font-size:60px;
            color:#0d6efd;
        }

        .login-title{
            font-weight:700;
            margin-top:10px;
        }

        .form-control{
            border-radius:10px;
        }

        .input-group-text{
            border-radius:10px 0 0 10px;
        }

        .btn-login{
            border-radius:10px;
            font-weight:600;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-5 col-lg-4">

            <div class="card login-card">

                <div class="card-body p-4">

                    <div class="login-header">

                        <i class="bi bi-shop login-icon"></i>

                        <h3 class="login-title">
                            Toko Sembako
                        </h3>

                        <p class="text-muted">
                            Sistem Login Admin
                        </p>

                    </div>

                    <?php if(isset($error)){ ?>

                        <div class="alert alert-danger">

                            <i class="bi bi-exclamation-triangle"></i>
                            <?php echo $error; ?>

                        </div>

                    <?php } ?>

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>

                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    placeholder="Masukkan username"
                                    required>

                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Password
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required>

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary"
                                    onclick="togglePassword()">

                                    <i
                                        id="eyeIcon"
                                        class="bi bi-eye">
                                    </i>

                                </button>

                            </div>

                        </div>

                        <button
                            type="submit"
                            name="login"
                            class="btn btn-primary btn-login w-100">

                            <i class="bi bi-box-arrow-in-right"></i>
                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword(){

    const password =
        document.getElementById("password");

    const eye =
        document.getElementById("eyeIcon");

    if(password.type === "password"){

        password.type = "text";

        eye.classList.remove("bi-eye");
        eye.classList.add("bi-eye-slash");

    }else{

        password.type = "password";

        eye.classList.remove("bi-eye-slash");
        eye.classList.add("bi-eye");

    }

}

</script>

</body>
</html>