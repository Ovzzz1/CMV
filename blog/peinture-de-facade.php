<?php
/**
 * peinture-de-facade.php
 * Article: Peinture de façade — prix, types (acrylique, siloxane, pliolite), étapes
 */

$article_meta = [
    'title' => 'Peinture de Façade : Prix 2026, Comparatif (Acrylique, Siloxane) et Étapes',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/peinture-de-facade.webp',
    'excerpt' => 'Acrylique, Siloxane ou Pliolite ? Choisir la mauvaise peinture pour ses murs extérieurs garantit des cloques en 2 ans. Guide des prix 2026 au m² et étapes de pose pro.',
    'date' => '2026-03-05',
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
                <span>Ravalement</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Façade</span>
                <span class="article-tag">Peinture</span>
            </div>

            <h1>Peinture de Façade :<br>
                <span class="h1-accent">Prix 2026, Comparatif et Pièges à éviter</span>
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
                Refaire la peinture de sa façade n'a strictement rien à voir avec repeindre son salon. Dehors, la résine
                doit résister à un cocktail destructeur : UV brûlants, gel hivernal, pollution acide et pluies
                battantes. Poser la première peinture en promotion au camion de bricolage du coin, c'est l'assurance de
                voir ses murs cloquer et peler en moins de deux hivers. Le marché se divise selon 3 grandes formules
                chimiques : <strong>l'Acrylique, la Siloxane et la Pliolite</strong>. Voici le guide définitif pour
                choisir la seule résine tolérée par <em>votre</em> type de mur, les vrais prix au m² appliqués par les
                façadiers en 2026, et les étapes de préparation obligatoires pour un résultat durable 15 ans.
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
                        <li><strong>L'Acrylique :</strong> La moins chère (10-20 €/m² avec pose). Bon rapport
                            qualité/prix, mais réservée aux belles façades sans défauts ni humidité.</li>
                        <li><strong>La Pliolite :</strong> Le bulldozer tout-terrain (15-30 €/m² avec pose). Accroche
                            sur presque tout (même un vieux mur farineux), mais très toxique en pose (solvants forts).
                        </li>
                        <li><strong>La Siloxane :</strong> La Rolls-Royce hybride (20-40 €/m² avec pose). Ultra
                            respirante et autonettoyante. Le <em>must absolu</em> en bord de mer ou zone très humide.
                        </li>
                        <li><strong>La préparation :</strong> Représente 70% du temps de chantier. Peindre sur une
                            mousse ou une fissure non colmatée condamne le ravalement, quelle que soit la qualité de la
                            peinture.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#comparatif-resines">Acrylique, Siloxane ou Pliolite : Le grand match</a></li>
                        <li><a href="#prix-2026">Prix d'un peintre façadier : Fourchette au m² 2026</a></li>
                        <li><a href="#etapes">Les 4 étapes cruciales d'un chantier pro</a></li>
                        <li><a href="#erreurs">Les erreurs qui font cloquer votre façade</a></li>
                        <li><a href="#faq">Foire Aux Questions (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Section 1 : Acrylique vs Siloxane vs Pliolite -->
                <h2 id="comparatif-resines">Acrylique, Siloxane ou Pliolite : Le grand match</h2>
                <p>Oubliez la couleur pour le moment. Ce qui compte en façade, c'est le "liant" chimique qui attachera
                    le pigment à votre crépi.</p>

                <h3>1. L'Acrylique (L'économique et écologique)</h3>
                <p>C'est la peinture à l'eau la plus répandue. Elle est microporeuse (laisse respirer un peu le mur), ne
                    sent quasiment rien et sèche très vite.</p>
                <ul class="custom-list">
                    <li><strong>Idéal pour :</strong> Un bon rafraîchissement pas trop cher sur une façade saine, lisse
                        ou en ancien <a href="<?php echo BASE_URL; ?>crepi-facade"
                            style="text-decoration: underline;">crépi de façade</a> sans aucun problème d'humidité.</li>
                    <li><strong>Le point faible :</strong> N'ayant qu'un faible pouvoir couvrant sur les défauts
                        profonds, elle n'est pas recommandée pour les murs crépis très structurés ou soumis à de fortes
                        intempéries.</li>
                </ul>

                <h3>2. La Pliolite et l'Hydro-Pliolite (L'armure d'accroche)</h3>
                <p>C'est une résine élastomère (souvent à base de solvants pétroliers). C'est la peinture favorite des
                    vieux peintres pour les chantiers difficiles, car elle fond (micro-fusion) avec le support
                    d'origine.</p>
                <ul class="custom-list">
                    <li><strong>Idéal pour :</strong> Les murs anciens, poreux, poudreux ou encrassés. Elle résiste
                        magnifiquement bien aux UV et au gel permanent.</li>
                    <li><strong>Le point faible :</strong> Odeur épouvantable (solvantée) et nettoyage des outils au
                        White Spirit. Heureusement, la nouvelle génération "Hydro-pliolite" (à l'eau) gagne des parts de
                        marché en conservant la même accroche sans les solvants toxiques.</li>
                </ul>

                <h3>3. La Siloxane (Le nec plus ultra moderne)</h3>
                <p>C'est une résine modifiée avec du silicone. C'est le Graal de la peinture extérieure. Elle coche
                    absolument toutes les cases physico-chimiques.</p>
                <ul class="custom-list">
                    <li><strong>Idéal pour :</strong> Les lieux extrêmes. Bord de mer (sel), forêts (mousses) ou zones
                        ultra humides. Son effet perlant (hydrofuge) rend la façade autonettoyante à chaque pluie tout
                        en la laissant transpirer (très perspirante).</li>
                    <li><strong>Le point faible :</strong> Son prix d'achat au litre, supérieur de 30 à 50% par rapport
                        à une acrylique classique.</li>
                </ul>

                <!-- Section 2 : Prix 2026 -->
                <h2 id="prix-2026">Prix d'un peintre façadier : Fourchette au m² 2026</h2>
                <p>Faire peindre sa façade coûte évidemment plus cher que d'acheter le bidon chez Castorama. Le prix
                    facturé par un artisan inclut non seulement la peinture, mais surtout <strong>l'échafaudage, le
                        nettoyage haute pression, et la main d'œuvre de préparation</strong>.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de Peinture</th>
                                <th>Prix du produit seul (DIY) / m²</th>
                                <th>Coût global (Fourniture + Pose par Artisan) / m²</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Peinture Acrylique Extérieure</td>
                                <td>1 € à 3 €</td>
                                <td><strong>15 € à 25 €</strong></td>
                            </tr>
                            <tr>
                                <td>Peinture Pliolite / Hydro-Pliolite</td>
                                <td>3 € à 6 €</td>
                                <td><strong>20 € à 35 €</strong></td>
                            </tr>
                            <tr>
                                <td>Peinture Siloxane (Haut de gamme)</td>
                                <td>4 € à 8 €</td>
                                <td><strong>25 € à 45 €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <blockquote class="article-blockquote">
                    <strong>Avis du pro :</strong> Si un maçon vous propose de repeindre votre maison à 10€ le mètre
                    carré "tout compris", fuyez. À ce prix, il vient avec un rouleau et de la peinture premier prix, en
                    sautant l'étape du fongicide et de l'impression. Résultat : ça écaillera au premier été. Le prix
                    d'un vrai ravalement peinture tourne autour de 30€/m².
                </blockquote>

                <!-- Section 3 : Les Etapes -->
                <h2 id="etapes">Les 4 étapes cruciales d'un chantier pro</h2>
                <p>Peindre une façade prend 3 jours, la préparer en prend 7. L'adhérence d'une peinture dépend à 100% du
                    support sur lequel elle repose.</p>

                <ol>
                    <li><strong>Le Nettoyage profond :</strong> Un véritable <a
                            href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade"
                            style="text-decoration: underline;">nettoyage et démoussage de façade fait dans les règles
                            de l'art</a> est le prérequis avant de peindre. Un coup de Karcher n'est pas suffisant. Si
                        des mousses sont présentes (traces vertes/rouges), l'artisan applique un fongicide biocide qu'il
                        laisse agir pour tuer les racines microscopiques enfouies dans le crépi. Sans cela, elles
                        pousseront sous la peinture propre !</li>
                    <li><strong>Les Réparations (Rebouchage) :</strong> Les fissures (même millimétriques) sont ouvertes
                        à la spatule ("ouvertes en V") pour être bourrées avec un mastic élastomère acrylique spécial
                        façade. C'est l'étanchéité de base.</li>
                    <li><strong>Le Fixateur de fond (Primaires d'accroche) :</strong> Si vous passez votre main sur le
                        mur sec et qu'elle ressort blanche (le mur "farine"), l'application d'un fixateur pénétrant est
                        obligatoire. Sans lui, les rouleaux de peinture vont juste arracher la poudre du mur.</li>
                    <li><strong>L'Application finale (2 couches croisées) :</strong> Sur un échafaudage sécurisé,
                        l'artisan déroule la peinture de haut en bas, en croisant rapidement pour éviter les marques de
                        reprises. Il faut travailler hors d'une journée trop ensoleillée (température entre 15°C et
                        22°C) pour empêcher un séchage trop rapide du solvant.</li>
                </ol>

                <!-- Section 4 : Erreurs -->
                <h2 id="erreurs">Les erreurs qui font cloquer votre façade</h2>
                <p>Outre l'application sur un mur sâle ou humide, l'erreur chimique majeure des particuliers est
                    "l'incompatibilité des couches".</p>

                <ul class="custom-list">
                    <li><strong>L'erreur plastique :</strong> Peindre avec une grosse peinture pliolite filmogène très
                        fermée par-dessus un mur ancien en pierre ou en pisé. L'humidité du sol va remonter dans le mur,
                        être bloquée par la peinture, et faire exploser la façade en créant d'immenses cloques bombées.
                        (Rappel : sur la pierre, il faut du lourdement perspirant : Chaux ou Siloxane).</li>
                    <li><strong>Le syndrome Zébra :</strong> Peindre en plein soleil de juillet à 14h. La peinture cuit
                        sur le rouleau avant de pénétrer le crépi, créant des traces de rouleau zébrées irrécupérables
                        en lumière rasante.</li>
                </ul>

                <!-- Section 5 : FAQ -->
                <h2 id="faq">Foire Aux Questions (FAQ)</h2>

                <h3>Dois-je déclarer en Mairie si je repeins de la même couleur ?</h3>
                <p>Oui ! Tout ravalement (même à l'identique) nécessite le dépôt d'une <strong>Déclaration Préalable de
                        Travaux (DP)</strong> en mairie. Le service d'urbanisme profite de ces rénovations (qui ont lieu
                    tous les 15 ans) pour s'assurer que vous respectez le droit de l'urbanisme en vigueur en 2026
                    (certaines couleurs, jadis autorisées, peuvent être abolies par un nouveau PLU).</p>

                <h3>Peut-on repeindre au pistolet Airless ?</h3>
                <p>Oui, l'Airless est fantastique pour les crépis très jetés (Tyrolienne). Cependant la perte au
                    brouillard peut atteindre 25%. De plus, le bâchage intégral de la maison (fenêtres, gouttières, sol)
                    doit être maniaque. C'est pour cela qu'un peintre au rouleau passe beaucoup plus de temps à "poser",
                    mais ne perd pas la moitié de sa journée à scotcher la maison et les voitures des voisins.</p>

                <h3>La peinture Thermique isolante, ça marche ?</h3>
                <p>Il existe de nouvelles peintures "réflectives" (Cool Roof) thermiques ou la fameuse <a
                        href="<?php echo BASE_URL; ?>peinture-isolante-facade"
                        style="text-decoration: underline;">peinture isolante pour façade</a> souvent blanche, contenant
                    des microbilles de céramique qui repoussent les UV pour abaisser la température du mur l'été. C'est
                    efficace contre la surchauffe solaire (gain de qq degrés), mais <strong>cela ne remplace en rien une
                        véritable <a href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite"
                            style="text-decoration: underline;">Isolation Thermique par l'Extérieur (ITE)</a> de 15cm
                        pour l'hiver</strong>. Le même principe appliqué à la toiture correspond à la <a href="https://www.cemarenov.fr/peinture-thermique-toiture">peinture thermique réfléchissante pour toiture</a>.</p>

                <h3>Faut-il nettoyer la façade avant de peindre ?</h3>
                <p>Oui, c'est une étape non négociable. Peindre sur une façade sale, mousseuse ou écaillée condamne le travail en moins d'un an. Notre guide sur le <a href="https://www.cemarenov.fr/nettoyage-facade-javel">nettoyage façade à la javel</a> explique les protocoles par type de support avant toute peinture.</p>

                <h3>Comment planifier un chantier de peinture façade dans le cadre d'une rénovation globale ?</h3>
                <p>La peinture arrive en dernier — après les reprises de fissures, l'éventuelle ITE et le démoussage. Pour séquencer l'ensemble des travaux, notre <a href="https://www.cemarenov.fr/travaux-planning-ma-gestion-renovation-fr">outil de planning de gestion de rénovation</a> aide à organiser chaque étape et suivre les délais artisans.</p>

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
                    Pour que votre chantier ne se termine pas en déception de peinture écaillée en 24 mois, la
                    préparation (anti-mousse, rebouchage en V, fixateur) est reine. Si votre façade et votre
                    porte-monnaie le permettent, budgétez 35 €/m² pour une <strong>peinture Siloxane posée par un
                        artisan </strong> : c'est le gilet pare-balles de la maison (autonettoyant, étanche à l'eau mais
                    respirant pour la vapeur). Quelle que soit la teinte choisie, passez impérativement par le guichet
                    de votre Mairie avant l'installation du premier échafaudage !
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir des devis détaillés (Peintres
                    Façadiers)</a>
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