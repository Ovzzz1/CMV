<?php
/**
 * reprise-fondation-sous-oeuvre.php
 * Article : Reprise fondation sous oeuvre : quand et comment consolider vos fondations (2026)
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-03-21
 */

$article_meta = [
    'title' => 'Reprise fondation sous oeuvre : quand et comment consolider vos fondations (2026)',
    'category' => 'renovation',
    'slug' => 'reprise-fondation-sous-oeuvre',
    'image' => 'https://www.cemarenov.fr/image/reprise-fondation-sous-oeuvre-1.webp',
    'excerpt' => 'Vos murs bougent et vos portes ne ferment plus ? Découvrez les signes d\'alerte, les techniques de consolidation (micropieux, puits alternés, jet grouting) et les prix d\'une reprise en sous-œuvre en 2026.',
    'date' => '2026-03-21',
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
    if (!isset($art['title'])) continue;
    $title_words = array_map('mb_strtolower', explode(' ', $art['title']));
    $common = count(array_intersect($current_title_words, $title_words));
    $similar_articles[] = array_merge($art, ['score' => $common]);
}
usort($similar_articles, function ($a, $b) { return $b['score'] - $a['score']; });
$similar_articles = array_slice($similar_articles, 0, 3);

include dirname(__DIR__) . '/header.php';
?>

