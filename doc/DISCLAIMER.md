### Setup

The setup is optional. If you leave it as is, there is a single unnamed room, opened to all users. If you want to customize the access control, edit the file `conf/setup.ini` (if missing, copy it from `conf/sample/setup.ini`). The interesting parameter is `auth` that indicates which user is authorized to which room.

In this example `auth = John:Game,John:Family,Mary:Game,Tim:Family,admin:*,*:Public,*:`,
- `John:Game,John:Family` = John can access the Game room, the Family room 
- `Mary:Game` = Mary can access the Game room 
- `Tim:Family` = Tim can access the Family room 
- `admin:*` = admin can access all rooms
- `*:Public` = everybody can acccess the Public room
- `*:` = everybody  can access the unnamed room

### Hints for users

- The URLs you send are linked or transformed to images when preceeded by a `!`
- If multiple rooms are allowed by the administrator in the `setup.ini`, you can have several tabs opened to different rooms in the same browser.

