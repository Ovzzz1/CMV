<?php
/**
 * fixation-panneau-solaire-sur-tuile-canal.php
 * Article: Fixation de panneaux solaires sur tuile canal : le guide complet
 */

$article_meta = [
    'title'        => 'Fixation de panneaux solaires sur tuile canal : le guide complet',
    'category'     => 'travaux',
    'image'        => 'https://www.cemarenov.fr/image/fixation-panneau-solaire-sur-tuile-canal-1.webp',
    'excerpt'      => 'Tuile canal fragile, emboîtement précaire, vents du Sud... Découvrez comment fixer vos panneaux solaires sur une toiture canal sans risquer d\'infiltrations ni de casse.',
    'date'         => '2026-03-31',
    'reading_time' => 9,
];

require_once dirname(__DIR__) . '/functions.php';

$page_title       = $article_meta['title'];
$page_description = $article_meta['excerpt'];

$current_cat    = $article_meta['category'];
$current_url    = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category       = get_category($current_cat);
$other_cats     = get_other_categories($current_cat);
$cat_articles   = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles   = array_slice($cat_articles, 0, 10);
$latest_articles = array_values(array_filter(get_latest_articles(11), fn($a) => ($a['url'] ?? '') !== $current_url));
$latest_articles = array_slice($latest_articles, 0, 10);

