<?php
/**
 * faitage.php
 * Article: Faîtage de toiture : produits, mise en œuvre et prix
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Faîtage toiture : Prix au ml, Pose et Guide 2026',
    'category' => 'travaux',
    'image' => 'https://www.cemarenov.fr/image/faitage3.webp',
    'excerpt' => 'Faîtage fissuré ? 🚨 Découvrez les prix au ml, la technique du closoir ventilé et les erreurs fatales à éviter. Simulateur budget inclus !',
    'date' => '2026-03-09',
    'reading_time' => 7,
];

require_once dirname(__DIR__) . '/functions.php';

$page_title = $article_meta['title'];
$page_description = $article_meta['excerpt'];

// Current article category + self-exclusion filter
$current_cat = $article_meta['category'];
$current_url = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category = get_category($current_cat);
$other_cats = get_other_categories($current_cat);
$cat_articles = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles = array_slice($cat_articles, 0, 10);
$latest_articles = array_values(array_filter(get_latest_articles(11), fn($a) => ($a['url'] ?? '') !== $current_url));
$latest_articles = array_slice($latest_articles, 0, 10);

// Similar articles: pick 3 from category (excluding self) whose titles share the most words
$current_title_words = array_map('mb_strtolower', explode(' ', $article_meta['title']));
$similar_articles = [];
foreach ($cat_articles as $art) {
    if (!isset($art['title']))
        continue;
    $title_words = array_map('mb_strtolower', explode(' ', $art['title']));
    $common = count(array_intersect($current_title_words, $title_words));
    $similar_articles[] = array_merge($art, ['score' => $common]);
}
usort($similar_articles, function ($a, $b) {
    return $b['score'] - $a['score'];
});
$similar_articles = array_slice($similar_articles, 0, 3);

include dirname(__DIR__) . '/header.php';
?>

<!-- ARTICLE HERO (full width) -->
<article>
    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>">
                    <?php echo htmlspecialchars($category['name']); ?>
                </a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Faîtage</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Charpente</span>
            </div>

            <h1>Faîtage de toiture :<br>
                <span class="h1-accent">Produits, mise en œuvre et prix</span>
            </h1>

            <div class="article-meta-header" style="flex-wrap: wrap; gap: 15px;">
                <a href="<?php echo BASE_URL; ?>philippe" class="author-badge-top">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                    <div class="author-badge-text">
                        Par <strong>Philippe</strong>
                        <span>Artisan RGE</span>
                    </div>
                </a>

                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    Mis à jour le
                    <?php echo format_date_fr($article_meta['date']); ?>
                </div>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                    Lecture :
                    <?php echo $article_meta['reading_time']; ?> min
                </div>
            </div>
        </div>
    </section>

    <!-- 3-COLUMN LAYOUT -->
    <div class="article-layout">

        <!-- LEFT SIDEBAR: Other Categories -->
        <aside class="sidebar-left">
            <div class="sidebar-sticky">
                <h3 class="sidebar-title">Nos Univers</h3>
                <?php foreach ($other_cats as $slug => $cat): ?>
                    <a href="<?php echo BASE_URL . $slug; ?>" class="sidebar-cat-card">
                        <img src="<?php echo $cat['image']; ?>" alt="<?php echo htmlspecialchars($cat['name']); ?>">
                        <span class="sidebar-cat-name">
                            <?php echo htmlspecialchars($cat['name']); ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </aside>

        <!-- MAIN CONTENT (center) -->
        <div class="article-container">

            <p class="article-intro">
                La <strong>ligne de rencontre</strong> haute entre <strong>deux pans</strong> de toit n'a pas droit à
                l'erreur : elle exige une <strong>bonne étanchéité</strong> sous peine d'infiltrations majeures. Fini le
                ciment qui casse sous le gel. Aujourd'hui, un <strong>faîtage ventilé</strong> posé à sec garantit la
                solidité de la couverture. <strong>Selon le type</strong> de charpente et de tuile, les <strong>données
                    techniques</strong> et les <strong>profils de finition</strong> varient. Consultez toujours la
                <strong>fiche technique</strong> de vos matériaux avant d'intervenir. Que votre toit soit en
                <strong>terre cuite</strong> ou en <strong>acier galvanisé</strong>, cette <strong>jonction des
                    versants</strong> doit impérativement respirer pour protéger vos combles de la condensation.
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel en 3 points
                    </div>
                    <ul>
                        <li><strong>Budget :</strong> 40 à 100 € par mètre linéaire (fourniture et pose).</li>
                        <li><strong>Rôle :</strong> Assurer l'étanchéité aux intempéries et l'aération naturelle de la
                            charpente.</li>
                        <li><strong>Norme DTU :</strong> La pose à sec (fixation mécanique avec closoir) remplace
                            définitivement le scellement au mortier.</li>
                    </ul>
                </div>

                <img src="<?php echo BASE_URL; ?>image/faitage1.webp"
                    alt="Schéma en coupe d'une toiture montrant le faîtage au sommet, la ligne de rencontre des deux versants et l'emplacement exact de la panne faîtière sous la couverture."
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#anatomie">1. Anatomie : le rôle de la panne faîtière</a></li>
                        <li><a href="#mise-en-oeuvre">2. Closoir ventilé ou faîtage maçonné : la mise en œuvre</a></li>
                        <li><a href="#produits">3. Choix des produits : tuile terre cuite et accessoires</a></li>
                        <li><a href="#quand-refaire">4. Comment savoir s'il faut refaire son faîtage ?</a></li>
                        <li><a href="#prix">5. Prix au mètre linéaire (Simulateur)</a></li>
                        <li><a href="#faq">6. FAQ : questions fréquentes</a></li>
                    </ul>
                </div>

                <!-- Section 1 -->
                <h2 id="anatomie">1. Anatomie : le rôle de la panne faîtière</h2>
                <p>Le faîtage ne sert pas qu'à faire joli. Il repose directement sur la <strong>panne
                        faîtière</strong>, la poutre maîtresse située au sommet de votre charpente. Son rôle est double
                    : il doit <strong>assurer l'étanchéité</strong> face à la pluie et au vent, tout en laissant l'air
                    chaud s'échapper. Sans cette indispensable aération naturelle, le bois de tête s'asphyxie et finit
                    invariablement par pourrir, ce qui obligerait à lancer un très lourd <a
                        href="<?php echo BASE_URL; ?>traitement-curatif-charpente"
                        style="text-decoration: underline;">traitement curatif de charpente en bois</a> pour sauver la
                    structure.</p>

                <img src="<?php echo BASE_URL; ?>image/faitage4.webp"
                    alt="Détail de la panne faîtière en bois massif au sommet d'une charpente traditionnelle"
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <!-- Section 2 -->
                <h2 id="mise-en-oeuvre">2. Closoir ventilé ou faîtage maçonné : la mise en œuvre</h2>
                <p>En 20 ans de chantier, j'ai dû piocher des dizaines de faîtages maçonnés ruinés. Le mortier gèle en
                    hiver, se dilate en été, et finit inévitablement par fissurer. Aujourd'hui, la <strong>réalisation
                        d'un faîtage</strong> à sec est la norme absolue. L'artisan va <strong>fixer le
                        faîtage</strong> avec un <strong>closoir</strong> (un rouleau souple en plomb ou aluminium
                    plissé) déroulé sur la lisse de rehausse. Les tuiles viennent ensuite se visser par-dessus.</p>

                <img src="<?php echo BASE_URL; ?>image/faitage3.webp"
                    alt="Photo de chantier montrant les mains d'un artisan en train de dérouler et maroufler un closoir ventilé souple de couleur brique sur la lisse de rehausse, avant de poser les tuiles de crête."
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de pose</th>
                                <th>Résistance aux intempéries</th>
                                <th>Ventilation des combles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>À sec (Closoir ventilé)</strong></td>
                                <td>Excellente (absorbe les mouvements structurels)</td>
                                <td>Optimale (micro-perforations)</td>
                            </tr>
                            <tr>
                                <td><strong>Maçonné (Mortier ciment)</strong></td>
                                <td>Faible (fissure avec les écarts thermiques)</td>
                                <td>Nulle (risque de condensation)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section 3 -->
                <h2 id="produits">3. Choix des produits : tuile terre cuite et accessoires</h2>
                <p>Les <strong>produits</strong> de couverture doivent correspondre à l'architecture de votre région :
                </p>

                <img src="<?php echo BASE_URL; ?>image/faitage5.webp"
                    alt="Différents types de tuiles faîtières exposées : demi-ronde en terre cuite, angulaire et profil zinc"
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <ul class="custom-list">
                    <li><strong>La tuile terre cuite (soumise à un <a
                                href="<?php echo BASE_URL; ?>demoussage-tuiles-terre-cuite"
                                style="text-decoration: underline;">démoussage de toiture terre cuite</a> régulier)
                            :</strong> Qu'elle soit demi-ronde (canal) ou angulaire, c'est la
                        <strong>tuile faîtière</strong> classique. Elle se fixe désormais avec des crochets ou des vis
                        en inox avec rondelle néoprène.
                    </li>
                    <li><strong>L'acier galvanisé ou zinc :</strong> Souvent plié sur mesure, on l'utilise pour les
                        toitures industrielles (bacs aciers) ou en ardoise.</li>
                    <li><strong>Les accessoires :</strong> N'oubliez pas les frontons (pièce de finition en bout de
                        ligne) et les poinçons pour les jonctions à plusieurs pans.</li>
                </ul>

                <!-- Section 4 -->
                <h2 id="quand-refaire">4. Comment savoir s'il faut refaire son faîtage ?</h2>
                <p>Inutile de monter sur le toit : une simple inspection visuelle depuis le sol avec des jumelles
                    suffit. Les signes d'alerte sont clairs : un mortier qui s'effrite et tombe dans les gouttières, des
                    tuiles de crête qui se soulèvent ou ne sont plus alignées, ou encore des traces d'humidité au
                    plafond de vos combles aménagés. Si vous observez cela, l'<strong>étanchéité globale de la
                        couverture</strong> est déjà lourdement compromise, et cela pourrait même dériver vers un <a
                        href="<?php echo BASE_URL; ?>remaniement-de-couverture"
                        style="text-decoration: underline;">remaniement de votre couverture</a> complet.</p>

                <img src="<?php echo BASE_URL; ?>image/faitage6.webp"
                    alt="Photographie illustrant un vieux faîtage scellé au mortier avec d'importantes fissures et des morceaux de ciment manquants, démontrant la nécessité d'une rénovation urgente."
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <!-- Section 5 -->
                <h2 id="prix">5. Prix au mètre linéaire (Simulateur)</h2>
                <p>Comptez environ 40 à 60 €/ml pour une pose à sec sur une toiture neuve. En rénovation, s'il faut
                    déposer et évacuer l'ancien ciment, le tarif grimpe entre 70 et 100 €/ml. Estimez votre budget :</p>

                <img src="<?php echo BASE_URL; ?>image/faitage7.webp"
                    alt="Artisan couvreur posant les dernières tuiles faîtières sur un closoir ventilé neuf"
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <div
                    style="background: #fff; border: 1px solid #e2e8f0; padding: 25px; border-radius: 8px; margin: 30px 0; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                    <h3 style="margin-top: 0; color: var(--color-primary); font-size: 1.3rem;">🧮 Simulateur Rénovation
                        Faîtage</h3>

                    <div style="margin-bottom: 25px;">
                        <label for="roof-length"
                            style="font-weight: 600; display: block; margin-bottom: 10px; font-size: 1.1em; color: var(--color-dark);">
                            Longueur de la crête du toit :
                            <span id="length-val"
                                style="color: var(--color-accent); font-weight: 800; font-size: 1.25em;">10</span>
                            mètres
                        </label>
                        <input type="range" id="roof-length" min="1" max="50" value="10" step="1"
                            style="width: 100%; cursor: pointer; height: 8px; background: #e2e8f0; border-radius: 4px; outline: none;">
                    </div>

                    <div
                        style="display: flex; justify-content: space-between; align-items: center; padding-top: 20px; border-top: 1px solid #e2e8f0; flex-wrap: wrap; gap: 15px;">
                        <span style="font-size: 1rem; font-weight: 500;">Estimation globale (Matériel + Main d'œuvre)
                            :</span>
                        <strong
                            style="font-size: 1.5rem; color: #16a34a; background: #dcfce7; padding: 10px 20px; border-radius: 8px;">
                            <span id="price-min">400</span> €, <span id="price-max">1000</span> €
                        </strong>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const lengthInput = document.getElementById('roof-length');
                        const lengthDisplay = document.getElementById('length-val');
                        const priceMin = document.getElementById('price-min');
                        const priceMax = document.getElementById('price-max');

                        lengthInput.addEventListener('input', function () {
                            const meters = parseInt(this.value);
                            lengthDisplay.textContent = meters;
                            priceMin.textContent = meters * 40;
                            priceMax.textContent = meters * 100;
                        });
                    });
                </script>

                <!-- Section 6 -->
                <h2 id="faq">6. FAQ : questions fréquentes</h2>

                <h3>Où se trouve le faîtage d'une maison ?</h3>
                <p>Il constitue la ligne de crête la plus haute de la construction, là où les pentes de la couverture se
                    rejoignent. C'est l'élément qui subit le plus les assauts du vent.</p>

                <h3>Quelles aides de l'État pour cette rénovation ?</h3>
                <p>MaPrimeRénov' ne finance pas la réparation d'un faîte isolé. Pour espérer débloquer des subventions,
                    il devient obligatoire d'intégrer ce petit remplacement dans un projet d'amélioration énergétique
                    complet (comme par exemple une <a href="<?php echo BASE_URL; ?>isolation-sous-rampants-toiture"
                        style="text-decoration: underline;">isolation thermique sous rampants de toiture</a> classique,
                    ou sa version par l'extérieur dite Sarking).</p>

                <h3>Quel mortier utiliser pour rejointer un faîtage ?</h3>
                <p>Le faîtage se rejoint exclusivement au mortier bâtard (ciment + chaux + sable), jamais au ciment pur qui est trop rigide et se fissure dès la première gelée. Notre guide sur le <a href="https://www.cemarenov.fr/dosage-mortier-batard-faitage">dosage du mortier bâtard pour faîtage</a> détaille les proportions exactes selon l'exposition du toit et la nature des tuiles de faîte.</p>

                <h3>Comment traiter l'abergement de cheminée lors d'un rejointoiement de faîtage ?</h3>
                <p>L'abergement est souvent l'oublié du chantier de faîtage. Ce solin étanche fait le joint entre la cheminée et la couverture, s'il est dégradé, l'infiltration se fait bien avant que le faîtage lui-même pose problème. Notre guide sur l'<a href="https://www.cemarenov.fr/abergement-de-cheminee">abergement de cheminée</a> détaille les matériaux, les techniques de pose et les signes de détérioration à surveiller.</p>

            </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert R&eacute;novation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d&rsquo;exp&eacute;rience sur les chantiers, Philippe vous partage ses
                        conseils concrets et sans langue de bois pour r&eacute;ussir vos travaux et &eacute;viter les
                        arnaques.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>Un toit étanche commence par son sommet</h3>
                <p>
                    Le faîtage est la clef de voûte de votre couverture. Une rénovation par closoir ventilé supprime le
                    risque de fissure lié au gel et rallonge la durée de vie de votre charpente grâce à une aération
                    optimale. Si vous constatez le moindre ciment abîmé sur votre crête, faites appel à un couvreur
                    zingueur pour un diagnostic rapide.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis pour votre faîtage</a>
            </div>

            <!-- Similar Articles -->
            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image']; ?>"
                                    alt="<?php echo htmlspecialchars($art['title']); ?>">
                            </div>
                            <h4>
                                <?php echo htmlspecialchars($art['title']); ?>
                            </h4>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>

        </div> <!-- .article-container -->

        <!-- RIGHT SIDEBAR: Latest Articles -->
        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <!-- Latest from category -->
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles —
                        <?php echo htmlspecialchars($category['name']); ?>
                    </h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span>
                                <?php echo htmlspecialchars($art['title']); ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- Latest globally -->
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span>
                                <?php echo htmlspecialchars($art['title']); ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </aside>

    </div> <!-- .article-layout -->
</article>

<?php
// --- Schema.org Structured Data ---
require_once dirname(__DIR__) . '/schema-data.php';
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>