<?php
/**
 * category.php
 * Category archive page for Expert Renov' blog.
 * Displays articles filtered by category with pagination.
 */
require_once 'functions.php';

// ---- Get category from URL ----
$cat_slug = isset($_GET['cat']) ? trim($_GET['cat']) : '';
$cat = get_category($cat_slug);

// Redirect to index if invalid category
if (!$cat) {
    header('Location: ' . BASE_URL);
    exit;
}

// ---- Pagination ----
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$result = get_paginated_articles($cat_slug, $page, ARTICLES_PER_PAGE);
$page_articles = $result['articles'];
$total_articles = $result['total'];
$total_pages = $result['total_pages'];
$current_page = $result['current_page'];

// ---- Other categories for interlinking ----
$other_cats = get_other_categories($cat_slug);

// ---- Page meta ----
$page_title = "Nos articles " . $cat['name'];
$page_description = $cat['desc'] . " Retrouvez tous nos articles sur le thème " . $cat['name'] . " sur Expert Renov'.";

include 'header.php';
?>

    <!-- HERO CATÉGORIE -->
    <section class="cat-hero" style="background-image: linear-gradient(rgba(62,46,31,0.55), rgba(62,46,31,0.7)), url('<?php echo htmlspecialchars($cat['image']); ?>');">
        <div class="cat-hero-content">
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span><?php echo htmlspecialchars($cat['name']); ?></span>
            </nav>
            <h1>Nos articles <?php echo htmlspecialchars($cat['name']); ?></h1>
            <p><?php echo htmlspecialchars($cat['desc']); ?></p>
            <div class="cat-count"><?php echo $total_articles; ?> article<?php echo $total_articles > 1 ? 's' : ''; ?></div>
        </div>
    </section>

    <!-- INTERLINKING : AUTRES CATÉGORIES (haut de page) -->
    <section class="cat-interlink">
        <div class="interlink-inner">
            <span class="interlink-label">Parcourir aussi :</span>
            <?php foreach ($other_cats as $slug => $other): ?>
                <a href="<?php echo BASE_URL . $slug; ?>" class="interlink-chip">
                    <?php echo htmlspecialchars($other['name']); ?>
                </a>
            <?php
endforeach; ?>
        </div>
    </section>

    <!-- LISTING DES ARTICLES -->
    <section class="cat-listing">
        <?php if (empty($page_articles)): ?>
            <p class="no-articles">Aucun article trouvé dans cette catégorie.</p>
        <?php
else: ?>
            <?php foreach ($page_articles as $article): ?>
                <a href="<?php echo htmlspecialchars($article['url'] ?? '#'); ?>" class="archive-card">
                    <div class="archive-img">
                        <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                    </div>
                    <div class="archive-content">
                        <div class="archive-meta">
                            <span class="archive-date">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                <?php echo format_date_fr($article['date']); ?>
                            </span>
                            <span class="archive-reading">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                Lecture <?php echo (int)$article['reading_time']; ?> min
                            </span>
                        </div>
                        <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                        <p><?php echo htmlspecialchars($article['excerpt']); ?></p>
                        <span class="archive-read-more">
                            Lire l'article
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </span>
                    </div>
                </a>
            <?php
    endforeach; ?>
        <?php
endif; ?>

        <!-- PAGINATION -->
        <?php echo render_pagination($cat_slug, $current_page, $total_pages); ?>
    </section>

    <!-- INTERLINKING : AUTRES CATÉGORIES (bas de page) -->
    <section class="cat-bottom-interlink">
        <h2>Découvrez nos autres thématiques</h2>
        <div class="bottom-interlink-grid">
            <?php foreach ($other_cats as $slug => $other): ?>
                <a href="<?php echo BASE_URL . $slug; ?>" class="bottom-interlink-card" style="background-image: linear-gradient(rgba(62,46,31,0.4), rgba(62,46,31,0.7)), url('<?php echo htmlspecialchars($other['image']); ?>');">
                    <div class="bottom-interlink-icon"><?php echo $other['icon']; ?></div>
                    <h3><?php echo htmlspecialchars($other['name']); ?></h3>
                    <p><?php echo htmlspecialchars($other['desc']); ?></p>
                </a>
            <?php
endforeach; ?>
        </div>
    </section>

<?php include 'footer.php'; ?>
