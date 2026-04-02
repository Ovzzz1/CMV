<?php
// published: 2026-04-06 10:00
 * traitement-anti-corrosion-chassis-voiture.php
 */


$page_title       = "Traitement anti corrosion châssis voiture : le guide d'expert (causes, solutions et prévention)";
$page_description = "Comment traiter la corrosion du châssis de votre voiture ? Guide complet : causes, décapage, convertisseur de rouille, piège du Blackson et prévention. Conseils d'experts.";


$article = [
    'title'          => "Traitement anti corrosion châssis voiture : le guide d'expert",
    'subtitle'       => "Causes, solutions et prévention : tout ce qu'il faut savoir pour décaper, traiter et protéger le châssis de votre voiture — avec les vrais conseils du terrain, pas les raccourcis qui font pourrir votre soubassement de l'intérieur.",
    'category'       => 'entretien',
    'category_name'  => 'Entretien & Réparation',
    'category_color' => '#dc2626',
    'tags'           => ['Anti-corrosion', 'Châssis', 'Traitement rouille', 'Entretien voiture'],
    'image'          => '/Image/traitement-anti-corrosion-chassis-voiture.webp',
    'date'          => '6 Avril 2026',
    'author'         => 'David',
    'author_role'    => 'Mécanicien expert & Fondateur',
    'author_img'     => '/Image/david.png',
    'author_bio'     => "David a passé 30 ans sous des voitures, couché sur des chandelles, à gratter de la rouille et tester des produits. Il connaît chaque pièce du châssis par son nom et ne mâche pas ses mots quand un produit ne vaut rien.",
    'reading_time'   => '9 min',
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


<!-- ═══════════════════════════════════════════════════════ -->
<!-- ARTICLE HERO                                            -->
<!-- ═══════════════════════════════════════════════════════ -->
<article>
    <section class="art-hero">
        <img src="<?php echo $article['image']; ?>"
             alt="Traitement anti-corrosion châssis voiture : soubassement décapé et traité à la brosse métallique"
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
                    <span>Guide Technique</span>
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


            <!-- TL;DR Dashboard Box -->
            <div class="art-tldr">
                <div class="art-tldr-title">L'essentiel à retenir (TL;DR)</div>
                <ul>
                    <li><strong>Le problème :</strong> La rouille du châssis est structurelle — un longeron perforé, c'est un refus au contrôle technique et un vrai risque sécurité.</li>
                    <li><strong>Les causes :</strong> Terre accumulée (effet éponge), sel de déneigement, micro-impacts de gravillons et eau stagnante dans les corps creux.</li>
                    <li><strong>La méthode :</strong> 3 étapes obligatoires — décapage mécanique (meuleuse + brosse cloche), traitement chimique (convertisseur de rouille), puis protection (primaire époxy + cire corps creux).</li>
                    <li><strong>Le piège à éviter :</strong> Mettre du Blackson (anti-gravillon) directement sur de la rouille non traitée — c'est le meilleur moyen de faire pourrir son châssis de l'intérieur en silence.</li>
                    <li><strong>DIY ou pro :</strong> Comptez 100–150 € de produits en autonome, entre 600 et 1 500 € en garage selon le gabarit et l'état d'avancement de la corrosion.</li>
                </ul>
            </div>


            <!-- Table of Contents -->
            <div class="art-toc">
                <div class="art-toc-title">Dans ce guide</div>
                <ol>
                    <li><a href="#definition-corrosion">Qu'est-ce que la corrosion du châssis et quels risques ?</a></li>
                    <li><a href="#causes-rouille">Quelles sont les vraies causes de la rouille sous le véhicule ?</a></li>
                    <li><a href="#traitement-rouille">Comment réparer et traiter un châssis déjà piqué ?</a></li>
                    <li><a href="#diagnostic-outil">Outil : trouvez votre solution sur-mesure</a></li>
                    <li><a href="#prevention">Prévention : comment protéger son châssis à l'avenir ?</a></li>
                    <li><a href="#faq-corrosion">FAQ : vos questions sur la corrosion automobile</a></li>
                </ol>
            </div>


            <!-- ═══════════════════════════════════════════════════════ -->
            <!-- ARTICLE CONTENT                                         -->
            <!-- ═══════════════════════════════════════════════════════ -->
            <div class="art-content">


                <p>La rouille est l'ennemi invisible de tout véhicule. Qu'elle soit de surface ou perforante, la corrosion du châssis ne pardonne pas et finit toujours par se propager si elle n'est pas stoppée à temps. Comment réparer une tôle déjà piquée ? Faut-il poncer, appliquer un destructeur de rouille ou utiliser un convertisseur ? Croyez-en notre expérience au garage : traiter les soubassements de sa voiture demande de la méthode et surtout, de choisir les bons produits pour ne pas empirer la situation. Voici notre guide complet pour comprendre, éliminer et prévenir la corrosion de votre châssis.</p>


                <!-- ── H2 : DÉFINITION ── -->
                <h2 id="definition-corrosion">Qu'est-ce que la corrosion du châssis et quels risques pour votre voiture ?</h2>


                <p>La corrosion est une réaction chimique naturelle : lorsque l'acier de votre voiture entre en contact avec l'oxygène et l'humidité, il s'oxyde. Sous le véhicule, cette oxydation attaque en priorité les <strong>longerons</strong>, le <strong>berceau moteur</strong> et le <strong>plancher</strong> — soit l'ossature même de la voiture.</p>


                <p>Les risques ne sont pas qu'esthétiques, ils sont avant tout structurels. Un châssis fortement corrodé perd sa rigidité et compromet directement la sécurité du véhicule en cas de choc. D'un point de vue réglementaire, la sanction est immédiate : une corrosion perforante ou une faiblesse au niveau des points d'ancrage entraîne un <strong>refus catégorique au contrôle technique</strong>. Dans les cas les plus extrêmes, si la réparation par soudure est économiquement irréalisable, la voiture peut tout simplement finir à la casse.</p>


                <blockquote class="art-blockquote">
                    J'ai vu des châssis de SUV familiaux refusés au contrôle technique à cause d'un longeron perforé invisible depuis l'extérieur. Le Blackson avait tout recouvert — et la tôle pourrissait en silence depuis des années.
                    <cite>— David, mécanicien expert, Garage Raymond</cite>
                </blockquote>


                <!-- ── H2 : CAUSES ── -->
                <h2 id="causes-rouille">Quelles sont les vraies causes de la rouille sous le véhicule ?</h2>


                <p>On accuse souvent l'âge du véhicule, mais la réalité du terrain est bien plus liée à l'environnement et à l'entretien des soubassements qu'au millésime seul. Voici ce qui fait vraiment rouiller votre châssis :</p>


                <ul>
                    <li><strong>L'effet éponge de la terre accumulée :</strong> C'est le fléau des 4x4, des vans aménagés et des véhicules roulant en campagne. La boue et la terre s'accumulent dans les recoins et les corps creux du châssis. Cette terre retient l'humidité en permanence, empêchant le métal de sécher. Un châssis qui fait du tout-terrain ou roule sur route boueuse peut accumuler des kilos de terre dans ses corps creux — un vrai nid à rouille.</li>
                    <li><strong>Le sel de déneigement :</strong> En hiver, le sel répandu sur les routes se projette sous la voiture et agit comme un puissant accélérateur chimique de corrosion. Les véhicules qui roulent régulièrement sur routes salées vieillissent bien plus vite en dessous.</li>
                    <li><strong>Les micro-impacts de gravillons :</strong> Les cailloux projetés par les roues font sauter les fines couches de protection ou de peinture appliquées en usine. Le métal mis à nu commence alors à s'oxyder immédiatement au contact de l'air humide.</li>
                    <li><strong>L'eau stagnante :</strong> Des évacuations bouchées dans les portières, les bas de caisse ou les corps creux retiennent l'eau à l'intérieur de la structure. L'eau stagnante est la cause numéro un des perforations dans les zones non visibles.</li>
                </ul>


                <!-- ── H2 : TRAITEMENT ── -->
                <h2 id="traitement-rouille">Comment réparer et traiter un châssis déjà piqué par la rouille ?</h2>


                <p>Si votre châssis présente une rouille de surface, inutile de paniquer — mais il faut agir par étapes et dans le bon ordre. <strong>Poser de la peinture ou un anti-gravillon directement sur de la rouille friable est la pire erreur possible.</strong> Voici la méthode éprouvée en atelier, issue de dizaines d'interventions sur des véhicules dans tous les états.</p>


                <h3>Le décapage mécanique (meuleuse et brosse métallique)</h3>


                <p>C'est la phase la plus ingrate — surtout si vous travaillez couché sous la voiture sur des chandelles — mais elle est absolument indispensable. Commencez toujours par un <strong>passage intensif au nettoyeur haute pression (Karcher)</strong> pour faire tomber un maximum de terre et de crasse. Ce que vous ne prenez pas dans la tronche maintenant, vous le prendrez au décapage.</p>


                <p>Ensuite, équipez-vous d'une <strong>petite meuleuse d'angle (115 mm)</strong> munie d'une brosse métallique en forme de cloche, de préférence avec des <strong>fils en laiton</strong> plutôt qu'en acier torsadé : les fils laiton épousent mieux les recoins et les têtes de vis. Tenez la meuleuse d'une main pour l'emmener partout. Le métal doit être mis à nu.</p>


                <div class="art-warning-box" style="background:#1a1a1a; border-left: 4px solid #dc2626; padding: 18px 22px; border-radius: 6px; margin: 24px 0;">
                    <strong style="color:#dc2626; display:block; margin-bottom:8px;">⚠️ Sécurité obligatoire</strong>
                    <span style="color:#e5e5e5;">Le port de lunettes de protection épaisses est non négociable : la rouille, la terre et les brins de brosse volent à grande vitesse. Vêtements épais indispensables. En fin de vie de brosse, des fils se décochent — soyez prévenus.</span>
                </div>


                <h3>Le traitement chimique : acide phosphorique ou convertisseur de rouille ?</h3>


                <p>Une fois la rouille friable éliminée mécaniquement, il reste toujours de la corrosion incrustée dans les pores du métal. C'est là qu'intervient le traitement chimique. Deux écoles s'affrontent :</p>


                <div class="art-table-wrap">
                    <table class="art-table">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Principe d'action</th>
                                <th>Pour qui ?</th>
                                <th>Verdict</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Acide phosphorique</strong> (PAC 2030)</td>
                                <td>Transforme l'oxyde de fer en phosphate de fer stable</td>
                                <td>Bricoleurs avertis — rinçage obligatoire (passivation)</td>
                                <td>✅ Très efficace, mais exigeant</td>
                            </tr>
                            <tr>
                                <td><strong>Convertisseur de rouille</strong> (Férose, Rustol Owatrol)</td>
                                <td>Transforme la rouille en couche noire dure (phosphate de fer) sans rinçage</td>
                                <td>Tous niveaux — le plus sûr pour un amateur</td>
                                <td>✅ Recommandé — simplicité et efficacité</td>
                            </tr>
                            <tr>
                                <td><strong>Acide chlorhydrique</strong></td>
                                <td>Attaque tout — rouille ET métal sain</td>
                                <td>À fuir absolument pour cet usage</td>
                                <td>❌ Fait re-rouiller la tôle instantanément à l'eau claire (flash rust)</td>
                            </tr>
                            <tr>
                                <td><strong>Blackson / anti-gravillon</strong></td>
                                <td>Aucune — c'est un revêtement de surface, pas un traitement</td>
                                <td>Sur tôle saine et apprêtée uniquement</td>
                                <td>❌ Catastrophique sur rouille non traitée</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <p>Notre recommandation terrain : le <strong>convertisseur de rouille type Férose</strong> pour les non-initiés. Vous l'appliquez au pinceau sur la rouille résiduelle, il réagit chimiquement, la rouille se transforme en une couche noire et dure prête à recevoir la peinture. Pas de rinçage, pas de risque de flash rust.</p>


                <h3>Le cas critique des corps creux (longerons)</h3>


                <p>Il est tout simplement impossible de passer une meuleuse à l'intérieur d'un longeron ou d'un corps creux. Et c'est pourtant là que la rouille fait le plus de dégâts en silence. La vraie astuce terrain :</p>


                <ul>
                    <li>Utilisez un <strong>pistolet anti-gravillon équipé d'un tuyau prolongateur souple</strong> (on en trouve facilement sur internet ou dans les magasins d'accessoires auto). Le flexible se glisse dans les orifices de drainage existants.</li>
                    <li>Injectez d'abord un <strong>convertisseur de rouille très liquide</strong> (type Férose) pour noyer les parois internes. Laissez agir et sécher <strong>48 heures minimum</strong>.</li>
                    <li>Puis injectez généreusement une <strong>cire pour corps creux (type Waxoyl)</strong>. <em>Conseil terrain :</em> réservez cette opération à l'été. La chaleur rend la cire plus fluide et lui permet de s'infiltrer dans les moindres interstices — en hiver, elle est trop épaisse pour pénétrer correctement.</li>
                </ul>


                <!-- ═══════════════════════════════════════════════════════ -->
                <!-- BLOC INTERACTIF UX — DIAGNOSTIC ANTI-CORROSION         -->
                <!-- ═══════════════════════════════════════════════════════ -->
                <div id="diagnostic-outil" class="anticorr-diag-wrapper">


                    <div class="anticorr-diag-header">
                        <span class="anticorr-diag-badge">💡 Outil Diagnostic</span>
                        <h2 class="anticorr-diag-title">Trouvez votre solution sur-mesure</h2>
                        <p class="anticorr-diag-subtitle">Répondez à 3 questions sur votre situation. L'outil génère instantanément votre plan d'action personnalisé et la liste des produits adaptés.</p>
                    </div>


                    <!-- ÉTAPES -->
                    <div class="anticorr-steps" id="anticorr-steps">


                        <!-- STEP 1 -->
                        <div class="anticorr-step active" data-step="1">
                            <div class="anticorr-step-num">1 / 3</div>
                            <p class="anticorr-step-question">Comment se présente la rouille sur votre châssis ?</p>
                            <div class="anticorr-options">
                                <button class="anticorr-opt" data-key="rouille" data-val="surface" onclick="diagSelect(this)">
                                    <span class="anticorr-opt-icon">🟡</span>
                                    <strong>Rouille de surface</strong>
                                    <small>Elle part partiellement au grattage, pas de trous dans le métal</small>
                                </button>
                                <button class="anticorr-opt" data-key="rouille" data-val="profonde" onclick="diagSelect(this)">
                                    <span class="anticorr-opt-icon">🔴</span>
                                    <strong>Rouille profonde / perforante</strong>
                                    <small>Des zones sont perforées ou très friables au toucher</small>
                                </button>
                            </div>
                        </div>


                        <!-- STEP 2 -->
                        <div class="anticorr-step" data-step="2">
                            <div class="anticorr-step-num">2 / 3</div>
                            <p class="anticorr-step-question">Dans quel contexte allez-vous travailler ?</p>
                            <div class="anticorr-options">
                                <button class="anticorr-opt" data-key="acces" data-val="chandelles" onclick="diagSelect(this)">
                                    <span class="anticorr-opt-icon">🔧</span>
                                    <strong>Sur chandelles / cales</strong>
                                    <small>Voiture surélevée dans votre garage sans pont professionnel</small>
                                </button>
                                <button class="anticorr-opt" data-key="acces" data-val="pont" onclick="diagSelect(this)">
                                    <span class="anticorr-opt-icon">🏗️</span>
                                    <strong>Avec accès à un pont élévateur</strong>
                                    <small>Chez un professionnel ou accès à un atelier équipé</small>
                                </button>
                            </div>
                        </div>


                        <!-- STEP 3 -->
                        <div class="anticorr-step" data-step="3">
                            <div class="anticorr-step-num">3 / 3</div>
                            <p class="anticorr-step-question">Quel est votre équipement disponible ?</p>
                            <div class="anticorr-options">
                                <button class="anticorr-opt" data-key="equipement" data-val="basique" onclick="diagSelect(this)">
                                    <span class="anticorr-opt-icon">🖌️</span>
                                    <strong>Basique</strong>
                                    <small>Pinceau, brosse à main, produits du commerce</small>
                                </button>
                                <button class="anticorr-opt" data-key="equipement" data-val="intermediaire" onclick="diagSelect(this)">
                                    <span class="anticorr-opt-icon">⚙️</span>
                                    <strong>Intermédiaire</strong>
                                    <small>Meuleuse d'angle, Karcher, pistolet corps creux</small>
                                </button>
                                <button class="anticorr-opt" data-key="equipement" data-val="pro" onclick="diagSelect(this)">
                                    <span class="anticorr-opt-icon">🏭</span>
                                    <strong>Professionnel</strong>
                                    <small>Compresseur, pistolet à peinture, sableuse</small>
                                </button>
                            </div>
                        </div>


                    </div><!-- /anticorr-steps -->


                    <!-- RÉSULTAT -->
                    <div class="anticorr-result" id="anticorr-result" style="display:none;">
                        <div class="anticorr-result-inner">
                            <div class="anticorr-result-title" id="result-title"></div>
                            <div class="anticorr-result-verdict" id="result-verdict"></div>
                            <div class="anticorr-result-products" id="result-products"></div>
                            <div class="anticorr-result-warning" id="result-warning"></div>
                            <button class="anticorr-reset" onclick="diagReset()">↩ Refaire le diagnostic</button>
                        </div>
                    </div>


                </div><!-- /.anticorr-diag-wrapper -->


                <!-- STYLES + JS du widget -->
                <style>
                .anticorr-diag-wrapper {
                    background: #111111;
                    border: 1px solid #2a2a2a;
                    border-radius: 12px;
                    padding: 32px;
                    margin: 40px 0;
                    font-family: inherit;
                }
                .anticorr-diag-header {
                    text-align: center;
                    margin-bottom: 28px;
                }
                .anticorr-diag-badge {
                    display: inline-block;
                    background: #dc2626;
                    color: #fff;
                    font-size: 12px;
                    font-weight: 700;
                    letter-spacing: .08em;
                    text-transform: uppercase;
                    padding: 4px 14px;
                    border-radius: 20px;
                    margin-bottom: 14px;
                }
                .anticorr-diag-title {
                    font-size: 1.45rem;
                    font-weight: 700;
                    color: #ffffff;
                    margin: 0 0 8px;
                    border: none;
                    padding: 0;
                }
                .anticorr-diag-title::after { display: none; }
                .anticorr-diag-subtitle {
                    color: #999;
                    font-size: .92rem;
                    line-height: 1.5;
                    margin: 0;
                }


                /* Progress bar */
                .anticorr-progress {
                    display: flex;
                    gap: 6px;
                    justify-content: center;
                    margin-bottom: 24px;
                }
                .anticorr-progress-dot {
                    width: 28px;
                    height: 4px;
                    border-radius: 2px;
                    background: #2a2a2a;
                    transition: background .3s;
                }
                .anticorr-progress-dot.done { background: #dc2626; }


                .anticorr-step { display: none; }
                .anticorr-step.active { display: block; }


                .anticorr-step-num {
                    font-size: .8rem;
                    font-weight: 600;
                    color: #dc2626;
                    text-transform: uppercase;
                    letter-spacing: .1em;
                    margin-bottom: 10px;
                }
                .anticorr-step-question {
                    font-size: 1.1rem;
                    font-weight: 600;
                    color: #fff;
                    margin: 0 0 18px;
                }
                .anticorr-options {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                }
                .anticorr-opt {
                    display: flex;
                    align-items: flex-start;
                    gap: 14px;
                    background: #1a1a1a;
                    border: 1.5px solid #2a2a2a;
                    border-radius: 8px;
                    padding: 16px 18px;
                    cursor: pointer;
                    text-align: left;
                    transition: border-color .2s, background .2s;
                    width: 100%;
                }
                .anticorr-opt:hover {
                    border-color: #dc2626;
                    background: #1e1212;
                }
                .anticorr-opt.selected {
                    border-color: #dc2626;
                    background: #1e1212;
                }
                .anticorr-opt-icon {
                    font-size: 1.4rem;
                    flex-shrink: 0;
                    margin-top: 1px;
                }
                .anticorr-opt strong {
                    display: block;
                    color: #fff;
                    font-size: .95rem;
                    margin-bottom: 3px;
                }
                .anticorr-opt small {
                    color: #888;
                    font-size: .82rem;
                    line-height: 1.4;
                }


                /* Résultat */
                .anticorr-result {
                    animation: fadeInUp .4s ease;
                }
                @keyframes fadeInUp {
                    from { opacity: 0; transform: translateY(12px); }
                    to   { opacity: 1; transform: translateY(0); }
                }
                .anticorr-result-inner {
                    background: #1a1a1a;
                    border-radius: 10px;
                    padding: 28px;
                    border: 1.5px solid #2a2a2a;
                }
                .anticorr-result-title {
                    font-size: 1.15rem;
                    font-weight: 700;
                    color: #fff;
                    margin-bottom: 12px;
                }
                .anticorr-result-verdict {
                    font-size: .94rem;
                    color: #ccc;
                    line-height: 1.65;
                    margin-bottom: 18px;
                }
                .anticorr-result-products {
                    background: #111;
                    border-radius: 8px;
                    padding: 16px 18px;
                    margin-bottom: 16px;
                    border: 1px solid #222;
                }
                .anticorr-result-products strong {
                    display: block;
                    color: #dc2626;
                    font-size: .82rem;
                    text-transform: uppercase;
                    letter-spacing: .08em;
                    margin-bottom: 10px;
                }
                .anticorr-result-products ul {
                    margin: 0;
                    padding-left: 18px;
                    color: #ddd;
                    font-size: .9rem;
                    line-height: 1.7;
                }
                .anticorr-result-warning {
                    font-size: .88rem;
                    color: #f87171;
                    line-height: 1.5;
                    padding: 12px 16px;
                    border-radius: 6px;
                    background: rgba(220,38,38,.08);
                    border: 1px solid rgba(220,38,38,.2);
                    margin-bottom: 20px;
                    display: none;
                }
                .anticorr-result-warning.show { display: block; }
                .anticorr-reset {
                    background: transparent;
                    border: 1.5px solid #2a2a2a;
                    color: #888;
                    border-radius: 6px;
                    padding: 10px 20px;
                    cursor: pointer;
                    font-size: .86rem;
                    transition: border-color .2s, color .2s;
                }
                .anticorr-reset:hover {
                    border-color: #555;
                    color: #ccc;
                }
                </style>


                <script>
                var diagAnswers = {};
                var diagCurrentStep = 1;
                var diagTotalSteps = 3;


                function diagSelect(btn) {
                    var key = btn.getAttribute('data-key');
                    var val = btn.getAttribute('data-val');
                    diagAnswers[key] = val;


                    // Highlight sélection
                    var siblings = btn.parentNode.querySelectorAll('.anticorr-opt');
                    siblings.forEach(function(s){ s.classList.remove('selected'); });
                    btn.classList.add('selected');


                    // Passe à l'étape suivante après 350ms
                    setTimeout(function(){
                        if (diagCurrentStep < diagTotalSteps) {
                            document.querySelector('[data-step="' + diagCurrentStep + '"]').classList.remove('active');
                            diagCurrentStep++;
                            document.querySelector('[data-step="' + diagCurrentStep + '"]').classList.add('active');
                        } else {
                            // Affiche le résultat
                            document.getElementById('anticorr-steps').style.display = 'none';
                            showResult();
                        }
                    }, 350);
                }


                function showResult() {
                    var r = diagAnswers.rouille;
                    var a = diagAnswers.acces;
                    var e = diagAnswers.equipement;


                    var title, verdict, products, warning = '';


                    // ── CAS 1 : Rouille de surface + chandelles + basique ──
                    if (r === 'surface' && a === 'chandelles' && e === 'basique') {
                        title   = '✅ Traitement DIY au pinceau — Faisable seul';
                        verdict = 'Votre rouille est encore superficielle : bonne nouvelle, vous n\'avez pas besoin de matériel professionnel. Travaillez section par section. Commencez par gratter à la brosse à main en acier pour retirer la rouille friable, puis appliquez un convertisseur de rouille au pinceau (2 couches). Terminez par une peinture antirouille ou un primaire en bombe. Comptez 2 à 3 week-ends de travail selon la surface.';
                        products = '<strong>Votre liste de courses</strong><ul><li>Brosse métallique à main (fils acier)</li><li>Convertisseur de rouille Férose ou Rustol Owatrol (1 L)</li><li>Primaire antirouille en bombe ou au pinceau</li><li>Lunettes de protection + gants nitrile</li></ul>';
                    }


                    // ── CAS 2 : Rouille de surface + chandelles + intermédiaire ──
                    else if (r === 'surface' && a === 'chandelles' && e === 'intermediaire') {
                        title   = '✅ Traitement DIY complet à la meuleuse — Résultat pro';
                        verdict = 'Avec votre meuleuse, vous pouvez faire un travail remarquable. Commencez par le Karcher, puis décapez au maximum à la brosse cloche laiton (115 mm). Passez le convertisseur de rouille, et injectez de la cire Waxoyl dans les corps creux avec votre pistolet. Le résultat sera proche d\'une intervention en atelier.';
                        products = '<strong>Votre liste de courses</strong><ul><li>Brosse cloche laiton 65 mm pour meuleuse 115 mm</li><li>Convertisseur de rouille Férose (1 L)</li><li>Pistolet corps creux + tuyau prolongateur souple</li><li>Cire corps creux Waxoyl (1 L)</li><li>Peinture châssis antirouille (noir, 1 L)</li><li>Lunettes épaisses + vêtements couvrants</li></ul>';
                    }


                    // ── CAS 3 : Rouille de surface + pont + pro ──
                    else if (r === 'surface' && a === 'pont' && e === 'pro') {
                        title   = '🏆 Traitement professionnel complet — Résultat optimal';
                        verdict = 'Avec un pont et un compresseur, vous pouvez réaliser le traitement de référence : décapage mécanique complet, convertisseur, primaire époxy bi-composant au pistolet et cire corps creux injectée sous pression. C\'est la méthode utilisée en atelier pour les restaurations durables. Masquez soigneusement l\'échappement, les freins et le plancher avant toute projection.';
                        products = '<strong>Votre liste de courses</strong><ul><li>Brosse cloche laiton pour meuleuse</li><li>Convertisseur de rouille Férose ou PAC 2030</li><li>Primaire époxy bi-composant (ex: Rustol Hammerite)</li><li>Pistolet à peinture + compresseur</li><li>Cire corps creux Waxoyl sous pression</li><li>Film de masquage + scotch de carrossier</li></ul>';
                    }


                    // ── CAS 4 : Rouille profonde + chandelles ──
                    else if (r === 'profonde' && a === 'chandelles') {
                        title   = '⚠️ Rouille perforante : intervention professionnelle recommandée';
                        verdict = 'Une rouille perforante sur des zones structurelles (longerons, berceau) nécessite une évaluation sérieuse. Sans pont élévateur, vous ne pouvez pas accéder à toutes les zones critiques, et surtout, vous ne pouvez pas garantir l\'absence de perforation cachée. Avant tout traitement de surface, il faut s\'assurer qu\'une soudure n\'est pas nécessaire — c\'est le travail d\'un garage équipé.';
                        products = '<strong>Votre liste de courses (traitement préventif complémentaire)</strong><ul><li>Convertisseur de rouille Férose pour les zones accessibles</li><li>Cire corps creux Waxoyl (injection dans les longerons)</li></ul>';
                        warning = '🚨 Attention : une rouille perforante sur des éléments porteurs est un motif de refus au contrôle technique. Ne masquez pas le problème avec de l\'anti-gravillon. Faites évaluer le châssis par un professionnel avant le prochain CT.';
                    }


                    // ── CAS 5 : Rouille profonde + pont ──
                    else if (r === 'profonde' && a === 'pont') {
                        title   = '🔴 Diagnostic professionnel urgent — Soudure possible';
                        verdict = 'La présence de perforations ou de zones très friables sur le châssis doit être prise très au sérieux. Avec un pont, le premier travail est un diagnostic complet pour évaluer si des soudures de remplacement de tôle sont nécessaires. Le traitement anti-corrosion ne vient qu\'après consolidation structurelle. Dans tous les cas, ne recouvrez pas les zones perforées avec du Blackson — cela masquerait le problème et accélérerait la dégradation.';
                        products = '<strong>Matériel nécessaire (après consolidation)</strong><ul><li>Sableuse ou meuleuse pour retrait complet des zones corrodées</li><li>Convertisseur de rouille Férose</li><li>Primaire époxy bi-composant</li><li>Cire corps creux Waxoyl sous pression</li><li>Peinture châssis finition</li></ul>';
                        warning = '🚨 Des perforations sur des longerons ou points d\'ancrage de suspension constituent un danger structurel immédiat. Faites évaluer votre véhicule avant de rouler.';
                    }


                    // ── CAS DÉFAUT ──
                    else {
                        title   = '✅ Traitement adapté à votre situation';
                        verdict = 'Sur la base de vos réponses, un traitement en 3 étapes est conseillé : décapage mécanique, convertisseur de rouille, puis protection (primaire et cire corps creux). Adaptez la méthode à votre niveau d\'équipement en vous appuyant sur les sections détaillées de ce guide.';
                        products = '<strong>Base recommandée pour tous les cas</strong><ul><li>Convertisseur de rouille (Férose ou Rustol Owatrol)</li><li>Primaire antirouille</li><li>Cire corps creux (Waxoyl)</li><li>Équipements de protection (lunettes, gants)</li></ul>';
                    }


                    document.getElementById('result-title').innerHTML   = title;
                    document.getElementById('result-verdict').innerHTML  = verdict;
                    document.getElementById('result-products').innerHTML = products;


                    var warnEl = document.getElementById('result-warning');
                    if (warning) {
                        warnEl.innerHTML = warning;
                        warnEl.classList.add('show');
                    }


                    document.getElementById('anticorr-result').style.display = 'block';
                }


                function diagReset() {
                    diagAnswers = {};
                    diagCurrentStep = 1;


                    document.querySelectorAll('.anticorr-step').forEach(function(s){ s.classList.remove('active'); });
                    document.querySelector('[data-step="1"]').classList.add('active');
                    document.querySelectorAll('.anticorr-opt').forEach(function(b){ b.classList.remove('selected'); });


                    document.getElementById('anticorr-steps').style.display = 'block';
                    document.getElementById('anticorr-result').style.display = 'none';
                    document.getElementById('result-warning').classList.remove('show');
                }
                </script>
                <!-- ── FIN BLOC INTERACTIF ── -->


                <!-- ── H2 : PRÉVENTION ── -->
                <h2 id="prevention">Prévention : comment protéger son châssis à l'avenir ?</h2>


                <p>Une fois votre châssis réparé, décapé et traité chimiquement, il faut <strong>impérativement isoler le métal de l'oxygène et de l'humidité</strong> pour que la corrosion ne reprenne pas dès l'hiver suivant. Voici les couches de protection dans le bon ordre :</p>


                <ul>
                    <li><strong>Primaire époxy bi-composant :</strong> c'est la protection la plus redoutable disponible aujourd'hui pour un usage amateur ou professionnel. Il adhère parfaitement sur métal traité et crée une barrière étanche. Il s'applique au pinceau (très salissant) ou au pistolet si vous avez bien masqué les zones sensibles — échappement, freins, et surfaces en caoutchouc.</li>
                    <li><strong>Peinture châssis finition :</strong> une couche de peinture antirouille noire (type Hammerite) par-dessus le primaire assure une protection durable et un aspect propre.</li>
                    <li><strong>Cire corps creux (Waxoyl) :</strong> injectée dans les longerons et les bas de caisse à intervalle régulier — tous les 5 ans environ — pour renouveler la protection des zones non accessibles.</li>
                </ul>


                <h3>Le piège du Blackson (anti-gravillon) sur de la rouille</h3>


                <p>S'il y a une règle d'or à retenir de ce guide, c'est celle-ci : <strong>ne mettez jamais d'anti-gravillon goudronneux (type Blackson) sur une tôle qui n'a pas été parfaitement traitée et peinte.</strong></p>


                <p>Appliqué sur un châssis douteux, l'anti-gravillon agit comme un terrible "cache-misère". Avec le temps, le goudron devient poreux. L'eau s'y infiltre et se retrouve piégée contre le métal. Votre châssis va alors <strong>pourrir de l'intérieur en silence</strong>, dissimulé sous une belle pellicule noire, jusqu'à ce que la structure cède. C'est l'erreur la plus souvent citée dans tous les forums de restauration automobile, et on la voit régulièrement en atelier sur des véhicules qui semblaient propres en dessous.</p>


                <p>L'anti-gravillon ne s'utilise qu'en toute dernière étape — sur un apprêt sain — et uniquement dans les zones exposées aux projections de cailloux (passages de roues).</p>


                <!-- ── H2 : FAQ ── -->
                <h2 id="faq-corrosion">FAQ : vos questions sur la corrosion automobile</h2>


                <div class="art-faq" itemscope itemtype="https://schema.org/FAQPage">


                    <div class="art-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <div class="art-faq-q" itemprop="name">Peut-on stopper définitivement la rouille sous une voiture ?</div>
                        <div class="art-faq-a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">Oui, à condition d'éliminer totalement l'oxygène et l'humidité de l'équation. Cela implique un décapage méticuleux, un convertisseur de rouille de qualité, et surtout des traitements préventifs réguliers — comme le renouvellement de la cire dans les corps creux tous les 5 ans. La protection n'est jamais éternelle sur un véhicule qui roule, mais une bonne base peut tenir facilement 10 à 15 ans.</div>
                        </div>
                    </div>


                    <div class="art-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <div class="art-faq-q" itemprop="name">Le sablage du châssis est-il obligatoire ?</div>
                        <div class="art-faq-a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">Non. Le sablage est la méthode ultime — idéale lors d'une restauration complète de voiture ancienne où la caisse est séparée du châssis. Mais pour un entretien courant ou une rouille de surface, un bon décapage mécanique à la brosse montée sur meuleuse, suivi d'un traitement chimique au convertisseur, est amplement suffisant. Le sablage laisse aussi beaucoup de grenaille partout dans les recoins, ce qui peut poser problème lors de l'application de peinture.</div>
                        </div>
                    </div>


                    <div class="art-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <div class="art-faq-q" itemprop="name">Quel budget pour faire traiter son châssis par un professionnel ?</div>
                        <div class="art-faq-a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">Le traitement d'un châssis représente un travail considérable en temps : nettoyage, grattage, séchage, masquage des éléments, traitement chimique et peinture. Si vous le faites vous-même, comptez environ 100 à 150 € de produits (convertisseur, peinture, brosses, cire). Si vous passez par un professionnel sur pont élévateur pour un traitement complet dans les règles de l'art, le budget varie généralement entre 600 et 1 500 € selon le gabarit du véhicule et l'état d'avancement de la corrosion.</div>
                        </div>
                    </div>


                    <div class="art-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <div class="art-faq-q" itemprop="name">Pourquoi les professionnels déconseillent-ils le Blackson sur un châssis rouillé ?</div>
                        <div class="art-faq-a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">Parce que l'anti-gravillon Blackson est un revêtement bitumineux, pas un traitement. Appliqué sur de la rouille non traitée, il enferme l'humidité contre le métal oxydé. Le goudron devient poreux avec le temps, l'eau y stagne et la corrosion progresse à l'abri du regard. C'est le "cache-misère" par excellence : le châssis peut être complètement perforé sous une couche de Blackson d'aspect impeccable. Ne l'utilisez que sur du métal sain et apprêté.</div>
                        </div>
                    </div>


                    <div class="art-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <div class="art-faq-q" itemprop="name">Quelle est la différence entre un convertisseur de rouille et un destructeur de rouille ?</div>
                        <div class="art-faq-a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">Un destructeur de rouille (à base d'acide phosphorique) attaque et dissout chimiquement l'oxyde de fer — il faut rincer après utilisation pour stopper l'action acide (passivation). Un convertisseur de rouille (type Férose, Owatrol) transforme la rouille résiduelle en phosphate de fer stable et peigable, sans rinçage. Pour un amateur sans matériel de rinçage sous châssis, le convertisseur est bien plus sûr et pratique.</div>
                        </div>
                    </div>


                </div>


                <!-- Styles FAQ -->
                <style>
                .art-faq { margin-top: 10px; }
                .art-faq-item {
                    border-bottom: 1px solid #2a2a2a;
                    padding: 0;
                    margin-bottom: 0;
                }
                .art-faq-q {
                    font-weight: 600;
                    color: #fff;
                    padding: 18px 0 14px;
                    cursor: default;
                    font-size: .97rem;
                    line-height: 1.45;
                }
                .art-faq-a div {
                    color: #ccc;
                    font-size: .93rem;
                    line-height: 1.7;
                    padding-bottom: 18px;
                }
                </style>


                <!-- Conclusion box -->
                <div class="art-tldr" style="border-left-color: #dc2626; background-color: #111111; color: #ffffff; margin-top: 40px;">
                    <div class="art-tldr-title" style="color: #ffffff;">Le mot du Garage Expert Auto</div>
                    <p style="margin: 0; color: #ffffff;">La corrosion du châssis n'attend pas. Que vous décidiez de vous y attaquer vous-même ou de confier votre véhicule à notre équipe, l'important est d'agir dans le bon ordre et avec les bons produits. Si votre châssis présente des perforations ou si vous avez un doute avant un contrôle technique, <strong>prenez rendez-vous</strong> pour un diagnostic : on passe le dessous de votre voiture sur le pont et on vous dit exactement ce qu'il en est — sans langue de bois.</p>
                </div>


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
                <p style="color: #ffffff;">La rouille sous le châssis n'est ni une fatalité ni un problème cosmétique. Avec la bonne méthode — décapage, convertisseur, protection — et les bons produits, un soubassement très attaqué peut être sauvé et protégé pour de nombreuses années. Ce qui condamne les voitures, ce n'est pas la rouille elle-même, c'est le cache-misère appliqué dessus sans traitement préalable. Agissez tôt, agissez bien.</p>
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


<!-- Schema JSON-LD (Article + FAQ) -->
<script type="application/ld+json">
<?php
$faq_entities = [
    ["@type" => "Question", "name" => "Peut-on stopper définitivement la rouille sous une voiture ?", "acceptedAnswer" => ["@type" => "Answer", "text" => "Oui, à condition d'éliminer totalement l'oxygène et l'humidité via décapage, convertisseur de rouille et traitements préventifs réguliers (cire corps creux tous les 5 ans)."]],
    ["@type" => "Question", "name" => "Le sablage du châssis est-il obligatoire ?", "acceptedAnswer" => ["@type" => "Answer", "text" => "Non. Pour une rouille de surface, un décapage mécanique à la meuleuse suivi d'un convertisseur de rouille est amplement suffisant."]],
    ["@type" => "Question", "name" => "Quel budget pour faire traiter son châssis par un professionnel ?", "acceptedAnswer" => ["@type" => "Answer", "text" => "Comptez 100 à 150 € en DIY, entre 600 et 1 500 € en atelier professionnel selon le gabarit et l'état de la corrosion."]],
    ["@type" => "Question", "name" => "Pourquoi les professionnels déconseillent-ils le Blackson sur un châssis rouillé ?", "acceptedAnswer" => ["@type" => "Answer", "text" => "Le Blackson est un revêtement, pas un traitement. Il emprisonne l'humidité contre la rouille non traitée, faisant pourrir le châssis de l'intérieur en silence."]],
];


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
            "datePublished" => "2026-04-06T10:00:00+02:00",
            "dateModified"  => "2026-04-06T10:00:00+02:00",
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
        ],
        [
            "@type"      => "FAQPage",
            "mainEntity" => $faq_entities
        ]
    ]
];
echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>
</script>


<?php include __DIR__ . '/../footer.php'; ?>
