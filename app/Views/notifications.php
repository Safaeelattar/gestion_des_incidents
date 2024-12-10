
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
  <link href="<?= base_url('assets/css/nucleo-icons.css');?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/nucleo-svg.css');?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/css/material-dashboard.css?v=3.2.0');?>" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
        <img src=<?= base_url('assets/img/l.jpg');?> class="navbar-brand-img" width="26" height="26" alt="main_logo">
        <span class="ms-1 text-sm text-dark">Gestion des incidents</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        
        
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('form');?>">
            <i class="material-symbols-rounded opacity-5">receipt_long</i>
            <span class="nav-link-text ms-1">Declarer votre incident</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('notifications');?>">
            <i class="material-symbols-rounded opacity-5">notifications</i>
            <span class="nav-link-text ms-1">Statut d'incident</span>
          </a>
        </li>
       
      
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('profile');?>">
            <i class="material-symbols-rounded opacity-5">person</i>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('logout');?>">
            <i class="material-symbols-rounded opacity-5">login</i>
            <span class="nav-link-text ms-1">Deconnexion</span>
          </a>
        </li>
      
      </ul>
    </div>
    
      
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Notifications</li>
          </ol>
          <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%; /* Augmenter la largeur de la zone de notification */
            margin: 30px auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2.5em;
            color: #333;
        }

        .notification-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .notification-card {
            background-color: #fff;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            border-left: 5px solid;
        }

        .notification-card:hover {
            transform: scale(1.03);
        }

        .notification-header {
            font-size: 1.3em;
            font-weight: bold;
            color: #333;
        }

        .notification-message {
            font-size: 1.1em;
            color: #555;
            margin: 10px 0;
        }

        .notification-time {
            font-size: 0.95em;
            color: #888;
        }

        /* Notification Types */
        .notification-success {
            border-left-color: #28a745;
            background-color: #e9f7e7;
        }

        .notification-warning {
            border-left-color: #ffc107;
            background-color: #fff8e1;
        }

        .notification-error {
            border-left-color: #dc3545;
            background-color: #f8d7da;
        }

        /* Notification Info */
        .notification-info {
            border-left-color: #6c757d;
            background-color: #f8f9fa;
        }

        /* No Notifications Available */
        .no-notifications {
            text-align: center;
            font-size: 1.3em;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        

        <!-- Si aucune notification n'est disponible -->
        <?php if (empty($reponses)): ?>
            <p class="no-notifications">Aucune notification disponible pour l'instant.</p>
        <?php else: ?>
            <ul class="notification-list">
                <?php foreach ($reponses as $reponse): ?>
                    <li class="notification-card notification-info">
                        <div class="notification-header">Réponse à votre incident</div>
                        <div class="notification-message"><?= esc($reponse['message']); ?></div>
                        <div class="notification-time"><?= esc($reponse['created_at']); ?></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>

</html>

                       
 

</html>

</body>
</html>
