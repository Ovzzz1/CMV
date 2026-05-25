<?php
/**
 * ravalement-de-facade.php
 * Article: Ravalement de Façade — prix m², loi 2026, étapes et aides de l'État
 */

$article_meta = [
    'title' => 'Ravalement de Façade 2026 : Prix au m², Obligations Légales et Aides',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/ravalement-de-facade.webp',
    'excerpt' => 'Le ravalement n\'est plus qu\'un coup de peinture. Entre l\'obligation légale des 10 ans et la nouvelle loi imposant l\'Isolation (ITE), voici les vrais prix au m² et les aides de l\'État en 2026.',
    'date' => '2026-03-05',
    'reading_time' => 11,
];

require_once dirname(__DIR__) . '/functions.php';

$page_title = $article_meta['title'];
$page_description = $article_meta['excerpt'];

$current_cat = $article_meta['category'];
$current_url = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category = get_category($current_cat);
$other_cats = get_other_categories($current_cat);
$cat_articles = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles = array_slice($cat_articles, 0, 10);
$latest_articles = array_values(array_filter(get_latest_articles(11), fn($a) => ($a['url'] ?? '') !== $current_url));
$latest_articles = array_slice($latest_articles, 0, 10);

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

<article>
    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Ravalement</span>
            </nav>
            
            <div class="article-tags">
                <span class="article-tag">Façade</span>
                <span class="article-tag">Législation</span>
            </div>

            <h1>Ravalement de Façade 2026 :<br>
                <span class="h1-accent">Prix, Nouvelles Lois et Aides de l'État</span>
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

    <div class="article-layout">

        <aside class="sidebar-left">
            <div class="sidebar-sticky">
                <h3 class="sidebar-title">Nos Univers</h3>
                <?php foreach ($other_cats as $slug => $cat): ?>
                    <a href="<?php echo BASE_URL . $slug; ?>" class="sidebar-cat-card">
                        <img src="<?php echo $cat['image']; ?>" alt="<?php echo htmlspecialchars($cat['name']); ?>">
                        <span class="sidebar-cat-name"><?php echo htmlspecialchars($cat['name']); ?></span>
                    </a>
                <?php
