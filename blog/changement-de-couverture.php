<?php
/**
 * changement-de-couverture.php
 * Article: Changement de couverture : Prix, aides et matériaux en 2026
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Changement de couverture : Prix, aides et matériaux en 2026',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/changement de couverture1.webp',
    'excerpt' => 'Refaire sa toiture est un budget conséquent. Découvrez les vrais prix au m², les étapes de pose et comment profiter de MaPrimeRénov\' pour changer votre ancienne couverture.',
    'date' => '2026-03-09',
    'reading_time' => 8,
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
                <span>Changement couverture</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Rénovation</span>
            </div>

            <h1>Changement de couverture :<br>
                <span class="h1-accent">Prix, aides et pose (Guide Complet 2026)</span>
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
                Une vieille toiture ne pardonne pas. Quand la mousse s'installe, que les tuiles deviennent poreuses et
                que l'humidité s'infiltre, un simple <a href="<?php echo BASE_URL; ?>demoussage-tuiles-terre-cuite"
                    style="text-decoration: underline;">démoussage de toiture</a> ne suffit plus. Remplacer une ancienne
                couverture est le
                seul moyen de protéger efficacement la charpente contre les intempéries et d'éviter un sinistre majeur
                dans la maison. Mais entre les tuiles, les ardoises et le zinc, <strong>comment faire le bon choix ?
                    Quel budget prévoir au mètre carré et comment financer ces travaux de rénovation lourde ?</strong>
                Dans ce guide, on passe en revue les matériaux, les normes de pose et les subventions de l'État
                disponibles dès aujourd'hui.
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Le budget moyen :</strong> Comptez entre 130 € et 250 € du mètre carré (fourniture,
                            pose et dépose incluses).</li>
                        <li><strong>Les matériaux phares :</strong> La tuile en terre cuite reste la plus abordable,
                            l'ardoise offre la meilleure durée de vie (100 ans).</li>
                        <li><strong>Les aides de l'État :</strong> Vous pouvez diviser la facture par deux avec
                            MaPrimeRénov', à condition d'isoler votre toit en même temps.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#prix">1. Quel est le prix pour refaire une toiture de 100 m² ?</a></li>
                        <li><a href="#quand-changer">2. Quand changer de couverture ? Les 4 signes d'alerte</a></li>
                        <li><a href="#materiaux">3. Tuiles, ardoises ou zinc : avantages et spécificités</a></li>
                        <li><a href="#etapes">4. Comment se déroule un changement de couverture ?</a></li>
                        <li><a href="#faq">5. FAQ : Aides, démarches et autorisations</a></li>
                    </ul>
                </div>

                <!-- Section 1 -->
                <h2 id="prix">1. Quel est le prix pour refaire une toiture de 100 m² ?</h2>
                <p>C'est la première question que tout le monde pose. Refaire un toit est un investissement lourd. Le
                    devis d'un artisan couvreur ne se limite jamais à l'achat des tuiles. Il englobe l'installation de
                    l'échafaudage, la dépose de la vieille toiture, le traitement éventuel du bois et la pose des
                    nouveaux éléments d'étanchéité.</p>

                <p>Pour une maison classique de 100 m² au sol, la surface réelle de la toiture (en comptant les pentes)
                    se situe généralement entre 120 et 140 m².</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Matériau de couverture</th>
                                <th>Prix moyen fourniture & pose (au m²)</th>
                                <th>Budget total estimé (pour 120 m² réels)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Tuiles mécaniques (Terre cuite)</strong></td>
                                <td>130 € à 170 €</td>
                                <td>15 600 € à 20 400 €</td>
                            </tr>
                            <tr>
                                <td><strong>Tuiles plates (Béton)</strong></td>
                                <td>110 € à 150 €</td>
                                <td>13 200 € à 18 000 €</td>
                            </tr>
                            <tr>
                                <td><strong>Ardoises naturelles</strong></td>
                                <td>180 € à 250 €</td>
                                <td>21 600 € à 30 000 €</td>
                            </tr>
                            <tr>
                                <td><strong>Ardoises synthétiques (Fibrociment)</strong></td>
                                <td>120 € à 160 €</td>
                                <td>14 400 € à 19 200 €</td>
                            </tr>
                            <tr>
                                <td><strong>Zinc (à joint debout)</strong></td>
                                <td>160 € à 220 €</td>
                                <td>19 200 € à 26 400 €</td>
                            </tr>
                            <tr>
                                <td><strong>Bac acier (Simple peau)</strong></td>
                                <td>80 € à 120 €</td>
                                <td>9 600 € à 14 400 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="en-clair-box"
                    style="background-color: var(--color-light); padding: 1.5rem; border-left: 4px solid var(--color-primary); margin-top: 1.5rem; border-radius: 4px;">
                    <strong>Attention au prix d'évacuation :</strong> Les gravats d'une ancienne toiture pèsent
                    plusieurs tonnes. Un devis transparent indique toujours le coût de la location de la benne et la
                    taxe de mise en déchetterie. Vérifiez cette ligne avant de signer.
                </div>

                <!-- Section 2 -->
                <h2 id="quand-changer">2. Quand changer de couverture ? Les 4 signes d'alerte</h2>
                <p>Les matériaux de couverture vieillissent naturellement. Les UV, le gel, le vent et la pollution usent
                    la couche protectrice des tuiles ou des ardoises. Attendre que l'eau coule dans la chambre pour
                    lancer les travaux de toiture est une erreur qui coûte très cher.</p>

                <p>Voici les signes qui prouvent qu'un changement de couverture est imminent :</p>

                <ul class="custom-list">
                    <li><strong>La porosité des tuiles :</strong> La terre cuite se gorge d'eau avec le temps. Si vos
                        tuiles s'effritent, blanchissent ou éclatent sous l'effet du gel hivernal, elles ont perdu leur
                        étanchéité.</li>
                    <li><strong>Le développement massif de lichens :</strong> Une mousse légère est normale. Une
                        couverture totalement envahie de végétation épaisse retient l'humidité en permanence sur le
                        toit.</li>
                    <li><strong>L'affaissement de la ligne de faîtage :</strong> Regardez le sommet de votre toit. S'il
                        n'est plus droit ou s'il fait le dos rond, c'est que la charpente en dessous commence à fatiguer
                        sous le poids ou l'humidité.</li>
                    <li><strong>L'absence d'écran de sous-toiture :</strong> Les maisons construites avant les années
                        1990 n'en possèdent pas. La neige poudreuse et la poussière s'engouffrent directement dans vos
                        combles, au risque de <a href="<?php echo BASE_URL; ?>isolation-des-combles-perdus"
                            style="text-decoration: underline;">dégrader irrémédiablement le pouvoir isolant thermique
                            de vos combles perdus</a>.</li>
                </ul>

                <img src="<?php echo BASE_URL; ?>image/changement de couverture2.webp"
                    alt="Vue en gros plan d'une toiture ancienne avec des tuiles poreuses, fêlées et recouvertes de mousse épaisse, illustrant le besoin urgent d'un changement de couverture."
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <blockquote class="article-blockquote">
                    <p>Sur un chantier l'année dernière, le client m'a appelé pour changer quelques tuiles cassées. En
                        montant, j'ai vu que l'eau stagnait depuis des mois sous la couverture. Les liteaux étaient
                        pourris et la panne sablière commençait à céder. On a dû refaire un quart de la charpente.
                        L'élément le plus précieux d'une toiture, ce n'est pas la tuile, c'est le bois qui la porte. Il
                        faut le protéger à tout prix.</p>
                </blockquote>

                <!-- Section 3 -->
                <h2 id="materiaux">3. Tuiles, ardoises ou zinc : avantages et spécificités</h2>
                <p>On ne met pas n'importe quel matériau sur n'importe quelle maison. Le choix dépend de la pente de
                    votre toit, du climat de votre région et surtout des règles d'urbanisme de votre commune. La mairie
                    peut vous imposer une couleur ou un type de revêtement précis.</p>

                <h3>La tuile en terre cuite : la reine des toits français</h3>
                <p>C'est le revêtement le plus courant. Elle existe en format canal (très présente dans le Sud pour les
                    pentes faibles) ou mécanique à emboîtement (majoritaire dans le reste du pays). Elle résiste bien au
                    vent, offre une excellente inertie thermique en été et se remplace facilement à l'unité en cas de
                    casse.</p>

                <h3>L'ardoise naturelle : l'élégance absolue</h3>
                <p>Extraite de carrières (souvent en Espagne ou en France), l'ardoise naturelle est un matériau noble.
                    Elle est non gélive, incombustible et sa durée de vie dépasse facilement le siècle. Sa pose exige
                    une technicité parfaite. L'artisan fixe chaque plaque à l'aide de crochets en inox ou de clous sur
                    la volige. Son poids demande une charpente robuste.</p>

                <h3>Le zinc : la solution moderne et urbaine</h3>
                <p>Les toitures en zinc se démocratisent largement en dehors de Paris. Très léger, le zinc s'adapte aux
                    toits avec une pente très faible (dès 5%). La technique de pose à joint debout garantit une
                    étanchéité totale contre les intempéries. C'est un matériau qui ne retient ni la mousse ni la
                    saleté. Il se patine avec le temps pour prendre une teinte grise très contemporaine.</p>

                <!-- Section 4 -->
                <h2 id="etapes">4. Comment se déroule un changement de couverture ?</h2>
                <p>Refaire un toit demande une organisation militaire. Le chantier dure généralement d'une à trois
                    semaines selon la surface et la météo.</p>

                <img src="<?php echo BASE_URL; ?>image/changement de couverture3.webp"
                    alt="Photo d'un couvreur professionnel sur un échafaudage en train de poser un écran de sous-toiture sur une charpente mise à nu."
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <ul class="custom-list">
                    <li><strong>Étape 1 : Le bâchage et la dépose.</strong> Les artisans installent les échafaudages,
                        sécurisent le périmètre et retirent l'ancienne couverture. Les gravats sont évacués.</li>
                    <li><strong>Étape 2 : Le contrôle de la charpente.</strong> Une fois le toit à nu, on inspecte
                        l'état des chevrons et des pannes. On remplace les pièces de bois endommagées ou attaquées par
                        les insectes xylophages (ce qui implique souvent de réaliser un <a
                            href="<?php echo BASE_URL; ?>traitement-curatif-charpente"
                            style="text-decoration: underline;">traitement curatif de charpente</a> par la même
                        occasion).</li>
                    <li><strong>Étape 3 : La pose de l'écran de sous-toiture.</strong> Ce film pare-pluie respirant est
                        obligatoire aujourd'hui. Il se déroule horizontalement. Il protège l'isolant et la maison en cas
                        de tuile cassée ou de tempête de neige.</li>
                    <li><strong>Étape 4 : Le contrelattage et litelage.</strong> On fixe de nouveaux tasseaux de bois
                        par-dessus l'écran. Cet espace crée une lame d'air vitale pour la ventilation du toit. Sans
                        cette lame d'air, la condensation détruit le bois.</li>
                    <li><strong>Étape 5 : La couverture et la zinguerie.</strong> On pose les nouvelles tuiles ou
                        ardoises de bas en haut. L'artisan termine par la fixation des gouttières, des solins de
                        cheminée et des raccords de fenêtres de toit.</li>
                </ul>

                <!-- Section 5 -->
                <h2 id="faq">5. FAQ : Aides financières et démarches administratives</h2>

                <h3>Puis-je avoir des aides pour refaire ma toiture en 2026 ?</h3>
                <p>Oui, mais attention. L'État ne finance pas le simple remplacement de tuiles. Pour débloquer
                    MaPrimeRénov' et les Certificats d'Économies d'Énergie (CEE), vous devez coupler le changement de
                    couverture avec une isolation thermique par l'extérieur du toit (technique du Sarking) ou une <a
                        href="<?php echo BASE_URL; ?>isolation-sous-rampants-toiture"
                        style="text-decoration: underline;">isolation sous rampants de toiture</a> traditionnelle.
                    Le chantier doit alors obligatoirement être confié à une entreprise certifiée RGE (Reconnu Garant de
                    l'Environnement).
                </p>

                <h3>Comment faire refaire sa toiture gratuitement ?</h3>
                <p>Soyons clairs : c'est une arnaque. Le dispositif "isolation à 1 euro" a été supprimé par le
                    gouvernement suite à de trop nombreuses fraudes. Refaire une toiture gratuitement n'existe pas. En
                    revanche, si vous appartenez à la catégorie des revenus "très modestes", le cumul des aides
                    nationales et locales peut couvrir jusqu'à 80 % ou 90 % du coût total des travaux de rénovation
                    énergétique globale.</p>

                <h3>Quelle autorisation faut-il pour un changement de toiture ?</h3>
                <p>Puisque vous touchez à l'aspect extérieur de votre habitat, vous devez déposer une Déclaration
                    Préalable de travaux (DP) au service urbanisme de votre mairie. Le délai d'instruction est d'un
                    mois. Si votre maison se trouve dans un périmètre protégé (proche d'un monument historique), l'avis
                    des Architectes des Bâtiments de France (ABF) est requis, ce qui allonge le délai à deux mois.</p>

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
                <h3>Ne laissez pas votre toiture se dégrader</h3>
                <p>
                    Un changement de couverture est le meilleur moyen de sécuriser votre maison et d'en augmenter la
                    valeur immobilière. Chaque projet est unique et dépend de l'état de votre charpente. N'attendez pas
                    l'hiver pour réagir.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis gratuit et une étude
                    personnalisée</a>
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