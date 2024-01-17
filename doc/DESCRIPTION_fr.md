Minchat est une application de chat minimaliste. Elle est basé sur [wojtek77/chat](https://github.com/wojtek77/chat), elle-même basé sur [le tutoriel de Gabriel Nava](http://code.tutsplus.com/tutorials/how-to-create- une-simple-application-de-chat-basée sur le Web--net-5931).

### Caractéristiques

- Chat Web simple : nécessite uniquement un navigateur ; pas d'application XMPP.
- Pas besoin de s'inscrire pour les utilisateurs. J'ai juste besoin de l'adresse Web. Mais contrôle d'autorisation facultatif.
- À la connexion, la page est alimentée avec les messages du jour
- Les arguments sont dans l'URL en tant qu'arguments *get*, afin que vous puissiez partager l'URL ou en faire un favori pour éviter de remplir un formulaire.
Exemple : `https://__DOMAIN____PATH__/minchat/?room=Living&name=John`
- En option multi-pièces