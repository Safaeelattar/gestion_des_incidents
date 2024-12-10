<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Incidents</title>
    <!-- Lien vers Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Lien vers AOS pour les animations -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/l.jpg'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        /* Appliquer la police moderne et le fond */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: #333;
            margin: 0;
            padding: 0;
            min-height: 100vh; /* Assure que le fond couvre toute la hauteur */
            display: flex;
            flex-direction: column;
        }
        header {
    color: white;
}


        /* Style des boutons */
        .btn-admin, .btn-user {
            padding: 15px 30px;
            font-size: 16px;
            text-transform: uppercase;
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.4s ease;
            margin: 10px;
            cursor: pointer;
            color: white;
        }

        .btn-admin {
            background-color: #4CAF50;
            border: 1px solid #4CAF50;
        }

        .btn-admin:hover {
            background-color: #45a049;
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-user {
            background-color: #008CBA;
            border: 1px solid #008CBA;
        }

        .btn-user:hover {
            background-color: #007B9A;
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Style du conteneur de l'image du héros */
        .hero-img {
            text-align: center;
            margin-top: 50px;
        }

        .hero-img img {
            width: 100%;
            max-width: 600px;
        }

        /* Section des fonctionnalités */
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        /* Section de pied de page */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        /* Bouton flottant de contact */
        .btn-floating {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #008CBA;
            color: white;
            border-radius: 50%;
            padding: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .btn-floating:hover {
            background-color: #007B9A;
        }

        /* Media Queries pour la réactivité */
        @media (max-width: 768px) {
            .button-container {
                flex-direction: column;
                align-items: center;
            }

            .hero-img img {
                width: 100%;
            }

            h4 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Section de l'en-tête -->
    <header class="text-center py-5">
        <p class="display-4">Bienvenue dans l'application de gestion des incidents</p>
        <p class="lead">Gérez vos incidents de manière simple et efficace.</p>
    </header>

    <!-- Section des boutons d'accès -->
    <div class="button-container text-center">
        <a href="<?= base_url('admin_login'); ?>" class="btn btn-admin">Accéder à l'admin</a>
        <a href="<?= base_url('register'); ?>" class="btn btn-user">Accéder à l'utilisateur</a>
    </div>

    <!-- Section des fonctionnalités -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg rounded" data-aos="fade-up">
                    <img src="<?= base_url('assets/img/0.jpg'); ?>" class="card-img-top" alt="Feature 1">
                    <div class="card-body">
                        <h5 class="card-title">Gestion Simple</h5>
                        <p class="card-text">Gérez facilement tous vos incidents avec une interface intuitive.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg rounded" data-aos="fade-up">
                    <img src="<?= base_url('assets/img/1.jpg'); ?>" class="card-img-top" alt="Feature 2">
                    <div class="card-body">
                        <h5 class="card-title">Mises à Jour en Temps Réel</h5>
                        <p class="card-text">Recevez des notifications instantanées pour chaque mise à jour d'incident.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg rounded" data-aos="fade-up">
                    <img src="<?= base_url('assets/img/2.jpg'); ?>" class="card-img-top" alt="Feature 3">
                    <div class="card-body">
                        <h5 class="card-title">Suivi des Statuts</h5>
                        <p class="card-text">Suivez et résolvez les incidents plus rapidement grâce au tableau de bord de suivi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton flottant de contact -->
    <a href="#contact" class="btn btn-primary btn-floating">
        <i class="fas fa-envelope"></i>
    </a>

    <!-- Footer -->
    <footer class="footer">
        &copy; 2024 Gestion des Incidents. Tous droits réservés.
    </footer>

    <!-- Script de Bootstrap et AOS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Initialiser les animations AOS
        AOS.init();
    </script>

</body>
</html>
