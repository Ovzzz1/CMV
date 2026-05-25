<?php
// published: 2026-04-28 14:00
/**
 * nettoyer-fientes-oiseaux-crepi.php
 * Article : Comment nettoyer des fientes d'oiseaux sur du crépi sans abîmer l'enduit
 * Site : cemarenov.fr
 * Date : 2026-04-24
 */

$article_meta = [
    'title'        => 'Comment nettoyer des fientes d\'oiseaux sur du crépi ?',
    'category'     => 'travaux',
    'slug'         => 'nettoyer-fientes-oiseaux-crepi',
    'image'        => 'https://www.cemarenov.fr/image/comment-nettoyer-des-fientes-d-oiseaux-sur-du-crepi-1.webp',
    'excerpt'      => 'Fiente d\'oiseau sur votre crépi de façade ? Découvrez la méthode pas-à-pas d\'un artisan pour nettoyer sans abîmer l\'enduit : pré-mouillage, savon de Marseille, brossage doux et rinçage basse pression.',
    'date'         => '2026-04-28',
    'reading_time' => 5,
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

<style>
    /* Styles intégrés pour les vidéos et l'outil UX */
    .video-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; margin: 20px 0; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; }
    .ux-tool-container { background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 12px; padding: 30px; margin: 30px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; }
    .ux-tool-container h3 { margin-top: 0; color: #2c3e50; }
    .ux-step { display: none; animation: fadeIn 0.4s ease-in-out; }
    .ux-step.active { display: block; }
    .ux-question { font-size: 1.2em; font-weight: bold; margin-bottom: 20px; color: #333; }
    .ux-options { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
    .ux-btn { background: #fff; border: 2px solid #3498db; color: #3498db; padding: 12px 24px; font-size: 1em; border-radius: 8px; cursor: pointer; transition: all 0.3s ease; font-weight: bold; }
    .ux-btn:hover { background: #3498db; color: #fff; }
    .ux-result-box { background: #e8f6f3; border-left: 5px solid #1abc9c; padding: 20px; border-radius: 8px; text-align: left; margin-top: 20px; }
    .ux-warning-box { background: #fdedec; border-left: 5px solid #e74c3c; padding: 20px; border-radius: 8px; text-align: left; margin-top: 20px; }
    .cta-btn { display: inline-block; background: #e74c3c; color: #fff !important; padding: 12px 20px; border-radius: 6px; margin-top: 15px; text-align: center; text-decoration: none !important; }
    .cta-btn:hover { background: #c0392b; }
    .reset-btn { background: transparent; border: none; color: #7f8c8d; text-decoration: underline; margin-top: 20px; cursor: pointer; }
    .hashtag { color: var(--color-primary); font-weight: bold; }

    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<article>

    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Nettoyer fientes sur crépi</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Crépi</span>
                <span class="article-tag">Façade</span>
                <span class="article-tag">Nettoyage</span>
                <span class="article-tag">Entretien</span>
            </div>

            <h1>Comment nettoyer des fientes d'oiseaux sur du crépi ?<br><span class="h1-accent">Sans abîmer l'enduit</span></h1>

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
                <?php endforeach; ?>
            </div>
        </aside>

        <div class="article-container">

            <p class="article-intro">
                Votre ravalement vient de se terminer, l'enduit est impeccable, et le lendemain matin : une énorme fiente d'oiseau en plein milieu du pignon. Sur une vitre, un coup de chiffon suffit. Sur un <a href="<?php echo BASE_URL; ?>crepi-facade">crépi de façade</a>, c'est une autre histoire. Le crépi est poreux, et la fiente d'oiseau est chargée en acide. La méthode : <strong>saturez la zone d'eau claire, appliquez du savon de Marseille avec une brosse à poils très souples, et rincez à basse pression.</strong>
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Agissez vite :</strong> l'acide urique des fientes attaque le pigment de l'enduit. Une fiente "cuite" tout un été laisse un spectre permanent.</li>
                        <li><strong>Pré-mouillage obligatoire :</strong> saturez le mur d'eau claire avant toute chose, un crépi sec boit la saleté par capillarité.</li>
                        <li><strong>Meilleur produit :</strong> savon de Marseille dilué dans l'eau tiède, complété par du vinaigre blanc pour neutraliser l'acidité.</li>
                        <li><strong>Brosse souple uniquement :</strong> nylon à poils doux. Jamais le dos vert d'une éponge, jamais de brosse métallique.</li>
                        <li><strong>Karcher : non.</strong> La haute pression décape le grain protecteur et crée des micro-fissures invisibles à l'œil nu.</li>
                        <li><strong>Eau de Javel : bannie.</strong> Elle jaunit l'enduit avec les UV et le rend encore plus poreux.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>1. Enduit neuf et acide urique : la bombe à retardement</li>
                        <li>2. Quel produit choisir ? (et ce qu'il faut éviter)</li>
                        <li>3. La méthode étape par étape sur enduit gratté</li>
                        <li>4. Nettoyeur haute pression sur crépi : arrêtez le massacre</li>
                        <li>5. Terre, huile, peinture : adapter la méthode</li>
                        <li>6. Prévention : comment éloigner les oiseaux</li>
                        <li>⚙️ Outil : Trouvez votre méthode de nettoyage sur-mesure</li>
                        <li>FAQ, Questions fréquentes</li>
                    </ul>
                </div>

                <h2 id="acide">1. Enduit neuf et acide urique : la bombe à retardement</h2>

                <p>Ce n'est pas qu'une question de propreté. Les fientes de pigeons, de corbeaux ou de mouettes contiennent de l'acide urique. Sur un enduit neuf qui n'a pas encore fait sa prise complète à cœur, cet acide est un poison.</p>

                <p>Si vous laissez la déjection "cuire" au soleil tout un été, l'acide attaque le pigment de l'<a href="<?php echo BASE_URL; ?>enduit-facade">enduit de façade</a>. Résultat : même en nettoyant parfaitement en septembre, il restera une tache plus claire, ce qu'on appelle un <span class="hashtag">#spectre</span>. Plus vous agissez vite, plus vous sauvez la teinte d'origine.</p>

                <blockquote class="article-blockquote">
                    <p>"L'effet éponge du crépi : un enduit de façade n'est pas lisse. Ses micro-cavités retiennent l'eau, mais aussi les polluants dilués. C'est pour cela qu'on ne nettoie jamais une tache sur un mur extérieur en frottant avec un chiffon sec, on ne fait qu'enfoncer la saleté plus profondément dans les pores."</p>
                </blockquote>

                <h2 id="produit">2. Quel produit choisir ? (et ce qu'il faut éviter)</h2>

                <p>Sur les forums, tout le monde cherche le "produit miracle façade" pour enlever les taches de fientes sans effort. En 20 ans de chantiers, j'en ai vu des façades abîmées par des produits trop agressifs. Le meilleur produit, c'est celui qui respecte le liant de votre <span class="hashtag">#crépi</span>.</p>

                <h3>Le tableau comparatif des nettoyants</h3>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Efficacité sur fiente</th>
                                <th>Risque pour le crépi</th>
                                <th>Conseil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Savon de Marseille</strong></td>
                                <td>Excellente</td>
                                <td>Nul</td>
                                <td>La base absolue. À diluer dans de l'eau tiède.</td>
                            </tr>
                            <tr>
                                <td><strong>Vinaigre blanc</strong></td>
                                <td>Bonne</td>
                                <td>Faible</td>
                                <td>Parfait pour neutraliser les restes d'acide urique.</td>
                            </tr>
                            <tr>
                                <td><strong>Bicarbonate de soude</strong></td>
                                <td>Très bonne</td>
                                <td>Nul</td>
                                <td>À utiliser en pâte sur les taches bien incrustées.</td>
                            </tr>
                            <tr>
                                <td><strong>Cristaux de soude</strong></td>
                                <td>Forte</td>
                                <td>Modéré</td>
                                <td>À réserver si le savon de Marseille ne suffit pas.</td>
                            </tr>
                            <tr>
                                <td><strong>Eau de Javel</strong></td>
                                <td>Blanchissant</td>
                                <td><strong>Élevé</strong></td>
                                <td>À bannir. Ça jaunit l'enduit avec les UV.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>L'eau de Javel : la fausse bonne idée</h3>

                <p>Beaucoup balancent de l'eau de Javel diluée sur leur façade. Oui, ça blanchit la tache instantanément. Mais la Javel détruit la couche protectrice de l'enduit et le rend encore plus poreux. L'hiver suivant, votre mur sera le premier à verdir. Un <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade">nettoyage et démoussage de façade</a> dans les règles de l'art ne se fait jamais à la Javel pure.</p>

                <h2 id="methode">3. La méthode étape par étape sur enduit gratté</h2>

                <p>L'enduit gratté est la finition la plus courante, mais aussi la plus fragile face aux frottements. Voici la méthode pour enlever la tache sans laisser d'auréole.</p>

                <img src="<?php echo BASE_URL; ?>image/comment-nettoyer-des-fientes-d-oiseaux-sur-du-crepi-1.webp"
                     alt="Gros plan d'un mur extérieur en enduit gratté neuf, couleur sable, avec une grosse fiente d'oiseau sèche incrustée dans le grain"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Sur un chantier de rénovation l'an dernier, un client a voulu retirer une fiente sèche avec le dos vert d'une éponge de cuisine. Il a frotté à sec. Résultat : il a poncé l'enduit. La tache blanche est devenue une tache lisse et grise, impossible à rattraper. On a dû faire une retouche locale à la <a href="<?php echo BASE_URL; ?>peinture-de-facade">peinture de façade</a>.</p>

                <ol style="margin-bottom: 20px; padding-left: 20px;">
                    <li><strong>Le pré-mouillage (l'étape indispensable) :</strong> Avant de mettre le moindre produit, arrosez généreusement le mur à l'eau claire autour de la fiente. Un crépi sec boit l'eau sale par capillarité. En saturant le mur d'eau propre, la saleté diluée de la fiente glissera dessus au lieu de s'incruster autour.</li>
                    <li><strong>L'application douce :</strong> Pulvérisez votre mélange (eau tiède + savon de Marseille) directement sur la fiente. Laissez agir 5 minutes pour ramollir la croûte.</li>
                    <li><strong>Le brossage :</strong> Utilisez une brosse à poils très souples (brosse en nylon, type brosse à ongles). Frottez délicatement en cercles.</li>
                    <li><strong>Le rinçage :</strong> Rincez au jet d'eau, du haut vers le bas, à basse pression.</li>
                </ol>

                <img src="<?php echo BASE_URL; ?>image/comment-nettoyer-des-fientes-d-oiseaux-sur-du-crepi-2.webp"
                     alt="Gros plan sur la main d'un artisan utilisant une brosse à poils de nylon souples pour nettoyer une tache sur un crépi de façade beige"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="karcher">4. Nettoyeur haute pression sur crépi : arrêtez le massacre</h2>

                <p>Peut-on utiliser un Karcher pour virer une fiente ? La réponse courte : non.</p>

                <p>Même si la fiente partira en deux secondes, la pression de l'eau (souvent supérieure à 100 bars) va décaper le grain protecteur de l'enduit. À l'œil nu, vous ne verrez rien. Mais vous venez de créer des micro-fissures. À la première grosse pluie, l'eau va rentrer dans le mur. Et ça, c'est le début des vrais problèmes structurels, surtout si vous avez une <a href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite">isolation thermique par l'extérieur (ITE)</a> juste derrière l'enduit. Le jet d'eau classique du jardin avec un embout de pulvérisation suffit largement.</p>

                <h2 id="autres-taches">5. Terre, huile, peinture : adapter la méthode</h2>

                <p>Votre mur peut subir d'autres agressions. Si la tache ne ressemble pas à une fiente, adaptez le tir :</p>

                <ul class="custom-list">
                    <li><strong>Nettoyer de la terre sur une façade :</strong> C'est l'inverse de la fiente. Attendez que la boue soit ultra sèche. Donnez un coup de brosse dure à sec pour faire tomber 90 % de la terre, puis rincez à l'eau. Si vous mouillez de la boue fraîche, vous allez l'étaler dans les pores du crépi.</li>
                    <li><strong>Enlever une tache d'huile sur du crépi :</strong> Mettez du talc ou de la Terre de Sommières. Laissez la poudre pomper le gras pendant 24h, brossez, puis recommencez si nécessaire.</li>
                    <li><strong>Traces de peinture :</strong> N'appliquez jamais de white-spirit ou d'acétone sur un enduit de façade, ça va le faire fondre. Grattez doucement ce qui dépasse, ou faites un aérogommage très léger.</li>
                </ul>

                <h2 id="prevention">6. Prévention : comment éloigner les oiseaux de votre pignon ?</h2>

                <p>Une fois que votre mur est propre, l'idée c'est de ne pas recommencer le mois suivant. Les oiseaux (surtout les corbeaux et les pigeons) aiment se percher sur les rebords saillants, les gouttières ou les appuis de fenêtres.</p>

                <ul class="custom-list">
                    <li>Posez des <strong>pics anti-pigeons</strong> sur les zones de repos stratégiques.</li>
                    <li>Installez des <strong>effaroucheurs visuels</strong> (ballons ou rubans réfléchissants) sous les débords de toits.</li>
                    <li>Si des oiseaux nichent systématiquement sous vos tuiles, il faut inspecter la couverture. Un <a href="<?php echo BASE_URL; ?>demoussage-tuiles-terre-cuite">démoussage de vos tuiles</a> régulier et la pose d'obturateurs empêcheront les nuisibles de s'installer et de ruiner vos murs en contrebas.</li>
                </ul>

                <img src="<?php echo BASE_URL; ?>image/comment-nettoyer-des-fientes-d-oiseaux-sur-du-crepi-3.webp"
                     alt="Dispositif de pics anti-pigeons en acier inoxydable fixés sur la couvertine métallique d'un muret, avec un mur en crépi extérieur propre à l'arrière-plan"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="ux-outil">⚙️ Trouvez votre méthode de nettoyage sur-mesure</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Diagnostic express : quelle méthode pour votre fiente ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. La fiente est-elle fraîche ou sèche ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'fraiche')">Fraîche (moins de 24h)</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'seche')">Sèche et incrustée</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Quel type d'enduit avez-vous ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'gratte')">Crépi gratté (grain rugueux)</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'lisse')">Enduit lisse ou taloché</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Avez-vous déjà essayé de frotter la tache ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'non')">Non, pas encore</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'oui')">Oui, j'ai frotté (et c'est pire)</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">🎯 Votre méthode :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Attention : intervention professionnelle recommandée</h4>
                            <p id="warning-text">Vous avez frotté à sec sur un enduit gratté et la zone est abîmée. Une retouche locale par un professionnel est probablement nécessaire pour effacer la marque sans refaire toute la façade.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn" rel="nofollow">Demander un diagnostic gratuit</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Peut-on utiliser le bicarbonate de soude et le vinaigre blanc en même temps ?</h3>
                <p>Non. Acide + Base = de l'eau salée qui mousse, ça ne nettoie rien du tout. Utilisez le bicarbonate dilué dans un peu d'eau pour frotter la tache, rincez, puis passez un coup de pulvérisateur au vinaigre blanc pour neutraliser l'acidité de la fiente. Toujours l'un après l'autre, jamais ensemble.</p>

                <h3>Comment enlever une tache grise qui reste sur le crépi extérieur après nettoyage ?</h3>
                <p>Si la fiente est partie mais qu'une tache grise persiste, c'est que la zone est contaminée par des champignons, l'humidité de la fiente favorise la mousse. Pulvérisez un produit anti-mousse professionnel et laissez agir sans frotter. Le spectre gris disparaîtra au bout de quelques jours avec la pluie.</p>

                <h3>Combien de temps attendre avant de nettoyer un crépi neuf taché par une fiente ?</h3>
                <p>Pas question d'attendre : agissez dès que vous voyez la fiente, même si l'enduit est récent. Plus vous tardez, plus l'acide urique s'incruste dans les pores du liant. Sur un enduit de moins de 6 mois, soyez encore plus doux, utilisez uniquement de l'eau tiède et un chiffon en microfibre, sans produit ni brosse. La prise complète du liant prend du temps et tout frottement est risqué.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans de chantiers de ravalement et d'enduit de façade, Philippe vous donne les méthodes de pro pour entretenir votre crépi sans jamais abîmer l'enduit ni casser le grain de votre ravalement.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Une tache résistante ou un enduit abîmé ?</h3>
                <p>Certaines taches de fientes très incrustées nécessitent une intervention professionnelle pour éviter d'aggraver les dégâts sur votre façade. Ne prenez pas de risque avec un enduit récent.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un avis ou un devis gratuit</a>
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
                    <h3 class="sidebar-title">Derniers articles, <?php echo htmlspecialchars($category['name'] ?? ''); ?></h3>
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

<script>
    let userAnswers = {};

    function saveAnswer(stepNumber, answer) {
        userAnswers['step' + stepNumber] = answer;
        document.getElementById('step-' + stepNumber).classList.remove('active');
        if (stepNumber < 3) {
            document.getElementById('step-' + (stepNumber + 1)).classList.add('active');
        } else {
            generateResult();
        }
    }

    function generateResult() {
        document.getElementById('step-result').classList.add('active');
        const successBox = document.getElementById('success-result');
        const warningBox = document.getElementById('warning-result');
        const resultText = document.getElementById('result-text');

        successBox.style.display = 'none';
        warningBox.style.display = 'none';

        // ── Logique métier ────────────────────────────────────────────────
        if (userAnswers.step3 === 'oui' && userAnswers.step2 === 'gratte') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step1 === 'fraiche') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Bonne nouvelle :</strong> La fiente est fraîche, c'est le meilleur moment pour agir.<br><strong>Méthode :</strong> Pré-mouillez le mur à l'eau claire. Appliquez du savon de Marseille dilué, laissez agir 3 minutes, brossez doucement en cercles avec une brosse nylon souple. Rincez du haut vers le bas à basse pression. La tache devrait partir sans laisser de trace.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Fiente incrustée :</strong> Il faut ramollir avant de frotter.<br><strong>Méthode :</strong> Mouillez abondamment. Préparez une pâte bicarbonate de soude + eau, appliquez-la sur la tache et laissez agir 10 à 15 minutes. Brossez très doucement avec une brosse nylon souple. Rincez, puis passez un pulvérisateur de vinaigre blanc pour neutraliser les restes d'acide urique. Répétez si nécessaire.";
        }
        // ─────────────────────────────────────────────────────────────────
    }

    function resetTool() {
        userAnswers = {};
        document.getElementById('step-result').classList.remove('active');
        document.getElementById('step-1').classList.add('active');
    }
</script>

<?php
// Schema.org, NE JAMAIS MODIFIER
require_once dirname(__DIR__) . '/schema-data.php';

$faq_schema = [
    [
        'question' => "Peut-on utiliser le bicarbonate de soude et le vinaigre blanc en même temps ?",
        'answer'   => "Non. Acide + Base = de l'eau salée qui mousse, ça ne nettoie rien du tout. Utilisez le bicarbonate dilué dans un peu d'eau pour frotter la tache, rincez, puis passez un coup de pulvérisateur au vinaigre blanc pour neutraliser l'acidité de la fiente. Toujours l'un après l'autre, jamais ensemble."
    ],
    [
        'question' => "Comment enlever une tache grise qui reste sur le crépi extérieur après nettoyage ?",
        'answer'   => "Si la fiente est partie mais qu'une tache grise persiste, c'est que la zone est contaminée par des champignons, l'humidité de la fiente favorise la mousse. Pulvérisez un produit anti-mousse professionnel et laissez agir sans frotter. Le spectre gris disparaîtra au bout de quelques jours avec la pluie."
    ],
    [
        'question' => "Combien de temps attendre avant de nettoyer un crépi neuf taché par une fiente ?",
        'answer'   => "Pas question d'attendre : agissez dès que vous voyez la fiente, même si l'enduit est récent. Plus vous tardez, plus l'acide urique s'incruste dans les pores du liant. Sur un enduit de moins de 6 mois, soyez encore plus doux, utilisez uniquement de l'eau tiède et un chiffon en microfibre, sans produit ni brosse."
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
