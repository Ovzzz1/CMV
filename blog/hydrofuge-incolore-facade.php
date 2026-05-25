<?php
/**
 * hydrofuge-incolore-facade.php
 * Article: Hydrofuge incolore façade — prix, avis, application
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Hydrofuge incolore façade : Prix, Avis et Application (Guide 2026)',
    'category' => 'renovation', // ou 'travaux'
    'image' => 'https://www.cemarenov.fr/image/hydrofuge-incolore-facade.webp',
    'excerpt' => 'L\'hydrofuge de façade incolore protège vos murs sans modifier leur aspect. Quel est le vrai prix au m² ? Sika ou Dalep ? Résumé des avis et étapes d\'application.',
    'date' => '2026-03-05',
    'reading_time' => 10,
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
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Hydrofuge façade</span>
            </nav>
            
            <div class="article-tags">
                <span class="article-tag">Façade</span>
                <span class="article-tag">Protection</span>
            </div>

            <h1>Hydrofuge incolore façade :<br>
                <span class="h1-accent">Prix, Avis et Guide d'Application (2026)</span>
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
                Votre façade en pierre taillée ou votre enduit gratté tout neuf absorbe l'eau comme une éponge dès qu'il pleut ? Vous voulez imperméabiliser le mur sans risquer de ruiner sa couleur avec une résine brillante ou teintée. <strong>La solution, c'est l'hydrofuge de façade incolore. Mais attention, pulvériser un produit invisible ne s'improvise pas.</strong> Sur un support mal préparé, l'effet perlant ne durera pas l'hiver. Focus sur ce traitement esthétiquement neutre mais redoutablement efficace : prix au mètre carré (DIY vs Artisan), avis des marques phares (Sikagard, Dalep, Procom) et les secrets d'une pulvérisation garantie 10 ans.
            </p>

            <div class="article-content">
                
                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Le principe :</strong> Contrairement à une peinture, l'hydrofuge incolore <em>pénètre</em> le mur sans constituer de film en surface (non-filmogène). Le mur reste mat, sa couleur d'origine est préservée, mais l'eau de pluie perle au lieu d'y entrer.</li>
                        <li><strong>Prix produit seul :</strong> De 3 à 8 €/m² (Sikagard 221, Dalep, Procom). Environ 20 € à 120 € selon les bidons (5L à 20L).</li>
                        <li><strong>Prix posé par un pro :</strong> 20 à 35 €/m², comprenant générallement le nettoyage préparatoire haute pression et l'échafaudage.</li>
                        <li><strong>La règle d'or :</strong> On ne traite qu'une façade 100% saine. L'hydrofuge ne bouche PAS les fissures de plus de 0,3 mm.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#comment-ca-marche">Comment fonctionne un hydrofuge de façade incolore ?</a></li>
                        <li><a href="#avis">Avis sur les hydrofuges : Sikagard, Dalep, Procom</a></li>
                        <li><a href="#prix">Prix hydrofuge incolore 2026 (Achat direct vs Artisan)</a></li>
                        <li><a href="#application">Application : Les 4 règles d'un chantier réussi</a></li>
                        <li><a href="#test">L'astuce terrain : Le test de la goutte d'eau</a></li>
                        <li><a href="#faq">Foire Aux Questions (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Section 1 : Principe -->
                <h2 id="comment-ca-marche">Comment fonctionne un hydrofuge de façade incolore ?</h2>
                <p>Beaucoup de gens confondent l'hydrofuge avec un vernis. <strong>C'est une grave erreur de conception.</strong> Un vernis (ou une lasure) crée une pellicule plastique à la surface du mur. Ça brille, ça change l'aspect du grain, et surtout : ça bloque considérablement la respiration de la maison. Sur un enduit ciment ou de la pierre, un mur "scellé" accumule l'humidité intérieure, forçant tôt ou tard la mise en œuvre d'un lourd <a href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">traitement curatif contre l'humidité des murs</a>, en plus de cloquer et de se désagréger complètement sous l'effet du gel.</p>
                
                <p>L'<strong>hydrofuge incolore</em> (technologie polysiloxane ou silane-siloxane) <strong>pénètre par capillarité</strong> dans les pores du matériau, jusqu'à 10 ou 15 mm de profondeur. Il modifie la tension de tension de surface à l'intérieur même du mur. Résultat ? L'eau sous forme liquide (la pluie) est repoussée, mais la vapeur d'eau <em>sort </em>sans aucune gêne. C'est l'essence même d'un produit <strong>microporeux et non-filmogène</strong>.</p>
                
                <h3>Sur quels matériaux l'appliquer ?</h3>
                <ul class="custom-list">
                    <li>La pierre naturelle ou reconstituée (préserve la patine ancienne)</li>
                    <li>Le <a href="<?php echo BASE_URL; ?>crepi-facade" style="text-decoration: underline;">crépi de façade</a> traditionnel, ainsi que les enduits grattés, talochés ou projetés (quand ils sont fortement abîmés par les pluies battantes)</li>
                    <li>Le parpaing brut, les briques apparentes, ou le béton architectonique</li>
                </ul>

                <!-- Section 2 : Avis -->
                <h2 id="avis">Avis sur les hydrofuges incolores : Sikagard, Dalep, Procom</h2>
                <p>Dans les rayons pros et les grandes surfaces de bricolage (Leroy Merlin, Castorama), le marché de la protection de façade est très bataillé. Mais les retours d'artisans et d'utilisateurs dessinent une hiérarchie claire.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Marque et Produit</th>
                                <th>Avis moyen (Usage)</th>
                                <th>Retour terrain</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Sika (Sikagard 221)</strong></td>
                                <td>4.7/5 (> 5000 avis)</td>
                                <td>La référence absolue. Pénétrabilité excellente, produit aqueux (sans odeur forte). Approuvé pour la plupart des supports, séchage rapide (protégé sous 3h contre la pluie). L'effet perlant est immédiat.</td>
                            </tr>
                            <tr>
                                <td><strong>Dalep (Hydrofuge Façade 2100)</strong></td>
                                <td>4.5/5</td>
                                <td>Le concurrent direct français. L'avantage majeur de Dalep réside souvent dans les formulations "2 en 1" : hydrofuge + anti-mousse préventif longue durée.</td>
                            </tr>
                            <tr>
                                <td><strong>Procom (Gamme étanchéité)</strong></td>
                                <td>4.8/5</td>
                                <td>Moins connu du grand public mais très apprécié pour son excellent rapport prix/consommation. Permet de traiter environ 5 m² au litre avec un fort pouvoir imperméabilisant sur les enduits poreux.</td>
                            </tr>
                            <tr>
                                <td><strong>Comus (Migrastop 60)</strong></td>
                                <td>Professionnel</td>
                                <td>Traitements techniques haut de gamme, souvent à base de solvants. Plus cher (jusqu'à 120€ les 5L), utilisé sur des chantiers avec fortes contraintes de porosité, avec EPI (masques) recommandés.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <blockquote class="article-blockquote">
                    <strong>Avis d'artisan :</strong> "L'effet 'Whaou' de l'eau qui perle fascine toujours les clients. Mais ce qui compte, ce n'est pas le jour de la pose, c'est 4 ans plus tard. Si le mur verdit au Nord, c'est que l'hydrofuge a été lessivé. Toujours croiser les couches (pulvérisation droite-gauche puis haut-bas) pour saturer le support en profondeur à refus."
                </blockquote>

                <!-- Section 3 : Prix -->
                <h2 id="prix">Prix hydrofuge incolore 2026 (Achat direct vs Artisan)</h2>
                <p>Si vous décidez de vous lancer vous-même en DIY, <strong>le produit reste très abordable</strong>. Ce qui va consommer votre budget, c'est la quantité (souvent sous-estimée à cause de la porosité des vieux enduits).</p>

                <h3>1. Budget produit seul (DIY)</h3>
                <p>Le rendement classique est de <strong>0,20 à 0,50 L par m²</strong> (soit 1 litre pour 2 à 5 m², selon si c'est du béton très lisse ou de la pierre ponce).</p>
                <ul class="custom-list">
                    <li>Prix moyen au litre : de 4 € à 15 €</li>
                    <li>Prix d'impact réel pour le mur : <strong>3 à 8 € du mètre carré</strong>.</li>
                    <li><em>À prévoir en plus :</em> Achat d'un bon pulvérisateur dorsal manuel (40-60€), fongicide de préparation, harnais pour échelle et EPI (lunettes et masque FFP2/A2 si produit solvanté).</li>
                </ul>

                <h3>2. Prix de l'intervention par un façadier professionnel</h3>
                <p>À l'image d'un colossal <a href="<?php echo BASE_URL; ?>ravalement-de-facade" style="text-decoration: underline;">ravalement de façade</a> complet, faire appel à un pro pour amener ce type d'hydrofugation ne se limite jamais à "vaporiser". Les entreprises incluent la mise en place d'un échafaudage sécurisé et la préparation indispensable du support.</p>
                <ul class="custom-list">
                    <li>Total prestation : <strong>Entre 20 € et 35 € le mètre carré TTC</strong>.</li>
                    <li>Pour un pignon de deux étages (60 m²), comptez de 1 200 à 2 100 €.</li>
                    <li><em>L'avantage :</em> Le diagnostic des fissures (réparation au mastic hybride), le nettoyage intégral basse pression (pas de dégâts sur l'enduit) et la garantie décennale en cas de remontées humides (selon contrat).</li>
                </ul>

                <!-- Section 4 : Application -->
                <h2 id="application">Application : Les 4 règles d'un chantier réussi</h2>
                <p>S'il ne fallait retenir qu'une chose de ce guide : <strong>L'hydrofuge est une sentinelle, pas un médecin.</strong> Appliquer un hydrofuge incolore sur un mur farinant, taché d'algues ou fissuré, c'est enfermer le problème.</p>

                <h3>Étape 1 : Le grand nettoyage (J-7)</h3>
                <p>Le mur <em>doit</em> être sain. Passez un nettoyeur haute pression adapté (ou eau chaude basse pression si enduit fragile) pour déloger la mousse. Ensuite, passez un fongicide/algicide algimouss et laissez agir plusieurs jours. Brossez les résidus morts.</p>

                <h3>Étape 2 : L'inspection des joints et microfissures (J-3)</h3>
                <p>Un hydrofuge liquide ne crée pas de pont élastique. Si votre mur possède une fissure de plus de 0,3 millimètres (la taille d'une griffe), l'eau va entrer. Colmatez ces petites fissures au mastic acrylique de même texture, réparez les éclats, laissez sécher totalement l'enduit.</p>

                <h3>Étape 3 : La journée d'application (Méteo clé)</h3>
                <p>La règle météo : Pas de pluie prévue dans les 24h à venir ! Température stricte : <strong>entre 5°C et 30°C</strong>. S'il gèle ou qu'il pleut lors du séchage, le produit n'adhérera pas. S'il fait trop chaud (mur au soleil le mois de juillet), l'eau du produit s'évapore avant même que les actifs n'aient pu pénétrer la porosité. Agissez au matin, à l'ombre.</p>
                <p>Protégez vos vitres avec des bâches ! Un hydrofuge sec sur une fenêtre nécessite de gratter le verre à la lame de rasoir...</p>

                <h3>Étape 4 : La pulvérisation de "saturation"</h3>
                <p>Oubliez le rouleau qui mousse, prenez un gros pulvérisateur de jardin ou un pistolet basse pression. Travaillez par <strong>bandes verticales, strictement de bas en haut</strong> (pour éviter les coulures blanchâtres sur le mur sec en dessous). Vous devez saturer le support (ça doit ruisseler sur 15 cm max). Dès que la première passe ne brille plus (environ 15 à 30 minutes selon la chaleur), passez la seconde couche en croisant (horizontal).</p>

                <!-- Section 5 : Astuce terrain -->
                <h2 id="test">L'astuce terrain : Le test de la goutte d'eau (Le tube de Karsten)</h2>
                <p>Comment savoir si votre enduit ou vos briques, après 20 ans, ont vraiment besoin d'un l'hydrofuge, ou comment mesurer l'efficacité de vos travaux ? Prudence ! Ne vous fiez pas juste à la vue.</p>
                
                <p>Prenez un vaporisateur ménager classique avec de l'eau pure. Aspergez légèrement le mur.
                <br>- Si une bulle d'eau ronde reste en surface (effet Lotus), le mur repousse l'eau, il est hydrophobe, inutile d'hydrofuger.
                <br>- Si l'eau perle mais s'étale doucement et forme une petite flaque mouillée, sa protection faiblit.
                <br>- Si <strong>le support s'assombrit instantanément, absorbant l'eau sans aucune goutte</strong> : un traitement s'impose d'urgence avant l'hiver.</p>

                <!-- Section 6 : FAQ -->
                <h2 id="faq">Foire Aux Questions (FAQ)</h2>

                <h3>Est-ce que l'hydrofuge incolore modifie vraiment la couleur du mur ?</h3>
                <p>Non, 99 % du temps il laisse l'aspect mat et naturel d'origine. Certains produits très concentrés peuvent donner un effet légèrement "mouillé" temporaire (durant quelques jours de polymérisation), avant que le support ne retrouve sa teinte d'origine sans verni ni brillance. Toutefois, faites toujours un carreau de test dans un coin non visible !</p>

                <h3>Au bout de combien de temps l'hydrofuge est-il efficace contre la pluie ?</h3>
                <p>Avec des marques comme Sika, le traitement est dit "hors-pluie" (ou sec au toucher protégé) au bout de 2 à 4 heures par 20 degrés. Mais l'effet perlant final, soit la polymérisation la plus profonde des silanes, atteint sa performance maximale <strong>entre 3 et 7 jours</strong> après l'application.</p>

                <h3>Faut-il utiliser un masque pour pulvériser le produit ?</h3>
                <p>Oui. Pour n'importe quelle pulvérisation (Même aqueuse), des particules fines se diffusent dans les bourrasques de vent. Prévoyez de simples lunettes enveloppantes et un masque pour brouillards d'eau pour des versions aqueuses. Pour les résines solvantées du commerce (type Migrastop), un masque chimique adapté aux solvants (type cartouche A2) est indispensable sous peine de maux de tête virulents.</p>

                <h3>Quelle est la durée de vie d'un traitement hydrofuge de façade ?</h3>
                <p>L'effet diminue lentement avec l'usure climatique et l'effet des UV. Un hydrofuge haute performance apposé sur un mur saturé peut tenir jusqu'à <strong>10 ans</strong>. Si le rinçage complet et les pluies battantes ne repoussent plus l'humidité, sa fonction aura disparue et un nouveau traitement deviendra opportun.</p>
                
                <h3>Peut-on peindre au-dessus de l'hydrofuge plus tard ?</h3>
                <p><strong>C'est le piège n°1 !</strong> Non ! Puisque l'hydrofuge est conçu pour tout rejeter (l'eau et autres substances), une <a href="<?php echo BASE_URL; ?>peinture-de-facade" style="text-decoration: underline;">peinture pour façade</a> acrylique ou siloxane classique posée juste par-dessus l'année d'après ne s'agrippera pas ! Il faudra attendre que l'hydrofuge perde toute son action déperlante avec les années, ou recourir à des primaires d'accroche chimiques professionnels extrêmement complexes.</p>

            </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert R&eacute;novation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d&rsquo;exp&eacute;rience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois pour r&eacute;ussir vos travaux et &eacute;viter les arnaques.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>L'essentiel à retenir</h3>
                <p>
                    L'hydrofuge <strong>incolore</strong> pour la façade est un atout magistral de durabilité pour la beauté des matériaux (pierres claires, enduits grattés) très soumis aux pluies frappantes de l'ouest ou aux mousses proliférantes du nord de la France. Ne coûtant que quelques euros au m² en matériaux, et jusqu'à 25€ posé par un façadier aguerri, il s'agit d'une assurance santé pour les murs très sains, évitant le gel profond, les traînées noires d'humidité et l'écaillement, <strong>tout en préservant le charme original du bâtiment</strong>.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un diagnostic façade gratuit</a>
            </div>

            <!-- Similar Articles (below conclusion) -->
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

        </div> <!-- .article-container -->

        <!-- RIGHT SIDEBAR: Latest Articles -->
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