endforeach; ?>
            </div>
        </aside>

        <div class="article-container">
            
            <p class="article-intro">
                Historiquement, le ravalement de façade consistait à nettoyer les murs et repasser un <a href="<?php echo BASE_URL; ?>enduit-facade" style="text-decoration: underline;">enduit propre</a> pour satisfaire au code de l'urbanisme. En 2026, l'Etat a sifflé la fin de la récréation : le ravalement est devenu le fer de lance de la "rénovation énergétique". Loi climat, interdiction de louer des passoires thermiques, <a href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite" style="text-decoration: underline;">obligation d'isoler (ITE)</a> dans certains cas... Un projet de façade mal ficelé peut aujourd'hui bloquer la revente ou la location de votre bien. Quels sont vos devoirs légaux face à votre Mairie ? Quels sont les vrais coûts au m² d'un maçon ou façadier professionnel ? Et <strong>surtout</strong>, quelles sont les aides "MaPrimeRénov'" qui survivent en 2026 pour faire chuter la facture ? Le guide sans détours.
            </p>

            <div class="article-content">
                
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Le prix au m² :</strong> Comptez de <strong>40 à 70 €</strong> pour une peinture/nettoyage, de <strong>80 à 120 €</strong> pour une purge de l'ancien crépi avec réfection traditionnelle à la Chaux, et de <strong>150 à 250 €</strong> si vous ajoutez l'Isolation par l'Extérieur (ITE).</li>
                        <li><strong>L'Obligation (La Loi des 10 ans) :</strong> Dans environ un tiers des grandes communes françaises (Paris, centres historiques), le ravalement est juridiquement obligatoire tous les 10 ans (amende de 3750 €).</li>
                        <li><strong>L'Obligation d'Isoler (Décret 2017) :</strong> Si vous piquez ou refaites l'enduit sur plus de 50% de votre façade, la loi vous <strong>oblige</strong> désormais à adjoindre une isolation thermique, sauf dérogation (ABF ou impossibilité technique).</li>
                        <li><strong>Les Aides 2026 :</strong> "MaPrimeRénov' Par Geste" ne subventionne PLUS l'<a href="https://www.cemarenov.fr/isolation-des-murs">isolation des murs</a> extérieurs seule. Vous devez passer par le "Parcours Accompagné" (rénovation globale) ou vous contenter des primes CEE et de l'Eco-PTZ.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#loi-obligations">La Législation 2026 : Ce que la Mairie peut vous imposer</a></li>
                        <li><a href="#etapes">Les 4 étapes d'un vrai ravalement de façade</a></li>
                        <li><a href="#prix">Le Prix au m² d'un façadier en 2026 (Tableau)</a></li>
                        <li><a href="#aides">Aides de l'Etat : Le grand changement 2026</a></li>
                        <li><a href="#faq">Foire Aux Questions (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Section 1 : Législation -->
                <h2 id="loi-obligations">La Législation 2026 : Ce que la Mairie peut vous imposer</h2>
                <p>Beaucoup de propriétaires pensent que l'extérieur de leur maison leur appartient totalement. C'est faux. La façade appartient au paysage visuel de la commune, et se plie à deux textes de loi majeurs.</p>

                <h3>1. L'injonction de ravalement (La fameuse règle des 10 ans)</h3>
                <p>Selon le Code de la Construction et de l'Habitation (Article L. 132-1), les façades doivent être tenues en "bon état de propreté". Mais dans les communes figurant sur un arrêté préfectoral spécifique (comme Paris et la totalité des villes des Hauts-de-Seine, mais aussi de nombreux centres urbains comme Lyon ou Bordeaux), <strong>le ravalement est obligatoire tous les 10 ans</strong>.</p>
                <p>Si la Mairie constate que votre façade est lépreuse, elle peut vous envoyer une injonction officielle. Vous avez alors 6 mois pour lancer le chantier, sous peine de 3 750 € d'amende (pouvant être assortie d'une exécution d'office par les services municipaux, à vos frais !).</p>

                <h3>2. L'obligation d'isoler en ravalant (Loi de transition énergétique)</h3>
                <p>C'est le "décret embarqué" de 2017 dont les effets se durcissent brutalement avec l'interdiction de louer les passoires thermiques. Si vous entreprenez un "gros" ravalement de façade (c'est-à-dire si vous détruisez le vieil enduit pour le refaire à neuf) sur plus de 50% de la surface du mur, <strong>la loi vous oblige à rajouter une couche d'<a href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite" style="text-decoration: underline;">Isolation Thermique par l'Extérieur (ITE)</a>.</strong></p>
                <p><em>Quelles sont les dérogations ?</em> L'obligation saute si un Architecte des Bâtiments de France s'y oppose (maison en pierre de taille, modénatures historiques), ou si votre façade est en limite séparative sur le trottoir et que les 15 cm d'isolant empiéteraient sur le domaine public.</p>

                <!-- Section 2 : Etapes -->
                <h2 id="etapes">Les 4 étapes d'un vrai ravalement de façade</h2>
                <p>Un ravalement n'est pas un nettoyage Karcher suivi d'un coup de peinture. C'est un processus lourd nécessitant généralement la sécurisation entière du périmètre par un échafaudage réglementaire.</p>

                <ol>
                    <li><strong>Le Diagnostic et la Préparation :</strong> L'artisan évalue la pathologie du mur. Y a-t-il des <a href="<?php echo BASE_URL; ?>assechement-murs-injections" style="text-decoration: underline;">remontées capillaires du sol</a> ? Le support est-il friable (farinage) ? Y a-t-il de la mousse rouge ? Cette étape dicte le choix de la chimie (Chaux, Siloxane, ou Ciment). Montage de l'échafaudage et bâchage intégral des fenêtres.</li>
                    <li><strong>Le Nettoyage et le Décapage :</strong> Suppression totale des algues et champignons par traitement biocide (fongicide), puis <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade" style="text-decoration: underline;">nettoyage haute pression</a> ou hydrogommage (sablage doux) pour retirer les anciens revêtements non-adhérents.</li>
                    <li><strong>La Réparation du support (Le plus long) :</strong> Purge des parties d'enduit qui sonnent "creux". Grattage et ouverture des fissures au burin pour les combler avec un mastic élastomère. Traitement des fers à bétons apparents contre la rouille. C'est ici que l'artisan justifie son prix.</li>
                    <li><strong>Le Revêtement de Finition :</strong> Application de la sous-couche (le primaire fixateur) indispensable sur les vieux murs. Puis, selon le devis, projection mécanique d'un <a href="<?php echo BASE_URL; ?>crepi-facade" style="text-decoration: underline;">enduit hydraulique</a>, lissage minutieux d'un <a href="<?php echo BASE_URL; ?>enduit-pierre-vue" style="text-decoration: underline;">enduit à la chaux</a>, ou double couche croisée d'une <a href="<?php echo BASE_URL; ?>peinture-de-facade" style="text-decoration: underline;">peinture siloxane</a> haut de gamme.</li>
                </ol>

                <!-- Section 3 : Prix -->
                <h2 id="prix">Le Prix au m² d'un façadier en 2026</h2>
                <p>Dans la facture globale, sachez que la location, le montage et le démontage de <strong>l'échafaudage pèse pour environ 15 à 25 € / m²</strong> à lui tout seul.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de Ravalement par un Pro (Échafaudage & Fourniture inclus)</th>
                                <th>Fourchette de Prix M² (2026)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Ravalement Peinture (Classe D3/I1)</strong><br><em>Nettoyage, traitement fissures minimes et peinture Acrylique/Siloxane.</em></td>
                                <td><strong>40 € à 70 € / m²</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Ravalement "Enduit Projeté" classique</strong><br><em>Sur un bloc parpaing ou brique nu, ou en recouvrement d'un enduit accrocheur.</em></td>
                                <td><strong>60 € à 90 € / m²</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Ravalement lourd "Enduit à la Chaux Aérienne"</strong><br><em>Purge totale de l'existant. Bâtisses anciennes en moellons ou pisé pour laisser respirer la pierre.</em></td>
                                <td><strong>90 € à 150 € / m²</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Ravalement + Isolation ITE (Polystyrène)</strong><br><em>Collage des blocs isolants, trame fibrée, et enduit de finition gratté (R > 3.7).</em></td>
                                <td><strong>150 € à 230 € / m²</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <blockquote class="article-blockquote">
                    <strong>Avis du Pro :</strong> C'est sur le "recaillage" (la réfection des vieux joints de pierre) que les devis explosent. Et méfiez-vous d'un artisan qui veut enduire votre vieille grange en pierre avec un crépi au Ciment Portland classique : c'est l'assurance d'étouffer la maison et de voir apparaître du <a href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">salpêtre dans votre salon</a>. Sur de la pierre ou du pisé, c'est de la CHAUX exclusivement.
                </blockquote>

                <!-- Section 4 : Aides 2026 -->
                <h2 id="aides">Aides de l'Etat : Le grand changement 2026</h2>
                <p>Commençons par une mauvaise nouvelle : <strong>Un ravalement de façade purement esthétique (peinture ou enduit simple) ne donne droit à AUCUNE subvention.</strong> Vous n'aurez droit qu'au taux de TVA réduit à 10% (car la maison de plus de 2 ans est "améliorée").</p>
                <p>Pour toucher des aides, votre ravalement doit inclure des travaux d'Isolation (ITE). Et en 2026, l'Etat a durci les règles :</p>

                <ul class="custom-list">
                    <li><strong>Fin du "Monogeste" MaPrimeRénov' pour les Murs :</strong> Vous ne pouvez plus demander de subvention MPR *uniquement* pour isoler vos murs extérieurs. L'Etat considère que cela ne suffit plus à sortir du statut de passoire.</li>
                    <li><strong>La bascule "Parcours Accompagné" :</strong> Pour débloquer MaPrimeRénov' (qui peut alors payer jusqu'à 80% du chantier pour les revenus très modestes), vous devez engager une rénovation globale (Ravalement avec ITE <strong>+</strong> Pompe à Chaleur, par exemple), faire appel à un Accompagnateur Rénov' agréé, et sauter au minimum 2 classes au classement DPE.</li>
                    <li><strong>Les CEE (Certificats d'Économie d'Énergie) :</strong> C'est la prime des fournisseurs (Total, EDF). Elle reste accessible de manière autonome pour un seul geste d'isolation extérieure (réduisant le devis de 5 à 15€ par m² selon vos revenus), à condition que l'artisan façadier soit labélisé <strong>RGE</strong> (Reconnu Garant de l'Environnement).</li>
                    <li><strong>L'Eco-PTZ et la TVA à 5.5% :</strong> Si vous posez de l'isolant (R > 3.7), le ravalement se verra appliqué la TVA minimale à 5.5% sur tout le devis, et vous pourrez emprunter le solde à votre banque à 0% d'intérêts sur 15 ans.</li>
                </ul>

                <!-- Section 5 : FAQ -->
                <h2 id="faq">Foire Aux Questions (FAQ)</h2>

                <h3>Doit-on demander l'autorisation à ses voisins pour un échafaudage ?</h3>
                <p>Si votre maison est en limite de propriété et que l'échafaudage doit déborder sur le terrain du voisin, il s'agit du principe juridique du <strong>Droit de surplomb</strong> (ou servitude de Tour d'échelle). Votre voisin ne peut en théorie pas refuser les travaux indispensables à la sauvegarde de votre bien, mais vous devez lui demander formellement l'autorisation, dresser un état des lieux de son jardin avant, et réparer les éventuels dégâts causés par les ouvriers.</p>

                <h3>Quel est le formulaire administratif pour la mairie ?</h3>
                <p>Toute modification d’aspect (même repeindre de la même couleur) impose de déposer un formulaire Cerfa de <strong>Déclaration Préalable de Travaux (DP)</strong> en Mairie. Le délai d'instruction est de 1 mois (2 mois en zone classée). N'achetez aucune pallette d'enduit avant d'avoir reçu l'accord !</p>

                <h3>Peut-on changer la couleur de notre maison ?</h3>
                <p>Vos choix sont limités par le nuancier officiel imposé par le PLU (Plan Local d'Urbanisme) consultable au service voirie de la mairie. Chaque région protège son patrimoine (jaune ocre dans le sud, tons ardoise dans l'ouest...). Un rose fluo vous sera catégoriquement refusé.</p>

                <h3>Quelle différence entre ravalement de façade et rénovation de façade ?</h3>
                <p>Le ravalement désigne l'ensemble des opérations d'entretien et de remise en état de l'enveloppe extérieure d'un bâtiment : nettoyage, réparation, enduit, peinture. La <a href="https://www.cemarenov.fr/renovation-de-facade">rénovation de façade</a> est un terme plus large qui peut inclure également une refonte architecturale, l'ajout d'ITE ou la modification des ouvertures, au-delà du simple entretien.</p>

                <h3>Comment nettoyer une façade sale avant le ravalement ?</h3>
                <p>Le nettoyage est impératif avant tout enduit ou peinture. Pour les façades très encrassées ou couvertes de mousses, notre guide sur le <a href="https://www.cemarenov.fr/nettoyage-facade-javel">nettoyage façade à la javel</a> détaille les protocoles de dilution et les précautions à respecter selon le type d'enduit.</p>

                        </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert RÃ©novation & Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expÃ©rience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois pour rÃ©ussir vos travaux et Ã©viter les arnaques.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>L'essentiel à retenir</h3>
                <p>
                    Un ravalement de façade en 2026, c'est un budget moyen de 12 000 à 25 000 euros. Ce n'est plus une simple ligne "esthétique" dans un budget d'entretien, c'est l'acte fondateur de la valeur de votre patrimoine immobilier à l'heure du DPE roi. Ne prenez jamais le moins cher, fuyez les ciments sur la pierre ancienne, et questionnez votre artisan sur l'obligation d'isoler (ITE) prévue par le décret "embarqué" de 2017. Et surtout, validez en amont le fait qu'il possède sa garantie décennale "Façadier / ITE" valide.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir 3 devis de Façadiers (RGE & Décennale vérifiée)</a>
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
                    <?php
endforeach; ?>
                </div>
            </section>

        </div>

        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name']); ?></h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php
endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php
endforeach; ?>
                </div>
            </div>
        </aside>

    </div>
</article>


<?php
// --- Schema.org Structured Data ---
require_once dirname(__DIR__) . '/schema-data.php';
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>
