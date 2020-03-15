## Setup
You can setup this sample manually or use [Vagrant](https://www.vagrantup.com/) to automatically set up a development environment for you.

## Manual
* Clone repo ```git clone {{repo name}}```
* Create your .env file from the example file: ```cp .env.example .env```
* Install composer dependencies: ```composer install```
* Run the following commands:
* ```php artisan key:generate```  
* Server: run ```php artisan serve```
* Browse to ```localhost:8000```

### The main page looks:
![Log](https://github.com/Minakshi-Chidrawar/two_player_card_game/blob/master/images/main.png)  

#### If clicked button Start Game:
![Log](https://github.com/Minakshi-Chidrawar/two_player_card_game/blob/master/images/startGame.png)  

#### If click Next Turn:
![Log](https://github.com/Minakshi-Chidrawar/two_player_card_game/blob/master/images/makeTurns.png)  

#### All cards are over, the winner will be displayed:
![Log](https://github.com/Minakshi-Chidrawar/two_player_card_game/blob/master/images/winner.png)  
