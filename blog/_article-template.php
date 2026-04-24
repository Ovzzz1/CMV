<?php
/**
 * _article-template.php
 * Template universel — cemarenov.fr
 * Inclure depuis chaque article après avoir défini $d[]
 * NE PAS MODIFIER CE FICHIER
 */

// ── Bloc logique CMS ──────────────────────────────────────────────────────────
require_once dirname(__DIR__) . '/functions.php';

$article_meta = $d['meta'];

$page_title       = $article_meta['title'];
$page_description = $article_meta['excerpt'];

$current_cat  = $article_meta['category'];
$current_url  = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category     = get_category($current_cat);
$other_cats   = get_other_categories($current_cat);
$cat_articles = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles = array_slice($cat_articles, 0, 10);
$latest_articles = array_values(array_filter(get_latest_articles(11), fn($a) => ($a['url'] ?? '') !== $current_url));
$latest_articles = array_slice($latest_articles, 0, 10);

$current_title_words = array_map('mb_strtolower', explode(' ', $article_meta['title']));
$similar_articles    = [];
foreach ($cat_articles as $art) {
    if (!isset($art['title'])) continue;
    $title_words        = array_map('mb_strtolower', explode(' ', $art['title']));
    $common             = count(array_intersect($current_title_words, $title_words));
    $similar_articles[] = array_merge($art, ['score' => $common]);
}
usort($similar_articles, function ($a, $b) { return $b['score'] - $a['score']; });
$similar_articles = array_slice($similar_articles, 0, 3);
// ── Fin bloc logique CMS ──────────────────────────────────────────────────────

include dirname(__DIR__) . '/header.php';
?>

