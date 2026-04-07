<?php
// published: 2026-04-07 08:00
/**
 * fondation-garage-20m2.php
 * Article : Fondation pour un garage de 20m2 : Prix, dimensions et réglementation
 * Site : cemarenov.fr
 * Date : 2026-04-01
 */


$article_meta = [
    'title'        => 'Fondation pour un garage de 20m2 : Prix, dimensions et réglementation',
    'category'     => 'travaux',
    'slug'         => 'fondation-garage-20m2',
    'image'        => 'https://www.cemarenov.fr/image/fondation-garage-20m2.webp',
    'excerpt'      => 'Découvrez les règles d\'urbanisme, les dimensions de tranchées, le calcul du volume de béton et le budget pour couler les fondations d\'un garage de 20m2.',
    'date'         => '2026-04-07',
    'reading_time' => 6,
];


// Bloc logique CMS, NE JAMAIS MODIFIER
require_once dirname(__DIR__) . '/functions.php';


$page_title       = $article_meta['title'];
$page_description = $article_meta['excerpt'];


// Current article category + self-exclusion filter
$current_cat = $article_meta['category'];
$current_url = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category    = get_category($current_cat);
$other_cats  = get_other_categories($current_cat);
$cat_articles = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles = array_slice($cat_articles, 0, 10);
$latest_articles = array_values(array_filter(get_latest_articles(11), fn($a) => ($a['url'] ?? '') !== $current_url));
$latest_articles = array_slice($latest_articles, 0, 10);


// Similar articles: pick 3 from category (excluding self)
$current_title_words = array_map('mb_strtolower', explode(' ', $article_meta['title']));
$similar_articles    = [];
foreach ($cat_articles as $art) {
    if (!isset($art['title'])) continue;
    $title_words = array_map('mb_strtolower', explode(' ', $art['title']));
    $common      = count(array_intersect($current_title_words, $title_words));
    $similar_articles[] = array_merge($art, ['score' => $common]);
}
usort($similar_articles, function ($a, $b) { return $b['score'] - $a['score']; });
$similar_articles = array_slice($similar_articles, 0, 3);


// INCLUDE HEADER
include dirname(__DIR__) . '/header.php';
?>


