<?php
// published: 2026-04-07 10:00
 * cours-cap-mecanique-auto-pdf.php
 */


$page_title       = "Cours CAP Mécanique Auto PDF – Toutes les fiches gratuites (2026)";
$page_description = "Retrouvez tous les cours CAP Mécanique Auto en PDF : moteur, freinage, embrayage, suspension, électricité… Des fiches de révision gratuites et complètes pour passer votre CAP dans les meilleures conditions.";


$article = [
    'title'          => "Cours CAP Mécanique Auto en PDF : les 18 fiches réunies ici",
    'subtitle'       => "Toutes les fiches de révision du programme CAP Maintenance des Véhicules, téléchargeables gratuitement. Moteur, transmission, freinage, électricité… tout est là, au même endroit.",
    'category'       => 'entretien',
    'category_name'  => 'Entretien & Réparation',
    'category_color' => '#dc2626',
    'tags'           => ['CAP Mécanique', 'Cours PDF', 'Révisions', 'Formation Auto'],
    'image'          => '/Image/cours-cap-mecanique-auto-pdf.webp',
    'date'          => '7 Avril 2026',
    'author'         => 'David',
    'author_role'    => 'Mécanicien expert & Fondateur',
    'author_img'     => '/Image/david.png',
    'author_bio'     => "David a passé 30 ans sous des voitures et en atelier. Il connaît le programme CAP Maintenance des Véhicules dans ses moindres détails — et il sait exactement ce que les examinateurs attendent à l'épreuve pratique.",
    'reading_time'   => '8 min',
];


$categories = [
    'assurance'  => ['name' => 'Assurance & Financement', 'color' => '#2563eb', 'slug' => 'assurance'],
    'entretien'  => ['name' => 'Entretien & Réparation',  'color' => '#dc2626', 'slug' => 'entretien'],
    'electrique' => ['name' => 'Électrique & Hybride',    'color' => '#059669', 'slug' => 'electrique'],
    'occasion'   => ['name' => 'Achat & Occasion',        'color' => '#7c3aed', 'slug' => 'occasion'],
    'moto'       => ['name' => 'Moto & 2 Roues',          'color' => '#ea580c', 'slug' => 'moto'],
    'permis'     => ['name' => 'Permis',                  'color' => '#0891b2', 'slug' => 'permis'],
];


// ─── Scan dynamique du Blog/ pour le linking interne ───
$current_slug       = pathinfo(__FILE__, PATHINFO_FILENAME);
$same_cat_articles  = [];
$all_other_articles = [];
$blog_dir           = __DIR__;


if (is_dir($blog_dir)) {
    $files = glob($blog_dir . '/*.php');
    foreach ($files as $file) {
        $file_slug = pathinfo($file, PATHINFO_FILENAME);
        if ($file_slug === $current_slug) continue;


        $other_article = null;
        $content       = file_get_contents($file);


        if (preg_match('/\$article\s*=\s*\[(.+?)\];/s', $content, $matches)) {
            try {
                eval('$other_article = [' . $matches[1] . '];');
            } catch (Throwable $e) {
                continue;
            }
        }


        if ($other_article && isset($other_article['title'])) {
            $other_article['slug']  = $file_slug;
            $other_article['url']   = '/Blog/' . $file_slug;
            $other_article['image'] = '/' . ltrim($other_article['image'] ?? '', '/');


            if (($other_article['category'] ?? '') === $article['category']) {
                $same_cat_articles[] = $other_article;
            }
            $all_other_articles[] = $other_article;
        }
    }
}


include __DIR__ . '/../header.php';
?>


