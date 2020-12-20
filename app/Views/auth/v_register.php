<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container" style="margin-top: 5em;">

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?php echo $title  ?></h1>
                            </div>
                            <div>
                                <?php if (session()->getFlashdata('messageregister')) :  ?>
                                    <div class="alert alert-primary" role="alert">
                                        Akun anda <?php echo session()->getFlashdata('messageregister') ?> didaftarkan.
                                    </div>
                                <?php endif ?>
                            </div>

                            <?php echo form_open('auth/registersave', ['class' => 'user']) ?>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user <?php echo ($validation->hasError('name_user')) ? 'is-invalid' : '' ?>" id="name_user" placeholder="Masukkan nama user" name="name_user" value="<?php echo old('name_user') ?>">

                                <div class="invalid-feedback ml-3">
                                    <?php echo $validation->getError('name_user') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control form-control-user  <?php echo ($validation->hasError('email_user')) ? 'is-invalid' : '' ?>" id="email_user" placeholder="Masukkan email user" name="email_user" value="<?php echo old('email_user') ?>">

                                <div class="invalid-feedback ml-3">
                                    <?php echo $validation->getError('email_user') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user  <?php echo ($validation->hasError('password_user')) ? 'is-invalid' : '' ?>" id="password_user" placeholder="Masukkan password user" name="password_user">

                                    <div class="invalid-feedback ml-3">
                                        <?php echo $validation->getError('password_user') ?>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user  <?php echo ($validation->hasError('repassword_user')) ? 'is-invalid' : '' ?>" id="repassword_user" placeholder="Ulangi password" name="repassword_user">

                                    <div class="invalid-feedback ml-3">
                                        <?php echo $validation->getError('repassword_user') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="custom-select form-control <?php echo ($validation->hasError('level_user')) ? 'is-invalid' : '' ?>" name="level_user" id="level_user" style="width: 250px; border-radius: 30px; font-size: 12px;">
                                        <?php if (empty(old('level_user'))) :  ?>
                                            <option selected value="">Pilih level user</option>
                                        <?php else : ?>
                                            <option selected value="<?php echo old('level_user') ?>"><?php echo old('level_user') ?></option>
                                        <?php endif ?>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                        <option value="3">Member</option>
                                    </select>

                                    <div class="invalid-feedback ml-3">
                                        <?php echo $validation->getError('level_user') ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="image_user" placeholder="Masukkan foto user" name="image_user">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Registrasi Akun
                            </button>
                            <?php echo form_close() ?>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="/auth/login">Sudah memiliki akun, silahkan login !!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

</body>

</html>