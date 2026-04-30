<?php
/**
 * dessous-de-toit.php
 * Article: Dessous de toit — Sous-face, cache-moineaux, matériaux et pose
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Dessous de toit : sous-face, cache-moineaux, matériaux et pose',
    'category' => 'travaux',
    'image' => 'https://www.cemarenov.fr/image/dessous-de-toit.webp',
    'excerpt' => 'Sous-face PVC, alu ou bois, cache-moineaux, ventilation DTU 40.35 : prix au m², pose et erreurs à éviter pour un habillage de dessous de toit durable.',
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
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Dessous de toit</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Habillage</span>
            </div>

            <h1>Dessous de toit :<br>
                <span class="h1-accent">Sous-face, Cache-moineaux, Matériaux et Pose</span>
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
                Un dessous de toit mal habillé laisse passer l'humidité, les oiseaux et finit par faire moisir les
                combles. Sous-face, cache-moineaux ou lambris PVC : on va clarifier les termes et voir ce qu'il faut
                vraiment poser pour que ça dure. <strong>Ce qui suit, c'est le détail technique qu'on discute sur
                    chantier, pas le blabla des fiches produits.</strong>
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Sous-face</strong> = habillage horizontal sous le débord ; <strong>bandeau de
                                rive</strong> = partie verticale contre la façade ; <strong>cache-moineaux</strong> =
                            grilles ventilées anti-oiseaux.</li>
                        <li><strong>PVC alvéolaire :</strong> 7-17 €/m², zéro entretien, 20-30 ans. <strong>Alu laqué
                                :</strong> 20-40 €/m², 40-50 ans, premium.</li>
                        <li><strong>Ventilation obligatoire</strong> DTU 40.35 : 1 cm²/m linéaire minimum. Sans grilles,
                            condensation piégée et bois qui pourrit.</li>
                        <li><strong>Budget clé en main</strong> maison 100 m² : 1 500-4 000 € selon matériau et
                            finition.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#definition">Comment s'appelle le dessous du toit ?</a></li>
                        <li><a href="#pourquoi">Pourquoi habiller le dessous de toit ?</a></li>
                        <li><a href="#materiaux">Les matériaux pour habiller un dessous de toit</a></li>
                        <li><a href="#prix">Prix d'un habillage de dessous de toit</a></li>
                        <li><a href="#pose">Comment poser un dessous de toit soi-même</a></li>
                        <li><a href="#sous-toiture">Est-ce que la sous-toiture est obligatoire ?</a></li>
                        <li><a href="#faq">FAQ</a></li>
                    </ul>
                </div>

                <!-- Section : Définition -->
                <h2 id="definition">Comment s'appelle le dessous du toit ?</h2>
                <p>Le terme "dessous de toit" désigne l'espace visible sous le débord de toiture, là où les chevrons de
                    la charpente dépassent au-delà des murs extérieurs. On appelle cette partie
                    <strong>sous-face</strong> quand elle est horizontale, <strong>bandeau de rive</strong> quand elle
                    est verticale (contre la façade), et <strong>cache-moineaux</strong> quand elle intègre des grilles
                    pour laisser passer l'air tout en bloquant les oiseaux et rongeurs.</p>
                <p>Attention à la confusion courante : le lambris sous-toiture est l'habillage esthétique et protecteur
                    posé en dessous des chevrons, tandis que la sous-toiture (écran HPV ou lattage) est la couche
                    étanche placée au-dessus des chevrons, directement sous les tuiles ou ardoises. La sous-toiture HPV
                    est obligatoire en neuf ou rénovation lourde (RT2012/RE2020), l'habillage dessous relève du DTU
                    40.35 pour protection et ventilation. Sans les deux, humidité garantie dans les combles.</p>

                <!-- Section : Pourquoi -->
                <h2 id="pourquoi">Pourquoi habiller le dessous de toit ?</h2>
                <p>Un débord de toit nu accumule poussières, feuilles mortes et nids d'oiseaux. L'eau de pluie stagne,
                    la condensation se forme en hiver, les moisissures remontent dans les combles. L'habillage protège
                    les chevrons en bois des intempéries, empêche l'intrusion de nuisibles (ce qui vous évitera de
                    chercher en urgence <a href="<?php echo BASE_URL; ?>se-debarrasser-des-fouines"
                        style="text-decoration: underline;">comment vous débarrasser des fouines et autres rongeurs</a>
                    une fois installés) et assure une ventilation obligatoire du rampant de toiture (le DTU 40.35 exige
                    1 cm² d'ouverture par mètre linéaire).</p>
                <p>Sans grilles de ventilation intégrées au cache-moineaux, l'air chaud des combles ne s'évacue pas.
                    Résultat : humidité piégée, bois qui pourrit de l'intérieur. C'est le premier point qu'on vérifie
                    sur un diagnostic toiture.</p>

                <blockquote class="article-blockquote">
                    Sur un chantier de rénovation de combles, le propriétaire avait fait refaire la toiture mais laissé
                    les trous originaux sous l'avant-toit sans cache-moineaux. Résultat au printemps suivant : nids de
                    moineaux partout, fientes acides qui attaquaient le bois des chevrons, et premières traces de
                    pourriture en bas du rampant. On a dû ouvrir une partie du faux-plafond pour inspecter, poser des
                    cache-moineaux grillagés avec ventilation, et appliquer un <a
                        href="<?php echo BASE_URL; ?>traitement-curatif-charpente"
                        style="text-decoration: underline;">traitement curatif de charpente</a> de choc sur les zones
                    endommagées. Une demi-journée de boulot évitable avec un habillage complet dès le départ.
                </blockquote>

                <!-- Section : Matériaux -->
                <h2 id="materiaux">Les matériaux pour habiller un dessous de toit</h2>
                <p>Le choix du matériau dépend de la région, du budget et du niveau d'exposition. Chaque option a ses
                    contraintes de pose et d'entretien.</p>

                <h3>PVC alvéolaire : le choix économique et léger</h3>
                <p>Les lames PVC alvéolaire (épaisseur 10-20 mm) se clipsent facilement sur rail porteur. Prix : 7 à 17
                    €/m², pose rapide même en DIY (clips inox fournis). Avantage : aucune peinture, résistance aux UV,
                    poids plume. Inconvénient : déformation possible en plein soleil du sud, couleur qui jaunit avec le
                    temps. Idéal pour maison secondaire ou budget serré.</p>

                <h3>Aluminium laqué : la durabilité premium</h3>
                <p>Lames alu extrudées ou pliées, laquées polyester (garantie 30-40 ans). Prix : 20 à 40 €/m², fixation
                    par clips quart de tour sans vis apparente (systèmes Nicoll DALALU ou BELRIV). Résiste au gel, aux
                    UV, aux chocs. Parfait pour façade exposée ou région humide. La pose demande du niveau : cales de
                    compensation (3 mm) sous les chevrons pour éviter les ponts thermiques.</p>

                <h3>Bois traité : l'esthétique traditionnelle</h3>
                <p>Douglas autoclave classe 3 ou composite bois-plastique. Prix : 15 à 30 €/m², aspect chaleureux qui
                    s'intègre aux toitures anciennes. Entretien obligatoire : lasure tous les 5 ans, sinon pourriture
                    rapide en zone pluvieuse. Réservé aux intérieurs protégés ou façades abritées.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Matériau</th>
                                <th>Prix m² HT</th>
                                <th>Durée de vie</th>
                                <th>Fixation</th>
                                <th>Ventilation incluse</th>
                                <th>Entretien</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>PVC alvéolaire</strong></td>
                                <td>7-17 €</td>
                                <td>20-30 ans</td>
                                <td>Clips plastiques</td>
                                <td>Oui (grilles)</td>
                                <td>Aucun</td>
                            </tr>
                            <tr>
                                <td><strong>Alu laqué</strong></td>
                                <td>20-40 €</td>
                                <td>40-50 ans</td>
                                <td>Clips ¼ tour inox</td>
                                <td>Oui (intégrée)</td>
                                <td>Aucun</td>
                            </tr>
                            <tr>
                                <td><strong>Bois autoclave</strong></td>
                                <td>15-30 €</td>
                                <td>15-25 ans</td>
                                <td>Clous/vis inox</td>
                                <td>À ajouter</td>
                                <td>Lasure 5 ans</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section : Prix -->
                <h2 id="prix">Prix d'un habillage de dessous de toit</h2>
                <p>Le coût se calcule au m² de surface horizontale (longueur x débord moyen). Pour une maison de 100 m²
                    avec 50 cm de débord, comptez environ 50 m² à habiller.</p>
                <p><strong>Matériaux seuls :</strong> PVC 350-850 €, alu 1 000-2 000 €, bois 750-1 500 € (hors
                    accessoires : clips 5 €/boîte de 150, profil finition 10 €/m).</p>
                <p><strong>Pose par pro :</strong> 20 à 45 €/m² (main d'œuvre + échafaudage), soit 1 000 à 2 250 € pour
                    50 m². Total clé en main : <strong>1 500 à 4 000 €</strong> selon finition.</p>
                <p><strong>Aides :</strong> MaPrimeRénov' possible si les travaux sont couplés à une <a
                        href="<?php echo BASE_URL; ?>isolation-des-combles-perdus"
                        style="text-decoration: underline;">isolation des combles perdus</a> (ou éligible à l'éco-PTZ
                    dans le cadre d'un <a href="<?php echo BASE_URL; ?>ravalement-de-facade"
                        style="text-decoration: underline;">ravalement de façade</a> complet). Vérifiez le PLU local
                    pour les zones classées.</p>

                <blockquote class="article-blockquote">
                    Exemple concret : pavillon 100 m², débord 60 cm, PVC clipsé avec grilles ventilées → 450 € matériaux
                    + 1 200 € pose = 1 650 € TTC.
                </blockquote>

                <!-- Section : Pose -->
                <h2 id="pose">Comment poser un dessous de toit soi-même</h2>
                <p>La pose DIY est accessible si le débord ne dépasse pas 80 cm et que vous avez un accès sécurisé
                    (échafaudage).</p>

                <ul class="custom-list">
                    <li><strong>Préparation :</strong> vérifiez que les chevrons sont droits, posez des cales 3 mm si la
                        pente de la façade le demande. Nettoyez les traces de moisissures (antifongique).</li>
                    <li><strong>Rail porteur :</strong> fixez des lattes PVC ou alu sous les chevrons (vis inox 4x40 mm
                        espacées de 40 cm). Niveau laser obligatoire.</li>
                    <li><strong>Lames sous-face :</strong> clips quart de tour ou languettes (pousser jusqu'au clic).
                        Commencez par la rive basse, finissez en haut.</li>
                    <li><strong>Ventilation :</strong> grilles cache-moineaux tous les 2 m linéaires (1 cm²/m
                        obligatoire DTU).</li>
                    <li><strong>Bandeau de rive :</strong> vertical contre la façade, avec joint silicone ou profil
                        goutte d'eau.</li>
                </ul>

                <p><strong>Erreurs fatales :</strong> pas de ventilation = condensation piégée. Clips mal serrés = bruit
                    au vent. Oubli des cales = ponts thermiques + infiltration. Si hauteur supérieure à 3 m ou débord
                    supérieur à 1 m, appelez un pro.</p>

                <!-- Section : Sous-toiture -->
                <h2 id="sous-toiture">Est-ce que la sous-toiture est obligatoire ?</h2>
                <p>Non, la sous-toiture (écran HPV étanche sous tuiles) n'est pas systématiquement obligatoire en
                    rénovation, mais elle est fortement recommandée (la RT2012 exige R ≥ 4,5 m².K/W pour les combles).
                </p>
                <p>Par contre, l'habillage du dessous (sous-face + ventilation) est <strong>obligatoire DTU
                        40.35</strong> pour tout débord supérieur à 30 cm : protection du bois et renouvellement de
                    l'air du rampant. Sans ça, la garantie décennale sera refusée en cas de sinistre lié à l'humidité.
                </p>

                <!-- Section : FAQ -->
                <h2 id="faq">FAQ</h2>

                <h3>Comment s'appelle une pièce située juste sous le toit ?</h3>
                <p>Combles aménagés ou grenier. C'est l'espace habitable sous la pente de toiture, isolé et ventilé.</p>

                <h3>Comment appelle-t-on une pièce sous les toits ?</h3>
                <p>Chambre de bonne ou mansarde. Logement ancien sous la toiture, souvent avec faible hauteur sous
                    plafond.</p>

                <h3>Quel est le prix d'un cache-moineaux au m² ?</h3>
                <p>5-12 €/m² en PVC, 15-25 €/m² en alu. Grilles de ventilation incluses.</p>

                <h3>PVC ou alu en région humide ?</h3>
                <p>Alu sans hésiter : il ne gonfle pas, garantie 40 ans contre corrosion marine. Le PVC peut jaunir et
                    se déformer sous forte exposition.</p>

                <h3>Qu'est-ce qu'une pièce sous les toits ?</h3>
                <p>Les combles habitables, avec isolation, fenêtres de toit (Velux) et accès par escalier fixe.</p>

                <h3>Comment fixer des gouttières sur un bac acier avec dessous-de-toit ?</h3>
                <p>Sur un débord en bac acier isolé, la fixation des gouttières nécessite des crochets adaptés à l'épaisseur du sandwich et des vis auto-perceuses inox. Notre guide <a href="https://www.cemarenov.fr/fixation-gouttiere-sur-bac-acier-isole">fixation gouttière sur bac acier isolé</a> détaille les systèmes de crochetage, les entraxes à respecter et les pièges à éviter sur ce type de support.</p>

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
                    L'habillage du dessous de toit, c'est 80 % prévention et 20 % esthétique. Faites-le bien dès le
                    départ, avec ventilation et fixation pro, et vous n'y touchez plus pendant 30 ans. Le DIY marche
                    pour du PVC simple, mais pour l'alu ou les grandes surfaces, l'échafaudage et les clips précis
                    justifient l'artisan. Vos combles vous diront merci.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un devis habillage toiture</a>
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