<article>
    <section class="article-hero" style="background-image: url('<?php echo BASE_URL; ?>image/fondation-garage-20m2.webp');">
        <div class="article-hero-content">
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Fondation garage 20m2</span>
            </nav>


            <div class="article-tags">
                <span class="article-tag">Gros Œuvre</span>
                <span class="article-tag">Maçonnerie</span>
            </div>


            <h1>Fondation pour un garage de 20m2 :<br>
                <span class="h1-accent">Prix, dimensions et réglementation</span>
            </h1>


            <div class="article-meta-header" style="flex-wrap: wrap; gap: 15px;">
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
                <?php endforeach; ?>
            </div>
        </aside>


        <div class="article-container">
            <p class="article-intro">
                Construire un garage de 20m2 correspond au standard classique pour abriter un seul véhicule tout en conservant un petit espace de rangement ou un établi. Bien que cette surface puisse paraître modeste, elle nécessite de créer une assise parfaitement stable. En effet, je vous rappelle que la construction d'une <a href="https://www.cemarenov.fr/fondation-garage">fondation de garage</a> obéit exactement aux mêmes règles de maçonnerie qu'une maison d'habitation. Dans ce dossier, nous allons détailler les spécificités liées à cette surface précise : les démarches administratives incontournables, le calcul du volume de béton, les dimensions des tranchées à respecter ainsi que le budget à prévoir.
            </p>


            <div class="article-content">
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                        </svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Démarche :</strong> Jusqu'à 20m2 d'emprise au sol, une Déclaration Préalable (DP) en mairie suffit généralement.</li>
                        <li><strong>Dimensions :</strong> Pour un garage maçonné, prévoyez des tranchées de 40 à 50 cm de large, creusées jusqu'à la zone hors gel.</li>
                        <li><strong>Volume béton :</strong> Pour un périmètre standard de 4x5m (18 ml), comptez environ 2,7 m³ de béton pour vos semelles.</li>
                        <li><strong>Alternative bois :</strong> Si votre structure est légère (ossature bois), une dalle monolithique (radier) peut remplacer les semelles filantes.</li>
                    </ul>
                </div>


                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#obligation">Est-il obligatoire de construire des fondations pour un garage ?</a></li>
                        <li><a href="#reglementation">Garage de 20m2 : Permis de construire ou déclaration préalable ?</a></li>
                        <li><a href="#dimensions">Quelle dimension de fondation pour un garage de 20m2 (4x5m) ?</a></li>
                        <li><a href="#epaisseur">Quelle doit être l'épaisseur des fondations d'un garage ?</a></li>
                        <li><a href="#calcul-beton">Calcul du volume de béton : combien de toupies commander ?</a></li>
                        <li><a href="#prix">Quel est le prix de la fondation d'un garage de 20m2 ?</a></li>
                        <li><a href="#type-fondation">Quel type de fondation est le mieux adapté à un garage ?</a></li>
                        <li><a href="#faq">FAQ : Cas particuliers</a></li>
                    </ul>
                </div>


                <h2 id="obligation">Est-il obligatoire de construire des fondations pour un garage ?</h2>
                <p>Avant d'aller plus loin, répondons à une question fondamentale : oui, la création de fondations est une étape absolument obligatoire. Même pour une structure légère de 20m2 en ossature bois, poser les murs à même la terre végétale entraînerait rapidement un affaissement de la construction, des fissures structurelles et d'inévitables remontées d'humidité par capillarité. Un ancrage au sol est donc strictement nécessaire pour garantir la pérennité du bâtiment dans le temps.</p>


                <h2 id="reglementation">Garage de 20m2 : Permis de construire ou déclaration préalable ?</h2>
                <p>La surface de 20m2 n'est pas un chiffre anodin en urbanisme, car elle représente un seuil légal critique. Avant même de donner le premier coup de pelle pour le terrassement, vous devez valider l'aspect administratif de votre projet.</p>
                <p>Dans la majorité des cas, la construction d'un garage dont l'emprise au sol est inférieure ou égale à 20m2 ne nécessite qu'une simple déclaration préalable (DP) de travaux en mairie. Cependant, si votre projet évolue et que vous visez un bâtiment plus vaste, sachez que les règles changent considérablement. Par exemple, si vous envisagez de couler une <a href="https://www.cemarenov.fr/fondation-garage-30m2">fondation pour un garage de 30m2</a> ou de dimensionner une <a href="https://www.cemarenov.fr/fondation-garage-40m2">fondation pour un garage de 40m2</a> afin d'y garer deux véhicules, le permis de construire deviendra la norme. Il n'y a qu'une seule exception à cette règle : si ce grand bâtiment est accolé à votre maison existante dans une zone urbaine régie par un Plan Local d'Urbanisme (PLU), le seuil de dispense de permis est alors repoussé à 40m2.</p>


                <h2 id="dimensions">Quelle dimension de fondation pour un garage de 20m2 (4x5m) ?</h2>
                <p>Un garage de 20m2 prend généralement la forme d'un rectangle de 4 mètres de large par 5 mètres de long. Pour soutenir les futurs murs porteurs, il faut creuser des tranchées périphériques. La dimension de ces fouilles dépend directement du poids total de la structure.</p>
                <p>Pour un ouvrage maçonné classique, je préconise de creuser des tranchées d'une largeur de 40 à 50 cm. Cette largeur est indispensable pour assurer une bonne portance sur le sol et pouvoir y insérer confortablement vos armatures en acier (généralement des semelles filantes de type 15-35).</p>
                <p>Concernant la profondeur, la règle absolue est d'atteindre le sol dur et la zone de "mise hors gel". Selon votre situation géographique et l'altitude, cette excavation se situera entre 50 cm pour les régions tempérées et plus de 80 cm dans les zones montagneuses. Ainsi, la terre située sous le béton ne risquera pas de gonfler sous l'action du gel.</p>


                <h2 id="epaisseur">Quelle doit être l'épaisseur des fondations d'un garage ?</h2>
                <p>L'épaisseur du béton coulé dans la tranchée doit être d'au minimum 30 cm afin d'enrober totalement l'armature en acier (qui mesure souvent 15 cm de hauteur). Lors de la mise en place du ferraillage, il faut impérativement utiliser de petites cales pour laisser au moins 4 à 5 cm de vide sous les aciers. Par conséquent, le béton pourra s'infiltrer par le dessous, évitant ainsi que la ferraille ne rouille au contact direct de la terre.</p>


                <h2 id="calcul-beton">Calcul du volume de béton : combien de toupies commander ?</h2>
                <p>Pour un périmètre de 4x5 mètres, vous avez donc 18 mètres linéaires de tranchées à remplir. C'est ici qu'il faut calculer avec précision votre besoin en béton armé. Si vous avez creusé des tranchées de 50 cm de largeur et que vous prévoyez une épaisseur de béton de 30 cm, le calcul est le suivant : 18 (longueur) x 0,50 (largeur) x 0,30 (épaisseur) = 2,7 m³ de béton.</p>
                <p>Un camion toupie standard transporte entre 4 et 8 m³ de béton frais. Par conséquent, pour les fondations périphériques d'un garage de 20m2, une seule petite toupie sera amplement suffisante pour tout couler en une seule fois. Évidemment, la logistique d'approvisionnement devient un enjeu majeur si vous voyez les choses en grand. À titre de comparaison, la création d'une <a href="https://www.cemarenov.fr/fondation-garage-50m2">fondation de garage de 50m2</a> exigera une coordination beaucoup plus stricte avec la centrale à béton, nécessitant parfois la rotation de plusieurs toupies sur le chantier.</p>


                <h2 id="prix">Quel est le prix de la fondation d'un garage de 20m2 ?</h2>
                <p>Le budget dépendra fortement de votre implication dans les travaux. Si vous réalisez le terrassement et la maçonnerie vous-même (auto-construction), le coût des matériaux seuls (incluant la location d'une mini-pelle, les armatures, le ciment et le sable) se situera aux alentours de 800 à 1 200 €.</p>
                <p>Cependant, si vous confiez cette étape structurelle à un artisan maçon, il faut compter entre 60 € et 100 € le mètre linéaire pour des semelles filantes. Pour nos 18 mètres de périmètre, le prix des fondations seules oscillera donc entre 1 080 € et 1 800 € HT. À cela, il faudra ajouter le prix du dallage, facturé en moyenne entre 65 € et 120 € le m², soit un budget supplémentaire d'environ 1 500 € pour vos 20m2.</p>


                <h2 id="type-fondation">Quel type de fondation est le mieux adapté à un garage ?</h2>
                <p>L'assise doit impérativement s'adapter au matériau de vos murs. S'il s'agit d'un garage en parpaings ou en briques, la semelle filante armée est le type de fondation le mieux adapté, car elle reprend parfaitement les charges lourdes et linéaires de la maçonnerie traditionnelle.</p>
                <p>En revanche, si vous optez pour un garage en ossature bois de 20m2, la structure sera beaucoup plus légère. Dans ce cas de figure, je vous conseille plutôt d'envisager une dalle monolithique (un radier) coulée d'un seul bloc sur un hérisson de graviers compactés. Ce type d'ouvrage fera à la fois office de sol fini et de fondation, simplifiant ainsi le terrassement.</p>


                <h2 id="faq">FAQ : Cas particuliers</h2>
                <h3>Peut-on couler 5 cm de béton sur du béton ?</h3>
                <p>S'il s'agit de ragréer le sol fini de votre garage de 20m2 pour rattraper un niveau, oui, vous pouvez tout à fait couler une chape de 5 cm sur votre dalle existante. Toutefois, il faut appliquer au préalable une résine d'accrochage (un primaire) pour garantir la liaison entre l'ancien et le nouveau support. Je tiens néanmoins à préciser que cette technique ne s'applique en aucun cas aux fondations porteuses, qui doivent toujours être coulées d'un seul bloc massif pour garantir l'intégrité structurelle de l'ouvrage.</p>


            </div><div class="conclusion-box">
                <h3>Le mot de la fin</h3>
                <p>Pour un garage de 20m2, chaque étape compte. Que vous optiez pour des semelles filantes pour soutenir des parpaings ou pour une dalle monolithique destinée à une ossature bois, le respect du dimensionnement et de la mise hors gel reste la clé d'un ouvrage pérenne. N'oubliez pas de bien vérifier la réglementation locale avant d'entamer vos travaux.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis gratuit</a>
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
                    <?php endforeach; ?>
                </div>
            </section>


        </div>


        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles, <?php echo htmlspecialchars($category['name']); ?></h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>


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
// Schema.org, NE JAMAIS MODIFIER
require_once dirname(__DIR__) . '/schema-data.php';
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
include dirname(__DIR__) . '/footer.php';
