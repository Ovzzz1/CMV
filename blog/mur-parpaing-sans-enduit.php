<?php
// published: 2026-04-26 08:00
/**
 * mur-parpaing-sans-enduit.php
 * Article : Peut-on laisser un mur en parpaing sans enduit ? Loi, risques et alternatives
 * Site : cemarenov.fr
 * Date : 2026-04-24
 */

$article_meta = [
    'title'        => 'Mur en parpaing sans enduit : loi, risques et alternatives',
    'category'     => 'travaux',
    'slug'         => 'mur-parpaing-sans-enduit',
    'image'        => 'https://www.cemarenov.fr/image/peut-on-laisser-un-mur-en-parpaing-sans-enduit1.webp',
    'excerpt'      => 'Peut-on légalement laisser un mur en parpaing sans enduit ? PLU, risques d\'humidité, hydrofuge et peinture façade : toutes les alternatives pour protéger vos maçonneries sans crépi.',
    'date'         => '2026-04-26',
    'reading_time' => 7,
];

// ── Bloc logique CMS, NE JAMAIS MODIFIER ─────────────────────────────────
require_once dirname(__DIR__) . '/functions.php';

$page_title       = $article_meta['title'];
$page_description = $article_meta['excerpt'];

$current_cat  = $article_meta['category'];
$current_url  = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category     = get_category($current_cat);
$other_cats   = get_other_categories($current_cat);
$cat_articles = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles = array_slice($cat_articles, 0, 10);
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
usort($similar_articles, function ($a, $b) { return $b['score'] - $a['score']; });
$similar_articles = array_slice($similar_articles, 0, 3);
// ── Fin bloc logique CMS ───────────────────────────────────────────────────

include dirname(__DIR__) . '/header.php';
?>

