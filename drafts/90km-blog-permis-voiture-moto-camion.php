<?php
// published: 2026-04-02 10:00
/**
 * 90km-blog-permis-voiture-moto-camion.php
 */


$page_title       = "90km.fr : le blog permis voiture, moto et camion à connaître en 2026";
$page_description = "Préparer son permis B, son permis moto ou son permis poids lourd en France ? 90km.fr (90 km) est le blog de référence sur le code de la route, les formations FIMO, ADR et les réglementations transport. Notre avis complet.";


$article = [
    'title'          => "90km.fr : le blog permis voiture, moto et camion qu'il faut avoir dans ses favoris",
    'subtitle'       => "Code de la route, permis C et CE, FIMO, FCO, ADR, entretien auto : 90km.fr couvre l'ensemble du spectre de la conduite et des formations transport avec une exhaustivité rare sur le web français. Notre regard critique et honnête.",
    'category'       => 'permis',
    'category_name'  => 'Permis',
    'category_color' => '#0891b2',
    'tags'           => ['90km', 'Blog Permis', 'Permis Voiture', 'Permis Camion', 'Code de la Route'],
    'image'          => '/Image/90km-blog-permis-voiture-moto-camion.webp',
    'date'          => '2 Avril 2026',
    'author'         => 'Arnaud',
    'author_role'    => 'Rédacteur & Expert Réglementation',
    'author_img'     => '/Image/arnaud.png',
    'author_bio'     => "Tombé dans le cambouis quand il était petit grâce à son père David, Arnaud a transformé sa passion en expertise. Il décortique la réglementation routière, les formations transport et les examens de conduite pour que vous ne soyez jamais pris de court.",
    'reading_time'   => '6 min',
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
             alt="Interface du blog 90km.fr dédié au permis de conduire voiture moto et camion"
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
                    <span>Coup de projecteur</span>
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
                    <li><strong>Qui :</strong> <strong>90km.fr</strong> (<a href="https://www.90km.fr/" target="_blank" rel="nofollow noopener">www.90km.fr</a>) est un blog français spécialisé dans les permis de conduire (voiture, moto, camion), les formations transport professionnel et l'entretien automobile.</li>
                    <li><strong>Périmètre :</strong> Permis B, permis A (moto), permis C et CE (poids lourd), code de la route, FIMO, FCO, ADR, CACES, réglementation transport routier.</li>
                    <li><strong>Ce qui se démarque :</strong> Un catalogue de contenus très fourni sur les formations professionnelles transport — FIMO, FCO, ADR, passerelle — difficile à trouver aussi complet ailleurs en français.</li>
                    <li><strong>Pour qui :</strong> Candidats au permis B ou moto, chauffeurs routiers en formation, transporteurs cherchant à comprendre la réglementation, et automobilistes curieux sur l'entretien de leur véhicule.</li>
                    <li><strong>Notre verdict :</strong> Une mine d'information sérieuse et dense, particulièrement recommandée pour tout ce qui touche au <strong>permis poids lourd</strong> et aux formations transport en France.</li>
                </ul>
            </div>


            <!-- Table of Contents -->
            <div class="art-toc">
                <div class="art-toc-title">Dans ce dossier</div>
                <ol>
                    <li><a href="#90km-cest-quoi">90km.fr : c'est quoi exactement ?</a></li>
                    <li><a href="#permis-voiture-moto">Permis voiture et moto : ce que couvre le blog</a></li>
                    <li><a href="#permis-camion-transport">Permis camion et formations transport : le vrai point fort</a></li>
                    <li><a href="#entretien-code">Code de la route et entretien auto : les bonus du site</a></li>
                    <li><a href="#pour-qui">Pour quel profil est fait 90km ?</a></li>
                    <li><a href="#verdict">Notre verdict honnête sur 90km.fr</a></li>
                </ol>
            </div>


            <!-- Article Content -->
            <div class="art-content">


                <p>Trouver un blog en français qui traite sérieusement du <strong>permis de conduire voiture</strong>, du <strong>permis moto</strong> ET du <strong>permis camion</strong> dans un seul endroit, c'est rare. <strong>90km.fr</strong>, accessible à l'adresse <a href="https://www.90km.fr/" target="_blank" rel="nofollow noopener">www.90km.fr</a>, a pris ce pari de la couverture large — et il tient la route. On a épluché leur catalogue pour vous donner un avis franc et utile.</p>


                <!-- ══════════════════════════════════ -->
                <h2 id="90km-cest-quoi">90km.fr : c'est quoi exactement ?</h2>


                <p><strong>90km</strong> est un blog automobile et transport qui s'adresse à un spectre de lecteurs très large : du jeune candidat au permis B qui cherche à comprendre les signaux routiers jusqu'au chauffeur routier professionnel qui doit renouveler sa qualification FIMO ou préparer une formation ADR pour le transport de matières dangereuses. L'ambition du site est claire : être le guide de référence sur tout ce qui concerne la conduite légale et professionnelle en France.</p>


                <p>Le nom <strong>90km</strong> fait directement écho à la vitesse emblématique sur les routes départementales françaises — un clin d'œil malin qui ancre d'emblée le blog dans l'univers du code de la route et de la conduite au quotidien. On retrouve sur <strong>90km.fr</strong> aussi bien des guides pratiques sur l'entretien voiture que des questionnaires d'examen corrigés pour les formations poids lourd.</p>


                <div class="art-table-wrap">
                    <table class="art-table">
                        <thead>
                            <tr>
                                <th>Caractéristique</th>
                                <th>Détail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Nom du site</strong></td>
                                <td>90km / 90km.fr</td>
                            </tr>
                            <tr>
                                <td><strong>URL</strong></td>
                                <td><a href="https://www.90km.fr/" target="_blank" rel="nofollow noopener">www.90km.fr</a></td>
                            </tr>
                            <tr>
                                <td><strong>Thématiques principales</strong></td>
                                <td>Permis voiture, permis moto, permis camion (C/CE), code de la route, FIMO, FCO, ADR, CACES, entretien auto</td>
                            </tr>
                            <tr>
                                <td><strong>Type de contenus</strong></td>
                                <td>Guides pratiques, questionnaires d'examen corrigés, fiches orales, réglementation transport</td>
                            </tr>
                            <tr>
                                <td><strong>Cible</strong></td>
                                <td>Candidats permis B/A, chauffeurs routiers, transporteurs professionnels, automobilistes</td>
                            </tr>
                            <tr>
                                <td><strong>Langue</strong></td>
                                <td>Français</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <!-- ══════════════════════════════════ -->
                <h2 id="permis-voiture-moto">Permis voiture et moto : ce que couvre le blog</h2>


                <p>Sur le volet <strong>permis voiture</strong> (permis B), <strong>90km.fr</strong> propose des guides accessibles sur le code de la route, les signaux routiers, le comportement à adopter en présence des forces de l'ordre ou encore les meilleures applications mobiles pour réviser son code. Ces contenus sont particulièrement utiles pour les candidats en phase de préparation qui veulent compléter leur apprentissage en auto-école par des ressources gratuites et bien structurées.</p>


                <p>Pour le <strong>permis moto</strong>, le blog aborde les spécificités de la conduite à deux roues, les règles de sécurité propres aux motocyclistes et les points de vigilance du code souvent mal maîtrisés par les candidats. La couverture n'est pas aussi exhaustive que celle du poids lourd, mais elle reste utile comme complément de révision.</p>


                <blockquote class="art-blockquote">
                    Le conseil du Garage Expert : utilisez <strong>90km.fr</strong> pour les révisions de code et la compréhension des règles de signalisation — leur <a href="https://www.90km.fr/liste-complete-des-signaux-routiers-en-france/" target="_blank" rel="nofollow noopener">liste complète des signaux routiers en France</a> est une des plus détaillées qu'on ait vues en accès libre sur le web français.
                </blockquote>


                <!-- ══════════════════════════════════ -->
                <h2 id="permis-camion-transport">Permis camion et formations transport : le vrai point fort de 90km</h2>


                <p>C'est ici que <strong>90km</strong> se distingue vraiment de la concurrence. Le blog dispose d'un catalogue extrêmement complet sur tout ce qui touche au <strong>permis C</strong> (porteurs) et au <strong>permis CE</strong> (semi-remorques), avec des fiches orales de préparation à l'examen, des questionnaires corrigés pour l'épreuve théorique, des guides sur la visite médicale obligatoire et les démarches de renouvellement.</p>


                <p>Au-delà du permis en lui-même, <strong>90km.fr</strong> couvre en détail les formations professionnelles obligatoires du secteur transport — un domaine technique souvent mal expliqué sur Internet :</p>


                <ul>
                    <li><strong>FIMO (Formation Initiale Minimale Obligatoire) :</strong> Guides complets sur le contenu de la formation marchandises et voyageurs, les questionnaires d'examen final, et les spécificités FIMO voyageur vs marchandises.</li>
                    <li><strong>FCO (Formation Continue Obligatoire) :</strong> Explication claire de la différence FCO/FIMO — une confusion fréquente chez les chauffeurs en activité — et des modalités de renouvellement tous les 5 ans.</li>
                    <li><strong>ADR (Accord européen relatif au transport de matières dangereuses) :</strong> Plusieurs articles et questionnaires d'entraînement pour préparer cette certification exigeante, rarement couverte de façon aussi accessible.</li>
                    <li><strong>Formation passerelle :</strong> Un guide pratique sur la passerelle marchandises/voyageurs, utile pour les chauffeurs qui souhaitent changer de spécialité.</li>
                    <li><strong>CACES :</strong> Guides sur les CACES R482 (engins de chantier) et R489 (chariots élévateurs), avec questionnaires d'examen corrigés.</li>
                </ul>


                <div class="art-table-wrap">
                    <table class="art-table">
                        <thead>
                            <tr>
                                <th>Type de contenu</th>
                                <th>Points forts</th>
                                <th>À améliorer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Permis voiture (B) & code de la route</strong></td>
                                <td>Signaux routiers complets, guides de comportement, applications recommandées</td>
                                <td>Pourrait être enrichi sur les spécificités conduite accompagnée et post-permis</td>
                            </tr>
                            <tr>
                                <td><strong>Permis moto (A/A2)</strong></td>
                                <td>Points de vigilance spécifiques deux-roues, règles de priorité</td>
                                <td>Couverture moins dense que le volet poids lourd — à développer</td>
                            </tr>
                            <tr>
                                <td><strong>Permis camion (C / CE) & FIMO / FCO</strong></td>
                                <td>Fiches orales, questionnaires corrigés, guides réglementaires très complets</td>
                                <td>Certains contenus datent de 2022-2023, méritent une mise à jour 2026</td>
                            </tr>
                            <tr>
                                <td><strong>ADR & CACES</strong></td>
                                <td>Questionnaires d'entraînement rares en accès libre, bonne structure pédagogique</td>
                                <td>Les corrections pourraient inclure davantage d'explications contextuelles</td>
                            </tr>
                            <tr>
                                <td><strong>Entretien automobile</strong></td>
                                <td>Guides pratiques accessibles sur la vidange, les freins, la batterie, les voyants</td>
                                <td>Pas toujours lié au permis — brouille légèrement l'identité du blog</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <!-- ══════════════════════════════════ -->
                <h2 id="entretien-code">Code de la route et entretien auto : les bonus utiles du site</h2>


                <p>En dehors de son cœur de cible formations transport, <strong>90km.fr</strong> propose également une section entretien automobile que l'on n'attendait pas forcément sur un blog centré sur les permis. On y trouve des guides pratiques sur l'entretien de printemps, la vidange moteur, la reconnaissance d'une fuite d'huile, l'usure des freins en conduite urbaine ou encore les erreurs classiques à éviter avec sa batterie. Ces contenus s'adressent aux automobilistes du quotidien qui cherchent à mieux comprendre leur véhicule sans faire appel à un garagiste pour chaque question.</p>


                <p>C'est d'ailleurs sur ce terrain que <strong>90km</strong> et <strong>Le Garage Expert Auto</strong> se rejoignent : l'idée que comprendre son véhicule, c'est conduire mieux, entretenir mieux et dépenser moins. Si <a href="https://www.90km.fr/ignorer-voyants-couts/" target="_blank" rel="nofollow noopener">leur article sur le coût des voyants ignorés</a> vous alerte sur les risques, nos experts en garage peuvent vous aider à les diagnostiquer et les résoudre concrètement.</p>


                <!-- ══════════════════════════════════ -->
                <h2 id="pour-qui">Pour quel profil est vraiment fait 90km.fr ?</h2>


                <p>Trois profils tirent clairement le meilleur de <strong>90km</strong> :</p>


                <ul>
                    <li><strong>Le candidat au permis B ou A :</strong> Il utilise <strong>90km.fr</strong> en complément de son auto-école pour réviser des points précis du code de la route, comprendre les signaux routiers, ou s'auto-évaluer avec des questions types. Le blog est une ressource gratuite et fiable pour consolider ses révisions.</li>
                    <li><strong>Le chauffeur routier en formation ou renouvellement :</strong> C'est le profil pour lequel <strong>90km</strong> apporte le plus de valeur unique. Les contenus FIMO, FCO, ADR et carte conducteur / chronotachygraphe sont difficiles à trouver aussi bien structurés et gratuitement accessibles ailleurs.</li>
                    <li><strong>L'automobiliste curieux sur l'entretien :</strong> Il y trouve des réponses claires aux questions de mécanique de base — sans jargon technique intimidant — pour anticiper une panne ou préparer un contrôle technique sereinement.</li>
                </ul>


                <!-- ══════════════════════════════════ -->
                <h2 id="verdict">Notre verdict honnête sur 90km.fr</h2>


                <p>Chez <strong>Le Garage Expert Auto</strong>, on apprécie les sources qui font le travail sérieusement et sans fioriture. <strong>90km.fr</strong> en fait partie. Le blog a construit un catalogue de contenus dense et réellement utile sur le <strong>permis voiture</strong>, le <strong>permis moto</strong> et surtout le <strong>permis camion</strong> et les formations transport professionnel — un segment éditorial sous-servi sur le web français.</p>


                <p>Ce qu'on retient particulièrement : la qualité pédagogique des questionnaires d'examen corrigés pour le permis C/CE, la FIMO et l'ADR. C'est du contenu concret qui aide directement les candidats à préparer des épreuves exigeantes, sans passer par des formations payantes pour accéder à l'information de base.</p>


                <p>Notre bémol honnête : certains articles datent de 2022-2023 et mériteraient une révision, notamment sur les réglementations transport qui évoluent régulièrement. Et la section entretien auto, bien que de qualité, s'éloigne du positionnement permis/formations qui fait la vraie force de <strong>90km</strong>. Mais ces deux points sont mineurs face à la richesse globale du catalogue.</p>


                <div class="art-tldr" style="border-left-color: #0891b2;">
                    <div class="art-tldr-title" style="color: #0891b2;">🚛 Le mot du Garage Expert Auto</div>
                    <p style="margin: 0;">Que vous prépariez votre <strong>permis B</strong>, votre <strong>permis moto</strong> ou votre <strong>permis poids lourd</strong>, ajoutez <a href="https://www.90km.fr/" target="_blank" rel="nofollow noopener">90km.fr</a> à vos ressources de préparation. Pour tout ce qui touche au <strong>permis camion, à la FIMO, à l'ADR ou au CACES</strong>, c'est l'une des rares références gratuites vraiment complètes en français. Et une fois votre permis en poche, vous savez où nous trouver pour l'entretien et la réparation de votre véhicule.</p>
                </div>


            </div><!-- .art-content -->


            <!-- Premium Author Box -->
            <div class="art-author-box">
                <img src="<?php echo $article['author_img']; ?>"
                     alt="<?php echo $article['author']; ?>"
                     class="art-author-avatar"
                     width="80" height="80">
                <div class="art-author-info">
                    <span class="art-author-label">La Parole à L'expert</span>
                    <h3><?php echo $article['author']; ?></h3>
                    <span class="art-author-role"><?php echo $article['author_role']; ?></span>
                    <p><?php echo $article['author_bio']; ?></p>
                    <a href="/equipe" class="art-author-link">Découvrir toute la rédaction</a>
                </div>
            </div>


            <!-- Heavy Conclusion Box -->
            <div class="art-conclusion">
                <h2>Le mot de la fin</h2>
                <p>Le permis de conduire — qu'il s'agisse du <strong>permis voiture</strong>, du <strong>permis moto</strong> ou du <strong>permis camion</strong> — reste une des démarches les plus importantes de la vie d'un conducteur. Des ressources comme <strong>90km.fr</strong> (<a href="https://www.90km.fr/" target="_blank" rel="nofollow noopener">www.90km.fr</a>) facilitent cette préparation. Une fois titulaire, n'oubliez jamais que l'entretien régulier de votre véhicule est le meilleur prolongement de cette formation : votre garage est là pour ça.</p>
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


        </div><!-- .art-main-col -->


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


    </div><!-- .art-layout-wrapper -->
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
            "datePublished" => "2026-04-02T10:00:00+02:00",
            "dateModified"  => "2026-04-02T10:00:00+02:00",
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
            ],
            "mentions" => [
                [
                    "@type" => "WebSite",
                    "name"  => "90km",
                    "url"   => "https://www.90km.fr/"
                ]
            ],
            "keywords" => "90km, 90km.fr, permis voiture, permis moto, permis camion, permis C, permis CE, code de la route, FIMO, FCO, ADR, formation transport, poids lourd"
        ]
    ]
];
echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>
</script>


<?php include __DIR__ . '/../footer.php'; ?>