<!-- ARTICLE HERO -->
<article>
    <section class="art-hero">
        <img src="<?php echo $article['image']; ?>"
             alt="Cours CAP Mécanique Auto en PDF — fiches de révision gratuites"
             class="art-hero-bg"
             width="1200" height="675" decoding="async">
        <div class="art-hero-overlay"></div>


        <div class="art-hero-container">
            <div class="art-hero-content">
                <nav class="art-breadcrumb">
                    <a href="/">Accueil</a>
                    <span class="art-bc-sep">/</span>
                    <a href="/<?php echo $article['category']; ?>"><?php echo $article['category_name']; ?></a>
                    <span class="art-bc-sep">/</span>
                    <span>Formation & Révisions</span>
                </nav>


                <div class="art-hero-tags">
                    <?php foreach ($article['tags'] as $tag): ?>
                        <span class="art-tag"><?php echo $tag; ?></span>
                    <?php endforeach; ?>
                </div>


                <h1><?php echo $article['title']; ?></h1>
                <p class="art-hero-sub"><?php echo $article['subtitle']; ?></p>


                <div class="art-hero-meta">
                    <div class="art-author-pill">
                        <img src="<?php echo $article['author_img']; ?>"
                             alt="<?php echo $article['author']; ?>"
                             width="40" height="40">
                        <div>
                            <strong>Par <?php echo $article['author']; ?></strong>
                            <span><?php echo $article['author_role']; ?></span>
                        </div>
                    </div>
                    <div class="art-meta-infos">
                        <span><?php echo $article['date']; ?></span>
                        <span>&bull;</span>
                        <span>Lecture <?php echo $article['reading_time']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- HORIZONTAL CATEGORY NAV -->
    <nav class="art-cat-nav">
        <div class="art-cat-nav-inner">
            <?php foreach ($categories as $slug_cat => $cat): ?>
                <a href="/<?php echo $slug_cat; ?>"
                    class="art-cat-link <?php echo $slug_cat === $article['category'] ? 'active' : ''; ?>"
                    style="--link-color: <?php echo $cat['color']; ?>">
                    <span class="art-cat-dot" style="background-color: <?php echo $cat['color']; ?>"></span>
                    <?php echo $cat['name']; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>


    <!-- ASYMMETRIC LAYOUT (70 / 30) -->
    <div class="art-layout-wrapper">


        <!-- MAIN CONTENT -->
        <div class="art-main-col">


            <!-- TL;DR -->
            <div class="art-tldr">
                <div class="art-tldr-title">L'essentiel à retenir (TL;DR)</div>
                <ul>
                    <li><strong>18 fiches PDF gratuites</strong> couvrant l'intégralité du référentiel CAP Maintenance des Véhicules.</li>
                    <li><strong>Structure logique :</strong> Moteur (fiches 1–8) → Transmission (9–11) → Châssis et freinage (12–16) → Électricité (17–18).</li>
                    <li><strong>Bonus inclus :</strong> un manuel de fiches pratiques d'atelier (Dunod) pour faire le lien entre théorie et gestes concrets.</li>
                    <li><strong>Conseils méthode</strong> pour optimiser vos révisions et ne pas rater les points de règlementation souvent demandés à l'examen.</li>
                </ul>
            </div>


            <!-- Table of Contents -->
            <div class="art-toc">
                <div class="art-toc-title">Dans ce dossier</div>
                <ol>
                    <li><a href="#intro-cap">Pourquoi ces fiches et comment les utiliser ?</a></li>
                    <li><a href="#fiches-moteur">Fiches 1 à 8 — Le moteur et son alimentation</a></li>
                    <li><a href="#fiches-transmission">Fiches 9 à 11 — Transmission</a></li>
                    <li><a href="#fiches-chassis">Fiches 12 à 16 — Châssis, suspension et freinage</a></li>
                    <li><a href="#fiches-electrique">Fiches 17 à 18 — Électricité</a></li>
                    <li><a href="#bonus-atelier">Bonus : fiches pratiques d'atelier</a></li>
                    <li><a href="#methode-revision">Comment bien réviser avec ces fiches ?</a></li>
                </ol>
            </div>


            <!-- ARTICLE CONTENT -->
            <div class="art-content">


                <!-- ── INTRO ── -->
                <h2 id="intro-cap">Pourquoi ces fiches et comment les utiliser ?</h2>


                <p>Vous préparez votre <strong>CAP Mécanique</strong> — que ce soit en candidat libre, en alternance, à distance ou en lycée pro — et vous cherchez des cours solides en PDF pour réviser efficacement ? Vous n'êtes vraiment pas seuls. C'est la question qu'on nous pose le plus régulièrement au garage : <em>"Est-ce que vous avez des fiches de cours CAP mécanique auto en PDF à télécharger ?"</em></p>


                <p>On a donc compilé les meilleures ressources disponibles et on vous les donne toutes ici, au même endroit. Les 18 fiches ci-dessous correspondent au <strong>référentiel officiel du CAP Maintenance des Véhicules</strong>. Chaque fiche est téléchargeable directement en PDF. Et pour aller encore plus loin, on a ajouté un manuel de fiches techniques pratiques d'atelier (Dunod) qui couvre les interventions concrètes : vidange, calage de distribution, remplacement de plaquettes, etc.</p>


                <div class="art-table-wrap">
                    <table class="art-table">
                        <thead>
                            <tr>
                                <th>Bloc</th>
                                <th>Fiches</th>
                                <th>Thèmes couverts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Moteur</strong></td>
                                <td>1 → 8</td>
                                <td>Principe, constitution, distribution, refroidissement, lubrification, dépollution, carburation, injection</td>
                            </tr>
                            <tr>
                                <td><strong>Transmission</strong></td>
                                <td>9 → 11</td>
                                <td>Embrayage, boîte de vitesses, joints de transmission</td>
                            </tr>
                            <tr>
                                <td><strong>Châssis & Freinage</strong></td>
                                <td>12 → 16</td>
                                <td>Suspension, direction, pneumatiques, freinage, commande de freins</td>
                            </tr>
                            <tr>
                                <td><strong>Électricité</strong></td>
                                <td>17 → 18</td>
                                <td>Batterie, éclairage et signalisation</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <!-- ── FICHES MOTEUR ── -->
                <h2 id="fiches-moteur">Fiches 1 à 8 — Le moteur et son alimentation</h2>


                <p>C'est le cœur du programme. Les notions s'enchaînent logiquement : principe → constitution → distribution → alimentation. Maîtriser ces huit chapitres vous donne une base solide pour tout le reste.</p>


                <!-- FICHE 01 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">01</span>
                        <span class="cap-fiche-title">Principe du moteur</span>
                    </div>
                    <p>C'est la base de tout : comprendre comment le moteur transforme l'énergie chimique du carburant en énergie mécanique. La fiche couvre la <strong>combustion</strong> (qui doit se faire par couches successives à 40 m/s sans atteindre la détonation), les notions fondamentales d'<strong>alésage et de course</strong>, le calcul de la <strong>cylindrée</strong> (Vt = π A² C N / 4), le <strong>rapport volumétrique</strong>, le <strong>couple moteur</strong> (C = F × l, en Nm) et les deux types de puissance : effective et spécifique. Un incontournable pour tout le reste du programme.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Principe-du-moteur.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 02 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">02</span>
                        <span class="cap-fiche-title">Constitution du moteur</span>
                    </div>
                    <p>On entre dans le détail des pièces qui composent le moteur : le <strong>bloc cylindres</strong> (sans chemise, avec chemises humides ou sèches), la <strong>culasse</strong> en alliage léger qui abrite bougies, chambres de combustion et soupapes, et le <strong>joint de culasse</strong> garant de l'étanchéité. La fiche détaille aussi les <strong>pistons et segments</strong> (coup de feu, étanchéité, racleur) ainsi que l'<strong>attelage mobile</strong> bielles/vilebrequin. En bonus : les particularités des moteurs diesel en injection directe vs indirecte.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Constitution-du-moteur.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 03 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">03</span>
                        <span class="cap-fiche-title">La distribution</span>
                    </div>
                    <p>La distribution, c'est l'ensemble des organes qui gèrent l'ouverture et la fermeture des soupapes. La fiche explique le rôle des <strong>soupapes</strong> (admission et échappement), le fonctionnement des <strong>poussoirs hydrauliques</strong> (qui maintiennent un contact permanent et suppriment les bruits), et l'<strong>arbre à cames</strong> qui tourne à la moitié du régime du vilebrequin. Les trois modes d'entraînement sont détaillés : par pignon, par chaîne et par <strong>courroie crantée</strong> — cette dernière étant silencieuse mais à remplacer périodiquement.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Distribution.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 04 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">04</span>
                        <span class="cap-fiche-title">Le refroidissement</span>
                    </div>
                    <p>Le moteur doit rester autour de 120°C : trop chaud → risque de grippage et auto-inflammation ; trop froid → mauvaise combustion et lavage des cylindres. La fiche compare le <strong>refroidissement à air</strong> (ailettes, simple mais non uniforme) et le <strong>refroidissement à eau</strong>, bien plus courant. Ce dernier fonctionne en circuit fermé avec pompe à eau, <strong>radiateur</strong> (échangeur air/eau), <strong>thermostat</strong> pour la régulation, vase d'expansion et moto-ventilateur électrique. Le liquide de refroidissement est un mélange eau + éthylène glycol.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Refroidissement.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 05 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">05</span>
                        <span class="cap-fiche-title">La lubrification</span>
                    </div>
                    <p>Sans lubrification, le moteur grippe en quelques secondes. La fiche couvre la <strong>pompe à huile</strong> (à engrenage ou à rotor), le <strong>limiteur de pression</strong> et la <strong>filtration</strong> avec son clapet by-pass de sécurité. Les deux types de graissage sont expliqués : sous pression (pour les paliers et l'arbre à cames) et par projection (pour les chemises et pistons). Côté lubrifiants, les normes <strong>SAE, ACEA et API</strong> sont détaillées, ainsi que la réglementation stricte sur les huiles usées (interdiction de les brûler ou jeter dans la nature).</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Lubrification.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 06 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">06</span>
                        <span class="cap-fiche-title">La dépollution</span>
                    </div>
                    <p>Un chapitre de plus en plus important avec le durcissement des normes environnementales. La fiche liste les gaz polluants issus de la combustion : <strong>CO, CO₂, NOx, HC imbrûlés, particules, ozone</strong>. Pour les moteurs à essence : <strong>catalyseur</strong> (platine, palladium, rhodium — élimine 90 % des polluants), régulation lambda (sonde λ), et canister. Pour le diesel : recirculation des gaz (EGR), <strong>filtre à particules (FAP)</strong> et catalyseur. Le tableau des normes <strong>Euro 4, 5 et 6</strong> est inclus, ainsi que le système de diagnostic embarqué EOBD.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-La-depollution.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 07 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">07</span>
                        <span class="cap-fiche-title">Carburation</span>
                    </div>
                    <p>La carburation, c'est l'alimentation du moteur en mélange air/essence. La fiche explique l'<strong>indice d'octane</strong> (pouvoir antidétonant), les <strong>biocarburants</strong> (E85 avec 85 % d'éthanol, E10 pour la majorité des véhicules post-2000) et les caractéristiques du mélange : dosé, vaporisé, homogénéisé. Les quatre dosages clés à retenir pour l'exam : parfait (1/14,7), de <strong>puissance maximale</strong> (1/12,5), de rendement maxi et <strong>stœchiométrique</strong> (1/14,7 pour la dépollution). Attention : l'essence sans plomb est riche en benzène, travaillez toujours dans un espace aéré.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Carburation.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 08 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">08</span>
                        <span class="cap-fiche-title">Injection d'essence</span>
                    </div>
                    <p>L'injection électronique a remplacé le carburateur sur tous les véhicules modernes. La fiche couvre la constitution complète du système (capteurs, pompe, régulateur, injecteurs, <strong>calculateur</strong>) et son fonctionnement : comment le calculateur détermine la quantité d'air aspirée via un <strong>débitmètre à fil chaud</strong> ou un capteur de pression, puis pilote la durée d'ouverture des injecteurs. Les corrections de dosage (démarrage à froid, accélération, sonde lambda, température) sont bien expliquées. Point sécurité : toujours travailler sur moteur froid, dans une zone ventilée.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Injection-essence.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- ── FICHES TRANSMISSION ── -->
                <h2 id="fiches-transmission">Fiches 9 à 11 — Transmission</h2>


                <p>Embrayage, boîte de vitesses, joints — des chapitres souvent bien représentés aux épreuves écrites et pratiques. Le lien entre le moteur et les roues n'a plus de secret pour vous.</p>


                <!-- FICHE 09 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">09</span>
                        <span class="cap-fiche-title">L'embrayage</span>
                    </div>
                    <p>L'embrayage accouple progressivement le moteur à la transmission au démarrage, et permet de débrayer temporairement pour changer de vitesse. La fiche détaille le <strong>disque d'embrayage</strong> (garnitures composites, ressorts amortisseurs, noyau cannelé), le <strong>diaphragme</strong> (ressort conique qui maintient le plateau presseur) et le fonctionnement en position embrayée/débrayée. Trois types de commandes sont présentés : à <strong>câble</strong>, <strong>hydraulique</strong> (comparable au freinage) et à <strong>rattrapage de garde automatique</strong>. Le couple transmissible dépend du diamètre du disque, des garnitures et de la force du diaphragme.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Embrayage.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 10 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">10</span>
                        <span class="cap-fiche-title">Boîte de vitesses</span>
                    </div>
                    <p>La boîte de vitesses adapte le couple moteur aux résistances variables de la route. La fiche explique le <strong>rapport de démultiplication</strong> (un grand pignon mené = couple multiplié, vitesse réduite), la constitution interne (arbre primaire monobloc, arbre secondaire avec pignons fous et crabots, fourchettes, synchroniseurs) et les <strong>trois phases de synchronisation</strong> : contact des cônes de friction, freinage-interdiction, crabotage. La marche arrière nécessite un troisième pignon intermédiaire. La lubrification se fait par <strong>barbotage</strong>.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Boite-de-vitesses.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 11 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">11</span>
                        <span class="cap-fiche-title">La transmission</span>
                    </div>
                    <p>La transmission transmet le mouvement de la boîte aux roues motrices. La fiche présente les différents <strong>joints de transmission</strong> : le joint flector (pour faibles angles), le <strong>joint de cardan</strong> (non homocinétique seul, homocinétique par paire), le <strong>joint tripode</strong> (homocinétique, permet de varier la longueur de la transmission) et le <strong>joint à billes</strong> (4 ou 6 billes, homocinétique, côté roue). Notion clé : une liaison homocinétique assure une transmission régulière quelle que soit l'orientation des arbres.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-La-transmission.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- ── FICHES CHÂSSIS ── -->
                <h2 id="fiches-chassis">Fiches 12 à 16 — Châssis, suspension et freinage</h2>


                <p>Des chapitres où les règles législatives sont souvent demandées à l'examen — profondeur de sculpture minimale, liquide DOT, doubles circuits indépendants… Ne les négligez pas.</p>


                <!-- FICHE 12 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">12</span>
                        <span class="cap-fiche-title">Suspension</span>
                    </div>
                    <p>La suspension maintient les roues en contact avec le sol (tenue de route) et absorbe les oscillations (confort). La fiche détaille les <strong>quatre mouvements de la caisse</strong> : roulis, tangage, pompage, lacet (+ cabrage et plongée). Le fonctionnement du ressort face à un obstacle est expliqué, ainsi que le calcul de raideur. Les <strong>amortisseurs hydrauliques télescopiques</strong> (mono ou bi-tubes) et les amortisseurs à gaz dissipent l'énergie sous forme de chaleur. La <strong>barre antiroulis</strong> limite le roulis en reliant les bras de suspension d'un même essieu.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Suspension.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 13 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">13</span>
                        <span class="cap-fiche-title">La direction</span>
                    </div>
                    <p>La direction permet au conducteur de modifier la trajectoire du véhicule. La fiche explique la <strong>démultiplication</strong> (fort rapport = facile mais imprécis à haute vitesse ; faible rapport = précis mais effort important). Les mécanismes détaillés sont : le <strong>boîtier de direction</strong> (4×4, camions) et la <strong>direction à crémaillère</strong> (légère, peu d'articulations). L'assistance est abordée dans ses trois formes : <strong>hydraulique</strong> (pompe + vérin + distributeur rotatif), <strong>électrique</strong> (moteur électrique selon l'effort du conducteur) et <strong>électro-hydraulique</strong>.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-La-direction.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 14 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">14</span>
                        <span class="cap-fiche-title">Les pneumatiques</span>
                    </div>
                    <p>Le seul point de contact entre le véhicule et la route — un chapitre à ne surtout pas négliger. La fiche couvre la <strong>constitution de l'enveloppe</strong> (bande de roulement, flanc, nappes d'armature, carcasse, tringle) et compare les structures <strong>diagonale et radiale</strong> (la radiale offrant une meilleure tenue de route). Les <strong>indices de vitesse et de charge</strong>, la législation (profondeur mini de sculpture : <strong>1,6 mm</strong>), le diagnostic d'usure anormal (sous-gonflage, sur-gonflage, défaut de parallélisme) et le gonflage tubeless sont bien expliqués.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Les-pneumatiques.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 15 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">15</span>
                        <span class="cap-fiche-title">Le freinage</span>
                    </div>
                    <p>Le freinage, c'est la sécurité active du véhicule. La fiche commence par les quatre conditions à remplir : <strong>efficacité, stabilité, progressivité, confort</strong>. L'énergie cinétique (Ec = ½ mv²) est transformée en chaleur par le système. La <strong>décélération</strong> dépend du coefficient d'adhérence µ et de l'efficacité du freinage — bloquer les roues réduit la décélération et fait perdre le contrôle. La législation impose deux circuits indépendants : circuit principal (6 m/s²) et circuit de secours (3 m/s²), avec maintien sur pente à 18 %.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Le-%20freinage.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 16 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">16</span>
                        <span class="cap-fiche-title">Commande de freins</span>
                    </div>
                    <p>Complémentaire du cours freinage, cette fiche entre dans le détail du circuit hydraulique. Le <strong>maître cylindre</strong> et ses composants convertissent l'effort pédale en pression hydraulique. Le <strong>maître cylindre tandem</strong> gère deux circuits indépendants pour la sécurité — si l'un lâche, l'autre assure 50 % du freinage. La séparation peut être en X ou en parallèle. Côté <strong>liquide de frein</strong> : DOT 3 (ébullition 205 °C), DOT 4 (230 °C) et DOT 5.1 (250 °C) — ne jamais mélanger liquide de synthèse et liquide minéral.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-La-commande-de-freins.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- ── FICHES ÉLECTRICITÉ ── -->
                <h2 id="fiches-electrique">Fiches 17 à 18 — Électricité</h2>


                <p>Deux fiches, mais des chapitres concrets et très présents aux épreuves pratiques. Les règles de sécurité sont aussi importantes que la théorie — elles tombent régulièrement à l'examen.</p>


                <!-- FICHE 17 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">17</span>
                        <span class="cap-fiche-title">La batterie</span>
                    </div>
                    <p>La batterie est le cœur du système électrique du véhicule. La fiche explique son <strong>principe électrochimique</strong> (deux électrodes Pb/PbO₂ dans une solution H₂SO₄), la réaction de décharge et de recharge, et la réalisation : 6 éléments de 2 V en série = <strong>12 V</strong>. Les caractéristiques clés à retenir : tension nominale 12 V, capacité 50 Ah, intensité de démarrage 300 A. Point réglementation : recharger dans un local aéré, éviter toute étincelle (risque d'explosion), porter gants et lunettes, et toujours arrêter le chargeur avant de brancher/débrancher.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-La-batterie.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- FICHE 18 -->
                <div class="cap-fiche-card">
                    <div class="cap-fiche-header">
                        <span class="cap-fiche-num">18</span>
                        <span class="cap-fiche-title">Éclairage et signalisation</span>
                    </div>
                    <p>Dernière fiche du programme : l'éclairage et la signalisation, réglementés par le décret n°2001-1362. La fiche couvre les <strong>feux de position</strong> (blancs à l'avant, rouges à l'arrière, visibles à 150 m), les <strong>projecteurs</strong> (feux de croisement asymétriques, feux de route à 100 m minimum), les différents types de lampes (<strong>halogène à iode, décharge au xénon</strong>, bi-xénon), les feux antibrouillard, les <strong>indicateurs de direction</strong> (lumière orangée clignotante) et les feux stop/recul. Un chapitre concret, très présent aux épreuves pratiques.</p>
                    <a class="cap-fiche-link" href="https://admin.fortrainjobs.com/uploads/CAP/CAP-Mecanique-Eclairage-et-signalisation.pdf" rel="nofollow noopener" target="_blank">↓ Télécharger la fiche PDF</a>
                </div>


                <!-- ── BONUS ── -->
                <h2 id="bonus-atelier">Bonus : fiches pratiques d'atelier (interventions concrètes)</h2>


                <p>En complément des 18 fiches théoriques ci-dessus, on vous recommande ce <strong>recueil de fiches de maintenance automobile</strong> issu d'un ouvrage Dunod (<em>Technologie fonctionnelle de l'automobile</em>). Il aborde les interventions pratiques que vous ferez vraiment en atelier, avec les gestes concrets, les outils, les mesures et les tolérances constructeur :</p>


                <ul>
                    <li>Vidange moteur, réglage du jeu aux soupapes, remplacement du liquide de refroidissement</li>
                    <li>Contrôle des compressions, dépose et repose de culasse, remplacement des soupapes</li>
                    <li>Contrôle de l'usure des cylindres, calage de la distribution</li>
                    <li>Contrôle du circuit d'injection, remplacement des plaquettes de freins et freins à tambour</li>
                    <li>Remplacement d'un embrayage, remplacement d'une transmission</li>
                    <li>Géométrie des trains, équilibrage des roues</li>
                </ul>


                <div class="art-tldr" style="border-left-color: #dc2626; background-color: #111111; color: #ffffff; margin-top: 28px;">
                    <div class="art-tldr-title" style="color: #ffffff;">📚 Télécharger le manuel pratique d'atelier</div>
                    <p style="margin: 0 0 10px; color: #cccccc;">Fiches pratiques issues de l'ouvrage Dunod — Bruno Collomb (<em>Technologie fonctionnelle de l'automobile</em>).</p>
                    <a href="http://y.odoul.free.fr/maint.pdf" rel="nofollow noopener" target="_blank"
                       style="display:inline-block; background:#dc2626; color:#fff; font-weight:700; padding:10px 22px; border-radius:6px; text-decoration:none; font-size:.9rem;">
                        ↓ Télécharger les fiches pratiques (PDF)
                    </a>
                    <p style="margin: 10px 0 0; color: #777; font-size:.82rem;">Source : y.odoul.free.fr — ressource externe, tous droits réservés à leurs auteurs.</p>
                </div>


                <!-- ── MÉTHODE RÉVISION ── -->
                <h2 id="methode-revision">Comment bien réviser avec ces fiches pour réussir votre CAP ?</h2>


                <p>Avoir les fiches ne suffit pas — encore faut-il les travailler dans le bon ordre et avec la bonne méthode. Voici ce qu'on conseille à tous les candidats qui passent par notre garage pour leur formation pratique :</p>


                <ol>
                    <li><strong>Commencez par le moteur (fiches 1 à 8).</strong> C'est le cœur du programme et les notions s'enchaînent logiquement : principe → constitution → distribution → alimentation. Maîtriser ces chapitres vous donne une base solide pour tout le reste.</li>
                    <li><strong>Enchaînez avec la transmission (fiches 9 à 11).</strong> Embrayage, boîte de vitesses, joints — des chapitres souvent bien représentés aux épreuves écrites et pratiques.</li>
                    <li><strong>Finissez avec le châssis et l'électricité (fiches 12 à 18).</strong> Les règles législatives (profondeur sculpture 1,6 mm, liquide DOT, deux circuits indépendants…) sont fréquemment demandées à l'examen. Ne les survolez pas.</li>
                    <li><strong>Appuyez-vous sur les fiches d'atelier</strong> pour faire le lien entre la théorie et la pratique. Ce manuel détaille les gestes concrets, les outils, les mesures et les tolérances constructeur.</li>
                    <li><strong>Testez vos connaissances.</strong> Après chaque fiche lue, reformulez le cours dans vos propres mots sans regarder. Les QCM disponibles sur <a href="https://www.formationscap.com/quiz-cap-mecanique" rel="nofollow noopener" target="_blank">formationscap.com</a> (plus de 50 quiz) sont parfaits pour valider vos acquis.</li>
                </ol>


                <blockquote class="art-blockquote">
                    Ce qui fait la différence à l'épreuve pratique, ce n'est pas d'avoir tout mémorisé — c'est d'avoir compris le "pourquoi" derrière chaque geste. Un apprenti qui comprend pourquoi on ne mélange jamais DOT 3 et liquide minéral ne l'oubliera jamais.
                    <cite>— David, mécanicien expert, Garage Raymond</cite>
                </blockquote>


                <!-- Styles des cartes fiches -->
                <style>
                .cap-fiche-card {
                    background: #111111;
                    border: 1px solid #2a2a2a;
                    border-radius: 10px;
                    padding: 24px 26px;
                    margin-bottom: 20px;
                    transition: border-color .2s;
                }
                .cap-fiche-card:hover { border-color: #dc2626; }
                .cap-fiche-header {
                    display: flex;
                    align-items: center;
                    gap: 14px;
                    margin-bottom: 14px;
                }
                .cap-fiche-num {
                    flex-shrink: 0;
                    width: 34px;
                    height: 34px;
                    background: #dc2626;
                    color: #fff;
                    font-weight: 800;
                    font-size: .8rem;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-family: inherit;
                }
                .cap-fiche-title {
                    font-size: 1.1rem;
                    font-weight: 700;
                    color: #ffffff;
                }
                .cap-fiche-card p {
                    color: #bbb;
                    font-size: .96rem;
                    line-height: 1.75;
                    margin-bottom: 16px;
                }
                .cap-fiche-card strong { color: #e5e5e5; }
                .cap-fiche-link {
                    display: inline-block;
                    font-size: .8rem;
                    font-weight: 700;
                    letter-spacing: .06em;
                    text-transform: uppercase;
                    color: #dc2626;
                    border: 1.5px solid #dc2626;
                    border-radius: 999px;
                    padding: 6px 18px;
                    text-decoration: none;
                    transition: background .2s, color .2s;
                }
                .cap-fiche-link:hover {
                    background: #dc2626;
                    color: #fff;
                }
                </style>


            </div><!-- /.art-content -->


            <!-- Premium Author Box -->
            <div class="art-author-box">
                <img src="<?php echo $article['author_img']; ?>"
                     alt="<?php echo $article['author']; ?>"
                     class="art-author-avatar"
                     width="80" height="80">
                <div class="art-author-info">
                    <span class="art-author-label">La Parole à l'Expert</span>
                    <h3><?php echo $article['author']; ?></h3>
                    <span class="art-author-role"><?php echo $article['author_role']; ?></span>
                    <p><?php echo $article['author_bio']; ?></p>
                    <a href="/equipe" class="art-author-link">Découvrir toute la rédaction</a>
                </div>
            </div>


            <!-- Heavy Conclusion Box -->
            <div class="art-conclusion" style="background-color: #111111; color: #ffffff;">
                <h2 style="color: #ffffff;">Le mot de la fin</h2>
                <p style="color: #ffffff;">Le CAP Maintenance des Véhicules, ça se prépare avec méthode. Ces 18 fiches constituent une base solide, mais c'est la pratique en atelier qui fait vraiment la différence le jour de l'examen. Si vous cherchez un garage pour des heures de pratique encadrée ou pour votre alternance, vous savez où nous trouver. Bon courage à tous les candidats — vous allez y arriver. 💪</p>
            </div>


            <!-- Similar Articles Grid (dynamique) -->
            <section class="art-related">
                <h2 class="art-related-title">Poursuivre la lecture dans <a href="/<?php echo $article['category']; ?>"><?php echo $article['category_name']; ?></a></h2>
                <div class="art-related-grid">
                    <?php if (!empty($same_cat_articles)): ?>
                        <?php foreach (array_slice($same_cat_articles, 0, 3) as $rel): ?>
                            <a href="<?php echo $rel['url']; ?>" class="art-related-card">
                                <div class="art-related-img">
                                    <img src="<?php echo htmlspecialchars($rel['image']); ?>"
                                         alt="<?php echo htmlspecialchars($rel['title']); ?>"
                                         width="400" height="225" loading="lazy">
                                </div>
                                <div class="art-related-body">
                                    <h3><?php echo htmlspecialchars($rel['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($rel['subtitle'] ?? ''); ?></p>
                                    <span class="art-related-meta"><?php echo htmlspecialchars($rel['author'] ?? 'Rédaction'); ?> &bull; <?php echo htmlspecialchars($rel['date'] ?? ''); ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php elseif (!empty($all_other_articles)): ?>
                        <?php foreach (array_slice($all_other_articles, 0, 3) as $rel): ?>
                            <a href="<?php echo $rel['url']; ?>" class="art-related-card">
                                <div class="art-related-img">
                                    <img src="<?php echo htmlspecialchars($rel['image']); ?>"
                                         alt="<?php echo htmlspecialchars($rel['title']); ?>"
                                         width="400" height="225" loading="lazy">
                                </div>
                                <div class="art-related-body">
                                    <h3><?php echo htmlspecialchars($rel['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($rel['subtitle'] ?? ''); ?></p>
                                    <span class="art-related-meta"><?php echo htmlspecialchars($rel['author'] ?? 'Rédaction'); ?> &bull; <?php echo htmlspecialchars($rel['date'] ?? ''); ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p style="color: #666; padding: 20px 0;">D'autres articles arrivent bientôt dans cette catégorie !</p>
                    <?php endif; ?>
                </div>
            </section>


        </div><!-- /.art-main-col -->


        <!-- ASYMMETRIC RIGHT SIDEBAR (dynamique) -->
        <aside class="art-sidebar-right">
            <div class="art-sidebar-sticky">


                <?php if (!empty($same_cat_articles)): ?>
                    <div class="art-sidebar-block">
                        <div class="art-sidebar-block-title">Dans ce dossier</div>
                        <?php foreach (array_slice($same_cat_articles, 0, 3) as $sa): ?>
                            <a href="<?php echo $sa['url']; ?>" class="art-side-card">
                                <div class="art-side-img">
                                    <img src="<?php echo htmlspecialchars($sa['image']); ?>"
                                         alt="<?php echo htmlspecialchars($sa['title']); ?>"
                                         width="160" height="90" loading="lazy">
                                    <span class="art-side-cat-pill"
                                          style="background: <?php echo $article['category_color']; ?>"><?php echo $article['category_name']; ?></span>
                                </div>
                                <h4><?php echo htmlspecialchars($sa['title']); ?></h4>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


                <?php if (!empty($all_other_articles)): ?>
                    <div class="art-sidebar-block">
                        <div class="art-sidebar-block-title">À la Une</div>
                        <?php foreach (array_slice($all_other_articles, 0, 3) as $ra): ?>
                            <a href="<?php echo $ra['url']; ?>" class="art-side-card">
                                <div class="art-side-img">
                                    <img src="<?php echo htmlspecialchars($ra['image']); ?>"
                                         alt="<?php echo htmlspecialchars($ra['title']); ?>"
                                         width="160" height="90" loading="lazy">
                                </div>
                                <h4><?php echo htmlspecialchars($ra['title']); ?></h4>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


                <?php if (empty($same_cat_articles) && empty($all_other_articles)): ?>
                    <div class="art-sidebar-block">
                        <div class="art-sidebar-block-title">Explorer</div>
                        <a href="/<?php echo $article['category']; ?>" class="btn-primary"
                           style="display:block; text-align:center; background-color: <?php echo $article['category_color']; ?>; border-color: <?php echo $article['category_color']; ?>; margin-top: 15px;">
                            Voir tous les articles <?php echo $article['category_name']; ?>
                        </a>
                    </div>
                <?php endif; ?>


            </div>
        </aside>


    </div><!-- /.art-layout-wrapper -->
</article>


<!-- Schema JSON-LD -->
<script type="application/ld+json">
<?php
$schema = [
    "@context" => "https://schema.org",
    "@graph"   => [
        [
            "@type"            => "Article",
            "mainEntityOfPage" => [
                "@type" => "WebPage",
                "@id"   => "https://garageraymond.fr/Blog/" . $current_slug
            ],
            "headline"      => $article['title'],
            "description"   => $article['subtitle'],
            "image"         => ["https://garageraymond.fr" . $article['image']],
            "datePublished" => "2026-04-07T10:00:00+02:00",
            "dateModified"  => "2026-04-07T10:00:00+02:00",
            "author"        => [
                "@type"    => "Person",
                "name"     => $article['author'],
                "url"      => "https://garageraymond.fr/equipe",
                "jobTitle" => $article['author_role']
            ],
            "publisher" => [
                "@type" => "Organization",
                "name"  => "Le garage expert Auto",
                "url"   => "https://garageraymond.fr",
                "logo"  => [
                    "@type"  => "ImageObject",
                    "url"    => "https://garageraymond.fr/Image/favicon.png",
                    "width"  => "512",
                    "height" => "512"
                ]
            ]
        ]
    ]
];
echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>
</script>


<?php include __DIR__ . '/../footer.php'; ?>