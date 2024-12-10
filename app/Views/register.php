
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/l.jpg');?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/l.jpg');?>">
  <title>
    Gestion des incidents
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
       
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <!-- Colonne de l'image, reste fixe à gauche -->
                <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                    <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('<?= base_url('assets/img/inscription.jpg'); ?>'); background-size: cover;">
                    </div>
                </div>

                <!-- Colonne du formulaire et des messages -->
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                    <div class="card card-plain">
                        <div class="card-header">
                            <h4 class="font-weight-bolder">Inscription</h4>
                        </div>

                        <!-- Affichage du message de succès -->
                        <?php if (session()->getFlashdata('success')): ?>
                            <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 2px; border: 1px solid #c3e6cb; font-family: Arial, sans-serif; text-align: center;">
                                <h3>Inscription réussie !</h3>
                                <p><?= session()->getFlashdata('success'); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')): ?>
    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 2px; border: 1px solid #f5c6cb; font-family: Arial, sans-serif; text-align: center;">
        <h3>Erreur d'inscription</h3>
        <p><?= session()->getFlashdata('error'); ?></p>
    </div>
<?php endif; ?>

                        <!-- Formulaire d'inscription -->
                        <div class="card-body">
                            <form role="form" method="post" action="<?= base_url('/register') ?>">
                                <div class="input-group input-group-outline mb-3">
                                    <label for="full_name" class="form-label">Nom Complet</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" required value="<?= old('full_name') ?>">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required value="<?= old('email') ?>">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <div class="input-group input-group-outline mb-3">
                                    <label for="confirm_password" class="form-label">Confirmer votre mot de passe</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">S'inscrire</button>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-2 text-sm mx-auto">
                                Vous avez déjà un compte ?
                                <a href="<?= base_url('connexion');?>" class="text-primary text-gradient font-weight-bold">Connexion</a>
                            </p>
                        </div>
                    </div>
                </div> <!-- Fin de la colonne formulaire -->
            </div>
        </div>
    </div>
</section>

  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>