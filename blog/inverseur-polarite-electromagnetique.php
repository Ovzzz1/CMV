<?php
/**
 * inverseur-polarite-electromagnetique.php
 * Article: Inverseur polarité électromagnétique (Remontées capillaires)
 */

$article_meta = [
    'title' => 'Inverseur de polarité électromagnétique : Prix, Avis et Vrai Efficacité',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/inverseur-polarite-electromagnetique.webp',
    'excerpt' => 'L\'inverseur de polarité promet d\'assécher vos murs sans gros travaux. Gadget ou vraie solution contre les remontées capillaires ? Prix réels 2026, fonctionnement et avis de pros.',
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
                <span>Traitement humidité</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Humidité</span>
                <span class="article-tag">Technologie</span>
            </div>

            <h1>Inverseur de Polarité Électromagnétique :<br>
                <span class="h1-accent">Prix 2026, Avis Pro et Vrai Efficacité</span>
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
                Des murs qui s'effritent à la base, du salpêtre qui ronge le placo, une odeur de cave dans le salon...
                Les remontées capillaires transforment les maisons anciennes en éponges. Récemment, l'injection de
                résine a trouvé un concurrent : <strong>le boîtier géomagnétique, ou inverseur de polarité
                    électromagnétique.</strong> Branché sur une simple prise, cet appareil promet de renvoyer l'eau dans
                le sol grâce aux ondes, sans percer le moindre mur. Gadget marketing ou révolution technologique ? Voici
                l'explication scientifique de son fonctionnement, les prix réels en 2026 et l'avis décomplexé du
                terrain.
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
                        <li><strong>Le principe :</strong> Émet un champ de très basse fréquence (TBF) pour inverser la
                            charge électrique des molécules d'eau, qui retombent par gravité au lieu de monter par
                            capillarité.</li>
                        <li><strong>Prix d'un appareil :</strong> De 800 à 2 500 € selon le rayon d'action (souvent
                            moins cher qu'une résine sur une grande maison).</li>
                        <li><strong>Le délai (point noir) :</strong> Ne s'adresse pas aux pressés. Il faut 6 à 18 mois
                            pour qu'un mur porteur épais s'assèche complètement.</li>
                        <li><strong>L'avis des pros :</strong> Très efficace sur la pierre ancienne (là où la résine est
                            compliquée), inefficace si l'humidité vient d'une fuite ou d'infiltrations latérales.
                            Diagnostique strict obligatoire.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#definition">Qu'est-ce qu'un inverseur de polarité et comment fonctionne-t-il ?</a>
                        </li>
                        <li><a href="#avantages">Pourquoi le choisir plutôt que l'injection de résine ?</a></li>
                        <li><a href="#prix">Prix 2026 : Combien coûte un boîtier IPE ?</a></li>
                        <li><a href="#limites">Les limites : pourquoi 20% des clients sont déçus</a></li>
                        <li><a href="#avis-terrain">Avis terrain : Gadget ou vraie solution ?</a></li>
                        <li><a href="#faq">Foire Aux Questions (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Section 1 : Définition -->
                <h2 id="definition">Qu'est-ce qu'un inverseur de polarité et comment fonctionne-t-il ?</h2>
                <p>Pour comprendre son fonctionnement, il faut d'abord comprendre comment l'eau défie la gravité.</p>
                <p><strong>L'effet d'osmose naturelle :</strong> Dans le sol, l'eau se charge positivement en frottant
                    contre la terre. Le mur de la maison, lui, est chargé négativement. Or, les opposés s'attirent :
                    l'eau remonte naturellement (jusqu'à 1,50 m parfois) grâce au courant géomagnétique, en passant par
                    les micro-capillaires du parpaing ou de la pierre.</p>

                <p><strong>Le rôle du boîtier :</strong> L'inverseur de polarité électromagnétique (IPE) est un petit
                    appareil que l'on fixe au centre géométrique du bâtiment. Une fois branché :</p>
                <ol>
                    <li>Il émet des ondes de très basse fréquence (non dangereuses pour la santé, bien inférieures au
                        Wi-Fi).</li>
                    <li>Ces ondes perturbent le champ électromagnétique naturel du mur et "inversent" la charge des
                        molécules d'eau.</li>
                    <li>L'eau (devenue positive) et le mur (devenu positif) se repoussent.</li>
                    <li>La capillarité s'arrête net. Par le simple poids de la gravité, <strong>l'eau contenue dans les
                            murs redescend lentement vers le sol</strong>.</li>
                </ol>

                <!-- Section 2 : Avantages -->
                <h2 id="avantages">Pourquoi le choisir plutôt que l'injection de résine ?</h2>
                <p>Jusqu'à présent, la méthode reine consistait à percer le bas du mur tous les 15 cm pour y réaliser un
                    <a href="<?php echo BASE_URL; ?>assechement-murs-injections"
                        style="text-decoration: underline;">assèchement des murs via injection</a> de résine hydrophobe
                    coûteuse. L'inverseur de polarité séduit pour plusieurs raisons logistiques :</p>

                <ul class="custom-list">
                    <li><strong>Aucun dégât sur les murs :</strong> Pas de perçage, pas de bruit, pas de poussière.
                        Idéal pour les maisons classées ou les murs en belles pierres apparentes.</li>
                    <li><strong>Traitement global de la maison :</strong> Une injection de résine traite un mur
                        linéaire. L'IPE traite une zone sphérique (le "rayon d'action"). Un seul boîtier peut assécher
                        les murs extérieurs, le sol de la cave ET le mur de refend porteur qui passe au milieu du salon
                        !</li>
                    <li><strong>Coût global souvent inférieur :</strong> Injecter 40 mètres linéaires de résine sur des
                        murs en pierre épais de 60 cm peut coûter plus de 6 000 €. Un bon inverseur couvrant cette
                        surface coûtera environ 1 500 €.</li>
                    <li><strong>Sécurité sanitaire :</strong> Pas de produits chimiques ou solvants injectés dans
                        l'écosystème de la maison. Consommation électrique dérisoire (environ 5 € à 15 € par an).</li>
                </ul>

                <!-- Section 3 : Prix -->
                <h2 id="prix">Prix 2026 : Combien coûte un boîtier inverseur de polarité ?</h2>
                <p>Sur le marché (marques IPE de BFL, ATE, e-Breeze...), le prix d'un boîtier est lié uniquement à son
                    <strong>rayon d'action</strong>, qui correspond au diamètre d'efficacité de l'onde.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Rayon d'action du boîtier</th>
                                <th>Surface au sol correspondante</th>
                                <th>Prix moyen TTC (Installation incluse)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Petit (14 à 20m de diamètre)</td>
                                <td>Jusqu'à 60 m² (petite maison ou cave)</td>
                                <td><strong>800 € à 1 200 €</strong></td>
                            </tr>
                            <tr>
                                <td>Moyen (30m de diamètre)</td>
                                <td>De 80 m² à 150 m² (Maison standard)</td>
                                <td><strong>1 300 € à 1 800 €</strong></td>
                            </tr>
                            <tr>
                                <td>Grand (40m à 60m+ de diamètre)</td>
                                <td>Plus de 200 m² (Très grandes longères)</td>
                                <td><strong>1 900 € à 2 500 € +</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p><em>Note :</em> Certains modèles "passifs" (géomagnétiques de type ATG) n'ont même pas besoin d'être
                    branchés au secteur car ils captent l'énergie du sol. Ils sont souvent légèrement plus chers (1 500
                    à 2 000 €). L'installation prend 1 heure et est souvent garantie de 10 à 30 ans par le fabricant.
                </p>

                <!-- Section 4 : Limites -->
                <h2 id="limites">Les limites : pourquoi 20% des clients sont déçus</h2>
                <p>Si la science est avérée, les forums sont pourtant remplis d'avis mitigés. Pourquoi ? Parce que ce
                    boîtier n'est pas magique et est parfois <strong>mal vendu</strong> par des commerciaux peu
                    scrupuleux.</p>

                <blockquote class="article-blockquote">
                    <strong>L'avertissement du diagnostiqueur :</strong> L'inverseur de polarité traite les "remontées
                    capillaires" venues de la nappe phréatique sous la fondation. MAIS, il est strictement 100%
                    inefficace si votre humidité provient d'un <a href="<?php echo BASE_URL; ?>enduit-facade"
                        style="text-decoration: underline;">enduit de façade</a> poreux abîmé par la pluie, d'une
                    gouttière qui fuit, d'un tuyau cassé dans la dalle, ou d'infiltrations latérales (un mur enterré
                    contre une butte de terre).
                </blockquote>

                <h3>L'autre grand frustrant : Le Délai</h3>
                <p>Vous avez branché l'inverseur lundi, vous voulez que le mur soit sec vendredi ? Oubliez. Une fois la
                    capillarité stoppée, <strong>il faut laisser le temps à l'eau de s'évaporer et redescendre.</strong>
                </p>
                <p>Comptez <strong>6 à 18 mois</strong> (voire 24 mois sur des châteaux aux murs de 80 cm) pour qu'un
                    mur s'assèche à cœur. Pendant ce temps, il ne faut surtout pas bloquer le plâtre humide derrière un
                    revêtement étanche (peinture vinylique, ou même une <a
                        href="<?php echo BASE_URL; ?>isolation-des-murs" style="text-decoration: underline;">isolation
                        des murs par l'intérieur</a> totalement hermétique). L'assèchement naturel est un processus très
                    lent. Les clients mécontents sont souvent ceux auxquels on a promis "une maison sèche le mois
                    prochain".</p>

                <!-- Section 5 : Avis terrain -->
                <h2 id="avis-terrain">Avis terrain : Gadget ou vraie solution ?</h2>
                <p>Dans la grande famille des solutions dédiées au <a href="<?php echo BASE_URL; ?>traitement-humidite"
                        style="text-decoration: underline;">traitement curatif contre l'humidité</a>, <strong>le bilan à
                        long terme de cet appareil est extrêmement favorable.</strong> D'après les enquêtes de
                    satisfaction, plus de 75 à 80% des utilisateurs qui ont respecté les pré-requis constatent un arrêt
                    net des auréoles et une disparition des odeurs de moisi après 12 mois. La chute de l'hygrométrie de
                    la maison se traduit même souvent par une baisse de la consommation de chauffage (l'air sec est plus
                    facile à chauffer qu'un air humide).</p>

                <p><strong>Le conseil du pro :</strong> Réservez l'injection de résine aux maisons de ville en parpaing
                    creux et briques (efficace et rapide). <strong>Optez pour l'inverseur électronique dès lors que
                        :</strong>
                    1. Votre maison a de gros murs en moellons, pisé, ou pierre (où la résine diffuse très mal à cause
                    des vides).<br>
                    2. Les remontées capillaires s'étendent sur plus de 15 mètres linéaires. <br>
                    3. Les murs de refend intérieurs sont aussi touchés que les façades.</p>

                <!-- Section 6 : FAQ -->
                <h2 id="faq">Foire Aux Questions (FAQ)</h2>

                <h3>Est-ce que l'inverseur de polarité est dangereux pour la santé ?</h3>
                <p>Non. Les ondes (Audio Fréquence TBF) émises par les appareils géomagnétiques certifiés (marquage CE)
                    sont extrêmement faibles, de l'ordre de quelques dixièmes de hertz. Elles sont largement moins
                    puissantes et intrusives que le signal de votre box Wi-Fi, de votre micro-ondes ou de votre
                    téléphone portable.</p>

                <h3>Quelle est la durée de vie de ces appareils ?</h3>
                <p>L'électronique à bord est très basique (pas d'usure mécanique, pas de moteur). La durée de vie
                    moyenne est de 10 à 20 ans sans aucune maintenance. Certains boîtiers passifs (sans aucun
                    branchement électrique) revendiquent 30 ans de durée de vie.</p>

                <h3>Peut-on l'installer soi-même ?</h3>
                <p>La fixation au mur (2 vis) et le branchement sur une prise sont très simples. Cependant,
                    l'<strong>emplacement optimal</strong> (le "centre de gravité" des champs magnétiques) doit
                    idéalement être calculé par le technicien lors du diagnostic humidité pour couvrir parfaitement tous
                    les murs touchés.</p>

                <h3>Pourquoi mon mur est-il encore salpêtré après 1 an ?</h3>
                <p>L'inverseur repousse l'H2O vers le bas, mais il ne "nettoie" pas les sels minéraux (sulfates,
                    chlorures) que l'eau a charriés du sol vers votre mur pendant 20 ans. C'est le retrait de l'eau
                    (évaporation) qui fait cristalliser le sel en salpêtre. Une fois le cœur du mur certifié sec au
                    testeur d'humidité, vous devrez impérativement piocher le vieil enduit salpêtré et refaire un enduit
                    à la chaux saine.</p>

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
                    L'inverseur de polarité électromagnétique n'est pas un concept ésotérique : c'est une
                    <strong>véritable alternative redoutable</strong> (et souvent moins onéreuse sur les grandes
                    surfaces) à l'injection de résine. Son absence totale de travaux invasifs en fait le système
                    chouchou des maisons en pierre et des bâtiments historiques. Gardez simplement en tête qu'il n'agit
                    QUE sur les remontées capillaires (soyez sûr de votre diagnostic initial) et qu'il exige une vertu
                    rare dans la rénovation : <strong>la patience</strong> (plusieurs mois d'assèchement
                    incompressibles).
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un diagnostic humidité précis</a>
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