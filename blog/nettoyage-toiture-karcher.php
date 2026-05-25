<?php
/**
 * nettoyage-toiture-karcher.php
 * Article: Nettoyage Toiture au Karcher : Mythes, Dangers et Alternatives Sûres
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Ne nettoyez pas votre titure au karcher! Explication complète',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/Nettoyage%20Toiture%20au%20Karcher1.webp',
    'excerpt' => 'Nettoyage toiture au Karcher : attention danger ! Découvrez pourquoi cette méthode détruit vos tuiles et nos alternatives pour démousser sans risque.',
    'date' => '2026-03-08',
    'reading_time' => 7,
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
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Nettoyage toiture au Karcher</span>
            </nav>
            
            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Entretien</span>
            </div>

            <h1>Nettoyage Toiture au Karcher :<br>
                <span class="h1-accent">Mythes, Dangers et Alternatives</span>
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

    <!-- 3-COLUMN LAYOUT -->
    <div class="article-layout">

        <!-- LEFT SIDEBAR: Other Categories -->
        <aside class="sidebar-left">
            <div class="sidebar-sticky">
                <h3 class="sidebar-title">Nos Univers</h3>
                <?php foreach ($other_cats as $slug => $cat): ?>
                    <a href="<?php echo BASE_URL . $slug; ?>" class="sidebar-cat-card">
                        <img src="<?php echo $cat['image'] ?? BASE_URL . 'image/default-cat.webp'; ?>" alt="<?php echo htmlspecialchars($cat['name'] ?? ''); ?>">
                        <span class="sidebar-cat-name"><?php echo htmlspecialchars($cat['name'] ?? ''); ?></span>
                    </a>
                <?php
endforeach; ?>
            </div>
        </aside>

        <!-- MAIN CONTENT (center) -->
        <div class="article-container">
            
            <p class="article-intro">
                On entend souvent dire qu'un bon coup de nettoyeur haute pression suffit pour remettre une toiture à neuf et éradiquer la mousse. C'est faux. Cette facilité apparente détruit vos tuiles en silence. Le <strong>nettoyage toiture</strong> est une opération technique. Ignorer la nature de votre couverture en balançant 150 bars de pression, c'est s'exposer à de graves infiltrations dès l'hiver suivant. Voyons ensemble comment faire les choses dans les règles de l'art.
            </p>

            <div class="article-content">
                
                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>L'utilisation d'un Karcher (haute pression) est fortement déconseillée</strong> pour la majorité des toitures.</li>
                        <li>La pression détruit la couche protectrice des tuiles, les rendant poreuses et vulnérables au gel.</li>
                        <li>Les couvreurs l'utilisent avec du <strong>matériel spécifique ajusté en basse pression</strong>.</li>
                        <li>Les <strong>traitements anti-mousse et hydrofuges</strong> appliqués au pulvérisateur sont les seules alternatives sûres et durables.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Les Dangers Réels du Karcher pour votre Toiture</li>
                        <li>Utilisation Professionnelle : Pourquoi Eux et Pas Vous ?</li>
                        <li>Les Alternatives Sûres au Nettoyage Haute Pression</li>
                        <li>Choisir les Bons Produits : Anti-Mousse et Hydrofuge</li>
                        <li>Quand et Comment Nettoyer sa Toiture ?</li>
                        <li>Faire Appel à un Pro ou Nettoyer Soi-Même ?</li>
                        <li>Questions Fréquentes (FAQ)</li>
                    </ul>
                </div>

                <h2 id="dangers-karcher">Les Dangers Réels du Karcher pour votre Toiture</h2>
                <figure>
                    <img src="<?php echo BASE_URL; ?>image/Nettoyage%20Toiture%20au%20Karcher1.webp" alt="Toiture avec tuiles endommagées par un nettoyage haute pression.">
                    <figcaption>Tuiles fragilisées ou écaillées après un décapage haute pression.</figcaption>
                </figure>
                <p>Le <strong>nettoyage toiture au Karcher</strong> est risqué. Les couvreurs le déconseillent presque systématiquement aux particuliers. Les dégâts ne sont pas seulement esthétiques. L'eau sous pression s'attaque à la structure même du matériau.</p>

                <h3>Dégradation irréversible : porosité et infiltrations</h3>
                <p>Une <a href="<?php echo BASE_URL; ?>demoussage-tuiles-terre-cuite" style="text-decoration: underline;">tuile en <strong>terre cuite</strong></a> ou en béton possède une finition lisse qui fait glisser la pluie. Le jet d'un <strong>nettoyeur haute pression</strong> agit comme une sableuse : il décape cette pellicule naturelle. Les <strong>tuiles poreuses</strong> absorbent alors l'eau de pluie. Dès les premières gelées, cette eau prisonnière va geler, gonfler, et créer des micro-fissures invisibles à l'œil nu. Le <strong>karcher déconseillé</strong> l'est avant tout parce qu'il sabote l'étanchéité et réduit de moitié la <strong>durée de vie</strong> de la toiture.</p>
                
                <h3 class="similar-title" style="margin-top: 2rem;">Anatomie d'une tuile attaquée</h3>
                <ul class="custom-list">
                    <li><strong>Tuile saine :</strong> La couche protectrice est intacte, la surface est lisse, l'eau perle et le gel n'a pas d'emprise.</li>
                    <li><strong>Tuile endommagée par la pression :</strong> La couche supérieure est arrachée. La surface devient rugueuse (idéale pour accrocher les racines des mousses). L'eau rentre dans le matériau et la tuile éclate en hiver.</li>
                </ul>

                <h3>Risques de chute et de sécurité</h3>
                <p>Marcher sur des tuiles recouvertes de mousse mouillée, c'est marcher sur du verglas. Ajoutez à cela la force de recul d'une lance de nettoyeur, et le risque de chute grave explose. Le travail sur une <strong>toiture glissante</strong> exige des chaussures d'ancrage et des harnais.</p>

                <h2 id="usage-pro-karcher">Utilisation Professionnelle : Pourquoi Eux et Pas Vous ?</h2>
                <figure>
                    <img src="<?php echo BASE_URL; ?>image/Nettoyage%20Toiture%20au%20Karcher2.webp" alt="Professionnel utilisant un équipement de nettoyage basse pression sur une toiture.">
                    <figcaption>Un couvreur professionnel utilise une buse à jet plat, réglée à très basse pression.</figcaption>
                </figure>
                <p>Vous avez sûrement déjà vu des professionnels passer un jet sur un toit. Alors pourquoi le déconseiller aux particuliers ? Parce que le matériel et la méthode n'ont strictement rien à voir.</p>

                <h3>Les conditions strictes d'une utilisation experte</h3>
                <p>Les couvreurs n'utilisent pas les nettoyeurs vendus en surface de bricolage. Leurs machines permettent un contrôle très fin de la <strong>pression</strong>, souvent bloquée entre 60 et 80 bars. Ils installent des buses à jet plat large (25 à 40 degrés). On ne travaille jamais avec un jet "crayon" ou rotatif. Le balayage se fait systématiquement depuis la ligne de <a href="<?php echo BASE_URL; ?>faitage" style="text-decoration: underline;">faîtage</a> en descendant vers la gouttière pour ne pas injecter d'eau sous les emboîtements.</p>

                <blockquote class="article-blockquote">
                    L'anecdote de chantier : Un client a loué un nettoyeur 160 bars pour décaper ses tuiles romanes avant de revendre sa maison. Sur le coup, la toiture paraissait neuve. Le problème ? L'engobe de surface a été détruit.  Aux premières pluies de l'automne, l'eau a traversé les tuiles devenues poreuses, ruinant l'isolant. Bilan : un indispensable <a href="<?php echo BASE_URL; ?>changement-de-couverture" style="text-decoration: underline;">changement intégral de la couverture</a> à 18 000 € au lieu d'un simple hydrofuge à 1 500 €. Le Karcher sur un toit est la fausse bonne idée absolue.
                </blockquote>

                <h3>Vous avez déjà passé le Karcher : que faire ?</h3>
                <p>Si l'erreur est faite, n'attendez pas l'hiver. Il faut impérativement repasser un produit hydrofuge professionnel pour recréer artificiellement la barrière imperméable que la machine a arrachée. Si vous avez un doute pour conserver une <strong>toiture saine</strong>, faites passer un artisan charpentier-couvreur.</p>

                <h2 id="alternatives-sures">Les Alternatives Sûres au Nettoyage Haute Pression</h2>
                <figure>
                    <img src="<?php echo BASE_URL; ?>image/Nettoyage%20Toiture%20au%20Karcher3.webp" alt="Différentes méthodes de nettoyage de toiture douces : brosse, pulvérisateur.">
                    <figcaption>L'application au pulvérisateur depuis le bas de pente reste la méthode la plus fiable.</figcaption>
                </figure>
                <p>Pour éliminer les mousses et préserver votre couverture, abandonnez la force brute et privilégiez une méthode chimique douce.</p>

                <h3>Le brossage manuel</h3>
                <p>C'est long, c'est physique, mais ça ne casse rien. On utilise un manche télescopique avec une brosse dure ou un grattoir épousant le profil de la tuile. Le <strong>nettoyage à la brosse</strong> enlève le gros des mousses épaisses avant de pulvériser un traitement anti-mousse.</p>

                <h3>La pulvérisation anti-mousse</h3>
                <p>C'est la méthode reine. Un pulvérisateur chimique sature la toiture sèche avec un produit <strong>anti-mousse</strong> sans rinçage. Le produit s'infiltre jusqu'aux racines, tue les organismes qui meurent et se dessèchent. Ce sont les pluies des semaines suivantes qui rinceront le toit naturellement.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Méthode</th>
                                <th>Avantages</th>
                                <th>Inconvénients</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Brossage manuel</strong></td>
                                <td>Doux, préserve la couche protectrice de la tuile.</td>
                                <td>Grisant, hyper physique, ne détruit pas les racines.</td>
                            </tr>
                            <tr>
                                <td><strong>Pulvérisation anti-mousse</strong></td>
                                <td>Efficace, tue la racine, sans abrasion mécanique.</td>
                                <td>L'action visuelle est lente (il faut attendre la pluie).</td>
                            </tr>
                            <tr>
                                <td><strong>Karcher pro. (basse pression)</strong></td>
                                <td>Résultat immédiat, nettoie parfaitement la pollution.</td>
                                <td>Intervention et réglages réservés aux professionnels.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="choisir-produit">Choisir les Bons Produits : Anti-Mousse et Hydrofuge</h2>
                <figure>
                    <img src="<?php echo BASE_URL; ?>image/Nettoyage%20Toiture%20au%20Karcher4.webp" alt="Divers flacons de produits anti-mousse et hydrofuges pour toiture.">
                    <figcaption>Associez toujours un destructeur de mousse à un hydrofuge de finition.</figcaption>
                </figure>

                <h3>Les traitements anti-mousse</h3>
                <ul class="custom-list">
                    <li><strong>Anti-mousses curatifs :</strong> Détruisent la végétation en place (souvent sels d'ammonium). On pulvérise sur fond sec, on laisse agir, on ne rince pas.</li>
                    <li><strong>Anti-mousses préventifs :</strong> Bloquent la repousse des spores quelques années après un nettoyage profond.</li>
                </ul>

                <h3>L'<a href="https://www.cemarenov.fr/hydrofuge-de-toiture">hydrofuge de toiture</a> : l'étape indispensable</h3>
                <p>Une fois l'<strong>anti-mousse</strong> pleinement actif et la toiture lessivée par la pluie, il faut rebooster la tuile. L'hydrofuge transparent pénètre les pores, repousse l'eau naissante, protège contre le gel fendu, et rallonge l'espérance de <strong>vie de la toiture</strong> d'une bonne décennie.</p>

                <h2 id="quand-comment-nettoyer">Quand et Comment Nettoyer sa Toiture ?</h2>
                <figure>
                    <img src="<?php echo BASE_URL; ?>image/Nettoyage%20Toiture%20au%20Karcher6.webp" alt="Calendrier avec les saisons idéales pour l'entretien de toiture.">
                    <figcaption>Les traitements chimiques détestent la canicule et le gel.</figcaption>
                </figure>
                
                <h3>Les saisons idéales</h3>
                <p>Intervenez au printemps (après les gelées) ou au début de l'automne (pour préparer l'hiver). Si vous traitez par 30°C en plein été, le produit s'évapore instantanément au lieu de pénétrer au cœur des lichens. L'hiver, l'humidité constante rend vos tuiles incroyablement glissantes.</p>

                <h3>Les étapes clés de l'entretien courant</h3>
                <ol>
                    <li>Sécurisez rigoureusement l'accès avec une échelle solidement ancrée ou un échafaudage.</li>
                    <li>Grattez le sommet de la mousse agglomérée avec une brosse, du faîtage vers la gouttière.</li>
                    <li>Pulvérisez le produit anti-mousse de manière abondante et uniforme.</li>
                    <li>Laissez mourir la végétation et la pluie s'occuper naturellement de l'évacuation.</li>
                    <li>Plus tard, sur une toiture perfectly propre et sèche, appliquez un véritable <a href="<?php echo BASE_URL; ?>hydrofuge-incolore-toiture" style="text-decoration: underline;">hydrofuge incolore pour toiture</a> de qualité.</li>
                </ol>

                <h2 id="pro-ou-diy">Faire Appel à un Pro ou Nettoyer Soi-Même ?</h2>
                <figure>
                    <img src="<?php echo BASE_URL; ?>image/Nettoyage%20Toiture%20au%20Karcher6.webp" alt="Deux vignettes : un professionnel sur un toit sécurisé, un particulier en difficulté sur une échelle.">
                    <figcaption>Le travail en hauteur est la première cause d'accident domestique grave.</figcaption>
                </figure>
                <p>Si la toiture n'est pas votre métier, pour limiter les risques mortels d'une chute, engager un artisan qualifié est nettement préférable.</p>

                <h3>Le budget à prévoir</h3>
                <p>Le devis moyen gravite en fonction de l'accessibilité. Un pack "Nettoyage doux + Application Anti-mousse + Hydrofuge pro" oscille souvent entre <strong>25 € et 45 € du mètre carré</strong>. Cette dépense minime sauve généralement les 15 000 € nécessaires pour une réfection de toiture.</p>

                <h2 id="faq">Questions Fréquentes (FAQ)</h2>

                <h3>Est-il bon de nettoyer une toiture régulièrement ?</h3>
                <p>Oui. Un contrôle global tous les 3 ans empêche les racines de s'implanter solidement pour casser la tuile. C'est l'atout numéro un pour pérenniser son patrimoine.</p>

                <h3>Est-ce que la mousse part au Karcher ?</h3>
                <p>Oui, elle est arrachée en surface. Mais la haute pression dégrade l'engobe de la tuile. La perte de l'imperméabilité rendra le support rugueux et poreux : la mousse s'y recroche deux fois plus vite l'année suivante !</p>

                <h3>Quel est le meilleur produit pour enlever la mousse ?</h3>
                <p>Les anti-mousses concentrés "sans rinçage" avec action prolongée (de type Dalep 2100). Sans friction mécanique, la chimie dévore patiemment la moindre spore.</p>

                <h3>Peut-on utiliser de l'eau de Javel sur le toit ?</h3>
                <p>En aucun cas. L'eau de Javel pure est corrosive. Bien qu'elle blanchisse et paraisse magique, elle calcine sévèrement l'épiderme minéral de vos tuiles, détruit le zinc de vos chéneaux pour un désastre irréversible.</p>

                <h3>Les mêmes techniques s'appliquent-elles pour nettoyer une façade encrassée ?</h3>
                <p>La logique est similaire (basse pression, produit adapté, sens de haut en bas) mais les produits et les pressions diffèrent. Notre guide <a href="https://www.cemarenov.fr/nettoyage-facade-javel">nettoyage façade à la javel</a> détaille les protocoles spécifiques aux façades crépi, pierre et parpaing.</p>

                <h3>Comment traiter les fientes d'oiseaux sur le crépi ou la tuile ?</h3>
                <p>Les fientes d'oiseaux sont acides et attaquent les liants de l'enduit comme des tuiles. Un traitement basse pression avec un produit enzymatique spécifique est plus efficace que le Kärcher seul. Notre guide <a href="https://www.cemarenov.fr/nettoyer-fientes-oiseaux-crepi">nettoyer fientes d'oiseaux sur crépi</a> détaille le protocole complet pour ne pas aggraver les dégâts sur les surfaces traitées.</p>

                <h3>Qui paie le nettoyage si la toiture est commune entre deux propriétaires ?</h3>
                <p>Sur une toiture partagée entre deux voisins (maisons mitoyennes ou immeuble sans copropriété constituée), les frais d'entretien sont en principe partagés à parts égales, mais les règles de décision et de financement sont plus complexes. Notre dossier <a href="https://www.cemarenov.fr/toiture-commune-sans-copropriete">toiture commune sans copropriété</a> clarifie les droits et obligations de chaque propriétaire.</p>

            </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert R&eacute;novation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d&rsquo;exp&eacute;rience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois pour r&eacute;ussir vos travaux et &eacute;viter les arnaques.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>L'essentiel à retenir</h3>
                <p>Ranger votre Karcher est la meilleure décision pour la santé de votre toiture ! Le jet haute pression, souvent vendu comme une solution de facilité, endommage sans retour vos tuiles. Optez avec raison pour  des traitements professionnels et doux. Et pour sécuriser totalement cette intervention technique dangereuse, sollicitez les devis d'artisans couvreurs locaux.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Comparer des devis nettoyage toiture</a>
            </div>

            <!-- Similar Articles -->
            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>" alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
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
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>" alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
                            <span><?php echo htmlspecialchars($art['title'] ?? ''); ?></span>
                        </a>
                    <?php
endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>" alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
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
