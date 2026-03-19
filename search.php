<?php
/**
 * search.php
 * Search results page for Expert Renov' blog.
 */
require_once 'functions.php';

// Get search query
$query = isset($_GET['q']) ? trim($_GET['q']) : '';
$results = search_articles($query);
$result_count = count($results);

// Page meta
$page_title = $query ? "Recherche : " . htmlspecialchars($query) : "Recherche";
$page_description = "Résultats de recherche pour « " . htmlspecialchars($query) . " » sur Expert Renov'.";

include 'header.php';
?>

    <!-- SEARCH HERO -->
    <section class="search-hero">
        <div class="search-hero-content">
            <h1>Rechercher un article</h1>
            <form action="<?php echo BASE_URL; ?>recherche" method="GET" class="search-bar search-bar-page">
                <input type="text" name="q" placeholder="Ex: Investissement, Rénovation énergétique..." value="<?php echo htmlspecialchars($query); ?>" required>
                <button type="submit">Rechercher</button>
            </form>
        </div>
    </section>

    <!-- RESULTS -->
    <section class="search-results">
        <?php if (!empty($query)): ?>
            <p class="search-count">
                <?php if ($result_count > 0): ?>
                    <strong><?php echo $result_count; ?></strong> r&eacute;sultat<?php echo $result_count > 1 ? 's' : ''; ?> pour &laquo;&nbsp;<?php echo htmlspecialchars($query); ?>&nbsp;&raquo;
                <?php
    else: ?>
                    Aucun r&eacute;sultat pour &laquo;&nbsp;<?php echo htmlspecialchars($query); ?>&nbsp;&raquo;
                <?php
    endif; ?>
            </p>

            <?php if ($result_count > 0): ?>
                <div class="search-grid">
                    <?php foreach ($results as $article): ?>
                        <a href="<?php echo htmlspecialchars($article['url']); ?>" class="search-card">
                            <div class="search-card-img">
                                <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                            </div>
                            <div class="search-card-body">
                                <?php if (!empty($article['category']) && isset($categories[$article['category']])): ?>
                                    <span class="search-card-cat"><?php echo htmlspecialchars($categories[$article['category']]['name']); ?></span>
                                <?php
            endif; ?>
                                <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                                <?php if (!empty($article['excerpt'])): ?>
                                    <p><?php echo htmlspecialchars($article['excerpt']); ?></p>
                                <?php
            endif; ?>
                                <span class="search-card-meta">
                                    <?php echo format_date_fr($article['date']); ?> &bull; <?php echo $article['reading_time']; ?> min de lecture
                                </span>
                            </div>
                        </a>
                    <?php
        endforeach; ?>
                </div>
            <?php
    else: ?>
                <div class="search-empty">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <h2>Aucun article trouv&eacute;</h2>
                    <p>Essayez avec d'autres mots-cl&eacute;s ou parcourez nos th&eacute;matiques :</p>
                    <div class="search-suggestions">
                        <?php foreach ($categories as $slug => $cat): ?>
                            <a href="<?php echo BASE_URL . $slug; ?>" class="search-tag"><?php echo htmlspecialchars($cat['name']); ?></a>
                        <?php
        endforeach; ?>
                    </div>
                </div>
            <?php
    endif; ?>
        <?php
else: ?>
            <div class="search-empty">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <h2>Recherchez un article</h2>
                <p>Tapez un mot-cl&eacute; pour trouver un article parmi nos guides et conseils.</p>
                <div class="search-suggestions">
                    <?php foreach ($categories as $slug => $cat): ?>
                        <a href="<?php echo BASE_URL . $slug; ?>" class="search-tag"><?php echo htmlspecialchars($cat['name']); ?></a>
                    <?php
    endforeach; ?>
                </div>
            </div>
        <?php
endif; ?>
    </section>

<?php include 'footer.php'; ?>