$current_title_words = array_map('mb_strtolower', explode(' ', $article_meta['title']));
$similar_articles    = [];
foreach ($cat_articles as $art) {
    if (!isset($art['title'])) continue;
    $title_words        = array_map('mb_strtolower', explode(' ', $art['title']));
    $common             = count(array_intersect($current_title_words, $title_words));
    $similar_articles[] = array_merge($art, ['score' => $common]);
}
usort($similar_articles, fn($a, $b) => $b['score'] - $a['score']);
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
                <span>Fixation panneau solaire tuile canal</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Solaire</span>
                <span class="article-tag">Toiture</span>
            </div>

            <h1>Fixation de panneaux solaires sur tuile canal :<br>
                <span class="h1-accent">Le Guide Complet</span>
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
                <?php endforeach; ?>
            </div>
        </aside>

        <div class="article-container">

            <p class="article-intro">
                Installer des panneaux solaires sur une toiture en tuile canal, c'est le défi technique des maisons du Sud de la France. Forme arrondie, pose par simple emboîtement, terre cuite fragile : vous ne pouvez pas visser un rail standard là-dessus sans risquer des infiltrations ou de casser vos tuiles. Voici exactement comment procéder, quel matériel choisir, et les pièges à éviter.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        En Bref : Comment fixer des panneaux sur tuile canal ?
                    </div>
                    <p>Deux systèmes fiables : la <strong>vis à double filetage</strong> (percez le sommet de la tuile, vissez dans le chevron, joint EPDM assure l'étanchéité) ou le <strong>crochet universel ESDEC/K2</strong> (glisse sous la tuile, pince le liteau, zéro perçage). Dans les deux cas, des <strong>crochets anti-glissement</strong> sur les tuiles adjacentes sont obligatoires. Budget fixation : 50 à 55 €/m².</p>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#tuile-canal-complexite">Tuile canal : caractéristiques et complexité technique</a></li>
                        <li><a href="#avantages-inconvenients">Avantages et inconvénients pour le solaire</a></li>
                        <li><a href="#cout-fixation">Quel est le coût d'une fixation tuile canal ?</a></li>
                        <li><a href="#installation">Comment installer les panneaux pas-à-pas</a></li>
                        <li><a href="#sans-contre-chevrons">Cas spécifique : sans contre-chevrons</a></li>
                        <li><a href="#faq">Questions fréquentes (FAQ)</a></li>
                    </ul>
                </div>

                <h2 id="tuile-canal-complexite">Tuile canal : caractéristiques et pourquoi c'est complexe</h2>
                <p>La tuile canal fonctionne sur un principe d'emboîtement : une tuile "de courant" (retournée, elle forme la gouttière) et une tuile "de couvert" (posée par-dessus). Aucune n'est vissée ni collée. C'est ce système qui soulève 3 contraintes techniques majeures pour fixer des panneaux solaires :</p>

                <ul class="custom-list">
                    <li><strong>Une surface irrégulière :</strong> Les "vagues" de la toiture empêchent d'utiliser des rails plats classiques. Il faut du matériel réglable en hauteur.</li>
                    <li><strong>Une étanchéité précaire :</strong> Seule la superposition des tuiles bloque l'eau. Soulever ou percer le mauvais endroit provoque des infiltrations immédiates dans la charpente.</li>
                    <li><strong>Le piège des tuiles lisses (anciennes) vs à talon (modernes) :</strong> Les tuiles canal anciennes tiennent uniquement par gravité. Elles glissent facilement au moindre appui ou vibration. Les tuiles modernes possèdent un ergot (talon) qui s'accroche au liteau. Si vous avez des tuiles lisses, les crochets anti-glissement ne sont pas une option, c'est une obligation absolue.</li>
                </ul>

                <img src="<?php echo BASE_URL; ?>image/fixation-panneau-solaire-sur-tuile-canal-2.webp" alt="Schéma de l'emboîtement d'une tuile canal : tuile de courant et tuile de couvert" loading="lazy">
                <p class="img-caption">L'emboîtement tuile de courant / tuile de couvert : le principe qui rend la fixation solaire spécifique.</p>

                <!-- Vidéo YouTube : Comprendre la tuile canal -->
                <div style="display:flex; justify-content:center; margin: 2rem 0;">
                    <div style="width:100%; max-width:700px; aspect-ratio:16/9; border-radius:12px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                        <iframe
                            src="https://www.youtube.com/embed/uktRh012NJQ?start=69"
                            title="Comprendre la tuile canal pour l'installation solaire"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            style="width:100%; height:100%; border:none;">
                        </iframe>
                    </div>
                </div>

                <h2 id="avantages-inconvenients">Avantages et inconvénients d'une installation sur tuiles canal</h2>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th style="color: #437a22; border-top: 3px solid #437a22;">✅ Avantages</th>
                                <th style="color: #964219; border-top: 3px solid #964219;">❌ Inconvénients</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Ventilation optimale :</strong> L'espace sous la courbure de la tuile crée un couloir d'air naturel. Les panneaux restent plus froids en été, leur rendement est meilleur.</td>
                                <td><strong>Fragilité de la terre cuite :</strong> La tuile casse facilement si on marche dessus ou si on serre un crochet métallique sans entretoise amortisseur.</td>
                            </tr>
                            <tr>
                                <td><strong>Support durable :</strong> La terre cuite canal dure plusieurs décennies. Une fois votre fixation bien posée, le toit ne bougera pas.</td>
                                <td><strong>Effet voile (Mistral/Tramontane) :</strong> Les tuiles étant peu fixées à l'origine, les vents forts peuvent s'engouffrer sous les panneaux et soulever la couverture tout autour de l'installation.</td>
                            </tr>
                            <tr>
                                <td><strong>Esthétique préservée :</strong> Les systèmes à rails noirs en aluminium se fondent très bien sur la tuile canal.</td>
                                <td><strong>Risque de glissement :</strong> Les vibrations permanentes du vent sur les panneaux font descendre les tuiles lisses si elles ne sont pas sécurisées par des crochets.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="cout-fixation">Quel est le coût d'une fixation pour tuile canal ?</h2>
                <p>Le matériel de fixation spécifique à la tuile canal revient en moyenne à <strong>50 € à 55 € par mètre carré</strong> (coût du système de fixation seul : crochets, rails aluminium, étriers, vis double filetage, joints EPDM). Ce budget ne comprend pas les panneaux, les onduleurs, ni la main d'œuvre.</p>
                <p>Ne lésinez jamais sur la qualité des ancrages. Un kit bas de gamme brisera vos tuiles au serrage. La réparation de toiture qui s'ensuit coûte dix fois le prix du kit économisé.</p>

                <h2 id="installation">Comment installer des panneaux solaires sur une toiture en tuile canal ?</h2>

                <h3>Le matériel et les outils nécessaires</h3>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Matériel</th>
                                <th>Utilité</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Vis à double filetage</strong> (avec rondelle EPDM)</td>
                                <td>Traverse le sommet de la tuile de courant et s'ancre dans le chevron. Le joint d'étanchéité EPDM bloque l'eau au point de perçage.</td>
                            </tr>
                            <tr>
                                <td><strong>Crochets universels</strong> (ESDEC ClickFit Evo, K2)</td>
                                <td>S'insèrent entre deux tuiles sans les percer. Pincent le liteau ou le chevron grâce à leur mécanisme de serrage.</td>
                            </tr>
                            <tr>
                                <td><strong>Crochets anti-glissement tuile</strong></td>
                                <td>Petits crochets inox qui bloquent les tuiles canal adjacentes pour empêcher leur descente progressive vers la gouttière.</td>
                            </tr>
                            <tr>
                                <td><strong>Rails aluminium profilés</strong></td>
                                <td>Support horizontal sur lequel les panneaux viennent se poser et se verrouiller via des étriers.</td>
                            </tr>
                            <tr>
                                <td><strong>Visseuse + clé à douille 18mm</strong></td>
                                <td>Pour l'ancrage dans le bois de charpente et le serrage des étriers.</td>
                            </tr>
                            <tr>
                                <td><strong>Cordeau à tracer + niveau</strong></td>
                                <td>Garantir l'alignement parfait des rails malgré les irrégularités de la surface.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <img src="<?php echo BASE_URL; ?>image/fixation-panneau-solaire-sur-tuile-canal-3.webp" alt="Comparatif vis à double filetage versus crochet universel ESDEC pour tuile canal" loading="lazy">
                <p class="img-caption">À gauche, la vis à double filetage avec joint EPDM. À droite, le crochet universel qui pince le liteau sans percer la tuile.</p>

                <h3>Les étapes de pose pas-à-pas</h3>
                <ol>
                    <li><strong>Repérage et détuilage :</strong> Identifiez l'emplacement de vos chevrons sous la couverture. Retirez délicatement les tuiles "de couvert" aux futurs points d'ancrage, espacés généralement de 80 à 120 cm.</li>
                    <li><strong>Ancrage dans la charpente :</strong><br>
                       , <em>Vis à double filetage :</em> Percez le sommet de la tuile de courant, vissez dans le chevron jusqu'à écraser la rondelle EPDM qui assure l'étanchéité.<br>
                       , <em>Crochet universel :</em> Glissez le crochet dans l'interstice pour pincer le liteau ou le chevron, sans perçage de la terre cuite.</li>
                    <li><strong>Sécurisation des tuiles adjacentes :</strong> Posez les crochets anti-glissement sur les tuiles canal autour des fixations. C'est l'étape que la plupart des installations bâclées sautent, et qui génère des problèmes deux ans plus tard.</li>
                    <li><strong>Montage des rails aluminium :</strong> Fixez les rails sur les ancrages. Utilisez le réglage en hauteur (jusqu'à 10° de compensation) pour obtenir un plan parfaitement horizontal malgré les irrégularités du toit.</li>
                    <li><strong>Verrouillage des panneaux :</strong> Posez les panneaux sur les rails, raccordez les câbles, reliez les griffes de mise à la terre, et serrez les étriers finaux et intermédiaires.</li>
                </ol>

                <!-- YouTube Short : Tuto de pose sur tuile canal -->
                <div style="display:flex; justify-content:center; margin: 2rem 0;">
                    <div style="width:100%; max-width:315px; aspect-ratio:9/16; border-radius:12px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                        <iframe
                            src="https://www.youtube.com/embed/GVuqwEvsaB0"
                            title="Tutoriel : fixer des panneaux solaires sur tuile canal"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            style="width:100%; height:100%; border:none;">
                        </iframe>
                    </div>
                </div>

                <h2 id="sans-contre-chevrons">Cas spécifique : fixation sur tuile canal sans contre-chevrons</h2>
                <p>C'est la situation la plus courante sur les vieilles charpentes du Sud. Sans contre-chevron, il est rarissime que l'espacement des chevrons tombe pile sous le sommet de la courbe de la tuile canal, là où doit passer la vis ou le crochet. Fixer directement dans un liteau trop mince est dangereux : il ne tiendra pas sous l'effet de portance d'un vent fort.</p>

                <blockquote class="article-blockquote">
                    💡 <strong>Retour de chantier :</strong> Sur un projet près de Montpellier, la charpente ne comportait aucun contre-chevron. Les chevrons tombaient systématiquement dans le creux de la tuile, jamais sur le sommet. On ne pouvait ni percer ni accrocher correctement. On a fabriqué des platines de bois en fixant des lames de terrasse de 27 mm directement sur les chevrons existants. Ça nous a pris une matinée. Depuis, la structure encaisse les coups de Tramontane sans bouger d'un millimètre.
                </blockquote>

                <p><strong>La solution "litelage de renfort" :</strong> Vissez des chutes de bois épais (lames de terrasse de 27 mm) à l'horizontale sur les chevrons existants. Cette platine large et solide vous permet de placer vos crochets ou vis exactement là où la courbure de la tuile l'exige. Pré-percez le bois avant de visser pour éviter de le fendre, et frottez vos vis au savon pour faciliter l'entrée.</p>

                <img src="<?php echo BASE_URL; ?>image/fixation-panneau-solaire-sur-tuile-canal-4.webp" alt="Cale bois vissée sur chevron pour créer une platine de fixation sur tuile canal sans contre-chevron" loading="lazy">
                <p class="img-caption">La platine de bois fixée sur le chevron : la solution de terrain pour les charpentes sans contre-chevrons.</p>

                <div style="background-color: #eaf4f9; border-left: 4px solid #006494; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>L'alternative matérielle :</strong> Le système <strong>K2 SingleBoard</strong> remplit exactement cette fonction avec une planche métallique prédrillée que l'on fixe sur les chevrons. Plus cher que la solution bois, mais certifié et compatible avec tous les crochets K2. Le crochet <strong>ESDEC ClickFit Evo</strong> reste quant à lui la solution la plus simple si vos liteaux sont en bon état : il pince sans chercher le chevron.
                </div>

                <h2 id="faq">Questions fréquentes (FAQ)</h2>

                <h3>Faut-il obligatoirement percer les tuiles canal ?</h3>
                <p>Non. Si vous utilisez un système à crochets universels (ESDEC ClickFit Evo, K2), le crochet se glisse dans l'interstice entre deux tuiles pour pincer la charpente sans percer la terre cuite. Le perçage n'est requis qu'avec la vis à double filetage, et dans ce cas le joint EPDM assure une étanchéité totale au point de perçage.</p>

                <h3>Comment remplacer une tuile canal cassée sous un panneau ?</h3>
                <p>C'est la hantise de tous les propriétaires. Si vous avez utilisé des vis à double filetage réglables en hauteur, l'espace sous le panneau est suffisant pour manœuvrer. On fait glisser la tuile cassée vers la gouttière et on remonte une tuile de remplacement en la poussant le long de la tuile de courant, sans démonter les rails. Avec des crochets trop bas, le démontage partiel du rail devient inévitable.</p>

                <h3>Peut-on installer des micro-onduleurs avec les vagues de la tuile canal ?</h3>
                <p>Oui, mais la hauteur de rail est critique. La bosse formée par la tuile de couvert peut remonter jusqu'à 10-15 cm. Le boîtier du micro-onduleur ne doit jamais être en contact avec la tuile : il a besoin d'au moins 3 à 5 cm d'air libre pour se refroidir correctement. Si le rail est trop bas, l'onduleur surchauffe et bride votre production, voire se dégrade prématurément. Ajustez la hauteur de vos fixations en conséquence avant de serrer définitivement.</p>

                <h3>Comment adapter les <a href="https://www.cemarenov.fr/gouttieres">gouttières</a> quand des panneaux solaires sont installés sur tuile canal ?</h3>
                <p>La présence de rails solaires modifie parfois l'écoulement des eaux de ruissellement et peut nécessiter de repositionner ou de renforcer la fixation des gouttières. Notre guide <a href="https://www.cemarenov.fr/fixation-gouttiere-sur-bac-acier-isole">fixation gouttière sur bac acier isolé</a> couvre les systèmes de crochetage compatibles avec les supports de toiture complexes et les distances entre crochets à respecter pour éviter le déversement.</p>

            </div><!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation & Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers du Sud de la France, Philippe partage ses retours terrain concrets pour vous aider à réussir vos installations solaires sans mauvaise surprise.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>Prêt à solariser votre toiture canal ?</h3>
                <p>La clé d'une installation réussie sur tuile canal tient en trois points : le bon système d'ancrage (vis double filetage ou crochet universel selon votre charpente), des crochets anti-glissement sur toutes les tuiles autour de l'installation, et une hauteur de rail suffisante pour maintenir la ventilation. Ne bâclez pas l'ancrage pour économiser 50 euros de matériel.</p>
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

        </div><!-- .article-container -->

        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name'] ?? 'Travaux'); ?></h3>
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
require_once dirname(__DIR__) . '/schema-data.php';

$faq_schema = [
    [
        'question' => "Faut-il obligatoirement percer les tuiles canal pour installer des panneaux solaires ?",
        'answer'   => "Non. Les crochets universels (ESDEC ClickFit Evo, K2) se glissent entre les tuiles sans les percer. Le perçage n'est requis qu'avec la vis à double filetage, protégée par un joint EPDM qui assure une étanchéité totale."
    ],
    [
        'question' => "Comment remplacer une tuile canal cassée sous un panneau solaire ?",
        'answer'   => "Avec des vis à double filetage réglables en hauteur, il est souvent possible de faire glisser la tuile cassée vers la gouttière et de remonter une tuile de remplacement sans démonter les rails."
    ],
    [
        'question' => "Peut-on installer des micro-onduleurs avec les vagues de la tuile canal ?",
        'answer'   => "Oui, mais le boîtier de l'onduleur ne doit jamais toucher la tuile. Il faut laisser au minimum 3 à 5 cm d'espace libre entre le micro-onduleur et la tuile pour assurer sa ventilation et éviter la surchauffe."
    ],
    [
        'question' => "Quel est le coût d'une fixation pour tuile canal ?",
        'answer'   => "Comptez entre 50 et 55 euros par mètre carré pour le système de fixation spécifique à la tuile canal (crochets, rails aluminium, étriers, vis double filetage), hors panneaux et main d'œuvre."
    ],
];

$howto_schema = [
    'name'  => 'Comment fixer des panneaux solaires sur tuile canal',
    'steps' => [
        ['name' => 'Repérer les chevrons et détuilage', 'text' => 'Identifiez l\'emplacement des chevrons et retirez délicatement les tuiles de couvert aux points d\'ancrage.'],
        ['name' => 'Ancrage dans la charpente',         'text' => 'Vissez les vis à double filetage dans le chevron (joint EPDM pour l\'étanchéité) ou posez les crochets universels sur le liteau sans percer la tuile.'],
        ['name' => 'Sécurisation des tuiles',           'text' => 'Posez les crochets anti-glissement sur les tuiles canal adjacentes pour éviter leur descente vers la gouttière.'],
        ['name' => 'Montage des rails aluminium',       'text' => 'Fixez et alignez les rails profilés sur les ancrages en ajustant la hauteur pour compenser les irrégularités.'],
        ['name' => 'Verrouillage des panneaux',         'text' => 'Posez les panneaux, raccordez les câbles, reliez la mise à la terre et serrez les étriers finaux et intermédiaires.'],
    ],
];

$_schema = get_schema_data(basename(__FILE__, '.php'));

if (!isset($_schema['faq']) || empty($_schema['faq'])) {
    $_schema['faq'] = $faq_schema;
}

echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $howto_schema);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>

