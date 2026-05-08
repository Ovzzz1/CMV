<?php
/**
 * bardage-decoratif.php
 * Article: Bardage décoratif — Guide complet prix, matériaux et pose
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Bardage décoratif : Guide complet prix, matériaux et pose (2026)',
    'category' => 'travaux',
    'image' => 'https://www.cemarenov.fr/image/bardage-decoratif.webp',
    'excerpt' => 'PVC, composite, bois ou fibre-ciment : quel bardage décoratif choisir ? Prix au m², durée de vie réelle, pose DTU 41.4 et aides MaPrimeRénov\' 2026.',
    'date' => '2026-03-05',
    'reading_time' => 12,
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

// Similar articles
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
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Bardage décoratif</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Façade</span>
                <span class="article-tag">Guide Complet</span>
            </div>

            <h1>Bardage décoratif :<br>
                <span class="h1-accent">Guide Complet Prix, Matériaux et Pose (2026)</span>
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
                Votre maison de 1985 a l'air fatiguée. La peinture s'écaille, les joints des briques se fissurent, et
                l'humidité remonte par capillarité (ce qui vous obligera logiquement à prévoir <a
                    href="<?php echo BASE_URL; ?>assechement-murs-injections" style="text-decoration: underline;">un
                    traitement profond d'assèchement des murs par injection</a> avant de tout masquer). Vous hésitez
                entre repeindre ou poser un bardage décoratif. <strong>Le bardage protège la maçonnerie des intempéries,
                    modernise l'aspect général de la façade et, avec une isolation par l'extérieur (ITE) dessous,
                    améliore le DPE de la maison. Mais attention : un mauvais choix de matériau et votre budget
                    explosera vite en entretien.</strong>
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        Résumé rapide
                    </div>
                    <ul>
                        <li><strong>Prix moyen constaté :</strong> 60-120 €/m² tout compris (pose incluse). Le PVC coûte
                            le moins cher : 25-45 €/m².</li>
                        <li><strong>Meilleur rapport qualité/prix :</strong> Bardage composite imitation bois. 50-90
                            €/m², zéro entretien pendant 40 ans.</li>
                        <li><strong>Piège à éviter absolument :</strong> Le bois exotique. Interdit en neuf depuis
                            RE2020 et il pourrit vite si mal traité.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#prix">Prix bardage décoratif au m²</a></li>
                        <li><a href="#bois-composite-pvc">Bardage bois vs composite vs PVC</a></li>
                        <li><a href="#idees">8 idées bardage décoratif moderne</a></li>
                        <li><a href="#duree-vie">Durée de vie et entretien</a></li>
                        <li><a href="#pose">Comment poser un bardage</a></li>
                        <li><a href="#aides">Aides financières et budget total</a></li>
                        <li><a href="#faq">FAQ Bardage Décoratif</a></li>
                    </ul>
                </div>

                <!-- Section : Pourquoi -->
                <h2 id="pourquoi">Pourquoi un bardage décoratif pour votre façade ? (Et pourquoi pas ?)</h2>
                <p>Le bardage protège efficacement la maçonnerie des intempéries directes. Il modernise drastiquement le
                    rendu visuel général. Combiné à une <a
                        href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite"
                        style="text-decoration: underline;">isolation thermique par l'extérieur (ITE)</a> placée juste
                    en dessous, il améliore considérablement le DPE de la maison. Mais attention là aussi : un matériau
                    inadapté ou d'entrée de gamme, et votre budget explosera sur l'entretien annuel.</p>
                <p>Dans ce guide, on répond aux questions qui fâchent. Quel bardage coûte le moins cher ? Quel type sans
                    entretien choisir ? Prix moyen d'un bardage extérieur au m² ? On passe en revue tous les matériaux,
                    les durées de vie réelles, les étapes de pose conformes DTU 41.4 et les aides MaPrimeRénov'.</p>
                <p>Commençons par le nerf de la guerre : l'argent.</p>

                <!-- Section : Prix -->
                <h2 id="prix">Prix bardage décoratif : quel est le coût au m² en 2026 ?</h2>
                <p>Réponse directe : <strong>60 à 120 €/m² pose comprise</strong>. Ça varie selon le matériau, la
                    surface traitée et la complexité du chantier (angles, encorbellements, ouvertures).</p>
                <p>J'ai compilé les tarifs moyens des pros (Dispano, Chausson, VPV Direct) et ajouté le coût d'entretien
                    sur 10 ans. Parce que c'est là que le bât blesse souvent.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Matériau</th>
                                <th>Fourniture seule</th>
                                <th>Pose incluse</th>
                                <th>Entretien 10 ans</th>
                                <th>Total 10 ans (100m²)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>PVC basique</strong></td>
                                <td>15-25 €</td>
                                <td>25-45 €</td>
                                <td>0 €</td>
                                <td>2 500-4 500 €</td>
                            </tr>
                            <tr>
                                <td><strong>Bois pin Douglas classe 3</strong></td>
                                <td>20-40 €</td>
                                <td>50-80 €</td>
                                <td>1 500 € (traitements)</td>
                                <td>6 500-9 500 €</td>
                            </tr>
                            <tr>
                                <td><strong>Composite imitation bois</strong></td>
                                <td>40-70 €</td>
                                <td>50-90 €</td>
                                <td>0 €</td>
                                <td>5 000-9 000 €</td>
                            </tr>
                            <tr>
                                <td><strong>Fibre-ciment (Cedral)</strong></td>
                                <td>30-50 €</td>
                                <td>60-100 €</td>
                                <td>500 € (nettoyage)</td>
                                <td>6 500-10 500 €</td>
                            </tr>
                            <tr>
                                <td><strong>Tôle bac acier imitation bois</strong></td>
                                <td>25-45 €</td>
                                <td>45-75 €</td>
                                <td>0 €</td>
                                <td>4 500-7 500 €</td>
                            </tr>
                            <tr>
                                <td><strong>Bois mélèze classe 4</strong></td>
                                <td>35-60 €</td>
                                <td>70-110 €</td>
                                <td>2 000 €</td>
                                <td>9 000-13 000 €</td>
                            </tr>
                            <tr>
                                <td><strong>Bois exotique Ipé (rénov seulement)</strong></td>
                                <td>60-100 €</td>
                                <td>90-150 €</td>
                                <td>3 000 €</td>
                                <td>12 000-18 000 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p><strong>Notes importantes :</strong> la main d'œuvre représente 40-60 % du prix. Ajoutez 20 % pour
                    maison avec étage ou nombreuses ouvertures. Surface moyenne maison : 80-120 m² de façade. Budget
                    total : 5 000-15 000 € hors aides. Demandez toujours le prix "clé en main" (ossature + pare-pluie +
                    bardage). Sinon, surprise à 30 % en plus.</p>

                <!-- Section : Bois vs Composite vs PVC -->
                <h2 id="bois-composite-pvc">Bardage bois vs composite vs PVC : quel type choisir sans se tromper ?</h2>
                <p>Quel est le meilleur type de bardage ? Aucun n'est parfait. Ça dépend de votre budget, du climat et
                    de votre patience pour l'entretien.</p>

                <h3>Bardage bois naturel : l'authentique (mais exigeant)</h3>
                <p>Avantages : look chaleureux, respirant (vapeur d'eau s'évacue), bonne isolation thermique naturelle.
                    Prix : 50-110 €/m². Essences à privilégier en France 2026 : le <strong>pin Douglas classe 3</strong>
                    (résistant humidité, 20-40 ans sans entretien intensif) et le <strong>mélèze classe 4</strong>
                    (ultra-durabilité en montagne, 30-50 ans). Évitez les bois exotiques (Ipé, Teck), interdits RE2020
                    en neuf et importations taxées.</p>
                <p>Problème majeur du bardage bois : l'humidité piégée. Sans lame d'air ventilée, l'eau condense
                    derrière. Moisissure garantie.</p>

                <blockquote class="article-blockquote">
                    Anecdote chantier : un client a posé du pin autoclave bas de gamme sur maison nord. 18 mois plus
                    tard, taches noires partout (humidité remontée). Reprise ossature + bardage neuf : 8 500 €. Toujours
                    Douglas classe 3 minimum et pose pro.
                </blockquote>

                <h3>Bardage composite : le champion sans entretien</h3>
                <p>Le grand gagnant des rénovations 2026. Mélange bois (40 %) + résine/PEHD (60 %). Look bois parfait,
                    garantie 25-50 ans (Silvadec, Fiberdeck). Prix : 50-90 €/m². Entretien : zéro ou presque. Un petit
                    <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade"
                        style="text-decoration: underline;">nettoyage et démoussage de façade</a> à basse pression tous
                    les 2 ans suffit. Exemples : Silvadec Eclipse (clips invisibles), Trex (anti-UV).</p>

                <h3>Bardage PVC et tôle imitation bois : l'économique</h3>
                <p>PVC : inaltérable, pas d'entretien. Look correct mais moins premium. 25-45 €/m². Tôle bac imitation
                    bois : pose ultra-rapide (1 jour maison). VPV Direct, Bacacier. 45-75 €/m². Idéal garage/atelier.
                </p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Votre Situation</th>
                                <th>Matériau Recommandé</th>
                                <th>Pourquoi ?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Budget serré</td>
                                <td><strong>PVC / Tôle</strong></td>
                                <td>Moins cher, zéro entretien</td>
                            </tr>
                            <tr>
                                <td>Look bois sans tracas</td>
                                <td><strong>Composite</strong></td>
                                <td>Imitation parfaite 40 ans</td>
                            </tr>
                            <tr>
                                <td>Climat humide</td>
                                <td><strong>Douglas classe 3</strong></td>
                                <td>Respirant + résistant</td>
                            </tr>
                            <tr>
                                <td>ITE obligatoire</td>
                                <td><strong>Tous (avec isolant)</strong></td>
                                <td>Double gain aides</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p><strong>Verdict :</strong> composite pour 80 % des maisons. Bois si vous aimez entretenir.</p>

                <!-- Section : Idées -->
                <h2 id="idees">8 idées bardage décoratif pour mur extérieur moderne</h2>
                <p>Quelles sont les idées de bardage pour mur extérieur ? Voici les poses tendance 2026 :</p>
                <ul class="custom-list">
                    <li><strong>Horizontal pin Douglas :</strong> classique pavillon. Large lames 27 mm.</li>
                    <li><strong>Vertical composite :</strong> effet hauteur, contemporain (maisons R+).</li>
                    <li><strong>Claire-voie ajourée 30 % :</strong> lumière traverse, ventilation naturelle.</li>
                    <li><strong>Faux claire-voie :</strong> esthétique ajouré + isolation pleine.</li>
                    <li><strong>Tôle imitation chêne :</strong> moderne low-cost, pose clips (Bacacier).</li>
                    <li><strong>Diagonal mélèze :</strong> dynamique, pluie ruisselle mieux.</li>
                    <li><strong>Fibre-ciment teinté anthracite :</strong> look béton brut.</li>
                    <li><strong>Mix horizontal/vertical :</strong> zones basses protégées composite.</li>
                </ul>
                <p>Tous nécessitent une lame d'air de 2 cm (DTU 41.4). Pas de collage direct sur le mur.</p>

                <!-- Section : Durée de vie -->
                <h2 id="duree-vie">Durée de vie et entretien d'un bardage décoratif</h2>
                <p>Quelle est la durée de vie d'un bardage ? <strong>15-60 ans</strong> selon matériau et pose.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Matériau</th>
                                <th>Sans entretien</th>
                                <th>Avec entretien</th>
                                <th>Problème principal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pin Douglas classe 3</td>
                                <td>15 ans</td>
                                <td>30 ans</td>
                                <td>Insectes, grisaillement</td>
                            </tr>
                            <tr>
                                <td>Mélèze classe 4</td>
                                <td>25 ans</td>
                                <td>50 ans</td>
                                <td>Joints se fissurent</td>
                            </tr>
                            <tr>
                                <td>Composite Silvadec</td>
                                <td>40 ans</td>
                                <td>50+ ans</td>
                                <td>Aucun</td>
                            </tr>
                            <tr>
                                <td>PVC</td>
                                <td>40 ans</td>
                                <td>50 ans</td>
                                <td>UV décolore</td>
                            </tr>
                            <tr>
                                <td>Fibre-ciment</td>
                                <td>50 ans</td>
                                <td>60 ans</td>
                                <td>Joints silicone</td>
                            </tr>
                            <tr>
                                <td>Tôle imitation</td>
                                <td>40 ans</td>
                                <td>50 ans</td>
                                <td>Rayures visibles</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p><strong>Quel bois ne pourrit pas à l'extérieur ?</strong> Aucun à 100 %. Douglas classe 3 traité
                    autoclave résiste le mieux (anti-champignons). Évitez sapin rouge (classe 2 intérieurs seulement).
                </p>
                <p><strong>Entretien minimum :</strong> haute pression annuelle (pas de javel). Composites = savon doux.
                </p>

                <!-- Section : Pose -->
                <h2 id="pose">Comment poser un bardage décoratif ? (Étapes DTU 41.4)</h2>
                <p>Le bardage est-il une bonne option pour votre maison ? Oui, si pose pro. Le bardage extérieur assure
                    la protection contre la pluie, améliore l'esthétique et rend possible l'ITE.</p>

                <h3>Étapes de pose (pro uniquement)</h3>
                <ul class="custom-list">
                    <li><strong>Diagnostic mur :</strong> nettoyer, réparer fissures.</li>
                    <li><strong>Ossature bois 48x73 mm :</strong> écartement 60 cm max, niveau laser.</li>
                    <li><strong>Pare-pluie :</strong> évite condensation (Sd 18).</li>
                    <li><strong>Lame air ventilée 20 mm :</strong> bas/haut ouvertes.</li>
                    <li><strong>Fixations inox :</strong> clips/équerres (pas vis tête).</li>
                    <li><strong>Joints dilatation :</strong> angles/fenêtres (10 mm).</li>
                </ul>
                <p><strong>Bonus ITE :</strong> bardage + laine de verre 140 mm = R=6 + aides 75 €/m².</p>
                <p><strong>Erreur numéro 1 :</strong> pas de lame d'air = humidité piégée, pourriture garantie.</p>

                <!-- Section : Aides -->
                <h2 id="aides">Aides financières et budget total bardage façade</h2>
                <p><strong>MaPrimeRénov' 2026 :</strong> 50-75 €/m² si bardage ventilé + ITE (revenus modestes).
                    <strong>CEE :</strong> 15-30 €/m². <strong>TVA 5,5 %</strong> sur tout.</p>
                <p>Budget maison 100 m² (composite + pose) : <strong>7 000 € brut → 4 500 € net aides</strong>.</p>

                <!-- Section : FAQ -->
                <h2 id="faq">FAQ Bardage Décoratif</h2>

                <h3>Quelles sont les alternatives au bardage en bois ?</h3>
                <p>Composite, PVC, fibre-ciment, ou même un <a href="<?php echo BASE_URL; ?>crepi-facade"
                        style="text-decoration: underline;">crépi de façade</a> traditionnel. Sur tous ces supports, le
                    composite gagne cependant toujours le match sur le rapport look global et sa durabilité maximale.
                </p>

                <h3>Le bardage est-il une bonne option pour votre maison ?</h3>
                <p>Oui pour la protection et l'isolation. Non si budget inférieur à 5 000 € ou maison historique
                    classée.</p>

                <h3>Comment fixer les gouttières sur une façade avec bardage décoratif ?</h3>
                <p>Sur une façade bardée, les crochets de gouttière doivent traverser le bardage et se fixer sur la structure porteuse, jamais sur les panneaux décoratifs eux-mêmes qui ne peuvent pas supporter la charge de l'eau pluviale. Notre guide <a href="https://www.cemarenov.fr/fixation-gouttiere-sur-bac-acier-isole">fixation gouttière sur bac acier isolé</a> détaille les systèmes de fixation adaptés aux façades habillées.</p>

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
                    Composite pour 80 % des maisons : zéro entretien, look bois parfait, 50-90 €/m². Bois Douglas classe
                    3 si vous aimez le naturel et l'entretien. PVC ou tôle si budget serré. Dans tous les cas, respectez
                    le DTU 41.4 : lame d'air ventilée obligatoire, ossature bois traitée classe 2, pare-pluie et
                    fixations inox. Et pensez à coupler le bardage avec une ITE pour maximiser les aides MaPrimeRénov'.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un devis bardage</a>
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