<?php
/**
 * panneaux-photovoltaiques.php
 * Article: Panneaux photovoltaïques — prix, rentabilité, aides, arnaques
 */

$article_meta = [
    'title' => 'Panneaux Photovoltaïques : Prix réel 2026, Rentabilité et Arnaques',
    'category' => 'energie',
    'image' => 'https://www.cemarenov.fr/image/panneaux-photovoltaiques.webp',
    'excerpt' => 'L\'électricité solaire devient la norme, mais le secteur regorge de pièges à 1€. Coût réel d\'une installation 3 kWc, vraie rentabilité, et décryptage des (rares) aides de l\'État en 2026.',
    'date' => '2026-03-05',
    'reading_time' => 12,
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
                <span>Solaire</span>
            </nav>
            
            <div class="article-tags">
                <span class="article-tag">Électricité</span>
                <span class="article-tag">Autoconsommation</span>
            </div>

            <h1>Panneaux Photovoltaïques :<br>
                <span class="h1-accent">Prix réel 2026, Rentabilité et Arnaques (Guide Complet)</span>
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
                Face à l'envolée historique du prix de l'électricité, le panneau solaire photovoltaïque est passé du statut de "geste écolo" à celui de <strong>bouclier tarifaire indispensable</strong>. Tout le monde veut produire son propre courant. Mais l'euphorie du marché a attiré une nuée d'entreprises aux pratiques douteuses (les fameux "panneaux à 1 euro"). En 2026, les règles du jeu ont changé : MaPrimeRénov' ne subventionne pas le photovoltaïque classique, et le rachat par EDF a évolué. Voici l'heure de vérité sur le coût réel d'une installation en toiture, sa véritable durée d'amortissement, et les méthodes imparables pour détecter une arnaque au premier coup d'œil.
            </p>

            <div class="article-content">
                
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Le vrai prix 2026 :</strong> Pour une maison classique (installation de 3 kWc, soit environ 8 panneaux), comptez entre <strong>8 000 € et 10 000 €</strong> (matériel et pose incluses, hors aides).</li>
                        <li><strong>La rentabilité :</strong> L'investissement s'amortit en moyenne entre <strong>8 et 12 ans</strong>. Le modèle le plus rentable est l'<strong>autoconsommation avec revente du surplus</strong> à EDF OA.</li>
                        <li><strong>Les aides existantes :</strong> Non, l'État ne paye pas vos panneaux à 100%. Il existe seulement une Prime à l'autoconsommation (versée en une fois) et la TVA réduite (10% sous 3 kWc). MaPrimeRénov' ne s'applique <u>pas</u> au solaire électrique seul.</li>
                        <li><strong>L'arnaque fatale :</strong> Fuir tout démarcheur téléphonique qui vous fait miroiter des "panneaux gratuits remboursés par les aides" ou vous fait signer une "étude de faisabilité" qui est en fait un <em>crédit à la consommation caché</em> à 7% d'intérêt.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#fonctionnement">Comment fonctionne une installation ? (Le jargon démystifié)</a></li>
                        <li><a href="#prix">Prix réel d'un projet photovoltaïque (3 kWc à 9 kWc)</a></li>
                        <li><a href="#demarchage-arnaques">Démarchage et Arnaques : Les 3 red flags absolus</a></li>
                        <li><a href="#aides">Quelles sont les VRAIES aides de l'État en 2026 ?</a></li>
                        <li><a href="#rentabilite">Bilan de rentabilité : En combien d'années est-ce payé ?</a></li>
                        <li><a href="#faq">Foire Aux Questions (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Section 1 : Fonctionnement -->
                <h2 id="fonctionnement">Comment fonctionne une installation ? (Le jargon démystifié)</h2>
                <p>Oubliez la magie, c'est de la physique pure (l'effet photovoltaïque). Les panneaux fixés sur votre toit sont composés de cellules en silicium. Lorsque les photons du soleil frappent le silicium, ils excitent les électrons et créent un courant électrique <strong>continu</strong>.</p>
                <p>Or, vos appareils ménagers marchent au courant <strong>alternatif</strong>. L'installation nécessite donc trois éléments clés :</p>
                <ul class="custom-list">
                    <li><strong>Les panneaux et leurs fixations :</strong> Captent la lumière (même par ciel voilé, bien que le rendement baisse).</li>
                    <li><strong>L'onduleur (ou les micro-onduleurs) :</strong> C'est le cerveau de l'opération. Il transforme le courant continu du toit en courant alternatif compatible avec la maison. Avec des <em>micro-onduleurs</em> (posés derrière chaque panneau), si un panneau est à l'ombre d'une cheminée, les autres continuent à produire à 100%.</li>
                    <li><strong>Le compteur Linky :</strong> Il va non seulement compter l'électricité que vous prenez sur le réseau, mais aussi (et c'est nouveau pour beaucoup) comptabiliser dans l'autre sens l'électricité photovoltaïque que vous <em>réinjectez</em> sur le réseau public quand vous ne la consommez pas.</li>
                </ul>

                <!-- Section 2 : Prix -->
                <h2 id="prix">Prix réel d'un projet photovoltaïque (3 kWc à 9 kWc)</h2>
                <p>Dans le solaire, on ne parle pas en m², mais en puissance : le <strong>kilowatt-crête (kWc)</strong>. C'est la puissance maximale que peut produire l'installation sous un soleil idéal à midi en été.</p>
                
                <p>En 2026, l'installation moyenne d'une maison de 100m² est de <strong>3 kWc (environ 8 panneaux, soit 15 m² de toiture)</strong>. Ce calibrage permet de gommer le "talon de consommation" (frigo, box internet, veille) et de faire tourner les machines en journée.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Puissance de l'installation</th>
                                <th>Profil de la maison</th>
                                <th>Fourchette de Prix 2026 (Matériel + Pose par RGE)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>3 kWc</strong> (~8 panneaux)</td>
                                <td>Maison 80 - 120m² (Chauffée gaz/bois ou conso modérée)</td>
                                <td><strong>8 000 € à 10 500 €</strong></td>
                            </tr>
                            <tr>
                                <td><strong>6 kWc</strong> (~16 panneaux)</td>
                                <td>Maison 120 - 150m² (Tout électrique, Voiture électrique)</td>
                                <td><strong>13 000 € à 16 000 €</strong></td>
                            </tr>
                            <tr>
                                <td><strong>9 kWc</strong> (~24 panneaux)</td>
                                <td>Grande villa (Piscine chauffée, <a href="<?php echo BASE_URL; ?>pompe-a-chaleur-air-eau" style="text-decoration: underline;">pompe à chaleur PAC air-eau</a>, 2 Voitures EV)</td>
                                <td><strong>17 000 € à 21 000 €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <blockquote class="article-blockquote">
                    <strong>Attention aux batteries physiques :</strong> Ajouter une grosse batterie physique (pour stocker l'énergie l'été et s'en servir la nuit) coûte extrêmement cher aujourd'hui (5 000 à 10 000 € la batterie au lithium). Actuellement, la rentabilité s'écroule si vous ajoutez une batterie, car sa durée de vie (10 ans) est inférieure à son seuil de rentabilité. <strong>Vendez plutôt votre surplus à EDF.</strong>
                </blockquote>

                <!-- Section 3 : Arnaques -->
                <h2 id="demarchage-arnaques">Démarchage et Arnaques : Les 3 "red flags" absolus</h2>
                <p>Le secteur du solaire attire les éco-délinquants. Voici les 3 drapeaux rouges qui doivent vous faire fermer la porte (ou raccrocher) immédiatement :</p>

                <ol>
                    <li><strong>Le mensonge des "Panneaux à 1 Euro" ou de la "Maison Autonome" :</strong> Il n'existe AUCUNE subvention d'État qui paiera à 100% votre équipement. Le dispositif à 1€ n'a existé que brièvement pour les travaux relatifs à l'<a href="<?php echo BASE_URL; ?>isolation-des-combles-perdus" style="text-decoration: underline;">isolation des combles perdus</a>, jamais pour le solaire. De plus, à moins d'avoir 30 000€ de batteries lithium, votre maison ne sera pas 100% autonome l'hiver à cause des jours courts.</li>
                    <li><strong>Le représentant se présente "De la part de la Mairie / de l'État / d'EDF" :</strong> L'État, l'ANAH, et EDF ne <strong>démarchent jamais</strong> par téléphone. Jamais. Ces prestataires utilisent des noms trompeurs (Institut de la Transition, Agence de l'Énergie) pour vous mettre en confiance.</li>
                    <li><strong>"Signez ici, c'est juste pour lancer l'étude à la mairie" :</strong> C'est l'arnaque numéro 1. Le document que l'on vous tend sur tablette lors d'une foire-expo ou chez vous N'EST PAS une étude : c'est un bon de commande adossé à un crédit à la consommation d'un taux prohibitif (5 à 8%). Vous êtes engagé le jour même, souvent à un prix gonflé de 25 000€ pour 3 kWc !</li>
                </ol>

                <!-- Section 4 : Aides 2026 -->
                <h2 id="aides">Quelles sont les VRAIES aides de l'État en 2026 ?</h2>
                <p>Évacuons tout de suite le malentendu majeur : <strong>MaPrimeRénov' ne subventionne pas la pose de panneaux photovoltaïques servant à l'électricité de la maison.</strong> Elle ne subventionne que le "Solaire Thermique" (qui chauffe de l'eau sanitaire) ou l'Hybride.</p>

                <p>Si vous produisez de l'électricité (Photovoltaïque), voici les vraies aides légales en 2026 auxquelles vous avez droit si (et seulement si) votre artisan est certifié <strong>RGE QualiPV</strong> et pose les panneaux sur la toiture (et non pas punaisés au sol dans le jardin) :</p>

                <ul class="custom-list">
                    <li><strong>La Prime à l'Autoconsommation :</strong> Révisée tous les trimestres par la CRE (Commission de Régulation de l’Énergie). Elle est versée en une seule fois environ un an après la mise en service. Au 1er trimestre 2026, elle tourne autour de 80€ par kWc installé (soit environ <strong>240 € de prime franche</strong> pour une petite installation de 3 kWc). Ce montant baisse chaque année.</li>
                    <li><strong>La revente de Surplus (Obligation d'Achat - EDF OA) :</strong> C'est un contrat garanti sur 20 ans par l'État. C'est l'aide la plus précieuse ! L'électricité que vos panneaux produisent mais que vous ne consommez pas à l'instant T (car vous êtes au travail par exemple) part sur le réseau public. EDF OA est forcé par la loi de vous rémunérer cette injection (autour de 12 à 13 centimes d'euro le kWh en 2026, fixé pendant 20 ans).</li>
                    <li><strong>La TVA allégée :</strong> La TVA passe à <strong>10 %</strong> au lieu de 20 % pour les installations photovoltaïques dont la puissance n'excède pas 3 kWc. Elle peut même descendre à <strong>5,5 %</strong> sur les plus grosses installations si, et seulement si, elles intègrent un Système de Gestion de l'Énergie (SGE) domotique de haute voltige.</li>
                </ul>

                <!-- Section 5 : Rentabilité -->
                <h2 id="rentabilite">Bilan de rentabilité : En combien d'années est-ce payé ?</h2>
                <p>Il ne faut pas voir le solaire comme un panneau "rentable demain matin", mais comme un plan d'épargne. C'est le blocage des prix de votre énergie contre l'inflation fulgurante des fournisseurs.</p>
                
                <p>En moyenne en France, avec une installation au juste prix du marché payée cash (ou avec un prêt bon marché), le délai de retour sur investissement est de <strong>8 à 12 ans</strong> pour le montage "Autoconsommation avec revente du surplus".</p>
                
                <p>Une installation de 3 kWc bien exposée au Sud produira environ 3 500 kWh à 4 000 kWh par an. Si vous réussissez à modifier vos habitudes (programmer le lave-vaisselle et le <a href="<?php echo BASE_URL; ?>ballon-thermodynamique" style="text-decoration: underline;">ballon d'eau chaude thermodynamique</a> le midi quand le soleil brille fort), vous effacerez facilement <strong>40 à 60 % de votre facture d'électricité.</strong> Et cela pendant les 25 à 30 ans de durée de vie des panneaux.</p>

                <!-- Section 6 : FAQ -->
                <h2 id="faq">Foire Aux Questions (FAQ)</h2>

                <h3>J'habite au Nord de la France, est-ce rentable ?</h3>
                <p>Absolument, et pour une raison simple : les panneaux fonctionnent au "rayonnement lumineux" (les photons), pas à la chaleur. Au contraire, à plus de 25°C l'été dans le Sud, le rendement d'une cellule photovoltaïque baisse pour cause de surchauffe ! L'ensoleillement breton ou lillois est suffisant pour rentabiliser l'installation, cela prendra juste un ou deux ans de plus qu'à Marseille.</p>

                <h3>Quel est le problème avec l'autoconsommation TOTALE ?</h3>
                <p>Si vous signez un contrat d'autoconsommation totale (sans vendre le surplus à EDF), cela signifie que l'électricité que vous produisez mais que vous ne consommez pas est <strong>injectée gratuitement "en pure perte"</strong> sur le réseau, comme un cadeau à vos voisins. C'est un non-sens économique. Optez toujours pour le contrat "avec revente de surplus" (EDF OA) qui fera tomber un petit chèque de 200€ tous les ans sur votre compte.</p>

                <h3>A-t-on besoin de l'accord de la Mairie pour mettre des panneaux ?</h3>
                <p>Oui, obligatoirement. C'est le point de départ de tout le projet. Modifier l'aspect d'une toiture réclame le dépôt d'une <strong>Déclaration Préalable de Travaux (DP)</strong> au service urbanisme de votre Mairie. Comptez 1 mois d'instruction. Si vous vivez près d'un monument historique, l'Architecte des Bâtiments de France (ABF) pourra imposer de grosses contraintes (intégration parfaite aux tuiles, panneaux sombres sans reflets), voire refuser l'installation si elle est visible depuis la place de l'église.</p>

                <h3>Doit-on nettoyer ses panneaux ?</h3>
                <p>L'inclinaison naturelle de votre toit (souvent plus de 20 degrés) combinée à la pluie fait que les panneaux sont globalement autonettoyants. Cependant, près des exploitations agricoles (poussières de moisson), des carrières, ou du sable du Sahara, il est judicieux d'effectuer un léger <a href="<?php echo BASE_URL; ?>nettoyage-toiture-karcher" style="text-decoration: underline;">nettoyage de la toiture à basse pression (Karcher pro)</a> (sans balai dur !) tous les 2 à 3 ans pour ne pas perdre jusqu'à 10% de rendement.</p>

                        </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert R&eacute;novation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d&rsquo;exp&eacute;rience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois pour r&eacute;ussir vos travaux et &eacute;viter les arnaques.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>L'essentiel à retenir</h3>
                <p>
                    Les panneaux photovoltaïques sont le rempart de la décennie contre les factures d'énergie indécentes. Avec un budget de démarrage d'environ 9 000 € (pour un système de 3 kWc posé par un pro RGE), votre investissement sera remboursé par les économies générées et la revente du surplus à EDF OA en l'espace d'une dizaine d'années. Fuyez systématiquement les discours de Foire-expo promettant des rendements délirants, du 100% de la facture épongé par l'État ou des crédits "indolores". Le photovoltaïque s'achète avec raison et auprès d'un artisan certifié !
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis Solaire certifié RGE</a>
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
