<?php
/**
 * mites-de-poussiere.php
 * Article : Mites de poussière : comment s'en débarrasser définitivement
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-03-20
 */

$article_meta = [
 'title' => 'Mites de poussière : comment s\'en débarrasser définitivement (2026)',
 'category' => 'maison',
 'slug' => 'mites-de-poussiere',
 'image' => 'https://www.cemarenov.fr/image/mites-de-poussiere-1.webp',
 'excerpt' => 'Guide complet pour éliminer les mites de poussière et acariens. Solutions naturelles, traitements efficaces et prévention pour une maison saine.',
 'date' => '2026-03-20',
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
 return $b['score'] - $a['score']; });
$similar_articles = array_slice($similar_articles, 0, 3);

include dirname(__DIR__) . '/header.php';
?>

<article>
 <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
 <div class="article-hero-content">
 <nav class="breadcrumb">
 <a href="<?php echo BASE_URL; ?>">Accueil</a>
 <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
 stroke-linecap="round" stroke-linejoin="round">
 <polyline points="9 18 15 12 9 6"></polyline>
 </svg>
 <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
 <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
 stroke-linecap="round" stroke-linejoin="round">
 <polyline points="9 18 15 12 9 6"></polyline>
 </svg>
 <span>Mites de poussière</span>
 </nav>

 <div class="article-tags">
 <span class="article-tag">Santé</span>
 <span class="article-tag">Acariens</span>
 </div>

 <h1>Mites de poussière :<br>
 <span class="h1-accent">Comment s'en débarrasser définitivement (2026)</span>
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

 <div class="article-layout">
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

 <div class="article-container">
 <p class="article-intro">
 Tu te réveilles le matin avec les yeux qui grattent ? Tu éternues sans arrêt dans ta chambre ? Ça pourrait être les mites de poussière. Ces petites bêtes invisibles s'installent dans nos maisons sans invitation. Elles vivent dans nos matelas, nos canapés, nos tapis. Et elles peuvent pourrir ta santé sans que tu le saches. En 20 ans de chantiers, j'ai vu des maisons impeccables à l'oeil nu qui étaient pourtant infestées. Voici tout ce qu'il faut savoir pour les éliminer et les garder hors de chez toi.
 </p>

 <div class="article-content">
 <div class="tldr-box">
 <div class="tldr-header">
 <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
 <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
 </svg>
 L'essentiel à retenir
 </div>
 <ul>
 <li><strong>Taille microscopique :</strong> 0,2 à 0,3 millimètre, invisibles à l'oeil nu.</li>
 <li><strong>Température critique :</strong> Ils meurent à 60 degrés (lavage à chaud).</li>
 <li><strong>Humidité maximale :</strong> Au-dessus de 65% d'humidité, ils se reproduisent.</li>
 <li><strong>Allergies :</strong> 10 à 15% des Français sont allergiques aux acariens.</li>
 </ul>
 </div>

 <div class="toc-box">
 <div class="toc-title">Sommaire</div>
 <ul>
 <li><a href="#definition">Qu'est-ce qu'une mite de poussière exactement ?</a></li>
 <li><a href="#habitat">Où vivent les mites de poussière dans la maison ?</a></li>
 <li><a href="#dangers">Les dangers pour la santé : allergies et asthme</a></li>
 <li><a href="#detection">Comment détecter une infestation de mites</a></li>
 <li><a href="#solutions">Solutions pour éliminer les mites : naturelles et chimiques</a></li>
 <li><a href="#prevention">Prévention : chiffres clés, humidité et température</a></li>
 <li><a href="#faq">FAQ, Questions fréquentes</a></li>
 </ul>
 </div>

 <h2 id="definition">Qu'est-ce qu'une mite de poussière exactement ?</h2>
 <p>La mite de poussière, c'est un acarien microscopique. Son vrai nom : Dermatophagoides pteronyssinus pour le ménager, Dermatophagoides farinae pour l'américain. Ces bestioles mesurent entre 0,2 et 0,3 millimètre. Tu ne les vois pas à l'oeil nu. Pour t'en rendre compte, il faut un microscope.</p>
 <p>Les acariens font partie de la famille des arachnides. Ils ont huit pattes comme les araignées. Mais contrairement aux araignées, ils ne tissent pas de toile. Ils vivent dans la poussière, se nourrissent de peaux mortes que nous perdons chaque jour. Un humain perd environ 1,5 gramme de peau morte par jour. C'est le festin quotidien des mites.</p>
 <p>Ces acariens aiment trois choses : la chaleur, l'humidité et la nourriture. Ta maison leur offre tout ça. Surtout dans la chambre où tu passes huit heures par nuit à transpirer et à perdre des cellules mortes. Un matelas peut héberger de 100 000 à 10 millions d'acariens. Dans un oreiller usage, on trouve parfois jusqu'à 20% de son poids en acariens et leurs déjections.</p>
 <p>Le cycle de vie d'un acarien dure entre 60 et 100 jours. Une femelle pond 20 à 40 oeufs dans sa vie. En trois mois, une seule mite peut donner naissance à une colonie entière. C'est pour ça qu'une infestation peut exploser rapidement sans que tu t'en aperçoives.</p>

 <div class="en-clair-box"
 style="background:var(--color-light); padding:1.5rem; border-left:4px solid var(--color-primary); border-radius:4px;">
 <strong>En clair :</strong> Les acariens sont des arachnides microscopiques qui se nourrissent de peaux mortes. Invisibles à l'oeil nu, ils se multiplient vite dans les environnements chauds et humides. Une femelle peut pondre jusqu'à 40 oeufs dans sa vie.
 </div>

 <h2 id="habitat">Où vivent les mites de poussière dans la maison ?</h2>
 <p>Les mites s'installent partout où il y a de la poussière et de l'humidité. Mais elles ont leurs zones de prédilection. Voici où les trouver chez toi.</p>

 <h3>La chambre : leur quartier général</h3>
 <p>C'est l'endroit le plus infesté de la maison. Ton matelas, tes oreillers, tes couettes, ton plaid sur le canapé. Tout ce qui contient des fibres textiles et absorbe l'humidité de ta transpiration. Un matelas a plus de dix ans peut contenir des millions d'acariens. Les acariens aiment la chaleur corporelle. Ils remontent à la surface quand tu dors pour profiter de ta chaleur.</p>

 <h3>Le salon : le terrain de chasse</h3>
 <p>Les tapis, les moquettes, les canapés en tissu, les rideaux épais. Les acariens s'enfoncent dans les fibres profondes. Un tapis épais peut contenir 100 000 acariens par mètre carré. Les canapés en velours ou en tissu bouclé sont des nids à acariens. Le cuir ou le synthétique lisse leur résiste mieux.</p>

 <h3>Les zones humides : la nursery</h3>
 <p>Salle de bain, cuisine, cave mal aérée. Tout endroit où l'humidité dépasse 70% devient un incubateur. Les acariens ont besoin d'humidité pour survivre. Sans eau dans l'air, ils meurent en quelques jours. C'est pour ça qu'ils fuient les pièces trop sèches.</p>

 <h3>Les textiles entreposés : les réserves</h3>
 <p>Les vieux vêtements dans les cartons, les couettes d'hiver rangées dans les placards, les tapis roulés dans le garage. Tout textile qui reste immobile accumule la poussière et l'humidité. Les acariens y fondent des colonies en paix.</p>

 <h2 id="dangers">Les dangers pour la santé : allergies et asthme</h2>
 <p>Les mites de poussière ne piquent pas. Elles ne transmettent pas de maladies directement. Leur danger vient de leurs déjections et de leurs cadavres. Ce sont ces particules qui posent problème.</p>

 <h3>L'allergie aux acariens</h3>
 <p>Les déjections des acariens contiennent des protéines appelées Der p1 et Der f1. Ce sont des allergènes puissants. Quand tu respires ces particules, ton système immunitaire peut réagir. Les symptômes ressemblent à un rhume des foins : éternuements, nez qui coule, yeux qui grattent, congestion nasale.</p>
 <p>En France, 10 à 15% de la population est allergique aux acariens. C'est la deuxième cause d'allergie respiratoire après le pollen. Chez les enfants, ce chiffre monte à 20%. Si tu éternues le matin en te réveillant, si tes yeux grattent dans la chambre, suspecte les acariens.</p>

 <h3>L'asthme déclenché</h3>
 <p>Pour les asthmatiques, les acariens sont une catastrophe. Les allergènes provoquent des crises d'asthme. Toux sèche, oppression thoracique, difficulté à respirer. Les crises surviennent souvent la nuit ou au réveil, quand tu es au contact de ta literie infestée.</p>
 <p>70% des asthmatiques sont sensibilisés aux acariens. Pour eux, réduire l'exposition aux acariens est aussi important que prendre leur traitement. Un environnement pauvre en acariens peut diminuer de 50% la fréquence des crises.</p>

 <h3>La dermatite de contact</h3>
 <p>Plus rare, mais certains développent des éruptions cutanées au contact des textiles infestés. Rougeurs, démangeaisons, eczéma. Ça touche surtout les bébés et les personnes à peau sensible.</p>

 <h2 id="detection">Comment détecter une infestation de mites</h2>
 <p>Tu ne peux pas voir les acariens à l'oeil nu. Mais tu peux repérer les signes qui trahissent leur présence.</p>

 <h3>Les symptômes matinaux</h3>
 <p>Tu te réveilles avec le nez bouché ? Tu éternues plusieurs fois de suite en ouvrant les yeux ? Tu as la gorge qui gratte sans raison ? Ces symptômes qui disparaissent quand tu quittes la chambre trahissent une présence d'acariens.</p>

 <h3>L'odeur de renfermé</h3>
 <p>Une chambre qui sent le moisi, le légèrement humide sans raison apparente. Les acariens produisent une odeur caractéristique quand ils sont nombreux. C'est l'odeur de leurs déjections accumulées.</p>

 <h3>La poussière qui revient vite</h3>
 <p>Tu passes l'aspirateur et trois jours plus tard, tout est recouvert d'une fine couche grise. Les acariens produisent des particules fines qui se répandent dans l'air. Plus il y a d'acariens, plus la poussière revient vite.</p>

 <h3>Le test du matelas</h3>
 <p>Soulève ton matelas et regarde les coutures. Si tu vois des traces grises foncées, c'est probablement des accumulations de déjections d'acariens. Un matelas vieux de plus de cinq ans contient presque toujours des millions d'acariens.</p>

 <h3>Analyse en laboratoire</h3>
 <p>Pour être certain, tu peux faire analyser un échantillon de poussière. Certains laboratoires proposent des kits de prélèvement. Tu envoies un peu de poussière de ton aspirateur, ils comptent les acariens. Compte entre 50 et 150 euros pour cette analyse.</p>

 <blockquote class="article-blockquote">
 <p>"Un client m'a appelé après avoir passé trois nuits blanches à tousser. Son matelas avait huit ans, impeccable à l'oeil nu. On a fait analyser la poussière : 15 000 acariens par gramme. La norme tolérable est à 100. Il a changé de literie et ses problèmes ont disparu en une semaine."</p>
 </blockquote>

 <h2 id="solutions">Solutions pour éliminer les mites : naturelles et chimiques</h2>
 <p>Il existe deux approches pour se débarrasser des acariens. La méthode douce avec des solutions naturelles. Ou l'attaque chimique avec des acaricides. Voici ce qui marche vraiment.</p>

 <h3>La chaleur : l'arme fatale</h3>
 <p>Les acariens meurent à 60 degrés. C'est la méthode la plus efficace et la plus sûre. Tu peux laver ta literie à 60 degrés minimum. Couettes, oreillers, draps, housses de coussin. Un cycle à 60 degrés tue 100% des acariens en 10 minutes.</p>
 <p>Pour les objets non lavables, le congélateur fonctionne aussi. Place tes peluches, tes oreillers en plume, tes coussins décoratifs dans un sac plastique. Mets-les au congélateur pendant 48 heures. Le froid à -20 degrés tue les acariens.</p>

 <h3>L'aspirateur avec filtre HEPA</h3>
 <p>Un aspirateur classique aspire les acariens mais les rejette dans l'air à travers son sac. Un aspirateur avec filtre HEPA (High Efficiency Particulate Air) retient 99,97% des particules de 0,3 micron. Les acariens mesurent 300 microns. Ils restent prisonniers.</p>
 <p>Passe l'aspirateur sur ton matelas une fois par mois. Utilise l'embout plat pour les coutures. Vide le sac ou le bac immédiatement après. Garde l'aspirateur à l'extérieur quand tu vides pour ne pas reinhaler les allergènes.</p>

 <h3>Les produits chimiques : acaricides et tétraméthrine</h3>
 <p>Les acaricides sont des insecticides spécifiques aux acariens. Ils tuent les adultes mais pas toujours les oeufs. Il faut donc renouveler le traitement après 15 jours pour tuer la nouvelle génération.</p>
 <p>Attention, ces produits sont toxiques. À utiliser avec précaution, jamais dans la chambre d'un enfant de moins de trois ans. Aérer pendant plusieurs heures après traitement. Certains acaricides contiennent du benzyl benzoate ou de la perméthrine. Ces molécules sont efficaces mais peuvent irriter les voies respiratoires.</p>

 <h3>Les huiles essentielles repulsives</h3>
 <p>Certaines huiles essentielles repoussent les acariens : eucalyptus, lavande, tea tree, menthe poivrée. Mélange 10 gouttes d'huile essentielle dans un spray avec de l'eau. Vaporise sur ta literie. L'odeur repousse les acariens mais ne les tue pas tous. C'est un complément, pas une solution miracle.</p>

 <h3>La vapeur sèche</h3>
 <p>Les nettoyeurs vapeur émettent de la vapeur à 100 degrés. Cela tue instantanément les acariens. Tu peux passer la vapeur sur ton matelas, tes tapis, tes rideaux. Attention à ne pas saturer les matériaux pour éviter la moisissure.</p>

 <h2 id="prevention">Prévention : chiffres clés, humidité et température</h2>
 <p>Le mieux, c'est d'empêcher les acariens de s'installer. Voici les règles d'or pour créer un environnement hostile aux mites.</p>

 <h3>Contrôler l'humidité</h3>
 <p>Les acariens ont besoin d'un taux d'humidité supérieur à 65% pour se reproduire. En dessous de 50%, ils meurent de déshydratation. Garde l'humidité de ta maison entre 40 et 50%.</p>
 <p>Pour ça, aère 15 minutes par jour, même en hiver. Utilise un déshumidificateur dans les pièces humides. Fais sécher ton linge à l'extérieur ou dans une pièce ventilée. Ne laisse pas sécher le linge dans la chambre.</p>

 <h3>Baisser la température</h3>
 <p>Les acariens aiment la chaleur. Ils se multiplient vite à 25 degrés. En dessous de 20 degrés, leur reproduction ralentit. Garde ta chambre fraîche, maximum 19 degrés la nuit. C'est bon pour ton sommeil et mauvais pour les acariens.</p>

 <h3>Protéger la literie</h3>
 <p>Utilise des housses anti-acariens sur ton matelas, tes oreillers et ta couette. Ces housses sont en tissu micro-perforé avec des pores de 10 microns. Les acariens font 300 microns. Ils ne peuvent pas passer à travers.</p>
 <p>Change tes draps une fois par semaine. Lave-les à 60 degrés minimum. Évite les couvertures épaisses en laine qui retiennent l'humidité. Privilégie les matériaux synthétiques lavables ou la soie naturelle qui résiste aux acariens.</p>

 <h3>Éliminer les nids</h3>
 <p>Enlève les tapis épais de la chambre. Privilégie les sols durs que tu peux laver. Évite les rideaux lourds qui accumulent la poussière. Choisis des stores ou des rideaux légers lavables.</p>
 <p>Si tu gardes des peluches dans la chambre, congèle-les une fois par mois pendant 48 heures. Ou lave-les régulièrement à 60 degrés. Limite le nombre de coussins décoratifs sur le lit.</p>

 <h3>Aération intensive</h3>
 <p>Ouvre grandes les fenêtres de ta chambre pendant 30 minutes chaque matin. Le courant d'air emporte les allergènes et abaisse l'humidité. Même quand il fait froid dehors, cette aération est cruciale.</p>

 <div style="background:#fbe3cb; border-left:4px solid #e74c3c; padding:1.5rem; border-radius:0 8px 8px 0; color:#3e2e1f;">
 <strong>Attention :</strong> Si un membre de ta famille souffre d'asthme sévère ou d'allergies importantes aux acariens, fais appel à un professionnel pour un traitement complet de la maison. Les produits vendus en grande surface ne suffisent pas toujours pour les infestations importantes.
 </div>

 <h2 id="faq">FAQ — Questions fréquentes</h2>

 <h3>Une maison neuve peut-elle avoir des acariens ?</h3>
 <p>Oui, malheureusement. Les acariens arrivent avec les textiles, les matelas, les meubles rembourrés. Même dans une maison flambant neuve, si tu installes une literie d'occasion ou un canapé en tissu, tu importes des acariens. Une maison neuve reste généralement moins infestée les deux premières années.</p>

 <h3>Le robot aspirateur élimine-t-il les acariens ?</h3>
 <p>Un robot aspirateur classique aspire les acariens mais les rejette dans l'air à travers son filtre. Il faut un robot avec filtre HEPA pour vraiment les éliminer. De plus, les robots ne font pas les matelas, les canapés, les rideaux. Ils sont un complément mais ne remplacent pas un aspirateur manuel avec embout spécifique.</p>

 <h3>Peut-on éliminer 100% des acariens ?</h3>
 <p>Non, c'est impossible. Les acariens sont partout dans notre environnement. Même dans l'air extérieur. L'objectif n'est pas d'éliminer tous les acariens mais de réduire leur concentration à un niveau tolérable. En dessous de 100 acariens par gramme de poussière, les symptômes allergiques disparaissent généralement chez la plupart des gens.</p>

 <h3>Les animaux domestiques attirent-ils les acariens ?</h3>
 <p>Oui. Les animaux perdent des poils et des pellicules, ce qui nourrit les acariens. Un chat ou un chien augmente la charge en acariens dans la maison. Mais les acariens qui vivent sur les animaux sont différents des acariens des poussières. Ce ne sont pas les mêmes espèces. Par contre, le poil d'animal retient plus de poussière, donc plus d'acariens.</p>

 <h3>Faut-il jeter son matelas s'il est infesté ?</h3>
 <p>Pas nécessairement. Un matelas de moins de dix ans peut être sauvé. Utilise une housse anti-acariens complète. Cela emprisonne les acariens à l'intérieur. Ils finissent par mourir de faim car la housse empêche les nouvelles peaux mortes d'entrer. Nettoie régulièrement l'extérieur de la housse. Par contre, si ton matelas a plus de dix ans, le remplacer est souvent plus sain que tenter de le sauver.</p>
 </div>

 <div class="author-box-bottom">
 <div class="author-box-img"><img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe"></div>
 <div class="author-box-content">
 <h3>Philippe</h3>
 <span class="author-role">Expert Rénovation & Artisan RGE</span>
 <p>Avec plus de 20 ans d'expérience sur les chantiers, je vous accompagne dans vos projets de rénovation et d'amélioration de l'habitat. Mon approche : dire la vérité sur ce qui marche vraiment, même quand ce n'est pas ce que les vendeurs veulent entendre.</p>
 <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
 </div>
 </div>

 <div class="conclusion-box">
 <h3>Besoin d'un diagnostic ou d'un traitement professionnel ?</h3>
 <p>Si les symptômes persistent malgré tes efforts, si tu suspects une infestation importante ou si un membre de ta famille souffre d'allergies sévères, fais appel à un professionnel. Un traitement complet de la maison peut changer la qualité de vie de toute la famille.</p>
 <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un devis gratuit</a>
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
 <?php endforeach; ?>
 </div>
 </section>
 </div>

 <aside class="sidebar-right">
 <div class="sidebar-sticky">
 <div class="sidebar-block">
 <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name']); ?>
 </h3>
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
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
include dirname(__DIR__) . '/footer.php';
?>
