<?php
/**
 * gouttieres.php
 * Article: Gouttières — matériaux, prix, types et installation
 */

$article_meta = [
    'title' => 'Gouttières : matériaux, prix, types et installation (Guide terrain 2026)',
    'category' => 'travaux',
    'image' => 'https://www.cemarenov.fr/image/gouttieres.webp',
    'excerpt' => 'Zinc, alu ou PVC ? Prix au mètre linéaire, types de profils, dimensionnement et pose DTU 60.11. Le guide terrain complet pour choisir et installer vos gouttières.',
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
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Gouttières</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Évacuation eaux</span>
            </div>

            <h1>Gouttières : matériaux, prix, types<br>
                <span class="h1-accent">et Installation (Guide Terrain 2026)</span>
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
                Les gouttières, c'est le système d'évacuation qui protège silencieusement votre maison depuis le toit
                jusqu'aux fondations. Quand elles fonctionnent, on les oublie. Quand elles lâchent, c'est la façade qui
                trinque, les fondations qui s'imbibent et les murs qui remontent l'humidité. <strong>Zinc, alu ou PVC ?
                    Demi-ronde ou moulurée ? Ce guide passe en revue les vrais choix terrain, les prix au mètre linéaire
                    et les pièges d'installation.</strong>
            </p>

            <div class="article-content">

                <!-- TL;DR -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>PVC :</strong> 8-12 €/ml posé, 15-25 ans. Budget serré, mais fragile aux UV.</li>
                        <li><strong>Alu laqué :</strong> 15-25 €/ml posé, 25-40 ans. Meilleur rapport qualité/prix.</li>
                        <li><strong>Zinc :</strong> 20-35 €/ml posé, 40-50 ans. La référence durabilité.</li>
                        <li><strong>Maison 100 m² :</strong> budget total 1 500-4 500 € TTC selon matériau.</li>
                    </ul>
                </div>

                <!-- TOC -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#definition">Gouttières : définition et rôle essentiel</a></li>
                        <li><a href="#gouttiere-cheneau">Gouttière vs chéneau : les différences</a></li>
                        <li><a href="#dimensionnement">Dimensionnement : surface projetée et développés</a></li>
                        <li><a href="#types">Les principaux types de gouttières</a></li>
                        <li><a href="#materiaux">Matériaux comparés : zinc, alu, PVC, cuivre, acier</a></li>
                        <li><a href="#prix">Prix gouttières : €/ml, pose, maison 100 m²</a></li>
                        <li><a href="#installation">Installation : DTU 60.11, fixation, DIY vs pro</a></li>
                        <li><a href="#accessoires">Accessoires indispensables</a></li>
                        <li><a href="#entretien">Entretien et durée de vie</a></li>
                        <li><a href="#quand-remplacer">Quand remplacer des gouttières de 20 ans ?</a></li>
                        <li><a href="#faq">FAQ</a></li>
                    </ul>
                </div>

                <!-- Section : Définition -->
                <h2 id="definition">Gouttières : définition et rôle essentiel</h2>
                <p>Les gouttières captent l'eau de pluie qui ruisselle sur la toiture et l'évacuent vers les descentes.
                    Elles protègent les façades, les fondations et les murs porteurs des infiltrations. Sans gouttières
                    fonctionnelles, l'eau tombe directement au pied des murs, s'accumule dans le sol et remonte par
                    capillarité dans la maçonnerie. C'est le début d'un véritable enfer qui demandera bien souvent la
                    réalisation d'un <a href="<?php echo BASE_URL; ?>traitement-humidite"
                        style="text-decoration: underline;">traitement curatif de l'humidité en profondeur</a> pour
                    sauver la structure, sans parler des fissures de fondation et des enduits qui cloquent.</p>
                <p>Un système de gouttières complet comprend les gouttières elles-mêmes (profilés horizontaux), les
                    descentes (tuyaux verticaux), les naissances (jonction gouttière/descente), les crochets de fixation
                    et les accessoires d'étanchéité (fonds, jonctions, coudes).</p>

                <!-- Section : Gouttière vs Chéneau -->
                <h2 id="gouttiere-cheneau">Gouttière vs chéneau : les différences</h2>
                <p>La <strong>gouttière</strong> est fixée en bas de la pente de toiture, directement suspendue sur la
                    planche de rive ou l'habillage du <a href="<?php echo BASE_URL; ?>dessous-de-toit"
                        style="text-decoration: underline;">dessous de toit</a> via des crochets métalliques. C'est le
                    système le plus courant en maison individuelle. Le <strong>chéneau</strong> est intégré à la ligne
                    de rives, au niveau de la corniche. Il est fixe, maçonné ou encastré, et se retrouve sur les
                    immeubles anciens, les bâtiments publics et les toitures à corniche prononcée.</p>
                <p>Le chéneau offre une capacité hydraulique supérieure mais coûte beaucoup plus cher en pose et en
                    entretien (accès difficile, étanchéité zinc soudé). Pour une maison individuelle, la gouttière
                    suspendue reste la norme.</p>

                <!-- Section : Dimensionnement -->
                <h2 id="dimensionnement">Dimensionnement : surface projetée et développés</h2>

                <h3>Calcul de la surface projetée</h3>
                <p>La surface projetée correspond à la surface de toiture ramenée à l'horizontale : <strong>surface
                        projetée = surface toiture x cos(pente)</strong>. Exemple : un toit de 100 m² à 30° de pente
                    donne environ 87 m² de surface projetée utile (pluie verticale). C'est cette surface qui détermine
                    le développé de gouttière et le diamètre des descentes.</p>

                <h3>Choix du développé et descentes</h3>
                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Surface projetée</th>
                                <th>Développé gouttière</th>
                                <th>Descente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Moins de 50 m²</td>
                                <td>16/20</td>
                                <td>Ø80 / tous les 15 m</td>
                            </tr>
                            <tr>
                                <td>50 à 100 m²</td>
                                <td>25</td>
                                <td>Ø80-100 / tous les 12 m</td>
                            </tr>
                            <tr>
                                <td>Plus de 100 m²</td>
                                <td>33</td>
                                <td>Ø100 / tous les 10 m</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section : Types -->
                <h2 id="types">Les principaux types de gouttières</h2>

                <h3>Demi-ronde</h3>
                <p>Profil semi-circulaire, c'est le standard du marché (80 % des installations). Fabrication continue,
                    pose simple, excellent rapport débit/encombrement. Disponible dans tous les matériaux.</p>

                <h3>Moulurée rectangulaire</h3>
                <p>Esthétique moderne et angulaire, capacité hydraulique importante grâce au fond plat. Disponible en
                    couleurs RAL (surtout en alu). Idéale pour les maisons contemporaines.</p>

                <h3>Nantaise / Havraise</h3>
                <p>Profil traditionnel rampant, conçu pour les toitures anciennes avec rives travaillées. Se retrouve
                    sur les maisons de caractère en zone côtière et les bâtisses bourgeoises.</p>

                <h3>Corniche / Quimper</h3>
                <p>Profil adapté aux corniches prononcées ou aux fortes pentes de toiture. Le galbe du profil suit la
                    ligne de la corniche pour un rendu esthétique intégré.</p>

                <!-- Section : Matériaux -->
                <h2 id="materiaux">Matériaux comparés : zinc, alu, PVC, cuivre, acier</h2>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Matériau</th>
                                <th>Prix/ml posé</th>
                                <th>Durée de vie</th>
                                <th>Avantages</th>
                                <th>Inconvénients</th>
                                <th>Région idéale</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Zinc</strong></td>
                                <td>20-35 €</td>
                                <td>40-50 ans</td>
                                <td>Durable, soudable, patine noble</td>
                                <td>Prix élevé, pose qualifiée</td>
                                <td>Nord / Ouest</td>
                            </tr>
                            <tr>
                                <td><strong>Alu laqué</strong></td>
                                <td>15-25 €</td>
                                <td>25-40 ans</td>
                                <td>Léger, couleurs RAL, pas d'entretien</td>
                                <td>Sensible aux chocs</td>
                                <td>Sud / Toutes</td>
                            </tr>
                            <tr>
                                <td><strong>PVC</strong></td>
                                <td>8-12 €</td>
                                <td>15-25 ans</td>
                                <td>Pas cher, pose DIY facile</td>
                                <td>Fragile UV, se déforme</td>
                                <td>Budget</td>
                            </tr>
                            <tr>
                                <td><strong>Cuivre</strong></td>
                                <td>35-50 €</td>
                                <td>50+ ans</td>
                                <td>Luxe, patine vert-de-gris</td>
                                <td>Très cher</td>
                                <td>Haut de gamme</td>
                            </tr>
                            <tr>
                                <td><strong>Acier galvanisé</strong></td>
                                <td>18-30 €</td>
                                <td>20-30 ans</td>
                                <td>Robuste, bonne capacité</td>
                                <td>Corrosion si rayé</td>
                                <td>Industriel</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section : Prix -->
                <h2 id="prix">Prix gouttières : €/ml, pose, maison 100 m²</h2>
                <p>Matériel seul : 5-20 €/ml. Posé par un pro : <strong>15-45 €/ml</strong>. Pour une maison de 100 m²
                    (environ 50 à 100 ml de gouttières + descentes) : <strong>1 500-4 500 € TTC</strong>.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Linéaire total</th>
                                <th>Zinc (posé)</th>
                                <th>Alu (posé)</th>
                                <th>PVC (posé)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>50 ml</td>
                                <td>1 500 €</td>
                                <td>1 200 €</td>
                                <td>800 €</td>
                            </tr>
                            <tr>
                                <td>100 ml</td>
                                <td>3 000 €</td>
                                <td>2 200 €</td>
                                <td>1 500 €</td>
                            </tr>
                            <tr>
                                <td>150 ml</td>
                                <td>4 500 €</td>
                                <td>3 300 €</td>
                                <td>2 200 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section : Installation -->
                <h2 id="installation">Installation : DTU 60.11, fixation, DIY vs pro</h2>

                <h3>Étapes DTU 60.11</h3>
                <ul class="custom-list">
                    <li><strong>Pente :</strong> 0,5 à 1 % vers la descente. C'est le minimum pour que l'eau s'écoule
                        sans stagner.</li>
                    <li><strong>Crochets :</strong> fixés tous les 50 cm sur bandeau, chevron ou maçonnerie. Crochets
                        inox ou galvanisés obligatoires.</li>
                    <li><strong>Assemblage :</strong> emboîtement collé pour alu/PVC, soudure à l'étain pour zinc.</li>
                    <li><strong>Descentes :</strong> fixées au mur par colliers tous les 1,50 m, avec dauphin en pied
                        (regard ou caniveau).</li>
                </ul>

                <blockquote class="article-blockquote">
                    Un client pose du PVC sous des pins maritimes. La résine chauffée par le soleil combinée aux UV :
                    déformation complète en 3 ans. On a tout repris en zinc soudé. 40 ans sans souci. Sous les arbres
                    résineux, le zinc ou l'alu, pas le PVC.
                </blockquote>

                <p><strong>DIY vs pro :</strong> le PVC clipsé à emboîtement est accessible en bricolage (maison
                    plain-pied, accès facile). Le zinc soudé et l'alu en continu nécessitent un zingueur professionnel,
                    c'est un métier à part entière. Pour les maisons à étage, l'échafaudage justifie à lui seul le
                    recours à un artisan.</p>

                <!-- Section : Accessoires -->
                <h2 id="accessoires">Accessoires indispensables</h2>
                <p>Un système de gouttières complet ne se résume pas aux profilés. Les accessoires font la différence
                    entre une installation qui dure et une qui fuit.</p>
                <ul class="custom-list">
                    <li><strong>Pare-feuilles :</strong> grilles ou brosses qui empêchent les feuilles de boucher la
                        gouttière. Indispensable près des arbres.</li>
                    <li><strong>Crapaudines :</strong> filtres en forme de dôme placés à l'entrée des descentes pour
                        bloquer les gros débris.</li>
                    <li><strong>Naissances :</strong> pièces de jonction entre la gouttière et la descente. Disponibles
                        en sortie droite ou orientable.</li>
                    <li><strong>Crochets :</strong> bandeau (vis), développé (chevron) ou maçonnerie (scellement).
                        Espacement 50 cm max.</li>
                    <li><strong>Talon nantais :</strong> pièce d'extrémité spécifique aux profils nantais/havrais.</li>
                    <li><strong>Raccords et jonctions :</strong> angles intérieurs/extérieurs, manchons de dilatation
                        (obligatoires sur alu tous les 10 m).</li>
                </ul>

                <!-- Section : Entretien -->
                <h2 id="entretien">Entretien et durée de vie</h2>
                <ul class="custom-list">
                    <li><strong>Zinc :</strong> brossage annuel pour retirer les feuilles et la mousse. Pas de peinture,
                        la patine protège. Durée de vie : 40-50 ans.</li>
                    <li><strong>Alu laqué :</strong> lavage annuel à l'eau claire. La laque polyester résiste aux UV.
                        Durée de vie : 25-40 ans.</li>
                    <li><strong>PVC :</strong> nettoyage régulier (les UV fragilisent le plastique au fil des années).
                        Durée de vie : 15-25 ans.</li>
                    <li><strong>Cuivre :</strong> aucun entretien particulier, la patine vert-de-gris est une protection
                        naturelle. Durée de vie : 50 ans et plus.</li>
                </ul>
                <p>Dans tous les cas, vérifiez la pente et les fixations une fois par an (après l'hiver). De la même
                    façon qu'un <a href="<?php echo BASE_URL; ?>demoussage-tuiles-terre-cuite"
                        style="text-decoration: underline;">démoussage de tuiles</a> protégera votre couverture,
                    débouchez rigoureusement vos descentes avant l'automne. Un système de gouttières bouché, c'est un
                    débordement garanti au premier gros orage.</p>

                <!-- Section : Quand remplacer -->
                <h2 id="quand-remplacer">Quand remplacer des gouttières de 20 ans ?</h2>
                <p>Les signaux d'alerte qui ne trompent pas : débordement malgré nettoyage (profil déformé ou pente
                    perdue), corrosion visible (trous, taches rouilles sur acier), fixations HS (crochets cassés,
                    gouttière qui pend), traces d'infiltration bien sombres sur la façade sous la ligne de gouttière
                    (nécessitant a minima un lourd <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade"
                        style="text-decoration: underline;">nettoyage et démoussage de façade</a> derrière).</p>
                <p>À 20 ans, le PVC et l'acier galvanisé arrivent souvent en fin de vie. L'alu peut encore tenir 10-20
                    ans si la laque est intacte. Le zinc, lui, est à peine à mi-parcours. Si vous hésitez entre
                    réparation et remplacement, faites faire un diagnostic par un zingueur : une gouttière qui fuit à 3
                    endroits différents ne se répare plus, elle se remplace.</p>

                <!-- Section : FAQ -->
                <h2 id="faq">FAQ</h2>

                <h3>C'est quoi des gouttières ?</h3>
                <p>Des profilés horizontaux fixés sous le débord de toiture qui captent l'eau de pluie et l'évacuent
                    vers les descentes, protégeant ainsi les façades et les fondations.</p>

                <h3>Quelle est la différence entre une gouttière et un chéneau ?</h3>
                <p>La gouttière est suspendue sous le débord de toit par des crochets. Le chéneau est fixe, intégré à la
                    corniche ou maçonné. Le chéneau offre plus de capacité mais coûte plus cher.</p>

                <h3>Quel est le prix d'une gouttière ?</h3>
                <p>De 8 €/ml posé en PVC à 50 €/ml posé en cuivre. Pour une maison standard, comptez 1 500-4 500 € TTC
                    tout compris.</p>

                <h3>Quels sont les types de gouttières ?</h3>
                <p>Demi-ronde (standard 80 % du marché), moulurée rectangulaire (moderne), nantaise/havraise
                    (traditionnelle) et corniche/Quimper (fortes pentes).</p>

                <h3>Quel est le meilleur système de gouttières ?</h3>
                <p>Le zinc pour la durabilité (40-50 ans, soudable). L'alu laqué pour le rapport qualité/prix et
                    l'esthétique moderne (couleurs RAL, 25-40 ans).</p>

                <h3>Quelle est la durée de vie d'une gouttière ?</h3>
                <p>PVC : 15-25 ans. Acier : 20-30 ans. Alu : 25-40 ans. Zinc : 40-50 ans. Cuivre : 50 ans et plus.</p>

                <h3>Quel est le matériau le plus durable ?</h3>
                <p>Zinc et cuivre. Le cuivre est le champion absolu (50+ ans), le zinc offre le meilleur compromis
                    durabilité/prix.</p>

                <h3>Pourquoi les gouttières sont-elles chères ?</h3>
                <p>Le coût des matériaux (surtout zinc et cuivre), la pose en hauteur (échafaudage), la soudure
                    spécialisée et les accessoires (crochets, naissances, descentes) font grimper la facture.</p>

                <h3>Combien coûte le changement de gouttières ?</h3>
                <p>20-45 €/ml tout compris (dépose ancienne + fourniture + pose neuve). Ajoutez 10-15 % si l'accès est
                    difficile (étage, toiture complexe).</p>

                <h3>Quels sont les inconvénients de l'aluminium ?</h3>
                <p>Sensible aux chocs (échelle, branches), dilatation thermique (manchons obligatoires tous les 10 m),
                    moins noble que le zinc en patine. Mais léger, sans entretien et disponible en couleurs.</p>

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
                    Les gouttières protègent silencieusement votre maison des infiltrations pendant des décennies. Le
                    zinc reste la référence pour la durabilité (40-50 ans, soudable, patine naturelle). L'alu laqué
                    offre le meilleur rapport qualité/prix pour les maisons modernes. Le PVC dépanne sur un budget
                    serré, mais ne comptez pas sur lui au-delà de 20 ans. Dans tous les cas, respectez la pente DTU
                    (0,5-1 %), les crochets tous les 50 cm et un nettoyage annuel. C'est ce qui fait la différence entre
                    un système qui dure et un système qui déborde.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un devis gouttières</a>
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
                        <?php
                    endforeach; ?>
                </div>
            </section>

        </div>

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