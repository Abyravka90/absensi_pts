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
              <b class="text-center">petunjuk absen</b><br>
              <div class="alert alert-info text-left">
               1. Silahkan pilih menu dibawah sesuai dengan data absen anda<br>
               2. Isikan data pada form yang ada jangan lupa tambahkan foto anda<br>
               3. Pastikan data yang diisikan benar <br>
               4. Silahkan verifikasi absen dengan membubuhkan tanda tangan<br>
               5. Absen hanya bisa dilakukan sekali per sesi maka jangan sampai salah<br>
               6. Jika Absen salah silahkan hubungi administrator<br>

              </div>
            </div>
            <div class="card-body">
              <hr>
                <div class="container">
                  <div class="row">
                    <div class="col-md-4">
                          <div class="text-center">
                            <img class="img img-thumbnail pb-2 mb-2" src="../../assets/images/logo/student.png" width="100px" alt="">
                          </div>
                          <button class="btn btn-login-siswa btn-block btn-info">siswa</button>
                    </div>
                    <div class="col-md-4">
                            <div class="text-center">
                              <img class="img img-thumbnail pb-2 mb-2" src="../../assets/images/logo/pengawas.png" width="100px" alt="">
                            </div>
                          <button class="btn btn-login-pengawas btn-block btn-success">pengawas</button>
                      </div>
                    <div class="col-md-4">
                          <div class="text-center">
                                <img class="img img-thumbnail pb-2 mb-2" src="../../assets/images/logo/admin.png" width="100px" alt="">
                          </div>
                          <button class="btn btn-login-panitia btn-block btn-warning">panitia</button>
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
              window.location.href = '/modul/siswa'
            });
        });
        $(".btn-login-pengawas").click( function(){
          Swal.fire({
              type: 'info',
              title: 'Login...',
              text: 'Anda Masuk sebagai Pengawas'
            }).then( function(){
              window.location.href = '/modul/pengawas'
            });
        });
        $(".btn-login-panitia").click( function(){
          Swal.fire({
              type: 'info',
              title: 'Login...',
              text: 'Anda Masuk sebagai Panitia'
            }).then( function(){
              window.location.href = '/modul/panitia'
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