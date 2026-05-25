<?php
/**
 * construire-barbecue-parpaings.php
 * Article: Construire un Barbecue en Parpaings : Le Guide Complet en 12 Étapes
 */

$article_meta = [
    'title' => 'Construire un Barbecue en Parpaings : Le Guide Complet en 12 Étapes',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/barbecue-parpaing12.webp',
    'excerpt' => 'Découvrez le guide le plus complet et illustré pour construire votre barbecue en parpaings de A à Z, en 12 étapes pas-à-pas.',
    'date' => '2026-03-07',
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
                <span>Barbecue en parpaings</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Maçonnerie</span>
                <span class="article-tag">Jardin</span>
            </div>

            <h1>Construire un Barbecue en Parpaings :<br>
                <span class="h1-accent">Le Guide Complet en 12 Étapes</span>
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
                Oubliez les tutoriels qui sautent des étapes. Si vous voulez un barbecue en parpaings qui résiste aux hivers, aux flammes à 800°C et au poids des années, chaque millimètre compte. De la préparation du sol au premier coup de truelle jusqu'à l'<a href="<?php echo BASE_URL; ?>enduit-facade" style="text-decoration: underline;">enduit de finition</a>, voici le guide le plus complet pour construire votre barbecue en dur. Suivez nos 12 étapes pas-à-pas illustrées.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        En Bref : Comment construire un barbecue en parpaings ?
                    </div>
                    <p>Commencez par préparer le sol : décaissez, coulez une dalle béton sur hérisson et treillis. Montez ensuite les murs en parpaings en forme de "U", coffrez et coulez la dalle intermédiaire. Tapissez le foyer de <strong>briques réfractaires au mortier haute température</strong> et intégrez les supports de grille. Finissez par un enduit hydrofuge. Attendez impérativement 3 semaines de séchage avant le premier feu, sous peine de fissures dans le mortier.</p>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Étape 1 : Le traçage et le décaissement du terrain</li>
                        <li>Étape 2 : Hérisson, ferraillage et coulage de la dalle</li>
                        <li>Étape 3 : Le tracé du "U" au cordeau sur la dalle sèche</li>
                        <li>Étape 4 : La pose cruciale du premier rang de parpaings</li>
                        <li>Étape 5 : L'élévation des murs et le contrôle de l'aplomb</li>
                        <li>Étape 6 : La création du coffrage en bois pour le plan de feu</li>
                        <li>Étape 7 : Ferraillage et coulage de la dalle intermédiaire</li>
                        <li>Étape 8 : La pose de la sole en briques réfractaires</li>
                        <li>Étape 9 : Le montage des parois latérales du foyer</li>
                        <li>Étape 10 : L'intégration des supports de grille métalliques</li>
                        <li>Étape 11 : L'application de l'enduit hydrofuge de finition</li>
                        <li>Étape 12 : Le séchage, le premier feu et l'inauguration</li>
                        <li>Foire Aux Questions (FAQ)</li>
                    </ul>
                </div>

                <h2 id="etape-1">Étape 1 : Le Traçage et le Décaissement du Terrain</h2>
                <p>Tout commence par la préparation du sol. Délimitez la zone de votre dalle en prévoyant 10 cm de marge tout autour des dimensions finales de votre barbecue. Utilisez des piquets et un cordeau. Ensuite, décaissez (creusez) la terre sur environ 20 cm de profondeur. C'est indispensable pour mettre votre structure hors gel et garantir une assise pérenne.</p>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing12.webp" alt="Décaissement du terrain à la pelle pour préparer les fondations du barbecue en parpaings" loading="eager">
                <p class="img-caption">Étape 1, Creusement du rectangle de fondation à 20 cm de profondeur, délimité par des cordeaux et des piquets.</p>

                <h2 id="etape-2">Étape 2 : Hérisson, Ferraillage et Coulage de la Dalle</h2>
                <p>Au fond du trou, étalez 5 cm de gravier (le hérisson) pour le drainage. Posez un film polyane pour bloquer l'humidité remontante, puis installez votre treillis soudé surélevé de 3 cm avec des cales plastiques. Coulez votre béton, tassez-le bien pour chasser les bulles d'air, et lissez à la règle de maçon. Comptez 48h de séchage minimum avant de poser le premier parpaing.</p>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing11.webp" alt="Coulage et lissage de la dalle béton sur treillis métallique pour le barbecue en parpaings" loading="lazy">
                <p class="img-caption">Étape 2, Lissage de la dalle en béton fraîchement coulée à la règle de maçon en aluminium.</p>

                <h2 id="etape-3">Étape 3 : Le Tracé du "U" au Cordeau sur la Dalle Sèche</h2>
                <p>Après 48h de séchage, votre dalle est prête. Avant de préparer le mortier, présentez vos parpaings "à blanc" (sans ciment) pour vérifier l'espacement et le rendu. Tracez ensuite les contours exacts de vos futurs murs en forme de "U" avec un cordeau traceur à poudre bleue. Cette étape garantit des murs parfaitement droits dès le départ.</p>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing10.webp" alt="Tracé au cordeau bleu sur la dalle sèche pour délimiter la forme en U du barbecue" loading="lazy">
                <p class="img-caption">Étape 3, Utilisation du cordeau traceur à poudre bleue pour marquer l'emplacement précis des murs porteurs.</p>

                <h2 id="etape-4">Étape 4 : La Pose Cruciale du Premier Rang de Parpaings</h2>
                <p>Préparez votre mortier (mélange ciment, sable, eau). Étalez un lit de mortier de 2 à 3 cm d'épaisseur sur vos tracés. Posez les parpaings d'angle en premier. Réglez l'horizontalité parfaite avec un niveau à bulle et ajustez avec le manche de votre truelle ou un maillet en caoutchouc.</p>

                <blockquote class="article-blockquote">
                    💡 <strong>Le conseil du pro :</strong> Ce premier rang conditionne toute la solidité de l'ouvrage. Un parpaing d'angle mal calé de 2 mm se retrouve décalé de 2 cm au 10ème rang. Prenez le temps qu'il faut ici.
                </blockquote>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing9.webp" alt="Mise à niveau du premier parpaing avec maillet et niveau à bulle sur mortier frais" loading="lazy">
                <p class="img-caption">Étape 4, Réglage millimétré du tout premier parpaing d'angle : la précision ici conditionne toute la suite.</p>

                <h2 id="etape-5">Étape 5 : L'Élévation des Murs et le Contrôle de l'Aplomb</h2>
                <p>Montez les rangs suivants en croisant les joints : les parpaings doivent être posés en quinconce, comme des briques. À chaque nouveau bloc posé, vérifiez l'aplomb (verticalité) et le niveau. Raclez l'excédent de mortier qui déborde des joints avant qu'il ne sèche. Montez 4 à 5 rangées pour atteindre environ 80 cm de hauteur.</p>

                <ul class="custom-list">
                    <li>Vérifiez le niveau et l'aplomb à chaque rang.</li>
                    <li>Posez les parpaings en quinconce (joints croisés) pour la solidité.</li>
                    <li>Raclez les bavures de mortier avant séchage.</li>
                    <li>Visez environ 80 cm de hauteur totale pour un usage confortable.</li>
                </ul>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing8.webp" alt="Élévation des murs en parpaings en quinconce pour former la structure en U du barbecue" loading="lazy">
                <p class="img-caption">Étape 5, Montée des rangées en quinconce jusqu'à 80 cm de hauteur pour former le "U" porteur.</p>

                <h2 id="etape-6">Étape 6 : La Création du Coffrage en Bois pour le Plan de Feu</h2>
                <p>C'est l'étape technique de l'ensemble du chantier. Vous devez créer un plancher provisoire en bois à l'intérieur du "U", soutenu par des étais ou des bastaings posés au sol. Ce bois servira de moule pour couler la dalle intermédiaire (le plancher du foyer). Fixez également des planches de coffrage à l'extérieur pour retenir le béton sur 10 cm d'épaisseur.</p>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing7.webp" alt="Installation du coffrage en planches de bois à l'intérieur du U en parpaings" loading="lazy">
                <p class="img-caption">Étape 6, Mise en place des planches de coffrage soutenues par des étais pour recevoir le béton de la dalle intermédiaire.</p>

                <h2 id="etape-7">Étape 7 : Ferraillage et Coulage de la Dalle Intermédiaire</h2>
                <p>Sur votre coffrage en bois, posez un treillis métallique renforcé (des fers à béton de 8 mm). Coulez un béton classique, ou réfractaire si vous souhaitez une sécurité absolue, sur 8 à 10 cm d'épaisseur. Lissez parfaitement à la règle. Patience : il faudra attendre 10 à 15 jours avant de retirer les planches en dessous.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Matériau</th>
                                <th>Usage</th>
                                <th>Résistance thermique</th>
                                <th>Coût indicatif</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Béton classique (dalle)</td>
                                <td>Fondation et dalle intermédiaire</td>
                                <td>Standard</td>
                                <td>5 - 10 €/sac</td>
                            </tr>
                            <tr>
                                <td>Mortier réfractaire</td>
                                <td>Joints des briques de foyer</td>
                                <td>Jusqu'à 1 200°C</td>
                                <td>15 - 30 €/sac</td>
                            </tr>
                            <tr>
                                <td>Enduit hydrofuge</td>
                                <td>Finition extérieure des parpaings</td>
                                <td>—</td>
                                <td>20 - 40 €/sac</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing6.webp" alt="Coulage de la dalle intermédiaire en béton sur ferraillage dans la structure en parpaings" loading="lazy">
                <p class="img-caption">Étape 7, Versement du béton sur le treillis pour créer la dalle qui séparera la réserve à bois du foyer.</p>

                <h2 id="etape-8">Étape 8 : La Pose de la Sole en Briques Réfractaires</h2>
                <p>Le béton est sec, la base est prête. Trempez vos briques réfractaires dans l'eau pendant 15 minutes pour saturer leur porosité. Préparez un mortier réfractaire qui résiste à 1 200°C. Étalez le mortier et posez les briques à plat pour recouvrir intégralement le sol du foyer. Laissez un léger espace d'environ 1 cm entre les briques et les parpaings du fond pour la dilatation thermique.</p>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing5.webp" alt="Pose des briques réfractaires orange à plat pour créer la sole du foyer du barbecue" loading="lazy">
                <p class="img-caption">Étape 8, Tapissage du sol du foyer avec des briques réfractaires au mortier haute température (1 200°C).</p>

                <h2 id="etape-9">Étape 9 : Le Montage des Parois Latérales du Foyer</h2>
                <p>Montez les murs intérieurs du foyer (fond et côtés) avec les briques réfractaires posées sur la tranche pour gagner de la place, ou à plat pour plus de solidité. Utilisez toujours le mortier réfractaire pour ces joints. Ne montez pas les parois trop haut : 3 à 4 rangées de briques suffisent pour isoler les parpaings de la chaleur et laisser l'air circuler librement.</p>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing4.webp" alt="Montage des parois latérales du foyer en briques réfractaires sur la tranche" loading="lazy">
                <p class="img-caption">Étape 9, Construction des parois intérieures du foyer en briques réfractaires pour isoler les parpaings de la chaleur.</p>

                <h2 id="etape-10">Étape 10 : L'Intégration des Supports de Grille Métalliques</h2>
                <p>Pendant le montage des parois réfractaires latérales, insérez des cornières métalliques en acier inox ou laissez simplement dépasser quelques briques d'un centimètre vers l'intérieur. Faites ceci à trois hauteurs différentes pour pouvoir régler la distance entre la grille et les braises selon le type de cuisson.</p>

                <ul class="custom-list">
                    <li>Hauteur basse (proche des braises) : cuisson rapide, saisir les viandes.</li>
                    <li>Hauteur intermédiaire : cuisson standard.</li>
                    <li>Hauteur haute (loin des braises) : maintien au chaud, cuisson douce.</li>
                </ul>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing3.webp" alt="Insertion de tiges en acier inox entre les briques réfractaires comme supports de grille" loading="lazy">
                <p class="img-caption">Étape 10, Scellement des supports métalliques à 3 hauteurs différentes pour régler la distance grille/braises.</p>

                <h2 id="etape-11">Étape 11 : L'Application de l'Enduit Hydrofuge de Finition</h2>
                <p>Le parpaing brut est laid et poreux : il absorbe l'eau de pluie et se dégrade en quelques années. Pour protéger et embellir votre ouvrage, appliquez un sous-enduit d'accrochage puis un <a href="<?php echo BASE_URL; ?>enduit-facade" style="text-decoration: underline;">enduit de finition hydrofuge</a> à la taloche. Lissez ou grattez selon l'effet désiré (rendu lisse ou crépi).</p>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing2.webp" alt="Application de l'enduit hydrofuge blanc à la taloche sur les parpaings extérieurs du barbecue" loading="lazy">
                <p class="img-caption">Étape 11, Finition esthétique et protectrice avec un enduit hydrofuge blanc appliqué à la taloche de maçon.</p>

                <h2 id="etape-12">Étape 12 : Le Séchage Complet et le Premier Feu</h2>
                <p>La structure est terminée. Mais ne commettez pas l'erreur la plus courante : allumer un vrai feu de charbon le lendemain. L'eau contenue au cœur du mortier réfractaire met des semaines à s'évaporer complètement.</p>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>Attention danger :</strong> N'allumez jamais un feu de charbon sur un mortier réfractaire qui n'a pas séché 3 semaines. La montée brutale en température transforme l'humidité résiduelle en vapeur et peut faire éclater les joints. Commencez par 2 heures de "feu de rodage" avec du papier journal et du petit bois uniquement.
                </div>

                <img src="https://www.cemarenov.fr/image/barbecue-parpaing1.webp" alt="Barbecue en parpaings terminé et enduit blanc avec braises et viande sur la grille en inox" loading="lazy">
                <p class="img-caption">Étape 12, Le résultat final : un barbecue en parpaings solide, esthétique et prêt pour des années de grillades.</p>

                <h2 id="faq">Foire Aux Questions (FAQ)</h2>

                <h3>Quelle taille prévoir pour un barbecue en parpaings ?</h3>
                <p>Pour un usage familial standard, prévoyez une surface de foyer d'environ 60 x 40 cm, avec une hauteur de plan de travail à 80-85 cm pour travailler debout sans se pencher. La structure en "U" mesure généralement 100 à 120 cm de large au total pour intégrer un espace de préparation sur le côté.</p>

                <h3>Peut-on construire un barbecue en parpaings soi-même sans expérience ?</h3>
                <p>Oui, c'est un chantier accessible à un bricoleur sérieux. Les étapes clés sont la dalle de fondation (qui demande de respecter les temps de séchage) et la pose du premier rang de parpaings (qui demande de la patience pour le niveau). Le reste du montage est assez logique. Comptez deux week-ends complets de travail, hors temps de séchage.</p>

                <h3>Quel est le coût total pour construire un barbecue en parpaings ?</h3>
                <p>Pour un barbecue de taille standard, le budget matériaux oscille entre 200 et 500 euros selon la qualité des briques réfractaires et le type de finition choisie. Ce prix inclut le sable, le ciment, les parpaings, le treillis, les briques réfractaires, le mortier haute température et l'enduit. La grille en inox est à prévoir en supplément (30 à 80 euros selon la taille).</p>

                <h3>Faut-il un permis de construire pour un barbecue en parpaings ?</h3>
                <p>En règle générale, non. Un barbecue fixe de jardin dont la hauteur reste inférieure à 12 mètres et la surface au sol inférieure à 5 m² est exempté de permis de construire en France. Il peut cependant être soumis à une simple déclaration préalable de travaux selon votre commune et votre PLU (Plan Local d'Urbanisme). Vérifiez auprès de votre mairie.</p>

                <h3>Combien de temps dure la construction ?</h3>
                <p>Le travail manuel représente environ deux week-ends complets. Mais la durée réelle du chantier, séchages compris, est de 4 à 6 semaines. La dalle béton nécessite 48h, la dalle intermédiaire 10 à 15 jours, et l'ensemble du mortier réfractaire 3 semaines avant d'allumer le premier feu. On ne peut pas accélérer ces temps de séchage.</p>

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
                <h3>Un Barbecue Pour la Vie</h3>
                <p>Un barbecue en parpaings bien construit durera des décennies. L'investissement en temps et en matériaux est modeste comparé au résultat : une structure solide, personnalisable, et bien plus satisfaisante qu'un modèle en métal qu'on change tous les deux ans. Respectez les temps de séchage, soignez votre premier rang, et faites confiance au mortier réfractaire pour le foyer. Le reste, c'est de la maçonnerie classique à la portée de tous.</p>
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

$faq_schema = [
    [
        'question' => "Quelle taille prévoir pour un barbecue en parpaings ?",
        'answer' => "Pour un usage familial standard, prévoyez une surface de foyer d'environ 60 x 40 cm, avec une hauteur de plan de travail à 80-85 cm. La structure en U mesure généralement 100 à 120 cm de large au total."
    ],
    [
        'question' => "Peut-on construire un barbecue en parpaings soi-même sans expérience ?",
        'answer' => "Oui, c'est un chantier accessible à un bricoleur sérieux. Comptez deux week-ends complets de travail, hors temps de séchage."
    ],
    [
        'question' => "Quel est le coût total pour construire un barbecue en parpaings ?",
        'answer' => "Le budget matériaux oscille entre 200 et 500 euros selon la qualité des briques réfractaires et le type de finition choisie."
    ],
    [
        'question' => "Combien de temps dure la construction ?",
        'answer' => "Le travail manuel représente environ deux week-ends complets. Mais la durée réelle du chantier, séchages compris, est de 4 à 6 semaines."
    ],
    [
        'question' => "Faut-il un permis de construire pour un barbecue en parpaings ?",
        'answer' => "En règle générale non, si la hauteur est inférieure à 12 mètres et la surface au sol inférieure à 5 m². Vérifiez toutefois auprès de votre mairie selon votre PLU."
    ]
];

$_schema = get_schema_data(basename(__FILE__, '.php'));
if (!isset($_schema['faq']) || empty($_schema['faq'])) {
    $_schema['faq'] = $faq_schema;
}

echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>
