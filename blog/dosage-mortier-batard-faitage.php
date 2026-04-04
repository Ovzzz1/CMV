<?php
// published: 2026-04-04 08:00
/**
 * dosage-mortier-batard-faitage.php
 * Article : Dosage du mortier bâtard pour faîtage : recettes, calculs et étapes de pose
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-03-31
 */


$article_meta = [
    'title'        => 'Dosage du mortier bâtard pour faîtage : recettes, calculs et étapes de pose',
    'category'     => 'toiture',
    'slug'         => 'dosage-mortier-batard-faitage',
    'image'        => 'https://www.cemarenov.fr/image/dosage-mortier-batard-1.webp',
    'excerpt'      => 'Réussir le scellement de son faîtage demande de la précision. Découvrez la règle du 1-1-6, estimez vos quantités exactes avec notre calculateur interactif et suivez le guide de pose pas-à-pas.',
    'date'         => '2026-04-04',
    'reading_time' => 7,
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


    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">


            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Dosage mortier bâtard faîtage</span>
            </nav>


            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Mortier</span>
                <span class="article-tag">Faîtage</span>
                <span class="article-tag">Tutoriel</span>
                <span class="article-tag">Calculateur</span>
            </div>


            <h1>Dosage du mortier bâtard pour faîtage :<br>
                <span class="h1-accent">Recette, Calculateur et Guide de pose</span>
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
                <?php endforeach; ?>
            </div>
        </aside>


        <div class="article-container">


            <p class="article-intro">
                Réussir le scellement de son faîtage demande de la précision. Pour garantir une toiture étanche, résistante aux vents violents, et sans risquer de fissurer vos tuiles au premier écart de température, l'utilisation du <strong>mortier bâtard</strong> est incontournable. Ce guide vous explique pourquoi ce mélange est supérieur au ciment pur, vous donne la fameuse "règle du 1-1-6" et met à votre disposition un <strong>calculateur interactif</strong> pour estimer vos matériaux en un clic.
            </p>


            <div class="article-content">


                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>La recette d'or (1-1-6) :</strong> 1 volume de ciment, 1 volume de chaux (NHL 3.5), 6 volumes de sable.</li>
                        <li><strong>Pourquoi le "bâtard" ?</strong> Il allie la solidité du ciment à la souplesse de la chaux pour éviter les fissures sur le toit.</li>
                        <li><strong>Consommation moyenne :</strong> Prévoyez environ 12 litres de mortier gâché par mètre linéaire de faîtage (environ 3 tuiles).</li>
                        <li><strong>Erreur fatale :</strong> Ne posez jamais votre mortier sur des tuiles sèches ! Humidifiez-les toujours abondamment avant l'application.</li>
                    </ul>
                </div>


                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#definition">Qu'est-ce qu'un mortier bâtard et pourquoi l'utiliser ?</a></li>
                        <li><a href="#dosage">Le dosage exact du mortier bâtard (La règle du 1-1-6)</a></li>
                        <li><a href="#calculateur">🧮 Calculateur de quantités (Outil interactif)</a></li>
                        <li><a href="#gachage">Préparation et gâchage : L'ordre pour bien mélanger</a></li>
                        <li><a href="#pose">Étapes de pose : Comment sceller ses tuiles faîtières ?</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>


                <h2 id="definition">Qu'est-ce qu'un mortier bâtard et pourquoi l'utiliser pour un faîtage ?</h2>


                <p>Un mortier "bâtard" est le fruit du mariage entre deux liants : le <strong>ciment</strong> et la <strong>chaux</strong>, mélangés à du sable et de l'eau. Pour sceller des tuiles faîtières (la ligne située tout au sommet de votre toit), c'est la seule solution traditionnelle pérenne.</p>


                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de mortier</th>
                                <th>Résistance mécanique</th>
                                <th>Souplesse / Fissuration</th>
                                <th>Verdict pour le faîtage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>100% Ciment</strong></td>
                                <td>Très forte</td>
                                <td>❌ Trop rigide (fissure au moindre choc)</td>
                                <td>À éviter</td>
                            </tr>
                            <tr>
                                <td><strong>100% Chaux</strong></td>
                                <td>Faible à modérée</td>
                                <td>✅ Très souple et respirant</td>
                                <td>Temps de prise trop long</td>
                            </tr>
                            <tr>
                                <td><strong>Bâtard (Ciment + Chaux)</strong></td>
                                <td>Forte</td>
                                <td>✅ Absorbe les micro-mouvements</td>
                                <td><strong>Le choix idéal 🏆</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <ul class="custom-list">
                    <li><strong>La chaux (idéalement NHL 3.5)</strong> apporte la souplesse. Elle permet au joint d'absorber les mouvements de la charpente (sous l'effet du vent et de la dilatation due au soleil) sans craquer. De plus, elle laisse "respirer" la toiture.</li>
                    <li><strong>Le ciment</strong> garantit une prise suffisamment rapide et une solidité mécanique essentielle face aux fortes intempéries.</li>
                </ul>


                <h2 id="dosage">Le dosage exact du mortier bâtard (La règle d'or du 1-1-6)</h2>


                <img src="<?php echo BASE_URL; ?>image/dosage-mortier-batard-2.webp" alt="Les ingrédients du mortier bâtard : ciment, chaux hydraulique, sable et eau" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">


                <p>Pour un faîtage standard, la recette à retenir par cœur par tous les couvreurs est le ratio <strong>1-1-6</strong>, exprimé en volumes (généralement on utilise un seau de maçon de 10 litres comme unité de mesure).</p>


                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <h3 style="margin-top: 0;">🧱 La recette universelle en volumes :</h3>
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li style="margin-bottom: 8px;">🔘 <strong>1 volume</strong> de Ciment (gris ou blanc selon la teinte souhaitée)</li>
                        <li style="margin-bottom: 8px;">🔘 <strong>1 volume</strong> de Chaux hydraulique (Type NHL 3.5)</li>
                        <li style="margin-bottom: 8px;">🔘 <strong>6 volumes</strong> de Sable (granulométrie 0/4, sable de rivière à bâtir)</li>
                        <li>💧 <strong>L'eau :</strong> À ajouter très progressivement jusqu'à obtenir une pâte souple, onctueuse et <em>collante</em>. Elle ne doit absolument pas être liquide.</li>
                    </ul>
                </div>


                <h2 id="calculateur">🧮 Calculateur de mortier pour faîtage : Estimez vos quantités en 1 clic</h2>


                <p>Oubliez les calculs mentaux fastidieux. Indiquez simplement la longueur totale de votre ligne de faîtage. <em>Note : le calcul se base sur une estimation moyenne de 12 Litres de mortier préparé nécessaires par mètre linéaire (soit environ 3 tuiles).</em></p>


                <style>
                    .calc-tool { background: #fdfdfd; border: 2px solid var(--color-primary, #2c3e50); border-radius: 10px; padding: 25px; margin: 30px 0; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
                    .calc-header { text-align: center; margin-bottom: 20px; font-weight: bold; font-size: 1.1em; }
                    .calc-input-group { display: flex; align-items: center; justify-content: center; gap: 15px; margin-bottom: 25px; flex-wrap: wrap; }
                    .calc-input-group input { font-size: 1.2rem; padding: 10px; width: 150px; border: 1px solid #ccc; border-radius: 5px; text-align: center; }
                    .calc-btn { background: var(--color-secondary, #e67e22); color: #fff; border: none; padding: 12px 25px; font-size: 1.1rem; border-radius: 5px; cursor: pointer; font-weight: bold; }
                    .calc-btn:hover { opacity: 0.9; }
                    .calc-results-grid { display: none; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 15px; margin-top: 20px; }
                    .calc-result-card { background: #f4f6f7; padding: 15px; border-radius: 8px; text-align: center; border: 1px solid #e1e8ed; }
                    .calc-result-card span { display: block; font-size: 1.8rem; font-weight: bold; color: var(--color-primary, #2c3e50); }
                </style>


                <div class="calc-tool">
                    <div class="calc-header">
                        <label for="ridge-length">Longueur totale de votre faîtage (en mètres linéaires) :</label>
                    </div>
                    <div class="calc-input-group">
                        <input type="number" id="ridge-length" placeholder="Ex: 10" min="1" step="0.5">
                        <button class="calc-btn" onclick="calculateMortar()">Calculer mes quantités</button>
                    </div>
                    
                    <div class="calc-results-grid" id="calc-results">
                        <div class="calc-result-card">
                            <span id="res-tiles">--</span>
                            Tuiles faîtières<br><small>(Base: 3/mètre)</small>
                        </div>
                        <div class="calc-result-card">
                            <span id="res-cement">--</span>
                            Seaux de Ciment<br><small>(Seaux de 10L)</small>
                        </div>
                        <div class="calc-result-card">
                            <span id="res-lime">--</span>
                            Seaux de Chaux<br><small>(Seaux de 10L)</small>
                        </div>
                        <div class="calc-result-card">
                            <span id="res-sand">--</span>
                            Seaux de Sable<br><small>(Seaux de 10L)</small>
                        </div>
                    </div>
                    <div id="calc-bags" style="text-align: center; margin-top: 25px; font-weight: bold; color: var(--color-secondary, #e67e22); display: none; padding: 15px; background: #fff3e0; border-radius: 5px;"></div>
                </div>


                <script>
                    function calculateMortar() {
                        const input = document.getElementById('ridge-length').value;
                        const length = parseFloat(input.replace(',', '.'));
                        
                        const resultsGrid = document.getElementById('calc-results');
                        const bagsText = document.getElementById('calc-bags');


                        if(isNaN(length) || length <= 0) {
                            alert("Veuillez entrer une longueur valide supérieure à 0.");
                            return;
                        }


                        // Calculs
                        const nbTuiles = Math.ceil(length * 3);
                        const volumeTotalLitres = length * 12; 
                        
                        // Ratio 1-1-6 = 8 parts
                        const volumePart = volumeTotalLitres / 8;
                        
                        // Seaux de 10L
                        const cimentSeaux = (volumePart / 10).toFixed(1);
                        const chauxSeaux = (volumePart / 10).toFixed(1);
                        const sableSeaux = ((volumePart * 6) / 10).toFixed(1);


                        document.getElementById('res-tiles').innerText = nbTuiles;
                        document.getElementById('res-cement').innerText = cimentSeaux;
                        document.getElementById('res-lime').innerText = chauxSeaux;
                        document.getElementById('res-sand').innerText = sableSeaux;


                        // Estimation en sacs (Sacs 35kg ciment/chaux ≈ 30L | Sable 35kg ≈ 22L)
                        const sacCiment = Math.ceil(volumePart / 30);
                        const sacChaux = Math.ceil(volumePart / 30);
                        const sacSable = Math.ceil((volumePart * 6) / 22);


                        bagsText.innerHTML = `🛒 Liste de courses estimée : ${sacCiment} sac(s) de ciment (35kg) + ${sacChaux} sac(s) de chaux NHL (35kg) + ${sacSable} sac(s) de sable (35kg).`;


                        resultsGrid.style.display = 'grid';
                        bagsText.style.display = 'block';
                    }
                </script>


                <h2 id="gachage">Préparation et gâchage : L'ordre pour bien mélanger</h2>


                <p>Le gâchage (l'action de mélanger) peut s'effectuer à la bétonnière pour un toit entier, ou dans une auge de maçon si vous réparez simplement quelques tuiles.</p>


                <ol class="custom-list" style="padding-left: 20px;">
                    <li><strong>Le mélange à sec :</strong> Versez d'abord vos volumes de sable, puis ajoutez le ciment et la chaux. Mélangez l'ensemble à sec avec une pelle ou une truelle jusqu'à ce que la couleur soit parfaitement homogène.</li>
                    <li><strong>L'hydratation :</strong> Formez un cratère au centre (comme pour de la farine) et versez l'eau progressivement.</li>
                    <li><strong>Le malaxage :</strong> Ramenez la matière sèche vers le centre d'eau. Ne mettez jamais toute l'eau d'un coup.</li>
                </ol>


                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>💡 Le test de la truelle (Astuce de pro) :</strong> Pour savoir si l'eau est bien dosée, chargez votre truelle de mortier et retournez-la. Si le mortier tombe instantanément comme une bouse, il est trop liquide (rajoutez sable et liants). S'il reste accroché un court instant avant de glisser en bloc, la consistance "collante" est parfaite.
                </div>


                <h2 id="pose">Étapes de pose : Comment sceller ses tuiles faîtières avec succès ?</h2>


                <img src="<?php echo BASE_URL; ?>image/dosage-mortier-batard-3.webp" alt="Application du mortier bâtard et pose de la tuile faîtière" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">


                <p>Votre mortier est onctueux, il est temps de monter sur le toit (équipez-vous obligatoirement d'un harnais de sécurité).</p>


                <div style="background-color: var(--color-light); border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>⚠️ L'erreur fatale des débutants :</strong> Ne posez jamais votre mortier sur des tuiles sèches chauffées par le soleil ! La terre cuite de la tuile va immédiatement "boire" l'eau de votre mortier. Celui-ci va sécher beaucoup trop vite, se fariner, et n'adhérera pas. <strong>Humidifiez abondamment</strong> la zone de pose et l'intérieur de vos faîtières à l'éponge ou au pulvérisateur avant l'application.
                </div>


                <ol class="custom-list" style="padding-left: 20px;">
                    <li style="margin-bottom: 10px;"><strong>Dépoussiérer :</strong> Brossez vigoureusement la ligne de crête de votre toiture.</li>
                    <li style="margin-bottom: 10px;"><strong>Humidifier :</strong> Mouillez les tuiles de couverture supérieures et la tuile faîtière (sans créer de flaques).</li>
                    <li style="margin-bottom: 10px;"><strong>Appliquer le mortier :</strong> Déposez un boudin de mortier généreux de chaque côté du sommet.</li>
                    <li style="margin-bottom: 10px;"><strong>Sceller :</strong> Posez la tuile faîtière à cheval et appuyez fermement pour écraser le mortier. Assurez-vous de l'alignement (utilisez un cordeau si besoin).</li>
                    <li style="margin-bottom: 10px;"><strong>Lisser (Créer le solin) :</strong> Avec une langue de chat ou la pointe de votre truelle, lissez le mortier qui a débordé en créant une pente douce "en biseau" vers la tuile. Cela aidera l'eau de pluie à s'écouler.</li>
                    <li style="margin-bottom: 10px;"><strong>Nettoyer :</strong> L'étape souvent oubliée ! Passez immédiatement une éponge humide sur les tuiles pour enlever les traces de laitance de mortier avant qu'elles ne sèchent de façon permanente.</li>
                </ol>


                <h2 id="faq">FAQ, Questions fréquentes</h2>


                <h3>Peut-on utiliser du mortier bâtard prêt à l'emploi en sac ?</h3>
                <p>Oui. Dans le commerce, vous trouverez des sacs estampillés "Mortier Bâtard" ou "Mortier de montage" pré-mélangés (il suffit d'ajouter de l'eau). Ils sont très pratiques si vous n'avez que quelques tuiles à réparer. Cependant, pour sceller un faîtage complet de 10 mètres ou plus, faire son propre mélange à partir des matières premières (règle du 1-1-6) vous coûtera 2 à 3 fois moins cher.</p>


                <h3>Quel type de sable choisir pour la toiture ?</h3>
                <p>Utilisez impérativement du sable de rivière "à bâtir", avec une granulométrie de 0/4 (sable fin à moyen). N'utilisez <strong>jamais de sable marin</strong> non lavé : le sel qu'il contient va attaquer les liants, provoquer des efflorescences blanches et détruire votre joint de l'intérieur.</p>


                <h3>Quelles sont les conditions météo idéales pour faire un faîtage ?</h3>
                <p>Fuyez les températures extrêmes. Il est interdit de sceller s'il y a un risque de gel dans les 24h (température inférieure à 5°C). À l'inverse, évitez la canicule ou le travail en plein soleil de midi, car le mortier séchera trop vite et "grillera" (il craquera au lieu de durcir). Idéalement, privilégiez une journée sèche et tempérée (entre 10°C et 20°C).</p>


            </div><div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les toitures, Philippe vous partage ses recettes de chantier et ses astuces techniques, sans jargon inutile.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>


            <div class="conclusion-box">
                <h3>Besoin d'un professionnel pour rénover votre faîtage ?</h3>
                <p>Le travail en hauteur ne s'improvise pas, et une fuite au niveau du faîtage peut causer de lourds dégâts sur votre charpente. Si le dosage du mortier ou le scellement vous semble trop complexe, faites appel à nos artisans couvreurs locaux pour un travail garanti et durable.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis gratuit</a>
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
        'question' => "Peut-on utiliser du mortier bâtard prêt à l'emploi en sac ?",
        'answer'   => "Oui. Dans le commerce, vous trouverez des sacs estampillés Mortier Bâtard pré-mélangés (il suffit d'ajouter de l'eau). Ils sont très pratiques si vous n'avez que quelques tuiles à réparer. Cependant, pour de grandes surfaces, faire son propre mélange (1 volume de ciment, 1 volume de chaux, 6 volumes de sable) est plus économique."
    ],
    [
        'question' => "Quel type de sable choisir pour sceller un faîtage ?",
        'answer'   => "Utilisez impérativement du sable de rivière à bâtir, avec une granulométrie de 0/4 (sable fin à moyen). N'utilisez jamais de sable marin non lavé : le sel qu'il contient va attaquer les liants et détruire votre joint de l'intérieur."
    ],
    [
        'question' => "Quelles sont les conditions météo idéales pour faire un faîtage au mortier ?",
        'answer'   => "Il est interdit de sceller s'il y a un risque de gel dans les 24h (température inférieure à 5°C). Évitez également la canicule ou le travail en plein soleil de midi, car le mortier séchera trop vite et craquera. L'idéal est une journée sèche et tempérée entre 10°C et 20°C."
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
