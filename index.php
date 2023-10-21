<?php 
require 'koneksi.php';

//cek akun(ada atau tidak)
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cekDatabase = mysqli_query($conn, "select * from login where email='$email' and password='$password'");

    $hitung = mysqli_num_rows($cekDatabase);

    if($hitung>0){
        //data di temukan
        $ambildata = mysqli_fetch_array($cekDatabase);
        $role = $ambildata['role'];

        if($role=='admin'){
            //jika admin
            $_SESSION['log'] = 'True';
            $_SESSION['role'] = 'Admin';
            header('location:admin');
        }else{
            //jika bukan admin
            $_SESSION['log'] = 'True';
            $_SESSION['role'] = 'User';
            header('location:user');

        }

    }else{
        //jika tidak di temukan
        echo 'Data tidak ditemukan';
    }
    
};

if(isset($_SESSION['log'])&&$_SESSION['role']=='Admin'){
    header('location:admin');

    } elseif(isset($_SESSION['log'])&&$_SESSION['role']=='User'){    
    header('location:user');
        
    }else{

    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="assets/img/berlianbulat.png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    
                                    <img class="img-fluid logo mx-auto" src="assets/img/berlian.png" alt="Logo Perusahaan" style="width: 4rem; height: 4.5rem; padding-top: 15px;">

                                    <div class="card-header"><h3 class="text-center  font-weight-light my-4">Login BerlianTeknologi.net</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Enter email address" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" required/>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">Semoga Hari Anda Menyenangkan!..</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
