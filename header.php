<?php
/**
 * header.php
 * Reusable header include for Expert Renov' blog.
 */
if (!headers_sent()) {
    header('Content-Type: text/html; charset=utf-8');
}

// ── Self-canonical ──────────────────────────────────────────
// Reconstruit toujours l'URL en https://www. peu importe comment
// la page a été appelée (http, sans-www, avec .php, avec slash…)
$canonical_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Supprime l'extension .php si elle traîne dans l'URL interne
$canonical_path = preg_replace('/\.php$/', '', $canonical_path);
// Supprime le slash final sauf pour la home "/"
if ($canonical_path !== '/') {
    $canonical_path = rtrim($canonical_path, '/');
}
$canonical_url = 'https://www.cemarenov.fr' . $canonical_path;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : "Expert Renov' - Blog Rénovation, Immobilier & Travaux"; ?></title>
    <meta name="description" content="<?php echo isset($page_description) ? htmlspecialchars($page_description) : "Expert Renov' : votre référence en rénovation, immobilier, maison et travaux. Guides, conseils d'experts et inspirations."; ?>">

    <!-- Canonical self-référençant -->
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

    <!-- Favicon / Logo -->
    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>logo%20renov.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@400;500;700;800&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
</head>
<body>
    <header>
        <a href="<?php echo BASE_URL; ?>" class="logo-container">
            <img src="<?php echo BASE_URL; ?>logo%20renov.png" alt="Logo Expert Renov'">
            <span class="logo-text">Expert Renov'</span>
        </a>
        <nav>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>immobilier">Immobilier</a></li>
                <li><a href="<?php echo BASE_URL; ?>maison">Maison</a></li>
                <li><a href="<?php echo BASE_URL; ?>renovation">Rénovation</a></li>
                <li><a href="<?php echo BASE_URL; ?>travaux">Travaux</a></li>
            </ul>
        </nav>
    </header>
