<?php
/**
 * se-debarrasser-des-fouines.php
 * Article: Comment se Débarrasser des Fouines sous votre Toit : Le Guide Complet
 */

$article_meta = [
    'title' => 'Comment se Débarrasser des Fouines sous votre Toit ?',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/toiture fouine5.webp',
    'excerpt' => 'Découvrez le guide complet pour identifier, éloigner durablement et prévenir le retour des fouines sous votre toit !',
    'date' => '2026-03-07',
    'reading_time' => 8,
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
                <span>Fouines sous toit</span>
            </nav>
            
            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Nuisibles</span>
            </div>

            <h1>Comment se Débarrasser des Fouines sous votre Toit :<br>
                <span class="h1-accent">Le Guide Complet</span>
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
                Une nuit de grattements, une odeur forte au plafond, ou des gaines électriques rongées… Une fouine sous votre toit transforme vite la maison en zone de travaux. Ces animaux font des dégâts lourds sur l'<a href="<?php echo BASE_URL; ?>isolation-des-combles-perdus" style="text-decoration: underline;">isolation</a>. On va voir ensemble comment identifier le problème, faire partir l'animal légalement, et surtout boucher les accès pour qu'il ne revienne pas.
            </p>

            <div class="article-content">
                
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        En Bref : Comment faire fuir les fouines ?
                    </div>
                    <p>Commencez par confirmer la présence (pas lourds la nuit, crottes torsadées, laine de verre arrachée). Ensuite, utilisez des méthodes d'éloignement : répulsifs olfactifs forts ou piégeage vivant. L'étape critique vient après : vous devez boucher tous les accès au toit avec du grillage galvanisé ou du mastic anti-rongeurs, <strong>uniquement quand vous êtes sûr à 100% que l'animal est sorti</strong>. Si l'accès au toit est dangereux, appelez un dératiseur pro.</p>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#detecter-comprendre">Détecter et Comprendre la Présence des Fouines</a></li>
                        <li><a href="#methodes-non-letales">Les Méthodes Non-Létales pour Chasser les Fouines</a></li>
                        <li><a href="#repulsifs-sonores">Répulsifs Olfactifs et Solutions Sonores</a></li>
                        <li><a href="#piegeage-exclusion">Piégeage Vivant et Exclusion Physique</a></li>
                        <li><a href="#prevention-long-terme">Prévention à Long Terme : Sceller et Sécuriser</a></li>
                        <li><a href="#appel-professionnel">Quand Faire Appel à un Professionnel ?</a></li>
                        <li><a href="#faq">Foire Aux Questions (FAQ)</a></li>
                    </ul>
                </div>

                <h2 id="detecter-comprendre">Détecter et Comprendre la Présence des Fouines (Signes & Dégâts)</h2>
                <p>Avant d'acheter des répulsifs, il faut savoir qui squatte vos combles. Une bonne identification évite de traiter un problème de fouine comme un problème de souris.</p>

                <h3>Les bruits nocturnes : votre premier indice</h3>
                <p>Le bruit d'une fouine ne trompe pas. Vous entendrez des grattements, des cavalcades sur le placo et parfois des petits cris. L'animal pèse près de 2 kilos : ça fait un vrai vacarme, principalement au milieu de la nuit ou à l'aube, quand elle rentre de la chasse.</p>

                <h3>Observer les traces : crottes, dégâts et restes de proies</h3>
                <p>Prenez une lampe torche et montez dans le grenier. Les crottes de fouine sont noires, mesurent 8 à 10 mm de diamètre, et finissent souvent en pointe ou en spirale. Elles dégagent une forte odeur musquée. Regardez l'<a href="<?php echo BASE_URL; ?>isolation-sous-rampants-toiture" style="text-decoration: underline;">isolation</a> : la laine de roche arrachée et les gaines électriques mordillées confirment la présence d'un nid. Vous trouverez aussi des plumes ou des os ramenés de l'extérieur.</p>
                
                <img src="<?php echo BASE_URL; ?>image/toiture fouine1.webp" alt="Photo de crottes de fouine typiques en forme de spirale" loading="lazy">
                <p class="img-caption">Les crottes de fouine, torsadées et regroupées, sont un indicateur fiable.</p>

                <h3>Fouine ou autre nuisible ? Ne vous trompez pas !</h3>
                <p>On confond souvent la fouine avec la martre (très similaire), le loir ou le rat. Les rats laissent des excréments plus petits et lisses. Les loirs hibernent l'hiver. Les dégâts de la fouine se concentrent massivement sur l'isolation thermique.</p>
                
                <img src="<?php echo BASE_URL; ?>image/toiture fouine2.webp" alt="Infographie comparative des signes de présence entre fouine et rat : crottes, bruits, dégâts" loading="lazy">
                <p class="img-caption"><strong>Infographie : Fouine vs Rat & Martre : Les signes qui ne trompent pas</strong></p>
                
                <ul class="custom-list">
                    <li>Bruits intenses et pas lourds la nuit.</li>
                    <li>Crottes en spirale (8-10 mm).</li>
                    <li>Laine de verre déchiquetée et câbles rongés.</li>
                    <li>Odeur forte d'urine au plafond.</li>
                    <li>Débris d'oiseaux ou de rongeurs près du nid.</li>
                </ul>

                <h2 id="methodes-non-letales">Les Méthodes Non-Létales pour Chasser les Fouines de Vos Combles</h2>
                <p>Une fois la fouine repérée dans vos combles ou sous votre toiture, il faut réagir vite. L'isolant s'abîme chaque nuit. Mais attention aux règles.</p>

                <h3>Comprendre le statut protégé de la fouine</h3>
                <p>En France, selon les départements, la fouine a un statut particulier. Il est formellement interdit de l'empoisonner. On utilise des méthodes d'éloignement douces. L'objectif consiste à rendre vos combles inconfortables pour la pousser à déménager.</p>

                <h3>Le timing est crucial</h3>
                <p>Faites très attention si vous intervenez entre mai et septembre. C'est la période de reproduction. Si vous chassez la mère et bouchez l'entrée, les petits mourront enfermés dans vos combles. Vérifiez toujours qu'il n'y a pas de portée avant de sceller quoi que ce soit.</p>

                <h2 id="repulsifs-sonores">Répulsifs Olfactifs et Solutions Sonores : Quelles sont les Options ?</h2>
                <p>On attaque l'odorat et l'ouïe de l'animal. Ce sont des solutions d'attente pour faire fuir la fouine avant de reboucher le toit.</p>

                <h3>Les répulsifs olfactifs</h3>
                <p>Le nez de la fouine est sensible. Préparez un vaporisateur avec du vinaigre blanc et 15 gouttes d'huile essentielle de menthe poivrée. Pulvérisez généreusement sur ses zones de passage dans le grenier. Le marc de café frais déposé en coupelles fonctionne aussi. Le gros défaut de ces méthodes : il faut remonter dans les combles tous les 3 jours pour remettre du produit, sinon l'odeur s'estompe.</p>

                <h3>Ultrasons et autres bruits</h3>
                <p>Les boîtiers à ultrasons émettent des fréquences aiguës qui agressent l'animal. Prenez impérativement un modèle avec "balayage de fréquences". Si l'appareil émet toujours le même son en continu, la fouine s'y habitue en une semaine et continue de dormir à côté.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Méthode</th>
                                <th>Avantages</th>
                                <th>Inconvénients</th>
                                <th>Coût indicatif</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Vinaigre blanc & huiles essentielles</td>
                                <td>Écologique, facile à faire</td>
                                <td>À renouveler très régulièrement</td>
                                <td>5 - 20 €</td>
                            </tr>
                            <tr>
                                <td>Répulsifs commerciaux en spray</td>
                                <td>Odeur concentrée, prêt à l'emploi</td>
                                <td>Peut sentir fort dans la maison</td>
                                <td>15 - 40 €</td>
                            </tr>
                            <tr>
                                <td>Ultrasons à balayage</td>
                                <td>Action continue sans effort</td>
                                <td>Inutile si l'isolant bloque le son</td>
                                <td>30 - 150 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="piegeage-exclusion">Piégeage Vivant et Exclusion Physique : Les Solutions Durables</h2>
                <p>Si les répulsifs ne suffisent pas, on passe à la vitesse supérieure. Le piégeage permet de déplacer le problème physiquement.</p>

                <h3>Le piégeage vivant : capturer sans blesser</h3>
                <p>Utilisez une cage-piège spéciale fouine (une boîte en grillage avec trappe). Placez-la sur son chemin régulier. L'appât le plus redoutable reste un œuf de poule frais, ou un morceau de fruit. Contrôlez la cage tous les matins. Dès que la fouine est prise, mettez la cage dans le coffre et relâchez l'animal dans une forêt à au moins 5 ou 6 kilomètres de la maison.</p>
                
                <img src="<?php echo BASE_URL; ?>image/toiture fouine3.webp" alt="Photo d'un piège à cage vivant pour fouine avec un œuf comme appât" loading="lazy">
                <p class="img-caption">Le piège à cage : simple, sans danger pour l'animal, et radical.</p>

                <h3>Les points d'accès à condamner</h3>
                <p>Une fouine adulte passe dans un trou de 5 centimètres. Elle soulève une tuile mal fixée, s'engouffre dans un <a href="<?php echo BASE_URL; ?>dessous-de-toit" style="text-decoration: underline;">cache-moineau</a> abîmé ou passe sous les <a href="<?php echo BASE_URL; ?>panneaux-photovoltaiques" style="text-decoration: underline;">panneaux solaires</a>.</p>

                <img src="<?php echo BASE_URL; ?>image/toiture fouine4.webp" alt="Schéma illustrant les points d'accès typiques des fouines en toiture et combles" loading="lazy">
                <p class="img-caption"><strong>Schéma : Les entrées classiques sur un toit. Inspectez les rives et les chatières.</strong></p>

                <blockquote class="article-blockquote">
                    💡 <strong>L'anecdote de chantier :</strong> L'année dernière, un client m'appelle en catastrophe. Il avait repéré le trou d'accès d'une fouine sous une tuile de rive. Un samedi après-midi, il décide de tout boucher. Sauf que l'animal dormait encore au fond de l'isolant. La fouine est morte coincée. Trois semaines plus tard, l'odeur de décomposition a envahi tout l'étage. J'ai dû découper 2 m² de plafond en BA13 dans la chambre de son fils pour retirer le cadavre. La règle d'or : on ne rebouche jamais avant d'être certain à 100 % que le nid est vide.
                </blockquote>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>Attention danger :</strong> Ne bouchez jamais les accès si vous n'êtes pas sûr que la fouine est sortie ! Enfermer l'animal le condamne, et l'odeur d'un cadavre dans les combles ruinera votre intérieur.
                </div>

                <h2 id="prevention-long-terme">Prévention à Long Terme : Sceller et Sécuriser</h2>
                <p>La fouine est partie ? Très bien. Le travail commence vraiment maintenant. Si vous ne bloquez pas l'accès, une autre fouine prendra la place vacante d'ici l'hiver prochain.</p>

                <h3>Inspection de la toiture</h3>
                <p>Prenez une échelle et inspectez chaque mètre du bas de pente de votre toit. Regardez les tuiles de rive, les souches de cheminée, et surtout les grilles de ventilation. Un trou grand comme une balle de tennis suffit.</p>
                <ul class="custom-list">
                    <li>Vérifiez les <a href="<?php echo BASE_URL; ?>remaniement-de-couverture" style="text-decoration: underline;">tuiles déplacées ou cassées</a>.</li>
                    <li>Inspectez les grilles sous les combles.</li>
                    <li>Coupez les branches d'arbres qui touchent le toit (elles servent d'escalier).</li>
                </ul>

                <h3>Quels matériaux pour boucher ?</h3>
                <p>Oubliez la mousse expansive classique vendue en grande surface. La fouine la ronge en cinq minutes chrono. Voici ce qu'il faut utiliser en rénovation :</p>
                <ul class="custom-list">
                    <li><strong>Grillage galvanisé (maille de 10 à 13 mm) :</strong> parfait pour fermer les aérations sans bloquer le passage de l'air. (Comptez 25 € le rouleau).</li>
                    <li><strong>Mastic anti-rongeurs :</strong> ce mastic contient des fibres métalliques qui cassent les dents de l'animal. (15 € le tube).</li>
                    <li><strong>Mortier de ciment :</strong> pour combler les trous francs dans la maçonnerie de façade.</li>
                </ul>

                <h2 id="appel-professionnel">Quand Faire Appel à un Professionnel Anti-Nuisibles ?</h2>
                <p>Certains chantiers sont trop dangereux ou trop complexes pour un particulier. Il n'y a pas de honte à passer le relais.</p>

                <h3>Les limites du bricolage</h3>
                <p>Si votre toit monte à 8 mètres de haut sans accès sécurisé, ne prenez pas le risque de poser du grillage vous-même. Pareil si l'odeur dans les combles persiste malgré le départ supposé de l'animal : il y a peut-être des petits cachés dans la laine de verre. Un pro possède le matériel d'inspection et les harnais de sécurité.</p>

                <h3>Choisir le bon artisan</h3>
                <p>Un professionnel certifié (dératiseur ou couvreur habitué aux nuisibles) factura entre 300 et 800 euros selon l'accès au toit et le nombre de grilles à poser. C'est un budget, mais comparé au prix d'une réfection complète d'isolation de combles (qui chiffre vite en milliers d'euros), le calcul est vite fait.</p>

                <h2 id="faq">Foire Aux Questions (FAQ)</h2>
                
                <h3>Comment retirer un nid de fouine dans le grenier ?</h3>
                <p>Attendez l'automne ou l'hiver pour éviter de tomber sur une portée de jeunes. Équipez-vous obligatoirement de gants épais et d'un masque FFP2. Retirez l'isolant souillé par l'urine, jetez le nid dans un sac étanche, et désinfectez la zone pour casser l'odeur qui attirerait d'autres fouines.</p>

                <h3>Quelles conséquences si une fouine meurt dans mon toit ?</h3>
                <p>C'est la pire situation possible. Le cadavre va gonfler sous la toiture. L'odeur de décomposition va traverser le placo et imprégner l'étage pendant des semaines. Des mouches et des asticots apparaîtront autour de la zone. Il faudra souvent percer le plafond par en dessous pour retirer l'animal.</p>

                <h3>Un chat fait-il fuir les fouines ?</h3>
                <p>Non, c'est une légende urbaine. La fouine est un prédateur taillé pour la chasse, très agressif s'il est coincé. Un chat domestique évite généralement l'affrontement face à un mustélidé. Ne comptez pas sur votre animal de compagnie pour régler le problème.</p>

                <h3>Combien de temps faut-il pour chasser l'animal ?</h3>
                <p>Un répulsif fonctionne en quelques nuits si l'odeur est concentrée. Le piégeage prend généralement entre trois et sept jours, le temps que la fouine prenne confiance et rentre dans la cage. Le scellement du toit se fait dans la journée, une fois la place vide.</p>

                <h3>L'assurance habitation paie-t-elle les dégâts ?</h3>
                <p>La très grande majorité des contrats standards ne couvrent pas les rongeurs et les mustélidés (considérés comme faune sauvage). La facture de la laine de roche à remplacer et des câbles électriques à tirer sera de votre poche. Relisez bien vos conditions particulières.</p>

                <h3>Quel grillage anti-fouine utiliser pour bloquer les accès à la toiture ?</h3>
                <p>Le matériau de référence est le <strong>grillage galvanisé soudé à maille 10 × 10 mm</strong>, en acier épais (au moins 1 mm de fil). Il est suffisamment rigide pour résister aux mâchoires de la fouine et ne rouille pas sous les tuiles. Fixez-le avec des agrafes inox ou de la colle polyuréthane sur les liteaux et les rives. Évitez les grillages à nœuds simple (type poulailler) : trop souple, la fouine écarte les mailles. Une fois posé, le grillage anti-fouine n'a pas besoin d'entretien — il dure aussi longtemps que la toiture.</p>

            </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation & Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois pour réussir vos travaux et éviter les arnaques.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>Retrouvez la Sérénité chez Vous</h3>
                <p>Une présence sous la toiture ne se résout pas par magie. Vous devez identifier la faille, poser un piège ou un répulsif, puis grillager définitivement. Ne laissez pas l'isolation de votre maison se dégrader nuit après nuit. Dès ce week-end, sortez la lampe torche et faites le tour de vos bas de pente.</p>
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
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name'] ?? 'Maison / Rénovation'); ?></h3>
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

// Try to auto-generate FAQ schema dynamically if possible, or fallback to empty.
// Note: We used H3 for FAQ so it blends into the article's flow without JS details/summary.
$faq_schema = [
    [
        'question' => "Comment retirer un nid de fouine dans le grenier ?",
        'answer' => "Attendez l'automne ou l'hiver pour éviter de tomber sur une portée de jeunes. Équipez-vous obligatoirement de gants épais et d'un masque FFP2. Retirez l'isolant souillé par l'urine, jetez le nid dans un sac étanche, et désinfectez la zone."
    ],
    [
        'question' => "Quelles conséquences si une fouine meurt dans mon toit ?",
        'answer' => "Le cadavre va gonfler sous la toiture. L'odeur de décomposition va traverser le placo et imprégner l'étage pendant des semaines. Des mouches et des asticots apparaîtront autour de la zone."
    ],
    [
        'question' => "Un chat fait-il fuir les fouines ?",
        'answer' => "Non, c'est une légende urbaine. La fouine est un prédateur taillé pour la chasse, très agressif s'il est coincé. Un chat domestique évite généralement l'affrontement."
    ],
    [
        'question' => "Combien de temps faut-il pour chasser l'animal ?",
        'answer' => "Un répulsif fonctionne en quelques nuits si l'odeur est concentrée. Le piégeage prend généralement entre trois et sept jours."
    ]
];

$_schema = get_schema_data(basename(__FILE__, '.php'));
// Merge with our dynamically extracted FAQ
if (!isset($_schema['faq']) || empty($_schema['faq'])) {
    $_schema['faq'] = $faq_schema;
}

echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>
