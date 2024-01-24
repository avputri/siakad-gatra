<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="img-responsive-pad img-circle" src="<?= $siswa['foto_siswa'] ? base_url('public/fotosiswa/' . $siswa['foto_siswa']) : 'https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2281862025.jpg' ?>" alt="User profile picture" style="object-fit:cover; object-position:center; width:130px; height:130px;">
                    </div>
                    <h3 class="profile-username text-center"><?= $siswa['NIS'] ?></h3>
                    <p class="profile-username text-center"><?= $siswa['nama_siswa'] ?></p>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!--/col -->
        <div class="col-md-9">
            <!-- About Me Box -->
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Jurusan</th>
                            <th>:</th>
                            <td><?= $siswa['jurusan'] ?></td>
                        </tr>

                        <tr>
                            <th>Rombel</th>
                            <th>:</th>
                            <td><?= $siswa['kelas'] ?> /<?= $siswa['nama_rombel'] ?></td>
                        </tr>


                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div> <!--/row -->
</div> <!--/container -->