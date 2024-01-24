<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-success card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="img-responsive-pad img-circle" src="<?= $guru['foto_guru'] ? base_url('public/fotoguru/' . $guru['foto_guru']) : 'https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2281862025.jpg' ?>" alt="User profile picture" style="object-fit:cover; object-position:center; width:130px; height:130px;">
                    </div>
                    <h3 class="profile-username text-center"><code><?= $guru['nip'] ?></code></h3>
                    <p class="profile-username text-center"><?= $guru['nama_guru'] ?></p>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!--/col -->
        <div class="col-md-8">
            <!-- About Me Box -->
            <div class="card card-success card-outline">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Tahun Akademik</th>
                            <th>:</th>
                            <td><?= $ta_aktif['ta1'] ?>/<?= $ta_aktif['ta2'] ?> - <?= $ta_aktif['semester'] ?></td>
                        </tr>

                        <tr>
                            <th>Kode Guru</th>
                            <th>:</th>
                            <td><?= $guru['kode_guru'] ?></td>
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