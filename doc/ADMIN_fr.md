### Installation

La configuration est facultative. Si vous la laissez tel quel, il reste une seule salle sans nom, ouverte à tous les utilisateurs. Si vous souhaitez personnaliser le contrôle d'accès, éditez le fichier `__INSTALL_DIR__/conf/setup.ini` (s'il est manquant, copiez-le depuis `__INSTALL_DIR__/conf/sample/setup.ini`). Le paramètre intéressant est `auth` qui indique quel utilisateur est autorisé à accéder à quelle salle.

Dans cet exemple `auth = John:Game,John:Family,Mary:Game,Tim:Family,admin:*,*:Public,*:` :

- `John:Game,John:Family` = John peut accéder à la salle de jeux, à la salle familiale
- `Mary:Game` = Mary peut accéder à la salle de jeux
- `Tim:Family` = Tim peut accéder à la salle familiale
- `admin:*` = l'administrateur peut accéder à toutes les salles
- `*:Public` = tout le monde peut accéder à la salle publique
- `*:` = tout le monde peut accéder à la salle sans nom

### Conseils pour les utilisateurs

- Les URL que vous envoyez sont liées ou transformées en images lorsqu'elles sont précédées d'un `!`
- Si plusieurs salles sont autorisées par l'administrateur dans le fichier `setup.ini`, vous pouvez avoir plusieurs onglets ouverts sur différentes salles dans le même navigateur.