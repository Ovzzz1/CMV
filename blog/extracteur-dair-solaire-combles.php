<?php
/**
 * extracteur-dair-solaire-combles.php
 * Article: Extracteur d'Air Solaire pour Combles : Guide Complet (2025/2026)
 */

$article_meta = [
    'title' => 'Extracteur d\'air solaire combles : Guide Complet',
    'category' => 'maison',
    'image' => 'https://www.cemarenov.fr/image/extracteur%20dair%20solaire%20combles1.webp',
    'excerpt' => 'Découvrez tout sur l\'extracteur d\'air solaire combles : prix, fonctionnement et efficacité redoutable pour supprimer la chaleur l\'été et l\'humidité l\'hiver.',
    'date' => '2026-03-10',
    'reading_time' => 6,
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
                <span>Extracteur d'Air Solaire</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Combles</span>
                <span class="article-tag">Ventilation</span>
            </div>

            <h1>Extracteur d'Air Solaire pour Combles :<br>
                <span class="h1-accent">Le Guide Complet pour un Habitat Sain</span>
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
                Vos combles perdus se transforment-ils en four l'été et en véritable nid à condensation l'hiver ? Une
                mauvaise ventilation sous toiture dégrade votre isolation et fait grimper vos factures de climatisation.
                On pense souvent à installer une VMC classique, mais il existe une alternative autonome et 100 %
                gratuite à l'usage : l'extracteur d'air solaire. Voyons comment cet équipement protège la charpente et
                régule la température de la maison.
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Économie d'énergie :</strong> L'extracteur fonctionne à 100 % grâce à un panneau
                            solaire sans tirer de courant du réseau.</li>
                        <li><strong>Efficacité estivale :</strong> Évacue l'air à 50°C des combles, permettant de gagner
                            jusqu'à 3°C de fraîcheur dans les pièces du dessous.</li>
                        <li><strong>Régulation hivernale :</strong> Brasse l'air humide pour éviter la condensation et
                            préserver la durée de vie de votre <a
                                href="<?php echo BASE_URL; ?>isolation-des-combles-perdus"
                                style="text-decoration: underline;">isolation des combles perdus</a> (une laine de verre
                            mouillée perdant 50% de son efficacité thermique).</li>
                        <li><strong>Simplicité de pose :</strong> Ne nécessite aucun raccordement électrique, juste une
                            installation étanche sur le toit, idéalement réalisée par un couvreur.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Qu'est-ce qu'un Extracteur d'Air Solaire ?</li>
                        <li>Les Avantages pour Vos Combles et Votre Budget</li>
                        <li>Calculateur et Choix du Modèle Adapté</li>
                        <li>Installation et Entretien Pratique</li>
                        <li>Prix, Aides et Rentabilité</li>
                        <li>Solaire vs VMC : Le Duel des Ventilations</li>
                        <li>Vos Questions Fréquentes</li>
                    </ul>
                </div>

                <h2 id="definition-fonctionnement">Qu'est-ce qu'un Extracteur d'Air Solaire et Comment Fonctionne-t-il ?
                </h2>
                <p>Le principe est d'une grande simplicité. Il s'agit d'un ventilateur posé directement sur la toiture,
                    qui évacue mécaniquement l'air stagnant sous les tuiles. Sa particularité ? Il ne nécessite aucun
                    raccordement au tableau électrique.</p>

                <h3>Le mécanisme autonome</h3>
                <p>L'appareil est alimenté par un petit panneau photovoltaïque (intégré au capot ou déporté). Dès que le
                    soleil tape sur le toit, le moteur se met en marche. Les modèles récents sont équipés d'un
                    thermostat : le ventilateur ne s'active que lorsque la température sous rampants dépasse un certain
                    seuil (souvent autour de 25°C à 29°C) et se coupe quand l'air est rafraîchi. C'est ce pilotage
                    intelligent qui empêche la chaleur de traverser votre plafond.</p>

                <figure>
                    <img src="<?php echo BASE_URL; ?>image/extracteur%20dair%20solaire%20combles2.webp"
                        alt="Schéma de fonctionnement d'un extracteur d'air solaire pour combles">
                    <figcaption>L'extracteur aspire l'air surchauffé et force le renouvellement d'air depuis les
                        chatières basses.</figcaption>
                </figure>

                <h2 id="avantages">Les Avantages Incontestables pour Vos Combles et Votre Budget</h2>
                <p>Installer cet équipement ne relève pas du gadget. C'est une vraie barrière thermique de protection
                    pour la structure de votre pavillon.</p>

                <h3>Lutter contre la surchauffe estivale</h3>
                <p>En plein mois d'août, sous des ardoises ou des tuiles sombres, l'air enfermé peut monter à plus de
                    50°C. Cette masse thermique finit inévitablement par chauffer l'étage du dessous. En forçant
                    l'évacuation de cet air brûlant, on abaisse la température dans les combles de 5 à 10°C. Résultat
                    direct : vous gagnez facilement 2 à 3°C de fraîcheur dans vos chambres au cœur de l'été, allégeant
                    voire supprimant l'usage très coûteux de votre <a
                        href="<?php echo BASE_URL; ?>pompe-a-chaleur-air-air" style="text-decoration: underline;">pompe
                        à chaleur air-air réversible (climatisation)</a>.</p>

                <h3>Prévenir l'humidité et les moisissures en hiver</h3>
                <p>L'hiver pose un autre problème : la condensation. La différence de température entre la maison
                    chauffée et le toit glacial crée de l'humidité. Si cet air n'est pas renouvelé, il trempe la laine
                    de verre. Un isolant mouillé perd 50% de son efficacité. L'extracteur, même avec la lumière rasante
                    de l'hiver, brasse cet air humide et assèche la structure (ce qui prolongera par la même occasion la
                    pérennité de votre <a href="<?php echo BASE_URL; ?>traitement-preventif-charpente"
                        style="text-decoration: underline;">traitement préventif de charpente en bois</a>).</p>

                <h3>Des économies d'énergie réelles</h3>
                <p>Le coût d'exploitation est nul. Contrairement à une climatisation ou une VMC qui tourne 24h/24 sur le
                    compteur, ici, c'est le soleil qui paie l'addition.</p>

                <h2 id="choix-modele">Choisir Votre Extracteur Solaire : Modèles, Critères et Outil</h2>
                <p>Il ne suffit pas d'acheter le premier modèle venu. Le dimensionnement est capital. Un appareil
                    sous-dimensionné brassera de l'air pour rien.</p>

                <h3>Les critères pour un dimensionnement parfait</h3>
                <p>Il faut d'abord connaître le volume de vos combles perdus. En règle générale, on compte une puissance
                    de 16W à 20W pour environ 80 m² de surface au sol. Ensuite, vérifiez bien le débit (exprimé en
                    m³/heure). Plus vos étés sont chauds, plus le débit doit être important. L'option batterie est un
                    vrai plus : elle permet au moteur de tourner pendant quelques heures après le coucher du soleil pour
                    finir d'évacuer la chaleur emmagasinée l'après-midi.</p>

                <div
                    style="background-color: var(--color-bg, #f9f7f4); border: 1px solid var(--color-border, #e8dfd5); padding: 2rem; border-radius: 8px; margin: 2.5rem 0; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
                    <h4 id="dimensionnement-express"
                        style="margin-top: 0; color: var(--color-dark); border-bottom: 2px solid var(--color-primary, #bf9469); padding-bottom: 10px; display: inline-block;">
                        Calculateur "Dimensionnement Express"</h4>

                    <label for="comblesSurface"
                        style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--color-dark);">Surface
                        de vos combles (en m²) :</label>
                    <input type="number" id="comblesSurface" min="10" max="500" value="100"
                        style="width: 100%; padding: 12px; margin-bottom: 1.5rem; border: 1px solid var(--color-border); border-radius: 6px; box-sizing: border-box; font-size: 1rem;">

                    <label for="toitureType"
                        style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--color-dark);">Type de
                        toiture :</label>
                    <select id="toitureType"
                        style="width: 100%; padding: 12px; margin-bottom: 1.5rem; border: 1px solid var(--color-border); border-radius: 6px; box-sizing: border-box; font-size: 1rem;">
                        <option value="tuiles">Tuiles</option>
                        <option value="ardoises">Ardoises</option>
                        <option value="zinc">Zinc</option>
                        <option value="bac-acier">Bac Acier / Tôle</option>
                    </select>

                    <label for="ensoleillement"
                        style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--color-dark);">Ensoleillement
                        moyen de votre région :</label>
                    <select id="ensoleillement"
                        style="width: 100%; padding: 12px; margin-bottom: 1.5rem; border: 1px solid var(--color-border); border-radius: 6px; box-sizing: border-box; font-size: 1rem;">
                        <option value="faible">Faible (Moitié Nord)</option>
                        <option value="moyen" selected>Moyen (Centre et Ouest)</option>
                        <option value="fort">Fort (Moitié Sud)</option>
                    </select>

                    <button onclick="calculateExtractor()"
                        style="background-color: var(--color-primary, #bf9469); color: #fff; padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 1.1rem; width: 100%;">Calculer
                        la puissance requise</button>

                    <div id="result"
                        style="margin-top: 1.5rem; background-color: #fff; padding: 15px; border-radius: 6px; border: 1px dashed var(--color-border);">
                        <h4 style="margin-top: 0; color: var(--color-dark);">Vos recommandations techniques :</h4>
                        <ul class="custom-list" style="margin-bottom:0;">
                            <li>Puissance solaire minimale : <strong id="outputPower"
                                    style="color: var(--color-primary)">...</strong> W</li>
                            <li>Débit d'air nécessaire : <strong id="outputFlow"
                                    style="color: var(--color-primary)">...</strong> m³/h</li>
                            <li>Gamme conseillée : <strong id="outputModels"
                                    style="color: var(--color-primary)">...</strong></li>
                        </ul>
                    </div>
                </div>
                <script>
                    function calculateExtractor() {
                        const surface = parseInt(document.getElementById('comblesSurface').value) || 100;
                        const ensoleillement = document.getElementById('ensoleillement').value;

                        let power = 0;
                        let flow = 0;
                        let models = [];

                        if (surface <= 80) {
                            power = 16;
                            flow = 400;
                            models = ["Gamme 15-20W (ex: Solar Star RM1500)"];
                        } else if (surface <= 150) {
                            power = 25;
                            flow = 700;
                            models = ["Gamme 25-30W (ex: Sol'Air Box M150)"];
                        } else if (surface <= 220) {
                            power = 35;
                            flow = 1000;
                            models = ["Gamme Haute Perf 35W+ (ex: RM2400)"];
                        } else {
                            power = 45;
                            flow = 1300;
                            models = ["Installation Multi-extracteurs (2 unités)"];
                        }

                        if (ensoleillement === "faible") {
                            power = Math.round(power * 1.2);
                            flow = Math.round(flow * 1.1);
                        } else if (ensoleillement === "fort") {
                            power = Math.round(power * 0.9);
                            flow = Math.round(flow * 0.95);
                        }

                        document.getElementById('outputPower').textContent = power;
                        document.getElementById('outputFlow').textContent = flow;
                        document.getElementById('outputModels').textContent = models.join(', ');
                    }
                </script>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Modèle</th>
                                <th>Puissance</th>
                                <th>Débit max (m³/h)</th>
                                <th>Caractéristiques</th>
                                <th>Budget estimé (Fourchette TTC)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Gamme Standard (ex: RM1500)</td>
                                <td>15 - 20 W</td>
                                <td>~400</td>
                                <td>Thermostat, discret sur toit. Pour petits combles.</td>
                                <td>400 - 700 €</td>
                            </tr>
                            <tr>
                                <td>Gamme Confort (ex: M150)</td>
                                <td>25 - 30 W</td>
                                <td>~700</td>
                                <td>Option batterie disponible pour la nuit. Pour maisons moyennes.</td>
                                <td>500 - 900 €</td>
                            </tr>
                            <tr>
                                <td>Gamme Haute Perf (ex: RM2400)</td>
                                <td>35 W et +</td>
                                <td>~1000</td>
                                <td>Très haute performance pour gros volumes (150m² et +).</td>
                                <td>700 - 1100 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="installation-entretien">Installation et Entretien : Le Guide Pratique</h2>

                <blockquote class="article-blockquote">
                    L'anecdote de chantier : Récemment, un client m'a appelé parce que son extracteur tout neuf, acheté
                    sur internet et monté par ses soins, "ne marchait pas bien". En montant dans les combles, j'ai tout
                    de suite compris. Il n'y avait aucune grille d'entrée d'air basse (les fameuses chatières) sur sa
                    toiture ! L'extracteur tentait d'aspirer de l'air dans un espace hermétique, un peu comme quand on
                    essaie d'aspirer dans une bouteille en plastique vide. Dès qu'on a posé 4 tuiles chatières au bas du
                    toit, le flux d'air s'est créé et la température a chuté de 6 degrés dans la journée. L'extraction
                    mécanique a toujours besoin d'une prise d'air frais pour fonctionner.
                </blockquote>

                <h3>Les étapes d'une pose réussie</h3>
                <p>Le montage en lui-même n'est pas complexe, mais il touche à l'étanchéité de votre toit, ce qui ne
                    pardonne pas l'amateurisme.</p>
                <ol>
                    <li><strong>Découpe :</strong> On retire quelques tuiles ou on perce l'ardoise côté sud ou ouest
                        (pour capter un maximum de soleil).</li>
                    <li><strong>Fixation de la platine :</strong> L'embase est fixée sur les liteaux. C'est ici que
                        l'étanchéité se joue, via une bavette en plomb ou en alu plissé qui épouse la forme des tuiles.
                    </li>
                    <li><strong>Pose de la turbine :</strong> Le bloc moteur et le panneau viennent se clipser sur la
                        base. Aucun fil à tirer vers le tableau électrique intérieur.</li>
                </ol>
                <p>Pour l'entretien, c'est le strict minimum : un coup de chiffon humide sur le panneau photovoltaïque
                    tous les deux ans pour enlever la poussière ou le pollen qui pourraient baisser son rendement.</p>

                <h2 id="prix-aides">Prix, Aides et Rentabilité</h2>
                <p>Le matériel seul coûte entre 300 et 1 000 € selon la puissance. Si vous le faites poser par un
                    artisan couvreur, comptez environ 300 à 500 € de main d'œuvre. Ce tarif inclut généralement la pose
                    des tuiles de ventilation (entrées d'air) indispensables au bon balayage thermique.</p>
                <p>Côté aides, si l'artisan est certifié RGE, la pose bénéficie d'une TVA réduite. Dans certains cas de
                    rénovation globale, ce type d'équipement peut être intégré dans les dossiers MaPrimeRénov' ou
                    financé via l'Éco-PTZ.</p>

                <h2 id="comparaison-vmc">Extracteur Solaire vs VMC : Le Duel des Ventilations</h2>
                <p>Attention à ne pas confondre les usages. Un équipement d'intérieur de type <a
                        href="<?php echo BASE_URL; ?>vmc-simple-flux" style="text-decoration: underline;">VMC
                        (Ventilation Mécanique Contrôlée)</a> est obligatoire pour renouveler l'air de vos pièces de vie
                    (cuisines, salles de bain). L'extracteur solaire, lui, s'occupe exclusivement de la zone "morte"
                    située au-dessus de vos têtes (les combles non aménagés).</p>
                <p>Pourquoi ne pas utiliser une VMC pour les combles ? Parce que les débits ne sont pas les mêmes. Une
                    VMC tourne lentement (environ 150 m³/h). L'extracteur solaire est conçu pour brasser d'énormes
                    volumes (jusqu'à 1000 m³/h) en plein cagnard, au moment précis où la chaleur s'accumule. De plus, il
                    s'installe sans tirer le moindre câble dans la charpente.</p>

                <h2 id="faq">Vos Questions Fréquentes</h2>
                <div class="faq-section">
                    <h3>L'appareil fonctionne-t-il l'hiver avec un ciel couvert ?</h3>
                    <p>Oui. Les panneaux monocristallins actuels captent la lumière diffuse. L'appareil tournera moins
                        vite qu'en été, mais suffisamment pour brasser l'air et chasser la condensation hivernale avant
                        qu'elle ne trempe votre isolant.</p>

                    <h3>Est-ce bruyant depuis les chambres en dessous ?</h3>
                    <p>Non. Les moteurs à courant continu utilisés sont étudiés pour être très silencieux. De plus,
                        l'appareil est fixé sur la charpente extérieure. Le plafond et l'épaisseur d'isolant masquent
                        totalement le léger ronronnement de la turbine.</p>

                    <h3>Y a-t-il des risques d'infiltration d'eau ?</h3>
                    <p>Pas si la pose est bien faite. Les kits professionnels sont fournis avec de larges solins
                        d'étanchéité adaptables au profil de vos tuiles. Faire poser l'appareil par un couvreur garantit
                        ce point (couvert par sa décennale).</p>

                    <h3>Quelle est la durée de vie du moteur et du panneau ?</h3>
                    <p>La plupart des fabricants sérieux garantissent les moteurs entre 5 et 10 ans, et le panneau
                        solaire de 15 à 20 ans. C'est une technologie très basique, sans courroie ni électronique
                        complexe, ce qui la rend très robuste.</p>
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
                <h3>L'essentiel à retenir</h3>
                <p>Laisser ses combles surchauffer l'été et pourrir d'humidité l'hiver est une erreur qui coûte cher à
                    long terme. L'extracteur autonome est la réponse de bon sens : il utilise l'énergie du problème (le
                    soleil de plomb) pour alimenter la solution. Vous gagnez en confort thermique immédiat à l'étage, et
                    vous préservez l'efficacité de votre laine de verre pour les décennies à venir.</p>
                <div style="margin-top:2rem;">
                    <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Comparer des devis ventilation</a>
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