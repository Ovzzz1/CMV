<?php
/**
 * assechement-murs-injections.php
 * Article: Assèchement des murs par injection
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Assèchement des murs par injection : prix, produits et pièges à éviter',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/assechement-murs-injections.webp',
    'excerpt' => 'Remontées capillaires, résine d\'injection, prix au mètre linéaire, temps de séchage : ce guide passe en revue tout ce qu\'il faut savoir avant d\'accepter un devis.',
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
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Assèchement des murs par injection</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Rénovation</span>
                <span class="article-tag">Traitement humidité</span>
            </div>

            <h1>Assèchement des murs par injection :<br>
                <span class="h1-accent">Prix, Produits et Pièges à Éviter</span>
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
                Vous avez des taches d'humidité au ras du sol, des plinthes qui pourrissent, des enduits qui cloquent et
                une poudre blanche qui revient sans arrêt ? L'eau remonte depuis les fondations à l'intérieur de la
                maçonnerie. C'est l'humidité ascensionnelle. Pour stopper ce phénomène, l'assèchement des murs par
                injection est la technique la plus répandue. <strong>Mais attention : cette méthode n'est pas une
                    solution miracle universelle.</strong>
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        À retenir en 3 points
                    </div>
                    <ul>
                        <li>L'injection de résine crée une arase étanche pour bloquer les remontées capillaires, mais
                            n'est pas adaptée à tous les types de murs.</li>
                        <li>Un diagnostic sérieux passe par la <strong>bombe à carbure</strong>, pas par un simple
                            testeur à pointes sur le plâtre.</li>
                        <li>Le coût se calcule au mètre linéaire et le séchage complet se compte en mois, voire en année
                            pour les murs épais.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>1. Comprendre le problème avant de sortir la résine</li>
                        <li>2. Diagnostic sérieux : la bombe à carbure</li>
                        <li>3. Sur quels murs l'injection fonctionne vraiment ?</li>
                        <li>4. L'idée de base : créer une arase étanche</li>
                        <li>5. Résine liquide ou crème : ce qui change</li>
                        <li>6. Comment se passe concrètement un chantier</li>
                        <li>7. Ce qu'on oublie souvent : que devient l'eau bloquée ?</li>
                        <li>8. Combien coûte l'assèchement par injection ?</li>
                        <li>9. Temps de séchage : le long tunnel</li>
                        <li>10. Injection : DIY ou professionnel ?</li>
                        <li>11. Les alternatives à l'injection</li>
                        <li>12. FAQ – Questions fréquentes</li>
                    </ul>
                </div>

                <!-- Section 1 -->
                <h2 id="comprendre-probleme">Comprendre le problème avant de sortir la résine</h2>
                <p>Dans le grand domaine du <a href="<?php echo BASE_URL; ?>traitement-humidite"
                        style="text-decoration: underline;">traitement de l'humidité</a>, l'assèchement des murs par
                    injection est la solution qu'on vous propose quasi systématiquement face à des remontées
                    capillaires. Vous avez des taches d'humidité au ras du sol, des plinthes qui pourrissent, des
                    enduits qui cloquent et une poudre blanche qui revient sans arrêt ? L'eau remonte depuis les
                    fondations à l'intérieur de la maçonnerie. C'est l'humidité ascensionnelle.</p>
                <p>Tout ce qui fait une tache sur un mur n'est pas une remontée capillaire. Une remontée capillaire,
                    c'est un phénomène purement physique. La maçonnerie est poreuse (brique, parpaing, pierre). Elle se
                    comporte comme une mèche plongée dans l'eau du sol. L'eau monte par de minuscules canaux jusqu'à
                    atteindre un équilibre entre gravité et tension de surface. En pratique, les dégradations s'arrêtent
                    rarement au-dessus de 1 m à 1,50 m.</p>
                <p>Si votre mur est humide en haut, autour des fenêtres ou dans les angles du plafond, on est sur tout
                    autre chose : une <a href="<?php echo BASE_URL; ?>vmc-simple-flux"
                        style="text-decoration: underline;">VMC simple flux</a> encrassée ou absente, de violents ponts
                    thermiques (qui se règlent généralement via une <a
                        href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite"
                        style="text-decoration: underline;">isolation par l'extérieur du bâtiment</a>), ou une fuite de
                    toiture. Dans ces cas-là, une injection en pied de mur ne servira strictement à rien.</p>

                <!-- Section 2 -->
                <h2 id="diagnostic">Diagnostic sérieux : la bombe à carbure, pas le gadget à deux pointes</h2>
                <p>Beaucoup de sociétés se déplacent avec un petit appareil à aiguilles qu'elles plantent dans les
                    plâtres. L'aiguille bippe, le commercial parle de murs gorgés d'eau et vous sort un devis de
                    plusieurs milliers d'euros. Ce test ne mesure que l'humidité de surface. Une pièce mal ventilée fera
                    sonner ce type d'appareil même sur un mur sain en profondeur.</p>
                <p>Pour savoir si l'eau remonte vraiment depuis le sol, il faut mesurer l'humidité au cœur de la
                    maçonnerie. Le test fiable pour ça, c'est la bombe à carbure. Le technicien perce un petit trou dans
                    le mur, récupère de la poussière de matériau, la met dans un récipient hermétique avec du carbure de
                    calcium. La réaction chimique produit du gaz et la pression indiquée donne le taux d'eau réel
                    contenu dans l'épaisseur du matériau. Si l'entreprise ne parle que d'un testeur électronique et
                    refuse la bombe à carbure, méfiance.</p>

                <!-- Section 3 -->
                <h2 id="types-murs">Sur quels murs l'injection fonctionne vraiment ?</h2>
                <p>L'injection de résine n'est pas une baguette magique. Elle fonctionne bien sur certains murs, mal sur
                    d'autres, et ne doit jamais être utilisée dans des cas précis.</p>
                <p>Elle est pertinente sur les murs homogènes comme la brique pleine, le parpaing plein ou le béton. La
                    structure est régulière, le produit se diffuse correctement. Sur les murs creux (parpaings
                    alvéolaires, briques alvéolaires), c'est délicat. Si on injecte au mauvais endroit, la résine se
                    vide dans les alvéoles et finit dans le vide du bloc. La barrière étanche est incomplète, l'eau
                    trouve le passage.</p>
                <p>Sur les murs anciens hétérogènes (pierre, terre, moellons mélangés), l'injection est souvent un
                    échec. Le produit ne circule pas de la même façon dans la pierre dure et dans la terre friable. Les
                    murs en pisé, torchis ou bauge ont besoin de respirer. Leur coller un barrage chimique à la base est
                    une mauvaise idée. Si quelqu'un vous propose d'injecter un mur en pisé, ce n'est pas un spécialiste
                    de ce type de construction.</p>

                <!-- Section 4 -->
                <h2 id="arase-etanche">L'idée de base : créer une arase étanche</h2>
                <p>L'objectif du traitement par injection est simple : fabriquer artificiellement ce que les
                    constructions modernes ont d'origine, une arase étanche. Les maisons récentes sont montées sur une
                    bande bitumineuse ou une coupure capillaire intégrée dans la maçonnerie. Sur les constructions
                    anciennes, cette couche n'existe pas.</p>
                <p>L'injection vient fabriquer cette barrière après coup. On perce une ligne horizontale de trous au bas
                    du mur, on injecte une résine hydrofuge, le produit se diffuse et durcit, la ligne devient étanche
                    et l'eau ne peut plus monter au-dessus. L'eau qui remonte depuis le sol reste bloquée sous cette
                    barrière. Le mur au-dessus commence à sécher lentement.</p>

                <!-- Section 5 -->
                <h2 id="produits">Résine liquide ou crème : ce qui change pour vous</h2>
                <p>Les produits utilisés sont à base de silanes et de siloxanes. Ce sont des molécules hydrophobes qui
                    repoussent l'eau tout en laissant passer la vapeur. On trouve deux grandes familles : les résines
                    liquides sous pression et les crèmes d'injection.</p>
                <p>Les résines liquides, injectées avec une pompe, étaient la norme historique. Sur un mur fissuré ou
                    très creux, elles peuvent s'échapper et se perdre dans les fondations. Les crèmes d'injection sont
                    aujourd'hui plus fréquentes. La crème reste dans le trou percé, migre progressivement dans le réseau
                    capillaire et assure une saturation plus homogène.</p>
                <p>Ce qui compte vraiment, au-delà de la forme, c'est le taux de matières actives (un produit sérieux
                    tourne souvent à 60–80% de silane quand des versions grand public tombent à 15%), l'absence de
                    solvants lourds (on vise des produits en phase aqueuse, inodores) et la présence de certifications
                    (CSTB, Socotec). Un produit peu concentré et sans certification peut coûter moins cher au litre,
                    mais il faudra plus de volume pour un résultat plus fragile dans le temps.</p>

                <!-- Section 6 -->
                <h2 id="chantier">Comment se passe concrètement un chantier d'injection</h2>
                <p>Sur le papier, on pourrait croire que c'est juste percer et injecter. En pratique, un chantier propre
                    suit une séquence précise. On commence par le décroutage. On dépose tous les enduits, plâtres et
                    peintures abîmés jusqu'à 40–50 cm au-dessus de la dernière trace d'humidité. Tant qu'on laisse les
                    plâtres chargés en sels, ils continueront à attirer l'eau.</p>
                <p>On implante ensuite les trous. On trace une ligne au bas du mur, le plus près possible du sol fini.
                    On fore des trous de 12 à 14 mm, espacés de 10 à 12 cm. La profondeur correspond à peu près à
                    l'épaisseur du mur moins quelques centimètres pour ne pas traverser. Puis on nettoie les puits
                    d'injection. La poussière de perçage gêne la diffusion de la résine. On souffle, on aspire.</p>
                <p>Vient l'injection. On introduit la crème jusqu'au refus dans chaque trou. Sur un mur creux, on vise
                    les joints pleins, pas le vide. Une fois la résine en place, on rebouche les trous avec un mortier
                    adapté. Et ensuite, on laisse travailler le temps.</p>

                <!-- Section 7 -->
                <h2 id="eau-bloquee">Ce qu'on oublie souvent : que devient l'eau bloquée ?</h2>
                <p>L'injection n'enlève pas l'eau du sous-sol. Elle l'empêche de monter. En créant une barrière étanche,
                    l'eau reste en dessous, dans les fondations et dans le sol autour. Elle peut chercher des chemins
                    latéraux pour ressortir ailleurs, sur un mur voisin non traité, à la jonction avec la dalle ou par
                    des fissures.</p>
                <p>C'est pour ça qu'un traitement sérieux ne se fait pas par morceaux. On traite l'ensemble d'un mur de
                    refend ou une façade complète, pas juste deux mètres derrière un meuble. Sinon, l'eau contourne la
                    barrière et les taches réapparaissent un peu plus loin.</p>

                <!-- Section 8 -->
                <h2 id="prix">Combien coûte l'assèchement par injection ?</h2>
                <p>Les entreprises spécialisées facturent au mètre linéaire de mur traité, pas au mètre carré de surface
                    visible. Le prix dépend de l'épaisseur du mur, de la nature de la maçonnerie, de l'accessibilité et
                    de la reprise ou non des enduits derrière.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de mur</th>
                                <th>Fourchette de prix (€/m linéaire)</th>
                                <th>Commentaires</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mur standard 15–20 cm</td>
                                <td>50 € à 90 €</td>
                                <td>Maison récente, maçonnerie homogène, accès simple.</td>
                            </tr>
                            <tr>
                                <td>Mur ancien 40–60 cm</td>
                                <td>100 € à 200 €</td>
                                <td>Pierre / moellon, consommation de résine plus élevée.</td>
                            </tr>
                            <tr>
                                <td>Petit chantier DIY (crème pro)</td>
                                <td>30 € à 50 € la cartouche</td>
                                <td>1,5 à 2 m linéaires sur mur de 20 cm.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>Un point important : ne confiez pas ce travail à un démarcheur qui sonne à votre porte. Passez par
                    une entreprise avec références, idéalement certifiée Qualibat sur ce type d'ouvrage, et exigez une
                    garantie écrite.</p>

                <!-- Section 9 -->
                <h2 id="sechage">Temps de séchage : le long tunnel dont on ne parle pas assez</h2>
                <p>Une fois l'injection réalisée, le mur n'est pas sec pour autant. L'eau déjà présente au-dessus de la
                    barrière doit s'échapper. On compte en règle générale environ un mois de séchage par centimètre
                    d'épaisseur de mur. Un mur de 30 cm, c'est facilement 9 à 12 mois avant d'atteindre un taux
                    d'humidité stable.</p>
                <p>Pendant ce temps, on laisse la maçonnerie nue, on évite les peintures fermées et on peut utiliser un
                    enduit d'assainissement spécifique conçu pour gérer les sels. Les sels minéraux que l'eau transporte
                    (nitrates, sulfates) sont un vrai poison pour les finitions. Même si la remontée capillaire est
                    stoppée, ces sels continuent d'attirer l'humidité de l'air et de faire cloquer les enduits. Un
                    traitement anti-salpêtre ou un enduit adapté est quasiment obligatoire sur les murs très touchés.
                </p>

                <!-- Section 10 -->
                <h2 id="diy-pro">Injection : à faire soi-même ou à confier à un pro ?</h2>
                <p>Sur le marché, on trouve des kits d'injection complets en grande surface de bricolage. Techniquement,
                    un bricoleur motivé peut traiter un petit muret ou une cloison légère. Mais pour les murs porteurs,
                    les façades et les murs anciens, la géométrie est rarement parfaite, la nature des matériaux varie
                    d'un point à l'autre et la moindre erreur d'espacement, de profondeur ou de dosage se paye cher. La
                    barrière est incomplète, l'eau passe, et l'investissement est perdu.</p>
                <p>Un professionnel sérieux réalise un diagnostic avec la bonne méthode, adapte le produit et la
                    technique au type de mur, travaille avec des résines certifiées et vous remet une garantie, souvent
                    décennale. Quand on touche à la structure d'une maison, cette garantie n'est pas un détail.</p>

                <!-- Section 11 -->
                <h2 id="alternatives">Les alternatives à l'injection</h2>
                <p>L'injection n'est pas la seule option. Selon le cas, d'autres techniques sont plus adaptées. Le
                    drainage périphérique est pertinent quand l'eau stagne contre les murs. On pose un drain autour de
                    la maison, au pied des fondations, pour évacuer l'eau avant qu'elle ne monte.</p>
                <p>Pour les caves et sous-sols enterrés, la pression de l'eau sur les parois est tellement forte que
                    l'injection ne suffit pas. On applique un cuvelage, un système d'enduits étanches qui transforme le
                    mur en cuve. D'autres dispositifs évitent la chimie pour miser sur des technologies comme l'<a
                        href="<?php echo BASE_URL; ?>inverseur-polarite-electromagnetique"
                        style="text-decoration: underline;">inverseur de polarité électromagnétique</a> ou la <a
                        href="<?php echo BASE_URL; ?>ventilation-par-surpression"
                        style="text-decoration: underline;">ventilation par surpression (VMI)</a>. Ces systèmes
                    modifient le comportement de l'eau dans le mur ou purgent l'air gorgé de vapeur. Leur efficacité
                    dépendra directement de la pertinence du diagnostic et du sérieux du fabricant.</p>

                <!-- Section 12 FAQ -->
                <h2 id="faq">FAQ – Questions fréquentes autour de l'assèchement par injection</h2>

                <h3>Qu'est-ce que l'assèchement des murs par injection, en une phrase ?</h3>
                <p>C'est un procédé qui consiste à percer la base d'un mur pour y injecter une résine hydrofuge, afin de
                    créer une barrière étanche qui bloque les remontées d'eau depuis le sol.</p>

                <h3>Comment "injecter de l'humidité" dans les murs ?</h3>
                <p>La formulation est trompeuse. On n'injecte pas de l'humidité, on injecte une résine contre
                    l'humidité. Concrètement, on fore des trous alignés au bas du mur, on les nettoie, puis on y pousse
                    une crème hydrophobe avec un pistolet ou une pompe adaptée.</p>

                <h3>Quel produit injecter dans un mur humide ?</h3>
                <p>Les produits les plus utilisés sont des crèmes d'injection à base de silanes et de siloxanes, en
                    phase aqueuse, sans solvant, avec un fort taux de matières actives et des certifications de
                    laboratoire.</p>

                <h3>Quel est le prix d'une injection de résine ?</h3>
                <p>Pour une maison individuelle, comptez souvent entre 50 et 90 euros par mètre linéaire sur un mur
                    standard, et jusqu'à 200 euros par mètre sur un mur très épais ou difficile d'accès. Un diagnostic
                    sérieux et un devis détaillé sont indispensables.</p>

                <h3>Comment assécher un mur intérieur humide après un dégât des eaux ?</h3>
                <p>Ce n'est pas le même combat que les remontées capillaires. Après une fuite, on coupe la source, puis
                    on met en place des déshumidificateurs de chantier et une bonne ventilation. L'objectif est
                    d'évacuer rapidement l'eau contenue dans les matériaux, pas de stopper une remontée depuis le sol.
                </p>

                <h3>Un déshumidificateur peut-il assécher un mur victime de remontées capillaires ?</h3>
                <p>Il améliore le confort en abaissant l'humidité de l'air, mais il ne règle pas le problème de fond.
                    L'eau continue de remonter par capillarité dans la maçonnerie tant qu'il n'y a pas de barrière ou de
                    drainage adapté.</p>

                <h3>Est-ce que le chauffage fait baisser l'humidité ?</h3>
                <p>Chauffer réduit l'humidité relative de l'air. Sur un mur touché par des remontées capillaires, ça
                    accélère surtout l'évaporation en surface. L'eau remonte plus vite, les sels cristallisent plus vite
                    et les enduits se dégradent plus rapidement.</p>

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
                <h3>En résumé</h3>
                <p>
                    Un traitement par injection peut sauver des murs qui partent en poussière, mais seulement s'il est
                    utilisé au bon endroit, avec les bons produits et sur la base d'un diagnostic solide. Avant de
                    signer un devis, prenez le temps de comprendre ce qu'on va injecter, où, pourquoi et comment. C'est
                    ce qui fera la différence entre un mur assaini et un chantier à refaire dans quelques années.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un devis traitement humidité</a>
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
                <!-- 10 Latest from category -->
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

                <!-- 10 Latest globally -->
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