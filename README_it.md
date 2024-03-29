<!--
N.B.: Questo README è stato automaticamente generato da <https://github.com/YunoHost/apps/tree/master/tools/readme_generator>
NON DEVE essere modificato manualmente.
-->

# Minchat per YunoHost

[![Livello di integrazione](https://dash.yunohost.org/integration/minchat.svg)](https://dash.yunohost.org/appci/app/minchat) ![Stato di funzionamento](https://ci-apps.yunohost.org/ci/badges/minchat.status.svg) ![Stato di manutenzione](https://ci-apps.yunohost.org/ci/badges/minchat.maintain.svg)

[![Installa Minchat con YunoHost](https://install-app.yunohost.org/install-with-yunohost.svg)](https://install-app.yunohost.org/?app=minchat)

*[Leggi questo README in altre lingue.](./ALL_README.md)*

> *Questo pacchetto ti permette di installare Minchat su un server YunoHost in modo semplice e veloce.*  
> *Se non hai YunoHost, consulta [la guida](https://yunohost.org/install) per imparare a installarlo.*

## Panoramica

Minchat is a free minimalist chat application. It is based on [wojtek77/chat](https://github.com/wojtek77/chat), itself based on [Gabriel Nava's tutorial](http://code.tutsplus.com/tutorials/how-to-create-a-simple-web-based-chat-application--net-5931).

### Features

- Simple web chat: only requires a browser ; no XMPP application.
- No need for users to register. Just need the web address. But optional authorisation control.
- On connection, the page is fed with the messages of the day
- Args are in the URL as *get* arguments, so that you can share the URL or make it a favorite to avoid filling a form.  
Example : `https://__DOMAIN____PATH__/minchat/?room=Living&name=John`
- Optionaly multi room

**Versione pubblicata:** 2017.05.30~ynh1

## Screenshot

![Screenshot di Minchat](./doc/screenshots/minchat_ynh_screenshot01.gif)

## Documentazione e risorse

- Repository upstream del codice dell’app: <https://github.com/wojtek77/chat>
- Store di YunoHost: <https://apps.yunohost.org/app/minchat>
- Segnala un problema: <https://github.com/YunoHost-Apps/minchat_ynh/issues>

## Informazioni per sviluppatori

Si prega di inviare la tua pull request alla [branch di `testing`](https://github.com/YunoHost-Apps/minchat_ynh/tree/testing).

Per provare la branch di `testing`, si prega di procedere in questo modo:

```bash
sudo yunohost app install https://github.com/YunoHost-Apps/minchat_ynh/tree/testing --debug
o
sudo yunohost app upgrade minchat -u https://github.com/YunoHost-Apps/minchat_ynh/tree/testing --debug
```

**Maggiori informazioni riguardo il pacchetto di quest’app:** <https://yunohost.org/packaging_apps>
