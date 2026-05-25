<?php
/**
 * pompe-a-chaleur-air-eau.php
 * Article: Pompe à Chaleur Air-Eau
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Pompe à chaleur air-eau : prix, fonctionnement et aides en 2026',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/pompe%20a%20chaleur%20air%20eau7.webp',
    'excerpt' => 'Découvrez le guide complet sur la pompe à chaleur air eau : fonctionnement, avantages, prix, aides financières, installation et conseils d\'experts. Économisez de l\'énergie avec un chauffage écologique.',
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
                    href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Pompe à Chaleur Air Eau</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Chauffage</span>
                <span class="article-tag">Écologie</span>
            </div>

            <h1>Pompe à chaleur air-eau :<br>
                <span class="h1-accent">Fonctionnement, Prix et Aides en 2026</span>
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
                Face à l'urgence climatique et à la flambée de l'énergie, la <strong>pompe à chaleur air eau</strong>
                s'impose comme une solution de <strong>chauffage</strong> et de production d'<a href="<?php echo BASE_URL; ?>ballon-thermodynamique" style="text-decoration: underline;">eau chaude sanitaire thermodynamique (ECS)</a> évidente. Capable de récupérer les calories gratuites de l'<strong>air
                    extérieur</strong>, elle promet un confort thermique optimal pour un coût de revient minime.
            </p>

            <figure style="margin: 2rem 0; max-width: 100%;">
                <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20eau1.webp"
                    alt="Installation d'une unité extérieure de pompe à chaleur air-eau moderne en façade de maison">
                <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">L'unité extérieure est le cœur intelligent capable de puiser les calories de l'air ambiant,
                    même en plein hiver.</figcaption>
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
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> La
                            <strong>pompe à chaleur air eau</strong> divise vos factures par 3 en utilisant l'énergie
                            gratuite de l'<strong>air extérieur</strong> pour réchauffer votre circuit (radiateurs et
                            plancher).</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span>
                            L'<strong>installation</strong> ouvre droit à des primes colossales (MaPrimeRénov', Primes
                            CEE) plafonnant souvent les restes à charge.</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> Avec une
                            durée de vie de 15 à 20 ans, cette technologie réversible se rentabilise en moins de 7 ans
                            pour la plupart des foyers français.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire de ce Guide</div>
                    <ul>
                        <li>1. Principe et fonctionnement d'une pompe à chaleur air eau
                        </li>
                        <li>2. Avantages vs. Inconvénients (Ce qu'il faut savoir)</li>
                        <li>3. Budget, Aides & Rentabilité</li>
                        <li>4. Choisir la puissance et le bon modèle (Monobloc/Bibloc)</li>
                        <li>5. Installation, Entretien et Réglementation en
                                vigueur</li>
                        <li>6. Les secrets pour maximiser la performance et le COP</li>
                        <li>7. Vos questions Fréquentes d'Experts</li>
                    </ul>
                </div>

                <h2 id="fonctionnement">1. Qu'est-ce qu'une pompe à chaleur air eau et comment fonctionne-t-elle ?</h2>
                <p>La <strong>pompe à chaleur air eau</strong>, ou <strong>PAC air-eau</strong>, est un générateur de
                    <strong>chaleur</strong> aérothermique. Elle "pompe" les calories naturellement contenues dans
                    l'<strong>air extérieur</strong>, et utilise un <strong>cycle thermodynamique</strong> de
                    compression pour relever cette température et l'insuffler dans le réseau d'<strong>eau de
                        chauffage</strong> (plancher chauffant, radiateurs à eau) et d'<strong>eau chaude
                        sanitaire</strong>.</p>

                <p>C'est le principe du réfrigérateur inversé :</p>
                <ol class="custom-list">
                    <li><strong>Évaporation :</strong> Un fluide frigorigène liquide, très froid, s'évapore au contact
                        de l'air capté dans l'<strong>unité extérieure</strong>.</li>
                    <li><strong>Compression :</strong> Le gaz évaporé est comprimé par un compresseur, ce qui augmente
                        violemment sa pression et sa température.</li>
                    <li><strong>Condensation :</strong> Le gaz très chaud transmet sa chaleur à l'<strong>eau
                            chauffage</strong> de vos émetteurs dans l'<strong>unité intérieure</strong>. En
                        refroidissant, il redevient liquide.</li>
                    <li><strong>Détente :</strong> Le liquide passe par un détendeur et refroidit énormément. Le cycle
                        recommence !</li>
                </ol>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20eau2.webp"
                        alt="Schéma illustratif d'un compresseur et du fluide parcourant la pompe thermodynamique">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">La qualité du compresseur Inverter détermine le rendement et la fiabilité globale du
                        système de chauffage.</figcaption>
                </figure>

                <h3>Monobloc ou Bibloc : Que choisir ?</h3>
                <p>Les <strong>pompes à chaleur air eau</strong> se divisent en deux grandes architectures thermiques :
                </p>
                <ul class="custom-list">
                    <li><strong>La PAC Monobloc :</strong> L'ensemble (évaporateur et compresseur) est installé 100% à
                        l'extérieur. De simples tuyaux hydrauliques relient l'appareil au réseau intérieur. C'est plus
                        simple, mais plus exposé au gel en cas de coupure de courant prolongée.</li>
                    <li><strong>La PAC Bibloc (Split) :</strong> Une <strong>unité extérieure</strong> capte l'air, et
                        les liaisons contenant du fluide frigorigène l'apportent à un "module hydraulique" situé à
                        l'intérieur. C'est la solution la plus vendue pour sa capacité à résister aux climats froids.
                    </li>
                </ul>

                <h2 id="avantages">2. Avantages, Inconvénients et Idées reçues (Ce qu'il faut savoir)</h2>
                <p>Investir dans une <strong>pompe chaleur air eau</strong> modifie profondément la gestion de votre
                    "confort" annuel.</p>

                <h3>Bénéfices Concrets (Les vrais plus)</h3>
                <ul class="custom-list">
                    <li><strong>Économique :</strong> Pour 1 kWh d'électricité consommé par le compresseur (électricité que vous pouvez très bien couvrir avec des <a href="<?php echo BASE_URL; ?>panneaux-photovoltaiques" style="text-decoration: underline;">panneaux photovoltaïques en autoconsommation</a>), la
                        <strong>pompe à chaleur air-eau</strong> restitue en moyenne de 3 à 4 kWh de
                        <strong>chaleur</strong> (c'est le fameux COP, "Coefficient de Performance"). C'est jusqu'à 60%
                        d'économie comparé au gaz ou au fioul.</li>
                    <li><strong>Multifonctionnelle (Réversibilité) :</strong> En inversant le cycle en été, elle devient
                        un climatiseur redoutable si vous possédez un plancher rafraîchissant ou des radiateurs
                        réversibles. Idéal contre les canicules !</li>
                    <li><strong>Écologique :</strong> Ce procédé ne génère pas de combustion directe de carbone dans
                        l'atmosphère, dopant de ce fait votre DPE et la plus-value immobilière de la bâtisse.</li>
                </ul>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20eau3.webp"
                        alt="Thermostat digital mural pour le réglage précis d'une PAC Air/Eau et du plancher chauffant">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">La domotique intégrée aux modèles actuels garantit un pilotage fin, de la zone jour à la
                        zone nuit.</figcaption>
                </figure>

                <h3>Limites techniques (Les bémols à accepter)</h3>
                <p>Bien sûr, l'<strong>installation pompe chaleur</strong> souffre de légers faux pas : Le coût de base
                    est très onéreux sans les aides, et l'efficacité chute lorsque les températures flirtent très bas
                    (-10°C). L'<strong>unité extérieure</strong> émet un léger bourdonnement (d'environ 35 à 50
                    décibels) qui exige de bien choisir l'emplacement par rapport aux voisins.</p>

                <h2 id="prix-aides">3. Budget, Aides & Rentabilité (Combien ça coûte ?)</h2>
                <p>Comprendre le coût de ce joyau de la réhabilitation thermique c'est aussi observer les très
                    puissantes primes disponibles en France.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Prestation & Modèle</th>
                                <th>Prix du Matériel Seul (€ HT)</th>
                                <th>Pose et Mise en service (€)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>PAC Air-Eau (Chauffage Seul) - 8kW à 12kW</strong></td>
                                <td>De 7 000 € à 11 000 €</td>
                                <td>2 000 € - 3 000 €</td>
                            </tr>
                            <tr>
                                <td><strong>PAC Air-Eau mixte (Chauffage + ECS 200L)</strong></td>
                                <td>De 9 000 € à 14 000 €</td>
                                <td>2 500 € - 4 000 €</td>
                            </tr>
                            <tr>
                                <td><strong>PAC Hybride (Relève de Chaudière)</strong></td>
                                <td>De 10 000 € à 16 000 €</td>
                                <td>3 000 € - 5 000 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>Les Aides et le coup de pouce 2026</h3>
                <p>Passer au vert avec une <strong>PAC air-eau</strong> n'a jamais été autant subventionné :</p>
                <ul class="custom-list">
                    <li><strong>MaPrimeRénov' de l'ANAH :</strong> Réservée aux logements de plus de 15 ans, elle peut
                        couvrir de 3000 à 9000 € pour les revenus classés très modestes ou modestes sur un changement
                        pur.</li>
                    <li><strong>Prime Coup de Pouce CEE :</strong> Distribuée par les pollueurs (fournisseurs d'énergie)
                        sous forme de chèques couvrant de 2500 à 4500€. Merveilleuse nouvelle : elle se cumule à
                        MaPrimeRénov' !</li>
                    <li><strong>TVA à 5,5% et Éco-PTZ :</strong> L'État concède une TVA basse pour les devis RGE,
                        accompagnée de prêts jusqu'à 50 000 €.</li>
                </ul>

                <!-- Form/Quote Hook Box -->
                <section class="highlight-box"
                    style="background-color: #f7fcf0; border-left: 4px solid #8cc63f; padding: 25px; margin-top: 30px; margin-bottom: 20px; border-radius: 5px;">
                    <h3 style="color: #6aaa1a; margin-top: 0;">Faites évaluer votre éligibilité totale !</h3>
                    <p>Entre le plafond de revenus et votre code postal, il est difficile de faire un chiffrage de tête.
                        Notre équipe RGE effectue d'abord une simulation totale : découvrez instantanément votre "Reste
                        à charge" certifié pour faire l'impasse sur votre consommation en fioul.</p>
                    <div style="text-align:center; margin-top:1rem;">
                        <a href="<?php echo BASE_URL; ?>contact" class="cta-button"
                            style="background-color: #8cc63f;">Simulateur des Primes et Devis sur Mesure</a>
                    </div>
                </section>

                <h2 id="choix-pac">4. Choisir sa PAC : Critères essentiels et puissances idéales</h2>
                <p>Un mauvais dimensionnement ruine l'espoir de baisse de facture.</p>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20eau4.webp"
                        alt="Installateur RGE testant l'étanchéité des raccordements frigorifiques d'un module hydrobox split">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Que ce soit Daikin, Atlantic, ou Viessmann, le choix du frigoriste et du type de gaz est
                        tout aussi capital que la marque à la carrosserie.</figcaption>
                </figure>

                <p>L'erreur la plus fâcheuse est le sous-dimensionnement, qui provoquera un appel continu aux
                    résistances électriques de secours. Le sur-dimensionnement, lui, entraîne des séquences de
                    "marche-arrêt" redondantes qui détruisent l'amortisseur du compresseur en 5 ans.</p>

                <p>Pour faire un sans faute :</p>
                <ul class="custom-list">
                    <li><strong>Regardez le SCOP :</strong> C'est la performance moyenne de l'année (et non le COP à un
                        moment T). Visez un SCOP > 4 !</li>
                    <li><strong>Demandez la nature des gaz :</strong> Les fabricants abandonnent peu à peu le très
                        polluant R410A au bénéfice exclusif des nouvelles technologies au R32 ou mieux, utilisant le
                        propane naturel (R290) !</li>
                </ul>

                <h2 id="installation-entretien">5. Installation, Entretien et Réglementation en Vigueur</h2>
                <p>L'<strong>installation pompe chaleur</strong> ne relève pas de l'amateurisme du dimanche. Un artisan
                    RGE QualiPAC est primordial pour débloquer les aides de l'état, de plus l'intervenant doit manipuler
                    l'attestation de capacité "fluides frigorigènes".</p>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20eau5.webp"
                        alt="Nettoyage et entretien bi-annuel des pales du ventilateur extrayant les calories de l'air">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Depuis le décret paru en France, l'entretien des systèmes frigorifiques entre 4 et 70 kW
                        est encadré légalement tous les deux ans.</figcaption>
                </figure>

                <h3>Un encadrement de loi stricte sur l'Entretien</h3>
                <p>Depuis le très sévère décret publié, la visite de maintenance pour une <strong>PAC air-eau</strong>
                    de 4 kW à 70 kW est rendue <strong>obligatoire tous les deux ans</strong>. L'artisan frigoriste
                    déballe les capots afin de tester la pression d'azote, relever les sondes de températures de chauffe
                    et traquer la micro-fuite de gaz sous le condenseur.</p>

                <h2 id="optimisation">6. Les secrets pour maximiser la performance et le COP</h2>
                <p>Beaucoup ignorent que l'on peut baisser sa consommation de 15% simplement en appliquant ces actions
                    magiques via le thermostat de la <strong>pompe à chaleur air eau</strong> :</p>

                <blockquote class="article-blockquote">
                    "La performance réelle est dominée par la "Loi d'eau". Abaisser votre courbe de départ d'eau dans
                    les tuyaux de 40 à 35°C (courbe de chauffe douce) fait exploser mécaniquement le rendement global du
                    compresseur ! Une PAC Air-Eau est taillée pour une émission douce, constante et pérenne."
                </blockquote>

                <ul class="custom-list">
                    <li><strong>Ne touchez pas au thermostat sans arrêt :</strong> Contrairement aux radiateurs
                        grille-pain qu'on allume au retour du travail, une température de consigne constante est le
                        grand maître d'optimisation d'une énergie thermodynamique ! Restez stable à 19°c !</li>
                    <li><strong>Laissez respirer le ventilateur extérieur :</strong> N'obstruez jamais l'<strong>unité
                            extérieure</strong> en construisant des abris pleins de lierre autour pour "cacher
                        l'installation". La machine a besoin de remuer plus de 2000 m3 d'air toutes les heures.</li>
                </ul>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/pompe%20a%20chaleur%20air%20eau6.webp"
                        alt="Radiateur à eau basse température design en aluminium couplé à la thermie de la pompe chaleur air eau">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">L'usage de radiateurs de surface conséquente "basse température" maximise le transfert
                        d'énergie calorifique !</figcaption>
                </figure>

                <h2 id="faq">7. FAQ - Vos questions d'Experts</h2>
                <div class="faq-section">
                    <h3>Quelles sont les marques de pompes à chaleur air-eau les plus fiables ?</h3>
                    <p>Les marques comme Daikin, Mitsubishi Electric, Atlantic, Saunier Duval, et Viessmann sont
                        réputées pour la fiabilité et la performance de leurs pompes à chaleur air-eau. Le choix
                        dépendra de vos besoins spécifiques, de la puissance requise en kW et du budget disponible.</p>

                    <h3>Une pompe à chaleur air-eau est-elle bruyante ?</h3>
                    <p>Les PAC modernes Inverter sont de plus en plus silencieuses. Le niveau sonore de l'unité
                        extérieure, exprimé en décibels, est un critère de choix important (viser entre 35 et 45 db).
                        Des solutions très pratiques comme des plots anti-vibratiles et un socle béton lissé peuvent
                        réduire à néant la nuisance.</p>

                    <h3>Peut-on installer une PAC air-eau dans un appartement ?</h3>
                    <p>L'installation est nettement plus complexe en appartement et au treizième étage en raison de
                        l'obligation de poser l'unité extérieure. Elle nécessite formellement l'accord du syndic de la
                        copropriété et des contraintes d'espace drastiques en balcon. Les <a href="<?php echo BASE_URL; ?>pompe-a-chaleur-air-air" style="text-decoration: underline;">pompes à chaleur air-air</a> (climatisations) sont par conséquent souvent privilégiées en immeuble résidentiel collectif.</p>

                    <h3>Quel type de radiateurs est compatible avec une PAC air-eau ?</h3>
                    <p>Absolument toutes ! Seulement, les PAC air-eau fournissent les économies les plus titanesques
                        lorsqu'elles sont reliées aux terminaux de "basse température" comme les merveilleux planchers
                        chauffants ou les immenses radiateurs en fonte "chaleur douce", qui demandent une eau à 35°C au
                        lieu de 65°C.</p>

                    <h3>Que signifie le terme "réversible" pour une PAC air-eau ?</h3>
                    <p>Une pompe à chaleur air-eau "réversible" intègre une vanne cyclique (vanne 4 voies) prévue pour
                        inverser l'absorption pure de la chaleur. En été, elle "brûlera" les calories résiduelles de
                        votre maison et y enverra en échange une eau froide de 18°C dans le plancher pour tempérer à la
                        perfection le placo.</p>

                    <h3>Est-ce que les PAC sont soumises à une maintenance obligatoire ?</h3>
                    <p>Oui sans l'ombre d'un doute. Pour les systèmes de confort et PAC dont la puissance nominale
                        dépasse les 4 kW (95% des modèles du marché de la maison individuelle), un entretien légal par
                        un frigoriste reconnu qualifié est de rigueur tous les deux ans.</p>

                    <h3>Faut-il garder sa chaudière en appoint avec une PAC air-eau ?</h3>
                    <p>Dans un contexte où l'enveloppe globale (notamment l'<a href="<?php echo BASE_URL; ?>isolation-des-murs" style="text-decoration: underline;">isolation des murs maçonnés</a> et de la célèbre <a href="<?php echo BASE_URL; ?>isolation-des-combles-perdus" style="text-decoration: underline;">isolation soufflée des combles perdus</a>) ne peut être rénovée d'un seul coup
                        (logements dits "passoires" F ou G), nos plombiers chauffagistes exigent de garder la chaudière à gaz
                        de ville ou au fioul existante dans le seul but de la faire prendre le relais sur les températures très
                        froides de février. C'est le principe indéboulonnable d'une relève de chaudière.</p>

                    <h3>Comment vérifier l'éligibilité à MaPrimeRénov' pour une PAC air-eau ?</h3>
                    <p>L'éligibilité relève de deux facteurs essentiels : l'historique du bien (livré depuis plus de 15
                        ans consécutifs) ainsi que de la ligne du Revenu Fiscal de Référence. Il y a 4 catégories de
                        plafonds France (Bleu, Jaune, Violet, Rose) que nos courtiers étudient précisément lors de votre
                        1er RDV.</p>
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
                <h2 style="color: #ffffff;">Conclusion : Un investissement stratégique !</h2>
                <p style="margin-bottom: 0;">La <strong>pompe à chaleur air eau</strong> n'est plus une niche, elle
                    s'affiche comme la ligne droite vers la transition climatique de votre cocon grâce aux transferts
                    des énergies fluides de l'<strong>air extérieur</strong> ! De ses prouesses hivernales aux vertus de
                    confort d'un climatiseur en été, cet astucieux bijou techniquement affuté promet de neutraliser le
                    coup de boutoir annuel qu'est la facture de février de votre antique chaudière. Accompagné des
                    experts, avec le bon calcul et une enveloppe d'aide optimisée ? L'avenir vous appartient.</p>
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