<style>
    /* Styles intégrés — vidéos et outil UX */
    .video-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; margin: 20px 0; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; }
    .ux-tool-container { background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 12px; padding: 30px; margin: 30px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; }
    .ux-tool-container h3 { margin-top: 0; color: #2c3e50; }
    .ux-step { display: none; animation: fadeIn 0.4s ease-in-out; }
    .ux-step.active { display: block; }
    .ux-question { font-size: 1.2em; font-weight: bold; margin-bottom: 20px; color: #333; }
    .ux-options { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
    .ux-btn { background: #fff; border: 2px solid #3498db; color: #3498db; padding: 12px 24px; font-size: 1em; border-radius: 8px; cursor: pointer; transition: all 0.3s ease; font-weight: bold; }
    .ux-btn:hover { background: #3498db; color: #fff; }
    .ux-result-box { background: #e8f6f3; border-left: 5px solid #1abc9c; padding: 20px; border-radius: 8px; text-align: left; margin-top: 20px; }
    .ux-warning-box { background: #fdedec; border-left: 5px solid #e74c3c; padding: 20px; border-radius: 8px; text-align: left; margin-top: 20px; }
    .cta-btn { display: inline-block; background: #e74c3c; color: #fff !important; padding: 12px 20px; border-radius: 6px; margin-top: 15px; text-align: center; text-decoration: none !important; }
    .cta-btn:hover { background: #c0392b; }
    .reset-btn { background: transparent; border: none; color: #7f8c8d; text-decoration: underline; margin-top: 20px; cursor: pointer; }
    .hashtag { color: var(--color-primary); font-weight: bold; }
    <?php if (!empty($d['guide_links_css'])): ?>
    .guide-links-box { background: #edf2f7; border-left: 4px solid #3498db; padding: 1.5em; border-radius: 8px; margin: 2em 0; }
    .guide-links-box h3 { margin-top: 0; font-size: 1.2em; color: #2c3e50; }
    .guide-links-box p { margin-bottom: 1em; }
    .guide-links-grid { display: flex; flex-wrap: wrap; gap: 10px; }
    .guide-link-item { background: #fff; border: 1px solid #cbd5e1; padding: 8px 15px; border-radius: 6px; font-weight: bold; text-decoration: none; color: #3498db; transition: all 0.2s ease; }
    .guide-link-item:hover { background: #3498db; color: #fff; border-color: #3498db; text-decoration: none; }
    <?php endif; ?>
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<article>

    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span><?php echo htmlspecialchars($d['hero']['breadcrumb']); ?></span>
            </nav>

            <div class="article-tags">
                <?php foreach ($d['hero']['tags'] as $tag): ?>
                    <span class="article-tag"><?php echo htmlspecialchars($tag); ?></span>
                <?php endforeach; ?>
            </div>

            <?php echo $d['hero']['h1']; ?>

            <div class="article-meta-header" style="flex-wrap: wrap; gap: 15px;">
                <a href="<?php echo BASE_URL; ?>philippe" class="author-badge-top">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                    <div class="author-badge-text">
                        Par <strong>Philippe</strong>
                        <span>Artisan RGE</span>
                    </div>
                </a>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Mis à jour le <?php echo format_date_fr($article_meta['date']); ?>
                </div>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Lecture : <?php echo $article_meta['reading_time']; ?> min
                </div>
            </div>

        </div>
    </section>

    <div class="article-layout">

        <aside class="sidebar-left">
            <div class="sidebar-sticky">
                <h3 class="sidebar-title">Nos Univers</h3>
                <?php foreach ($other_cats as $slug => $cat): ?>
                    <a href="<?php echo BASE_URL . $slug; ?>" class="sidebar-cat-card">
                        <img src="<?php echo $cat['image']; ?>" alt="<?php echo htmlspecialchars($cat['name']); ?>">
                        <span class="sidebar-cat-name"><?php echo htmlspecialchars($cat['name']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </aside>

        <div class="article-container">

            <p class="article-intro"><?php echo $d['intro']; ?></p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <?php foreach ($d['tldr'] as $item): ?>
                            <li><strong><?php echo htmlspecialchars($item['label']); ?> :</strong> <?php echo $item['text']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <?php foreach ($d['toc'] as $entry): ?>
                            <li><a href="<?php echo $entry['anchor']; ?>"><?php echo htmlspecialchars($entry['label']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <?php echo $d['content']; ?>

                <h2 id="ux-outil">⚙️ <?php echo htmlspecialchars($d['ux']['h2']); ?></h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3><?php echo htmlspecialchars($d['ux']['title']); ?></h3>

                    <?php foreach ($d['ux']['steps'] as $i => $step): $n = $i + 1; ?>
                    <div id="step-<?php echo $n; ?>" class="ux-step<?php echo $n === 1 ? ' active' : ''; ?>">
                        <div class="ux-question"><?php echo $n; ?>. <?php echo htmlspecialchars($step['question']); ?></div>
                        <div class="ux-options">
                            <?php foreach ($step['options'] as $opt): ?>
                                <button class="ux-btn" onclick="saveAnswer(<?php echo $n; ?>, '<?php echo $opt['value']; ?>')"><?php echo htmlspecialchars($opt['label']); ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;"><?php echo htmlspecialchars($d['ux']['success_title']); ?></h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;"><?php echo htmlspecialchars($d['ux']['warning_title']); ?></h4>
                            <p id="warning-text"><?php echo $d['ux']['warning_text']; ?></p>
                            <?php if (!empty($d['ux']['warning_cta'])): ?>
                                <a href="<?php echo BASE_URL; ?>contact" class="cta-btn"><?php echo htmlspecialchars($d['ux']['warning_cta']); ?></a>
                            <?php endif; ?>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <?php foreach ($d['faq'] as $item): ?>
                    <h3><?php echo htmlspecialchars($item['q']); ?></h3>
                    <p><?php echo $item['a']; ?></p>
                <?php endforeach; ?>

            </div> <!-- .article-content -->

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p><?php echo $d['author_phrase']; ?></p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3><?php echo htmlspecialchars($d['conclusion']['title']); ?></h3>
                <p><?php echo $d['conclusion']['text']; ?></p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary"><?php echo htmlspecialchars($d['conclusion']['cta']); ?></a>
            </div>

            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            </div>
                            <h4><?php echo htmlspecialchars($art['title']); ?></h4>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>

        </div> <!-- .article-container -->

        <aside class="sidebar-right">
            <div class="sidebar-sticky">

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name']); ?></h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>

            </div>
        </aside>

    </div> <!-- .article-layout -->
</article>

<script>
    let userAnswers = {};

    function saveAnswer(stepNumber, answer) {
        userAnswers['step' + stepNumber] = answer;
        document.getElementById('step-' + stepNumber).classList.remove('active');
        if (stepNumber < 3) {
            document.getElementById('step-' + (stepNumber + 1)).classList.add('active');
        } else {
            generateResult();
        }
    }

    function generateResult() {
        document.getElementById('step-result').classList.add('active');
        const successBox = document.getElementById('success-result');
        const warningBox = document.getElementById('warning-result');
        const resultText = document.getElementById('result-text');
        successBox.style.display = 'none';
        warningBox.style.display = 'none';
        <?php echo $d['ux']['js_logic']; ?>
    }

    function resetTool() {
        userAnswers = {};
        document.getElementById('step-result').classList.remove('active');
        document.getElementById('step-1').classList.add('active');
    }
</script>

<?php
// Schema.org Structured Data
require_once dirname(__DIR__) . '/schema-data.php';
$_schema = get_schema_data(basename($_SERVER['SCRIPT_FILENAME'], '.php'));
if (!isset($_schema['faq']) || empty($_schema['faq'])) {
    $_schema['faq'] = array_map(fn($f) => ['question' => $f['q'], 'answer' => strip_tags($f['a'])], $d['faq']);
}
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>
