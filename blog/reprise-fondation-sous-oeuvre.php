// published: 2026-04-08 08:00

/**
 * reprise-fondation-sous-oeuvre.php
 * Article : Reprise en sous-oeuvre : guide complet des techniques, etapes et prix
 * Site : cemarenov.fr
 * Date : 2026-04-08
 */

$article_meta = [
    'title'        => 'Reprise en sous-oeuvre : guide complet',
    'category'     => 'travaux',
    'slug'         => 'reprise-fondation-sous-oeuvre',
    'image'        => 'https://www.cemarenov.fr/image/reprise-fondation-sous-oeuvre-1.webp',
    'excerpt'      => 'Fissures traversantes, sol qui s\'affaisse, extension a venir : decouvrez les 4 techniques de reprise en sous-oeuvre, le deroulement du chantier et les vrais budgets.',
    'date'         => '2026-04-08',
    'reading_time' => 8,
];

// -- Bloc logique CMS, NE JAMAIS MODIFIER ------------------------------------
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
// -- Fin bloc logique CMS ----------------------------------------------------

include dirname(__DIR__) . '/header.php';

<style>
    /* Styles integres pour les videos et l'outil UX */
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

    /* Style pour la box de linking interne */
    .guide-links-box { background: #edf2f7; border-left: 4px solid #3498db; padding: 1.5em; border-radius: 8px; margin: 2em 0; }
    .guide-links-box h3 { margin-top: 0; font-size: 1.2em; color: #2c3e50; }
    .guide-links-box p { margin-bottom: 1em; }
    .guide-links-grid { display: flex; flex-wrap: wrap; gap: 10px; }
    .guide-link-item { background: #fff; border: 1px solid #cbd5e1; padding: 8px 15px; border-radius: 6px; font-weight: bold; text-decoration: none; color: #3498db; transition: all 0.2s ease; }
    .guide-link-item:hover { background: #3498db; color: #fff; border-color: #3498db; text-decoration: none; }

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
                <span>Reprise en sous-oeuvre</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Fondations</span>
                <span class="article-tag">Gros Oeuvre</span>
                <span class="article-tag">Structure</span>
                <span class="article-tag">Maconnerie</span>
            </div>

            <h1>Reprise en sous-oeuvre :<br><span class="h1-accent">le guide de terrain</span></h1>

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
                    Mis a jour le <?php echo format_date_fr($article_meta['date']); ?>
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
                Des fissures traversantes, des portes qui frottent, un sol qui s'affaisse. Ce guide vous explique chaque technique, chaque etape de chantier et les budgets reels pour stabiliser votre maison — sans langue de bois.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel a retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Verifier l'activite :</strong> Posez des jauges en platre sur vos fissures pendant 2-3 mois avant de lancer le moindre chantier.</li>
                        <li><strong>Etude de sol obligatoire :</strong> Aucune technique ne peut etre dimensionnee sans une etude geotechnique G2 (1 500 - 3 000 EUR).</li>
                        <li><strong>4 techniques principales :</strong> Micropieux, injection de resine expansive, puits et plots beton, longrines de ceinture.</li>
                        <li><strong>Garantie CatNat :</strong> Si votre commune a un arrete secheresse, votre assurance MRH peut couvrir l'integralite des travaux.</li>
                        <li><strong>Intervenants specialises :</strong> Jamais un macon generaliste — il faut un bureau d'etudes geotechnique, un ingenieur structure et une entreprise de travaux speciaux.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#pourquoi">1. Pourquoi consolider ses fondations ?</a></li>
                        <li><a href="#techniques">2. Les 4 techniques pour stabiliser la structure</a></li>
                        <li><a href="#etapes">3. Les intervenants et les etapes du chantier</a></li>
                        <li><a href="#prix">4. Quel est le vrai prix d'une reprise en sous-oeuvre ?</a></li>
                        <li><a href="#etude-de-cas">5. Etude de cas sur le terrain</a></li>
                        <li><a href="#ux-outil">&#9881; Outil : Diagnostiquez votre situation</a></li>
                        <li><a href="#liens">Articles connexes</a></li>
                        <li><a href="#faq">FAQ, Questions frequentes</a></li>
                    </ul>
                </div>


                <h2 id="pourquoi">Pourquoi consolider ses fondations ?</h2>

                <p>Une fondation qui s'enfonce a besoin d'un nouvel appui. Le but est d'aller chercher un ancrage solide plus bas pour soulager la maconnerie existante. Sur mes chantiers, je rencontre deux situations principales :</p>

                <ul class="custom-list">
                    <li><strong>La reparation d'une pathologie :</strong> votre maison bouge a cause de cavites souterraines ou du retrait-gonflement des argiles apres une grosse secheresse. Des fissures en escalier sur la maconnerie, des portes qui ne ferment plus — ce sont les signaux a ne pas ignorer. Le <a href="<?php echo BASE_URL; ?>traitement-humidite">traitement de l'humidite des murs</a> et un eventuel <a href="<?php echo BASE_URL; ?>assechement-murs-injections">assechement par injections</a> accompagnent souvent la reprise en sous-oeuvre.</li>
                    <li><strong>L'evolution structurelle :</strong> vous decidez d'ajouter un etage ou une extension. Les fondations d'origine n'ont pas ete calculees pour encaisser ce nouveau poids — il faut donc obligatoirement augmenter leur capacite portante avant de demarrer. Voir aussi notre guide sur <a href="<?php echo BASE_URL; ?>rehausser-un-mur-en-parpaing-existant">le rehaussement d'un mur en parpaing existant</a>.</li>
                </ul>

                <p><strong>L'oeil de l'artisan — le test d'activite :</strong> avant de faire venir les pelleteuses, on verifie toujours si le mouvement est actif. On pose des jauges en platre sur les fissures pour surveiller la facade sur deux a trois mois. Des temoins qui craquent signifient que le sol travaille encore et que l'intervention est urgente. Des jauges intactes depuis des annees indiquent que le batiment a trouve son point d'equilibre. Ce diagnostic de base peut vous eviter des dizaines de milliers d'euros de travaux inutiles.</p>

                <p><strong>Le piege vegetal souvent sous-estime :</strong> les grands arbres plantes trop pres de vos facades agissent comme des pompes gigantesques en ete. Ils assechent la terre sous vos fondations bien plus vite que vous ne l'imaginez, aggravant directement le phenomene de retrait des argiles. Si un chene ou un platane de 10 metres est plante a moins de 5 metres de votre mur, il fait partie integrante du diagnostic.</p>


                <h2 id="techniques">Les 4 techniques pour stabiliser la structure</h2>

                <p>Le choix de la methode ne se fait jamais au hasard. Il depend directement de l'etude de sol et de la profondeur de la couche dure a atteindre. Voici les quatre options reellement disponibles sur le marche :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>#</th><th>Technique</th><th>Principe</th><th>Avantage principal</th><th>Contrainte</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>1</strong></td>
                                <td><strong>Micropieux</strong></td>
                                <td>Forage profond (jusqu'a 15 m+), armatures metalliques scellees au coulis de ciment, longrines de liaison</td>
                                <td>Efficace sur sols tres instables</td>
                                <td>Demenagement souvent necessaire si forage interieur</td>
                            </tr>
                            <tr>
                                <td><strong>2</strong></td>
                                <td><strong>Injection de resine expansive</strong></td>
                                <td>Percages de petits trous, injection de polyurethane qui comble les vides et peut redresser la structure</td>
                                <td>Chantier en quelques jours, habitabilite maintenue</td>
                                <td>Limite aux profondeurs accessibles a la resine</td>
                            </tr>
                            <tr>
                                <td><strong>3</strong></td>
                                <td><strong>Puits et plots beton</strong></td>
                                <td>Excavation par passes alternees sous les fondations, remplissage beton arme</td>
                                <td>Economique si sol porteur a moins de 3 m</td>
                                <td>Terrassement important, travaux de longue duree</td>
                            </tr>
                            <tr>
                                <td><strong>4</strong></td>
                                <td><strong>Poutres et longrines</strong></td>
                                <td>Ceinture de beton arme coulee tout autour du batiment pour rigidifier et repartir les charges</td>
                                <td>Ideal si le sol est bon mais la fondation d'origine trop faible</td>
                                <td>Perimetre des murs porteurs a degager totalement</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>Pour les puits et plots, consultez notre guide detaille sur les <a href="<?php echo BASE_URL; ?>fondation-puits">fondations en puits</a>. Pour la technique des longrines, le principe est proche du <a href="<?php echo BASE_URL; ?>chainage-horizontal-mur-parpaing">chainage horizontal en parpaing</a>, mais applique aux fondations.</p>


                <h2 id="etapes">Les intervenants et les etapes du chantier</h2>

                <h3>Le casting obligatoire : qui fait quoi ?</h3>

                <p>Oubliez le macon generaliste pour ce genre de travaux. La reprise en sous-oeuvre demande un casting tres specifique, ou chaque intervenant a un role precis et non interchangeable :</p>

                <ul class="custom-list">
                    <li><strong>Bureau d'etudes geotechnique (G2) :</strong> realise les forages pour analyser la resistance du terrain. Sans cette etude, aucune technique ne peut etre serieusement dimensionnee.</li>
                    <li><strong>Ingenieur structure :</strong> calcule la descente de charges et dimensionne la solution — diametre et nombre de micropieux, section des longrines, espacement des plots. Son plan est la loi du chantier.</li>
                    <li><strong>Entreprise de travaux speciaux :</strong> execute le chantier selon les plans valides par l'ingenieur. C'est elle qui engage sa garantie decennale sur l'ouvrage fini.</li>
                </ul>

                <h3>Le deroulement chronologique sur le terrain</h3>

                <p><strong>Avant le chantier — le refere preventif :</strong> si vous etes en mitoyennete ou en milieu urbain dense, faites passer un expert judiciaire pour constater l'etat des murs voisins avant le premier coup de pelleteuse. C'est une precaution peu couteuse qui peut eviter de tres longues procedures en cas de recours abusif d'un voisin.</p>

                <p><strong>Phase 1 — L'installation et l'etaiement :</strong> securisation absolue de la zone. Les murs porteurs sont soutenus artificiellement par des etais et des chevalements pour eviter tout effondrement pendant que l'on travaille dessous. C'est l'etape qui ne souffre aucune economie ni aucune improvisation.</p>

                <p><strong>Phase 2 — L'intervention technique :</strong> forage pour les micropieux, excavation par passes alternees pour les puits, ou percages pour l'injection de resine. Le <a href="<?php echo BASE_URL; ?>dosage-beton-fondation">dosage du beton de fondation</a> est ici critique : on ne transige pas sur les resistances mecaniques requises par l'ingenieur.</p>

                <p><strong>Phase 3 — Le coulage et le transfert de charge :</strong> mise en place du beton ou scellement des armatures. Une fois les materiaux secs et resistants, la charge de la maison est transferee de l'etaiement provisoire vers les nouvelles fondations definitives. C'est l'instant ou tout le travail preparatoire prend son sens.</p>

                <img src="<?php echo BASE_URL; ?>image/reprise-fondation-sous-oeuvre-2.webp"
                     alt="Installation d'etais de soutien sous un mur porteur pendant une reprise en sous-oeuvre - phase d'etaiement avant travaux"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">


                <h2 id="prix">Quel est le vrai prix d'une reprise en sous-oeuvre ?</h2>

                <p>Chaque maison est un cas particulier, ce qui rend impossible le calcul d'un prix au metre carre global. Ce qui est certain : l'etude de sol G2 vous coutera entre <strong>1 500 et 3 000 EUR</strong> avant meme de commencer les travaux. Ensuite, la facture depend entierement de la technique retenue et de la profondeur du sol porteur.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Technique de reprise</th><th>Fourchette estimative</th><th>Unite de facturation</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Micropieux</strong></td><td>1 000 EUR - 2 500 EUR</td><td>Par micropieu pose</td></tr>
                            <tr><td><strong>Injection de resine</strong></td><td>500 EUR - 1 000 EUR</td><td>Par metre lineaire traite</td></tr>
                            <tr><td><strong>Plots / Puits en beton</strong></td><td>800 EUR - 1 500 EUR</td><td>Par m3 ou par plot</td></tr>
                            <tr><td><strong>Etude de sol G2</strong></td><td>1 500 EUR - 3 000 EUR</td><td>Forfait, avant travaux</td></tr>
                        </tbody>
                    </table>
                </div>

                <p><strong>L'astuce financiere — la garantie Catastrophe Naturelle :</strong> ces montants peuvent faire peur. Pourtant, si l'affaissement vient d'une secheresse et que votre commune fait l'objet d'un arrete interministeriel de Catastrophe Naturelle, la donne change radicalement. Votre assurance multirisque habitation peut prendre en charge la recherche de fuite, l'etude de sol et l'integralite des travaux — deduction faite de la franchise legale. Renseignez-vous en mairie des l'apparition des premiers desordres, pas six mois apres.</p>


                <h2 id="etude-de-cas">Etude de cas sur le terrain : le sauvetage d'un pavillon</h2>

                <p>Pour vous donner une idee concrete de ce que ca represente, voici le chantier d'un pavillon des annees 1980 que j'ai suivi recemment, bati sur un terrain argileux.</p>

                <p><strong>Le probleme identifie :</strong> le pignon ouest s'ouvrait avec de grosses fissures traversantes qui bloquaient meme l'ouverture des portes. Le diagnostic geotechnique a confirme un tassement differentiel lie aux cycles de secheresse-rehydratation du sol argileux. Probleme majeur : le sol stable se trouvait a <strong>12 metres de profondeur</strong>, rendant la methode classique par puits totalement inoperante.</p>

                <img src="<?php echo BASE_URL; ?>image/reprise-fondation-sous-oeuvre-3.webp"
                     alt="Installation de la foreuse en exterieur pour la mise en place du reseau de micropieux et le coulage de la longrine de redressement"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>L'entreprise a donc amene une foreuse dans le jardin pour installer <strong>8 micropieux</strong>, relies ensuite par une longrine de redressement en beton arme coulee sous le pignon. Le transfert de charge a stoppe l'affaissement le jour meme de la mise en charge. La structure est desormais perennisee et couverte par une nouvelle <strong>garantie decennale</strong>. Le proprietaire a ensuite fait intervenir un facadier pour <a href="<?php echo BASE_URL; ?>crepi-facade">appliquer un crepi facade</a> et masquer definitivement les fissures — quelques mois plus tard, une fois la structure totalement stabilisee.</p>


                <h2 id="ux-outil">&#9881; Diagnostiquez votre situation</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Quel est votre cas de figure ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quelle situation decrit le mieux votre probleme ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'fissures')">Fissures ou affaissement</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'extension')">Extension ou surelevation</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'secheresse')">Degats apres une secheresse</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'budget')">Je veux estimer un budget</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Avez-vous deja realise une etude de sol ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'oui')">Oui, j'ai un rapport G2</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'non')">Non, pas encore</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Souhaitez-vous rester dans la maison pendant les travaux ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'oui')">Oui, je veux rester sur place</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'non')">Non, je peux me reloger</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">Notre recommandation :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Attention : etape indispensable a ne pas sauter</h4>
                            <p id="warning-text">Avant toute chose, vous devez commander une etude de sol geotechnique G2. Sans ce rapport, aucune entreprise serieuse ne peut vous proposer une solution adaptee. Comptez 1 500 a 3 000 EUR et 2 a 4 semaines de delai.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander un accompagnement</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>


                <div class="guide-links-box" id="liens">
                    <h3>Guides complementaires sur les fondations et la structure</h3>
                    <p>Ces articles approfondissent les sujets directement lies a la reprise en sous-oeuvre :</p>
                    <div class="guide-links-grid">
                        <a href="<?php echo BASE_URL; ?>fondation-puits" class="guide-link-item">Fondations en puits</a>
                        <a href="<?php echo BASE_URL; ?>dosage-beton-fondation" class="guide-link-item">Dosage beton fondation</a>
                        <a href="<?php echo BASE_URL; ?>traitement-humidite" class="guide-link-item">Traitement humidite</a>
                        <a href="<?php echo BASE_URL; ?>assechement-murs-injections" class="guide-link-item">Assechement par injections</a>
                        <a href="<?php echo BASE_URL; ?>chainage-horizontal-mur-parpaing" class="guide-link-item">Chainage horizontal parpaing</a>
                        <a href="<?php echo BASE_URL; ?>rehausser-un-mur-en-parpaing-existant" class="guide-link-item">Rehausser un mur en parpaing</a>
                        <a href="<?php echo BASE_URL; ?>crepi-facade" class="guide-link-item">Crepi facade</a>
                        <a href="<?php echo BASE_URL; ?>ravalement-de-facade" class="guide-link-item">Ravalement de facade</a>
                    </div>
                </div>


                <h2 id="faq">FAQ, Questions frequentes</h2>

                <h3>Peut-on rester dans la maison pendant une reprise en sous-oeuvre ?</h3>
                <p>Ca depend entierement de la technique choisie. L'injection de resine expansive permet generalement de maintenir l'habitabilite — le chantier est propre et rapide. En revanche, les micropieux avec forage interieur ou les puits et plots beton imposent souvent un relogement temporaire, car la zone de travail est poussiereuse, bruyante et les acces sont neutralises pendant plusieurs semaines.</p>

                <h3>Comment savoir si mes fissures necessitent vraiment une reprise en sous-oeuvre ?</h3>
                <p>La premiere chose a faire est de surveiller l'activite des fissures : collez des jauges en platre ou des temoins papier sur chaque fissure et observez pendant deux a trois mois. Si les temoins cassent, le sol travaille encore et une intervention est tres probable. Si rien ne bouge depuis des annees, la maison a peut-etre trouve son equilibre — dans ce cas, un confortement esthetique peut suffire. Dans tous les cas, seul un ingenieur structure peut trancher apres diagnostic.</p>

                <h3>L'assurance peut-elle vraiment payer les travaux de reprise en sous-oeuvre ?</h3>
                <p>Oui, dans un cas bien precis : si votre commune a ete reconnue en etat de catastrophe naturelle apres une secheresse ou un seisme, votre assurance multirisque habitation est obligee d'indemniser les dommages lies au retrait-gonflement des argiles. Contactez votre mairie pour verifier les arretes CatNat publies, puis votre assureur — il a 5 jours ouvres pour missionner un expert apres votre declaration.</p>

                <h3>Quelle est la duree d'une reprise en sous-oeuvre ?</h3>
                <p>La duree varie enormement selon la technique et la surface a traiter. Une injection de resine sur un affaissement localise peut se regler en deux a trois jours. Un chantier complet avec micropieux sur un pavillon entier dure generalement de trois a six semaines, sans compter l'etude de sol prealable qui prend elle-meme deux a quatre semaines. Prevoyez au minimum deux mois entre la decision d'intervenir et la fin effective du chantier.</p>

                <h3>Les reprises en sous-oeuvre concernent-elles aussi les murs de soutenement en pierre ?</h3>
                <p>Oui. Un <a href="https://www.cemarenov.fr/mur-poids-pierre-paris">mur poids en pierre</a> qui se deplace ou se penche peut necessiter une reprise de sa semelle de fondation par micropieux ou injections, de la meme maniere qu'un mur de maison. Si le mur presente un "ventre de boeuf" ou des fissures en escalier, une intervention sur les fondations est souvent prioritaire avant tout rejointoiement.</p>

                <h3>Qu'en est-il des murs en pierre seche : peuvent-ils etre stabilises sans toucher aux fondations ?</h3>
                <p>Un <a href="https://www.cemarenov.fr/mur-pierre-seche">mur en pierre seche</a> s'auto-draine et supporte de legeres deformations sans risque structurel majeur. S'il se deforme, le probleme vient presque toujours du remblai arriere ou du drainage — pas des fondations. Une reconstruction partielle avec correction du drainage suffit generalement, sans reprise en sous-oeuvre.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Renovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'experience sur les chantiers, Philippe accompagne les particuliers sur les travaux de gros oeuvre, de maconnerie et de fondation. Il vous donne ses conseils de terrain sans detour.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Votre maison bouge ? Ne laissez pas trainer.</h3>
                <p>Chaque mois sans intervention sur un tassement actif aggrave les desordres et fait grimper la facture. Demandez un premier avis ou un devis : c'est gratuit et sans engagement.</p>
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
                    <h3 class="sidebar-title">Les plus recents</h3>
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

        if (userAnswers.step2 === 'non') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step3 === 'oui') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Technique recommandee :</strong> L'injection de resine expansive est la solution la plus adaptee a votre situation. Le chantier se deroule en 2 a 3 jours, sans gros terrassement, et vous permet de rester dans votre maison. Demandez plusieurs devis a des entreprises specialisees et verifiez qu'elles s'appuient sur un rapport geotechnique G2.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Technique recommandee :</strong> Avec la possibilite de vous reloger temporairement, vous avez acces a l'ensemble des techniques, y compris les micropieux qui offrent la solution la plus perenne sur les sols tres instables ou profonds. Votre ingenieur structure tranchera selon les conclusions de l'etude G2. Prevoyez un chantier de 3 a 6 semaines.";
        }
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
        'question' => "Peut-on rester dans la maison pendant une reprise en sous-oeuvre ?",
        'answer'   => "Cela depend de la technique choisie. L'injection de resine expansive permet generalement de maintenir l'habitabilite. En revanche, les micropieux avec forage interieur ou les puits et plots beton imposent souvent un relogement temporaire, car la zone de travail est poussiereuse, bruyante et les acces sont neutralises pendant plusieurs semaines."
    ],
    [
        'question' => "Comment savoir si mes fissures necessitent vraiment une reprise en sous-oeuvre ?",
        'answer'   => "La premiere chose a faire est de surveiller l'activite des fissures : collez des jauges en platre ou des temoins papier sur chaque fissure et observez pendant deux a trois mois. Si les temoins cassent, le sol travaille encore et une intervention est tres probable. Dans tous les cas, seul un ingenieur structure peut trancher apres diagnostic."
    ],
    [
        'question' => "L'assurance peut-elle vraiment payer les travaux de reprise en sous-oeuvre ?",
        'answer'   => "Oui, dans un cas bien precis : si votre commune a ete reconnue en etat de catastrophe naturelle apres une secheresse ou un seisme, votre assurance multirisque habitation est obligee d'indemniser les dommages lies au retrait-gonflement des argiles. Contactez votre mairie pour verifier les arretes CatNat publies, puis votre assureur."
    ],
    [
        'question' => "Quelle est la duree d'une reprise en sous-oeuvre ?",
        'answer'   => "La duree varie selon la technique et la surface a traiter. Une injection de resine sur un affaissement localise peut se regler en deux a trois jours. Un chantier complet avec micropieux sur un pavillon entier dure generalement de trois a six semaines, sans compter l'etude de sol prealable qui prend deux a quatre semaines supplementaires."
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
