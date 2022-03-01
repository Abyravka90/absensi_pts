<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Login Akun</title>
  </head>
  <body>
    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-header text-center">
            <img src="../../assets/images/logo/school.png" width="50px" alt=""><br>
            SMK Fatahillah Cileungsi
            </div>
            <div class="card-body">
                <div class="text-center">Absen Pengawas</div>
              <hr>
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                            <div class="text-center">
                              <img class="img img-thumbnail pb-2 mb-2" src="../../assets/images/logo/pengawas.png" width="100px" alt="">
                            </div>
                            <div class="text-center">
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Masukan Password" id="" class="form-control">
                                </div>
                            
                            </div>
                          <button class="btn btn-login-pengawas btn-block btn-success">LOGIN</button>
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
        $(".btn-login-siswa").click( function(){
          Swal.fire({
              type: 'info',
              title: 'Login...',
              text: 'Anda Masuk sebagai Siswa'
            }).then( function(){
              window.location.href = '/absenPTS/modul/siswa'
            });
        });
        $(".btn-login-pengawas").click( function(){
          Swal.fire({
              type: 'info',
              title: 'Login...',
              text: 'Anda Masuk sebagai Pengawas'
            }).then( function(){
              window.location.href = '/absenPTS/modul/guru'
            });
        });
        $(".btn-login-panitia").click( function(){
          Swal.fire({
              type: 'info',
              title: 'Login...',
              text: 'Anda Masuk sebagai Panitia'
            }).then( function(){
              window.location.href = '/absenPTS/modul/admin'
            });
        });


      });

        // $(".btn-login").click( function() {
        
          // var username = $("#username").val();
          // var password = $("#password").val();

          // if(username.length == "") {

          //   Swal.fire({
          //     type: 'warning',
          //     title: 'Oops...',
          //     text: 'Username Wajib Diisi !'
          //   });

          // } else if(password.length == "") {

          //   Swal.fire({
          //     type: 'warning',
          //     title: 'Oops...',
          //     text: 'Password Wajib Diisi !'
          //   });

          // } else {

            // $.ajax({

            //   url: "cek-login.php",
            //   type: "POST",
            //   data: {
            //       "username": username,
            //       "password": password
            //   },

              // success:function(response){

              //   if (response == "success") {

              //     Swal.fire({
              //       type: 'success',
              //       title: 'Login Berhasil!',
              //       text: 'Anda akan di arahkan dalam 3 Detik',
              //       timer: 3000,
              //       showCancelButton: false,
              //       showConfirmButton: false
              //     })
              //     .then (function() {
              //       window.location.href = "dashboard.php";
              //     });

              //   } else {

              //     Swal.fire({
              //       type: 'error',
              //       title: 'Login Gagal!',
              //       text: 'silahkan coba lagi!'
              //     });

              //   }

              //   console.log(response);

              // },

              // error:function(response){

              //     Swal.fire({
              //       type: 'error',
              //       title: 'Opps!',
              //       text: 'server error!'
              //     });

              //     console.log(response);

              // }

            // });

          // }

        // });
    </script>
  </body>
</html>