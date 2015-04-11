# minchat_ynh : minchat for Yunohost

minchat_ynh is a free minimalist chat application packaged for [Yunohost](https://yunohost.org).
It is based on [wojtek77/chat](https://github.com/wojtek77/chat), itself based on [Gabriel Nava's tutorial](http://code.tutsplus.com/tutorials/how-to-create-a-simple-web-based-chat-application--net-5931).

## Features

- Simple web chat: only requires a browser ; no XMPP application
- No need for users to register. Just need the web address. But optional authorisation control.
- On connection, the page is feeded with the messages of the day
- Args are in the URL as *get* arguments, so that you can share the URL or make it a favorite to avoid filling a form.  
Example : `https://yourdomain.org/minchat/?room=Living&name=John`
- Optionaly multi room

## Installation
### On Yunohost
Via the admin web console, type in: <https://github.com/chtixof/minchat_ynh>  
Or on ssh : `sudo yunohost app install https://github.com/chtixof/minchat_ynh`
### Otherwise
Download, unzip and just copy the content of the `sources` folder to any folder of your web site.
## Setup
The setup is optional. If you leave it as is, there is a single unnamed room, opened to all users. If you want to customize the access control, edit the file `conf/setup.ini`. The interesting parameter is `auth` that indicates which user is authorized to which room.

In this example `auth = John:Game,Mary:Game,John:Family,Tim:Family,admin:,:Public`,
- John can access the Game room, the Family room and the Public room
- Mary can access the Game room and the Public room
- Tim can access the Family room and the Public room
- admin can access all rooms
- other users can only acccess the Public room

## Screen shot
![screenshot](https://raw.githubusercontent.com/chtixof/databank/master/minchat_ynh/minchat_ynh_screenshot01.gif)