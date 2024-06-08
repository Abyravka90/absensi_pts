
    <?php include('../../config/header.php') ?>
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
                                    <input type="password"  placeholder="Masukan Password" id="password" class="form-control">
                                </div>
                            
                            </div>
                          <button class="btn btn-login-pengawas btn-block btn-primary btn-flat">LOGIN</button>
                      </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include('../../config/koneksi.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function() {
        $(".btn-login-pengawas").click( function() {
          var password = $("#password").val();

          if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          }else if(password == 'admin'){
            Swal.fire({
              type: 'info',
              title: 'Login...',
              text: 'Anda Masuk sebagai Admin'
            }).then( function(){
              window.location.href = '/<?= $link ?>/modul/admin/siswa.php'
            });
          } 
        })
      });

    </script>
  </body>
</html>