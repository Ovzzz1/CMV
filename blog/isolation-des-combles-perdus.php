<?php
/**
 * isolation-des-combles-perdus.php
 * Article: Isolation des Combles Perdus : Le Guide Complet pour des Économies Durables
 */

$article_meta = [
    'title' => 'Isolation des combles perdus : Guide et Prix 2026 !',
    'category' => 'maison',
    'image' => 'https://www.cemarenov.fr/image/isolation%20des%20combles%20perdus4.webp',
    'excerpt' => 'L\'isolation des combles perdus cache un secret redoutable : divisez vos factures par deux avec cette méthode choc. Découvrez le piège à éviter absolument !',
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
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <a
                    href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name'] ?? 'Isolation'); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Isolation Combles Perdus</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Combles</span>
                <span class="article-tag">Économies</span>
            </div>

            <h1>Isolation des Combles Perdus :<br>
                <span class="h1-accent">Le Guide Complet pour des Économies Durables</span>
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
                On ne le répétera jamais assez : isoler un toit, c'est la base absolue. Avant même d'entamer une
                complexe <a href="<?php echo BASE_URL; ?>isolation-des-murs"
                    style="text-decoration: underline;">isolation des murs (ITI ou ITE)</a>, ou de penser à changer vos
                fenêtres ou votre chaudière, regardez ce qui se passe au-dessus de vos têtes. Jusqu'à 30 % de la chaleur
                de votre maison s'échappe par la toiture. Les combles perdus sont de véritables passoires thermiques.
                L'avantage, c'est que c'est l'un des chantiers les plus rapides, les moins coûteux et les plus
                subventionnés. Voyons comment procéder pour transformer cet espace vide en bouclier thermique.
            </p>

            <figure>
                <img src="<?php echo BASE_URL; ?>image/isolation%20des%20combles%20perdus1.webp"
                    alt="Combles perdus d'une maison parfaitement isolés avec de la laine de verre soufflée">
                <figcaption>Une isolation performante en toiture est la première étape d'une rénovation énergétique
                    réussie.</figcaption>
            </figure>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box"
                    style="background-color: #faf3eb; border-left: 4px solid var(--color-primary); padding: 1.5rem 2rem; margin-bottom: 3rem; border-radius: 0 8px 8px 0;">
                    <h2
                        style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1.2rem; text-transform: uppercase; color: var(--color-dark); margin-top: 0; border: none; padding-bottom: 0; margin-bottom: 1rem;">
                        ⚡ En Bref</h2>
                    <p style="margin-bottom: 0;">Isoler ses combles perdus (non aménageables) permet de bloquer
                        <strong>30 % des pertes de chaleur</strong>. La technique la plus courante est le
                        <strong>soufflage de flocons</strong> (laine minérale ou ouate de cellulose) sur environ 30 à 40
                        cm d'épaisseur. Pour avoir droit aux aides (MaPrimeRénov', CEE), il faut impérativement
                        atteindre une Résistance Thermique (R) supérieure ou égale à <strong>7 m².K/W</strong> et passer
                        par un artisan RGE.</p>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#definition">Qu'est-ce que l'isolation des combles perdus ?</a></li>
                        <li><a href="#benefices">Les Bénéfices : Confort, Économies et Environnement</a></li>
                        <li><a href="#choix">Techniques, Matériaux et Épaisseurs Adaptées</a></li>
                        <li><a href="#financer">Financer le projet : Coûts et Aides en vigueur</a></li>
                        <li><a href="#pro-diy">DIY ou Pro RGE : Les erreurs à éviter absolument</a></li>
                        <li><a href="#faq">Vos Questions Fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="definition">Qu'est-ce que l'isolation des combles perdus ?</h2>
                <p>Un comble "perdu", c'est simplement un grenier inutilisable où vous ne pouvez pas aménager de pièces
                    à vivre (à la différence des combles aménagés qui requièrent une méthodologie d'<a
                        href="<?php echo BASE_URL; ?>isolation-sous-rampants-toiture"
                        style="text-decoration: underline;">isolation sous rampants de toiture</a> très différente).
                    C'est souvent dû à une charpente industrielle en "W" (les fameuses fermettes qui encombrent
                    l'espace) ou à une hauteur sous plafond insuffisante. Bien que cet espace soit inhabité, sa position
                    entre vos pièces chauffées et l'extérieur en fait le talon d'Achille de votre maison.</p>

                <h3>Pourquoi c'est la priorité n°1 en rénovation</h3>
                <p>C'est de la physique basique : l'air chaud est plus léger que l'air froid, donc il monte. Si le sol
                    de votre grenier n'est pas isolé, votre chauffage sert littéralement à chauffer les oiseaux. En
                    coupant cette fuite par le haut, vous bloquez la chaleur à l'intérieur. C'est le chantier de
                    rénovation énergétique qui offre le retour sur investissement le plus rapide.</p>

                <h2 id="benefices">Les Bénéfices : Confort, Économies et Environnement</h2>

                <figure>
                    <img src="<?php echo BASE_URL; ?>image/isolation%20des%20combles%20perdus2.webp"
                        alt="Vue à la caméra thermique d'une maison montrant une forte perte de chaleur rougeoyante par la toiture">
                    <figcaption>La thermographie révèle sans appel que la toiture est la principale zone d'évasion de la
                        chaleur.</figcaption>
                </figure>

                <p>Intervenir sur cette zone aveugle de la maison change radicalement le comportement de votre bâti,
                    hiver comme été.</p>

                <ul class="custom-list">
                    <li><strong>Allègement de la facture de chauffage :</strong> En bloquant la fuite d'énergie
                        principale, votre chaudière classique ou votre nouvelle <a
                            href="<?php echo BASE_URL; ?>pompe-a-chaleur-air-eau"
                            style="text-decoration: underline;">pompe à chaleur air eau</a> tournera beaucoup moins et
                        consommera moins.</li>
                    <li><strong>Confort d'été amélioré :</strong> Un bon isolant ne fait pas que garder le chaud en
                        hiver. Il freine aussi la pénétration de la chaleur sous les tuiles l'été (ce qu'on appelle le
                        déphasage thermique).</li>
                    <li><strong>Valorisation du bien :</strong> Remonter la note de votre DPE (Diagnostic de Performance
                        Énergétique) est aujourd'hui indispensable si vous comptez louer ou vendre votre maison.</li>
                </ul>


                <h2 id="choix">Techniques, Matériaux et Épaisseurs Adaptées</h2>

                <figure>
                    <img src="<?php echo BASE_URL; ?>image/isolation%20des%20combles%20perdus3.webp"
                        alt="Artisan RGE utilisant une machine cardeuse pour souffler des flocons de laine de verre dans des combles perdus">
                    <figcaption>L'isolation par soufflage permet de combler les moindres recoins de la charpente en W,
                        supprimant ainsi tous les ponts thermiques.</figcaption>
                </figure>

                <h3>Soufflage ou pose en rouleaux ?</h3>
                <p>Il existe deux grandes écoles :</p>
                <ol>
                    <li><strong>Le soufflage :</strong> C'est la méthode reine pour les combles difficiles d'accès.
                        L'artisan utilise une machine (cardeuse) qui propulse l'isolant en flocons directement sur le
                        plancher. Cela crée un tapis continu, sans aucun joint, ce qui élimine les ponts thermiques.
                        C'est extrêmement rapide (une demi-journée).</li>
                    <li><strong>Le déroulage (rouleaux ou panneaux) :</strong> Réservé aux combles dont le plancher est
                        solide et accessible. On pose des bandes d'isolant (souvent croisées en deux couches). C'est
                        efficace, mais plus long et difficile s'il y a beaucoup de solives à contourner.</li>
                </ol>

                <h3>Quel isolant choisir ?</h3>
                <p>Le choix dépend de votre budget et de vos attentes en matière d'écologie ou de confort estival.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type d'isolant</th>
                                <th>Avantages clés</th>
                                <th>Inconvénients clés</th>
                                <th>Prix indicatif (€/m²)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Laine de verre</strong> (Minérale)</td>
                                <td>Très économique, incombustible, se tasse peu au fil du temps.</td>
                                <td>Faible déphasage (protège moins bien de la chaleur l'été).</td>
                                <td>15 - 25 €</td>
                            </tr>
                            <tr>
                                <td><strong>Laine de roche</strong> (Minérale)</td>
                                <td>Très résistante au feu, ne craint pas les rongeurs.</td>
                                <td>Plus lourde sur le plafond, bilan carbone moyen.</td>
                                <td>20 - 30 €</td>
                            </tr>
                            <tr>
                                <td><strong>Ouate de cellulose</strong> (Biosourcée)</td>
                                <td>Excellent confort d'été (bon déphasage), écologique (papier recyclé).</td>
                                <td>Nécessite un pare-vapeur strict car elle craint l'humidité.</td>
                                <td>25 - 35 €</td>
                            </tr>
                            <tr>
                                <td><strong>Fibre de bois</strong> (Biosourcée)</td>
                                <td>Le top pour l'inertie thermique et l'écologie.</td>
                                <td>Généralement en panneaux (donc compliqué en combles perdus), coûteux.</td>
                                <td>30 - 45 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>La règle d'or : la Résistance Thermique (R)</h3>
                <p>Ne parlez pas seulement en centimètres d'épaisseur. La métrique qui compte, c'est la Résistance
                    Thermique (R). Pour avoir droit aux aides de l'État, le devis de votre artisan doit stipuler un
                    isolant avec un <strong>R supérieur ou égal à 7 m².K/W</strong>. Concrètement, pour de la laine de
                    verre soufflée, cela représente environ 32 à 35 cm d'épaisseur.</p>

                <h2 id="financer">Financer le projet : Coûts et Aides en vigueur</h2>
                <p>Le budget global d'un chantier d'isolation de combles perdus (pose incluse) oscille généralement
                    entre 20 et 40 € le mètre carré pour du soufflage. C'est l'un des chantiers les plus aidés par les
                    pouvoirs publics.</p>

                <h3>Les dispositifs à mobiliser (2024-2025)</h3>
                <ul class="custom-list">
                    <li><strong>MaPrimeRénov' :</strong> L'aide directe de l'État. Son montant dépend de la catégorie de
                        revenus de votre foyer (barèmes Bleu, Jaune, Violet, Rose).</li>
                    <li><strong>La Prime CEE (Certificats d'Économies d'Énergie) :</strong> Versée par les fournisseurs
                        d'énergie (EDF, Total, etc.). Elle est accessible à tous, sans condition de revenus, bien que le
                        montant soit bonifié pour les ménages modestes.</li>
                    <li><strong>La TVA à 5,5 % :</strong> Elle s'applique automatiquement sur le devis si la maison a
                        plus de 2 ans et que vous passez par un pro RGE.</li>
                </ul>

                <div
                    style="background-color: var(--color-bg, #f9f7f4); border: 1px solid var(--color-border, #e8dfd5); padding: 2rem; border-radius: 8px; margin: 2.5rem 0; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
                    <h4
                        style="margin-top: 0; color: var(--color-dark); border-bottom: 2px solid var(--color-primary, #bf9469); padding-bottom: 10px; display: inline-block;">
                        Estimateur de budget express</h4>
                    <p>Découvrez une estimation de votre chantier (Fourchette de prix pro pose incluse, hors déduction
                        des aides).</p>

                    <label for="surface"
                        style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--color-dark);">Surface
                        des combles (en m²) :</label>
                    <input type="number" id="surface" min="10" max="300" value="70"
                        style="width: 100%; padding: 12px; margin-bottom: 1.5rem; border: 1px solid var(--color-border); border-radius: 6px; box-sizing: border-box; font-size: 1rem;">

                    <label for="isolant"
                        style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--color-dark);">Technique
                        et Matériau souhaité :</label>
                    <select id="isolant"
                        style="width: 100%; padding: 12px; margin-bottom: 1.5rem; border: 1px solid var(--color-border); border-radius: 6px; box-sizing: border-box; font-size: 1rem;">
                        <option value="laine-soufflee">Soufflage Laine Minérale (Verre/Roche)</option>
                        <option value="ouate-soufflee">Soufflage Ouate de Cellulose</option>
                        <option value="rouleaux">Pose de Rouleaux (Laine/Bois)</option>
                    </select>

                    <button onclick="calculateBudget()"
                        style="background-color: var(--color-primary, #bf9469); color: #fff; padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 1.1rem; width: 100%;">Estimer
                        le budget brut</button>

                    <div id="estimation-result"
                        style="background-color: #fff; padding: 15px; border-radius: 6px; border: 1px dashed var(--color-border); margin-top: 1.5rem; font-size: 1.1rem; font-weight: 600; color: var(--color-dark); display: none;">
                    </div>

                    <script>
                        function calculateBudget() {
                            const surface = parseFloat(document.getElementById('surface').value);
                            const type = document.getElementById('isolant').value;
                            let minPrice, maxPrice;

                            if (type === 'laine-soufflee') {
                                minPrice = 20; maxPrice = 30;
                            } else if (type === 'ouate-soufflee') {
                                minPrice = 25; maxPrice = 35;
                            } else if (type === 'rouleaux') {
                                minPrice = 35; maxPrice = 55;
                            }

                            if (surface && surface > 0) {
                                const minTotal = surface * minPrice;
                                const maxTotal = surface * maxPrice;
                                const resultDiv = document.getElementById('estimation-result');
                                resultDiv.style.display = 'block';
                                resultDiv.innerHTML = `Budget estimé (fourchette) : <br><strong style="color: var(--color-primary);">entre ${minTotal.toFixed(0)} € et ${maxTotal.toFixed(0)} € TTC</strong><br><br><span style="font-size:0.9rem; font-weight:normal;">Ce montant est brut. Une fois vos primes CEE et MaPrimeRénov' déduites, le reste à charge peut diminuer considérablement.</span>`;
                            }
                        }
                    </script>
                </div>

                <h2 id="pro-diy">DIY ou Pro RGE : Les erreurs à éviter absolument</h2>

                <figure>
                    <img src="<?php echo BASE_URL; ?>image/isolation%20des%20combles%20perdus4.webp"
                        alt="Artisan certifié RGE équipé de protections posant un repère électrique et un entourage de trappe avant l'isolation des combles">
                    <figcaption>Un professionnel RGE protège l'électricité et gère la ventilation avant la projection de
                        l'isolant.</figcaption>
                </figure>

                <p>Beaucoup sont tentés d'acheter quelques rouleaux au magasin de bricolage du coin pour faire le
                    chantier eux-mêmes le week-end. C'est souvent un très mauvais calcul financier.</p>

                <h3>Pourquoi le "Do It Yourself" est risqué</h3>
                <p>D'abord, <strong>isoler soi-même vous coupe immédiatement le droit à toutes les aides
                        financières</strong> (CEE et MaPrimeRénov'). Seule la facture d'un artisan certifié RGE (Reconnu
                    Garant de l'Environnement) déclenche les primes. Ensuite, une mauvaise pose ruine le travail.</p>

                <blockquote class="article-blockquote">
                    L'anecdote de chantier : J'ai vu un cas d'école l'hiver dernier. Un propriétaire avait déroulé
                    lui-même 30 cm de laine de verre sur tout son plancher de grenier. Sauf qu'il a posé l'isolant
                    par-dessus les grilles d'aération de la VMC et les spots encastrés, et il a oublié le pare-vapeur.
                    Résultat ? L'humidité de la salle de bain est restée coincée sous la laine de verre. L'eau a
                    condensé, la laine s'est tassée, et le plafond en placo s'est effondré sous le poids de la
                    moisissure. Faire appel à un pro RGE, c'est s'assurer de la gestion des ponts thermiques, des
                    contours de cheminée et de la ventilation.
                </blockquote>

                <h3>Les 3 points de contrôle d'un chantier pro</h3>
                <ol>
                    <li><strong>Le repérage électrique :</strong> L'artisan doit obligatoirement poser des capots de
                        protection sur vos spots encastrés avant de souffler l'isolant (risque d'incendie sinon).</li>
                    <li><strong>Le tour de trappe :</strong> Un cadre en bois doit être créé autour de la trappe d'accès
                        pour retenir les flocons d'isolant et isoler le panneau d'accès lui-même.</li>
                    <li><strong>La ventilation :</strong> Le pro vérifiera que vos chatières de toiture respirent bien
                        et que l'isolant ne bouche pas les flux d'air aux bas de pente.</li>
                </ol>

                <h2 id="faq">Vos Questions Fréquentes</h2>
                <div class="faq-section">
                    <h3>Les offres d'isolation à 1 € existent-elles encore ?</h3>
                    <p>Non. Ce dispositif gouvernemental a été officiellement supprimé pour lutter contre les arnaques
                        et les malfaçons. Aujourd'hui, il y a un reste à charge obligatoire, même minime, qui dépend de
                        vos revenus via MaPrimeRénov'.</p>

                    <h3>Quelle est la durée de vie d'une isolation soufflée ?</h3>
                    <p>Un isolant en vrac comme la laine de verre ou la ouate de cellulose a une durée de vie efficace
                        d'environ 15 à 20 ans. Avec le temps, la gravité et l'humidité peuvent causer un "tassement" qui
                        réduit l'épaisseur et donc l'efficacité thermique. Il est conseillé de vérifier l'épaisseur au
                        bout de 15 ans.</p>

                    <h3>Faut-il enlever l'ancienne laine de verre avant d'en remettre ?</h3>
                    <p>Pas obligatoirement. Si l'ancienne laine est propre, sèche et non tassée, l'artisan peut souffler
                        la nouvelle épaisseur directement par-dessus. En revanche, si l'ancien isolant a pris l'eau, est
                        écrasé ou souillé (ce qui arrive régulièrement et nécessite de <a
                            href="<?php echo BASE_URL; ?>se-debarrasser-des-fouines"
                            style="text-decoration: underline;">se débarrasser des fouines</a> résidentes), une dépose
                        complète est indispensable (avec un surcoût pour la mise en déchetterie).</p>
                    <h3>Faut-il prévoir une ventilation spécifique après l'isolation des combles ?</h3>
                    <p>Absolument. Une isolation efficace rend les combles plus hermétiques, ce qui peut entraîner une accumulation de chaleur et d'humidité en été. Un <a href="https://www.cemarenov.fr/extracteur-dair-solaire-combles">extracteur d'air solaire pour combles</a> est une solution passive et économique — il fonctionne à l'énergie solaire et évacue l'air chaud sans consommation électrique.</p>

                    <h3>L'isolation des combles perdus est-elle possible sur une véranda ?</h3>
                    <p>Non, les combles perdus concernent les espaces sous toit non habitables. Pour une véranda ou une extension avec toit en polycarbonate, les techniques sont différentes. Notre guide <a href="https://www.cemarenov.fr/comment-isoler-toit-veranda-polycarbonate">comment isoler un toit de véranda en polycarbonate</a> détaille les solutions adaptées.</p>
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
                <h3>Agir pour une maison plus performante</h3>
                <p>Ne laissez plus la chaleur de vos radiateurs s'envoler par la toiture. L'isolation des combles perdus
                    est l'acte de rénovation le plus censé et le plus rentable que vous puissiez faire. En passant par
                    un artisan RGE, vous vous assurez un chantier sécurisé, rapide (souvent bouclé en une journée), et
                    largement financé par les aides de l'État.</p>
                <div style="margin-top:2rem; text-align:center;">
                    <a href="<?php echo BASE_URL; ?>contact" class="btn-primary"
                        style="display: inline-block; padding: 15px 30px; font-weight: 600; text-decoration: none; transition: 0.3s; color: #fff;">Demander
                        une visite technique et un devis (Gratuit)</a>
                </div>
            </div>

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
                        <?php echo htmlspecialchars($category['name'] ?? 'Isolation'); ?></h3>
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