<article>
    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">
            <!-- FIX 1 : séparateurs breadcrumb remplacés par les SVG chevrons du template -->
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Reprise fondation sous oeuvre</span>
            </nav>

            <!-- FIX 2 : class="tag" → class="article-tag" -->
            <div class="article-tags">
                <span class="article-tag">Fondations</span>
                <span class="article-tag">Structure</span>
                <span class="article-tag">Gros œuvre</span>
            </div>

            <h1>Reprise fondation sous oeuvre :<br>
                <span class="h1-accent">quand et comment consolider vos fondations (2026)</span>
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

        <!-- FIX 3 : sidebar-left reconstruite avec sidebar-sticky + sidebar-cat-card + images (template de référence) -->
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

            <p class="article-intro">Vous avez remarqué des fissures qui s'agrandissent sur vos murs ? Des portes qui commencent à frotter alors qu'elles fonctionnaient parfaitement avant ? Ces signes ne trompent pas : vos <strong>fondations existantes</strong> sont probablement en train de céder. La <strong>reprise sous œuvre</strong> est souvent la seule solution durable pour sauver votre maison. Mais attention, ce n'est pas un chantier comme les autres. Je vous explique tout ce qu'il faut savoir pour ne pas vous faire avoir.</p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Coût moyen :</strong> Entre 800 € et 2 500 € par mètre linéaire de mur selon la technique choisie.</li>
                        <li><strong>Durée des travaux :</strong> De 3 jours pour une <strong>consolidation fondations</strong> simple à 4-6 semaines pour une reprise complète.</li>
                        <li><strong>Techniques principales :</strong> Micropieux (le plus courant), puits alternés, jet grouting, parois moulées, injection résine.</li>
                        <li><strong>Signes d'alerte :</strong> Fissures en escalier, portes qui coincent, sol qui s'incline — ne pas attendre que ça empire.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#definition">Qu'est-ce qu'une reprise en sous-œuvre ?</a></li>
                        <li><a href="#signes">Quand faut-il prévoir une reprise en sous-œuvre ?</a></li>
                        <li><a href="#techniques">Les techniques de reprise en sous-œuvre</a></li>
                        <li><a href="#prix">Prix d'une reprise en sous-œuvre</a></li>
                        <li><a href="#faq">FAQ — Questions fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="definition">Qu'est-ce qu'une reprise en sous-œuvre ?</h2>

                <p>Une <strong>reprise sous œuvre</strong>, c'est tout simplement le fait de réparer ou renforcer les fondations d'une maison ou d'un bâtiment existant, sans démolir la structure au-dessus. On intervient littéralement "sous l'œuvre", c'est-à-dire sous les murs porteurs et les planchers.</p>

                <p>Concrètement, imaginez votre maison comme une table. Si les pieds de la table s'enfoncent dans le sol ou pourrissent, la table bascule. La reprise en sous-œuvre, c'est aller réparer ces pieds sans démonter le plateau. On crée de nouveaux appuis solides sous vos <strong>fondations existantes</strong> pour qu'elles reprennent leur rôle de support.</p>

                <h3>Pourquoi les fondations lâchent-elles ?</h3>

                <p>Plusieurs facteurs peuvent fragiliser vos fondations :</p>

                <ul class="custom-list">
                    <li><strong>Sol argileux gonflant :</strong> L'argile se dilate quand elle est humide et rétrécit quand elle sèche. Ce mouvement répété finit par désolidariser les fondations du sol.</li>
                    <li><strong>Fuites d'eau :</strong> Une canalisation enterrée qui fuit peut lessiver le sol sous vos fondations. On appelle ça une "érosion interne", et c'est un vrai fléau. Un <a href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;"><strong>diagnostic humidité professionnel</strong></a> permettra de détecter ces problèmes avant qu'ils n'affectent la structure.</li>
                    <li><strong>Construction sur remblai :</strong> Si votre maison repose sur du remblai non compacté, le sol finit par tasser avec le temps. Vos fondations s'enfoncent progressivement.</li>
                    <li><strong>Végétation agressive :</strong> Certains arbres, comme les peupliers ou les saules, puisent énormément d'eau dans le sol. Leur système racinaire peut aussi soulever ou désolidariser les fondations. Pour les vieilles bâtisses avec humidité chronique, l'<a href="<?php echo BASE_URL; ?>inverseur-polarite-electromagnetique" style="text-decoration: underline;"><strong>inverseur de polarité électromagnétique</strong></a> peut constituer une alternative non destructive aux travaux lourds de sous-œuvre.</li>
                    <li><strong>Séisme ou affaissement minier :</strong> Dans certaines régions, le sol peut bouger brutalement et fissurer les fondations.</li>
                </ul>

                <h3>Les cas d'usage courants</h3>

                <p>La <strong>consolidation fondations</strong> intervient dans plusieurs situations :</p>

                <ul class="custom-list">
                    <li><strong>Agrandissement en hauteur :</strong> Vous voulez ajouter un étage ? Vos fondations actuelles ne sont peut-être pas dimensionnées pour supporter le poids supplémentaire.</li>
                    <li><strong>Modification de la structure :</strong> Vous ouvrez un mur porteur pour créer une baie vitrée ? Il faut souvent renforcer les fondations sous ce mur pour compenser la nouvelle répartition des charges.</li>
                    <li><strong>Rénovation de vieilles bâtisses :</strong> Les maisons anciennes (avant 1950) reposent souvent sur des fondations superficielles ou en pierres sèches. Elles ne répondent plus aux normes actuelles.</li>
                    <li><strong>Construction en sous-sol :</strong> Vous creusez un sous-sol sous une maison existante ? Il faut impérativement reprise en sous-œuvre pour maintenir la stabilité pendant les travaux.</li>
                </ul>

                <blockquote class="article-blockquote">
                    <p>"Je me souviens d'une maison des années 30 à Nantes. Le propriétaire avait ouvert un grand baie dans le mur de façade sans rien renforcer. Six mois plus tard, la façade avait bougé de 3 centimètres. On a dû installer des micropieux d'urgence sous un mur qui menaçait de s'effondrer. Le coût aurait été divisé par trois si on avait fait les choses dans l'ordre. Quand vos fondations parlent, il faut écouter tout de suite."</p>
                </blockquote>

                <h2 id="signes">Quand faut-il prévoir une reprise en sous-œuvre ?</h2>

                <p>Le problème avec les fondations, c'est qu'elles sont invisibles. Vous ne voyez pas le désastre venir jusqu'à ce que les signes apparaissent à l'étage. Voici les alertes à surveiller chez vous.</p>

                <h3>Les fissures qui ne trompent pas</h3>

                <p>Toutes les fissures ne se valent pas. Certaines sont bénignes (retrait du béton, mouvements saisonniers), d'autres révèlent un vrai problème de <strong>fondations existantes</strong>.</p>

                <p><strong>Fissures en escalier sur les murs en briques :</strong> C'est le signe classique d'un tassement différentiel. Une partie de la maison s'enfonce plus vite que l'autre. La fissure suit les joints de mortier en formant des marches d'escalier. Si cette fissure dépasse 2 millimètres d'ouverture, c'est l'alerte rouge.</p>

                <p><strong>Fissures verticales aux angles des baies :</strong> Les ouvertures (portes, fenêtres) sont les points faibles d'un mur. Si les fondations bougent, les fissures apparaissent d'abord aux angles de ces baies. Ces <a href="<?php echo BASE_URL; ?>renovation-de-facade" style="text-decoration: underline;"><strong>signes de dégradation nécessitent souvent une rénovation de façade</strong></a> complète après consolidation des fondations.</p>

                <p><strong>Fissures qui traversent les deux épaisseurs du mur :</strong> Une fissure visible de l'intérieur ET de l'extérieur indique un mouvement structurel important. Ne l'ignorez pas.</p>

                <h3>Les dysfonctionnements mécaniques</h3>

                <p>Vos portes et fenêtres sont de véritables indicateurs :</p>

                <ul class="custom-list">
                    <li><strong>Portes qui frottent ou ne ferment plus :</strong> Le chambranle s'est déformé parce que le mur a bougé. Si plusieurs portes posent problème en même temps, ce n'est pas une coïncidence.</li>
                    <li><strong>Fenêtres qui coincent :</strong> Même phénomène. Le cadre de la fenêtre n'est plus d'équerre.</li>
                    <li><strong>Plancher qui flambe :</strong> Vous sentez le sol s'incliner quand vous marchez ? Les poutres reposent sur des murs qui ne sont plus de niveau.</li>
                    <li><strong>Escaliers qui grincent ou se désolidarisent :</strong> La cage d'escalier est souvent le point le plus rigide de la maison. Si elle bouge, tout bouge.</li>
                </ul>

                <h3>Les signes extérieurs</h3>

                <p>Jetez un œil à l'extérieur de votre maison :</p>

                <ul class="custom-list">
                    <li><strong>Façade qui s'écarte du reste de la maison :</strong> Regardez les joints de dilatation ou les angles. Un écart de quelques millimètres est déjà significatif.</li>
                    <li><strong>Gouttières ou chéneaux qui ne sont plus de niveau :</strong> L'eau ne s'écoule plus correctement ? Le mur porteur sous la gouttière a peut-être bougé.</li>
                    <li><strong>Apparition de vides sous les soubassements :</strong> Un espace entre le sol et votre maison indique un enfoncement des fondations.</li>
                </ul>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>Attention :</strong> Si vous constatez plusieurs de ces signes simultanément, faites appel à un professionnel sans attendre. Un diagnostic structurel coûte entre 800 € et 1 500 €, mais il peut vous éviter des travaux de <strong>reprise sous œuvre</strong> bien plus coûteux si vous agissez tôt.
                </div>

                <h2 id="techniques">Les techniques de reprise en sous-œuvre</h2>

                <p>Il existe plusieurs méthodes pour consolider des fondations. Le choix dépend de la nature du sol, de l'importance du tassement, et de l'accessibilité du chantier. Voici les cinq techniques principales.</p>

                <h3>Les micropieux — La solution la plus courante</h3>

                <p>Les <strong>micropieux</strong> sont des pieux de faible diamètre (généralement entre 100 et 300 millimètres) qui sont forés sous les fondations existantes. On les enfonce dans le sol jusqu'à atteindre une couche portante stable, souvent à plusieurs mètres de profondeur.</p>

                <p><strong>Comment ça marche concrètement ?</strong> On fore un trou à travers les fondations existantes ou juste à côté. On y descend une armature métallique (le fût du pieu) et on injecte du béton ou du coulis de ciment sous pression. Ce coulis remplit le trou et s'étale dans le sol environnant, créant une sorte de "bulbe" de béton qui bloque le pieu en place.</p>

                <p>Les micropieux transmettent ensuite le poids de la maison de vos <strong>fondations existantes</strong> vers la couche portante profonde. C'est comme ajouter des étais invisibles sous votre maison.</p>

                <p><strong>Avantages :</strong> Peu encombrant, adaptable à des espaces restreints, exécution rapide (quelques jours), peu de vibrations (idéal en zone urbaine).</p>

                <p><strong>Inconvénients :</strong> Nécessite un sol étudié pour trouver la couche portante, coût élevé si la profondeur à atteindre est importante.</p>

                <h3>Les puits alternés — Pour les fondations superficielles</h3>

                <p>Cette technique consiste à créer de nouvelles fondations parallèles aux existantes, en alternance. On creuse des tranchées (les "puits") sous une partie des fondations, on coule du béton armé, puis on passe à la section suivante une fois le béton durci.</p>

                <p><strong>En clair :</strong> Au lieu de remplacer toutes les fondations d'un coup (ce qui ferait s'effondrer la maison), on travaille par petits bouts. On renforce une section sur deux, puis on revient sur les sections intermédiaires. La maison repose toujours sur quelque chose pendant les travaux.</p>

                <p><strong>Quand l'utiliser ?</strong> Principalement pour les vieilles maisons avec des fondations en pierres sèches ou peu profondes. C'est la méthode historique, encore très utilisée pour les bâtiments anciens.</p>

                <p><strong>Avantages :</strong> Technique éprouvée depuis des siècles, matériaux simples (béton, acier), contrôle total de la qualité.</p>

                <p><strong>Inconvénients :</strong> Travaux longs (plusieurs semaines), nécessite d'accéder sous les fondations (souvent excavation complète), risque de tassement pendant l'intervention.</p>

                <h3>Le jet grouting — L'injection haute pression</h3>

                <p>Le jet grouting est une technique d'injection sous haute pression. On fore un trou dans le sol et on y injecte un coulis de ciment à très haute pression (jusqu'à 400 bars). Ce jet de ciment découpe le sol sur place et se mélange avec la terre pour créer une colonne de sol-ciment solide.</p>

                <p><strong>En clair :</strong> Au lieu d'enlever la terre pour mettre du béton, on transforme la terre en béton sur place. Le jet de ciment "pulvérise" le sol et le ciment prend le relais.</p>

                <p><strong>Quand l'utiliser ?</strong> Dans les sols meubles (sable, limon) où il est difficile de forer proprement. Idéal aussi sous des fondations existantes sans décaissement, car on peut injecter horizontalement.</p>

                <p><strong>Avantages :</strong> Pas d'excavation, travail dans des espaces très restreints, création de colonnes de diamètre variable (60 cm à 3 mètres selon la pression).</p>

                <p><strong>Inconvénients :</strong> Coût élevé, nécessite un matériel spécialisé, risque de soulever temporairement les fondations si mal dosé.</p>

                <h3>Les parois moulées — Pour les grands chantiers</h3>

                <p>Les parois moulées sont des murs de béton coulés directement dans le sol. On creuse une tranchée étroite et profonde, on y met un fluide bentonitique (de l'argile en suspension dans l'eau) pour maintenir les parois, puis on coule le béton à la place du fluide.</p>

                <p><strong>En clair :</strong> On crée des murs de soutènement verticaux sous terre. Ces murs peuvent servir de nouvelles fondations ou de rideau de confinement pour permettre d'autres travaux.</p>

                <p><strong>Quand l'utiliser ?</strong> Pour les <strong>consolidation fondations</strong> de grande envergure, les sous-sols commerciaux, ou quand on doit creuser à côté d'une fondation fragile sans qu'elle s'effondre.</p>

                <p><strong>Avantages :</strong> Structure très rigide, profondeur importante possible (jusqu'à 50 mètres), pas de vibrations.</p>

                <p><strong>Inconvénients :</strong> Matériel lourd et coûteux, nécessite une surface de chantier importante, réservé aux gros projets.</p>

                <h3>L'injection de résine expansive — La solution rapide</h3>

                <p>Cette technique récente utilise des résines polyuréthanes qui gonflent au contact de l'eau ou d'un catalyseur. On injecte la résine dans le sol sous les fondations, elle se dilate et compacte la terre tout en soulevant légèrement la structure. Cette méthode d'<a href="<?php echo BASE_URL; ?>assechement-murs-injections" style="text-decoration: underline;"><strong>injection de résine pour l'assèchement des murs</strong></a> utilise le même principe d'étanchéité que les traitements contre les remontées capillaires.</p>

                <p><strong>En clair :</strong> C'est comme injecter de la mousse expansive sous votre maison. La résine pousse le sol et remplit les vides, ce qui stabilise les fondations.</p>

                <p><strong>Quand l'utiliser ?</strong> Pour les tassements légers à modérés, quand on veut éviter les travaux lourds. Très efficace pour combler des vides créés par des fuites d'eau ou des érosions.</p>

                <p><strong>Avantages :</strong> Intervention rapide (quelques heures), pas d'excavation, levée immédiate possible, contrôle précis du soulèvement.</p>

                <p><strong>Inconvénients :</strong> Durabilité encore à prouver sur le très long terme (technique récente), coût élevé au litre de résine, réservé aux sols perméables.</p>

                <h2 id="prix">Prix d'une reprise en sous-œuvre</h2>

                <p>Le coût d'une <strong>reprise sous œuvre</strong> varie énormément selon la technique, la profondeur nécessaire, et l'accessibilité du chantier. Voici les fourchettes réalistes en 2026.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Technique</th>
                                <th>Prix au mètre linéaire</th>
                                <th>Prix au point de reprise</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Micropieux</strong></td>
                                <td>800 € – 1 500 €</td>
                                <td>400 € – 800 € par pieu</td>
                            </tr>
                            <tr>
                                <td><strong>Puits alternés</strong></td>
                                <td>600 € – 1 200 €</td>
                                <td>Sur devis selon profondeur</td>
                            </tr>
                            <tr>
                                <td><strong>Jet grouting</strong></td>
                                <td>1 200 € – 2 500 €</td>
                                <td>300 € – 600 € par colonne</td>
                            </tr>
                            <tr>
                                <td><strong>Parois moulées</strong></td>
                                <td>2 000 € – 4 000 €</td>
                                <td>Sur devis (gros œuvre)</td>
                            </tr>
                            <tr>
                                <td><strong>Injection résine</strong></td>
                                <td>500 € – 1 000 €</td>
                                <td>150 € – 300 € par point d'injection</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>Ce qui fait varier le prix</h3>

                <ul class="custom-list">
                    <li><strong>Profondeur de la couche portante :</strong> Plus il faut descendre loin, plus le prix augmente. Un micropieu de 5 mètres coûte moins cher qu'un micropieu de 12 mètres.</li>
                    <li><strong>Accessibilité du chantier :</strong> Impossible de passer une foreuse dans votre jardin ? Il faudra peut-être démonter un mur de clôture ou utiliser un matériel plus petit (et plus cher à l'heure).</li>
                    <li><strong>Type de sol :</strong> Un sol rocheux nécessite un forage plus lent et coûteux qu'un sol meuble. Un sol instable peut exiger des précautions supplémentaires.</li>
                    <li><strong>Urgence :</strong> Si le mur menace de s'effondrer, il faudra peut-être installer des étaiements provisoires. Cela ajoute 20 à 40 % au coût total.</li>
                    <li><strong>Études préalables :</strong> Un rapport de sol (G1/G2 selon la norme NF P 94-500) coûte entre 1 500 € et 3 000 €. C'est souvent obligatoire pour les assurances.</li>
                </ul>

                <h3>Les aides financières possibles</h3>

                <ul class="custom-list">
                    <li><strong>Prime Rénov' :</strong> Si la <strong>consolidation fondations</strong> s'inscrit dans une rénovation globale énergétique (isolation, changement de chauffage), vous pouvez cumuler les primes.</li>
                    <li><strong>Éco-prêt à taux zéro (Éco-PTZ) :</strong> Prêt sans intérêt jusqu'à 50 000 € pour les travaux de rénovation énergétique, sous conditions de ressources.</li>
                    <li><strong>Assurance dommages-ouvrage :</strong> Si vous avez souscrit cette assurance lors de la construction ou d'une rénovation majeure, elle peut couvrir les défauts de fondations.</li>
                    <li><strong>Assurance habitation :</strong> En cas de sinistre (inondation, séisme), votre assurance peut prendre en charge tout ou partie des travaux.</li>
                </ul>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>En clair :</strong> Pour une maison moyenne (périmètre de fondations de 40 mètres), comptez entre 15 000 € et 40 000 € pour une reprise complète en micropieux. C'est un investissement conséquent, mais c'est le prix pour sauver votre patrimoine. Une maison sur fondations instables perd 30 à 50 % de sa valeur.
                </div>

                <h2 id="faq">FAQ — Questions fréquentes</h2>

                <h3>Peut-on habiter dans la maison pendant une reprise en sous-œuvre ?</h3>
                <p>Cela dépend de la technique et de l'ampleur des travaux. Pour une injection de résine ou quelques micropieux, vous pouvez généralement rester. Pour des puits alternés ou une reprise complète, il est souvent préférable de déménager temporairement. Le bruit, les vibrations et les coupures d'eau/électricité rendent le quotidien difficile. Demandez à votre entrepreneur une estimation de la gêne avant de signer.</p>

                <h3>Combien de temps durent les travaux de consolidation ?</h3>
                <p>De quelques jours à plusieurs semaines. Une injection de résine prend 1 à 2 jours. Une consolidation par micropieux sur une maison moyenne prend 1 à 2 semaines. Des puits alternés peuvent s'étaler sur 4 à 6 semaines. Pour optimiser votre <a href="<?php echo BASE_URL; ?>travaux-planning-ma-gestion-renovation-fr" style="text-decoration: underline;"><strong>planning de rénovation et la gestion des travaux</strong></a>, anticipez ces délais et la séquence logique des interventions.</p>

                <h3>La reprise en sous-œuvre nécessite-t-elle un permis de construire ?</h3>
                <p>Non, pas directement. Mais si vous faites une reprise en sous-œuvre dans le cadre d'une extension ou d'une modification de structure importante, vous devrez peut-être déposer une déclaration préalable ou un permis de construire pour l'ensemble du projet. Renseignez-vous auprès de votre mairie. Un bureau d'études structures peut vous accompagner dans les démarches administratives.</p>

                <h3>Comment choisir entre micropieux et injection de résine ?</h3>
                <p>Le choix dépend du diagnostic structurel. Les <strong>micropieux</strong> sont préférables quand on a besoin d'atteindre une couche portante profonde ou quand les charges sont importantes (maison à étages, extension). L'injection de résine convient mieux pour combler des vides localisés ou stabiliser un sol meuble sur faible épaisseur. Un ingénieur structure vous dira quelle technique est adaptée à votre cas. Ne vous lancez pas sans étude préalable.</p>

                <h3>Les travaux de reprise sous œuvre sont-ils garantis ?</h3>
                <p>Oui, par la garantie décennale obligatoire pour tout travail de gros œuvre. Cette garantie couvre les désordres qui compromettent la solidité de l'ouvrage pendant 10 ans. Vérifiez que votre entrepreneur a bien une assurance décennale en cours. Demandez un certificat d'assurance avant de signer le devis. La garantie de parfait achèvement (1 an) couvre les défauts de conformité apparents.</p>

                <h3>Est-ce que la reprise en sous-œuvre augmente la valeur de ma maison ?</h3>
                <p>Absolument. Une maison avec des fondations refaites est plus vendable qu'une maison avec des fissures. Les futurs acheteurs et les banques apprécient les diagnostics structurels récents. Vous récupérez une grande partie de l'investissement lors de la revente, surtout si vous faites les travaux avant que la situation ne se dégrade trop. Une maison stable se vend 10 à 20 % plus cher qu'une maison "avec travaux".</p>

            </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience dans le bâtiment, j'accompagne les particuliers dans leurs projets de rénovation et de consolidation structurelle. De la réparation de fondations à la réhabilitation complète, je mets mon expertise au service de la solidité de votre patrimoine.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>Besoin d'un diagnostic pour vos fondations ?</h3>
                <p>Chez Expert Renov', nous réalisons des études structurelles complètes et des reprises en sous-œuvre depuis plus de 15 ans. Nos équipes interviennent sur tout le territoire pour évaluer l'état de vos fondations et vous proposer la solution la plus adaptée. Demandez un devis gratuit et sans engagement.</p>
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

        <!-- FIX 4 : sidebar-right reconstruite avec sidebar-sticky + sidebar-block + sidebar-article-card (template de référence) -->
        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name'] ?? 'Maison / Rénovation'); ?></h3>
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
// --- Schema.org Structured Data ---
require_once dirname(__DIR__) . '/schema-data.php';

// FIX 5 : $faq_schema défini en dur comme dans le template de référence,
// puis mergé dans $_schema avant generate_article_schema()
$faq_schema = [
    [
        'question' => "Peut-on habiter dans la maison pendant une reprise en sous-œuvre ?",
        'answer' => "Cela dépend de la technique et de l'ampleur des travaux. Pour une injection de résine ou quelques micropieux, vous pouvez généralement rester. Pour des puits alternés ou une reprise complète, il est souvent préférable de déménager temporairement."
    ],
    [
        'question' => "Combien de temps durent les travaux de consolidation ?",
        'answer' => "De quelques jours à plusieurs semaines. Une injection de résine prend 1 à 2 jours. Une consolidation par micropieux sur une maison moyenne prend 1 à 2 semaines. Des puits alternés peuvent s'étaler sur 4 à 6 semaines."
    ],
    [
        'question' => "La reprise en sous-œuvre nécessite-t-elle un permis de construire ?",
        'answer' => "Non, pas directement. Mais si elle s'inscrit dans une extension ou une modification de structure importante, une déclaration préalable ou un permis de construire peut être nécessaire pour l'ensemble du projet."
    ],
    [
        'question' => "Comment choisir entre micropieux et injection de résine ?",
        'answer' => "Les micropieux sont préférables pour atteindre une couche portante profonde ou pour des charges importantes. L'injection de résine convient mieux pour combler des vides localisés ou stabiliser un sol meuble sur faible épaisseur."
    ],
    [
        'question' => "Les travaux de reprise sous œuvre sont-ils garantis ?",
        'answer' => "Oui, par la garantie décennale obligatoire pour tout travail de gros œuvre. Cette garantie couvre les désordres compromettant la solidité de l'ouvrage pendant 10 ans."
    ],
    [
        'question' => "Est-ce que la reprise en sous-œuvre augmente la valeur de ma maison ?",
        'answer' => "Absolument. Une maison avec des fondations refaites est plus vendable. Une maison stable se vend 10 à 20 % plus cher qu'une maison avec des travaux à prévoir."
    ],
];

$_schema = get_schema_data(basename(__FILE__, '.php'));
if (!isset($_schema['faq']) || empty($_schema['faq'])) {
    $_schema['faq'] = $faq_schema;
}

echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>
