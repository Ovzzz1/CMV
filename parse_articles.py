import os
import re

files = [
    "1-hectare-en-m2.php", "avis-genay-facades.php", "bardage-bois-sur-mur-parpaing.php", 
    "chainage-horizontal-mur-parpaing.php", "charpente-1-pan-sur-parpaing.php", "coffrage-pour-fondation.php", 
    "comment-faire-un-toit-en-tuile.php", "construire-barbecue-parpaings.php", "distance-poteau-raidisseur-mur-parpaing.php", 
    "dosage-enduit-ciment-chaux-parpaing.php", "dosage-mortier-batard-faitage.php", "etancheite-mur-parpaing-interieur.php", 
    "fixation-gouttiere-sur-bac-acier-isole.php", "fixation-panneau-solaire-sur-tuile-canal.php", "fondation-garage-20m2.php", 
    "fondation-garage-30m2.php", "fondation-garage-40m2.php", "fondation-garage-50m2.php", "fondation-garage.php", 
    "fondation-pour-muret-de-60-cm-de-hauteur.php", "fondation-pour-terrain-en-pente.php", "mur-parpaing-sans-enduit.php", 
    "mur-pierre-seche.php", "mur-poids-pierre-paris.php", "nettoyage-facade-javel.php", "nettoyer-fientes-oiseaux-crepi.php", 
    "potager-sur-toit.php", "rehausser-un-mur-en-parpaing-existant.php", "toiture-amiante.php", 
    "toiture-commune-sans-copropriete.php", "vocabulaire-architecture-facade.php"
]

for f in files:
    path = os.path.join("blog", f)
    if os.path.exists(path):
        with open(path, "r", encoding="utf-8") as file:
            content = file.read()
            
            title = re.search(r'<title>(.*?)</title>', content, re.IGNORECASE)
            desc = re.search(r'<meta\s+name="description"\s+content="(.*?)"', content, re.IGNORECASE)
            h1 = re.search(r'<h1.*?>(.*?)</h1>', content, re.IGNORECASE | re.DOTALL)
            h2s = re.findall(r'<h2.*?>(.*?)</h2>', content, re.IGNORECASE | re.DOTALL)
            
            print(f"--- {f} ---")
            if title: print(f"TITLE: {title.group(1).strip()}")
            if desc: print(f"DESC: {desc.group(1).strip()}")
            if h1: print(f"H1: {re.sub('<[^<]+>', '', h1.group(1)).strip()}")
            if h2s:
                clean_h2s = [re.sub('<[^<]+>', '', h2).strip() for h2 in h2s]
                print(f"H2: {', '.join(clean_h2s)}")
            print("\n")
