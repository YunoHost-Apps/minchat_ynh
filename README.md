# minchat_ynh : minchat for Yunohost

minchat_ynh is a free minimalist chat application packaged for [Yunohost](https://yunohost.org).
It is based on [wojtek77/chat](https://github.com/wojtek77/chat), itself based on [Gabriel Nava's tutorial](http://code.tutsplus.com/tutorials/how-to-create-a-simple-web-based-chat-application--net-5931).

## Features

- No need for users to register. Just need the web address.
- On connection, the page is feeded with the 50 last messages.
- Optional *get* arguments to specify the user name and the room.    
Example : `https://yourdomain.org/minchat/?room=Living&name=John`
- Mono room (for now)

## Installation
### On Yunohost
Via the admin web console, type in: <https://github.com/chtixof/minchat_ynh>  
Or on ssh : `sudo yunohost app install https://github.com/chtixof/minchat_ynh`
### Otherwise
Download, unzip and just copy the content of the `sources` folder to any folder of your web site.
## Screen shot
![screenshot](https://raw.githubusercontent.com/chtixof/databank/master/minchat_ynh/minchat_ynh_screenshot01.gif)