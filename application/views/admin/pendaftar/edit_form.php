<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <!-- Card  -->
                <div class="card mb-3">
                    <div class="card-header">

                        <a href="<?php echo site_url('admin/pendaftars/') ?>"><i class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">

                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/pendaftars/edit/ID --->

                            <input type="hidden" name="id" value="<?php echo $pendaftar->pendaftar_id ?>" />

                            <div class="form-group">
                                <label for="nama">Nama*</label>
                                <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama Pemudik" value="<?php echo $pendaftar->nama ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('name') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Alamat*</label>
                                <textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" name="alamat" placeholder="Alamat Pemudik"><?php echo $pendaftar->alamat ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo form_error('alamat') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telp">Telp</label>
                                <input class="form-control <?php echo form_error('telp') ? 'is-invalid' : '' ?>" type="text" name="telp" min="0" placeholder="Telp Pemudik" value="<?php echo $pendaftar->telp ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('telp') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tujuan">Tujuan</label>
                                <input class="form-control <?php echo form_error('tujuan') ? 'is-invalid' : '' ?>" type="text" name="tujuan" placeholder="Tujuan Pemudik" value="<?php echo $pendaftar->tujuan ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tujuan') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah*</label>
                                <input class="form-control <?php echo form_error('jumlah') ? 'is-invalid' : '' ?>" type="number" name="jumlah" placeholder="Jumlah Pemudik" value="<?php echo $pendaftar->jumlah ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('jumlah') ?>
                                </div>
                            </div>

                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                        </form>

                    </div>

                    <div class="card-footer small text-muted">
                        * required fields
                    </div>


                </div>
                <!-- /.container-fluid -->

                <!-- Sticky Footer -->
                <?php $this->load->view("admin/_partials/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php $this->load->view("admin/_partials/scrolltop.php") ?>

        <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>