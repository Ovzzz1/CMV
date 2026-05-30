<?php
/**
 * chauffe-eau-thermodynamique-triple-c.php
 * Article: Avis Triple C Hitachi — Guide 2026
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Avis sur le Triple C Hitachi : Le chauffe-eau thermodynamique 3-en-1',
    'category' => 'maison',
    'image' => '/image/chauffe%20eau%20thermodynamique%20triple%20c.webp',
    'excerpt' => 'Un seul compresseur extérieur pour la clim, le chauffage et l\'eau chaude. Le Triple C d\'Hitachi est brillant sur le papier. Voici ce qu\'il faut savoir avant de signer.',
    'date' => '2026-03-05',
    'reading_time' => 5,
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
    <section class="article-hero"
        style="background-image: url('/image/chauffe%20eau%20thermodynamique%20triple%20c.webp');">
        <div class="article-hero-content">
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <a href="<?php echo BASE_URL; ?>maison">Maison</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Chauffe-eau thermodynamique Triple C</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Chauffage</span>
                <span class="article-tag">Climatisation</span>
            </div>

            <h1>Avis et analyse du chauffe-eau thermodynamique Triple C Hitachi R32</h1>

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
                    Mis à jour le 5 mars 2026
                </div>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                    Lecture : 5 min
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
                        <img src="<?php echo $cat['image']; ?>" alt="<?php echo $cat['name']; ?>">
                        <span class="sidebar-cat-name"><?php echo $cat['name']; ?></span>
                    </a>
                    <?php
                endforeach; ?>
            </div>
        </aside>

        <!-- MAIN CONTENT (center) -->
        <div class="article-container">

            <p class="article-intro">
                <strong>Sur le papier, l'idée d'Hitachi est brillante. Un seul moteur extérieur pour gérer la clim, le
                    chauffage et l'eau chaude. Moins de blocs sur les murs, c'est plus propre. Mais confier toute la
                    tuyauterie de la maison à un seul équipement demande de prendre quelques précautions.</strong>
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        En résumé (TL;DR)
                    </div>
                    <ul>
                        <li>Un seul compresseur dehors alimente jusqu'à <strong>4 splits intérieurs</strong> et le
                            ballon d'eau chaude.</li>
                        <li>Le temps de chauffe de l'eau est très rapide, autour de <strong>2 heures</strong>.</li>
                        <li>Le gros risque : si le moteur extérieur tombe en panne, la maison perd le chauffage et l'eau
                            chaude d'un coup.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Au sommaire de ce guide</div>
                    <ul>
                        <li><a href="#concept">1. Le concept : comment fonctionne le Triple C ?</a></li>
                        <li><a href="#performances">2. Chiffres et performances sur le terrain</a></li>
                        <li><a href="#avantages">3. Les vrais avantages au quotidien</a></li>
                        <li><a href="#limites">4. Le piège du système tout-en-un</a></li>
                        <li><a href="#budget">5. Prix et contraintes d'installation</a></li>
                    </ul>
                </div>

                <!-- Section 1 -->
                <h2 id="concept">1. Le concept : comment fonctionne le Triple C ?</h2>
                <p>Le nom Triple C annonce la couleur. Il gère la Climatisation, le Chauffage et le Chauffe-eau.
                    D'habitude, d'un point de vue installation, quand on pose une <a
                        href="<?php echo BASE_URL; ?>pompe-a-chaleur-air-air" style="text-decoration: underline;">pompe
                        à chaleur air-air</a> indépendante et un <a href="<?php echo BASE_URL; ?>ballon-thermodynamique"
                        style="text-decoration: underline;">ballon thermodynamique</a> classique, on est obligé de
                    visser deux gros blocs extérieurs sur le pignon de la maison. Hitachi a simplement regroupé les
                    deux.</p>

                <p>Le système tourne avec un compresseur extérieur multi-splits (un moteur conçu pour alimenter
                    plusieurs diffuseurs dans différentes pièces). Il utilise du R32, le gaz frigorigène standard
                    aujourd'hui, car il pollue moins que les anciennes générations. Ce compresseur envoie l'énergie vers
                    les unités intérieures fixées aux murs et vers le ballon d'eau chaude sanitaire (modèle Yutampo II).
                    Le moteur fait l'aiguillage en direct selon ce que vous lui demandez.</p>

                <!-- Section 2 -->
                <h2 id="performances">2. Chiffres et performances sur le terrain</h2>
                <p>Les chiffres constructeur tiennent la route. Le point fort du système, c'est l'eau chaude.</p>

                <p>Hitachi propose trois puissances de moteurs : <strong>5,3 kW, 7 kW et 9 kW</strong>. Le rendement est
                    excellent. Le COP (coefficient de performance) monte à 4,20. Concrètement, pour 1 kW d'électricité
                    tiré sur votre compteur, la machine recrache 4 kW de chaleur dans la maison.</p>

                <p>Côté ballon, la chauffe est ultra rapide. Le modèle de 190 litres atteint sa température en
                    <strong>2h10</strong> à peine. Le gros modèle de 270 litres demande <strong>2h55</strong>. Beaucoup
                    de chauffe-eaux thermodynamiques classiques mettent quasiment le double de temps.</p>

                <!-- Section 3 -->
                <h2 id="avantages">3. Les vrais avantages au quotidien</h2>
                <p>Le premier gain est visuel. Dans les lotissements neufs ou en copropriété, les règles d'urbanisme sur
                    l'aspect des façades sont strictes. Un seul moteur discret passe beaucoup plus facilement à la
                    mairie (et a le mérite de ne pas gâcher un <a href="<?php echo BASE_URL; ?>ravalement-de-facade"
                        style="text-decoration: underline;">ravalement de façade</a> récent). Ça libère aussi de
                    précieux mètres carrés sur la terrasse.</p>

                <p>Ensuite, l'utilisation est centralisée. Vous pilotez la température du salon, celle des chambres et
                    la relance de l'eau chaude sur la même application smartphone (Hi-Kumo). L'interface regroupe tout,
                    évitant de multiplier les télécommandes.</p>

                <!-- Section 4 -->
                <h2 id="limites">4. Le piège du système tout-en-un</h2>
                <p>Mettre tous ses œufs dans le même panier reste un risque. Si le moteur principal lâche, vous perdez
                    tout.</p>

                <blockquote class="article-blockquote">
                    « Un client m'a appelé un 15 février. Son compresseur extérieur avait grillé suite à une surtension.
                    Résultat : plus de chauffage, et surtout plus d'eau chaude. L'attente pour la pièce de rechange a
                    duré cinq jours. C'est pour ça que je vérifie toujours que la résistance électrique d'appoint du
                    ballon est bien branchée. Ça permet de forcer la chauffe manuellement en cas de panne. »
                </blockquote>

                <p>Le dimensionnement demande aussi une précision absolue. Une maison mal isolée (ou dont l'<a
                        href="<?php echo BASE_URL; ?>isolation-des-combles-perdus"
                        style="text-decoration: underline;">isolation des combles perdus</a> est vieillissante) va tirer
                    toute la puissance du moteur par grand froid. S'il chauffe quatre chambres en plein mois de janvier,
                    il aura du mal à relancer l'eau chaude sanitaire au même moment. Le calcul des déperditions
                    thermiques est obligatoire avant de signer le devis.</p>

                <!-- Section 5 -->
                <h2 id="budget">5. Prix et contraintes d'installation</h2>
                <p>Pour le matériel seul (compresseur 7 kW, ballon 270 litres, deux splits intérieurs), la facture
                    tourne autour de <strong>4 500 € TTC</strong>. Avec main-d'œuvre et fournitures, un chantier complet
                    coûte entre <strong>8 000 € et 10 000 €</strong>. Le prix varie selon la complexité du passage des
                    tuyaux dans les cloisons.</p>

                <p>L'installation ne s'improvise pas. Le frigoriste raccorde un réseau de gaz sous haute pression sur au
                    moins cinq sorties différentes. Un raccord mal préparé, et la fuite est assurée. Confiez le chantier
                    à un artisan <strong>RGE</strong> qui possède son attestation de capacité fluides frigorigènes à
                    jour.</p>

                <div class="table-responsive">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Votre projet</th>
                                <th>Verdict</th>
                                <th>L'avis de chantier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Maison neuve bien isolée</td>
                                <td><strong>✅ Parfait</strong></td>
                                <td>La maison perd très peu de chaleur. Le compresseur gérera chauffage et eau sans
                                    forcer.</td>
                            </tr>
                            <tr>
                                <td>Rénovation (isolation correcte)</td>
                                <td><strong>✅ Très bon choix</strong></td>
                                <td>Idéal pour remplacer vieux radiateurs et cumulus hors d'âge en une seule fois.</td>
                            </tr>
                            <tr>
                                <td>Maison ancienne mal isolée</td>
                                <td><strong>❌ À éviter</strong></td>
                                <td>Le moteur va saturer par grand froid et ne saura pas tout chauffer en même temps.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

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
                <h3>Faut-il l'acheter ?</h3>
                <p>Le Triple C d'Hitachi est une excellente machine qui règle intelligemment le problème des moteurs
                    encombrants. Foncez si votre maison garde bien la chaleur et que la puissance a été calculée par un
                    pro. Dans le cas contraire, exigez un bilan thermique avant toute commande.</p>
                <a href="#devis" class="btn-primary">Obtenir 3 devis locaux et comparer</a>
            </div>

            <!-- Similar Articles -->
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

        <!-- RIGHT SIDEBAR -->
        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles — <?php echo $category['name']; ?></h3>
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