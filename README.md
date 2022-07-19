<p style="text-align: center;">
  <img src="https://raw.githubusercontent.com/bemtorres/game-room/develop/public/background_gameroom.png" width="600">
</p>

# GAMEROOM 🎮 🕹️
Primer Sistema Contable <strong>Open Source</strong> para todo tipo de juegos

Crea salas e invita a tus amigos a jugar utlizando como herramienta de gestion GAMEROOM

# ¿Como jugar?

## Sistema General

- Mantendor de usuario
- Carga masiva a través de un archivo excel
- Creación de cupones
- Sistema interno de GR Coins para ingresar a las salas
- Mantendor de Salas
- Trofeos

### 🪪 Sistema Loto 📇

**Hay 10.000 cartones unicos de Loto disponibles**

*Instrucciones:*
- Juga al loto muy fácil, crea una sala e ingresa el costo para entrar.
- Los jugadores podrán ingresar a la sala si cumplen con los requisitos, escogiendo el numero de cartón
- Una vez inicio el **Líder** deberá dictando los números y anotarlos en el panel administrativo del juego
- Los jugadores deberán ir seleccionando el numero si corresponde a su cartón
- Si cumpletas todos los números te aparecerá una opción para reclamar el premio
- El **Líder** verificará y
asignará el lugar que quedaste en la calificación

### 🏦 Sistema de Banco 💳💱

Has querido jugar algún juego de mesa que incluya un banco y no tienes los billetes. Está sala contiene un **microsistema bancarío** que te ayudará a
 - Transferir dinero
 - Solicitar dinero
 - Pagar
 - Ver historial de transacciones
 - Cambiar avatar
 - Cambiar nickname
 - Cambiar GR pass

Full Optimizado para jugar con el Celular

*Instrucciones:*
- Crea una sala e ingresa el costo para entrar.
- Puedes hacer pública la sala y compartir un link para que otras personas se inscriban e ingresen directo al banco
- Eligirás a uno o más de uno de los jugadores como Banquero, el se encargará se enviar dinero a los jugadores
- El Banco cuenta como **$10.000.000** a repartir
- Los jugadores podrán ser este uso de dinero sólo en la sala


## 👀 No es dinero de verdad y queda bajo su responsabilidad el uso de está herramienta 👀


# Repositorio

```shell
git clone https://github.com/bemtorres/game-room
cd game-room

cp .env.example .env
composer install

npm install
npm run prod

php artisan migrate:fresh --seed

php artisan serve
```
## Users

| TIPO  | username  | password  |
|---|---|---|
| Admin  | admin@admin.cl  | 123456  |
| Usuario  | usuario@gameroom.cl | 123456 |

## estamos usando
https://mdbootstrap.com/snippets/