<style>
    /* Styles intégrés pour les vidéos et l'outil UX */
    .video-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; margin: 20px 0; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; }
    .ux-tool-container { background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 12px; padding: 30px; margin: 30px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; }
    .ux-tool-container h3 { margin-top: 0; color: #2c3e50; }
    .ux-step { display: none; animation: fadeIn 0.4s ease-in-out; }
    .ux-step.active { display: block; }
    .ux-question { font-size: 1.2em; font-weight: bold; margin-bottom: 20px; color: #333; }
    .ux-options { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
    .ux-btn { background: #fff; border: 2px solid #3498db; color: #3498db; padding: 12px 24px; font-size: 1em; border-radius: 8px; cursor: pointer; transition: all 0.3s ease; font-weight: bold; }
    .ux-btn:hover { background: #3498db; color: #fff; }
    .ux-result-box { background: #e8f6f3; border-left: 5px solid #1abc9c; padding: 20px; border-radius: 8px; text-align: left; margin-top: 20px; }
    .ux-warning-box { background: #fdedec; border-left: 5px solid #e74c3c; padding: 20px; border-radius: 8px; text-align: left; margin-top: 20px; }
    .cta-btn { display: inline-block; background: #e74c3c; color: #fff !important; padding: 12px 20px; border-radius: 6px; margin-top: 15px; text-align: center; text-decoration: none !important; }
    .cta-btn:hover { background: #c0392b; }
    .reset-btn { background: transparent; border: none; color: #7f8c8d; text-decoration: underline; margin-top: 20px; cursor: pointer; }
    .hashtag { color: var(--color-primary); font-weight: bold; }

    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<article>

    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Mur parpaing sans enduit</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Parpaing</span>
                <span class="article-tag">PLU</span>
                <span class="article-tag">Façade</span>
                <span class="article-tag">Hydrofuge</span>
            </div>

            <h1>Peut-on laisser un mur en parpaing sans enduit ?<br><span class="h1-accent">Loi, risques et alternatives</span></h1>

            <div class="article-meta-header" style="flex-wrap: wrap; gap: 15px;">
                <a href="<?php echo BASE_URL; ?>philippe" class="author-badge-top">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                    <div class="author-badge-text">
                        Par <strong>Philippe</strong>
                        <span>Artisan RGE</span>
                    </div>
                </a>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
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
                Laisser un mur en parpaing à l'état brut est techniquement possible, mais cela dépend étroitement de la nature de l'ouvrage et de la réglementation locale. S'il s'agit d'un mur de clôture ou d'un garage, la tolérance est plus grande que pour une habitation. Toutefois, l'absence de protection expose le béton à des dégradations prématurées, et peut vous valoir un litige avec la mairie ou votre voisin.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Légalement :</strong> Le PLU de votre commune peut vous obliger à enduire. Vérifiez avant tout travaux.</li>
                        <li><strong>Techniquement :</strong> Le parpaing brut absorbe l'eau, gèle et se dégrade, la protection est indispensable dans les régions froides et humides.</li>
                        <li><strong>Alternative invisible :</strong> Un hydrofuge incolore protège efficacement sans changer l'aspect du béton.</li>
                        <li><strong>Peinture directe :</strong> Possible mais attention aux "spectres" (joints visibles par temps humide) sans sous-couche.</li>
                        <li><strong>Mitoyenneté :</strong> Si votre mur brut nuit à votre voisin, un juge peut vous contraindre à le finir.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>1. Le cadre légal : ce que dit la loi sur les murs bruts</li>
                        <li>2. Les risques techniques : pourquoi le parpaing craint l'humidité</li>
                        <li>3. Comment protéger un mur sans faire d'enduit classique ?</li>
                        <li>4. Comparatif des solutions de finition</li>
                        <li>5. Gérer la mitoyenneté et le voisinage</li>
                        <li>⚙️ Outil : Faut-il enduire votre mur ?</li>
                        <li>FAQ, Questions fréquentes</li>
                    </ul>
                </div>

                <img src="<?php echo BASE_URL; ?>image/peut-on-laisser-un-mur-en-parpaing-sans-enduit1.webp"
                     alt="Mur en parpaings bruts en cours de construction, vue de face montrant les blocs béton sans protection"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="cadre-legal">1. Le cadre légal : Ce que dit la loi sur les murs bruts</h2>

                <p>Même si vous êtes propriétaire, vous n'êtes pas totalement libre de l'aspect extérieur de vos constructions. Le <strong>Plan Local d'Urbanisme (PLU)</strong> de votre commune est le document de référence qui régit l'esthétique des façades.</p>

                <h3>L'obligation d'harmonie visuelle et le PLU</h3>
                <p>Dans de nombreuses municipalités, laisser des parpaings apparents est considéré comme un travail "non fini". La mairie peut vous imposer la pose d'un enduit ou d'une peinture pour respecter l'unité architecturale du quartier. Une simple <strong>déclaration préalable de travaux</strong> peut être rejetée si la finition n'est pas précisée.</p>

                <h3>Le cas sensible du mur en limite de propriété</h3>
                <p>La situation se complique lorsque votre mur se situe en limite séparative avec votre voisin. Bien que le mur vous appartienne, son aspect brut peut être perçu comme une <span class="hashtag">#nuisance-visuelle</span>. Si votre voisin estime que la vue sur vos parpaings gris déprécie la valeur de sa propriété, il peut invoquer un trouble anormal de voisinage et un juge peut vous contraindre à réaliser un crépi.</p>

                <h2 id="risques-techniques">2. Les risques techniques : Pourquoi le parpaing craint l'humidité</h2>

                <p>Le parpaing est un matériau robuste mais extrêmement poreux. Sa structure alvéolaire agit comme une éponge géante, ce qui pose plusieurs problèmes majeurs sur le long terme si aucune barrière étanche n'est appliquée.</p>

                <img src="<?php echo BASE_URL; ?>image/peut-on-laisser-un-mur-en-parpaing-sans-enduit2.webp"
                     alt="Schéma des infiltrations d'eau dans un parpaing poreux non enduit, risques de fissuration"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3>Infiltrations, gel et éclatement</h3>
                <p>Lorsqu'il pleut, l'eau pénètre dans les pores du béton. Si une période de gel survient brutalement, cette eau se transforme en glace et augmente de volume, provoquant des micro-fissures, voire l'éclatement des parpaings. À terme, la solidité mécanique peut être compromise car l'humidité favorise également la <strong>carbonatation du béton</strong>, un processus chimique qui finit par faire rouiller les fers de chaînage.</p>

                <h3>L'impact de l'orientation : Pourquoi le Nord est votre ennemi</h3>
                <p>Un mur orienté au Nord ne reçoit presque jamais de soleil direct. L'humidité y stagne, favorisant le développement de mousses, de lichens et de moisissures. Un mur au Sud séchera plus vite mais restera vulnérable aux pluies battantes.</p>

                <h2 id="alternatives">3. Comment protéger un mur sans faire d'enduit classique ?</h2>

                <p>Si vous refusez l'aspect d'un crépi traditionnel ou si votre budget est serré, il existe des alternatives efficaces pour protéger la maçonnerie tout en conservant (ou en modifiant légèrement) l'aspect du béton.</p>

                <h3>L'hydrofuge incolore : La protection invisible</h3>
                <p>C'est la solution idéale pour ceux qui aiment l'aspect brut du parpaing. En appliquant un <strong>traitement hydrofuge</strong> au pulvérisateur, vous rendez la surface déperlante : l'eau glisse sur le mur sans pénétrer, tout en laissant le support respirer. C'est une protection invisible qui évite le grisaillement prématuré et les traces de mousse.</p>

                <h3>Le bardage bois : la finition ventilée</h3>
                <p>Pour ceux qui veulent aller plus loin que la simple protection, le <a href="https://www.cemarenov.fr/bardage-bois-sur-mur-parpaing">bardage bois sur mur parpaing</a> est une alternative solide : l'ossature ventilée élimine le problème d'humidité à la source, sans enduit ni déclaration d'aspect. Comptez 80 à 150 €/m² posé selon l'essence choisie.</p>

                <h3>Peindre directement sur le parpaing : Attention au "spectre"</h3>
                <p>Il est tout à fait possible de peindre des parpaings avec une peinture façade adaptée. Cependant, sans un excellent fixateur de fond, vous risquez de voir apparaître le <strong>phénomène de spectre</strong> : par temps humide, les joints retiennent plus d'eau et se dessinent en transparence sous la peinture, donnant un aspect "quadrillé" peu esthétique.</p>

                <h2 id="comparatif">4. Comparatif des solutions de finition</h2>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Solution</th>
                                <th>Protection</th>
                                <th>Esthétique</th>
                                <th>Coût moyen</th>
                                <th>Difficulté</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Mur Brut</strong></td>
                                <td>Faible</td>
                                <td>Industriel / Inachevé</td>
                                <td>0 €</td>
                                <td>0/5</td>
                            </tr>
                            <tr>
                                <td><strong>Hydrofuge</strong></td>
                                <td>Bonne</td>
                                <td>Aspect béton préservé</td>
                                <td>5–10 € / m²</td>
                                <td>1/5</td>
                            </tr>
                            <tr>
                                <td><strong>Peinture</strong></td>
                                <td>Moyenne</td>
                                <td>Coloré (relief visible)</td>
                                <td>15–25 € / m²</td>
                                <td>2/5</td>
                            </tr>
                            <tr>
                                <td><strong>Enduit Pro</strong></td>
                                <td>Excellente</td>
                                <td>Lisse ou gratté</td>
                                <td>40–70 € / m²</td>
                                <td>5/5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="mitoyennete">5. Gérer la mitoyenneté et le voisinage</h2>

                <p>Le droit de propriété s'arrête là où commence celui des autres. Si le mur est <strong>mitoyen</strong>, les frais d'enduit et d'entretien sont partagés, mais les décisions doivent être prises d'un commun accord. Si le mur est privatif mais situé sur la ligne séparative, vous avez l'obligation d'entretenir la face qui donne chez le voisin si celle-ci présente un danger ou une dégradation manifeste.</p>

                <blockquote class="article-blockquote">
                    <p>"Ne fixez jamais d'objets (jardinières, brise-vue) sur un mur qui appartient exclusivement à votre voisin, même si la face brute donne chez vous. À l'inverse, si votre mur est brut, rappelez à votre voisin qu'il n'a pas le droit d'y toucher sans votre accord."</p>
                </blockquote>

                <img src="<?php echo BASE_URL; ?>image/peut-on-laisser-un-mur-en-parpaing-sans-enduit3.webp"
                     alt="Application d'un produit hydrofuge incolore sur un mur de clôture en parpaing, protection invisible"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="ux-outil">⚙️ Faut-il absolument enduire votre mur en parpaing ?</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Diagnostic express : votre mur a-t-il besoin d'une protection ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quel est l'usage de votre bâtiment ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'habitation')">Maison / pièce de vie</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'garage')">Garage / abri de jardin</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'cloture')">Mur de clôture uniquement</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Dans quelle région habitez-vous ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'nord-humide')">Nord / Normandie (pluies fréquentes)</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'montagne')">Montagne (gel régulier)</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'sud')">Sud / Méditerranée (sec et chaud)</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Le mur est-il visible depuis la voie publique ou en limite de propriété ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'visible')">Oui, visible ou mitoyen</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'cache')">Non, caché dans le jardin</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">Notre recommandation :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Enduit obligatoire recommandé</h4>
                            <p id="warning-text">Votre configuration cumule plusieurs facteurs de risque : usage habitation, exposition aux intempéries ou visibilité depuis la voie publique. Un enduit complet (gobetis + corps + finition) est fortement conseillé, voire imposé par votre PLU. Consultez la mairie avant de commencer.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander un devis enduit</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Pourquoi voit-on les joints à travers l'enduit ou la peinture ?</h3>
                <p>Cela est dû à une différence de porosité entre le parpaing et le mortier du joint. Si le mur n'a pas reçu de sous-couche uniformisante, l'humidité ne s'évapore pas à la même vitesse, créant ces traces fantômes appelées "spectres". Un fixateur de fond permet d'homogénéiser l'absorption avant peindre.</p>

                <h3>Est-il possible de rattraper un vieux mur en parpaing noirci ?</h3>
                <p>Oui, mais un nettoyage haute pression est indispensable avant tout traitement. Une fois propre, vous pouvez appliquer un badigeon de chaux, solution très économique, respirante et naturellement fongicide qui redonnera un coup de propre sans le coût d'un ravalement complet.</p>

                <h3>Peut-on poser un isolant sur un mur non enduit ?</h3>
                <p>Techniquement oui, dans le cadre d'une Isolation Thermique par l'Extérieur (ITE). Dans ce cas, l'isolant servira de protection au parpaing et sera lui-même recouvert d'une finition, réglant ainsi le problème d'étanchéité et d'esthétique en une seule opération.</p>

                <h3>Quelle distance entre les poteaux raidisseurs d'un mur en parpaing laissé brut ?</h3>
                <p>Un mur laissé sans enduit est structurellement identique à un mur enduit : les règles de raidissement restent les mêmes. Notre guide sur la <a href="https://www.cemarenov.fr/distance-poteau-raidisseur-mur-parpaing">distance entre poteaux raidisseurs</a> détaille les espacements selon la hauteur du mur et l'épaisseur du parpaing, conformément au DTU 20.1.</p>

                <h3>Quelle finition si le mur présente des traces d'humidité ?</h3>
                <p>Dans ce cas, ni enduit ni peinture ne règlent le problème, ils le masquent temporairement. Commencez par identifier la source : infiltration, remontée capillaire ou condensation. Pour les caves et garages, notre guide sur l'<a href="https://www.cemarenov.fr/etancheite-mur-parpaing-interieur">étanchéité mur parpaing intérieur</a> détaille le traitement par cuvelage. Et si la fissuration se situe au niveau des joints de chaînage, consultez notre article sur le <a href="https://www.cemarenov.fr/dosage-enduit-ciment-chaux-parpaing">dosage enduit ciment chaux parpaing</a>, un mortier mal dosé est souvent la cause.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Intervenant régulièrement sur des chantiers de ravalement et d'enduit de façade, Philippe connaît parfaitement les obligations du PLU et les meilleures techniques pour protéger durablement un mur en parpaing, avec ou sans crépi.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Un mur en parpaing à protéger ou à enduire ?</h3>
                <p>Que vous optiez pour un hydrofuge invisible ou un enduit complet, un diagnostic terrain par un professionnel vous évitera de mauvaises surprises réglementaires et techniques.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis gratuit</a>
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

        </div>

        <aside class="sidebar-right">
            <div class="sidebar-sticky">

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles, <?php echo htmlspecialchars($category['name'] ?? ''); ?></h3>
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

<script>
    let userAnswers = {};

    function saveAnswer(stepNumber, answer) {
        userAnswers['step' + stepNumber] = answer;
        document.getElementById('step-' + stepNumber).classList.remove('active');
        if (stepNumber < 3) {
            document.getElementById('step-' + (stepNumber + 1)).classList.add('active');
        } else {
            generateResult();
        }
    }

    function generateResult() {
        document.getElementById('step-result').classList.add('active');
        const successBox = document.getElementById('success-result');
        const warningBox = document.getElementById('warning-result');
        const resultText = document.getElementById('result-text');

        successBox.style.display = 'none';
        warningBox.style.display = 'none';

        if (userAnswers.step1 === 'habitation' || userAnswers.step3 === 'visible' || userAnswers.step2 === 'montagne') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step1 === 'cloture' && userAnswers.step3 === 'cache') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Solution minimale suffisante :</strong> Hydrofuge incolore.<br>Un mur de clôture caché dans le jardin, dans un climat favorable, peut se contenter d'un traitement hydrofuge. Budget : 5 à 10 €/m², applicable au pulvérisateur en une journée. Renouvelez tous les 5 à 8 ans.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Solution recommandée : Hydrofuge ou peinture façade</strong><br>Pour un garage ou un abri, sans contrainte de voisinage forte, une peinture façade avec sous-couche fixatrice suffit. Coût : 15 à 25 €/m². Vérifiez tout de même votre PLU si le bâtiment est visible depuis la rue.";
        }
    }

    function resetTool() {
        userAnswers = {};
        document.getElementById('step-result').classList.remove('active');
        document.getElementById('step-1').classList.add('active');
    }
</script>

<?php
// Schema.org, NE JAMAIS MODIFIER
require_once dirname(__DIR__) . '/schema-data.php';

$faq_schema = [
    [
        'question' => "Pourquoi voit-on les joints à travers l'enduit ou la peinture sur un parpaing ?",
        'answer'   => "Cela est dû à une différence de porosité entre le parpaing et le mortier du joint. Si le mur n'a pas reçu de sous-couche uniformisante, l'humidité ne s'évapore pas à la même vitesse, créant des traces fantômes appelées spectres. Un fixateur de fond permet d'homogénéiser l'absorption avant de peindre."
    ],
    [
        'question' => "Est-il possible de rattraper un vieux mur en parpaing noirci ?",
        'answer'   => "Oui, mais un nettoyage haute pression est indispensable avant tout traitement. Une fois propre, vous pouvez appliquer un badigeon de chaux, solution économique, respirante et naturellement fongicide qui redonne un coup de propre sans le coût d'un ravalement complet."
    ],
    [
        'question' => "Peut-on poser un isolant sur un mur en parpaing non enduit ?",
        'answer'   => "Techniquement oui, dans le cadre d'une Isolation Thermique par l'Extérieur. Dans ce cas, l'isolant servira de protection au parpaing et sera lui-même recouvert d'une finition, réglant ainsi le problème d'étanchéité et d'esthétique en une seule opération."
    ],
];

$_schema = get_schema_data(basename(__FILE__, '.php'));
if (!isset($_schema['faq']) || empty($_schema['faq'])) {
    $_schema['faq'] = $faq_schema;
}

echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>
