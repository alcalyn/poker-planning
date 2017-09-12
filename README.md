Poker Planning
==============

An experimental Poker Planning real-time application.

Realized with [Sandstone](https://github.com/eole-io/sandstone-edition), PHP and websockets.

If you want to learn how to build real-time application with PHP,
websockets and push notifications, this project is a tutorial from this article:

[Creating a poker planning application with PHP and websockets](https://alcalyn.github.io/poker-planning-php-websockets/)

*Are you sure that PHP is not able to use websockets, send push notifications, and make a real-time application ?*


## Install

``` bash
git clone git@github.com:alcalyn/poker-planning.git
cd poker-planning/

make
```

> **Note**: Sometimes you'll need to do either a
> `chown -R {your_user}:{your_group} .`
> or a
> `chmod -R 777 var/*`
> to make it work.


## Usage

Access the front application at: http://0.0.0.0:8580/

And RestApi application:

 - http://0.0.0.0:8480/index-dev.php/_profiler/ Symfony web profiler (only dev mode).
 - http://0.0.0.0:8481 PHPMyAdmin (login: `root` / `root`).
 - `ws://0.0.0.0:8482` Websocket server.

You can use the [Postman collection](poker-planning-postman-collection.json)
to run some predefined API requests calls
(you can call every request once, ordered by the first to the last, to fill your database).

You can create or join a team, wait for your teammates to join, then vote.

Votes are revealed once all users voted.


## License

This library is under [MIT License](LICENSE).
