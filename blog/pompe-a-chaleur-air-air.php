<?php
/**
 * pompe-a-chaleur-air-air.php
 * Article: Pompe à Chaleur Air-Air
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Pompe à chaleur air-air : prix, fonctionnement et aides en 2026',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/pompe%20a%20chaleur%20air%20air2.webp',
    'excerpt' => 'Découvrez notre guide complet sur la pompe à chaleur air-air : fonctionnement, avantages, prix, aides financières, installation et climatisation réversible.',
    'date' => '2026-03-10',
    'reading_time' => 8,
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
                <span>Pompe à Chaleur Air Air</span>
            </nav>
            
            <div class="article-tags">
                <span class="article-tag">Climatisation</span>
                <span class="article-tag">Économies d'Énergie</span>
            </div>

            <h1>Pompe à chaleur air-air :<br>
                <span class="h1-accent">Prix, Fonctionnement et Aides en 2026</span>
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
                Face à l'urgence climatique et la hausse continue des coûts énergétiques, trouver une solution de <strong>chauffage et climatisation</strong> efficace et respectueuse de l'environnement est devenu une priorité. La <strong>pompe à chaleur air-air</strong> s'affirme comme un <strong>système de chauffage</strong> innovant, écologique et économique pour un <strong>confort thermique</strong> optimal toute l'année. Cette solution, souvent assimilée à une climatisation réversible, capte les calories présentes dans l'<strong>air extérieur</strong> pour les restituer à l'intérieur de votre logement.
            </p>

            <div class="article-content">
                
                <!-- TL;DR Box -->
                <div class="tldr-box" style="background-color: #faf3eb; border-left: 4px solid var(--color-primary); padding: 1.5rem 2rem; margin-bottom: 3rem; border-radius: 0 8px 8px 0;">
                    <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1.2rem; text-transform: uppercase; color: var(--color-dark); margin-top: 0; border: none; padding-bottom: 0; margin-bottom: 1rem;">⚡ En Bref</h2>
                    <ul style="margin-bottom: 0;">
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span style="position: absolute; left: 0; color: var(--color-primary);">■</span> La <strong>pompe à chaleur air-air</strong> (ou PAC air-air) est réversible : elle puise la chaleur de l'<strong>air extérieur</strong> pour chauffer en hiver et rafraîchit en été en inversant le cycle.</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span style="position: absolute; left: 0; color: var(--color-primary);">■</span> Grâce à son <strong>fluide frigorigène</strong> et à la thermodynamique, elle permet jusqu'à 70% d'<strong>économies d'énergie</strong> par rapport à un radiateur électrique classique.</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span style="position: absolute; left: 0; color: var(--color-primary);">■</span> Facile à installer (sans réseau d'eau existant) via des <strong>unités intérieures</strong>, elle est idéale en rénovation et éligible à plusieurs primes (CEE).</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire du Guide</div>
                    <ul>
                        <li>1. Qu'est-ce qu'une Pompe à Chaleur Air-Air et Comment Fonctionne-t-elle ?</li>
                        <li>2. Avantages et Inconvénients : Le Vrai Coût du Confort</li>
                        <li>3. Prix et Coûts Réels : Investissement et Rentabilité</li>
                        <li>4. Quelles Aides Financières en 2026 pour Votre PAC Air-Air ?</li>
                        <li>5. Choisir, Installer et Dimensionner Votre PAC</li>
                        <li>6. Entretien et Durée de Vie : Assurer la Performance</li>
                        <li>7. PAC Air-Air vs Autres Systèmes : La Grande Comparaison</li>
                        <li>8. FAQ : Vos Questions Fréquentes sur la PAC Air-Air</li>
                    </ul>
                </div>

                <h2 id="fonctionnement">1. Qu'est-ce qu'une Pompe à Chaleur Air-Air et Comment Fonctionne-t-elle ?</h2>
                <p>La <strong>pompe à chaleur air-air</strong> est un dispositif qui puise l'énergie contenue dans l'air ambiant extérieur pour chauffer ou rafraîchir un logement. Elle offre une solution ultra polyvalente, s'adaptant aux besoins saisonniers.</p>

                <h3>1.1. La "clim réversible" optimisée</h3>
                <p>Souvent désignée par le grand public comme "climatisation réversible", la <strong>PAC air-air</strong> est un système optimisé pour extraire les calories de l'<strong>air extérieur</strong> même par temps froid et les diffuser efficacement à l'intérieur. Elle est bien plus qu'une simple clim grâce à son coefficient de performance (COP) de chauffage.</p>

                <h3>1.2. Le cycle thermodynamique illustré</h3>
                <p>Le <strong>fonctionnement de cette pompe à chaleur</strong> repose sur un cycle thermodynamique constant, qui utilise un <strong>fluide frigorigène</strong> :</p>
                <ol class="custom-list">
                    <li><strong>Évaporation :</strong> L'<strong>unité extérieure</strong> capte les calories de l'air. Le fluide, à basse pression, s'évapore en absorbant cette chaleur.</li>
                    <li><strong>Compression :</strong> Le compresseur augmente la pression et la température du fluide gazeux.</li>
                    <li><strong>Condensation :</strong> Le gaz très chaud circule vers les <strong>unités intérieures</strong> (splits). Il se condense et libère sa chaleur dans l'<strong>air intérieur</strong>. (En été, ce cycle est inversé).</li>
                    <li><strong>Détente :</strong> Le fluide, redevenu liquide sous haute pression, passe par un détendeur qui abaisse sa pression avant de recommencer le cycle.</li>
                </ol>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); height: auto; display: block;" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20air1.webp" alt="Schéma simplifé du fonctionnement thermodynamique d'une pompe à chaleur air-air">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">La circulation continue du fluide frigorigène permet le transfert massif des calories extérieures vers l'intérieur de la maison.</figcaption>
                </figure>

                <h3>1.3. Composants : Unité extérieure et Splits</h3>
                <p>Une <strong>pompe à chaleur air-air</strong> nécessite obligatoirement deux parties :</p>
                <ul class="custom-list">
                    <li>L'<strong>unité extérieure</strong> : Le bloc ventilé contenant le compresseur, souvent posé en façade ou au sol.</li>
                    <li>Les <strong>unités intérieures</strong> : Les "splits" (muraux, consoles, ou gainables invisibles en plafond), chacune diffusant le chaud ou le froid dans la pièce.</li>
                </ul>

                <h2 id="avantages">2. Avantages et Inconvénients : Le Vrai Coût du Confort Durable</h2>
                <p>Peser le pour et le contre est crucial lors d'un tel investissement énergétique.</p>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); height: auto; display: block;" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20air2.webp" alt="Installation d'une unité murale intérieure MSZ Mitsubishi ou Daikin dans un salon luxueux">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Les unités intérieures (splits) disposent désormais de designs ultra-modernes qui se fondent dans la décoration et fonctionnent en silence absolu.</figcaption>
                </figure>

                <h3>Les bénéfices majeurs</h3>
                <ul class="custom-list">
                    <li><strong>Économies d'énergie substantielles :</strong> Avec un <strong>coefficient performance</strong> (COP) tournant autour de 4, vous produisez 4 kWh de chaleur pour 1 kWh consommé. (Jusqu'à 70% d'économie vs radiateur grille-pain).</li>
                    <li><strong>Confort toute l'année :</strong> Réversible, elle chauffe en hiver et climatise en été. Fini les nuits d'inconfort lors des canicules d'août.</li>
                    <li><strong>Installation simple et flexible :</strong> Contrairement à la <a href="<?php echo BASE_URL; ?>pompe-a-chaleur-air-eau" style="text-decoration: underline;">pompe à chaleur air-eau</a> (qui nécessite des radiateurs à eau centralisés), l'air-air tire des gaines et des fils de cuivre frigorifique, idéal en rénovation pour cibler n'importe quelle pièce.</li>
                </ul>

                <h3>Les limites à connaître</h3>
                <p>Toutefois, quelques inconvénients techniques :</p>
                <ul class="custom-list">
                    <li><strong>Pas d'Eau Chaude :</strong> La PAC air-air <strong>ne produit pas</strong> d'eau chaude sanitaire (ECS). Il vous faudra conserver votre cumulus électrique vieillissant ou investir judicieusement dans un <a href="<?php echo BASE_URL; ?>ballon-thermodynamique" style="text-decoration: underline;">ballon d'eau chaude thermodynamique</a> indépendant.</li>
                    <li><strong>Bruit extérieur :</strong> Le moteur (groupe extérieur) tourne et vibre. Il ne faut pas le coller à la fenêtre de chambre du voisin ni à la vôtre (45 à 60 dB).</li>
                    <li><strong>Grand froid :</strong> Lors de températures extrêmes (-15°C), ses performances chutent nettement si elle n'est pas "hyper-inverter".</li>
                </ul>

                <h2 id="prix">3. Prix et Coûts Réels : Investissement et Rentabilité</h2>
                <p>Combien coûte concrètement le passage à cette technologie en 2026 ?</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de PAC Air-Air</th>
                                <th>Fourchette Matériel HT (€)</th>
                                <th>Pose & Mise en Service (€)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Monosplit (1 unité, pour 1 grande pièce)</strong></td>
                                <td>1 500 € - 3 500 €</td>
                                <td>500 € - 1 000 €</td>
                            </tr>
                            <tr>
                                <td><strong>Multisplit (2 à 5 unités intérieures)</strong></td>
                                <td>3 000 € - 8 000 €</td>
                                <td>1 200 € - 2 500 €</td>
                            </tr>
                            <tr>
                                <td><strong>Gainable (Unité cachée dans les combles + grilles)</strong></td>
                                <td>4 000 € - 12 000 €</td>
                                <td>2 000 € - 4 500 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); height: auto; display: block;" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20air3.webp" alt="Thermostat domotique connecté sur smartphone pour ajuster la température de chaque split de la maison">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">La gestion par zone (et via smartphone) permet des économies gigantesques en coupant le chauffage dans les chambres la journée.</figcaption>
                </figure>

                <!-- Form/Quote Hook Box -->
                <section class="highlight-box" style="background-color: #f7fcf0; border-left: 4px solid #8cc63f; padding: 25px; margin-top: 30px; margin-bottom: 20px; border-radius: 5px;">
                    <h3 style="color: #6aaa1a; margin-top: 0;">Simulez votre remplacement et coupez votre facture électrique</h3>
                    <p>En remplaçant vos vieux radiateurs par un système Multisplit haut rendement, l'amortissement s'effectue souvent entre 5 et 7 ans. Contactez nos techniciens RGE pour un chiffrage avec calepinage de pose gratuit !</p>
                    <div style="text-align:center; margin-top:1rem;">
                        <a href="<?php echo BASE_URL; ?>contact" class="cta-button" style="background-color: #8cc63f;">Demander un Devis de Rénovation Air-Air</a>
                    </div>
                </section>

                <h2 id="aides">4. Quelles Aides Financières en 2026 pour la PAC Air-Air ?</h2>
                <p>Bien que la <strong>pompe à chaleur air-air</strong> ne soit plus éligible à MaPrimeRénov' (désormais massivement réorientée vers l'<a href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite" style="text-decoration: underline;">isolation thermique extérieure ITE</a>, les chaudières biomasse ou la géothermie), de puissants coups de pouce restent valables !</p>

                <ul class="custom-list">
                    <li><strong>Prime Énergie (Certificats d'Économie d'Énergie - CEE) :</strong> Subvention majeure versée par les fournisseurs d'énergie. Son montant oscille en fonction de vos revenus et du SCOP de l'appareil implanté, et couvre en moyenne entre 200 € et 900 € sur l'enveloppe finale.</li>
                    <li><strong>TVA réduite à 10% :</strong> Applicable sur le matériel et la main d'œuvre aux domiciles datant de plus de deux ans !</li>
                </ul>

                <h2 id="choix-dimensionnement">5. Choisir, Installer et Dimensionner Votre PAC</h2>
                <p>Évitez les choix hasardeux : le sous-dimensionnement fait forcer le moteur à 100% en permanence (usure et facture), alors que le sur-dimensionnement l'abîme tout autant via des cycles "marche/arrêt" incessants et courts.</p>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); height: auto; display: block;" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20air4.webp" alt="Module extérieur de pompe chaleur fixé via silent-blocs en façade latérale d'une maison en crépi">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">L'installation sur l'extérieur demande une étude acoustique : elle doit être découplée par des "silent-blocs" pour éviter l'onde de vibration au mur de la maison.</figcaption>
                </figure>

                <ul class="custom-list">
                    <li><strong>SCOP > 4 :</strong> Pour exceller, exigez un SCOP au-delà de 4, qui garantira vos performances de chauffage sur toute la saison hivernale complète.</li>
                    <li><strong>L'artisan frigoriste RGE (Obligatoire) :</strong> Outre la caution de qualité des travaux, faire appel à un artisan qualifié <strong>Reconnu Garant de l'Environnement</strong> vous offre le seul biais légal d'accéder à la Prime Énergie, et il est seul habilité à manipuler le fluide frigorigène explosant ou polluant (R32) !</li>
                </ul>

                <h2 id="entretien">6. Entretien et Durée de Vie : Assurer la Performance</h2>
                <p>L'air de rien, le brassage continu de millions de m³ d'air tout au long de l'année finira par obstruer l'échangeur thermique avec la poussière.</p>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); height: auto; display: block;" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20air5.webp" alt="Nettoyage et purification à la vapeur des ailettes intérieures du split mural de pompe chaleur">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Tous les mois, prenez l'habitude de décrocher et rincer les filtres plastiques de vos unités intérieures à l'eau de douche. C'est le geste gratuit numéro un de prévention des pannes !</figcaption>
                </figure>

                <h3>Ce que dit la loi : 2 kg de Gaz</h3>
                <p>Pour tout produit thermique hébergeant un système de fluide de plus de 4 kW (la très grosse majorité des climatisations réversibles), la loi tranche sans détour : un <strong>contrat de maintenance tous les deux ans est absolument obligatoire</strong>. L'expert vérifiera l'étanchéité redoutable du système, la désinfection fongique des bacs à condensats, et les connectiques frigorifiques.</p>

                <h2 id="comparaisons">7. PAC Air-Air vs le reste du marché</h2>
                <p>Pour être certain de votre achat :</p>
                
                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Système de référence</th>
                                <th>Avantage de la PAC Air-Air</th>
                                <th>Inconvénient de la PAC Air-Air</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Face à l'Air-Eau</strong></td>
                                <td>Moins cher, sans gros travaux de tuyauterie, permet la climatisation intégrale.</td>
                                <td>Moins de primes de l'état (pas de MaPrimeRenov'), ne gère pas l'Eau chaude sanitaire de la salle de bain.</td>
                            </tr>
                            <tr>
                                <td><strong>Face aux radiateurs électriques</strong></td>
                                <td>Devient rapidement rentable, divise la consommation à l'usage par 3, confort thermodynamique d'été.</td>
                                <td>Coût de pose du système "Split + Extérieur" cher à débloquer en investissement direct.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); height: auto; display: block;" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20air6.webp" alt="Split soufflant de l'air chaud dans un espace de vie grand confort et parquet clair">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Le choix d'une PAC Air-Air Multisplit, c'est l'intelligence de distribuer les calories et la consigne directement dans les nuages thermiques des pièces à vivre.</figcaption>
                </figure>

                <h2 id="faq">8. FAQ - Vos Questions Fréquentes sur la PAC Air-Air</h2>
                <div class="faq-section">
                    <h3>Est-ce qu'une pompe à chaleur air-air suffit pour chauffer une maison ?</h3>
                    <p>Oui, de manière absolue. À la simple condition sine qua non de dimensionner les unités en prenant en compte les déperditions thermiques exactes de la maison étudiée. Les moteurs "Hyper Heating" sont capables d'apporter 100% du chauffage au confort même jusqu'à -15°C nocturne.</p>

                    <h3>Pourquoi ne faut-il pas acheter de pompe à chaleur air-air ?</h3>
                    <p>La règle cruelle est que si votre maison est une « passoire thermique » avérée (bâtiment des années 60, sans double vitrage, et pénalisée par une totale absence d'<a href="<?php echo BASE_URL; ?>isolation-des-combles-perdus" style="text-decoration: underline;">isolation au sein des combles perdus</a>), la PAC va pulvériser de l'air chaud et forcer qui s'échappera en 12 minutes. Dans ce cas, une intervention globale par l'isolation a beaucoup plus de sens en amont de toute démarche technique.</p>

                    <h3>Quelle est la durée de vie moyenne d'une pompe à chaleur air-air ?</h3>
                    <p>Avec les contrats obligatoires réguliers (tous les deux ans) et au rythme où l'obsolescence et l'électronique de puissance sur les Inverters s'abîment, on estime l'espérance de vie d'une machine posée dans les règles de l'art de 15 ans à 20 ans.</p>

                    <h3>Quel est le problème majeur d'une pompe à chaleur air-air ?</h3>
                    <p>Les deux freins demeurent son aspect extérieur (gros bloc disgracieux à gérer en façade ou sur le mur, particulièrement sur une structure classée aux "Bâtiments de France") et l'impossibilité totale de combler le poste ECS (il faudra un ballon thermodynamique dédié pour l'eau chaude de la douche).</p>

                    <h3>Une PAC air-air est-elle bruyante ?</h3>
                    <p>La donne a considérablement changé avec les puissants moteurs Brushless : les modules internes descendent de nos jours à un ronronnement de 19 décibels (un frôlement inaudible). Les groupes extérieurs soufflent eux vers 47 décibels, ce qui exige des silent-blocs pour ne pas se transmettre d'écho vibratoire fatal avec la chambre du dessous !</p>

                    <h3>Peut-on installer une PAC air-air soi-même ?</h3>
                    <p>Techniquement oui pour la structure, légalement non. De fait la réglementation F-Gaz de l'Union Européenne stipule l'obligation stricte que l'ouverture des vannes à gaz fluoré et l'assemblage complet sous l'azote soit signé des mains exclusives d'un technicien disposant de l'attestation légale de manipulation des fluides frigorigènes !</p>

                    <h3>Quelle est la consommation électrique d'une PAC air-air ?</h3>
                    <p>Selon l'excellente enquête et calcul de la RTE sur une surface moyenne nationale de France (100m2), pour usage combiné sur l'année de l'appareil... Vous payerez entre 450 et 750 euros par an. (Un coût de fonctionnement que vous pouvez d'ailleurs quasiment annuler en couplant l'installation avec des <a href="<?php echo BASE_URL; ?>panneaux-photovoltaiques" style="text-decoration: underline;">panneaux photovoltaïques en autoconsommation</a>).</p>

                    <h3>Une PAC air-air peut-elle aussi rafraîchir en été ?</h3>
                    <p>C'est sa fonction miroir inhérente ! Le compresseur va alors subtiliser la touffeur d'un air intérieur surchauffé pour en propulser l'énergie au dehors. Cette réversibilité offre dans ces temps de canicules un atout incommensurable sur le bien-être domestique que nul poêle à bois ni radiateur classique ne saurait concurrencer.</p>

                    <h3>La PAC air-air est-elle compatible avec les logements anciens ?</h3>
                    <p>C'est justement sa plus vaste cible de prédilection puisqu'en présence de bâtisse très ancienne sans tuyaux hydrauliques internes, la PAC Air-air passe en tirer dans des fourreaux invisibles ou sous gouttières pour aller innerver les différentes cloisons des pièces visées avec des dizaines d'années de différence technologique.</p>

                    <h3>Est-ce que les performances de la PAC air-air sont affectées par le froid ?</h3>
                    <p>Oui. Une fois à de très basses températures atmosphériques (sous les -10 degrés), puiser des molécules de chaleur est ardu thermodynamiquement, entrainant la redoutable mais inévitable dégringolade du COP qui reviendra sur un ratio catastrophique de seulement 1 kWh d'air produit pour 1 kWh consommé. Fort heureusement ces climats restent cantonnés de nos jours à quelques heures l'année en France hors altitude.</p>
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
                    <p>Philippe diagnostique les pathologies des bâtiments depuis 20 ans. Il vous accompagne de A à Z : de l'ingénierie du confort par la ventilation jusqu'au dimensionnement strict de vos systèmes thermodynamiques selon vos DPE.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <section class="conclusion-box">
                <h2 style="color: #ffffff;">Conclusion : Un investissement judicieux été comme hiver</h2>
                <p style="margin-bottom: 0;">La <strong>pompe à chaleur air-air</strong> s'affiche brillamment comme un <strong>système de chauffage</strong> et de <strong>climatisation réversible</strong> ultra performant. Capable de neutraliser les ardeurs d'un août caniculaire comme les factures hivernales assommantes, elle séduit la massivité des rénovateurs car elle n'impose pas du tout la lourde refonte de toute la tuyauterie de la maison. Avec des <strong>économies d'énergie</strong> spectaculaires sur la dizaine d'années suivantes, sa pertinence actuelle face aux hausses des prix de l'énergie n'a jamais brillé aussi fort.</p>
            </section>

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
