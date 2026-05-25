<?php
/**
 * traitement-humidite.php
 * Article: Traitement humidité murs maison — prix m² 2026, remontées capillaires, condensation
 */

$article_meta = [
    'title' => 'Traitement Humidité des Murs : Prix, Solutions et Pièges à Éviter (2026)',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/assechement-murs-injections.webp',
    'excerpt' => 'Salpêtre, moisissures noires, murs qui suintent... Ne masquez pas l\'humidité sous de la peinture ! Identifier la cause (capillarité, condensation, infiltration) dicte la solution et le prix (de 150€ à 10 000€).',
    'date' => '2026-03-05',
    'reading_time' => 12,
];

require_once dirname(__DIR__) . '/functions.php';

$page_title = $article_meta['title'];
$page_description = $article_meta['excerpt'];

$current_cat = $article_meta['category'];
$current_url = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category = get_category($current_cat);
$other_cats = get_other_categories($current_cat);
$cat_articles = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles = array_slice($cat_articles, 0, 10);
$latest_articles = array_values(array_filter(get_latest_articles(11), fn($a) => ($a['url'] ?? '') !== $current_url));
$latest_articles = array_slice($latest_articles, 0, 10);

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

<article>
    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Murs & Isolation</span>
            </nav>
            
            <div class="article-tags">
                <span class="article-tag">Humidité</span>
                <span class="article-tag">Diagnostic</span>
            </div>

            <h1>Traitement de l'Humidité :<br>
                <span class="h1-accent">Causes, Vraies Solutions et Prix 2026</span>
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
                <?php
