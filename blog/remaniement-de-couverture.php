<?php
/**
 * remaniement-de-couverture.php
 * Article: Remaniement de Toiture / Couverture
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Remaniement de toiture : prix au m², étapes et conseils de couvreur',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/remaniement%20de%20couverture3.webp',
    'excerpt' => 'Découvrez notre guide complet sur le remaniement de toiture. Apprenez ce qu\'est un remaniement, son prix au m², les étapes clés, et comment choisir un couvreur qualifié pour vos tuiles et ardoises.',
    'date' => '2026-03-10',
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
                <a
                    href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Remaniement de Couverture</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Couverture</span>
            </div>

            <h1>Remaniement de Toiture :<br>
                <span class="h1-accent">Prix au m², Étapes et Choix du Couvreur</span>
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
                        <img src="<?php echo $cat['image'] ?? BASE_URL . 'image/default-cat.webp'; ?>"
                            alt="<?php echo htmlspecialchars($cat['name'] ?? ''); ?>">
                        <span class="sidebar-cat-name"><?php echo htmlspecialchars($cat['name'] ?? ''); ?></span>
                    </a>
                    <?php
                endforeach; ?>
            </div>
        </aside>

        <!-- MAIN CONTENT (center) -->
        <div class="article-container">

            <p class="article-intro">
                La toiture, bouclier essentiel de votre habitation, demande un entretien régulier pour prévenir les
                infiltrations d'eau dévastatrices. Face à l'usure du temps, de la mousse ou du gel, le
                <strong>remaniement de toiture</strong> s'impose comme une solution incontournable et très économique.
                Mais comment différencier un <strong>remaniement de couverture</strong> d'une réfection globale ?
            </p>

            <figure style="margin: 2rem 0; max-width: 100%;">
                <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/remaniement%20de%20couverture1.webp"
                    alt="Artisan couvreur en train d'inspecter et aligner des tuiles romanes sur le pan d'un toit incliné">
                <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">L'inspection minutieuse de chaque rangée de tuiles est le socle d'un remaniement de toiture
                    réussi et durable.</figcaption>
            </figure>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box"
                    style="background-color: #faf3eb; border-left: 4px solid var(--color-primary); padding: 1.5rem 2rem; margin-bottom: 3rem; border-radius: 0 8px 8px 0;">
                    <h2
                        style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1.2rem; text-transform: uppercase; color: var(--color-dark); margin-top: 0; border: none; padding-bottom: 0; margin-bottom: 1rem;">
                        ⚡ En Bref</h2>
                    <ul style="margin-bottom: 0;">
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> Le
                            remaniement de couverture restaure complétement l'étanchéité d'un toit <strong>sans toucher
                                à la charpente</strong> ni acheter 100% de tuiles neuves.</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> L'artisan
                            dépose, trie, élimine les tuiles poreuses, et replace celles saines. Ce "jeu de taquin"
                            géant permet une économie fantastique de matériaux.</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> Le
                            <strong>prix d'un remaniement toiture</strong> est extrêmement accessible (dès 20 €/m²) et
                            prolonge la <strong>durée de vie</strong> du faîtage de 15 à 30 ans.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Qu'est-ce qu'un Remaniement de Toiture ?</li>
                        <li>Prix et Coût d'un Remaniement au m²</li>
                        <li>Quand et Comment Procéder ? Étapes Clés</li>
                        <li>Choisir le bon Couvreur et Optimiser son Projet</li>
                        <li>Questions Fréquentes (FAQ)</li>
                    </ul>
                </div>

                <h2 id="definition">Qu'est-ce qu'un Remaniement de Toiture ?</h2>
                <p>Le <strong>remaniement de toiture</strong> (ou de couverture) est l'art de remettre à neuf
                    l'enveloppe étanche de votre maison tout en gardant sa colonne vertébrale. C'est une intervention
                    conservatrice consistant à découvrir la toiture, inspecter et trier scrupuleusement les éléments de
                    couverture (tuiles, ardoises), remplacer les sections de voliges et de liteaux pourris par
                    l'humidité, et à reposer les tuiles saines (en intercalant quelques tuiles neuves pour combler les
                    tuiles cassées jetées).</p>

                <p>Son objectif est de restaurer la solidité et l'esthétique générale de votre <strong>toiture</strong>
                    sans supporter le coût exorbitant d'une <strong>réfection complète</strong> à neuf des mètres carrés
                    de terre-cuite.</p>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/remaniement%20de%20couverture2.webp"
                        alt="Détail des liteaux et de l'écran de sous-toiture révélés lors de la dépose des anciennes tuiles et gouttières">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">C'est l'occasion idéale de faire vérifier l'état de l'écran de sous-toiture et des
                        gouttières par l'artisan !</figcaption>
                </figure>

                <h3>Remaniement vs Remplacement Complet : Le Duel Économique</h3>
                <ul class="custom-list">
                    <li><strong>Remaniement de couverture :</strong> L'intervention est partielle et chirurgicale. Elle
                        est validée uniquement si la <strong>charpente</strong> porteuse est saine et que la majorité
                        des <strong>tuiles</strong> ne sont pas gélives (poreuses ou éclatées).</li>
                    <li><strong>Remplacement complet :</strong> Inévitable en cas de dégâts majeurs au bois porteur
                        (fléchissement des pannes), ou si plus de 40% des matériaux de <strong>couverture</strong> sont
                        réduits en miettes, menaçant la structure globale du bien immobilier.</li>
                </ul>

                <h2 id="prix">Prix et Coût d'un Remaniement de Toiture au m²</h2>
                <p>Toute la force de ce procédé réside dans son <strong>prix</strong> ultra-compétitif. Étant donné que
                    dans un remaniement standard on recycle 70 à 80 % de vos vieilles tuiles, vous ne payez (presque
                    que) le temps de manutention de votre équipe de couvreurs.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de Couverture</th>
                                <th>Prix de la Main d'œuvre (Dépose, Tri et Repose)</th>
                                <th>Fourchette Globale d'un remaniement (€/m²)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Tuiles mécaniques et plates</strong></td>
                                <td>25 à 45 € / m²</td>
                                <td><strong>20 € à 50 € / m²</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Tuiles canal (gouttière/couvert)</strong></td>
                                <td>20 à 40 € / m²</td>
                                <td><strong>18 € à 45 € / m²</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Ardoises naturelles</strong></td>
                                <td>30 à 60 € / m² <em>(Manipulation délicate)</em></td>
                                <td><strong>35 € à 70 € / m²</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Ardoises synthétiques (fibro)</strong></td>
                                <td>25 à 50 € / m²</td>
                                <td><strong>28 € à 60 € / m²</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>Les 4 Variables qui font exploser les Devis</h3>
                <p>Gardez à l'esprit que ce tarif plancher peut doubler si votre chantier dresse plusieurs obstacles au
                    professionnel de la couverture :</p>
                <ul class="custom-list">
                    <li><strong>La hauteur et l'accessibilité :</strong> Une maison de ville imbriquée à 12 mètres de
                        hauteur avec pose d'échafaudages sur la voie publique requiert un budget sécurité bien plus
                        conséquent.</li>
                    <li>L'état microscopique de la trame : Si en soulevant vos <strong>tuiles ardoises</strong> le
                        charpentier réalise qu'il faut changer de nombreux mètres linéaires de <strong>voliges
                            liteaux</strong> pourris d'eau.</li>
                    <li>La présence dangereuse d'amiante (sur les très vieilles <strong>ardoises synthétiques en
                            Eternit</strong> des années 70).</li>
                    <li>La complexité de la forme du toit (lucarnes, noues, arêtiers, cheminées).</li>
                </ul>

                <h2 id="etapes">Quand et Comment Procéder ? Les Étapes Clés</h2>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/remaniement%20de%20couverture4.webp"
                        alt="Toiture comportant quelques tuiles déplacées suites aux récents vents violents et tempêtes">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Coup de vent, tuile qui glisse, ou dépôt verdâtre ? Le remaniement préventif est
                        l'action la moins chère pour un propriétaire.</figcaption>
                </figure>

                <p>Ne prenez pas le sujet de l'infiltration à la légère. Le remaniement s'impose en urgence dès
                    l'apparition d'auréoles jaunes sur les plafonds rampants de vos combles en placo. C'est le signal
                    d'alarme. L'idéal reste d'observer votre toit au jumelles ! Dès que quelques tuiles s'affaissent ou
                    glissent, c'est le moment "d'appeler le docteur".</p>

                <h3>Les 5 phases méthodiques d'un chantier :</h3>
                <ol class="custom-list">
                    <li><strong>Dépose et Découverte :</strong> Mise à nu de la charpente, mètre par mètre.</li>
                    <li><strong>Le Tri qualitatif :</strong> Le couvreur "sonne" les tuiles au maillet ! Une tuile mate
                        et sourde est gorgée d'eau / poreuse : Elle va à la benne pour vos gravats de jardin.</li>
                    <li><strong>Inspection de la Charpente / Sous-Toiture :</strong> C'est le cœur de l'expertise, les
                        bois fatigués sont purgés et un nouveau litonnage est fixé si besoin.</li>
                    <li><strong>Repose harmonieuse :</strong> Les vieilles tuiles encore vaillantes sont réinstallées
                        précautionneusement, mixées de façon invisible (souvent aux extrémités ou zones cachées) avec
                        les tuiles de complément achetées neuves.</li>
                    <li><strong>Les Finitions (Zinguerie) :</strong> Refonte complète de la maçonnerie du faîtage au
                        mortier, réparation des solins et descentes pluviales.</li>
                </ol>
                <p>En général, une équipe chevronnée abattra cet ouvrage en un délai court de <strong>3 à 6
                        jours</strong> à la belle saison estivale (pour une toiture 2 pans d'environ 100m²).</p>

                <h2 id="choix-pro">Choisir le bon Couvreur et Optimiser son Projet</h2>
                <p>Confier la rénovation de sa <strong>couverture</strong> au charlatan du coin, c'est se condamner au
                    désastre hivernal au niveau de la maconnerie de vos cheminées ou à un faîtage scellé en dépit du bon
                    sens qui s'envolera à la première tempête.</p>

                <blockquote class="article-blockquote">
                    "On me rappelle bien souvent en novembre car un couvreur à la sauvette ne voulait pas s'embêter avec
                    les zincs des noues d'une vieille baraque. C'est l'étanchéité fine autour des velux, des cheminées
                    et des chêneaux qui fait la différence entre un grand professionnel et un poseur de tuile."
                </blockquote>

                <h3>Conseils de sélection d'un artisan local et Aides Financières</h3>
                <p>Un couvreur <strong>spécialiste du "vieux"</strong> et de la réfection se reconnaît à son expérience
                    dans les différentes terre-cuite et à la taille des garanties affichées. Exigez la visibilité des
                    certificats décennaux rattachés à son assurance à jour pour la section (Toiture/Couverture de
                    France). Demandez à observer l'une des réalisations passées dans votre quartier et à inspecter un
                    <strong>devis</strong> clair ! Le devis quantifie obligatoirement : La longueur échafaudée, le
                    diagnostic de vos liteaux et la marque de la tuile de complémentaire.</p>
                <p>Sachez que même si le remaniement seul (qui est de l'entretien pur de sauvegarde) n'ouvre pas le
                    droit entier au bonus colossal "MaPrimeRénov'" (dévolu à l'isolation thermique pure), l'artisan vous
                    fera tout de même disposer d'une TVA largement diminuée (10%) concernant la rénovation protectrice
                    pour un logement ancien !</p>

                <!-- Form/Quote Hook Box -->
                <section class="highlight-box"
                    style="background-color: #f7fcf0; border-left: 4px solid #8cc63f; padding: 25px; margin-top: 30px; margin-bottom: 20px; border-radius: 5px;">
                    <h3 style="color: #6aaa1a; margin-top: 0;">Faites chiffrer votre remaniement sans engagement</h3>
                    <p>Ne laissez pas une charpente pourrir pour 3 tuiles fêlées. Un professionnel sérieux se déplace
                        toujours pour un chiffrage visuel gratuit avant la pose des échafaudages. L'intervention permet
                        souvent d'économiser l'achat de 80% de votre stock !</p>
                    <div style="text-align:center; margin-top:1rem;">
                        <a href="<?php echo BASE_URL; ?>contact" class="cta-button"
                            style="background-color: #8cc63f;">Demander un devis certifié et un diagnostic</a>
                    </div>
                </section>

                <h2 id="faq">Questions Fréquentes (FAQ)</h2>
                <div class="faq-section">
                    <h3>Est-il possible de refaire sa toiture à l'identique ?</h3>
                    <p>Oui, c'est toute la philosophie économique et architecturale d'un <strong>remaniement</strong>.
                        Les ouvriers récupèrent et nettoient toutes vos tuiles historiques, remplaçant celles trop
                        abîmées par des spécimens d'aspect rigoureusement similaire (parfois vieillies artificiellement)
                        sortis de scieries et poteries locales afin de ne pas heurter le regard.</p>

                    <h3>Faut-il une autorisation pour un remaniement de toiture ?</h3>
                    <p>Contrairement aux mythes, un repiquage propre, autrement désigné comme l'acte d'un simple
                        <strong>remaniement de toiture</strong> (qui sous-entend qu'on ne procède à aucune surélévation
                        de pente, aucun percement de verrière, ni aucun changement drastique de matériaux ou couleurs
                        pour la façade) n'oblige quasiment jamais un dépôt fastidieux aux Services Techniques et
                        urbanistiques. Validez néanmoins d'un coup de téléphone poli auprès de votre commune.</p>
                </div> <!-- .faq-section -->

            </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert R&eacute;novation &amp; Artisan RGE</span>
                    <p>Philippe diagnostique les pathologies des bâtiments depuis 20 ans. Il vous accompagne de A à Z :
                        de l'analyse hygrothermique pour l'efficacité des ventilations jusqu'au chiffrage rigoureux de
                        vos Primes Rénov'.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <section class="conclusion-box">
                <h2 style="color: #ffffff;">Le mot de la Fin sur l'entretien du Toit</h2>
                <p style="margin-bottom: 0;">Rappelez-vous une loi immuable dans le bâtiment : L'eau est le pire ennemi
                    de l'humain. Une charpente majestueuse de 100 000 € peut pourrir en 3 hivers à cause de deux
                    "malheureuses tuiles plates" fendues. Le <strong>remaniement de toiture</strong> est une
                    <strong>solution</strong> de bon père de famille très respectueuse de votre portefeuille. Un tri
                    qualitatif fait par un <strong>couvreur</strong> de métier prolonge instantanément l'intégrité de
                    votre <strong>couverture</strong> et l'immobilier entier de vos enfants pour des moindres frais !
                </p>
            </section>

            <!-- Similar Articles -->
            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>"
                                    alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
                            </div>
                            <h4><?php echo htmlspecialchars($art['title'] ?? ''); ?></h4>
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
                    <h3 class="sidebar-title">Derniers articles —
                        <?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>"
                                alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
                            <span><?php echo htmlspecialchars($art['title'] ?? ''); ?></span>
                        </a>
                        <?php
                    endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>"
                                alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
                            <span><?php echo htmlspecialchars($art['title'] ?? ''); ?></span>
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