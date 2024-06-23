<!--
Ohart ongi: README hau automatikoki sortu da <https://github.com/YunoHost/apps/tree/master/tools/readme_generator>ri esker
EZ editatu eskuz.
-->

# Minchat YunoHost-erako

[![Integrazio maila](https://dash.yunohost.org/integration/minchat.svg)](https://dash.yunohost.org/appci/app/minchat) ![Funtzionamendu egoera](https://ci-apps.yunohost.org/ci/badges/minchat.status.svg) ![Mantentze egoera](https://ci-apps.yunohost.org/ci/badges/minchat.maintain.svg)

[![Instalatu Minchat YunoHost-ekin](https://install-app.yunohost.org/install-with-yunohost.svg)](https://install-app.yunohost.org/?app=minchat)

*[Irakurri README hau beste hizkuntzatan.](./ALL_README.md)*

> *Pakete honek Minchat YunoHost zerbitzari batean azkar eta zailtasunik gabe instalatzea ahalbidetzen dizu.*  
> *YunoHost ez baduzu, kontsultatu [gida](https://yunohost.org/install) nola instalatu ikasteko.*

## Aurreikuspena

Minchat is a free minimalist chat application. It is based on [wojtek77/chat](https://github.com/wojtek77/chat), itself based on [Gabriel Nava's tutorial](http://code.tutsplus.com/tutorials/how-to-create-a-simple-web-based-chat-application--net-5931).

### Features

- Simple web chat: only requires a browser ; no XMPP application.
- No need for users to register. Just need the web address. But optional authorisation control.
- On connection, the page is fed with the messages of the day
- Args are in the URL as *get* arguments, so that you can share the URL or make it a favorite to avoid filling a form.  
Example : `https://__DOMAIN____PATH__/minchat/?room=Living&name=John`
- Optionaly multi room

**Paketatutako bertsioa:** 2017.05.30~ynh1

## Pantaila-argazkiak

![Minchat(r)en pantaila-argazkia](./doc/screenshots/minchat_ynh_screenshot01.gif)

## :red_circle: Ezaugarri zalantzagarriak

- **Jatorrizko garapena utzita**: Software honek ez du arduradunik. Denborak aurrera egin ahala funtzionatzeari utziko dio, konpondu gabeko segurtasun arazoak izango ditu, etab.

## Dokumentazioa eta baliabideak

- Jatorrizko aplikazioaren kode-gordailua: <https://github.com/wojtek77/chat>
- YunoHost Denda: <https://apps.yunohost.org/app/minchat>
- Eman errore baten berri: <https://github.com/YunoHost-Apps/minchat_ynh/issues>

## Garatzaileentzako informazioa

Bidali `pull request`a [`testing` abarrera](https://github.com/YunoHost-Apps/minchat_ynh/tree/testing).

`testing` abarra probatzeko, ondorengoa egin:

```bash
sudo yunohost app install https://github.com/YunoHost-Apps/minchat_ynh/tree/testing --debug
edo
sudo yunohost app upgrade minchat -u https://github.com/YunoHost-Apps/minchat_ynh/tree/testing --debug
```

**Informazio gehiago aplikazioaren paketatzeari buruz:** <https://yunohost.org/packaging_apps>
