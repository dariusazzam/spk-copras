<?php $current_page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #444ce7 0%, #2d3282 100%);
            --glass-bg: rgba(255, 255, 255, 0.9);
        }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f8faff; 
            color: #1d2939;
            min-height: 100vh;
        }

        .navbar { 
            background: var(--glass-bg) !important; 
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(68, 76, 231, 0.1);
        }
        .nav-link { font-weight: 600; color: #475467 !important; transition: 0.3s; }
        .nav-link.active { color: #444ce7 !important; }
        
        .custom-card {
            background: #ffffff;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(68, 76, 231, 0.05);
            transition: 0.3s;
        }
        .card-header-custom {
            background: var(--primary-gradient);
            color: white;
            border-radius: 20px 20px 0 0 !important;
            padding: 20px;
            border: none;
        }


        .hero-bg {
            background: var(--primary-gradient);
            border-radius: 0 0 40px 40px;
            padding: 80px 0 120px;
            color: white;
            margin-bottom: -80px;
        }

        .btn-ranking-custom {
            background-color: #444ce7 !important;
            border: 2px solid transparent !important;
            color: white !important;
            transition: all 0.3s ease;
        }

        .btn-ranking-custom:hover {
            background-color: #ffc107 !important;
            border-color: #ffffff !important;
            color: #000 !important;
            box-shadow: 0 0 15px rgba(255, 193, 7, 0.5) !important;
            transform: translateY(-2px);
        }

        .active-ranking {
            background-color: #ffc107 !important;
            border-color: #ffffff !important;
            color: #000 !important;
            box-shadow: 0 0 15px rgba(255, 193, 7, 0.4) !important;
            transform: scale(1.05);
        }

        .active-ranking:hover {
            background-color: #ffca2c !important;
            color: #000 !important;
        }

        @keyframes pulse-soft {
            0% { transform: scale(0.95); opacity: 0.1; }
            50% { transform: scale(1.05); opacity: 0.2; }
            100% { transform: scale(0.95); opacity: 0.1; }
        }
        .animate-pulse {
            animation: pulse-soft 3s infinite ease-in-out;
        }

        * :focus {
            outline: none !important;
        }

        .btn-white {
            background: #ffffff;
            border: 1px solid #f2f4f7 !important;
            color: #475467;
            transition: all 0.3s ease;
        }

        .btn-white:hover {
            background-color: #ffffff !important;
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(68, 76, 231, 0.15) !important;
            z-index: 10;
        }

        .btn-white:hover .bi-pencil-square { color: #0dcaf0 !important; }
        .btn-white:hover .bi-trash { color: #dc3545 !important; }

        .btn-white:active, .btn-white:focus {
            outline: none !important;
            box-shadow: none !important;
            transform: translateY(-1px);
        }

        .back-btn {
            background: #ffffff !important;
            color: #444ce7 !important;
            border: none !important;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15) !important;
        }

        .back-btn:hover {
            background: #f8faff !important;
            transform: translateX(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2) !important;
        }

        .back-btn:focus, .back-btn:active {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="index.php">
            <i class="bi bi-intersect"></i> SPK-COPRAS
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item"><a class="nav-link <?= ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link <?= ($current_page == 'data_kriteria.php') ? 'active' : ''; ?>" href="data_kriteria.php">Kriteria</a></li>
                <li class="nav-item"><a class="nav-link <?= ($current_page == 'data_dosen.php') ? 'active' : ''; ?>" href="data_dosen.php">Data Dosen</a></li>

                <li class="nav-item">
                    <a class="nav-link px-4 rounded-pill ms-lg-3 shadow-sm <?= ($current_page == 'hasil_perhitungan.php') ? 'active-ranking' : 'btn-ranking-custom'; ?>" href="hasil_perhitungan.php">
                        <i class="bi bi-trophy-fill me-1"></i> Hasil Ranking
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>