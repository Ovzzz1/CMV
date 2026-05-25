<?php
/**
 * traitement-curatif-charpente.php
 * Article: Traitement Curatif Charpente
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Traitement curatif charpente : prix, étapes et guide complet',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/traitement%20curatif%20charpente5.webp',
    'excerpt' => 'Votre charpente est attaquée par des nuisibles ? Découvrez le traitement curatif charpente : diagnostic, étapes, prix et comment choisir un artisan qualifié.',
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
                <span>Traitement curatif charpente</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Charpente</span>
                <span class="article-tag">Traitement</span>
            </div>

            <h1>Traitement curatif charpente :<br>
                <span class="h1-accent">Prix, Étapes et Guide Complet</span>
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
                Imaginez le pilier de votre habitation, votre <strong>charpente bois</strong>, silencieusement attaquée
                par des envahisseurs invisibles. Lorsque les nuisibles se sont installés, un <strong>traitement curatif
                    charpente</strong> devient une nécessité vitale. Ce guide vous offre les clés pour comprendre,
                diagnostiquer et agir efficacement contre ces menaces, afin de préserver votre <strong>structure
                    bois</strong> de la ruine.
            </p>

            <figure style="margin: 2rem 0; max-width: 100%;">
                <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/traitement%20curatif%20charpente1.webp"
                    alt="Vue rapprochée d'une ancienne poutre de charpente lors d'un traitement curatif">
                <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Une intervention rapide est la seule chance de sauver une charpente infestée par des
                    insectes xylophages.</figcaption>
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
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> Le
                            <strong>traitement curatif charpente</strong> est indispensable pour éradiquer les insectes
                            xylophages (termites, capricornes) et les champignons (mérule) déjà installés.</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span>
                            L'intervention suit un protocole strict : bûchage pour retirer le bois mort, perçage et
                            <strong>injection d'un produit insecticide/fongicide</strong> sous pression au cœur des
                            poutres.</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> Il ne faut
                            <strong>jamais utiliser le DIY</strong> pour un tel traitement : seule l'intervention d'un
                            <strong>artisan agréé</strong> garantit le résultat et l'assurance décennale pour la
                            sécurité de votre habitation.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#definition">Qu'est-ce qu'un traitement curatif et pourquoi est-ce urgent ?</a>
                        </li>
                        <li><a href="#comparaison">Curatif ou Préventif : Ne faites pas l'erreur !</a></li>
                        <li><a href="#diagnostic">Les 5 signes qui prouvent que votre charpente est dévorée</a></li>
                        <li><a href="#etapes">Comment se déroule un traitement curatif professionnel ?</a></li>
                        <li><a href="#prix">Prix d'un traitement curatif charpente et pourquoi éviter le
                                "Fait-Maison"</a></li>
                        <li><a href="#faq">Vos Questions Fréquentes (FAQ)</a></li>
                    </ul>
                </div>

                <h2 id="definition">Qu'est-ce qu'un traitement curatif et pourquoi est-ce urgent ?</h2>
                <p>Un <strong>traitement curatif charpente</strong> est une solution active et corrective face à une
                    infestation déjà établie. Son objectif premier est de stopper net la dégradation de la
                    <strong>structure bois</strong> causée par les parasites, qu'il s'agisse d'insectes xylophages ou de
                    champignons destructeurs. En agissant directement au cœur des zones attaquées, il évite
                    l'affaiblissement structurel et l'effondrement potentiel de votre toit.</p>
                <p>Les bénéfices clés du traitement sont immédiats :</p>
                <ul class="custom-list">
                    <li>Sauvetage et préservation de la solidité structurelle de la maison.</li>
                    <li>Éradication totale des colonies de parasites.</li>
                    <li>Valorisation et certification du bien immobilier (indispensable pour une future revente).</li>
                    <li>Arrêt d'une angoisse légitime pour les occupants.</li>
                </ul>

                <h2 id="comparaison">Curatif ou Préventif : Ne faites pas l'erreur !</h2>
                <p>La confusion entre traitement curatif et <strong><a href="<?php echo BASE_URL; ?>traitement-preventif-charpente" style="text-decoration: underline;">traitement préventif</a></strong> est fréquente.
                    Pourtant, appliquer un traitement préventif de surface sur une charpente déjà pourrie de l'intérieur
                    équivaut à mettre un pansement sur une jambe de bois.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Critère</th>
                                <th>Traitement Curatif charpente</th>
                                <th>Traitement Préventif charpente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Objectif</strong></td>
                                <td>Tuer les nuisibles actifs et stopper la casse</td>
                                <td>Protéger un bois sain d'une future attaque</td>
                            </tr>
                            <tr>
                                <td><strong>Cible</strong></td>
                                <td>Bois fragilisé, piqué, attaqué en profondeur</td>
                                <td>Bois neuf ou propre âgé de plus de 10 ans</td>
                            </tr>
                            <tr>
                                <td><strong>Méthode technique</strong></td>
                                <td>Bûchage + forage + <strong>Injection sous pression</strong> + pulvérisation</td>
                                <td>Pulvérisation de surface (double couche)</td>
                            </tr>
                            <tr>
                                <td><strong>Coût</strong></td>
                                <td>Élevé (intervention de sauvetage lourde)</td>
                                <td>Moins cher (application de routine)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="diagnostic">Les 5 signes qui prouvent que votre charpente est dévorée</h2>
                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/traitement%20curatif%20charpente2.webp"
                        alt="Charpente fortement attaquée et fragilisée par des termites ou capricornes">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">La présence de sciure au sol ou sur les éléments de charpente est l'un des signes les
                        plus évidents d'attaque.</figcaption>
                </figure>

                <p>Repérer l'ennemi le plus tôt possible est crucial pour limiter la facture du <strong>traitement
                        curatif charpente</strong>. Voici les signes d'alerte à ne jamais ignorer dans vos combles :</p>

                <ul class="custom-list">
                    <li><strong>De la sciure (ou vermoulure) :</strong> De petits tas de "farine de bois" beige ou brune
                        sous les poutres. C'est le résidu du repas des insectes.</li>
                    <li><strong>Des trous de sortie :</strong> De minuscules orifices ronds ou ovales en surface du
                        bois. C'est par là que l'insecte adulte s'échappe après avoir grandi dans le bois.</li>
                    <li><strong>Des galeries affleurantes :</strong> En grattant légèrement à l'aide d'un tournevis, le
                        bois s'effrite et révèle des tunnels.</li>
                    <li><strong>Des bruits de grignotement :</strong> Le capricorne des maisons, lorsqu'il est sous
                        forme de larve charnue, fait un bruit de frottement "cric-cric" caractéristique audible dans le
                        silence de la nuit.</li>
                    <li><strong>Un bois mou ou des champignons :</strong> Si le bois s'affaisse sous la pression du
                        doigt, ou si des amas blanchâtres/roux (Mycélium) apparaissent dans une <a href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">zone humide</a> (souvent
                        proche d'une <a href="<?php echo BASE_URL; ?>remaniement-de-couverture" style="text-decoration: underline;">fuite de toiture</a>), il s'agit d'une attaque fongique majeure (comme la Mérule).</li>
                </ul>

                <blockquote class="article-blockquote">
                    L'anecdote de chantier : Des clients m'ont appelé un jour après avoir entendu des grincements dans
                    le plafond de leur chambre. Ils pensaient à des souris. En grimpant, j'ai trouvé une attaque massive
                    de capricornes ! Le bois d'une des poutres maîtresses sonnait complètement creux. Il a fallu poser
                    des étais, changer une section, et réaliser un traitement curatif d'urgence par injection profonde.
                    N'attendez jamais quand vous entendez travailler le bois.
                </blockquote>

                <h2 id="etapes">Comment se déroule un traitement curatif professionnel ?</h2>
                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/traitement%20curatif%20charpente3.webp"
                        alt="Artisan procédant à l'injection sous pression du produit fongicide dans une grosse poutre en bois">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">L'injection sous pression est la seule méthode capable de noyer les larves cachées au
                        fond des galeries.</figcaption>
                </figure>

                <p>L'efficacité d'un <strong>traitement curatif bois</strong> repose sur un protocole très rigoureux. La
                    simple pulvérisation vendue dans le commerce n'aura aucun effet sur les larves enfouies à plusieurs
                    centimètres de profondeur au cœur de la poutre.</p>

                <ol>
                    <li><strong>Le Diagnostic :</strong> Identification de la bébête (Termite ? Capricorne ? Vrillette
                        ?). La méthode chimique en dépend.</li>
                    <li><strong>Le Bûchage :</strong> Étape très physique. Le technicien utilise une hachette pour
                        abattre toutes les parties du bois vermoulu, "mortes". L'objectif est de retrouver le bois dur,
                        structurellement sain.</li>
                    <li><strong>Le Brossage/Dépoussiérage :</strong> Indispensable pour que le bois boive le traitement.
                    </li>
                    <li><strong>Le Forage :</strong> Perçage de puits (trous) en quinconce sur les grosses sections de
                        bois (pannes, chevrons). Mises en place de chevilles d'injection en plastique (les injecteurs).
                    </li>
                    <li><strong>L'Injection sous pression :</strong> C'est le cœur du <strong>traitement curatif
                            charpente</strong>. À l'aide d'un pistolet à air comprimé, on force un liquide puissant ou
                        un gel (insecticide + fongicide) à pénétrer par la cheville pour saturer la poutre de
                        l'intérieur et assassiner tout ce qui s'y trouve.</li>
                    <li><strong>La Pulvérisation finale :</strong> Le professionnel applique deux bonnes couches du
                        produit en surface pour empoisonner toute fibre de bois et empêcher d'une quelconque potentielle
                        ré-infestation venant de l'extérieur.</li>
                </ol>

                <h2 id="prix">Prix d'un traitement curatif charpente et pourquoi éviter le "Fait-Maison"</h2>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/traitement%20curatif%20charpente4.webp"
                        alt="Une équipe de couvreurs professionnels nettoyant des gravats après le bûchage d'une charpente ancienne">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Ce type de chantier génère une grande quantité de bois mort (bûchage) et nécessite un
                        équipement de protection intégrale.</figcaption>
                </figure>

                <p>Certains bricoleurs pensent pouvoir régler le problème en badigeonnant au pinceau de l'insecticide
                    bas de gamme. <strong>C'est une erreur fatale pour votre charpente.</strong></p>

                <ul class="custom-list">
                    <li><strong>La chimie professionnelle :</strong> Les produits certifiés (CTB P+) utilisés par
                        l'artisan sont inaccessibles aux particuliers et infiniment plus rémanents. Surtout face à la
                        toxicité : un pro intervient avec une combinaison de niveau 3 et un masque à gaz A2P3 !</li>
                    <li><strong>Le matériel :</strong> Sauf à être outillé avec une pompe d'injection haute pression
                        professionnelle, vos produits maison resteront en surface. Vous n'atteindrez jamais les larves
                        de capricorne enfouies à 5 centimètres.</li>
                    <li><strong>L'assurance :</strong> Une entreprise certifiée (idéalement RGE et A+ pour la charpente)
                        inclura une <strong>garantie décennale (10 ans)</strong> suite à son intervention. Vous
                        protégeant en cas de loupé ou de retour de l'infestation.</li>
                </ul>

                <p>Le <strong>prix d'un traitement curatif charpente</strong> complet oscille souvent entre <strong>40 €
                        et 120 € / m² traité</strong>. Le delta varie selon l'accessibilité (rampants isolés à
                    découvrir), la proportion du bûchage à réaliser, et le nuisible (les termites imposent un protocole
                    beaucoup plus lourd et contrôlé que la vrillette). C'est un coût notable, mais dérisoire par rapport
                    au prix d'une charpente intégrale neuve si le toit s'affaisse.</p>

                <h2 id="faq">Vos Questions Fréquentes (FAQ)</h2>
                <div class="faq-section">
                    <h3>Quels sont les meilleurs produits pour traiter les charpentes ?</h3>
                    <p>Il n'existe pas de "meilleur" produit universel, mais des solutions adaptées au type de nuisible
                        (xylophage, champignon) et à l'étendue de l'infestation. Privilégiez les produits agréés,
                        rémanents, et, si possible, en phase aqueuse (gels sans odeurs toxiques). C'est pourquoi on fait
                        généralement appel à la gamme Xylophène Industrie ou Cecil Pro via des applicateurs.</p>

                    <h3>Le traitement de charpente est-il obligatoire par la loi ?</h3>
                    <p>Non, pas de manière systématique pour tous. Toutefois, un traitement préventif et curatif
                        anti-termite devient obligatoirement exigé par la mairie dans de nombreuses régions (Sud, Ouest,
                        ou quartiers classés en secteurs infestés). Ne pas agir sur une charpente prête à céder engage
                        aussi votre responsabilité pour "mise en péril".</p>

                    <h3>Puis-je aménager mes combles juste après un traitement curatif ?</h3>
                    <p>Certainement pas de suite ! Même avec les produits modernes sans solvant, l'artisan vous exigera
                        une aération intensive pendant 24h à 72h minimum pour évacuer l'humidité apportée par la
                        pulvérisation, et éliminer toute concentration atmosphérique avant que vous n'alliez isoler avec
                        votre laine de verre et visser votre placoplâtre ! Laissez le bois ressuyer (sécher).</p>

                    <h3>Que faire si ma charpente est cachée par mon isolation (laine de verre) ?</h3>
                    <p>Dans 90% des cas, le traitement de charpente entraîne le "sinistre" de la vieille isolation. Il
                        faut retirer, voire jeter la laine de verre existante (souvent souillée de déjections de
                        capricornes et de poussières) pour avoir le champ libre jusqu'aux pannes intérieures pour le
                        perçage. L'étape de la <a href="<?php echo BASE_URL; ?>isolation-des-combles-perdus" style="text-decoration: underline;">nouvelle isolation</a> suivra après l'intervention du charpentier.</p>
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
                        conseils concrets et sans langue de bois pour r&eacute;ussir vos travaux et pérenniser votre
                        maison.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <section class="conclusion-box">
                <h2 style="color: #ffffff;">Agissez avant que les dégâts ne soient irréversibles</h2>
                <p style="margin-bottom: 0;">Le <strong>traitement curatif charpente</strong> relève de la chirurgie du
                    bâti. En présence de sciures ou de bruits suspects au plafond, chaque semaine d'hésitation aggrave
                    les failles de votre structure. Ne tentez pas une solution de fortune au pinceau : seul un
                    professionnel outillé pour l'injection profonde et le bûchage vous garantira la durabilité de votre
                    couverture pour la décennie à venir.</p>
                <div style="margin-top:2rem; text-align:center;">
                    <a href="<?php echo BASE_URL; ?>contact" class="btn-primary"
                        style="display: inline-block; padding: 15px 30px; font-weight: 600; text-decoration: none; transition: 0.3s; color: #fff;">Demander
                        un diagnostic Charpente (Artisan RGE)</a>
                </div>
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