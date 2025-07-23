<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eat&Drink - Accueil</title>
    <style>
        body { background: #d1fae5; font-family: Arial, sans-serif; }
        .header {
            width: 100%;
            background: #d1fae5;
            box-shadow: 0 2px 8px #0001;
            padding: 1rem 0.5rem 1rem 0.5rem;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-title {
            margin-left: 2.5rem;
            font-size: 1.5rem;
            font-weight: bold;
            color: #059669; /* vert foncé, tu peux ajuster */
            letter-spacing: 1px;
        }
        .header-link {
            margin-right: 2.5rem;
            color: #2563eb;
            font-weight: bold;
            text-decoration: none;
            font-size: 1rem;
            padding: 0.5em 1.2em;
            border-radius: 6px;
            transition: background 0.2s;
        }
        .header-link:hover {
            background: #dbeafe;
            text-decoration: underline;
        }
        .center { display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; }
        .card { background: #fff; border-radius: 12px; box-shadow: 0 2px 8px #0001; padding: 2rem 2.5rem; text-align: center; min-width: 320px; margin-top: 4.5rem; }
        .links { margin-top: 2rem; display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap; }
        .btn { padding: 0.7em 1.5em; border-radius: 6px; border: none; font-weight: bold; cursor: pointer; font-size: 1rem; }
        .btn-green { background: #22c55e; color: #fff; }
        .btn-blue { background: #2563eb; color: #fff; }
        .btn-green:hover { background: #16a34a; }
        .btn-blue:hover { background: #1d4ed8; }
        a { color: #2563eb; text-decoration: none; font-weight: 600; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="header">
        <span class="header-title">Eat&amp;Drink</span>
        <a href="{{ route('login') }}" class="header-link">Se connecter</a>
    </div>
    <div class="center">
        <div class="card">
            <h1>Bienvenue sur la plateforme <span style="color:#fbbf24">Eat&amp;Drink</span> !</h1>
            <p style="margin-bottom:1.5em;">L'événement culinaire <b>Eat&amp;Drink</b> rassemble des restaurateurs, artisans et passionnés de gastronomie.<br>
            Inscrivez-vous pour exposer vos produits ou découvrez les stands de nos entrepreneurs !</p>
            <div class="links">
                <a href="{{ route('register') }}" class="btn btn-green">S'inscrire comme entrepreneur</a>
                <a href="{{ route('login') }}" class="btn btn-blue">Se connecter</a>
            </div>
            <h2 style="margin-top:2em; font-size:1.2em;">Nos Exposants</h2>
            <p>Découvrez la liste des stands et leurs produits lors de l'événement !</p>
            <a href="{{ route('stands.index') }}">Voir les exposants</a>
        </div>
    </div>
</body>
</html>
