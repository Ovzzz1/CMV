<?php
/**
 * nettoyage-demoussage-facade.php
 * Article: nettoyage demoussage facade
 */

$article_meta = [
    'title' => 'Nettoyage et démoussage de façade : Prix, étapes pro et le piège qui détruit votre crépi',
    'category' => 'maison',
    'image' => 'https://www.cemarenov.fr/image/nettoyage demoussage facade.webp',
    'excerpt' => 'Traces rouges ou vertes ? Ne tuez pas votre enduit avec de la Javel ! Découvrez le vrai prix au m² et la méthode d\'un artisan.',
    'date' => '2026-03-12',
    'reading_time' => 7,
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
                <a href="<?php echo BASE_URL . $current_cat; ?>">
                    <?php echo htmlspecialchars($category['name']); ?>
                </a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Démoussage façade</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Façade</span>
                <span class="article-tag">Entretien</span>
            </div>

            <h1>Nettoyage et démoussage de façade :<br>
                <span class="h1-accent">Prix, étapes pro et l'erreur fatale qui détruit votre crépi</span>
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

    <div class="article-layout">

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

        <div class="article-container">

            <p class="article-intro">
                Mousse verte, traînées rouges... votre crépi vieillit mal. Vous pensez peut-être qu'un bon coup de
                nettoyeur haute pression et un bidon d'eau de Javel suffiront à régler le problème ce week-end. Pire
                erreur possible. Un mauvais nettoyage détruit l'imperméabilité d'un enduit en quelques minutes. Sachez
                qu'un nettoyage dans les règles coûte environ <strong>5 à 6 fois moins cher qu'un <a
                        href="<?php echo BASE_URL; ?>ravalement-de-facade"
                        style="text-decoration: underline;">ravalement de façade complet</a>
                </strong>, tout en redonnant une vraie valeur immobilière à votre maison avant une vente.
                Faisons le point sur les vrais tarifs et les méthodes qui respectent vos murs.
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
                        <li><strong>Prix moyen :</strong> 15 à 25 €/m² pour un traitement professionnel (vs 100 €/m²
                            pour un ravalement).</li>
                        <li><strong>Le matériel :</strong> Oubliez la haute pression, privilégiez le pulvérisateur basse
                            pression et le brossage doux.</li>
                        <li><strong>La règle d'or :</strong> L'eau de Javel est strictement interdite sur les façades
                            sous peine de porosité irréversible.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire de ce guide</div>
                    <ul>
                        <li>1. Quel est le prix d'un démoussage de façade au m² ?</li>
                        <li>2. Les 3 vraies causes des traces rouges et vertes</li>
                        <li>3. Comment nettoyer une façade ? Les 4 étapes pro</li>
                        <li>4. L'erreur fatale : l'eau de Javel sur le crépi</li>
                        <li>5. Quel est le meilleur anti-mousse professionnel en 2026 ?
                        </li>
                        <li>6. FAQ : Entretien, saisons et législation</li>
                    </ul>
                </div>

                <h2 id="prix-demoussage">1. Quel est le prix d'un démoussage de façade au m² ?</h2>
                <p>Le devis d'un façadier varie selon le niveau d'encrassement de votre maison et le type de traitement
                    appliqué. Méfiez-vous des devis trop bas (sous les 10 €/m²). Ils cachent souvent un simple lavage
                    agressif sans traitement de fond, ce qui garantit le retour de la mousse l'hiver suivant.</p>

                <div class="table-responsive">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de traitement</th>
                                <th>Prix moyen au m² (Main d'œuvre incluse)</th>
                                <th>Durée d'efficacité estimée</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Brossage simple + Nettoyage</strong></td>
                                <td>10 € à 15 €</td>
                                <td>1 à 2 ans</td>
                            </tr>
                            <tr>
                                <td><strong>Démoussage + Traitement curatif biocide</strong></td>
                                <td>15 € à 20 €</td>
                                <td>3 à 5 ans</td>
                            </tr>
                            <tr>
                                <td><strong>Traitement curatif + Imperméabilisation (Hydrofuge)</strong></td>
                                <td>20 € à 25 €</td>
                                <td>8 à 10 ans</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <blockquote class="article-blockquote">
                    <strong>Note de chantier :</strong> Si votre maison dépasse un étage et nécessite la pose d'un
                    échafaudage tubulaire pour travailler en sécurité, comptez un surcoût d'environ 150 € à 250 € par
                    jour sur le devis global. Malgré cela, l'opération reste ultra-rentable comparée à un ravalement
                    complet qui chiffre vite autour des 100 €/m².
                </blockquote>

                <h2 id="causes-traces">2. Les 3 vraies causes des traces rouges et vertes sur votre crépi</h2>
                <p>La mousse ne pousse pas par hasard. Elle s'installe là où l'eau stagne. Si vous ne réglez pas
                    l'origine de l'humidité, vous passerez votre vie à frotter vos murs.</p>

                <h3>L'algue rouge (Trentepohlia) et les lichens : qui sont-ils ?</h3>
                <p>Ces fameuses traînées rouges vif qui ressemblent à de la rouille ne sont pas de la pollution. C'est
                    une algue microscopique appelée <em>Trentepohlia</em>. Elle prolifère avec l'humidité et le manque
                    d'ensoleillement (typiquement sur les pignons exposés au Nord). Les lichens, eux, sont de petits
                    champignons coriaces qui s'incrustent en profondeur dans les aspérités de l'enduit.</p>

                <h3>La porosité naturelle des enduits vieillissants</h3>
                <p>Un traditionnel <a href="<?php echo BASE_URL; ?>crepi-facade"
                        style="text-decoration: underline;">crépi de façade</a> neuf est parfaitement étanche. Mais avec
                    les années, l'exposition aux UV et les cycles de gel/dégel, il
                    se micro-fissure. L'eau de pluie pénètre la surface au lieu de glisser. Ce support constamment
                    humide devient le terrain de jeu idéal pour les spores végétales.</p>

                <h3>Le défaut de zinguerie et les appuis de fenêtre sans "goutte d'eau"</h3>
                <p>C'est le diagnostic qui ressort huit fois sur dix sur le terrain. Si une trace noire ou verte forme
                    une ligne verticale bien nette sous une fenêtre, le problème vient souvent d'un rebord qui ne
                    dépasse pas assez de la façade (absence de larmier, la fameuse "goutte d'eau"). L'eau sale ruisselle
                    directement sur le mur. Réglez ce problème de maçonnerie avant de traiter.</p>

                <h2 id="etapes-nettoyage">3. Comment nettoyer une façade ? Les 4 étapes professionnelles</h2>
                <p>Traiter un mur extérieur demande de la méthode. L'objectif est double : détruire les racines des
                    végétaux sans abîmer le support.</p>

                <h3>Étape 1 : Brossage manuel ou nébulisation</h3>
                <p>L'erreur classique consiste à coller la buse rotative du nettoyeur haute pression (Kärcher) à 10 cm
                    du mur pour gagner du temps. Sur un enduit monocouche récent, une très basse pression avec un jet
                    plat à 50 cm de distance passe encore. Mais sur un vieux crépi minéral traditionnel, la pression va
                    littéralement pulvériser le revêtement. La méthode la plus sûre reste la brosse à poils durs et la
                    nébulisation (pulvérisation de micro-gouttelettes).</p>

                <h3>Étape 2 : L'application du traitement algicide et fongicide</h3>
                <p>Une fois le gros de la mousse retiré et le mur redevenu sec, on pulvérise un produit biocide
                    professionnel de bas en haut (pour éviter les coulures inégales). Le produit pénètre le crépi et
                    détruit les racines des champignons de l'intérieur. Pensez à bâcher les massifs de fleurs au pied du
                    mur.</p>

                <h3>Étape 3 : Le traitement "sans rinçage" (laisser agir)</h3>
                <p>La majorité des bons produits anti-mousse actuels sont dits "sans rinçage". L'artisan pulvérise la
                    solution et le chantier s'arrête là. Les vents et les pluies des semaines suivantes évacueront
                    naturellement les résidus organiques morts. La façade s'éclaircit progressivement sur un à deux
                    mois.</p>

                <h3>Étape 4 : L'imperméabilisation hydrofuge (et ses limites)</h3>
                <p>C'est l'étape finale qui bloque l'humidité pour la décennie à venir. Mais attention au piège majeur.
                    Un produit hydrofuge n'est pas "filmogène" : il ne rebouche absolument pas les trous. Si votre mur
                    présente des fissures visibles, il faut impérativement les réparer au mastic avant. Appliquer un
                    hydrofuge sur un mur fissuré va enfermer l'eau à l'intérieur, ce qui fera éclater le crépi en
                    plaques au premier gel.</p>

                <blockquote class="article-blockquote" style="border-left-color: #17a2b8;">
                    <strong>Le test terrain de Philippe : Avez-vous besoin d'un hydrofuge ?</strong><br>
                    Jetez l'équivalent d'un verre d'eau sur votre façade par temps sec. Si l'eau perle et glisse vers le
                    sol, votre enduit est encore bon. Si l'eau forme immédiatement une tache sombre et est absorbée par
                    le mur, votre crépi est devenu poreux. Il faut alors traiter le mur avec un puissant <a
                        href="<?php echo BASE_URL; ?>hydrofuge-incolore-facade"
                        style="text-decoration: underline;">hydrofuge incolore de façade</a> de toute urgence.
                </blockquote>

                <h2 id="danger-javel">4. L'erreur fatale : l'eau de Javel sur le crépi</h2>
                <p>Des démarcheurs à domicile proposent parfois des nettoyages express avec un "produit miracle" qui
                    blanchit le mur sous vos yeux. Ne vous y trompez pas : c'est de l'eau de Javel (hypochlorite de
                    sodium) pure ou diluée.</p>

                <p>Ne laissez jamais personne pulvériser ça sur votre maison. La Javel attaque chimiquement les sels
                    minéraux qui composent l'enduit. Le mur devient instantanément poreux. Résultat ? Votre façade sera
                    d'un blanc immaculé pendant trois mois, mais elle reverdira deux fois plus vite l'hiver suivant. À
                    terme, l'enduit s'effritera sous l'action du gel.</p>

                <h2 id="meilleur-produit">5. Quel est le meilleur produit anti-mousse professionnel en 2026 ?</h2>
                <p>Les recettes au vinaigre blanc fonctionnent très bien sur un muret de jardin, mais pas sur le pignon
                    complet d'une maison d'architecte. Les façadiers se tournent vers trois références :</p>

                <ul class="custom-list">
                    <li><strong>Dalep 2100 :</strong> La référence absolue. C'est un produit "2 en 1" concentré : il
                        traite la mousse (curatif) et imperméabilise la surface (hydrofuge) en une seule passe.</li>
                    <li><strong>Sikagard 127 (Sika) :</strong> L'action ultra-rapide. Ce traitement s'attaque
                        agressivement aux traces rouges et noires. Il offre l'avantage d'être biodégradable dans sa
                        composition.</li>
                    <li><strong>Algimouss :</strong> Un classique très respectueux des enduits fragiles. Il agit un peu
                        plus lentement mais garantit de ne jamais modifier la teinte d'origine de votre crépi.</li>
                </ul>

                <h2 id="faq">6. FAQ : Entretien, saisons et législation</h2>

                <h3>Quelle est la meilleure saison pour démousser sa maison ?</h3>
                <p>Privilégiez le printemps (avril à juin) ou le début de l'automne (septembre-octobre). Évitez
                    formellement les jours de gel (le produit gèlerait à l'intérieur du mur) et les canicules (l'eau
                    s'évaporerait avant d'avoir pénétré le crépi).</p>

                <h3>Faut-il déclarer le nettoyage de sa façade en mairie ?</h3>
                <p>Non. Le démoussage est juridiquement considéré comme de l'entretien courant. Aucune Déclaration
                    Préalable n'est nécessaire. La seule exception concerne la pose d'un échafaudage empiétant sur la
                    voie publique (trottoir), qui nécessite une autorisation de voirie.</p>

                <h3>Faut-il démousser avant d'appliquer une peinture de façade ?</h3>
                <p>Oui, c'est impératif. Appliquer une épaisse <a href="<?php echo BASE_URL; ?>peinture-de-facade"
                        style="text-decoration: underline;">peinture de façade</a> acrylique ou siloxane sur un mur
                    recouvert de
                    micro-organismes revient à peindre sur de la poussière. La peinture cloquera en moins d'un an. Le
                    support doit être totalement assaini et sec.</p>

                <h3>Comment traiter une façade très fortement encrassée à la javel ?</h3>
                <p>La javel diluée peut être utilisée en première passe sur les taches noires tenaces, mais elle ne remplace pas un traitement fongicide professionnel sur un crépi. Notre guide <a href="https://www.cemarenov.fr/nettoyage-facade-javel">nettoyage façade à la javel</a> détaille le protocole de dilution, les temps de pose et les surfaces compatibles pour éviter de détériorer l'enduit.</p>

                <h3>Comment éliminer les fientes d'oiseaux sur un crépi ou une pierre ?</h3>
                <p>Les déjections d'oiseaux sont acides et s'incrustent dans les pores du crépi. Elles doivent être traitées rapidement pour éviter la dégradation de l'enduit. Notre guide <a href="https://www.cemarenov.fr/nettoyer-fientes-oiseaux-crepi">nettoyer fientes d'oiseaux sur crépi</a> détaille le protocole de traitement adapté à chaque type de surface.</p>

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
                <h3>Besoin d'un diagnostic pour votre façade ?</h3>
                <p>
                    N'attendez pas que l'humidité traverse vos murs. Un démoussage réalisé dans les règles de l'art
                    prolonge la vie de votre crépi de plus de 10 ans.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis pour ma façade</a>
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
                            <h4>
                                <?php echo htmlspecialchars($art['title']); ?>
                            </h4>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>

        </div>

        <aside class="sidebar-right">
            <div class="sidebar-sticky">
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