<?php
/**
 * travaux-planning-ma-gestion-renovation-fr.php
 * Article: Planning de travaux de rénovation : Ordre des artisans et Outils
 */

$article_meta = [
    'title' => 'travaux planning ma-gestion-renovation.fr',
    'category' => 'travaux',
    'image' => 'https://www.cemarenov.fr/image/travaux planning ma-gestion-renovation.fr.webp',
    'excerpt' => 'Dans quel ordre faire intervenir les artisans ? Quel délai de séchage prévoir ? Découvrez comment monter un vrai rétroplanning de chantier et les outils pour le suivre.',
    'date' => '2026-03-17',
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
                <span>Gestion de chantier</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Organisation</span>
                <span class="article-tag">Planning</span>
            </div>

            <h1>travaux planning ma-gestion-renovation.fr</h1>

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
                Ton chantier va prendre du retard. C'est une certitude dans le bâtiment. Mais entre prendre deux
                semaines de retard à cause d'une livraison de carrelage, et perdre six mois parce que le plaquiste est
                venu avant l'électricien, il y a une différence fondamentale. Monter un planning de travaux ne consiste
                pas juste à aligner des dates sur un calendrier. C'est comprendre l'interdépendance des métiers : qui
                bloque qui ? Quel matériau doit sécher avant de poser le suivant ? Faisons le point sur le vrai ordre
                chronologique d'un chantier et les solutions de suivi, du tableur Excel aux plateformes dédiées.
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
                        <li><strong>La règle absolue :</strong> Le réseau (gaines, tuyaux) passe toujours avant
                            l'habillage (cloisons, placo).</li>
                        <li><strong>Le piège n°1 :</strong> Oublier d'intégrer les temps de séchage incompressibles
                            (chape, plâtre, enduit) dans le rétroplanning.</li>
                        <li><strong>L'outil :</strong> Un simple diagramme de Gantt suffit pour une petite pièce. Pour
                            une rénovation globale, passez par un outil de coordination de travaux professionnel.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire de ce guide</div>
                    <ul>
                        <li>1. L'ordre chronologique intouchable : quel artisan intervient
                                quand ?</li>
                        <li>2. Le piège invisible du planning : les temps de séchage</li>
                        <li>3. Le secret des pros : planifiez les matériaux, pas juste les
                                hommes</li>
                        <li>4. Les outils de suivi : ma-gestion-renovation.fr et tableurs
                        </li>
                        <li>5. FAQ : Organisation et marge d'erreur</li>
                    </ul>
                </div>

                <h2 id="ordre-artisans">1. L'ordre chronologique intouchable : quel artisan intervient quand ?</h2>
                <p>
                    Dans le bâtiment, les étapes s'enchaînent selon une logique mécanique. Si vous inversez deux lots,
                    vous paierez un artisan pour défaire le travail du précédent. Voici l'ordre standard d'une
                    rénovation lourde.
                </p>

                <div class="table-responsive">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Étape du chantier</th>
                                <th>Corps d'état (Artisan)</th>
                                <th>Ce qu'il fait concrètement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>1. Démolition & Gros Œuvre</strong></td>
                                <td>Maçon / Charpentier</td>
                                <td>Casse les murs porteurs, pose les IPN, coule la dalle béton, modifie la charpente.
                                </td>
                            </tr>
                            <tr>
                                <td><strong>2. Réseaux (1er passage)</strong></td>
                                <td>Plombier / Électricien</td>
                                <td>Tire les gaines électriques, les tuyaux PER/Multicouche et les évacuations PVC dans
                                    la dalle ou les murs bruts.</td>
                            </tr>
                            <tr>
                                <td><strong>3. Menuiseries extérieures</strong></td>
                                <td>Menuisier</td>
                                <td>Pose les nouvelles fenêtres et portes (le bâtiment est mis "hors d'eau / hors
                                    d'air").</td>
                            </tr>
                            <tr>
                                <td><strong>4. Habillage & Isolation</strong></td>
                                <td>Plaquiste</td>
                                <td>Pose les rails, l'<a href="<?php echo BASE_URL; ?>isolation-thermique-interieur-iti" style="text-decoration: underline;">isolant</a>, les plaques de plâtre (Placo) par-dessus les gaines, et
                                    fait les bandes d'enduit.</td>
                            </tr>
                            <tr>
                                <td><strong>5. Chape (si sol refait)</strong></td>
                                <td>Chapiste / Carreleur</td>
                                <td>Coule la chape de finition pour aplanir le sol avant le revêtement.</td>
                            </tr>
                            <tr>
                                <td><strong>6. Finitions sols et murs</strong></td>
                                <td>Peintre / Carreleur</td>
                                <td>Ponce, peint les murs, pose le carrelage ou le parquet.</td>
                            </tr>
                            <tr>
                                <td><strong>7. Appareillage (2ème passage)</strong></td>
                                <td>Plombier / Électricien</td>
                                <td>Pose les prises, les interrupteurs, installe les WC, les vasques et les radiateurs.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <blockquote class="article-blockquote">
                    <strong>L'avis terrain de l'expert :</strong> Sur un chantier de pavillon neuf l'an dernier, le
                    client (qui gérait lui-même) avait fait venir les menuisiers avant la fin des enduits intérieurs de
                    maçonnerie. Résultat : l'humidité colossale dégagée par les tonnes d'enduit frais a fait gonfler et
                    bouger les huisseries en bois des fenêtres toutes neuves. L'étanchéité était morte. Le bon ordre de
                    pose, ça se respecte.
                </blockquote>

                <h2 id="piege-sechage">2. Le piège invisible du planning : les temps de séchage</h2>
                <p>
                    C'est l'erreur numéro un des particuliers qui font leur rétroplanning eux-mêmes. Ils collent
                    l'intervention du chapiste le lundi, et l'intervention du poseur de parquet le mercredi de la même
                    semaine. Physiquement, c'est impossible. Dans le bâtiment, les matériaux liés à l'eau imposent des
                    temps de repos absolus :
                </p>
                <ul class="custom-list">
                    <li><strong>Dalle béton :</strong> 21 à 28 jours de séchage avant de pouvoir monter des murs lourds
                        dessus.</li>
                    <li><strong>Chape de ciment (pour sol) :</strong> Environ 1 à 2 semaines de séchage par centimètre
                        d'épaisseur. Ne posez <em>jamais</em> de bois sur une chape qui contient plus de 2,5 %
                        d'humidité résiduelle.</li>
                    <li><strong>Bandes de placo :</strong> 24 à 48 heures entre chaque passe d'enduit. Le peintre ne
                        peut pas poncer tant que ce n'est pas blanc et dur.</li>
                </ul>

                <blockquote class="article-blockquote" style="border-left-color: #d9534f;">
                    <strong>Le cas du parquet qui gonfle :</strong> J'ai dû faire déposer 40 m² de parquet contrecollé
                    l'hiver dernier. Le client n'avait pas attendu que sa chape sèche. Il avait calculé son planning
                    "sur le papier". Six mois plus tard, le bois avait pompé l'humidité du sol, les lames se
                    chevauchaient. Un hygromètre à carbure (l'outil des pros) coûte cher, mais il évite de bousiller 3
                    000 € de parquet.
                </blockquote>

                <h2 id="secret-livraisons">3. Le secret des pros : planifiez les matériaux, pas juste les hommes</h2>
                <p>
                    Un plaquiste qui arrive sur le chantier un mardi matin et qui trouve le dépôt vide va repartir. Et
                    il vous facturera son déplacement. Votre rétroplanning doit comporter deux lignes distinctes par
                    étape : <strong>l'intervention de l'artisan</strong> ET <strong>la date de livraison des matériaux
                        associés</strong>.
                </p>
                <p>
                    En 2026, les délais d'approvisionnement sont tendus. Une menuiserie sur-mesure (fenêtre alu couleur)
                    demande souvent 6 à 8 semaines de fabrication usine. Un carrelage italien spécifique peut demander 4
                    semaines de transport. Commandez ces éléments critiques dès la signature des devis. Le chantier ne
                    démarre pas tant que la date de livraison du gros matériel n'est pas confirmée par le fournisseur.
                </p>

                <h2 id="outils-planning">4. Les outils de suivi : ma-gestion-renovation.fr et tableurs</h2>
                <p>
                    Maintenir ces plannings en tête ou sur un cahier devient impossible dès que vous dépassez deux
                    artisans. Deux écoles s'affrontent pour coordonner un chantier.
                </p>

                <h3>Le diagramme de Gantt (Excel ou Google Sheets)</h3>
                <p>
                    C'est l'outil universel. Vous listez les tâches en colonne de gauche, et les jours de l'année en
                    ligne du haut. Vous coloriez les cases pour chaque artisan. L'avantage : c'est gratuit.
                    L'inconvénient : c'est statique. Si le plombier décale de 3 jours, vous devez recalculer
                    manuellement le décalage du plaquiste, du carreleur et du peintre.
                </p>

                <h3>Les solutions dédiées (type ma-gestion-renovation.fr)</h3>
                <p>
                    Pour des rénovations lourdes (maison complète, gros appartement), passer par une plateforme
                    centralisée comme <strong>ma-gestion-renovation.fr</strong> ou un logiciel de maîtrise d'œuvre prend
                    tout son sens.
                </p>
                <p>
                    Ces outils centralisent l'ensemble des données du chantier. Au-delà du simple calendrier, ils
                    permettent de lier les devis validés aux étapes du projet, de suivre le budget dépensé en temps réel
                    par rapport au prévisionnel, et surtout d'adapter les tâches automatiquement. Si une étape prend du
                    retard, tout le reste du planning s'ajuste, vous donnant une vision claire de la nouvelle date de
                    livraison (réception de chantier). C'est le niveau d'organisation minimum exigé aujourd'hui pour ne
                    pas perdre le contrôle de ses finances. 
                </p>

                <h2 id="faq">5. FAQ : Organisation et marge d'erreur</h2>

                <h3>Qui doit faire le planning des travaux ?</h3>
                <p>Si vous engagez un maître d'œuvre ou un architecte, c'est son travail (il vous facture pour ça). Si
                    vous passez en direct avec une "entreprise générale de bâtiment", elle vous fournit le planning
                    complet. Si vous embauchez vous-même des artisans séparés (lots séparés), c'est <em>vous</em> le
                    coordinateur. C'est à vous de les appeler pour caler leurs agendas respectifs.</p>

                <h3>Quelle marge de retard faut-il prévoir dans un planning ?</h3>
                <p>Prévoyez systématiquement <strong>15 à 20 % de temps additionnel</strong> (le fameux coefficient de
                    foisonnement). Si l'accumulation de toutes les tâches donne 100 jours de travaux, annoncez à votre
                    banque ou à votre agence de location que le chantier durera 120 jours. Une intempérie pour le maçon,
                    un artisan malade, une pièce manquante dans une livraison... le chantier parfait n'existe pas.</p>

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
                <h3>Ne subissez plus votre chantier</h3>
                <p>
                    Un planning maîtrisé, c'est la garantie d'un budget respecté. Vous avez le projet en tête mais vous
                    avez besoin d'aide pour évaluer les coûts de chaque lot avant de planifier ?
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Chiffrer mon projet de rénovation</a>
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