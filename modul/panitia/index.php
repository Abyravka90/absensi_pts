<?php include('../../config/koneksi.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Login Akun</title>
  </head>
  <body>
  <nav class="navbar fixed-top navbar-light bg-primary">
    <span class="navbar-brand mb-0 h1 text-light">Absensi SMK Fatahillah Cileungsi</span>
  </nav>
    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-header text-center">
            <img src="../../assets/images/logo/school.png" width="50px" alt=""><br>
            SMK Fatahillah Cileungsi
            </div>
            <div class="card-body">
                <div class="text-center">Absen Panitia</div>
              <hr>
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                            <div class="text-center">
                              <img class="img img-thumbnail pb-2 mb-2" src="../../assets/images/logo/admin.png" width="300px" alt="">
                            </div>
                            <div class="text-center">
                                <div class="form-group">
                                    <input type="password"  placeholder="Masukan Password" id="password" class="form-control">
                                </div>
                            
                            </div>
                          <button class="btn btn-login-panitia btn-block btn-primary">LOGIN</button>
                      </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function() {
        $(".btn-login-panitia").click( function() {
          var password = $("#password").val();

          if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          }else if(password == 20258413){
            Swal.fire({
              type: 'info',
              title: 'Login...',
              text: 'Anda Masuk sebagai Pengawas'
            }).then( function(){
              window.location.href = '/<?= $link ?>/modul/panitia/absen.php'
            });
          } 
        })
      });
    </script>
  </body>
</html>