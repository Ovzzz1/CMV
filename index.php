<?php
/**
 * index.php
 * Main homepage for Expert Renov' blog.
 * Dynamically renders all sections using functions.php helpers.
 */
require_once 'functions.php';

// Page meta
$page_title = "Expert Renov' - Le Blog Travaux, Maison & Immo";
$page_description = "Expert Renov' : votre référence en rénovation, immobilier, maison et travaux. Guides, conseils d'experts et inspirations pour sublimer votre habitat.";

// Fetch data
$latest_articles = get_latest_articles(15);

// Include header
include 'header.php';
?>

<?php if (isset($_GET['contact'])): ?>
<div class="contact-msg <?php echo $_GET['contact'] === 'ok' ? 'contact-msg-ok' : 'contact-msg-error'; ?>" id="contact-banner">
    <?php echo $_GET['contact'] === 'ok'
        ? '✅ Merci ! Votre message a bien été envoyé. Nous vous répondrons sous 48h.'
        : '❌ Une erreur est survenue. Veuillez vérifier votre e-mail et réessayer.'; ?>
</div>
<?php
endif; ?>

<!-- HERO -->
<section class="hero">
    <div class="hero-content">
        <span class="tagline">Expertise & Savoir-faire</span>
        <h1>L'art de la <span>rénovation</span> de votre habitat</h1>
        <p>Découvrez nos guides pointus, conseils d'experts et inspirations pour sublimer votre bien immobilier. De
            l'achat jusqu'aux finitions travaux.</p>
        <form action="<?php echo BASE_URL; ?>recherche" method="GET" class="search-bar">
            <input type="text" name="q" placeholder="Ex: Investissement, Rénovation énergétique..." required>
            <button type="submit">Rechercher</button>
        </form>
    </div>
    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
            alt="Maison classique rénovée avec élégance">
    </div>
</section>

<!-- 12 DERNIERS ARTICLES (Quick Grid) -->
<section class="quick-latest">
    <h2>À la une sur Expert Renov'</h2>
    <div class="quick-grid">
        <?php foreach ($latest_articles as $article): ?>
            <?php echo render_quick_card($article); ?>
            <?php
endforeach; ?>
    </div>
</section>

<!-- SECTION À PROPOS -->
<section class="about-section" id="propos">
    <div class="about-images">
        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
            alt="Maison moderne architecturale" class="img-main">
        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
            alt="Détail façade" class="img-sub">
    </div>
    <div class="about-content">
        <span class="tag-small">À PROPOS</span>
        <h2>L'Expertise au Service de votre Habitat.</h2>
        <p>Nous vous accompagnons dans tous vos projets immobiliers avec des contenus de qualité et des conseils
            d'experts. De l'achat de votre premier bien aux travaux de rénovation de grande ampleur, notre expertise
            éditoriale vous guide à chaque étape pour prendre les meilleures décisions.</p>
        <ul class="checklist">
            <li>
                <div class="checklist-icon">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
                Des professionnels de l'immobilier et de la rénovation
            </li>
            <li>
                <div class="checklist-icon">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
                Analyses techniques et stratégies d'investissement
            </li>
            <li>
                <div class="checklist-icon">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
                Suivi des lois, normes et aides financières
            </li>
        </ul>
    </div>
</section>

<?php $contact_instance = '1';
include 'contact-banner.php'; ?>

<!-- SECTION EEAT / AUTEUR -->
<section class="author-banner"
    style="background-color: var(--color-white); padding: 4rem 5%; margin: 2rem auto 4rem; max-width: 1200px; border-radius: 24px; box-shadow: 0 10px 30px rgba(62, 46, 31, 0.05); display: flex; align-items: center; gap: 4rem; flex-wrap: wrap;">
    <div style="flex-shrink: 0; position: relative; margin: 0 auto;">
        <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe, Artisan Expert"
            style="width: 220px; height: 220px; border-radius: 50%; object-fit: cover; border: 6px solid var(--color-light); box-shadow: 0 15px 35px rgba(62,46,31,0.1);">
        <div style="position: absolute; bottom: 10px; right: 10px; background: var(--color-primary); color: white; width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(191,148,105,0.4);"
            title="Expert Vérifié">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
        </div>
    </div>
    <div style="flex: 1; min-width: 300px;">
        <span class="tag-small">NOTRE CAUTION TECHNIQUE</span>
        <h2 style="font-size: 2.2rem; margin-bottom: 1rem; line-height: 1.2;">Qui suis-je ? Philippe, artisan qualifié.
        </h2>
        <p style="font-size: 1.05rem; margin-bottom: 1.5rem; color: var(--color-text);">
            Avec plus de <strong>20 ans d'expérience</strong> sur le terrain de la rénovation et de la maçonnerie, je
            partage ici mon expertise pratique. Mon but ? Rendre le bâtiment compréhensible, vous aider à éviter les
            arnaques et vous garantir des travaux conformes aux normes techniques les plus strictes.
        </p>
        <a href="<?php echo BASE_URL; ?>philippe"
            style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; color: var(--color-white); background-color: var(--color-dark); padding: 0.8rem 1.8rem; border-radius: 50px; transition: background-color 0.3s; box-shadow: 0 4px 10px rgba(0,0,0,0.1);"
            onmouseover="this.style.backgroundColor='var(--color-secondary)'"
            onmouseout="this.style.backgroundColor='var(--color-dark)'">
            Découvrir mon parcours
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </a>
    </div>
</section>

<!-- SECTION THÉMATIQUES -->
<section class="themes-section" id="thematiques">
    <span class="tag-small">NOS THÉMATIQUES</span>
    <h2>Tous les Sujets<br>Immobilier, Maison & Travaux</h2>

    <div class="themes-grid">
        <?php foreach ($categories as $slug => $cat): ?>
            <div class="theme-card">
                <div class="theme-image">
                    <img src="<?php echo htmlspecialchars($cat['image']); ?>"
                        alt="<?php echo htmlspecialchars($cat['name']); ?>">
                </div>
                <div class="theme-info">
                    <div class="theme-icon">
                        <?php echo $cat['icon']; ?>
                    </div>
                    <h3><?php echo htmlspecialchars($cat['name']); ?></h3>
                    <p><?php echo htmlspecialchars($cat['desc']); ?></p>
                </div>
            </div>
            <?php
endforeach; ?>
    </div>
</section>

<!-- BANDES PAR CATÉGORIE (dynamique) -->
<?php foreach (array_keys($categories) as $slug): ?>
    <?php echo render_category_band($slug); ?>
<?php
endforeach; ?>

<?php $contact_instance = '2';
include 'contact-banner.php'; ?>


<?php include 'footer.php'; ?>
