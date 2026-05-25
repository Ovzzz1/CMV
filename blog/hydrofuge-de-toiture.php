<?php
/**
 * hydrofuge-de-toiture.php
 * Article: Traitement hydrofuge de toiture : Prix, Types et Conseils d'application
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Hydrofuge de toiture : Prix, Types et Application 2026',
    'category' => 'travaux',
    'image' => 'https://www.cemarenov.fr/image/hydrofuge de toiture1.webp',
    'excerpt' => 'Tuiles poreuses ? 🌧️ Découvrez quel hydrofuge de toiture choisir, les prix au m² et les 4 étapes d\'application. Outil diagnostic inclus !',
    'date' => '2026-03-09',
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
                <a href="<?php echo BASE_URL . $current_cat; ?>">
                    <?php echo htmlspecialchars($category['name']); ?>
                </a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Hydrofuge de toiture</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Entretien</span>
            </div>

            <h1>Traitement hydrofuge de toiture :<br>
                <span class="h1-accent">Prix, Types et Conseils d'application</span>
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

    <!-- 3-COLUMN LAYOUT -->
    <div class="article-layout">

        <!-- LEFT SIDEBAR: Other Categories -->
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

        <!-- MAIN CONTENT (center) -->
        <div class="article-container">

            <p class="article-intro">
                Vos tuiles changent de couleur, se couvrent de lichen et se gorgent d'humidité à chaque averse. C'est le
                signe d'une porosité avancée. Le <strong>traitement hydrofuge de toiture</strong> est la solution
                d'entretien ultime pour stopper les infiltrations d'eau avant qu'elles n'atteignent votre charpente. Un
                bon produit hydrofuge agit comme un bouclier invisible : il fait glisser la pluie et prolonge la durée
                de vie de votre couverture d'au moins dix ans. Voici comment choisir entre une formule filmogène ou à
                effet perlant, et les règles strictes pour l'appliquer sans détruire vos matériaux.
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel en 3 points
                    </div>
                    <ul>
                        <li>Le <strong>traitement hydrofuge de toiture</strong> modifie la tension de surface des
                            matériaux. L'eau glisse au lieu de pénétrer, protégeant ainsi la toiture contre les dégâts
                            du gel.</li>
                        <li>L'hydrofuge à <strong>effet perlant</strong> (produit à base d'eau) est le choix numéro un.
                            Il offre une protection totale contre l'eau et l'humidité tout en laissant respirer le
                            support.</li>
                        <li>Comptez entre <strong>15 € et 30 € par m²</strong> pour une prestation complète par un
                            professionnel. La réalisation d'un <a
                                href="<?php echo BASE_URL; ?>nettoyage-toiture-karcher"
                                style="text-decoration: underline;">nettoyage de toiture au karcher</a> (de préférence à
                            moyenne pression) est absolument obligatoire avant
                            l'application.</li>
                    </ul>
                </div>

                <img src="<?php echo BASE_URL; ?>image/hydrofuge de toiture3.webp"
                    alt="Gros plan sur des tuiles en terre cuite sous la pluie. L'eau forme des billes parfaites qui roulent sur la surface sans pénétrer, illustrant visuellement le fameux effet perlant d'un traitement hydrofuge de qualité."
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>1. Pourquoi appliquer un traitement hydrofuge sur sa toiture ?</li>
                        <li>2. Quels sont les différents types d'hydrofuges pour toiture ?</li>
                        <li>3. Comment choisir le bon produit hydrofuge ? (Outil interactif)</li>
                        <li>4. Comment appliquer un hydrofuge sur toiture ? (Les 4 étapes)</li>
                        <li>5. Quel est le prix d'un traitement hydrofuge de toiture ?</li>
                        <li>6. Faut-il hydrofuger soi-même ou faire appel à un professionnel ?</li>
                        <li>7. Foire Aux Questions (FAQ)</li>
                    </ul>
                </div>

                <!-- Section 1 -->
                <h2 id="pourquoi">1. Pourquoi appliquer un traitement hydrofuge sur sa toiture ?</h2>
                <p>Avec le temps, les intempéries agressent les matériaux de couverture. Les tuiles ardoises, la terre
                    cuite ou le béton perdent leur couche protectrice d'origine. La porosité s'installe. Dès lors, la
                    tuile agit comme une éponge. En hiver, l'eau infiltrée gèle, prend du volume et provoque des
                    micro-fissures. Au printemps, cette humidité stagnante favorise la formation de mousses et de
                    lichens, dont les racines attaquent directement la structure du matériau.</p>
                <p>Le traitement hydrofuge de toiture intervient pour casser ce cycle destructeur. En saturant les pores
                    du matériau avec une résine hydrofuge, vous modifiez sa tension superficielle. La pluie ne
                    s'accroche plus. Elle forme des gouttelettes qui roulent directement vers l'évacuation de vos <a
                        href="<?php echo BASE_URL; ?>gouttieres" style="text-decoration: underline;">gouttières
                        (zinguerie)</a>, emportant de fait avec elles
                    toutes les poussières et la pollution de surface. Le toit devient alors auto-nettoyant.</p>

                <ul class="custom-list">
                    <li><strong>Protection contre les infiltrations d'eau :</strong> Bloque l'humidité avant qu'elle ne
                        traverse le complexe isolant de vos combles.</li>
                    <li><strong>Lutte anti-mousse préventive :</strong> Sans humidité stagnante, les champignons et les
                        algues ne peuvent plus se développer.</li>
                    <li><strong>Prolongation de la durée de vie :</strong> Un traitement bien réalisé repousse le besoin
                        d'une réfection complète de la toiture de 10 à 15 ans.</li>
                </ul>

                <h3>Hydrofuge vs Imperméabilisant : Quelle différence ?</h3>
                <p>Beaucoup de gens confondent imperméabilisant et hydrofuge. Un produit imperméabilisant classique
                    bloque le passage de l'eau liquide, mais bloque également la vapeur d'eau. C'est une erreur
                    technique majeure sur une toiture. Si votre charpente ou votre isolation produit de la vapeur
                    (condensation venant de l'intérieur de la maison), cette humidité va se retrouver piégée sous les
                    tuiles. Résultat : le bois pourrit.</p>
                <p>Le produit hydrofuge, lui, possède une structure moléculaire spécifique. Il empêche l'eau liquide de
                    rentrer (par l'extérieur), tout en laissant respirer le support. La vapeur d'eau intérieure peut
                    ainsi
                    s'échapper. C'est cette perméabilité à la vapeur vitale qui garantira la santé à long terme du bois
                    (vous évitant par exemple de financer un ruineux <a
                        href="<?php echo BASE_URL; ?>traitement-curatif-charpente"
                        style="text-decoration: underline;">traitement curatif de charpente en bois</a> dans dix ans).
                </p>

                <!-- Section 2 -->
                <h2 id="types">2. Quels sont les différents types d'hydrofuges pour toiture ?</h2>
                <p>Il n'existe pas un produit unique. On distingue différents types d'hydrofuges sur le marché. Le choix
                    dépend de l'état d'usure de vos tuiles et du climat de votre région. Se tromper de catégorie peut
                    annuler complètement les bénéfices de l'opération.</p>

                <img src="<?php echo BASE_URL; ?>image/hydrofuge de toiture3.webp"
                    alt="Toiture divisée en deux parties (avant/après traitement). À gauche, des tuiles en béton ternes, poreuses et couvertes de micro-mousses. À droite, les mêmes tuiles ravivées et protégées par un hydrofuge coloré rouge brique."
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <h3>L'hydrofuge à effet perlant (en phase aqueuse)</h3>
                <p>C'est le produit préféré des artisans sérieux. Cet hydrofuge à effet perlant est un produit formulé à
                    base d'eau (sans solvants agressifs). Les additifs et les résines s'infiltrent en profondeur dans la
                    tuile, puis l'eau s'évapore lors du séchage. Il ne forme pas de pellicule en surface. C'est l'option
                    idéale pour conserver l'aspect naturel du toit tout en laissant respirer la toiture. Inodore et
                    respectueux de l'environnement, il s'applique facilement.</p>

                <h3>L'hydrofuge filmogène</h3>
                <p>Comme son nom l'indique, l'hydrofuge filmogène crée un film dur en séchant, un peu comme un vernis
                    protecteur. Il offre une barrière physique extrêmement puissante contre l'eau et l'humidité. La
                    toiture devient totalement lisse. Le principal défaut de ce produit réside dans sa très faible
                    perméance à la vapeur. Le toit respire mal. On le réserve généralement aux toitures annexes, aux
                    garages ou aux matériaux très dégradés qui nécessitent une consolidation d'urgence.</p>

                <h3>L'hydrofuge coloré</h3>
                <p>Soumise aux UV et aux pluies acides, une tuile en terre cuite ou en béton finit par blanchir.
                    Un véritable <a href="<?php echo BASE_URL; ?>hydrofuge-colore-toiture"
                        style="text-decoration: underline;">hydrofuge coloré pour toiture</a> contient des pigments
                    spécifiques (rouge brique, ardoise, brun). Il assure la même protection
                    qu'un traitement hydrofuge classique, mais il ravive la teinte d'origine. C'est une excellente
                    alternative à la peinture de toiture, car il pénètre le matériau au lieu de simplement le recouvrir.
                </p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de produit hydrofuge</th>
                                <th>Fonctionnement technique</th>
                                <th>Avantage majeur</th>
                                <th>Inconvénient / Limite</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Effet perlant (Base eau)</strong></td>
                                <td>Pénétration des pores sans film</td>
                                <td>Laisse parfaitement respirer la toiture</td>
                                <td>Séchage un peu plus lent (24h sans pluie)</td>
                            </tr>
                            <tr>
                                <td><strong>Filmogène (Solvanté)</strong></td>
                                <td>Création d'une couche dure en surface</td>
                                <td>Protection extrême contre les chocs/gel</td>
                                <td>Bloque la vapeur d'eau (risque de condensation)</td>
                            </tr>
                            <tr>
                                <td><strong>Hydrofuge Coloré</strong></td>
                                <td>Pénétration pigmentée</td>
                                <td>Redonne l'aspect du neuf au matériau</td>
                                <td>Application délicate pour éviter les traces</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section 3 -->
                <h2 id="choisir">3. Comment choisir le meilleur produit hydrofuge selon votre toiture ?</h2>
                <p>Le type de matériau dicte le type de traitement. Un produit hydrofuge universel vendu en grande
                    surface de bricolage donnera rarement des résultats durables sur une ardoise naturelle très lisse.
                </p>

                <div
                    style="background: #fff; border: 1px solid #e2e8f0; padding: 25px; border-radius: 8px; margin: 30px 0; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                    <h3 style="margin-top: 0; color: var(--color-primary); font-size: 1.3rem;">🎯 Outil diagnostic :
                        Quel hydrofuge pour votre toit ?</h3>
                    <p style="margin-bottom: 20px;">Sélectionnez la configuration de votre toiture pour obtenir notre
                        recommandation technique :</p>

                    <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 20px;">
                        <select id="roof-material"
                            style="flex: 1; min-width: 200px; padding: 12px; border: 1px solid #cbd5e1; border-radius: 4px; font-family: inherit; font-size: 1rem; background: #f8fafc;">
                            <option value="tuile">Tuile en terre cuite</option>
                            <option value="beton">Tuile en béton</option>
                            <option value="ardoise">Ardoise naturelle</option>
                        </select>
                        <select id="roof-state"
                            style="flex: 1; min-width: 200px; padding: 12px; border: 1px solid #cbd5e1; border-radius: 4px; font-family: inherit; font-size: 1rem; background: #f8fafc;">
                            <option value="bon">Bon état (prévention, peu de mousse)</option>
                            <option value="poreux">Très poreux / Tuiles décolorées</option>
                        </select>
                    </div>

                    <button onclick="calculateHydrofuge()"
                        style="background: var(--color-accent); color: white; border: none; padding: 12px 24px; font-weight: bold; border-radius: 4px; cursor: pointer;">Valider
                        le diagnostic</button>

                    <div id="tool-result"
                        style="display: none; padding: 15px; background: #f0fdf4; border-left: 4px solid #22c55e; border-radius: 4px; line-height: 1.5; margin-top: 20px; font-weight: bold;">
                    </div>
                </div>

                <script>
                    function calculateHydrofuge() {
                        const mat = document.getElementById('roof-material').value;
                        const state = document.getElementById('roof-state').value;
                        let rec = "";

                        if (mat === 'tuile' && state === 'bon')
                            rec = "Verdict : Hydrofuge à effet perlant (base eau). Il laissera respirer la terre cuite tout en repoussant l'eau.";
                        else if (mat === 'tuile' && state === 'poreux')
                            rec = "Verdict : Hydrofuge coloré. En plus de l'imperméabilisation en profondeur, ses pigments masqueront l'usure de la terre cuite.";
                        else if (mat === 'beton')
                            rec = "Verdict : Hydrofuge perlant ou filmogène. Le béton supporte les deux, mais la phase aqueuse reste la plus sûre pour la charpente.";
                        else if (mat === 'ardoise')
                            rec = "Verdict : Hydrofuge spécifique ardoise (incolore). N'appliquez jamais de produit coloré sur de la vraie ardoise, cela détruirait son esthétique.";

                        const resDiv = document.getElementById('tool-result');
                        resDiv.style.display = 'block';
                        resDiv.innerText = rec;
                    }
                </script>

                <h3>Pour les tuiles en terre cuite et tuiles béton</h3>
                <p>Les tuiles en terre cuite et en béton sont structurellement très absorbantes. Le test est simple :
                    versez un verre d'eau sur une tuile sèche. Si l'eau pénètre instantanément en laissant une auréole
                    sombre, l'urgence est réelle. Pour ces matériaux, privilégiez toujours un traitement hydrofuge à
                    effet perlant. La résine va saturer les capillaires de la terre cuite sur plusieurs millimètres de
                    profondeur.</p>

                <h3>Pour une toiture en ardoise naturelle</h3>
                <p>L'ardoise est une pierre métamorphique. Elle est naturellement étanche, mais avec les décennies, elle
                    s'effrite en surface sous l'action du gel (phénomène de desquamation). Il faut utiliser des
                    hydrofuges spécifiques pour ardoises, souvent plus fluides, capables de pénétrer une pierre dense.
                    Évitez absolument les produits filmogènes qui donnent un aspect brillant et artificiel au toit.</p>

                <!-- Section 4 -->
                <h2 id="etapes">4. Comment appliquer un hydrofuge sur toiture ? (Les 4 étapes)</h2>
                <p>L'application d'un produit hydrofuge ne pardonne pas le travail bâclé. La règle d'or dans le bâtiment
                    : le support doit être sain, propre et sec. Poser une résine sur une surface encrassée revient à
                    jeter l'argent par les fenêtres. Le produit n'accrochera tout simplement pas.</p>

                <img src="<?php echo BASE_URL; ?>image/hydrofuge de toiture4.webp"
                    alt="Un artisan couvreur équipé de ses équipements de protection (EPI) appliquant méticuleusement un produit hydrofuge incolore de bas en haut à l'aide d'un pulvérisateur basse pression sur une toiture inclinée."
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <blockquote class="article-blockquote">
                    <strong>Retour de chantier</strong><br>
                    Sur une intervention de l'année dernière, le propriétaire avait acheté trois gros bidons d'hydrofuge
                    sur internet et avait pulvérisé ça directement sur ses tuiles couvertes de mousse pour gagner du
                    temps. L'hydrofuge a figé la mousse. Quelques semaines plus tard, l'eau s'est infiltrée en dessous,
                    la mousse a gonflé et a soulevé les emboîtements des tuiles. Il a fallu faire un curage complet du
                    toit à la brosse dure avant de recommencer à zéro. La préparation, c'est 80% du travail.
                </blockquote>

                <h3>Étape 1 : Le nettoyage et démoussage (Obligatoire)</h3>
                <p>Commencez par appliquer un traitement anti-mousse fongicide. Laissez le produit agir selon les
                    recommandations du fabricant (parfois plusieurs jours). Ensuite, procédez au rinçage. L'utilisation
                    d'un nettoyeur haute pression est courante, mais attention à la puissance. Réglez la pression autour
                    de 80 à 100 bars maximum et gardez une distance de 30 centimètres. Une pression trop forte arrache
                    le sable de surface des tuiles béton et creuse la terre cuite.</p>

                <h3>Étape 2 : L'inspection et les réparations</h3>
                <p>L'hydrofuge n'est pas un mastic de réparation. Il ne colmatera jamais une tuile cassée ou un solin de
                    cheminée fissuré. Une fois le toit propre, inspectez chaque m² de la surface toiture. Remplacez les
                    éléments endommagés, vérifiez l'alignement des faîtières et nettoyez l'intérieur des gouttières. Le
                    support doit ensuite sécher complètement (attendez 3 à 5 jours de beau temps continu).</p>

                <h3>Étape 3 : L'application au pulvérisateur</h3>
                <p>Oubliez le pinceau ou le rouleau. Pour appliquer un hydrofuge de manière homogène, utilisez un
                    pulvérisateur basse pression. Travaillez de manière méthodique : partez toujours du bas de la
                    toiture (près de la gouttière) et remontez progressivement vers le faîtage. La plupart des
                    fabricants recommandent d'appliquer le produit jusqu'à saturation du support. Concrètement, on
                    applique souvent deux couches successives, la seconde étant pulvérisée avant que la première ne soit
                    sèche (technique du "mouillé sur mouillé").</p>

                <h3>Étape 4 : Le temps de séchage et le test</h3>
                <p>Le temps de polymérisation prend environ 24 heures. Durant cette période, aucune goutte de pluie ne
                    doit toucher la toiture. Vérifiez scrupuleusement la météo. Une fois sec, effectuez le test de la
                    goutte d'eau. Jetez de l'eau sur les tuiles. Elle doit se rassembler en perles parfaites et dévaler
                    la pente sans laisser la moindre trace d'humidité sur le matériau.</p>

                <!-- Section 5 -->
                <h2 id="prix">5. Quel est le prix d'un traitement hydrofuge de toiture ?</h2>
                <p>Budgétiser cette opération demande de séparer le prix du produit lui-même du tarif de la main-d'œuvre
                    si vous déléguez les travaux à un spécialiste.</p>

                <h3>Coût moyen au m² et au litre</h3>
                <p>Le produit hydrofuge s'achète généralement en bidons de 5 ou 20 litres. Un bidon de 5 litres de
                    qualité professionnelle coûte entre 35 € et 60 €. Le rendement moyen est de 1 litre pour 4 à 5 m²
                    de couverture (selon la porosité du support). Pour les produits colorés ou très haut de gamme, le
                    prix grimpe rapidement autour de 15 à 20 € le litre.</p>

                <h3>Devis estimatif pour une toiture de 100 m²</h3>
                <p>Si vous confiez le chantier à un artisan couvreur, le devis inclura la pose d'échafaudages, la
                    sécurisation, le nettoyage complet, l'application de l'anti-mousse, et enfin l'hydrofugation. Le
                    prix global d'un traitement hydrofuge toiture prix pose comprise oscille entre 15 € et 30 € par m².
                </p>
                <p>Pour une maison standard avec 100 m² de toiture, prévoyez un budget compris entre 1 500 € et 3 000 €.
                    Ce montant reste infiniment inférieur au prix d'une rénovation toiture complète (qui dépasse souvent
                    les 15 000 € pour la même surface).</p>

                <!-- Section 6 -->
                <h2 id="pro">6. Faut-il hydrofuger son toit soi-même ou faire appel à un professionnel ?</h2>
                <p>Réaliser les travaux soi-même permet de réduire la facture par trois ou quatre. Cependant, le travail
                    en hauteur implique des risques mortels. Le DIY (Do It Yourself) est envisageable uniquement si
                    votre toiture est à faible pente, de plain-pied, et que vous disposez d'un harnais de sécurité fixé
                    à un point d'ancrage solide.</p>

                <p>Faire appel à un professionnel est impératif pour les toitures très pentues (plus de 35%), les
                    maisons à étages, ou les couvertures en ardoise qui sont extrêmement glissantes une fois humides. Un
                    artisan qualifié maîtrise le débit du pulvérisateur et le dosage des produits. Avant de signer,
                    lisez attentivement les mentions légales sur le devis de l'entreprise. Vérifiez qu'elle possède une
                    assurance décennale couvrant spécifiquement les travaux de rénovation de couverture.</p>

                <!-- Section 7 -->
                <h2 id="faq">7. Foire Aux Questions (FAQ) sur le traitement de toiture</h2>

                <h3>Quelle est la durée de vie d'un hydrofuge pour toiture ?</h3>
                <p>Un traitement hydrofuge professionnel bien appliqué prolonge la durée de vie de la toiture et reste
                    efficace entre 5 et 10 ans. Cette longévité dépend directement de l'exposition du toit (vent, arbres
                    proches) et de la rudesse du climat. Dès que l'eau cesse de perler sur les tuiles, le traitement
                    doit être renouvelé.</p>

                <h3>Quand passer de l'hydrofuge sur son toit ?</h3>
                <p>La période idéale se situe au printemps ou au début de l'automne. La température extérieure doit être
                    comprise entre 10°C et 25°C. Les fortes chaleurs évaporent le produit (surtout s'il est à base
                    d'eau) avant qu'il ne pénètre, et le gel empêche la résine de polymériser correctement.</p>

                <h3>Existe-t-il des aides de l'État pour hydrofuger une toiture ?</h3>
                <p>Non. L'hydrofugation et le démoussage sont considérés comme des travaux d'entretien courant. Ils
                    n'ouvrent pas droit aux aides telles que MaPrimeRénov' ou l'éco-PTZ. Ces subventions d'État sont
                    strictement réservées aux véritables travaux d'isolation thermique (comme par exemple une <a
                        href="<?php echo BASE_URL; ?>isolation-sous-rampants-toiture"
                        style="text-decoration: underline;">isolation sous rampants de toiture</a> classique par
                    l'intérieur ou une méthode Sarking par l'extérieur).</p>

                <h3>Comment nettoyer la toiture avant d'appliquer l'hydrofuge ?</h3>
                <p>Le nettoyage est impératif pour que le produit pénètre dans les pores des tuiles. Un nettoyage Kärcher basse pression (30-40 bar maximum) ou un traitement chimique anti-mousse constituent les deux options. Notre guide <a href="https://www.cemarenov.fr/nettoyage-toiture-karcher">nettoyage toiture Karcher</a> détaille les pressions et distances à respecter pour ne pas fracturer les tuiles.</p>

                <h3>L'hydrofuge fonctionne-t-il sur une toiture en amiante-ciment ?</h3>
                <p>L'application d'un hydrofuge sur des plaques amiantées est techniquement possible, mais elle ne résout pas le problème de fond. Une toiture amiantée doit être déposée ou encapsulée selon des procédures réglementées. Notre dossier <a href="https://www.cemarenov.fr/toiture-amiante">toiture amiante</a> détaille les obligations légales, les coûts de dépose et les aides disponibles.</p>

                <h3>Peut-on appliquer un hydrofuge sur une toiture mitoyenne ?</h3>
                <p>Si la toiture est commune à plusieurs lots (immeuble en petite copropriété de fait ou maison mitoyenne), les règles de décision et de financement changent. Notre guide <a href="https://www.cemarenov.fr/toiture-commune-sans-copropriete">toiture commune sans copropriété</a> clarifie les droits et obligations de chaque propriétaire dans ces situations.</p>

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
                <h3>Le mot de la fin</h3>
                <p>
                    Le traitement hydrofuge de toiture n'est pas un pansement magique pour une couverture en fin de vie,
                    mais c'est le meilleur bouclier préventif qui existe. Ne lésinez ni sur le nettoyage préalable, ni
                    sur la qualité de la résine. L'objectif est clair : garder votre maison au sec tout en laissant le
                    bois de votre charpente respirer.
                </p>
                <p>
                    Votre charpente montre déjà des traces d'humidité prononcées ? Avant d'appliquer un produit, veillez
                    toujours à faire vérifier l'état de votre isolation sous toiture pour écarter tout problème de
                    condensation interne.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis pour votre toiture</a>
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
                            <h4>
                                <?php echo htmlspecialchars($art['title']); ?>
                            </h4>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>

        </div> <!-- .article-container -->

        <!-- RIGHT SIDEBAR: Latest Articles -->
        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <!-- Latest from category -->
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

                <!-- Latest globally -->
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