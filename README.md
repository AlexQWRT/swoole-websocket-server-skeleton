# Swoole websocket server skeleton
## Why?
Just a template for creation websocket server based on PHP 
with Swoole extension
## System requirements
- [`Docker`](https://docs.docker.com/engine/install/)
- [`Docker compose plugin`](https://docs.docker.com/compose/install/)
- [`Make`](https://www.gnu.org/software/make/)
- `Unix-based OS`
## Description
This skeleton contains of PHP container that runs with supervisor
and starts a websocket server on startup. This server contains an example
system of routing messages to clients based on users IDs.
To send a message to user with some userId you need to connect to server with
header `'X-User-Id' => 'some-user-id'` and then add this `'userId'`
to messages that you send in JSON format, like this:
```json
{
  "userId": "b276e36e-7082-467f-b55e-53179e9ae4dc",
  "data": {
    "key": "some value"
  }
}
```
After this, all clients that were connected to the server with
header `'X-User-Id' => 'b276e36e-7082-467f-b55e-53179e9ae4dc'`
will receive the same messages.
## TODO
- [ ] Implement routing system for some actions
- [ ] Implement middlewares for routing
- [ ] ...
## Usage
### Install development build and start server
Execute in the root directory of the project:
```sh
make install
```
### Start server
Execute in the root directory of the project:
```sh
make start
```
### Stop server
Execute in the root directory of the project:
```sh
make stop
```
### Open PHP container terminal
Execute in the root directory of the project:
```sh
make terminal
```
### Other make commands
Execute in the root directory of the project:
```sh
make
```
or
```sh
make help
```
