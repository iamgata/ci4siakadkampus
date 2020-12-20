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

    <div class="container" style="margin-top: 8em;">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?php echo $title ?></h1>
                                    </div>

                                    <div>
                                        <?php if (session()->getFlashdata('messagewrongemail')) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Email yang anda masukkan <?php echo session()->getFlashdata('messagewrongemail') ?>.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                        <?php elseif (session()->getFlashdata('messagewrongpassword')) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Password yang anda masukkan <?php echo session()->getFlashdata('messagewrongpassword') ?>.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php endif ?>
                                    </div>

                                    <?php echo form_open('/auth/loginsave', ['class' => 'user']) ?>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email_user" placeholder="Masukkan email anda" name="email_user">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password_user" placeholder="Masukkan password anda" name="password_user">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block mt-4">
                                        Login
                                    </button>

                                    <?php echo form_close() ?>

                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="/auth/register">Belum punya akun, silahkan register dulu !</a>
                                    </div>
                                </div>
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