endforeach; ?>
            </div>
        </aside>

        <div class="article-container">
            
            <p class="article-intro">
                Papier peint qui se décolle, odeur de cave dans la chambre d'amis, traces noires autour des fenêtres ou salpêtre effritant le bas des murs... L'humidité est le cancer du bâtiment. En 2026, avec des maisons de plus en plus étanches (double vitrage, isolation thermique), les déséquilibres hydriques explosent. Mais attention à l'arnaque classique : recouvrir un mur humide de placo ou de peinture anti-humidité sans chercher la cause, c'est comme mettre un pansement sur une fracture, l'eau finira toujours par ressortir. Remontées capillaires, condensation ou infiltration : voici comment établir le bon diagnostic, choisir le traitement définitif, et connaître le vrai budget avant de signer un devis.
            </p>

            <div class="article-content">
                
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Condensation (Moisissures noires aux plafonds/fenêtres) :</strong> La maison ne respire plus. <em>Solution :</em> <a href="<?php echo BASE_URL; ?>vmc-simple-flux" style="text-decoration: underline;">Installation d'une VMC</a> (Ventilation Mécanique). <em>Prix :</em> 1 500 € à 4 500 €.</li>
                        <li><strong>Remontées Capillaires (Salpêtre au bas des murs rez-de-chaussée) :</strong> L'eau du sol "pompe" dans les murs anciens. <em>Solution :</em> <a href="<?php echo BASE_URL; ?>assechement-murs-injections" style="text-decoration: underline;">Injection de résine hydrophobe</a> dans les plinthes. <em>Prix :</em> 100 € à 200 € le mètre linéaire.</li>
                        <li><strong>Infiltration (Taches d'eau localisées sur un mur après la pluie) :</strong> Façade poreuse ou tuile cassée. <em>Solution :</em> <a href="<?php echo BASE_URL; ?>hydrofuge-incolore-facade" style="text-decoration: underline;">Hydrofuge de façade</a> ou réparation toiture. <em>Prix :</em> 15 € à 40 € / m².</li>
                        <li><strong>Le Piège de l'enduit ciment :</strong> Ne cimentez <strong>jamais</strong> un vieux mur en pierre humide ! L'eau bloquée va monter plus haut ou pourrir les poutres en bois.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>L'Étape 1 indispensable : Le Diagnostic (Identifier le type d'humidité)</li>
                        <li>Problème A : Les Remontées Capillaires (Solutions & Prix)</li>
                        <li>Problème B : La Condensation et l'hyper-étanchéité</li>
                        <li>Problème C : L'Infiltration et la pression de cave</li>
                        <li>Avis et Mises en garde : Les 3 arnaques à fuir</li>
                    </ul>
                </div>

                <!-- Section 1 : Diagnostic -->
                <h2 id="diagnostic">L'Étape 1 indispensable : Le Diagnostic (Identifier le type d'humidité)</h2>
                <p>Traiter l'humidité au hasard coûte une fortune en rechutes. Le taux normal d'hygrométrie dans une maison fermée doit osciller entre 40% et 60%. Au-delà, on parle de pathologie.</p>

                <ul class="custom-list">
                    <li><strong>Humidité concentrée en bas du mur (0 à 1m50) + poudres blanches :</strong> C'est la signature des <em>Remontées Capillaires</em> mélangées au salpêtre.</li>
                    <li><strong>Humidité concentrée dans les coins froids, derrière les meubles de la salle de bain ou au bord des vitres :</strong> C'est le marqueur de la <em>Condensation</em>. L'air chaud et chargé de vapeur d'eau condense en gouttelettes sur les parois froides.</li>
                    <li><strong>Humidité au milieu d'un mur ou au plafond (sans lien avec la douche) :</strong> C'est une <em>Infiltration</em>. L'eau de pluie passe à travers les parpaings devenus poreux ou une fuite de toiture.</li>
                </ul>

                <!-- Section 2 : Remontées Capillaires -->
                <h2 id="remontees-capillaires">Problème A : Les Remontées Capillaires (Solutions & Prix)</h2>
                <p>Très fréquentes dans les maisons d'avant 1950 (construites sans barrière d'arase étanche dans les fondations). Les murs en pierre, en pisé ou en brique agissent comme un sucre trempé dans un café : l'eau du terrain remonte verticalement par les micro-tubes des matériaux, emmenant avec elle les sels minéraux du sol (le redoutable "salpêtre" qui fait exploser les plâtres).</p>

                <h3>Solution N°1 : L'Injection de Résine Hydrophobe</h3>
                <p>C'est la solution la plus populaire et la plus pérenne en 2026. Des trous sont percés tous les 10 à 15 cm à la base du mur (intérieur ou extérieur). Une résine sous forme de crème ou de gel liquide est injectée à la pompe. En s'expansant et en durcissant, elle crée une coupure de capillarité (une barrière chimique horizontale) étanche à vie.</p>
                <p><strong>Prix au mètre linéaire :</strong> Entre <strong>100 € et 250 € / ml</strong> selon l'épaisseur du mur (un mur en pierre de 60cm demande beaucoup plus de produit qu'un parpaing de 20cm). Soit environ 3 500 € à 5 000 € pour traiter l'ensemble du périmètre d'une maison standard.</p>

                <h3>Solution N°2 : La Géomagnétique (Centrale d'assèchement)</h3>
                <p>Un boîtier électronique branché sur le 220V inverse la polarité électromagnétique des molécules d'eau dans le mur, forçant l'eau à "redescendre" dans le sol par gravité.</p>
                <p><strong>Avis :</strong> C'est une méthode sans travaux destructifs, très utilisée sur les monuments historiques. Toutefois, le recul scientifique est controversé et l'assèchement peut prendre de 12 à 18 mois.<br>
                <strong>Prix :</strong> Forfait de <strong>2 500 € à 4 500 €</strong> pour équiper l'ensemble du rayon d'action de la maison.</p>

                <!-- Section 3 : Condensation -->
                <h2 id="condensation">Problème B : La Condensation et l'hyper-étanchéité</h2>
                <p>Vous avez fait remplacer vos vieilles fenêtres par du PVC double vitrage ultra-étanche, et un an plus tard, vos angles de plafonds se couvrent de moisissures noires toxiques. C'est le paradoxe de la rénovation énergétique : la maison est devenue un "Thermos" totalement hermétique. Or, une famille de 4 personnes produit 15 litres d'eau sous forme de vapeur par jour (respiration, douches, cuisine) !</p>

                <h3>La Solution unique : La Ventilation Mécanique (VMC)</h3>
                <p>L'installation (ou le décrassage) d'une ventilation forcée est la seule option pour chasser cet air vicié humide et renouveler l'air sec venu de l'extérieur.</p>
                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de Ventilation</th>
                                <th>Utilité & Budget 2026 Posé (TTC)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong><a href="<?php echo BASE_URL; ?>vmc-simple-flux" style="text-decoration: underline;">VMC Simple Flux Hygroréglable</a></strong></td>
                                <td>Aspire l'air des pièces humides (SDB, WC, Cuisine) en fonction de l'humidité. Basique mais indispensable.<br><strong>1 200 € à 2 000 €</strong></td>
                            </tr>
                            <tr>
                                <td><strong><a href="<?php echo BASE_URL; ?>vmc-double-flux" style="text-decoration: underline;">VMC Double Flux</a></strong></td>
                                <td>Croise l'air sortant (chaud) et l'air entrant (froid) via un échangeur thermique pour ne pas perdre la chaleur du chauffage.<br><strong>3 500 € à 6 000 €</strong></td>
                            </tr>
                            <tr>
                                <td><strong><a href="<?php echo BASE_URL; ?>ventilation-par-surpression" style="text-decoration: underline;">La VMI (Ventilation par Insufflation)</a></strong></td>
                                <td>Idéale en Rénovation sans faux plafonds. Souffle un air neuf chauffé qui "pousse" l'humidité vers les sorties d'air.<br><strong>2 500 € à 3 500 €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section 4 : Infiltrations -->
                <h2 id="infiltrations">Problème C : L'Infiltration et la pression de cave</h2>
                <p>L'infiltration se traduit par l'eau extérieure qui rentre dans le bâti, non pas par le dessous (capillarité), mais par le côté.</p>

                <h3>C.1. L'infiltration de Façade</h3>
                <p>L'enduit extérieur devient poreux, se fissure, et laisse entrer la pluie battante. S'il n'y a pas lieu de tout recrépir, un <strong>nettoyage suivi d'un <a href="<?php echo BASE_URL; ?>hydrofuge-incolore-facade" style="text-decoration: underline;">traitement Hydrofuge de façade</a></strong> (un produit incolore liquide perlant) règle le problème pour 10 ans. <strong>(Prix : 15 à 30 € / m²).</strong></p>

                <h3>C.2. L'infiltration Entérrée (Les Caves inondées ou très humides)</h3>
                <p>Lorsque la nappe phréatique ou les eaux de pluie stagnent en l'absence de drainage, elles exercent une pression hydrostatique gigantesque sur les murs enterrés des sous-sols, qui finissent par suinter d'eau liquide.</p>

                <ul class="custom-list">
                    <li><strong>Le Cuvelage Intérieur :</strong> Création d'un "caissement étanche" à l'intérieur de la cave grâce à l'application de plusieurs croisées de mortier de résine époxy. Le mur est bloqué, la cave redevient une pièce saine (buanderie, etc.). <br><strong>Prix 2026 :</strong> de <strong>60 € à 120 € / m² traité</strong>.</li>
                    <li><strong>Le Drainage Périphérique Extérieur :</strong> La technique royale. On décaisse la terre tout autour de la maison à la pelleteuse, on pose une membrane étanche (Delta-MS) sur le mur par l'extérieur, et on pose un tuyau de drainage entouré de graviers au fond. C'est cher, très destructeur, mais radical.<br><strong>Prix 2026 :</strong> <strong>> 4 000 € à 15 000 € selon linéaire</strong>.</li>
                </ul>

                <!-- Section 5 : Arnaques -->
                <h2 id="arnaques">Avis et Mises en garde : Les 3 arnaques à éviter</h2>

                <h3>1. Doubler avec du Placo et de la laine de verre</h3>
                <p><em>"On met un doublage en placo peint hydrofuge, on ne verra plus la vilaine tâche."</em> Erreur fatale ! L'humidité bloquée va décomposer la <a href="<?php echo BASE_URL; ?>isolation-thermique-interieur-iti" style="text-decoration: underline;">laine de verre</a> derrière le placo (perte totale des capacités isolantes) et la moisissure prolifèrera à l'abri des regards de manière toxique. Il faut assécher LE MUR PORTANT avant toute finition !</p>

                <h3>2. Traiter de manière asymétrique (Le piège du ciment)</h3>
                <p>Vous avez une maison en pisé, avec un vieux soubassement en pierre humide. Vous appelez un maçon de la vieille école qui vous met un beau crépi au ciment hyper-hydrofuge. Grave erreur : le ciment ne respire pas. L'eau ne peut plus s'évaporer. Résultat ? L'eau va trouver une autre sortie, remontant au 1er étage ou faisant pourrir les fragiles solives en bois encastrées dans le mur.</p>

                <h3>3. La peinture Anti-Humidité</h3>
                <p>Vendue en grande surface de bricolage. C'est une épaisse résine acrylique. Elle fonctionne très bien préventivement dans une salle de bain saine, pour contrer une légère condensation. Mais appliquée sur un mur subissant des infiltrations ou des remontées capillaires, l'eau va exercer une pression depuis l'intérieur du mur et la peinture va cloquer et pendre en lambeaux en moins d'un an.</p>

                        </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert RÃ©novation & Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expÃ©rience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois pour rÃ©ussir vos travaux et Ã©viter les arnaques.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>L'essentiel à retenir</h3>
                <p>
                    Ne signez <strong>jamais</strong> un devis de traitement de l'humidité sans qu'un technicien ne soit passé chez vous avec un "humidimètre" professionnel pour planter des sondes dans vos cloisons et vos joints extérieurs. Traiter des remontées capillaires à grand renfort d'injections de résine à 4000€ alors que vos moisissures viennent du fait que vous n'avez pas de VMC dans vos fenêtres étanches, c'est de l'argent jeté par la fenêtre. Exigez un diagnostic précis (Salpêtre vs Infiltration), garantit par la décennale du professionnel de l'assèchement.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Diagnostic Humidité Gratuit : Obtenir l'avis d'Experts</a>
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
                    <?php
endforeach; ?>
                </div>
            </section>

        </div>

        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name']); ?></h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php
endforeach; ?>
                </div>

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
