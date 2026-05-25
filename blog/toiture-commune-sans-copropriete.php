<?php
/**
 * toiture-commune-sans-copropriete.php
 * Article: Toiture Commune Sans Copropriété : Droits, Frais et Travaux (Guide Légal 2026)
 */

$article_meta = [
    'title'        => 'Toiture Commune Sans Copropriété : Droits, Frais et Travaux',
    'category'     => 'immobilier',
    'image'        => '/image/toiture-commune-sans-copropriete1.webp',
    'excerpt'      => 'Sans syndic ni règlement de copropriété, gérer un toit partagé peut vite tourner au casse-tête. Pourtant, le Code civil fixe des règles claires sur qui paie quoi, et comment forcer un voisin récalcitrant à assumer sa part.',
    'date'         => '2026-03-31',
    'reading_time' => 9,
];

require_once dirname(__DIR__) . '/functions.php';

$page_title       = $article_meta['title'];
$page_description = $article_meta['excerpt'];

$current_cat   = $article_meta['category'];
$current_url   = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category      = get_category($current_cat);
$other_cats    = get_other_categories($current_cat);
$cat_articles  = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles  = array_slice($cat_articles, 0, 10);
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
                <span>Toiture commune sans copropriété</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">#Toiture</span>
                <span class="article-tag">#Indivision</span>
                <span class="article-tag">#Travaux</span>
                <span class="article-tag">#DroitCivil</span>
            </div>

            <h1>Toiture Commune Sans Copropriété : Droits, Frais & Travaux</h1>

            <div class="article-meta-header" style="flex-wrap: wrap; gap: 15px;">
                <a href="<?php echo BASE_URL; ?>philippe" class="author-badge-top">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                    <div class="author-badge-text">
                        Par <strong>Philippe</strong>
                        <span>Expert Couverture & Droit de l'Habitat</span>
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
                Je vois ça toutes les semaines sur mes chantiers : des maisons de ville divisées en deux, des habitations mitoyennes de village, ou des petits immeubles anciens partagés entre deux propriétaires. Tout va bien jusqu'au jour où une tuile s'envole ou une fuite apparaît. Là, c'est la panique. Sans syndic ni règlement de copropriété, qui doit payer la facture du couvreur ? Heureusement, même sans copropriété officielle, le Code civil impose des règles strictes sur la gestion de l'indivision et la répartition des coûts.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        En Bref : L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Régime applicable :</strong> Sans syndic, la toiture partagée relève de <strong>l'indivision légale</strong> (art. 815 du Code civil) et non de la loi de 1965 sur la copropriété.</li>
                        <li><strong>Répartition des frais :</strong> Les charges se divisent <strong>au prorata de la surface occupée</strong> par chaque propriétaire, pas forcément à 50/50.</li>
                        <li><strong>Règle de vote :</strong> L'entretien courant se décide à <strong>la majorité des 2/3 des droits</strong>. Une rénovation complète exige <strong>l'unanimité</strong>.</li>
                        <li><strong>En cas d'urgence :</strong> Vous pouvez agir seul (fuite, tempête) et exiger le remboursement de la quote-part du voisin a posteriori.</li>
                        <li><strong>Dernier recours :</strong> Si le voisin bloque des travaux indispensables, le tribunal judiciaire peut l'y contraindre.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Indivision, mitoyenneté ou servitude : comment définir votre toit partagé ?</li>
                        <li>Entretien et travaux : qui paie quoi et comment calculer sa part ?</li>
                        <li>Les 5 étapes pour organiser des travaux avec son voisin</li>
                        <li>Que faire si le voisin refuse de payer ou bloque les réparations ?</li>
                        <li>Transformer sa toiture commune (Velux, surélévation, solaire)</li>
                        <li>Foire Aux Questions (FAQ)</li>
                    </ul>
                </div>

                <h2 id="definition">Indivision, mitoyenneté ou servitude : comment définir votre toit partagé ?</h2>

                <p>Oubliez tout de suite le terme de "partie commune". Juridiquement, cette notion n'existe que pour les immeubles soumis à la loi de 1965 sur la copropriété. Si vous n'avez pas de syndic, votre toiture relève du droit civil classique. Il faut donc lire votre acte de vente chez le notaire pour identifier dans laquelle de ces trois cases vous vous trouvez.</p>

                <img src="<?php echo BASE_URL; ?>image/toiture-commune-sans-copropriete1.webp" alt="Vue d'une toiture commune partagée entre deux maisons mitoyennes" loading="lazy">
                <p class="img-caption">Une toiture commune sans syndic : un régime encadré par le Code civil, pas par la loi de 1965.</p>

                <h3>L'indivision (la règle par défaut)</h3>
                <p>Si la toiture a été construite d'un seul bloc pour couvrir l'ensemble du bâtiment, avec une charpente porteuse unique et un faîtage continu, elle appartient à tous les propriétaires. C'est le régime de l'indivision légale (régi par l'article 815 du Code civil). Le toit est un ouvrage commun, et toutes les décisions de réparation doivent se prendre ensemble.</p>

                <h3>La mitoyenneté et le mur séparatif</h3>
                <p>Attention à ne pas tout confondre. La mitoyenneté concerne le plus souvent le mur porteur qui sépare vos deux maisons. Sur le toit, la couverture (les tuiles, les ardoises ou la volige) située strictement au-dessus de votre surface habitable reste généralement une partie privative. Vous payez pour vos tuiles, votre voisin paie pour les siennes. Seuls les éléments à cheval (le chéneau central, le faîtage) sont mitoyens.</p>

                <h3>Comment savoir si sa toiture est mitoyenne ?</h3>
                <p>Ne vous fiez pas juste au coup d'œil depuis la rue. Pour avoir une certitude juridique, il faut remonter à la source : l'acte notarié de division, vos titres de propriété successifs ou l'historique cadastral du bâti. En cas de doute absolu sur la limite séparative ou si les documents sont muets, seul un géomètre-expert peut trancher en réalisant un bornage.</p>

                <h3>Les servitudes (tour d'échelle et surplomb)</h3>
                <p>Votre toiture est 100% à vous, mais le seul moyen d'y accéder pour la réparer est de poser un échafaudage dans la cour du voisin ? C'est ce qu'on appelle la servitude de "tour d'échelle". La loi vous donne un droit de passage temporaire pour réaliser des travaux indispensables. De la même manière, la servitude d'égout régit le droit de faire s'écouler les eaux pluviales de votre toit vers une gouttière mitoyenne.</p>

                <h2 id="frais">Entretien et travaux : qui paie quoi et comment calculer sa part ?</h2>

                <p>C'est la question qui fâche. La règle d'or consiste à séparer ce qui est privatif de ce qui est commun. Si vous voulez isoler vos combles ou changer vos fenêtres de toit, c'est pour votre pomme. En revanche, si la charpente commune pourrit ou si le faîtage menace de s'effondrer, la facture se partage.</p>

                <h3>La répartition au prorata de la surface (Article 815-10)</h3>
                <p>Beaucoup de gens pensent qu'une toiture partagée à deux se paie systématiquement à 50/50. C'est faux. Sauf mention contraire explicite dans votre acte de vente, les charges se divisent selon vos droits dans l'indivision. En clair : vous payez proportionnellement à la surface habitable que vous occupez sous le toit, tel que défini par <a href="https://www.legifrance.gouv.fr/codes/article_lc/LEGIARTI000006432430" rel="nofollow" target="_blank">l'article 815-10 du Code civil</a>.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Propriétaire</th>
                                <th>Surface sous la toiture</th>
                                <th>Quote-part</th>
                                <th>Sur une facture de 15 000 €</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Voisin A</strong> (maison principale)</td>
                                <td>60 m²</td>
                                <td><strong>60 %</strong></td>
                                <td><strong>9 000 €</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Voisin B</strong> (petite extension)</td>
                                <td>40 m²</td>
                                <td><strong>40 %</strong></td>
                                <td><strong>6 000 €</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td>100 m²</td>
                                <td>100 %</td>
                                <td><strong>15 000 €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <style>
                .schema-repartition {
                    background: #f8fafc;
                    border: 1px solid #e2e8f0;
                    border-radius: 12px;
                    padding: 24px;
                    margin: 30px 0;
                    font-family: system-ui, -apple-system, sans-serif;
                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
                }
                .schema-header {
                    text-align: center;
                    margin-bottom: 24px;
                }
                .schema-total-badge {
                    display: inline-block;
                    background: #1e293b;
                    color: white;
                    padding: 8px 16px;
                    border-radius: 20px;
                    font-weight: 600;
                    font-size: 1.1em;
                    margin-bottom: 8px;
                }
                .schema-bar-container {
                    display: flex;
                    height: 28px;
                    border-radius: 14px;
                    overflow: hidden;
                    margin-bottom: 24px;
                    box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
                }
                .schema-bar-60 {
                    width: 60%;
                    background: #3b82f6;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-weight: bold;
                    font-size: 0.9em;
                }
                .schema-bar-40 {
                    width: 40%;
                    background: #f59e0b;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-weight: bold;
                    font-size: 0.9em;
                }
                .schema-details {
                    display: flex;
                    gap: 20px;
                }
                .schema-card {
                    flex: 1;
                    background: white;
                    border-radius: 8px;
                    padding: 16px;
                    border-top: 4px solid;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                }
                .schema-card.voisin-a {
                    border-color: #3b82f6;
                }
                .schema-card.voisin-b {
                    border-color: #f59e0b;
                }
                .schema-card h4 {
                    margin: 0 0 12px 0;
                    font-size: 1.05em;
                    color: #0f172a;
                }
                .schema-stat {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 8px;
                    font-size: 0.95em;
                    color: #475569;
                }
                .schema-result {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 12px;
                    padding-top: 12px;
                    border-top: 1px dashed #cbd5e1;
                    font-weight: 700;
                    font-size: 1.1em;
                    color: #0f172a;
                }
                @media (max-width: 600px) {
                    .schema-details {
                        flex-direction: column;
                    }
                }
                </style>

                <div class="schema-repartition">
                    <div class="schema-header">
                        <div class="schema-total-badge">Coût Total des Travaux : 15 000 €</div>
                        <p style="margin: 0; color: #64748b; font-size: 0.9em;">Répartition calculée selon la surface sous toiture (100 m² au total)</p>
                    </div>
                    
                    <div class="schema-bar-container">
                        <div class="schema-bar-60">60%</div>
                        <div class="schema-bar-40">40%</div>
                    </div>

                    <div class="schema-details">
                        <div class="schema-card voisin-a">
                            <h4>Voisin A (Maison Principale)</h4>
                            <div class="schema-stat"><span>Surface :</span> <strong>60 m²</strong></div>
                            <div class="schema-stat"><span>Quote-part légale :</span> <strong>60%</strong></div>
                            <div class="schema-result"><span>Montant à régler :</span> <span style="color: #3b82f6;">9 000 €</span></div>
                        </div>
                        
                        <div class="schema-card voisin-b">
                            <h4>Voisin B (Extension)</h4>
                            <div class="schema-stat"><span>Surface :</span> <strong>40 m²</strong></div>
                            <div class="schema-stat"><span>Quote-part légale :</span> <strong>40%</strong></div>
                            <div class="schema-result"><span>Montant à régler :</span> <span style="color: #f59e0b;">6 000 €</span></div>
                        </div>
                    </div>
                </div>
                <p class="img-caption">La répartition se fait au prorata de la surface, pas automatiquement à 50/50 comme beaucoup le croient.</p>

                <h3>Règle de majorité : unanimité ou 2/3 des droits ?</h3>
                <p>Il y a une nuance de taille introduite par <a href="https://www.legifrance.gouv.fr/codes/article_lc/LEGIARTI000006432378" rel="nofollow" target="_blank">l'article 815-3 du Code civil</a>. Pour des actes d'administration simples (entretien courant, remplacement régulier de tuiles cassées, nettoyage de la gouttière), l'accord des propriétaires détenant au moins les 2/3 des droits indivis suffit. Par contre, pour un changement complet de la toiture, une modification de sa forme ou la vente du bâti, l'unanimité de tous les propriétaires est strictement obligatoire.</p>

                <blockquote class="article-blockquote">
                    💡 <strong>Exemple concret :</strong> Si vous détenez 60&nbsp;% des droits et votre voisin 40&nbsp;%, vous pouvez seul décider d'un remplacement de gouttière (entretien courant) car vous dépassez les 2/3. En revanche, pour changer la totalité de la couverture, il vous faut son accord obligatoire.
                </blockquote>

                <h3>La convention écrite : le document indispensable</h3>
                <p>Ne signez jamais le devis de l'entreprise avant d'avoir sécurisé le paiement avec vos voisins. Rédigez un document simple (la convention d'indivision temporaire) qui liste : l'entreprise retenue, la nature des travaux, la date prévue, et surtout la répartition financière au centime près. Chaque propriétaire doit la signer. C'est votre seule assurance si l'un d'eux refuse de payer sa part une fois les échafaudages montés.</p>

                <img src="<?php echo BASE_URL; ?>image/toiture-commune-sans-copropriete3.webp" alt="Signature d'une convention écrite entre voisins avant des travaux de toiture commune" loading="lazy">
                <p class="img-caption">Une convention écrite signée avant les travaux est la seule vraie protection contre les impayés.</p>

                <h2 id="etapes">Les 5 étapes pour organiser des travaux de toiture avec son voisin</h2>

                <p>Faire des travaux lourds sans l'encadrement d'un syndic demande de la méthode. On ne lance pas un chantier de couverture sur une simple poignée de main.</p>

                <ul class="custom-list">
                    <li><strong>Le diagnostic professionnel :</strong> Faites venir un artisan couvreur pour constater l'état des noues, du bois et de la zinguerie.</li>
                    <li><strong>La mise en concurrence :</strong> Demandez 2 à 3 devis distincts en demandant à l'entreprise de séparer les lignes privatives (remplacement d'un Velux) et les lignes communes (réfection de la charpente).</li>
                    <li><strong>Le vote :</strong> Organisez une réunion formelle avec vos voisins pour choisir le devis.</li>
                    <li><strong>La convention :</strong> Mettez l'accord par écrit et signez-le avant tout commencement des travaux.</li>
                    <li><strong>Les démarches urbanisme :</strong> Déposez la déclaration préalable de travaux à la mairie si les travaux modifient l'aspect extérieur.</li>
                </ul>

                <h2 id="litige">Que faire si le voisin refuse de payer ou bloque les réparations ?</h2>

                <p>Le grand classique : vous habitez au dernier étage et vous subissez des infiltrations. Le propriétaire du rez-de-chaussée est bien au sec, ne se sent pas concerné et refuse de payer sa part des réparations de la toiture commune. Voici comment débloquer la situation, en gradant les options du plus souple au plus radical.</p>

                <h3>Urgence (fuite, tempête) : pouvez-vous agir et payer seul ?</h3>
                <p>Oui, si la situation met le bâtiment en péril immédiat (fuite grave qui inonde votre salon, tuiles arrachées par le vent). <a href="https://www.legifrance.gouv.fr/codes/article_lc/LEGIARTI000006432368" rel="nofollow" target="_blank">L'article 815-2 du Code civil</a> vous autorise à prendre les mesures urgentes de conservation. Vous pouvez faire intervenir un couvreur en urgence, avancer les frais, puis exiger légalement le remboursement de la quote-part de votre voisin. Pensez à bien documenter le sinistre (photos horodatées, constat d'huissier) avant l'intervention.</p>

                <blockquote class="article-blockquote">
                    💡 <strong>Le conseil de Philippe :</strong> Même en urgence, envoyez un SMS ou un e-mail à votre voisin <em>avant</em> de lancer les travaux. Ce message daté prouve que vous l'avez prévenu et que vous n'avez pas agi en douce. Un simple "Je t'informe que je fais appel à un couvreur ce matin en urgence suite à la fuite, tu trouveras le devis en PJ" suffit à cadrer la situation.
                </blockquote>

                <h3>Recours amiable : mise en demeure et conciliation</h3>
                <p>Si ce n'est pas une urgence vitale mais de l'entretien lourd (la toiture fatigue et il faut la changer), l'escalade doit être progressive.</p>
                <ul class="custom-list">
                    <li>Envoyez d'abord une <strong>lettre recommandée avec accusé de réception (LRAR)</strong> factuelle comprenant les devis et rappelant à votre voisin ses obligations d'indivisaire.</li>
                    <li>En cas de silence ou de refus, saisissez le <strong>conciliateur de justice</strong> de votre mairie (démarche gratuite, et obligatoire avant de saisir le tribunal pour les litiges inférieurs à 5 000 €).</li>
                </ul>

                <h3>Saisir le juge pour forcer les travaux (Article 815-5)</h3>
                <p>Si le voisin s'entête et que son refus d'agir met en péril la toiture et la structure de l'immeuble, le dernier recours est juridique. Vous pouvez saisir le tribunal judiciaire en vous appuyant sur <a href="https://www.legifrance.gouv.fr/codes/article_lc/LEGIARTI000006433219" rel="nofollow" target="_blank">l'article 815-5 du Code civil</a>. Le juge pourra vous autoriser à réaliser les travaux malgré le blocage de l'autre propriétaire, et ce dernier sera condamné à payer sa part.</p>

                <img src="<?php echo BASE_URL; ?>image/toiture-commune-sans-copropriete4.webp" alt="Infiltration d'eau dans un plafond suite à un défaut de toiture commune non entretenue" loading="lazy">
                <p class="img-caption">Une fuite non traitée engage la responsabilité civile du propriétaire qui bloque les réparations.</p>

                <h2 id="transformation">Transformer sa toiture commune (Velux, surélévation, solaire)</h2>

                <p>Installer des <a href="<?php echo BASE_URL; ?>panneaux-photovoltaiques" style="text-decoration: underline;">panneaux solaires</a> ou créer une fenêtre de toit pour aménager vos combles vous tente ? Attention. Même si vous financez l'intégralité du matériel et de la pose, vous touchez à la structure commune (la charpente) et à l'aspect extérieur d'un bien indivis. L'accord écrit et unanime de tous les copropriétaires de la toiture est une obligation légale absolue, au même titre que l'autorisation d'urbanisme de votre mairie. Passer en force expose votre installation à une remise en état aux frais.</p>

                <h2 id="faq">Foire Aux Questions (FAQ)</h2>

                <h3>Quelle est la différence entre indivision et copropriété pour un toit ?</h3>
                <p>La copropriété fonctionne avec un règlement formel, la tenue d'assemblées générales, des appels de charges réguliers et l'élection d'un syndic. L'indivision est un état de fait régi par défaut par le Code civil, sans gestionnaire désigné ni fonds de travaux pré-établi. C'est nettement plus souple, mais aussi plus exposé aux blocages en cas de conflit.</p>

                <h3>Faut-il une déclaration préalable à la mairie pour des travaux sur toit partagé ?</h3>
                <p>Oui, absolument. Le fait d'être sans syndic de copropriété ne vous dispense pas du code de l'urbanisme. Dès lors que vous modifiez l'aspect extérieur du toit (changement de couleur de tuiles, création d'ouvertures, surélévation), une déclaration préalable de travaux (DP) en mairie est obligatoire. Pour une réfection à l'identique (mêmes matériaux, même couleur), aucune autorisation n'est requise.</p>

                <h3>Peut-on vendre sa part de toiture indivise sans l'accord du voisin ?</h3>
                <p>Non directement. L'indivision impose d'abord un droit de préemption aux co-indivisaires : si vous souhaitez céder vos droits, votre voisin doit être informé en priorité. Ce n'est qu'en cas de refus qu'un tiers pourra racheter vos droits. Vendre sans respecter cette procédure expose la vente à une annulation.</p>

                <h3>Mon assurance habitation couvre-t-elle les dégâts d'une toiture commune ?</h3>
                <p>Votre assurance multirisque habitation (MRH) couvre les dégâts des eaux <em>chez vous</em> causés par une fuite de toiture. En revanche, la responsabilité civile de votre voisin (s'il est propriétaire de la partie qui fuit) est couverte par sa propre MRH. Si la toiture est réellement commune (indivision), c'est souvent la garantie "recours entre voisins" des deux assureurs qui prend le relais. Déclarez le sinistre aux deux compagnies simultanément.</p>

            </div><div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Couverture & Droit de l'Habitat</span>
                    <p>Couvreur de métier reconverti en conseiller juridique de l'habitat, Philippe décortique les litiges de toiture partagée pour aider les propriétaires à faire valoir leurs droits sans passer par un avocat.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Protégez votre toit et vos droits</h3>
                <p>Gérer une toiture partagée sans syndic, c'est gérable, à condition de connaître les textes et de ne jamais laisser traîner un désaccord. Identifiez votre régime juridique (indivision ou mitoyenneté), calculez votre quote-part au prorata de la surface, et mettez chaque accord par écrit avant de lancer les travaux. En cas de blocage persistant, le Code civil vous donne les outils pour agir.</p>
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
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name'] ?? 'Maison / Rénovation'); ?></h3>
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
// --- Schema.org Structured Data ---
require_once dirname(__DIR__) . '/schema-data.php';

$faq_schema = [
    [
        'question' => "Quelle est la différence entre indivision et copropriété pour un toit ?",
        'answer'   => "La copropriété fonctionne avec un règlement formel, des assemblées générales, des charges et un syndic. L'indivision est un état de fait régi par défaut par le Code civil (art. 815 et suivants), sans gestionnaire désigné ni fonds de travaux pré-établi."
    ],
    [
        'question' => "Faut-il une déclaration préalable à la mairie pour des travaux sur toit partagé ?",
        'answer'   => "Oui, dès lors que les travaux modifient l'aspect extérieur du toit (changement de matériaux ou de couleur, création d'ouvertures, surélévation). Une réfection à l'identique ne requiert aucune autorisation."
    ],
    [
        'question' => "Peut-on agir seul en cas d'urgence sur une toiture commune ?",
        'answer'   => "Oui. L'article 815-2 du Code civil autorise tout indivisaire à prendre seul les mesures nécessaires à la conservation du bien en cas d'urgence. Il peut ensuite réclamer le remboursement de la quote-part du voisin."
    ],
    [
        'question' => "Comment forcer un voisin à participer aux travaux de toiture commune ?",
        'answer'   => "En cas de refus persistant et de risque pour la structure du bâtiment, l'article 815-5 du Code civil permet de saisir le tribunal judiciaire pour obtenir une autorisation de travaux malgré le blocage de l'autre propriétaire."
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
