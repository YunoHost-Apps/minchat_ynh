<!--
NOTA: Este README foi creado automáticamente por <https://github.com/YunoHost/apps/tree/master/tools/readme_generator>
NON debe editarse manualmente.
-->

# Minchat para YunoHost

[![Nivel de integración](https://dash.yunohost.org/integration/minchat.svg)](https://dash.yunohost.org/appci/app/minchat) ![Estado de funcionamento](https://ci-apps.yunohost.org/ci/badges/minchat.status.svg) ![Estado de mantemento](https://ci-apps.yunohost.org/ci/badges/minchat.maintain.svg)

[![Instalar Minchat con YunoHost](https://install-app.yunohost.org/install-with-yunohost.svg)](https://install-app.yunohost.org/?app=minchat)

*[Le este README en outros idiomas.](./ALL_README.md)*

> *Este paquete permíteche instalar Minchat de xeito rápido e doado nun servidor YunoHost.*  
> *Se non usas YunoHost, le a [documentación](https://yunohost.org/install) para saber como instalalo.*

## Vista xeral

Minchat is a free minimalist chat application. It is based on [wojtek77/chat](https://github.com/wojtek77/chat), itself based on [Gabriel Nava's tutorial](http://code.tutsplus.com/tutorials/how-to-create-a-simple-web-based-chat-application--net-5931).

### Features

- Simple web chat: only requires a browser ; no XMPP application.
- No need for users to register. Just need the web address. But optional authorisation control.
- On connection, the page is fed with the messages of the day
- Args are in the URL as *get* arguments, so that you can share the URL or make it a favorite to avoid filling a form.  
Example : `https://__DOMAIN____PATH__/minchat/?room=Living&name=John`
- Optionaly multi room

**Versión proporcionada:** 2017.05.30~ynh1

## Capturas de pantalla

![Captura de pantalla de Minchat](./doc/screenshots/minchat_ynh_screenshot01.gif)

## :red_circle: Debes considerar

- **Upstream not maintained**: This software is not maintained anymore. Expect it to break down over time, be exposed to unfixed security breaches, etc.

## Documentación e recursos

- Repositorio de orixe do código: <https://github.com/wojtek77/chat>
- Tenda YunoHost: <https://apps.yunohost.org/app/minchat>
- Informar dun problema: <https://github.com/YunoHost-Apps/minchat_ynh/issues>

## Info de desenvolvemento

Envía a túa colaboración á [rama `testing`](https://github.com/YunoHost-Apps/minchat_ynh/tree/testing).

Para probar a rama `testing`, procede deste xeito:

```bash
sudo yunohost app install https://github.com/YunoHost-Apps/minchat_ynh/tree/testing --debug
ou
sudo yunohost app upgrade minchat -u https://github.com/YunoHost-Apps/minchat_ynh/tree/testing --debug
```

**Máis info sobre o empaquetado da app:** <https://yunohost.org/packaging_apps>
