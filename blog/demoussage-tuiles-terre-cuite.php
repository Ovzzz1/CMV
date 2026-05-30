<?php
/**
 * demoussage-tuiles-terre-cuite.php
 * Article : Démoussage tuiles terre cuite
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-03-19
 */

$article_meta = [
    'title' => 'Démoussage tuiles terre cuite : Guide complet 2026',
    'category' => 'renovation',
    'slug' => 'demoussage-tuiles-terre-cuite',
    'image' => 'https://www.cemarenov.fr/image/demoussage-tuiles-terre-cuite-1.webp',
    'excerpt' => 'Guide complet pour démousser et entretenir votre toiture en tuiles terre cuite. Fréquence, méthodes, coûts et conseils sécurité par un artisan RGE.',
    'date' => '2026-03-19',
    'reading_time' => 8,
];

// Bloc logique CMS
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

// INCLUDE HEADER
include dirname(__DIR__) . '/header.php';
?>

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
                <span>Démoussage tuiles terre cuite</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Entretien</span>
            </div>

            <h1>Démoussage tuiles terre cuite :<br>
                <span class="h1-accent">Guide complet pour entretenir votre toiture en 2026</span>
            </h1>

            <div class="article-meta-header" style="flex-wrap: wrap; gap: 15px;">
                <a href="<?php echo BASE_URL; ?>philippe" class="author-badge-top">
                    <!-- Attention: l'image de Philippe est phil.png dans votre site -->
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
                <?php endforeach; ?>
            </div>
        </aside>

        <!-- MAIN CONTENT (center) -->
        <div class="article-container">
            <p class="article-intro">
                Les <strong>tuiles terre cuite</strong> constituent votre première ligne de défense contre les
                intempéries. Pourtant, la plupart des propriétaires négligent leur <strong>entretien toiture</strong>
                jusqu'à l'apparition de fuites. Une erreur coûteuse. Voici comment préserver votre toit avec les bonnes
                méthodes de <strong>nettoyage toiture</strong>.
            </p>

            <div class="article-content">
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Fréquence contrôle :</strong> 1 fois par an, démoussage complet tous les 2-3 ans
                            selon environnement.</li>
                        <li><strong>Période idéale :</strong> Fin automne, après la chute des feuilles et avant les
                            gelées.</li>
                        <li><strong>Coût professionnel :</strong> Entre 15€ et 35€/m² en 2026 selon accessibilité.</li>
                        <li><strong>Point critique :</strong> Jamais d'eau de javel ni de Karcher trop puissant sur
                            terre cuite, risque d'effritement irréversible.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#pourquoi">Pourquoi démousser vos tuiles terre cuite ?</a></li>
                        <li><a href="#frequence">À quelle fréquence entretenir sa toiture ?</a></li>
                        <li><a href="#methodes">Les méthodes de démoussage</a></li>
                        <li><a href="#securite">Sécurité : les règles d'or avant de monter</a></li>
                        <li><a href="#budget">Budget : coût d'un démoussage de toiture</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="pourquoi">Pourquoi démousser vos tuiles terre cuite ?</h2>

                <p>La <strong>terre cuite</strong> est un matériau vivant. Naturellement poreuse, elle respire et régule
                    l'humidité. C'est aussi sa faiblesse : elle retient les salissures et offre un support idéal aux
                    végétaux.</p>

                <h3>Les ennemis de votre toiture</h3>

                <p>Les mousses, lichens et algues ne sont pas qu'un problème esthétique. Ils agissent comme une éponge,
                    retenant l'eau de pluie sur vos <strong>tuiles terre</strong>. Résultat : le gel fait éclater la
                    céramique, les joints s'effritent, et les infiltrations commencent.</p>

                <ul class="custom-list">
                    <li><strong>Mousses :</strong> Se développent sur les toits ombragés ou nord. Rétention d'eau
                        maximale.</li>
                    <li><strong>Lichens :</strong> S'accrochent en profondeur et dégradent la surface poreuse de la
                        tuile.</li>
                    <li><strong>Algues :</strong> Laissent des traces noires qui réduisent l'étanchéité.</li>
                </ul>

                <h3>Durée de vie d'une tuile entretenue vs négligée</h3>

                <p>Une tuile en <strong>terre cuite</strong> bien entretenue dure 50 à 100 ans. Sans entretien, cette
                    durée chute à 25-30 ans. Le coût d'un démoussage régulier (300-800€ tous les 3 ans) restera toujours
                    logiquement négligeable face au prix astronomique imposé par <a
                        href="<?php echo BASE_URL; ?>changement-de-couverture" style="text-decoration: underline;">le
                        lourd chantier d'une rénovation complète avec changement total de la couverture</a> (15 000-30
                    000€).</p>

                <h2 id="frequence">À quelle fréquence entretenir sa toiture ?</h2>

                <p>L'<strong>entretien toiture</strong> n'est pas une option. C'est une obligation pour tout
                    propriétaire soucieux de préserver son patrimoine.</p>

                <ul class="custom-list">
                    <li><strong>Contrôle visuel :</strong> 1 fois par an, depuis le sol ou une fenêtre de toit.</li>
                    <li><strong>Nettoyages de descentes :</strong> Un <a href="<?php echo BASE_URL; ?>gouttieres"
                            style="text-decoration: underline;">nettoyage des gouttières</a> rigoureux 2 fois par an
                        (printemps et automne).</li>
                    <li><strong>Démoussage complet :</strong> Tous les 2-3 ans selon votre environnement.</li>
                </ul>

                <p>La période idéale ? <strong>Entre novembre et début décembre</strong>, après la chute des feuilles et
                    avant les premiers gels. Les températures douces permettent aux produits de traitement de pénétrer
                    efficacement.</p>

                <blockquote class="article-blockquote">
                    <p>"J'ai vu des toitures de 15 ans réduites en miettes parce que le propriétaire attendait une fuite
                        pour agir. Une tuile, ça ne prévient pas quand elle rend l'âme."</p>
                </blockquote>

                <h2 id="methodes">Les méthodes de démoussage</h2>

                <p>Plusieurs techniques existent pour le <strong>nettoyage tuiles</strong>. Certaines sont accessibles
                    au bricoleur averti, d'autres réservées aux professionnels.</p>

                <h3>Le démoussage manuel étape par étape</h3>

                <p>La méthode la plus sûre pour la <strong>terre cuite</strong> :</p>

                <ul class="custom-list">
                    <li><strong>Étape 1 :</strong> Nettoyer les gouttières pour éviter les obstructions.</li>
                    <li><strong>Étape 2 :</strong> Gratter les mousses à la main avec une brosse dure ou un grattoir en
                        nylon.</li>
                    <li><strong>Étape 3 :</strong> Appliquer un anti-mousse biologique (sulfate de fer ou produits à
                        base d'enzymes).</li>
                    <li><strong>Étape 4 :</strong> Laisser agir 2-3 semaines, la pluie fera le reste.</li>
                    <li><strong>Étape 5 :</strong> Traitement hydrofuge optionnel pour protéger à long terme.</li>
                </ul>

                <h3>Quand faire appel à un professionnel ?</h3>

                <p>Le <strong>nettoyage professionnel</strong> est obligatoire si :</p>

                <ul class="custom-list">
                    <li>La toiture dépasse 20% de pente (sécurité)</li>
                    <li>Vous habitez en zone venteuse (côte, montagne)</li>
                    <li>Des infiltrations sont déjà visibles à l'intérieur</li>
                    <li>La surface dépasse 100 m² (fatigue, temps)</li>
                </ul>

                <div class="en-clair-box"
                    style="background:var(--color-light); padding:1.5rem; border-left:4px solid var(--color-primary); border-radius:4px;">
                    <strong>En clair :</strong> S'il peut être utile exceptionnellement sur des revêtements spécifiques
                    très durs, <a href="<?php echo BASE_URL; ?>nettoyage-toiture-karcher"
                        style="text-decoration: underline;">le nettoyage de toiture au Karcher</a> (et la haute pression
                    brute en général) est à proscrire d'urgence sur la terre cuite. La pression érode la couche
                    protectrice et crée des micropores où la mousse reprendra racine encore plus vite.
                </div>

                <h2 id="securite">Sécurité : les règles d'or avant de monter</h2>

                <p>Intervention sur une <strong>toiture tuiles</strong> = travail en hauteur. Les accidents sont
                    fréquents et graves.</p>

                <ul class="custom-list">
                    <li><strong>Équipement obligatoire :</strong> Harnais antichute attaché à un point fixe, chaussures
                        antidérapantes (S3 SRC minimum), casque.</li>
                    <li><strong>Échelle :</strong> Vérifier la conformité EN 131, angle 75°, stabilisateurs déployés.
                    </li>
                    <li><strong>Météo interdite :</strong> Pluie, vent > 50 km/h, température < 5°C (risque de
                            gel).</li>
                    <li><strong>Produits toxiques :</strong> Masque FFP2, lunettes, gants nitrile.</li>
                </ul>

                <div
                    style="background:#fbe3cb; border-left:4px solid #e74c3c; padding:1.5rem; border-radius:0 8px 8px 0; color:#3e2e1f; margin-bottom:1.5rem;">
                    <strong>Attention :</strong> Si votre toiture est à plus de 6 mètres de hauteur ou présente une
                    pente > 30%, faites appel à un professionnel. Votre assurance habitation ne couvre pas les accidents
                    lors de travaux de bricolage sur toiture.
                </div>

                <h2 id="budget">Budget : coût d'un démoussage de toiture</h2>

                <p>Le prix dépend de la méthode choisie et de l'état de votre <strong>toiture terre cuite</strong>.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Prestation</th>
                                <th>DIY (matériel)</th>
                                <th>Professionnel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Location nettoyeur HP</strong></td>
                                <td>50-80€/jour</td>
                                <td>Inclus</td>
                            </tr>
                            <tr>
                                <td><strong>Anti-mousse (100m²)</strong></td>
                                <td>30-60€</td>
                                <td>Inclus</td>
                            </tr>
                            <tr>
                                <td><strong>Démoussage manuel</strong></td>
                                <td>Outils : 40-80€</td>
                                <td>15-25€/m²</td>
                            </tr>
                            <tr>
                                <td><strong>Traitement hydrofuge</strong></td>
                                <td>8-12€/m²</td>
                                <td>10-15€/m²</td>
                            </tr>
                            <tr>
                                <td><strong>Total maison 100m²</strong></td>
                                <td>150-250€</td>
                                <td>1 500-3 500€</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>Le tarif professionnel varie selon l'accessibilité (échafaudage nécessaire ou non), la région et la
                    densité de végétation.</p>

                <h2 id="faq">FAQ — Questions fréquentes</h2>

                <h3>Eau de javel sur tuiles terre cuite : dangereux ?</h3>
                <p>Absolument. L'eau de javel attaque la couche de glaçure protectrice de la tuile. Résultat : porosité
                    accrue, dégradation accélérée, et risque de taches blanches irréversibles. Privilégiez les
                    anti-mousses biologiques ou sulfate de fer.</p>

                <h3>Karcher haute pression : risque d'effritement ?</h3>
                <p>Oui. Même en mode basse pression, le jet d'eau érode la surface poreuse de la <strong>terre
                        cuite</strong>. À terme, vos tuiles deviennent « éponges » et absorbent l'humidité au lieu de
                    l'évacuer. Méthode manuelle ou brosse souple uniquement.</p>

                <h3>Mousse qui revient malgré le nettoyage : que faire ?</h3>
                <p>Vérifiez trois points : orientation nord ou ombragée (normal), branches d'arbres proches (à élaguer),
                    ou ventilation insuffisante sous toiture. L'application d'un <a
                        href="<?php echo BASE_URL; ?>hydrofuge-de-toiture"
                        style="text-decoration: underline;">traitement hydrofuge de toiture</a> préventif juste après
                    chaque démoussage retarde par ailleurs considérablement le retour des végétaux.</p>

                <h3>Toiture neuve : faut-il déjà traiter ?</h3>
                <p>Attendez 2-3 ans. Les tuiles neuves ont une couche de glaçure intacte qui résiste naturellement. Un
                    traitement préventif trop tôt est de l'argent jeté par les fenêtres.</p>

                <h3>Assurance habitation couvre les dégâts de toiture ?</h3>
                <p>Les infiltrations dues à l'entretien négligé sont généralement exclues. L'assureur considère que
                    l'usure naturelle et le manque d'entretien relèvent de la responsabilité du propriétaire. Seuls les
                    sinistres soudains (tempête, grêle) sont couverts.</p>

                <h3>Après le démoussage, comment savoir si la toiture doit être refaite ?</h3>
                <p>Une fois la mousse retirée, vous verrez clairement l'état réel des tuiles. Si plus de 20 à 25 % présentent des fissures ou une porosité importante, un démoussage seul ne suffira pas. Notre guide <a href="https://www.cemarenov.fr/comment-faire-un-toit-en-tuile">comment faire un toit en tuile</a> vous aide à évaluer si une réfection complète est nécessaire et comment la planifier. Pour les remplacements partiels, notre guide <a href="<?php echo BASE_URL; ?>comment-monter-toit-tuile" style="text-decoration: underline;">comment monter toit en tuile</a> détaille la procédure de pose étape par étape.</p>

                <h3>Peut-on poser des panneaux solaires sur une toiture qui vient d'être démoussée ?</h3>
                <p>Oui, le démoussage est même recommandé avant une installation photovoltaïque. La fixation des crochets sous les tuiles sèches et propres est bien plus fiable. Notre guide <a href="https://www.cemarenov.fr/fixation-panneau-solaire-sur-tuile-canal">fixation panneau solaire sur tuile canal</a> détaille les systèmes de fixation adaptés aux tuiles terre cuite.</p>

            </div><!-- .article-content -->

            <div class="author-box-bottom">
                <div class="author-box-img"><img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe"></div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, je vous accompagne dans vos projets de
                        rénovation et d'entretien de l'habitat. Mon objectif : vous donner les clés pour éviter les
                        arnaques et réussir vos travaux en toute sérénité.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Besoin d'un devis pour votre démoussage ?</h3>
                <p>Ne laissez pas la mousse dégrader votre toiture. Demandez un diagnostic gratuit et un devis
                    personnalisé pour votre toiture en tuiles terre cuite.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis gratuit</a>
            </div>

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
                    <?php endforeach; ?>
                </div>
            </section>

        </div>

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
                    <?php endforeach; ?>
                </div>

                <!-- 10 Latest globally -->
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

    </div>
</article>

<?php
// --- Schema.org Structured Data ---
require_once dirname(__DIR__) . '/schema-data.php';
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>