# Minchat for YunoHost

[![Integration level](https://dash.yunohost.org/integration/minchat.svg)](https://dash.yunohost.org/appci/app/minchat) ![](https://ci-apps.yunohost.org/ci/badges/minchat.status.svg) ![](https://ci-apps.yunohost.org/ci/badges/minchat.maintain.svg)  
[![Install REPLACEBYYOURAPP with YunoHost](https://install-app.yunohost.org/install-with-yunohost.png)](https://install-app.yunohost.org/?app=REPLACEBYYOURAPP)

*[Lire ce readme en français.](./README_fr.md)*

> *This package allows you to install REPLACEBYYOURAPP quickly and simply on a YunoHost server.  
If you don't have YunoHost, please consult [the guide](https://yunohost.org/#/install) to learn how to install it.*

## Overview

minchat_ynh is a free minimalist chat application packaged for [Yunohost](https://yunohost.org).
It is based on [wojtek77/chat](https://github.com/wojtek77/chat), itself based on [Gabriel Nava's tutorial](http://code.tutsplus.com/tutorials/how-to-create-a-simple-web-based-chat-application--net-5931).

**Shipped version:** 1.0

## Screenshot
![screenshot](https://raw.githubusercontent.com/chtixof/databank/master/minchat_ynh/minchat_ynh_screenshot01.gif)

## Features

- Simple web chat: only requires a browser ; no XMPP application
- No need for users to register. Just need the web address. But optional authorisation control.
- On connection, the page is fed with the messages of the day
- Args are in the URL as *get* arguments, so that you can share the URL or make it a favorite to avoid filling a form.  
Example : `https://yourdomain.org/minchat/?room=Living&name=John`
- Optionaly multi room

## Installation
#### On Yunohost
Via the admin web console, type in: <https://github.com/chtixof/minchat_ynh>  
Or on ssh : `sudo yunohost app install https://github.com/chtixof/minchat_ynh`

Upgrade: `sudo yunohost app upgrade minchat -u https://github.com/chtixof/minchat_ynh`  

#### Otherwise
Download, unzip and just copy the content of the `sources` folder to any folder of your web site.
## Setup
The setup is optional. If you leave it as is, there is a single unnamed room, opened to all users. If you want to customize the access control, edit the file `conf/setup.ini` (if missing, copy it from `conf/sample/setup.ini`). The interesting parameter is `auth` that indicates which user is authorized to which room.

In this example `auth = John:Game,John:Family,Mary:Game,Tim:Family,admin:*,*:Public,*:`,
- `John:Game,John:Family` = John can access the Game room, the Family room 
- `Mary:Game` = Mary can access the Game room 
- `Tim:Family` = Tim can access the Family room 
- `admin:*` = admin can access all rooms
- `*:Public` = everybody can acccess the Public room
- `*:` = everybody  can access the unnamed room

## Hints for users
- The URLs you send are linked or transformed to images when preceeded by a !
- If multiple rooms are allowed by the administrator in the setup.ini, you can have several tabs opened to different rooms in the same browser

## Documentation

 * Official documentation: Link to the official documentation of this app
 * YunoHost documentation: If specific documentation is needed, feel free to contribute.

## YunoHost specific features

#### Multi-user support

Are LDAP and HTTP auth supported?
Can the app be used by multiple users?

#### Supported architectures

* x86-64 - [![Build Status](https://ci-apps.yunohost.org/ci/logs/REPLACEBYYOURAPP%20%28Apps%29.svg)](https://ci-apps.yunohost.org/ci/apps/REPLACEBYYOURAPP/)
* ARMv8-A - [![Build Status](https://ci-apps-arm.yunohost.org/ci/logs/REPLACEBYYOURAPP%20%28Apps%29.svg)](https://ci-apps-arm.yunohost.org/ci/apps/REPLACEBYYOURAPP/)

## Limitations

* Any known limitations.

## Additional information

* Other info you would like to add about this app.

**More info on the documentation page:**  
https://yunohost.org/packaging_apps

## Links

 * Report a bug: https://github.com/YunoHost-Apps/REPLACEBYYOURAPP_ynh/issues
 * App website: Link to the official website of this app.
 * Upstream app repository: Link to the official repository of the upstream app.
 * YunoHost website: https://yunohost.org/

---

## Developer info

Please send your pull request to the [testing branch](https://github.com/YunoHost-Apps/REPLACEBYYOURAPP_ynh/tree/testing).

To try the testing branch, please proceed like that.
```
sudo yunohost app install https://github.com/YunoHost-Apps/REPLACEBYYOURAPP_ynh/tree/testing --debug
or
sudo yunohost app upgrade REPLACEBYYOURAPP -u https://github.com/YunoHost-Apps/REPLACEBYYOURAPP_ynh/tree/testing --debug
```

