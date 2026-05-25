<?php
/**
 * adoucisseur-deau.php
 * Article: Adoucisseur d'eau — Prix, Fonctionnement et Pièges à Éviter
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Adoucisseur d\'eau : Prix, Fonctionnement et Pièges à Éviter',
    'category' => 'maison',
    'image' => 'https://www.cemarenov.fr/image/adoucisseur-deau.webp',
    'excerpt' => 'L\'adoucisseur d\'eau règle le problème du calcaire à la source, mais il a un coût, des contraintes et des impacts sur l\'eau de boisson. Bilan complet et honnête, côté terrain.',
    'date' => '2026-03-05',
    'reading_time' => 12,
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
                <span>Adoucisseur d'eau</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Plomberie</span>
                <span class="article-tag">Traitement de l'eau</span>
            </div>

            <h1>Adoucisseur d'eau : Prix, Fonctionnement<br>
                <span class="h1-accent">et Pièges à Éviter</span>
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
                Un adoucisseur d'eau bien dimensionné règle le problème du calcaire à la source, mais ce n'est ni
                magique ni neutre : ça coûte un certain prix, ça modifie la composition de l'eau et ça demande un
                entretien carré. <strong>Ce qui suit, c'est la version "terrain" de ce que beaucoup de fiches marketing
                    survolent à moitié.</strong>
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        En bref : l'essentiel à retenir
                    </div>
                    <ul>
                        <li>Un adoucisseur à sel fonctionne par échange ionique : il remplace le calcium et le magnésium
                            par du sodium via une résine spécifique.</li>
                        <li>L'investissement complet (matériel + pose) tourne souvent entre <strong>1 200 et 2 500
                                €</strong> pour une maison standard, avec ensuite un coût annuel en sel, eau de
                            régénération et entretien.</li>
                        <li>L'eau adoucie reste potable, mais on déconseille de traiter l'eau de boisson pour certaines
                            personnes (hypertension, nourrissons, régimes sans sel).</li>
                        <li>Un réglage trop bas du TH et un entretien négligé peuvent abîmer la plomberie : le by-pass
                            et le contrôle annuel ne sont pas optionnels.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#calcaire-probleme">1. Pourquoi le calcaire devient un problème à la maison</a>
                        </li>
                        <li><a href="#fonctionnement-adoucisseur">2. Comment fonctionne vraiment un adoucisseur à
                                sel</a></li>
                        <li><a href="#idees-recues">3. Vrai ou Faux : les idées reçues sur l'eau adoucie</a></li>
                        <li><a href="#avantages-inconvenients">4. Les avantages et les inconvénients d'un
                                adoucisseur</a></li>
                        <li><a href="#utile-chez-vous">5. Est-ce que c'est vraiment utile chez vous ?</a></li>
                        <li><a href="#prix-couts">6. Prix d'un adoucisseur et coût d'utilisation réel</a></li>
                    </ul>
                </div>

                <!-- Section 1 -->
                <h2 id="calcaire-probleme">Pourquoi le calcaire devient un problème à la maison</h2>
                <p>La dureté de l'eau se mesure avec le Titre Hydrotimétrique (TH), en degrés français notés °f. En
                    dessous de 15 °f, on parle d'eau peu calcaire, au-dessus de 30 °f, on arrive dans la zone très dure,
                    celle où chauffe-eau et robinets souffrent. À chaque chauffe, le calcaire précipite et se colle sur
                    les résistances, dans les canalisations et les mousseurs, ce qui isole thermiquement les éléments
                    chauffants et fait grimper la consommation d'énergie. Sur les chantiers, on voit régulièrement des
                    <a href="<?php echo BASE_URL; ?>ballon-thermodynamique" style="text-decoration: underline;">ballons
                        thermodynamiques</a> ou électriques à moitié remplis de tartre, avec des résistances noyées dans
                    une croûte blanche aussi dure que du béton.</p>

                <p>Le calcaire laisse aussi des traces sur la peau et le linge. Les gels douche moussent mal, les
                    serviettes restent rêches, la peau tiraille en hiver. Ce sont ces irritations du quotidien qui
                    poussent les gens à regarder du côté des adoucisseurs, parfois avant même d'avoir compris ce qui se
                    passe dans les tuyaux.</p>

                <!-- Section 2 -->
                <h2 id="fonctionnement-adoucisseur">Comment fonctionne vraiment un adoucisseur à sel</h2>
                <p>Un adoucisseur à sel est un appareil de traitement d'eau par échange ionique installé sur l'arrivée
                    principale. L'eau traverse une bouteille remplie de résine cationique, un lit de petites billes
                    chargées positivement qui attirent les ions calcium et magnésium responsables du tartre. En échange,
                    la résine relâche des ions sodium, ce qui transforme une eau dure en eau adoucie, presque dépourvue
                    de calcaire.</p>

                <p>Au bout d'un certain volume d'eau traitée, la résine est saturée. L'appareil lance alors un cycle de
                    régénération. Il aspire une saumure (mélange d'eau et de sel) depuis le bac à sel, fait circuler
                    cette solution dans la bouteille de résine pour décrocher les ions calcium et magnésium, puis envoie
                    le tout à l'égout. Le sel que vous achetez sert uniquement à régénérer la résine, il ne "se verse"
                    pas directement dans l'eau du robinet.</p>

                <p>Sur une installation propre, on ajoute en amont un préfiltre anti-sédiments pour retenir sables et
                    boues du réseau, et en aval un by-pass pour pouvoir isoler l'adoucisseur sans priver la maison d'eau
                    en cas de panne. C'est ce trio (préfiltre, bouteille de résine et bac à sel) qu'on voit à chaque
                    fois dans les locaux techniques des maisons traitées.</p>

                <blockquote class="article-blockquote">
                    Chez un voisin, Marc, l'adoucisseur était là depuis quatre ans. Personne n'avait touché aux
                    réglages, personne n'avait fait de régénération complète ni fait contrôler la résine. Résultat : une
                    eau réglée beaucoup trop douce, sous les 5 °f. À ce niveau, l'eau devient agressive pour les métaux.
                    Les joints de cuivre ont commencé à se faire ronger de l'intérieur. La fuite s'est révélée par une
                    auréole sous l'évier, les dégâts derrière venaient de plusieurs mois de goutte-à-goutte invisible
                    (un cas classique qui finit par imposer <a href="<?php echo BASE_URL; ?>traitement-humidite"
                        style="text-decoration: underline;">un lourd traitement pour évacuer l'humidité incrustée dans
                        les cloisons</a>). Une heure à remplacer les raccords, et une bonne discussion pour remettre le
                    TH de sortie à un niveau raisonnable.
                </blockquote>

                <!-- Section 3 -->
                <h2 id="idees-recues">Vrai ou Faux : les idées reçues sur l'eau adoucie</h2>
                <p>Une partie des recherches sur internet tourne autour des mêmes questions : goût, sel, santé, carence
                    en minéraux. Plutôt que de les laisser en suspens, autant les traiter franchement.</p>

                <p>L'idée que l'eau adoucie aurait un goût salé revient souvent. En réalité, l'adoucisseur ajoute des
                    ions sodium, pas du sel de table complet (chlorure de sodium). La quantité de sodium ajoutée reste
                    très faible par litre et ne donne pas un goût "d'eau de mer". La crainte d'une carence en calcium
                    est du même ordre. L'essentiel du calcium et du magnésium vient des aliments (produits laitiers,
                    légumes, eau minérale spécifique), pas de l'eau de réseau. Par contre, si toute l'eau de boisson du
                    foyer est adoucie, on perd cet apport complémentaire quotidien.</p>

                <p>La question des bactéries est plus sensible. Ce n'est pas l'appareil qui est dangereux, c'est
                    l'entretien négligé. Une résine propre avec des cycles de régénération réguliers et une désinfection
                    annuelle ne pose pas de problème particulier. En revanche, un réseau plein de calcaire crée des
                    zones mortes et rugueuses où la Légionelle adore se loger. Là où le risque devient concret, c'est
                    pour les personnes sensibles. L'eau adoucie charge un peu plus en sodium, ce qui ne convient pas aux
                    personnes en régime strict sans sel, aux nourrissons et aux personnes hypertendues. C'est la raison
                    pour laquelle on conseille toujours de garder un point d'eau non adoucie pour la boisson.</p>

                <!-- Section 4 -->
                <h2 id="avantages-inconvenients">Les avantages et les inconvénients d'un adoucisseur</h2>
                <p>Les sites de fabricants insistent sur les avantages, les pages santé insistent sur les réserves. La
                    réalité se situe entre les deux.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Ce que l'adoucisseur apporte</th>
                                <th>Ce qu'il impose en échange</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Moins de tartre dans la plomberie, les robinets et les appareils</td>
                                <td>Un investissement initial entre 1 200 et 2 500 € pose comprise</td>
                            </tr>
                            <tr>
                                <td>Meilleur rendement du chauffe-eau et de la chaudière</td>
                                <td>De l'eau consommée en plus pour les régénérations (plusieurs m³ par an)</td>
                            </tr>
                            <tr>
                                <td>Diminution de la consommation de lessive, de détartrant et de produits ménagers</td>
                                <td>L'achat régulier de sacs de sel et un peu de manutention</td>
                            </tr>
                            <tr>
                                <td>Confort au quotidien : peau et linge plus doux, pare-douche plus facile à garder
                                    propre</td>
                                <td>Un entretien annuel par un professionnel pour garder la résine et la vanne en bon
                                    état</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>Pour un foyer qui vit dans une zone très calcaire, les bénéfices sur dix ans (électroménager, ballon
                    d'eau chaude, plomberie) compensent largement ces contraintes. Pour un logement en eau à peine dure,
                    le retour sur investissement sera beaucoup plus discutable.</p>

                <!-- Section 5 -->
                <h2 id="utile-chez-vous">Est-ce que c'est vraiment utile chez vous ?</h2>
                <p>Un adoucisseur prend tout son sens quand trois signaux se cumulent : un TH supérieur à 25–30 °f, des
                    équipements de chauffe très sensibles (<a href="<?php echo BASE_URL; ?>pompe-a-chaleur-air-eau"
                        style="text-decoration: underline;">pompe à chaleur air-eau</a>, chaudière condensation,
                    robinetterie haut de gamme) et des occupants qui se plaignent régulièrement du calcaire. Si les
                    mousseurs se bouchent tous les six mois, si le ballon a déjà été détartré au bout de quelques années
                    seulement, le calcul devient vite favorable.</p>

                <p>À l'inverse, dans une zone à 15–20 °f, le problème peut se gérer avec une protection locale :
                    cartouches anti-tartre sur certaines lignes, entretien renforcé du ballon, produits anticalcaire
                    ponctuels. Installer un gros adoucisseur dans ce contexte relève plus du confort que de la
                    nécessité.</p>

                <!-- Section 6 -->
                <h2 id="prix-couts">Prix d'un adoucisseur et coût d'utilisation réel</h2>
                <p>Les prix affichés en gros titres sur les sites de vente couvrent rarement toute la chaîne de
                    dépenses. Un modèle d'entrée de gamme en grande distribution se trouve autour de 500 à 700 €. Ces
                    appareils consomment souvent beaucoup de sel et leurs pièces sont difficiles à remplacer. Les
                    modèles de marques professionnelles (avec vannes Fleck ou Clack associées à des marques comme BWT,
                    Culligan ou Ecowater) se situent plutôt entre 800 et 1 500 € pour une maison individuelle classique.
                </p>

                <p>La pose par un plombier, avec création du by-pass, pose du préfiltre et raccordement à l'évacuation,
                    se facture en général entre 300 et 600 €. Les fabricants proposent parfois une mise en service
                    dédiée, facturée en plus, pour valider la garantie et vérifier les réglages. Pour un foyer de quatre
                    personnes, il faut prévoir ensuite entre 60 et 120 € de sel par an et quelques dizaines d'euros de
                    coût d'eau liée aux régénérations. Un contrat annuel avec un professionnel se situe souvent entre 80
                    et 130 €, selon les régions et la marque installée.</p>

                <p>Sur dix ans, le coût total d'un adoucisseur installé et entretenu se chiffre donc en milliers
                    d'euros. Face à ça, il faut mettre en regard le prix d'un ballon changé prématurément, d'une
                    robinetterie de qualité à remplacer, et les dépenses d'électricité liées à la surconsommation à
                    cause du tartre (un gouffre financier que même l'installation de <a
                        href="<?php echo BASE_URL; ?>panneaux-photovoltaiques"
                        style="text-decoration: underline;">panneaux photovoltaïques</a> aurait du mal à rentabiliser).
                </p>

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
                <h3>L'avis de l'artisan</h3>
                <p>
                    Acheter un adoucisseur premier prix sur internet et le raccorder soi-même, c'est souvent se
                    fabriquer des problèmes à retardement. Les mauvaises soudures, les réglages de dureté faits au
                    hasard et la surconsommation de sel effacent vite l'économie de départ. L'idéal reste d'avoir un
                    diagnostic sérieux de la dureté, un dimensionnement propre et une mise en service réalisée par
                    quelqu'un qui connaît le matériel. Une fois bien calibrée, la machine travaille en silence dans un
                    coin du local technique. Vous l'oubliez, vos tuyaux, eux, voient tout de suite la différence.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un devis plomberie</a>
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