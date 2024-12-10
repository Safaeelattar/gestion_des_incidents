
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
          <a class="nav-link active bg-gradient-dark text-white" href="<?= base_url('form');?>">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
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
            <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('logout'); ?>">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Formulaire</li>
          </ol>
        </nav>
      </div>
    </nav>
    <div class="card card-plain">
  <div class="card-header">
    <h4 class="font-weight-bolder">Déclarer un incident</h4>
    <p class="mb-0">Veuillez remplir tous les champs obligatoires.</p>
  </div>

  <!-- Affichage des messages de succès et d'erreur -->
  <?php if (session()->get('success')): ?>
    <div class="alert alert-success"><?= session()->get('success') ?></div>
  <?php endif; ?>

  <?php if (session()->get('error')): ?>
    <div class="alert alert-danger"><?= session()->get('error') ?></div>
  <?php endif; ?>

  <?php if (session()->get('model_errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->get('model_errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
  <?php endif; ?>

  <div class="card-body">
    <!-- Formulaire d'incident -->
    <form id="incidentForm" action="<?= site_url('/incident/store') ?>" method="post">
      <?= csrf_field() ?>
      
      <div class="input-group input-group-outline mb-3">
        <label class="form-label">Nom complet</label>
        <input type="text" id="fullName" class="form-control" name="fullName"  required>
        <?= isset($validation) ? $validation->getError('fullName') : '' ?>
      </div>

      <div class="input-group input-group-outline mb-3">
        <label class="form-label">Email</label>
        <input type="email" id="email" class="form-control" name="email"  required>
        <?= isset($validation) ? $validation->getError('email') : '' ?>
      </div>

      <div class="input-group input-group-outline mb-3">
        <label class="form-label">Numéro de téléphone</label>
        <input type="tel" id="phone" class="form-control" name="phone"  required>
        <?= isset($validation) ? $validation->getError('phone') : '' ?>
      </div>

      <div class="input-group input-group-outline mb-3">
        <label class="form-label">Type d'incident</label>
        <select id="incidentType" class="form-control" name="incidentType" required>
          <option value="" disabled selected></option>
          <option value="technique" <?= old('incidentType') == 'technique' ? 'selected' : '' ?>>Technique</option>
          <option value="logistique" <?= old('incidentType') == 'logistique' ? 'selected' : '' ?>>Logistique</option>
          <option value="autre" <?= old('incidentType') == 'autre' ? 'selected' : '' ?>>Autre</option>
        </select>
        <?= isset($validation) ? $validation->getError('incidentType') : '' ?>
      </div>

      <div class="input-group input-group-outline mb-3">
        <label for="date_incident">Date de l'incident :</label>
        <input type="date" name="date_incident" id="date_incident" class="form-control"  required>
        <?= isset($validation) ? $validation->getError('date_incident') : '' ?>
      </div>

      <div class="input-group input-group-outline mb-3">
        <label class="form-label">Description</label>
        <textarea id="description" class="form-control" name="description" rows="3" required><?= old('description') ?></textarea>
        <?= isset($validation) ? $validation->getError('description') : '' ?>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Soumettre</button>
      </div>
    </form>
  </div>
</div>



            
                  
               
                   
                    
            
    
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Views",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#43A047",
          data: [50, 45, 22, 28, 50, 60, 76],
          barThickness: 'flex'
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: '#e5e5e5'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
              color: "#737373"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
        datasets: [{
          label: "Sales",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: "#43A047",
          pointBorderColor: "transparent",
          borderColor: "#43A047",
          backgroundColor: "transparent",
          fill: true,
          data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
          tooltip: {
            callbacks: {
              title: function(context) {
                const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                return fullMonths[context[0].dataIndex];
              }
            }
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [4, 4],
              color: '#e5e5e5'
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 12,
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 12,
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Tasks",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: "#43A047",
          pointBorderColor: "transparent",
          borderColor: "#43A047",
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [4, 4],
              color: '#e5e5e5'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#737373',
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [4, 4]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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