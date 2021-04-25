<div class="container-fluid">
    <h4>
        <div class="btn btn-success">KETERANGAN roleid 1 : admin</div>

        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_akun">
            <i class="fas fa-plus fa-sm"></i> Tambah Akun
        </button>

    </h4>
    <table class="table table-striped table-hover">
        <tr>
            <th>No</th>
            <!-- <th>Id</th> -->
            <th>Nama</th>
            <th>Username</th>
            <th>roleid</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        foreach ($user as $usr) :
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $usr->nama ?></td>
                <td><?php echo $usr->username ?></td>
                <td><?php echo $usr->role_id ?></td>
                <td>
                    <?php echo anchor('admin/user/hapus/' . $usr->id, '<div class="btn btn-sm btn-danger" >Hapus</div>') ?>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>


</div>

<div class="modal fade" id="tambah_akun" tabindex="-1" aria-labelledby="tambah_akunLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_akunLabel">Form Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/user/tambah_akun' ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Roleid</label>
                        <select name="role_id" class="form-control">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>