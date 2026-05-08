<?php
/**
 * abergement-de-cheminee.php
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Abergement de cheminée : le guide technique (Matériaux, Prix et Pose)',
    'category' => 'travaux', // Changé de 'couverture' pour matcher les 4 piliers existants
    'slug' => 'abergement-de-cheminee',
    'image' => 'https://www.cemarenov.fr/image/abergement-de-cheminee.webp',
    'excerpt' => 'Zinc, Wakaflex ou plomb : comment choisir et poser son abergement de cheminée ? Prix réels, étapes de pose et erreurs à éviter selon les règles de l\'art.',
    'date' => '2026-03-05',
    'reading_time' => 8, // Changé de 'readingtime'
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

// INCLUDE HEADER (ne plus mettre le <html><head> ni <body> manuel)
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
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Abergement de cheminée</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Guide Technique</span>
            </div>

            <h1>Abergement de cheminée :<br>
                <span class="h1-accent">Matériaux, Prix et Pose</span>
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
                    Mis à jour le <?php echo format_date_fr($article_meta['date']); ?>
                </div>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                    Lecture : <?php echo $article_meta['reading_time']; ?> min
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
                        <span class="sidebar-cat-name"><?php echo htmlspecialchars($cat['name']); ?></span>
                    </a>
                    <?php
                endforeach; ?>
            </div>
        </aside>

        <!-- MAIN CONTENT (center) -->
        <div class="article-container">

            <p class="article-intro">
                Une auréole brune sur le plafond, juste sous le conduit ? L'eau s'infiltre, car l'abergement de cheminée
                est défaillant. C'est pourtant la seule barrière efficace entre les intempéries et votre charpente. Une
                mauvaise étanchéité à la base de la souche <a href="<?php echo BASE_URL; ?>isolation-des-combles-perdus"
                    style="text-decoration: underline;">ruinera irrémédiablement l'isolation de vos combles perdus</a>
                en l'espace de quelques semaines, donc la zinguerie ne tolère pas l'à-peu-près. Matériaux, coûts réels
                et règles de pose : on remet les choses à plat.
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'ESSENTIEL
                    </div>
                    <ul>
                        <li>L'abergement assure l'étanchéité entre les tuiles et la maçonnerie du conduit.</li>
                        <li>Le zinc soudé reste la référence, mais les bandes souples (Wakaflex) se posent sans soudure.
                        </li>
                        <li>Budget matériel : <strong>150 € à 350 €</strong> pour un kit standard.</li>
                        <li>Budget pro (matériel et pose) : <strong>400 € à 800 €</strong> selon la pente.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#definition">1. C'est quoi un abergement de cheminée ?</a></li>
                        <li><a href="#materiaux">2. Zinc, Plomb ou Wakaflex : que choisir ?</a></li>
                        <li><a href="#prix">3. Prix d'un abergement : le vrai budget</a></li>
                        <li><a href="#pose">4. Les étapes de pose</a></li>
                        <li><a href="#erreurs">5. Le mythe de la réparation au silicone</a></li>
                        <li><a href="#faq">6. Questions fréquentes</a></li>
                    </ul>
                </div>

                <!-- Section 1 -->
                <h2 id="definition">C'est quoi un abergement de cheminée ?</h2>
                <p>L'abergement de cheminée est un habillage métallique conçu pour assurer l'étanchéité absolue entre la
                    toiture et la maçonnerie du conduit. Il empêche l'eau de pluie de s'infiltrer dans la charpente en
                    la guidant directement vers le bas du toit, sur les tuiles ou les ardoises.</p>

                <p>Ce dispositif ne fait pas que dévier l'eau, puisqu'il absorbe aussi les micro-mouvements de la
                    charpente liés au vent et aux variations de température. Il se compose généralement de quatre
                    éléments : la <strong>bavette d'aval</strong> (la partie basse), les <strong>noquets</strong> (les
                    côtés), la <strong>besace</strong> (la partie haute derrière le conduit) et le
                    <strong>solin</strong> (la fixation contre le mur). Sans cet assemblage, l'eau plonge inévitablement
                    le long du boisseau et fait pourrir le chevêtre, c'est-à-dire la pièce de bois qui encadre la
                    cheminée (ce qui peut <a href="<?php echo BASE_URL; ?>traitement-curatif-charpente"
                        style="text-decoration: underline;">vous obliger à payer un lourd traitement curatif pour sauver
                        le reste de la charpente</a> par la suite).</p>

                <!-- Section 2 -->
                <h2 id="materiaux">Zinc, Plomb ou Wakaflex : que choisir ?</h2>
                <p>Les négoces en matériaux proposent trois familles d'abergement. Le choix dépend évidemment de votre
                    budget, mais surtout de la forme de vos tuiles.</p>

                <h3>Le zinc ou le cuivre : la tradition</h3>
                <p>Le zinc est le standard de la couverture. Un artisan façonne et soude les feuilles à l'étain pour
                    épouser la pente exacte de votre toit, ce qui permet à ce travail sur-mesure de tenir facilement 40
                    à 50 ans, une longévité d'ailleurs parfaitement alignée avec celle d'un <a
                        href="<?php echo BASE_URL; ?>changement-de-couverture"
                        style="text-decoration: underline;">changement complet et durable de votre couverture</a>. Le
                    cuivre offre une résistance encore supérieure, mais on le réserve le plus souvent aux toitures
                    patrimoniales en ardoise à cause de son prix élevé.</p>

                <h3>Les bandes souples (type Wakaflex)</h3>
                <p>Pour la rénovation, les couvreurs utilisent de plus en plus des bandes d'étanchéité en
                    polyisobutylène armé d'aluminium. L'avantage est simple, car elles se marouflent directement sur le
                    galbe des tuiles sans nécessiter de soudure. Comme leurs bords intègrent un adhésif au butyle très
                    collant, c'est une excellente solution pour sécuriser rapidement les conduits standards.</p>

                <h3>Le plomb : lourd mais efficace</h3>
                <p>Le plomb a longtemps été utilisé parce qu'il peut être battu au marteau et déformé directement sur
                    place. Bien qu'il reste redoutable contre les infiltrations, son utilisation baisse aujourd'hui au
                    profit du zinc et des bandes synthétiques, qui sont beaucoup plus légères et écologiques.</p>

                <!-- Section 3 -->
                <h2 id="prix">Prix d'un abergement de cheminée : le vrai budget</h2>
                <p>Un kit prêt à poser chez Point.P coûte logiquement moins cher qu'une intervention sur-mesure d'un
                    artisan.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type d'intervention</th>
                                <th>Fourchette de prix estimée</th>
                                <th>Détails</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Kit abergement réglable (Zinc/Plomb)</strong></td>
                                <td>150 € à 350 €</td>
                                <td>Matériel seul. Vendu avec bavette plomb, s'adapte à la pente.</td>
                            </tr>
                            <tr>
                                <td><strong>Rouleau de bande d'étanchéité (5m)</strong></td>
                                <td>80 € à 150 €</td>
                                <td>Matériel seul (Wakaflex). Idéal pour les réparations ou petits conduits.</td>
                            </tr>
                            <tr>
                                <td><strong>Pose complète par un couvreur</strong></td>
                                <td>400 € à 800 €</td>
                                <td>Main d'œuvre et fourniture. Inclut le façonnage, la pose et les soudures.</td>
                            </tr>
                            <tr>
                                <td><strong>Réparation du solin</strong></td>
                                <td>200 € à 500 €</td>
                                <td>Remplacement de la bande et reprise des joints mastic.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>Gardez en tête que le tarif du couvreur grimpe inévitablement si le toit est très pentu, ou si
                    l'accès nécessite le montage d'un échafaudage spécifique.</p>

                <!-- Section 4 -->
                <h2 id="pose">Les étapes de pose : la règle d'or</h2>
                <p>En zinguerie, il y a un principe de base incontournable : l'élément du haut recouvre toujours
                    l'élément du bas afin que l'eau ne remonte jamais.</p>

                <h3>Étape 1 — La partie basse (l'aval)</h3>
                <p>On commence toujours par le bas du conduit. La bavette inférieure se plaque contre la façade de la
                    cheminée pour que sa partie souple vienne recouvrir les tuiles situées juste en dessous.</p>

                <h3>Étape 2 — Les flancs (les noquets)</h3>
                <p>On remonte ensuite sur les côtés. Si l'on utilise du Wakaflex sur des tuiles mécaniques, on prévoit
                    un relevé de 10 cm minimum contre le mur, tout en recouvrant au moins un galbe complet sur la tuile
                    latérale pour bloquer la pluie.</p>

                <h3>Étape 3 — La partie haute (l'amont)</h3>
                <p>C'est la zone qui reçoit le plus d'eau, donc la besace se positionne à l'arrière pour dévier
                    l'écoulement vers les côtés. Les tuiles supérieures doivent alors obligatoirement venir s'appuyer
                    par-dessus cette pièce métallique.</p>

                <h3>Étape 4 — Le solin</h3>
                <p>Pour sceller l'ensemble contre la maçonnerie, on fixe une bande métallique porte-solin avec des
                    chevilles à frapper. On applique finalement un cordon de <strong>mastic polyuréthane</strong> (une
                    colle élastomère spécial couverture) dans la lèvre de cette bande pour une finition parfaite.</p>

                <!-- Section 5 -->
                <h2 id="erreurs">Le mythe de la réparation au silicone</h2>
                <p>J'interviens au moins trois fois par hiver pour des fuites autour de cheminées, et dans la moitié des
                    cas, le propriétaire a essayé de régler le problème en vidant une cartouche de silicone sanitaire à
                    la base du conduit.</p>
                <p>C'est une grosse erreur, car sous l'action des UV et du gel, le silicone classique durcit, se
                    rétracte puis craquelle en moins d'un an. Puisqu'une toiture bouge en permanence, l'étanchéité doit
                    se gérer avec un assemblage mécanique (des tôles qui se recouvrent) et non avec un plâtre chimique.
                    C'est pourquoi, si la tôle est percée ou le vieux solin décollé, il faut gratter, nettoyer, et
                    remplacer la pièce mécanique concernée (inutile d'essayer de pulvériser un <a
                        href="<?php echo BASE_URL; ?>hydrofuge-de-toiture"
                        style="text-decoration: underline;">traitement hydrofuge de toiture</a> par-dessus pour
                    compenser, cela ne colmatera jamais une faille physique de cette taille).</p>

                <!-- Section 6 FAQ -->
                <h2 id="faq">Questions fréquentes sur l'habillage et l'isolation des cheminées</h2>

                <h3>Quel isolant mettre autour d'un conduit de cheminée ?</h3>
                <p>L'isolation d'un conduit de fumée exige des matériaux incombustibles pour respecter l'écart au feu
                    réglementaire. Les artisans utilisent donc des coquilles en laine de roche avec parement aluminium,
                    ou remplissent l'espace annulaire avec des billes d'argile expansée comme le Biafeu ou le Technafeu.
                </p>

                <h3>Quel est le prix d'un bardage pour cheminée ?</h3>
                <p>L'habillage extérieur d'une souche de cheminée avec un bardage coûte entre 100 € et 250 € le mètre
                    carré, pose incluse. Toutefois, ce tarif varie grandement selon le matériau choisi (zinc à joint
                    debout, ardoise, fibres-ciment) et la complexité d'accès au toit.</p>

                <h3>Quel revêtement autour d'une cheminée ?</h3>
                <p>L'habillage intérieur d'un foyer nécessite des matériaux capables de résister aux très fortes
                    chaleurs. C'est pourquoi on privilégie les plaquettes de parement en pierre naturelle, le carrelage
                    en grès cérame, ou les panneaux en silicate de calcium pour coffrer correctement un insert.</p>

                <h3>Comment rendre une cheminée moderne ?</h3>
                <p>Moderniser une cheminée ancienne implique le plus souvent de casser son manteau rustique pour créer
                    un coffrage lisse jusqu'au plafond. De plus, remplacer un foyer ouvert par un insert sur mesure
                    apporte un design contemporain tout en décuplant le rendement thermique de l'installation.</p>

                <h3>Que faut-il placer de chaque côté de la cheminée ?</h3>
                <p>L'espace situé de chaque côté du conduit peut être habilement optimisé. En effet, lors d'une
                    rénovation, on crée souvent des niches maçonnées pour stocker le bois, ou des étagères asymétriques
                    pour intégrer l'éclairage et masquer les gaines de récupération de chaleur.</p>

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
                <h3>L'essentiel à retenir</h3>
                <p>
                    Un abergement bien posé, c'est 40 ans de tranquillité. Un abergement raté ou colmaté au silicone,
                    c'est une charpente à refaire. Le zinc sur-mesure reste la valeur sûre pour une toiture complexe.
                    Les bandes souples type Wakaflex répondent parfaitement aux rénovations simples. Dans tous les cas,
                    la règle d'or ne change pas : l'élément du haut recouvre toujours l'élément du bas.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un devis couverture</a>
            </div>

            <!-- Similar Articles (below conclusion) -->
            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image']; ?>"
                                    alt="<?php echo htmlspecialchars($art['title']); ?>">
                            </div>
                            <h4><?php echo htmlspecialchars($art['title']); ?></h4>
                        </a>
                        <?php
                    endforeach; ?>
                </div>
            </section>

        </div> <!-- .article-container -->

        <!-- RIGHT SIDEBAR: Latest Articles -->
        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <!-- 10 Latest from category -->
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name']); ?>
                    </h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                        <?php
                    endforeach; ?>
                </div>

                <!-- 10 Latest globally -->
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                        <?php
                    endforeach; ?>
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