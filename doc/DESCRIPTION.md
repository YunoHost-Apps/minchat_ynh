Minchat is a free minimalist chat application. It is based on [wojtek77/chat](https://github.com/wojtek77/chat), itself based on [Gabriel Nava's tutorial](http://code.tutsplus.com/tutorials/how-to-create-a-simple-web-based-chat-application--net-5931).

### Features

- Simple web chat: only requires a browser ; no XMPP application.
- No need for users to register. Just need the web address. But optional authorisation control.
- On connection, the page is fed with the messages of the day
- Args are in the URL as *get* arguments, so that you can share the URL or make it a favorite to avoid filling a form.  
Example : `https://__DOMAIN____PATH__/minchat/?room=Living&name=John`
- Optionaly multi room