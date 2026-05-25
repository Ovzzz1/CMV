<?php
/**
 * toiture-amiante.php
 * Article : Toiture en fibrociment amiante : comment l'identifier, quels risques et que faire en 2026 ?
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-03-30
 */

$article_meta = [
    'title'        => 'Toiture en fibrociment amiante : comment l\'identifier, quels risques et que faire en 2026 ?',
    'category'     => 'travaux',
    'slug'         => 'toiture-amiante',
    'image'        => 'https://www.cemarenov.fr/image/toiture-amiante-1.webp',
    'excerpt'      => 'Votre toiture date d\'avant 1997 ? Voici comment reconnaître un toit en fibrociment amianté, évaluer le vrai niveau de risque et savoir quoi faire : nettoyage, remplacement, vente ou désamiantage.',
    'date'         => '2026-03-30',
    'reading_time' => 8,
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

<article>

    <!-- ═══════════════ HERO ═══════════════ -->
    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Toiture fibrociment amiante</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Amiante</span>
                <span class="article-tag">Fibrociment</span>
                <span class="article-tag">Désamiantage</span>
            </div>

            <h1>Toiture en fibrociment amiante :<br>
                <span class="h1-accent">identifier, risques et que faire en 2026</span>
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

    <!-- ═══════════════ 3 COLONNES ═══════════════ -->
    <div class="article-layout">

        <!-- ── SIDEBAR GAUCHE ── -->
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

        <!-- ── CONTENU CENTRAL ── -->
        <div class="article-container">

            <p class="article-intro">
                Vous avez un doute sur votre toiture, vous avez vu passer le mot <em>fibrociment</em> sur un diagnostic, ou vous visitez une maison des années 80-90. Dans ce cas, il faut prendre le sujet au sérieux, mais pas paniquer pour autant. Le vrai danger ne vient pas du simple fait d'avoir de l'amiante au-dessus de la tête : il vient de l'inhalation de fibres libérées quand le matériau s'use, casse, ou est manipulé pendant des travaux. Ce guide vous explique <strong>ce que vous devez savoir et quoi faire concrètement</strong>.
            </p>

            <div class="article-content">

                <!-- TL;DR -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Date clé :</strong> permis de construire avant le 1er juillet 1997 = présence d'amiante à vérifier obligatoirement.</li>
                        <li><strong>Vrai risque :</strong> l'inhalation des fibres lors de travaux ou de dégradation, pas le simple fait de vivre sous ce toit.</li>
                        <li><strong>À ne jamais faire :</strong> nettoyage haute pression, brossage agressif, découpe ou dépose sans entreprise certifiée.</li>
                        <li><strong>3 options :</strong> surveillance si bon état, confinement (surtoiture), ou désamiantage complet.</li>
                        <li><strong>Vente :</strong> diagnostic amiante obligatoire, pas d'interdiction de vente, décote possible à négocier.</li>
                    </ul>
                </div>

                <!-- SOMMAIRE -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Comment savoir si une toiture contient de l'amiante ?</li>
                        <li>Une toiture en amiante est-elle vraiment dangereuse ?</li>
                        <li>Que faire avec un toit en fibrociment amianté ? Les 3 options</li>
                        <li>Nettoyage et travaux : ce qu'il ne faut surtout pas faire soi-même</li>
                        <li>Achat ou vente d'une maison avec toiture en amiante</li>
                        <li>Quel est le prix pour traiter ou remplacer un toit en amiante ?</li>
                        <li>FAQ, Questions fréquentes</li>
                    </ul>
                </div>

                <!-- ═══ IDENTIFIER ═══ -->
                <h2 id="identifier">Comment savoir si une toiture contient de l'amiante ?</h2>

                <img src="<?php echo BASE_URL; ?>image/toiture-amiante-2.webp" alt="Plaques de fibrociment sur un toit ancien, potentiellement amiantées" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3 id="annee-construction">Attention à l'année de construction (avant 1997)</h3>

                <p>Le premier réflexe, c'est de vérifier la date du permis de construire. L'interdiction totale de l'amiante en France date du <strong>1er janvier 1997</strong>. Si la maison a été construite avant, par exemple dans les années 1980 ou 1990, la présence d'amiante dans certains matériaux de couverture doit être envisagée sérieusement. Si elle est postérieure à 1997, le risque est nul.</p>

                <h3 id="indices-visuels">Les indices visuels du fibrociment amianté vs non amianté</h3>

                <p>Sur les toitures, on parle très souvent de plaques ondulées ou d'ardoises synthétiques en <strong>fibrociment</strong>, parfois appelées amiante-ciment dans les documents plus anciens. Depuis 1997, les fabricants utilisent toujours du fibrociment, mais sans amiante (souvent marqué de la mention "NT" pour <em>Non Asbestos Technology</em>). Mais à l'œil nu, distinguer une plaque d'avant 1997 d'une plaque plus récente est quasiment impossible une fois qu'elles ont vieilli.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>À retenir :</strong> mousse épaisse, teinte grisâtre uniforme, plaques ondulées plus épaisses qu'une tôle classique, ce sont des indices, mais pas une certitude. La forme et l'aspect ne permettent pas de conclure seul.
                </div>

                <h3 id="diagnostic-certifie">Seul un diagnostic amiante peut confirmer à 100 %</h3>

                <p>C'est là que beaucoup de propriétaires se plantent : ils veulent une réponse définitive en regardant le toit depuis le jardin. En pratique, seul un repérage ou un diagnostic réalisé par un <strong>diagnostiqueur certifié</strong>, qui prélève un échantillon envoyé en laboratoire, permet de confirmer la présence ou l'absence d'amiante. Pour les biens vendus, ce diagnostic est d'ailleurs une obligation légale si le permis de construire est antérieur au 1er juillet 1997.</p>

                <!-- ═══ DANGER ═══ -->
                <h2 id="danger">Une toiture en amiante est-elle vraiment dangereuse ?</h2>

                <img src="<?php echo BASE_URL; ?>image/toiture-amiante-3.webp" alt="Fibres d'amiante libérées lors de la manipulation de plaques de fibrociment dégradées" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3 id="risque-inhalation">Le vrai risque : l'inhalation des fibres, pas le simple contact</h3>

                <p>Oui, l'amiante est un <strong>matériau cancérogène avéré</strong>. Les fibres inhalées peuvent provoquer des maladies respiratoires graves, mésothéliome, fibrose pulmonaire, des décennies après l'exposition. Mais il faut être précis : une toiture en fibrociment en bon état n'expose pas les habitants de la même façon qu'un matériau friable comme les anciens flocages ou les calorifugeages. Les fibres sont libérées uniquement quand le matériau est perturbé ou dégradé.</p>

                <p>Le ministère de la Transition écologique et l'INRS rappellent tous les deux que le risque de dispersion des fibres apparaît surtout lors de <strong>travaux ou quand l'intégrité du matériau est compromise</strong>. Un toit en bon état, non dégradé, ne libère pas de fibres dans l'air ambiant.</p>

                <h3 id="quand-danger">Quand le danger devient-il réel ?</h3>

                <p>Un diagnostic indiquant "état de conservation correct" n'est pas une urgence sanitaire. Le danger devient bien réel dès qu'on parle de :</p>

                <ul class="custom-list">
                    <li>Nettoyage haute pression ou brossage agressif</li>
                    <li>Perçage pour poser un Vélux, une antenne ou une VMC</li>
                    <li>Découpe à la meuleuse ou à la disqueuse</li>
                    <li>Casse accidentelle ou usure extrême liée aux intempéries</li>
                    <li>Dépose sans précaution lors d'une rénovation</li>
                </ul>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Situation</th><th>Niveau de risque</th><th>Action recommandée</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Toit en bon état, aucun chantier prévu</strong></td><td>Faible</td><td>Surveillance périodique</td></tr>
                            <tr><td><strong>Toit dégradé, fissures, mousse importante</strong></td><td>Modéré</td><td>Diagnostic + évaluation pro</td></tr>
                            <tr><td><strong>Travaux touchant les plaques (perçage, coupe)</strong></td><td>Élevé</td><td>Entreprise certifiée obligatoire</td></tr>
                            <tr><td><strong>Dépose complète sans précaution</strong></td><td>Critique</td><td>Désamiantage réglementé + BSDA</td></tr>
                        </tbody>
                    </table>
                </div>

                <!-- ═══ QUE FAIRE ═══ -->
                <h2 id="que-faire">Que faire avec un toit en fibrociment amianté ? Les 3 options</h2>

                <img src="<?php echo BASE_URL; ?>image/toiture-amiante-4.webp" alt="Trois options face à un toit en amiante : surveillance, confinement par surtoiture ou désamiantage complet" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3 id="option-surveillance">Option 1 — La surveillance (toiture en bon état)</h3>

                <p>Si la toiture est identifiée amiantée mais en bon état, et qu'aucun chantier n'est prévu, la logique réglementaire est d'organiser une <strong>évaluation périodique de son état de conservation</strong>. Vous n'avez pas l'obligation de tout arracher demain matin. Un professionnel certifié documente l'état des plaques et fixe la fréquence des contrôles suivants selon les résultats.</p>

                <h3 id="option-confinement">Option 2 — Le confinement (surtoiture par-dessus)</h3>

                <p>Si la charpente le supporte, il est souvent possible de poser une <strong>surtoiture</strong>, bacs acier, tuiles légères, directement par-dessus les plaques de fibrociment existantes. On isole ainsi le matériau dangereux de l'air libre sans avoir à le manipuler ni le retirer. Cette solution est généralement moins coûteuse que le retrait complet. Attention à bien vérifier la résistance de la charpente avant : le fibrociment est léger, le métal ou la tuile le sont moins.</p>

                <h3 id="option-desamiantage">Option 3 — Le désamiantage (retrait et remplacement complet)</h3>

                <p>Quand la toiture fuit, se dégrade fortement, ou que vous refaites l'isolation par l'extérieur, le retrait complet suivi de la pose d'une nouvelle couverture devient la seule vraie solution durable. Ce chantier doit être <strong>obligatoirement confié à une entreprise certifiée</strong>. Les déchets amiantés suivent un circuit réglementé strict jusqu'à leur traitement final. Si vous refaites la toiture dans la foulée, consultez notre guide sur le <a href="<?php echo BASE_URL; ?>changement-de-couverture" style="text-decoration: underline;"><strong>changement de couverture</strong></a> pour anticiper les étapes qui suivent.</p>

                <!-- ═══ ERREURS ═══ -->
                <h2 id="erreurs">Nettoyage et travaux : ce qu'il ne faut surtout pas faire soi-même</h2>

                <blockquote class="article-blockquote">
                    <p>"L'an dernier, j'ai été appelé par un client qui voulait 'donner un coup de propre' à sa toiture en fibrociment des années 80 avant de mettre sa maison en vente. Il a passé le nettoyeur haute pression tout le week-end. Résultat : il a pulvérisé la couche superficielle du ciment, libérant des millions de fibres dans l'air, sur sa façade, dans ses gouttières et sur la pelouse du voisin. Un simple démoussage s'est transformé en chantier de décontamination complet. Ne faites jamais ça."</p>
                </blockquote>

                <img src="<?php echo BASE_URL; ?>image/toiture-amiante-5.webp" alt="Nettoyage haute pression interdit sur une toiture en fibrociment amianté, risque de libération de fibres" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3 id="nettoyage-interdit">Peut-on démousser ou nettoyer une toiture amiantée ?</h3>

                <p>Surtout <strong>pas avec un nettoyeur haute pression</strong>, ni avec un brossage dur à la brosse métallique. Ces méthodes libèrent les fibres. Si la toiture nécessite un traitement, on utilise des produits biocides appliqués à basse pression, idéalement par des professionnels équipés d'EPI (<em>Équipements de Protection Individuelle</em>, combinaison, masque à filtre P3, gants). Le budget sera forcément plus élevé qu'un démoussage classique de tuiles béton.</p>

                <h3 id="marcher-interdit">Peut-on marcher sur des plaques de fibrociment ?</h3>

                <p>Non. Le fibrociment ancien devient cassant avec le temps. Marcher dessus sans protection, c'est risquer de passer au travers, avec tout ce que ça implique en termes de chute, et de briser la plaque, ce qui libère immédiatement de l'amiante. Toute intervention en hauteur sur ce type de toiture nécessite des dispositifs antichute adaptés et des protections de marche spécifiques.</p>

                <h3 id="entreprise-certifiee">L'obligation de passer par une entreprise certifiée</h3>

                <p>Retirer, découper ou manipuler des éléments amiantés n'est pas un chantier du dimanche. La réglementation encadre très strictement ces interventions : l'entreprise doit être formée selon le niveau d'empoussièrement concerné (<strong>Sous-section 4</strong> pour les interventions sur matériaux amiantés, <strong>Sous-section 3</strong> pour les retraits). Les déchets ne peuvent pas aller à la déchetterie du coin : ils nécessitent un <strong>Bordereau de Suivi des Déchets Amiantés (BSDA)</strong> et un traitement dans des installations de stockage de déchets dangereux (ISDD) agréées.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>Attention :</strong> une entreprise qui vous propose de retirer votre toiture amiantée sans mentionner les obligations réglementaires (BSDA, certification, EPI) est soit incompétente, soit peu scrupuleuse. Demandez systématiquement la preuve de certification avant toute intervention.
                </div>

                <!-- ═══ IMMOBILIER ═══ -->
                <h2 id="immobilier">Achat ou vente d'une maison avec toiture en amiante</h2>

                <img src="<?php echo BASE_URL; ?>image/toiture-amiante-5.webp" alt="Diagnostic amiante avant vente d'une maison avec toiture en fibrociment" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3 id="diagnostic-vente">Le diagnostic amiante avant vente est obligatoire</h3>

                <p>Si vous vendez (ou achetez) un logement dont le <strong>permis de construire a été délivré avant le 1er juillet 1997</strong>, le diagnostic amiante est obligatoire. Son rôle est précis : informer l'acquéreur sur la présence ou l'absence de matériaux contenant de l'amiante. La présence d'amiante n'interdit absolument pas la vente, elle doit simplement figurer dans le dossier de diagnostics techniques remis lors de la signature.</p>

                <h3 id="negociation-prix">Un toit en amiante permet-il de négocier le prix ?</h3>

                <p>Oui, clairement. Même si le toit est en bon état aujourd'hui, l'acheteur sait qu'il devra un jour payer un entretien spécifique ou un désamiantage complet. La présence d'amiante entraîne souvent une <strong>décote sur le prix de vente</strong> pour compenser ces futurs frais. La meilleure approche pour l'acheteur : faire réaliser des devis de désamiantage avant la transaction, pour négocier avec des chiffres réels plutôt qu'une pression vague.</p>

                <!-- ═══ PRIX ═══ -->
                <h2 id="prix">Quel est le prix pour traiter ou remplacer un toit en amiante ?</h2>

                <h3 id="prix-desamiantage">Les coûts du désamiantage</h3>

                <p>Il faut raisonner en deux postes distincts. D'abord, la <strong>dépose des plaques</strong> par l'entreprise certifiée, avec confinement du chantier, port des EPI et conditionnement sécurisé des déchets. Ensuite, le <strong>transport et traitement des déchets amiantés</strong>, facturé à la tonne ou au m² de déchets produits. C'est souvent ce second poste qui fait exploser les devis et surprend les propriétaires.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Poste</th><th>Fourchette indicative</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Désamiantage (dépose + conditionnement)</strong></td><td>20–50 €/m²</td></tr>
                            <tr><td><strong>Évacuation et traitement déchets amiantés</strong></td><td>300–600 €/tonne</td></tr>
                            <tr><td><strong>Nouvelle couverture (pose + fourniture)</strong></td><td>80–250 €/m² selon matériau</td></tr>
                            <tr><td><strong>Reprise charpente si nécessaire</strong></td><td>Variable selon diagnostic</td></tr>
                        </tbody>
                    </table>
                </div>

                <h3 id="prix-couverture">Le coût de la nouvelle couverture</h3>

                <p>Aux frais de désamiantage, il faut bien sûr ajouter le prix de la nouvelle toiture, bac acier, tuiles béton ou terre cuite, ardoises naturelles. Si les nouveaux matériaux sont plus lourds que l'ancien fibrociment, vérifiez d'abord que la charpente peut les supporter : une reprise de charpente peut rapidement doubler la facture globale. Notre guide sur le <a href="<?php echo BASE_URL; ?>changement-de-couverture" style="text-decoration: underline;"><strong>changement de couverture</strong></a> vous aidera à affiner votre budget selon le matériau choisi.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>Conseil :</strong> demandez toujours au moins 3 devis à des entreprises certifiées. Comparez ligne à ligne le poste "gestion des déchets amiantés", c'est là que les écarts entre devis sont souvent les plus importants et les moins visibles.
                </div>

                <!-- ═══ FAQ ═══ -->
                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Peut-on vivre dans une maison avec une toiture en fibrociment amianté ?</h3>
                <p>Oui. La présence d'amiante dans un matériau en place et en bon état n'implique pas un danger immédiat. Le risque devient critique uniquement quand des fibres sont libérées dans l'air lors de travaux ou de dégradation importante. Une toiture intacte, surveillée, ne met pas les occupants en danger au quotidien.</p>

                <h3>Faut-il obligatoirement remplacer une toiture amiantée ?</h3>
                <p>Non, pas systématiquement. La réglementation n'impose pas le remplacement immédiat d'une toiture amiantée en bon état chez un particulier. Elle impose un repérage, une évaluation de l'état de conservation, et une surveillance régulière. Le remplacement devient incontournable si des travaux doivent toucher les matériaux amiantés ou si l'état de dégradation crée un risque d'exposition.</p>

                <h3>Peut-on vendre une maison avec un toit en amiante ?</h3>
                <p>Oui. La vente n'est pas interdite. L'obligation porte sur l'information : pour tout bien dont le permis de construire est antérieur au 1er juillet 1997, le vendeur doit fournir un diagnostic amiante à l'acquéreur. L'acheteur est libre d'accepter les conditions ou de négocier une décote sur le prix.</p>

                <h3>Peut-on nettoyer ou démousser une toiture en fibrociment soi-même ?</h3>
                <p>Non, pas avec un nettoyeur haute pression ni une brosse métallique. Ces méthodes libèrent des fibres d'amiante. Tout traitement d'une toiture susceptible de contenir de l'amiante nécessite des précautions spécifiques et des équipements de protection adaptés. Confiez cette opération à un professionnel.</p>

                <h3>Où jeter des plaques de fibrociment amianté ?</h3>
                <p>Il est strictement interdit de les jeter dans la nature ou aux encombrants. Elles doivent être conditionnées dans des emballages étanches homologués et déposées dans une installation de stockage de déchets dangereux (ISDD) agréée, avec un Bordereau de Suivi des Déchets Amiantés (BSDA). Certaines déchetteries acceptent de petites quantités d'amiante lié, renseignez-vous directement auprès de la vôtre avant de vous déplacer.</p>

                <h3>Quel est le bon réflexe avant un chantier sur un toit ancien ?</h3>
                <p>Faire vérifier la présence d'amiante et cadrer l'intervention avant de toucher au matériau. Sur ce sujet, improviser coûte toujours plus cher que vérifier correctement dès le départ, aussi bien en termes de budget que de responsabilité.</p>

            </div><!-- /.article-content -->

            <!-- AUTHOR BOX -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- CONCLUSION CTA -->
            <div class="conclusion-box">
                <h3>Besoin d'un devis désamiantage ou réfection de toiture ?</h3>
                <p>Une toiture en fibrociment amianté se gère dans l'ordre : d'abord le diagnostic, ensuite la décision. Surveillance, confinement ou désamiantage complet, chaque situation a sa réponse. Si votre chantier nécessite une intervention sur ces matériaux, faites appel à un professionnel certifié.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis gratuit</a>
            </div>

            <!-- ARTICLES SIMILAIRES -->
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

        <!-- ── SIDEBAR DROITE ── -->
        <aside class="sidebar-right">
            <div class="sidebar-sticky">

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles, <?php echo htmlspecialchars($category['name'] ?? 'Toiture'); ?></h3>
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

<?php
require_once dirname(__DIR__) . '/schema-data.php';

$faq_schema = [
    [
        'question' => "Peut-on vivre dans une maison avec une toiture en fibrociment amianté ?",
        'answer'   => "Oui. La présence d'amiante dans un matériau en place et en bon état n'implique pas un danger immédiat. Le risque devient critique uniquement quand des fibres sont libérées dans l'air lors de travaux ou de dégradation importante."
    ],
    [
        'question' => "Faut-il obligatoirement remplacer une toiture amiantée ?",
        'answer'   => "Non, pas systématiquement. La réglementation n'impose pas le remplacement immédiat d'une toiture amiantée en bon état. Elle impose un repérage, une évaluation de l'état de conservation, et une surveillance régulière. Le remplacement devient incontournable si des travaux doivent toucher les matériaux amiantés ou si l'état de dégradation crée un risque d'exposition."
    ],
    [
        'question' => "Peut-on vendre une maison avec un toit en amiante ?",
        'answer'   => "Oui. La vente n'est pas interdite. L'obligation porte sur l'information : pour tout bien dont le permis de construire est antérieur au 1er juillet 1997, le vendeur doit fournir un diagnostic amiante à l'acquéreur. L'acheteur est libre d'accepter les conditions ou de négocier une décote sur le prix."
    ],
    [
        'question' => "Peut-on nettoyer ou démousser une toiture en fibrociment soi-même ?",
        'answer'   => "Non, pas avec un nettoyeur haute pression ni une brosse métallique. Ces méthodes libèrent des fibres d'amiante. Tout traitement d'une toiture susceptible de contenir de l'amiante nécessite des précautions spécifiques et des équipements de protection adaptés."
    ],
    [
        'question' => "Où jeter des plaques de fibrociment amianté ?",
        'answer'   => "Il est strictement interdit de les jeter dans la nature ou aux encombrants. Elles doivent être conditionnées dans des emballages étanches homologués et déposées dans une installation de stockage de déchets dangereux (ISDD) agréée, avec un Bordereau de Suivi des Déchets Amiantés (BSDA)."
    ],
    [
        'question' => "Quel est le bon réflexe avant un chantier sur un toit ancien ?",
        'answer'   => "Faire vérifier la présence d'amiante et cadrer l'intervention avant de toucher au matériau. Sur ce sujet, improviser coûte toujours plus cher que vérifier correctement dès le départ."
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

