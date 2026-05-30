<?php
// published: 2026-05-31 10:00
/**
 * quel-disjoncteur-pour-pompe-a-chaleur-16-kw.php
 * Article : Quel disjoncteur pour une pompe à chaleur de 16 kW ?
 * Site : cemarenov.fr — Date : 2026-05-31
 */

$d = [

'meta' => [
    'title'        => 'Quel disjoncteur pour une pompe à chaleur de 16 kW ?',
    'category'     => 'travaux',
    'slug'         => 'quel-disjoncteur-pour-pompe-a-chaleur-16-kw',
    'image'        => 'https://www.cemarenov.fr/image/quel-disjoncteur-pour-pompe-a-chaleur-16-kw-1.webp',
    'excerpt'      => 'PAC 16 kW : disjoncteur 25 A courbe D triphasé + différentiel type A 30 mA. Calcul complet, tableau récap et normes NF C 15-100.',
    'date'         => '2026-05-31',
    'reading_time' => 4,
],

'hero' => [
    'breadcrumb' => 'Disjoncteur PAC 16 kW',
    'tags'       => ['Pompe à chaleur', 'Disjoncteur', 'Triphasé', 'NF C 15-100'],
    'h1'         => '<h1>Quel disjoncteur pour une pompe à chaleur de 16 kW :<br><span class="h1-accent">Calcul, courbe D et différentiel type A</span></h1>',
],

'intro' => 'Pour une PAC de 16 kW, le monophasé est insuffisant : 16 000 / 230 = 69,6 A, au-dessus du plafond Enedis de 63 A. <strong>L\'alimentation triphasée 400 V est obligatoire.</strong> Le calcul donne I = 16 000 / (1,732 × 400) = 23,1 A — soit un disjoncteur 25 A courbe D triphasé (3P+N), avec un différentiel type A 30 mA et un câble 6 mm² minimum sur circuit dédié.',

'tldr' => [
    ['label' => 'Triphasé obligatoire', 'text' => '16 kW dépasse la limite Enedis 63 A en monophasé — alimentation triphasée 400 V indispensable.'],
    ['label' => '25 A courbe D', 'text' => 'Calcul : I = 16 000 / (1,732 × 400) = 23,1 A → calibre normalisé supérieur = 25 A, courbe D pour tolérer la pointe de démarrage.'],
    ['label' => 'Différentiel type A 30 mA', 'text' => 'Pour détecter les courants de fuite non sinusoïdaux générés par les variateurs de fréquence de la PAC.'],
    ['label' => 'Circuit dédié', 'text' => 'NF C 15-100 obligatoire, câble 6 mm² minimum depuis le tableau électrique.'],
],

'toc' => [
    ['anchor' => '#calibre', 'label' => '1. Quel calibre de disjoncteur pour 16 kW ? Monophasé vs triphasé'],
    ['anchor' => '#courbe-d', 'label' => '2. Pourquoi impérativement une courbe D sur une PAC ?'],
    ['anchor' => '#differentiel', 'label' => '3. Quelle protection différentielle pour une PAC ?'],
    ['anchor' => '#recapitulatif', 'label' => '4. Récapitulatif complet pour une PAC 16 kW'],
    ['anchor' => '#disjoncteur-saute', 'label' => '5. Pourquoi le disjoncteur de la PAC saute-t-il ?'],
    ['anchor' => '#faq', 'label' => 'FAQ, Questions fréquentes'],
],

'content' => <<<HTML
<h2 id="calibre">Quel calibre de disjoncteur pour 16 kW ? Monophasé vs triphasé</h2>

<h3>Pourquoi le monophasé ne suffit pas à 16 kW</h3>

<p>En monophasé 230 V, la formule est simple : I = P / U, soit 16 000 / 230 = <strong>69,6 A</strong>. Or, l'abonnement monophasé maximal proposé par Enedis en France est limité à 63 A (environ 14,5 kW). Un tel abonnement ne peut pas alimenter une PAC de 16 kW — on atteint physiquement la limite du réseau monophasé résidentiel.</p>

<p>Cela signifie qu'une PAC de 16 kW nécessite impérativement une alimentation <strong>triphasée 400 V (3P+N)</strong>. Si votre installation est actuellement monophasée, un passage au triphasé via Enedis est à prévoir avant toute installation — ce point est non-négociable.</p>

<h3>Calcul triphasé : formule et calibre résultant</h3>

<p>En triphasé 400 V, la formule devient : <strong>I = P / (√3 × U)</strong>, soit :</p>

<p>I = 16 000 / (1,732 × 400) = <strong>23,1 A</strong></p>

<p>On prend toujours le calibre normalisé immédiatement supérieur à la valeur calculée. Ici, le calibre normalisé au-dessus de 23,1 A est <strong>25 A</strong>.</p>

<div class="table-wrapper"><table class="content-table">
<thead>
<tr><th>Puissance PAC</th><th>Tension</th><th>Intensité calculée</th><th>Calibre disjoncteur</th></tr>
</thead>
<tbody>
<tr><td>≤ 3 500 W</td><td>Monophasé 230 V</td><td>≤ 15,2 A</td><td>16 A</td></tr>
<tr><td>≤ 4 500 W</td><td>Monophasé 230 V</td><td>≤ 19,6 A</td><td>20 A</td></tr>
<tr><td>≤ 7 200 W</td><td>Monophasé 230 V</td><td>≤ 31,3 A</td><td>32 A</td></tr>
<tr><td>≤ 14 400 W</td><td>Triphasé 400 V</td><td>≤ 20,8 A</td><td>25 A</td></tr>
<tr><td><strong>16 000 W</strong></td><td><strong>Triphasé 400 V</strong></td><td><strong>23,1 A</strong></td><td><strong>25 A ✓</strong></td></tr>
<tr><td>≤ 20 000 W</td><td>Triphasé 400 V</td><td>≤ 28,9 A</td><td>32 A</td></tr>
</tbody>
</table></div>

<p>Pour une PAC de 16 kW, le verdict est donc : <strong>disjoncteur 25 A courbe D, triphasé 3 pôles + neutre (3P+N)</strong>.</p>

<h2 id="courbe-d">Pourquoi impérativement une courbe D sur une PAC ?</h2>

<p>Au moment du démarrage, le compresseur de la pompe à chaleur génère une <strong>pointe de courant de démarrage</strong> qui peut atteindre 5 à 10 fois l'intensité nominale, pendant quelques dizaines de millisecondes. Ce pic est inévitable — c'est inhérent au fonctionnement de tout moteur électrique sous tension.</p>

<p>Un disjoncteur <strong>courbe C</strong> a un seuil de déclenchement magnétique à <strong>5 à 10 fois l'intensité nominale</strong>. Sur une PAC de 25 A, ce seuil correspond à 125–250 A. Lors du démarrage, la pointe peut dépasser ce seuil et déclencher le disjoncteur à chaque mise en route — sans qu'il y ait de vrai défaut électrique.</p>

<p>Un disjoncteur <strong>courbe D</strong> repousse ce seuil à <strong>10 à 20 fois l'intensité nominale</strong> (250–500 A pour 25 A). Il tolère la pointe de démarrage sans se déclencher, tout en assurant la même protection thermique et magnétique contre les surcharges réelles et les courts-circuits. C'est la courbe adaptée à tous les équipements à moteur : PAC, compresseurs, pompes de circulation. La norme NF C 15-100 impose cette courbe D pour ce type d'installation.</p>

<h2 id="differentiel">Quelle protection différentielle pour une PAC ?</h2>

<p><strong>Type A obligatoire</strong> (et non pas type AC). Une PAC contient des convertisseurs électroniques (variateurs de fréquence, alimentations à découpage) qui génèrent des courants de fuite à composantes continues pulsées. Un différentiel type AC est aveugle à ces courants — il ne détecte que les défauts sinusoïdaux purs. Le type A détecte les deux. Installer un type AC sur une PAC, c'est une protection incomplète et non conforme.</p>

<p><strong>Sensibilité 30 mA</strong>. C'est la valeur standard pour la protection des personnes en contexte résidentiel. Un différentiel 300 mA ne protège pas contre les contacts indirects dans ce contexte.</p>

<p>En pratique : interrupteur différentiel <strong>type A, 30 mA, 40 A ou 63 A</strong> (selon le calibre de la ligne principale), installé en amont du disjoncteur 25 A courbe D de la PAC.</p>

<h2 id="recapitulatif">Ce qu'il faut pour une PAC 16 kW : récapitulatif complet</h2>

<div class="table-wrapper"><table class="content-table">
<thead>
<tr><th>Élément</th><th>Spécification</th><th>Pourquoi</th></tr>
</thead>
<tbody>
<tr><td>Alimentation</td><td>Triphasé 400 V (3P+N)</td><td>16 kW dépasse la limite monophasé 63 A</td></tr>
<tr><td>Disjoncteur</td><td>25 A courbe D, 3P+N</td><td>Calibre calculé + tolérance pointe démarrage</td></tr>
<tr><td>Différentiel</td><td>Type A, 30 mA</td><td>Courants de fuite non sinusoïdaux de la PAC</td></tr>
<tr><td>Section câble</td><td>6 mm² minimum</td><td>Résistance adaptée au calibre 25 A</td></tr>
<tr><td>Circuit</td><td>Dédié depuis le tableau électrique</td><td>Norme NF C 15-100 obligatoire</td></tr>
</tbody>
</table></div>

<p>Pour la section de câble, la règle générale est 6 mm² jusqu'à 30–35 m pour un circuit 25 A. Au-delà, ou si la PAC est éloignée du tableau, passer à 10 mm² pour éviter les chutes de tension. Vérifiez toujours avec un électricien agréé la longueur réelle de votre installation.</p>

<h2 id="disjoncteur-saute">Pourquoi le disjoncteur de la PAC saute-t-il ?</h2>

<p>Si votre disjoncteur déclenche régulièrement après installation, trois causes sont à investiguer dans cet ordre.</p>

<ul class="custom-list">
<li><strong>Calibre sous-dimensionné ou mauvaise courbe.</strong> C'est la cause la plus fréquente sur les installations récentes. Un disjoncteur 20 A là où il faut 25 A, ou une courbe C au lieu d'une courbe D, provoque des déclenchements au démarrage. Solution : remplacer par le bon calibre courbe D.</li>
<li><strong>Surcharge de l'abonnement électrique.</strong> Si d'autres appareils fonctionnent simultanément et dépassent la puissance souscrite, c'est le disjoncteur général qui saute. Solution : vérifier la puissance souscrite et envisager une augmentation via Enedis.</li>
<li><strong>Composant défectueux dans la PAC.</strong> Un compresseur en fin de vie ou un court-circuit interne provoque une surintensité permanente — le disjoncteur joue alors son rôle de protection. Solution : faire diagnostiquer la PAC par un technicien agréé avant de changer le disjoncteur.</li>
</ul>
HTML,

'faq' => [
    ['q' => 'Peut-on installer une PAC 16 kW en monophasé ?', 'a' => 'Non. En monophasé 230 V, 16 kW correspond à 69,6 A — au-dessus du plafond de 63 A d\'Enedis pour les abonnements résidentiels. Une PAC de cette puissance exige impérativement une alimentation triphasée 400 V.'],
    ['q' => 'Quel calibre exact pour une PAC de 16 kW triphasée ?', 'a' => 'I = 16 000 / (1,732 × 400) = 23,1 A. Le calibre normalisé au-dessus est 25 A. Le disjoncteur à installer est donc un 25 A courbe D triphasé 3P+N.'],
    ['q' => 'Différentiel type A ou type AC pour une pompe à chaleur ?', 'a' => 'Type A obligatoirement. Les variateurs de fréquence et alimentations à découpage des PAC génèrent des courants de fuite à composante continue pulsée — non détectables par un différentiel type AC. Le type A protège contre tous types de défauts résiduels.'],
    ['q' => 'Quelle section de câble pour une PAC 16 kW ?', 'a' => '6 mm² minimum pour un circuit 25 A sur des distances courtes (jusqu\'à 30–35 m). Au-delà, ou si la chute de tension est problématique, passer à 10 mm². Vérifiez toujours avec un électricien la longueur réelle de votre installation.'],
],

'author_phrase' => 'Philippe, électricien RGE, rappelle que la courbe D est le point le plus souvent négligé lors de l\'installation d\'une PAC — choisir une courbe C fait déclencher le disjoncteur à chaque démarrage du compresseur, sans qu\'il y ait de défaut réel dans l\'installation.',

'conclusion' => [
    'title' => 'Triphasé, 25 A courbe D, type A 30 mA : aucune place à l\'improvisation.',
    'text'  => 'Chaque spécification découle d\'un calcul ou d\'une contrainte normative précise. Une installation mal calibrée, c\'est soit des déclenchements intempestifs, soit une protection insuffisante des personnes.',
    'cta'   => 'Obtenir un devis gratuit',
],

'guide_links_css' => false,

]; // fin $d

include __DIR__ . '/_article-template.php';
