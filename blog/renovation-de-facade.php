<?php
/**
 * renovation-de-facade.php
 * Article: Rénovation de Façade — prix m², avant/après, étapes, fissures
 */

$article_meta = [
    'title' => 'Rénovation de Façade 2026 : Prix au m², Étapes et Traitement des Fissures',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/renovation-de-facade.webp',
    'excerpt' => 'De la simple microfissure à la lézarde structurelle, rénover une façade demande un diagnostic précis. Quel est le vrai prix au m² en 2026 pour un nettoyage, un enduit ou une réparation ?',
    'date' => '2026-03-05',
    'reading_time' => 10,
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
                <span>Murs Extérieurs</span>
            </nav>
            
            <div class="article-tags">
                <span class="article-tag">Façade</span>
                <span class="article-tag">Fissures</span>
            </div>

            <h1>Rénovation de Façade :<br>
                <span class="h1-accent">Prix 2026, Étapes et Traitement des Fissures</span>
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
                Le mot "<a href="<?php echo BASE_URL; ?>ravalement-de-facade" style="text-decoration: underline;">Ravalement</a>" fait souvent peur pour son aspect "obligation légale", mais la "Rénovation" de façade est avant tout un acte de sauvetage. Quand une façade cloque, que la peinture "farine" sous la main, ou pire, qu'un réseau de microfissures s'installe autour des fenêtres, l'eau pénètre irrémédiablement dans la structure de la maison. Rénover en 2026, c'est choisir entre trois grandes voies : le <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade" style="text-decoration: underline;">nettoyage thérapeutique</a> (économique), l'application d'un <a href="<?php echo BASE_URL; ?>enduit-facade" style="text-decoration: underline;">nouvel enduit</a> (classique) ou la pose d'un <a href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite" style="text-decoration: underline;">pardessus thermique (l'ITE)</a>. Voici comment diagnostiquer la santé de vos murs, traiter des fissures, et surtout, quel budget au m² anticiper pour transformer durablement votre Avant/Après.
            </p>

            <div class="article-content">
                
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Économique (Le Nettoyage) :</strong> Entre <strong>5 € et 30 €/m²</strong>. Un <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade" style="text-decoration: underline;">démoussage biocide</a> suivi d'un <a href="<?php echo BASE_URL; ?>hydrofuge-incolore-facade" style="text-decoration: underline;">hydrofuge</a> redonne vie à un crépi terni mais sain.</li>
                        <li><strong>Standard (L'Enduit/Peinture) :</strong> Entre <strong>40 € et 80 €/m²</strong>. Purge des parties creuses, traitement des joints et <a href="<?php echo BASE_URL; ?>crepi-facade" style="text-decoration: underline;">nouveau crépi</a> ou <a href="<?php echo BASE_URL; ?>peinture-de-facade" style="text-decoration: underline;">peinture siloxane</a>. Idéal pour moderniser.</li>
                        <li><strong>Premium (L'Isolation Extérieure) :</strong> De <strong>140 € à 250 €/m²</strong>. On profite des échafaudages pour poser 15cm de polystyrène. C'est l'ultime solution "Anti-Passoire thermique".</li>
                        <li><strong>Alerte Fissures :</strong> Une fissure de moins de 2 mm (microfissure) se gère à l'enduit élastomère. Une lézarde (> 5 mm) qui traverse le parpaing signale un affaissement des fondations, le maçon doit intervenir d'urgence.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#diagnostic">Le Diagnostic de départ (Identifier le mal)</a></li>
                        <li><a href="#fissures">Solutions Techniques : Que faire face aux fissures ?</a></li>
                        <li><a href="#etapes">Les grandes étapes chronologiques d'une rénovation</a></li>
                        <li><a href="#prix">Grille des Prix au m² pour 2026 (Devis Artisans)</a></li>
                        <li><a href="#faq">Foire Aux Questions (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Section 1 : Diagnostic -->
                <h2 id="diagnostic">Le Diagnostic de départ (Identifier le mal)</h2>
                <p>Avant même de choisir la couleur finale, un façadier sérieux passe au moins une heure à occulter vos murs. En rénovation de façade, on ne cache pas la misère sous un litre d'acrylique, on soigne la "pathologie" du bâtiment.</p>

                <ul class="custom-list">
                    <li><strong>Le Salpêtre et les mousses vertes :</strong> Signent généralement un défaut d'étanchéité ou une <a href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">remontée capillaire</a> depuis le sol. Si on repeint par-dessus, la peinture explosera l'hiver suivant. Il faut d'abord <a href="<?php echo BASE_URL; ?>assechement-murs-injections" style="text-decoration: underline;">injecter de la résine</a> dans le bas du mur ou poser un drain.</li>
                    <li><strong>Le décollement d'enduit (Son creux) :</strong> En tapant le mur avec le manche d'un tournevis, ça sonne totalement creux ? L'enduit s'est désolidarisé du parpaing. Il est mort. La seule solution est de le "piquer" (le détruire) jusqu'au dur pour repartir de zéro.</li>
                    <li><strong>Le Farinage :</strong> Vous passez la main sur la peinture et elle ressort blanche de poudre. Le liant de la vieille peinture est cuit par les UV. Obligation de poser un "Fixateur de fond" avant tout nouveau coup de rouleau.</li>
                </ul>

                <!-- Section 2 : Fissures -->
                <h2 id="fissures">Solutions Techniques : Que faire face aux fissures ?</h2>
                <p>C'est l'angoisse n°1 des propriétaires. Le mur craque. Mais toutes les fissures n'ont pas la même gravité ni le même remède de rénovation.</p>

                <h3>1. Le Faïençage et les Microfissures (< 0,2 mm)</h3>
                <p>Elles ressemblent à une toile d'araignée très fine à la surface de l'enduit. Elles touchent le revêtement, pas la structure.<br>
                <strong>La Solution :</strong> Un bon grattage, une sous-couche, et l'application d'un revêtement d'imperméabilité épais (un revêtement organique souple RSE/RPE) qui va "ponter" (recouvrir) ces microfissures grâce à son élasticité.</p>

                <h3>2. Les Fissures Légères (de 0,2 mm à 2 mm)</h3>
                <p>Souvent situées aux angles des fenêtres ou aux jonctions de matériaux (changement entre de la brique et du parpaing). Elles bougent légèrement au fil des saisons.<br>
                <strong>La Solution :</strong> L'artisan doit "ouvrir la fissure en V" avec un grattoir triangulaire. Il la nettoie, puis la bourre généreusement avec un <strong>mastic élastomère (polyuréthane ou acrylique extérieur)</strong>. Il peut aussi noyer une trame en fibre de verre dans l'enduit par-dessus pour consolider la zone (marouflage).</p>

                <h3>3. Les Lézardes profondes (> 2 mm jusqu'à plusieurs cm)</h3>
                <p>On peut enfoncer une lame de couteau dedans. Elles traversent parfois le mur de part en part. La maison a "travaillé" ou s'est affaissée (mouvements de sol argileux, sécheresses à répétition).<br>
                <strong>La Solution :</strong> Le peintre façadier s'arrête. Il faut appeler un expert en structure. On réalise souvent des agrafes métalliques noyées dans le béton (couture de fissure) ou des injections de résine expansive dans les fondations pour stabiliser la maison avant de refaire la façade.</p>

                <!-- Section 3 : Etapes -->
                <h2 id="etapes">Les grandes étapes chronologiques d'une rénovation</h2>
                <p>Une fois la Déclaration Préalable (DP) validée par la mairie (il est interdit de changer l'aspect de sa maison sans accord), le chantier prend souvent cette forme sur une durée d'une à deux semaines :</p>

                <ol>
                    <li><strong>L'Installation :</strong> Montage de l'échafaudage réglementaire. Bâchage minutieux de tout ce qui ne se peint pas (menuiseries PVC, baies vitrées, poignées, sols des terrasses).</li>
                    <li><strong>Le Lavage :</strong> Application d'un nettoyant ou destructeur de mousses au pulvérisateur, temps d'action (parfois 24h), puis lavage à moyenne ou haute pression selon la fragilité du support.</li>
                    <li><strong>La Préparation (L'essentiel du coût) :</strong> Ouverture et mastiquage acrylique des fissures, purge des vieux joints qui tombent en miettes, reprise des trous avec du mortier de réparation.</li>
                    <li><strong>L'Impression :</strong> Pose du "Primaire" (la sous-couche) au rouleau. C'est elle qui assure l'adhérence (la colle) entre l'ancien mur farinant et le nouvel enduit/peinture.</li>
                    <li><strong>La Finition :</strong> Projection du nouveau crépi à la tyrolienne, montage de l'ITE (polystyrène), ou application d'une peinture siloxane de finition (couche de présentation). C'est aussi le moment idéal pour vérifier l'état de votre <strong><u><a href="<?php echo BASE_URL; ?>porte-dentree-renovation">porte d'entrée</a></u></strong>, une rénovation de façade est l'opportunité parfaite pour aligner l'aspect de la menuiserie avec le nouveau look de la maison.</li>
                </ol>

                <blockquote class="article-blockquote">
                    <strong>L'Avant/Après et la Plus-Value :</strong> Une façade grisonnante rafraîchie avec un enduit ton "blanc cassé / pierre" accompagné de menuiseries repeintes en gris anthracite (RAL 7016) est la rénovation esthétique la plus rentable sur le marché actuel. Les agents immobiliers estiment qu'une rénovation de façade récente accélère la vente d'une maison de 30% tout en justifiant le haut de la fourchette de prix.
                </blockquote>

                <!-- Section 4 : Prix 2026 -->
                <h2 id="prix">Grille des Prix au m² pour 2026 (Devis Artisans)</h2>
                <p>Face à l'augmentation des matériaux (liants ciments résines de ces 3 dernières années), voici les tarifs constatés par des professionnels RGE en 2026 (les prix s'entendent pose/main d'œuvre et échafaudage inclus) :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Nature des Travaux de Rénovation de Façade</th>
                                <th>Prix moyen 2026 par m² TTC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Nettoyage curatif + Hydrofuge</strong> incolore perlant</td>
                                <td>15 € à 30 €</td>
                            </tr>
                            <tr>
                                <td><strong>Rénovation Peinture (façade saine) :</strong> 1 Primaire + 2 Couches Acrylique ou Siloxane</td>
                                <td>30 € à 60 €</td>
                            </tr>
                            <tr>
                                <td><strong>Rénovation Lourde (Crépi / Enduit) :</strong> Piquage mortier abîmé, trame, enduit projeté monocouche</td>
                                <td>60 € à 110 €</td>
                            </tr>
                            <tr>
                                <td><strong>Rénovation Très Lourde (Ancien) :</strong> Rejointoiement brique ou Enduit de Chaux sur mur pisé (Respirant)</td>
                                <td>90 € à 160 €</td>
                            </tr>
                            <tr>
                                <td><strong>Rénovation + Isolation (ITE) :</strong> 15 cm Polystyrène EPS + Sous-enduit armé + Finition grattée</td>
                                <td>150 € à 240 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section 5 : FAQ -->
                <h2 id="faq">Foire Aux Questions (FAQ)</h2>

                <h3>Peut-on carreler ou poser un bardage sur un vieil enduit ?</h3>
                <p>Oui, le <a href="<?php echo BASE_URL; ?>bardage-decoratif" style="text-decoration: underline;">bardage</a> (souvent en bois, fibrociment ou composite) permet de créer une façade ventilée ultramoderne et cache parfaitement un mur perclus de fissures ou esthétiquement irrécupérable. S'il est posé sur une ossature bois (liteaux chevillés dans le mur), on en profite de facto à 100% pour glisser un <a href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite" style="text-decoration: underline;">isolant thermique</a> entre le mur et le bardage !</p>

                <h3>Est-il possible de repeindre sur un enduit "gratté" sans le perdre ?</h3>
                <p>Absolument. Si votre crépi d'il y a 20 ans a un bel aspect "gratté" plein de reliefs mais qu'il est passé (terni par les UV), l'application d'une peinture Siloxane liquide au rouleau (ou idéalement au pistolet Airless pour gagner les moindres trous) modifiera sa couleur tout en conservant 100% de sa texture originelle.</p>

                <h3>Une rénovation pour fissures est-elle garantie ?</h3>
                <p>Si vous passez par un façadier professionnel dûment déclaré, les travaux de façade touchant à l'étanchéité de la maison (peintures D3/I1, ITE ou enduits lourds) sont couverts par l'assurance <strong>Garantie Décennale (10 ans)</strong> de l'artisan ! Exigez son attestation d'assurance l'année de signature de votre devis.</p>

                <h3>Comment organiser le planning d'une rénovation de façade ?</h3>
                <p>Une rénovation de façade s'étale sur plusieurs semaines et implique plusieurs corps de métier (couvreur pour les débords, maçon pour les fissures, façadier pour l'enduit). L'outil <a href="https://www.cemarenov.fr/travaux-planning-ma-gestion-renovation-fr">planning de gestion de rénovation</a> permet de séquencer les interventions et d'éviter les retards en cascade entre artisans.</p>

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
                    La rénovation de façade est la "mise à nu" chirurgicale de votre bâti. Ne vous limitez jamais au critère de "la plus jolie couleur". Insistez auprès de l'artisan pour qu'il consacre le budget nécessaire à la préparation : ouverture des fissures en V, masticage polyuréthane, et <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade" style="text-decoration: underline;">traitement anti-mousse</a> en profondeur. Si le liant n'accroche pas le mur "malade", aucun <a href="<?php echo BASE_URL; ?>crepi-facade" style="text-decoration: underline;">crépi premium</a> à 90€/m² n'y survivra au-delà de deux saisons de pluie. Enfin, avec l'obligation de DPE en 2026, si votre revêtement est à piquer, couplez cette rénovation avec la pose d'une <a href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite" style="text-decoration: underline;">Isolation (ITE)</a> pour amortir l'échafaudage : votre maison bondira sur les classements immobiliers !
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Comparer : Prix Rénovation Classique vs Prix ITE (Déduction Aides)</a>
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
