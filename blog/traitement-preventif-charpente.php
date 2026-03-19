<?php
/**
 * traitement-preventif-charpente.php
 * Article: Traitement Préventif Charpente : Le Guide Complet Contre Xylophages et Champignons
 */

$article_meta = [
    'title' => 'Traitement préventif charpente : Guide choc (2025/2026)',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/traitement%20preventif%20charpente1.webp',
    'excerpt' => 'Votre charpente est dévorée de l\'intérieur sans que vous le sachiez. Découvrez le traitement préventif charpente qui sauve votre toiture (et votre budget) !',
    'date' => '2026-03-10',
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
                <span>Traitement Préventif Charpente</span>
            </nav>
            
            <div class="article-tags">
                <span class="article-tag">Charpente</span>
                <span class="article-tag">Traitement</span>
            </div>

            <h1>Traitement Préventif Charpente :<br>
                <span class="h1-accent">Le Guide Complet Contre Xylophages et Champignons</span>
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
                La charpente est le squelette invisible de votre habitation. Silencieusement, elle peut être attaquée par des ennemis insidieux qui rongent sa solidité. Protéger ses poutres n'est pas un luxe, c'est l'assurance vie de votre toiture. On pense souvent à intervenir quand la sciure tombe des poutres, mais c'est déjà trop tard. Voyons ensemble comment protéger le bois sain et éviter la catastrophe financière d'une réfection totale.
            </p>

            <figure>
                <img src="<?php echo BASE_URL; ?>image/traitement%20preventif%20charpente2.webp" alt="Belle charpente en bois massif saine et bien entretenue dans des combles aménagés">
                <figcaption>La charpente est le squelette de votre maison. Son entretien garantit la pérennité de tout l'édifice.</figcaption>
            </figure>

            <div class="article-content">
                
                <!-- TL;DR Box -->
                <div class="tldr-box" style="background-color: #faf3eb; border-left: 4px solid var(--color-primary); padding: 1.5rem 2rem; margin-bottom: 3rem; border-radius: 0 8px 8px 0;">
                    <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1.2rem; text-transform: uppercase; color: var(--color-dark); margin-top: 0; border: none; padding-bottom: 0; margin-bottom: 1rem;">⚡ En Bref</h2>
                    <p style="margin-bottom: 0;">Le traitement de charpente sert à empoisonner le bois pour bloquer l'installation des <strong>insectes xylophages</strong> (capricornes, vrillettes, termites) et des champignons (mérule). Appliqué par pulvérisation ou injection tous les 10 ans, il garantit la solidité des poutres. Un passage à l'acte préventif coûte en moyenne <strong>10 fois moins cher</strong> qu'une <a href="<?php echo BASE_URL; ?>traitement-curatif-charpente" style="text-decoration: underline;">intervention curative</a> (quand le bois est déjà rongé).</p>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#section1">Comprendre le Traitement : Définition et Bénéfices</a></li>
                        <li><a href="#section2">Préventif ou Curatif : Bien Choisir son Approche</a></li>
                        <li><a href="#section3">Les Ennemis : Insectes, Champignons et Humidité</a></li>
                        <li><a href="#section4">Méthodes et Produits : Pulvérisation vs Injection</a></li>
                        <li><a href="#section5">Normes, Classes d'Emploi et Réglementation</a></li>
                        <li><a href="#section6">DIY ou Pro : Calculateur et Bon Choix</a></li>
                        <li><a href="#faq">Vos Questions Fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="section1">Comprendre le Traitement : Définition et Bénéfices</h2>
                <p>Traiter une charpente, c'est créer une barrière chimique ou naturelle autour et à l'intérieur des fibres de la poutre. Le but est de rendre le bois indigeste ou mortel pour toute larve qui tenterait de s'y installer. En agissant avant que les parasites n'arrivent, vous figez l'état de votre charpente pour la décennie à venir.</p>
                
                <h3>Pourquoi c'est un investissement rentable</h3>
                <ul class="custom-list">
                    <li>Augmente radicalement l'espérance de vie de la toiture.</li>
                    <li>Évite les travaux titanesques de remplacement de pannes ou de chevrons.</li>
                    <li>Rassure les futurs acheteurs lors d'une vente immobilière (un diagnostic parasitaire vierge est un vrai plus).</li>
                </ul>

                <h2 id="section2">Préventif ou Curatif : Bien Choisir son Approche</h2>
                <p>La règle est simple : on fait du préventif sur un bois sain pour empêcher l'attaque. On fait du curatif sur un bois déjà malade pour tuer l'infestation et sauver ce qui peut l'être.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Critère</th>
                                <th>Approche Préventive</th>
                                <th>Approche Curative</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>État de la poutre</strong></td>
                                <td>Bois dur, sec, aucune galerie visible.</td>
                                <td>Bois mou, sciure au sol, trous de sortie.</td>
                            </tr>
                            <tr>
                                <td><strong>Technique principale</strong></td>
                                <td>Pulvérisation de surface (Badigeon).</td>
                                <td>Bûchage (décapage) + Injection sous pression.</td>
                            </tr>
                            <tr>
                                <td><strong>Budget</strong></td>
                                <td>Faible (investissement d'entretien).</td>
                                <td>Très élevé (sauvetage structurel).</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <h2 id="section3">Les Ennemis : Insectes, Champignons et Humidité</h2>
                
                <figure>
                    <img src="<?php echo BASE_URL; ?>image/traitement%20preventif%20charpente3.webp" alt="Détail d'une poutre de charpente gravement rongée de l'intérieur par des termites">
                    <figcaption>Les termites vident le bois de l'intérieur en laissant la couche extérieure intacte, ce qui rend leur détection très difficile sans sondage.</figcaption>
                </figure>

                <p>Votre grenier est un écosystème. Si l'air n'y circule pas et que l'humidité s'installe, c'est le festin assuré pour les parasites.</p>

                <h3>Les insectes mangeurs de bois (Xylophages)</h3>
                <p>Ils pondent dans les fentes du bois. Leurs larves grandissent en dévorant la poutre de l'intérieur, parfois pendant plusieurs années, avant de sortir à l'âge adulte. Les plus courants sont le Capricorne des maisons (redoutable sur les résineux), la Vrillette (qui laisse de petits trous ronds) et bien sûr, les Termites (qui remontent du sol et vident le bois sans percer la surface).</p>

                <blockquote class="article-blockquote">
                    L'anecdote de chantier : L'année dernière, je suis intervenu dans une vieille bâtisse en pierre. Le client se plaignait d'une mauvaise odeur de sous-bois dans la chambre du haut. En soulevant l'isolant près d'une <a href="<?php echo BASE_URL; ?>gouttieres" style="text-decoration: underline;">fuite de gouttière</a> non réparée, j'ai trouvé le pire scénario : la Mérule. Ce champignon pleureur avait transformé une poutre porteuse de 20x20 cm en une éponge marron qu'on pouvait arracher à mains nues. L'eau est le déclencheur n°1. Si on avait réparé la fuite et traité le bois plus tôt, on n'aurait pas eu à étayer tout le toit pour changer la panne.
                </blockquote>

                <h3>Les champignons lignivores</h3>
                <p>La Mérule (le cancer du bâtiment) ou le Coniophore des caves se développent à cause d'une <a href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">humidité anormale</a> (<a href="<?php echo BASE_URL; ?>remaniement-de-couverture" style="text-decoration: underline;">fuite de toit</a>, <a href="<?php echo BASE_URL; ?>ventilation-naturelle" style="text-decoration: underline;">mauvaise ventilation</a>). Ils cassent la cellulose du bois qui finit par s'effriter en cubes. La prévention passe avant tout par un toit étanche et des combles bien ventilés (tuiles chatières).</p>


                <h2 id="section4">Méthodes et Produits : Pulvérisation vs Injection</h2>
                
                <figure>
                    <img src="<?php echo BASE_URL; ?>image/traitement%20preventif%20charpente1.webp" alt="Artisan injectant un produit de traitement dans une grosse poutre de charpente grâce à des chevilles d'injection">
                    <figcaption>L'injection sous pression nécessite la pose de chevilles (injecteurs) pour saturer le cœur de la poutre en produit biocide.</figcaption>
                </figure>

                <p>Il ne suffit pas de peindre une poutre pour la protéger. Les produits doivent pénétrer la fibre.</p>

                <ol>
                    <li><strong>Préparation :</strong> Le bois doit être dépoussiéré. S'il y a des résidus de peinture ou de vernis, il faut décaper pour que le bois "boive" le produit.</li>
                    <li><strong>La Pulvérisation (Préventif) :</strong> Le produit est pulvérisé en 2 ou 3 couches croisées sur toutes les faces accessibles. C'est suffisant pour un bois sain de section classique.</li>
                    <li><strong>L'Injection (Curatif ou Grosses sections) :</strong> On perce holes trous en quinconce tous les 30 cm. On y enfonce de petites chevilles en plastique (les injecteurs), et on y pompe le produit sous pression jusqu'à ce que le bois recrache le liquide par ses fentes. Le cœur de la poutre est saturé.</li>
                </ol>

                <h3>Produits chimiques ou écologiques ?</h3>
                <p>Le Xylophène reste le standard industriel le plus connu. Cependant, les professionnels se tournent de plus en plus vers des gels sans odeur ou des produits à base de sels de bore. Ils sont tout aussi redoutables pour les larves, mais beaucoup moins nocifs pour l'air que vous respirez.</p>


                <h2 id="section5">Normes, Classes d'Emploi et Réglementation</h2>
                <p>Le bois de charpente n'est pas traité au hasard. La norme NF EN 335 classe les bois selon leur risque d'exposition à l'humidité. Une charpente couverte se situe en <strong>Classe 2</strong> (bois sec, avec humidité occasionnelle). Votre traitement doit certifier une protection pour cette classe.</p>
                <p>Attention aux zones termitées : Un décret oblige les propriétaires situés dans des départements infestés à déclarer la présence de termites en mairie, et exige un traitement certifié lors de la vente du bien.</p>


                <h2 id="section6">DIY ou Pro : Le Bon Choix pour Votre Charpente</h2>
                
                <p>Acheter un bidon en magasin de bricolage est tentant, mais n'est valable que pour de petites retouches ou un abri de jardin. Si vous traitez l'ensemble de votre toiture, le recours à un professionnel (souvent certifié CTB-A+) est recommandé pour deux raisons : l'accès au matériel d'injection sous pression, et la garantie décennale.</p>

                <div style="background-color: var(--color-bg, #f9f7f4); border: 1px solid var(--color-border, #e8dfd5); padding: 2rem; border-radius: 8px; margin: 2.5rem 0; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
                    <h4 style="margin-top: 0; color: var(--color-dark); border-bottom: 2px solid var(--color-primary, #bf9469); padding-bottom: 10px; display: inline-block;">Estimateur de budget "Traitement Charpente"</h4>
                    <p>Découvrez une fourchette de prix indicative pour sécuriser votre toiture.</p>
                    
                    <label for="surface" style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--color-dark);">Surface au sol de la charpente (en m²) :</label>
                    <input type="number" id="surface" value="80" min="10" style="width: 100%; padding: 12px; margin-bottom: 1.5rem; border: 1px solid var(--color-border); border-radius: 6px; box-sizing: border-box; font-size: 1rem;">
                    
                    <label for="method" style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--color-dark);">Type de traitement envisagé :</label>
                    <select id="method" style="width: 100%; padding: 12px; margin-bottom: 1.5rem; border: 1px solid var(--color-border); border-radius: 6px; box-sizing: border-box; font-size: 1rem;">
                        <option value="pro_preventive">Professionnel - Pulvérisation Préventive (Bois sain)</option>
                        <option value="pro_curative">Professionnel - Bûchage & Injection Curative (Bois infesté)</option>
                        <option value="diy_preventive">Bricolage (DIY) - Achat de produit uniquement</option>
                    </select>
                    
                    <button onclick="calculateCost()" style="background-color: var(--color-primary, #bf9469); color: #fff; padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 1.1rem; width: 100%;">Calculer l'estimation</button>
                    
                    <div id="estimator-result" style="background-color: #fff; padding: 15px; border-radius: 6px; border: 1px dashed var(--color-border); margin-top: 1.5rem; font-size: 1.1rem; font-weight: 600; color: var(--color-dark); display: none;"></div>
                    
                    <script>
                        function calculateCost() {
                            const surface = document.getElementById('surface').value;
                            const method = document.getElementById('method').value;
                            const resultDiv = document.getElementById('estimator-result');
                            
                            if (!surface || surface <= 0) {
                                resultDiv.style.display = 'block';
                                resultDiv.innerHTML = "Veuillez entrer une surface valide.";
                                return;
                            }

                            let minPrice, maxPrice, textLabel;

                            if (method === 'diy_preventive') {
                                minPrice = 2; maxPrice = 4;
                                textLabel = "(Coût des bidons de produit uniquement, sans matériel de sécurité)";
                            } else if (method === 'pro_preventive') {
                                minPrice = 15; maxPrice = 25;
                                textLabel = "(Intervention pro avec garantie décennale)";
                            } else if (method === 'pro_curative') {
                                minPrice = 35; maxPrice = 60;
                                textLabel = "(Diagnostic, Bûchage, Perçage, Injection sous pression et Garantie)";
                            }

                            const minTotal = surface * minPrice;
                            const maxTotal = surface * maxPrice;

                            resultDiv.style.display = 'block';
                            resultDiv.innerHTML = `Budget estimé : <br><strong style="font-size: 1.2rem; color: var(--color-primary);">entre ${minTotal.toFixed(0)} € et ${maxTotal.toFixed(0)} €</strong><br><span style="font-size: 0.9rem; font-weight: normal;">${textLabel}</span>`;
                        }
                    </script>
                </div>


                <h2 id="faq">Vos Questions Fréquentes</h2>
                <div class="faq-section">
                    <h3>Quelle est la durée de validité du traitement d'origine du bois ?</h3>
                    <p>Le bois neuf des maisons récentes est traité en usine (souvent par trempage). Ce traitement d'origine est garanti pour une durée de 10 ans. Passé ce délai, le bois redevient vulnérable et un traitement préventif de rappel est fortement conseillé.</p>

                    <h3>Faut-il aérer la maison après l'intervention ?</h3>
                    <p>Oui, c'est indispensable. Même avec l'utilisation de produits en phase aqueuse ou de gels sans odeur, une aération massive des combles (et de l'étage inférieur) est requise pendant 24 à 48 heures pour évacuer l'humidité apportée par le produit et les éventuels COV (Composés Organiques Volatils).</p>

                    <h3>Peut-on traiter une charpente sans enlever l'isolant (laine de verre) ?</h3>
                    <p>C'est très compliqué. Si la <a href="<?php echo BASE_URL; ?>isolation-des-combles-perdus" style="text-decoration: underline;">laine de verre</a> masque les poutres, il est impossible de vérifier leur état ou de les pulvériser correctement. Dans 90 % des cas, le traitement de charpente implique de replier, déplacer ou remplacer l'isolation existante pour accéder au bois.</p>
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
                    <p>Avec plus de 20 ans d&rsquo;exp&eacute;rience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois pour r&eacute;ussir vos travaux et &eacute;viter les arnaques.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>Un Investissement Essentiel pour une Charpente Sereine</h3>
                <p>N'attendez pas de voir de la sciure au sol ou d'entendre gratter dans le plafond pour réagir. Le bois de votre toiture est vivant et appétissant pour la nature. Le traiter tous les dix ans revient à faire la vidange de votre voiture : c'est un petit coût régulier qui vous met à l'abri d'une panne structurelle totale (et ruineuse). Protégez votre bois, aérez vos combles, et votre toiture tiendra un siècle de plus.</p>
                <div style="margin-top:2rem; text-align:center;">
                    <a href="<?php echo BASE_URL; ?>contact" class="btn-primary" style="display: inline-block; padding: 15px 30px; font-weight: 600; text-decoration: none; transition: 0.3s; color: #fff;">Demander un diagnostic charpente (Gratuit)</a>
                </div>
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
