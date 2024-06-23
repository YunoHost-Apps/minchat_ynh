<!--
Este archivo README esta generado automaticamente<https://github.com/YunoHost/apps/tree/master/tools/readme_generator>
No se debe editar a mano.
-->

# Minchat para Yunohost

[![Nivel de integración](https://dash.yunohost.org/integration/minchat.svg)](https://dash.yunohost.org/appci/app/minchat) ![Estado funcional](https://ci-apps.yunohost.org/ci/badges/minchat.status.svg) ![Estado En Mantención](https://ci-apps.yunohost.org/ci/badges/minchat.maintain.svg)

[![Instalar Minchat con Yunhost](https://install-app.yunohost.org/install-with-yunohost.svg)](https://install-app.yunohost.org/?app=minchat)

*[Leer este README en otros idiomas.](./ALL_README.md)*

> *Este paquete le permite instalarMinchat rapidamente y simplement en un servidor YunoHost.*  
> *Si no tiene YunoHost, visita [the guide](https://yunohost.org/install) para aprender como instalarla.*

## Descripción general

Minchat is a free minimalist chat application. It is based on [wojtek77/chat](https://github.com/wojtek77/chat), itself based on [Gabriel Nava's tutorial](http://code.tutsplus.com/tutorials/how-to-create-a-simple-web-based-chat-application--net-5931).

### Features

- Simple web chat: only requires a browser ; no XMPP application.
- No need for users to register. Just need the web address. But optional authorisation control.
- On connection, the page is fed with the messages of the day
- Args are in the URL as *get* arguments, so that you can share the URL or make it a favorite to avoid filling a form.  
Example : `https://__DOMAIN____PATH__/minchat/?room=Living&name=John`
- Optionaly multi room

**Versión actual:** 2017.05.30~ynh1

## Capturas

![Captura de Minchat](./doc/screenshots/minchat_ynh_screenshot01.gif)

## :red_circle: Características no deseables

- **Upstream not maintained**: This software is not maintained anymore. Expect it to break down over time, be exposed to unfixed security breaches, etc.

## Documentaciones y recursos

- Repositorio del código fuente oficial de la aplicación : <https://github.com/wojtek77/chat>
- Catálogo YunoHost: <https://apps.yunohost.org/app/minchat>
- Reportar un error: <https://github.com/YunoHost-Apps/minchat_ynh/issues>

## Información para desarrolladores

Por favor enviar sus correcciones a la [`branch testing`](https://github.com/YunoHost-Apps/minchat_ynh/tree/testing

Para probar la rama `testing`, sigue asÍ:

```bash
sudo yunohost app install https://github.com/YunoHost-Apps/minchat_ynh/tree/testing --debug
o
sudo yunohost app upgrade minchat -u https://github.com/YunoHost-Apps/minchat_ynh/tree/testing --debug
```

**Mas informaciones sobre el empaquetado de aplicaciones:** <https://yunohost.org/packaging_apps>
