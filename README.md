# CFsAPI

a small API that sends anime/hentai images in JSON

[![Discord](https://discordapp.com/api/guilds/138303776170835969/widget.png)](https://discord.gg/rMVju6a)

| [![twitter](https://cdn.discordapp.com/attachments/155726317222887425/252192520094613504/twiter_banner.JPG)](https://twitter.com/nintendoDSgek) | [![discord](https://cdn.discordapp.com/attachments/266240393639755778/281920766490968064/discord.png)](https://discord.gg/rMVju6a)
| --- | --- |
| **Follow me on Twitter.** | **Join my Discord server for help.** |

## other important stuff

data |  filled in |
| --- | --- |
| **host** | **✅**
| **database name** | **❌**
| **username** | **❌**
| **password** | **❌**

### coming soon

- more endpoints
- improved randomness
- better response times

#### FAQ

 Can i help
- yes ofcourse just make a PR

 Will it work on my PC
- i don't recommend using my stuff but only for testing purposes (maybe)


# Requirements:
- webserver (Apache, PHP, MySQL)
- redis

### How to setup for dummy's
with phpstorm (with php in path (or add it in your path)):
    setup composer (be sure it downloads composer.phar)
    and run this command in a terminal in the project directory `php composer.phar install`

download & install composer and after that run this in the project directory
`composer install --optimize-autoloader```


#####setup doctrine (database)
check the parametes in `parameters.yml` and run `php bin\console doctrine:schema:validate` to see if the connections work
if everything works except for the sync error run this to sync it `php bin\console doctrine:schema:update --force`

