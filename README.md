# Instructions

PHP 8.0

run composer install
<br>
<br>
# The Bee Game

The objective of this exercise is to create a PHP application that performs the following tasks:
* A web page must be produced as the interface to play the game.
* Styling is not expected nor necessary.
* A button must be present to kick off the process of hitting a random bee.
* Code should be done preferably in PHP, but other languages like JavaScript or Python are
accepted.
<br>
<br>

Specification:
  
Bees: There are three types of bees in this game:
* Queen Bee. The Queen Bee has a lifespan of 100 Hit Points. When the Queen Bee is hit, 8
Hit Points are deducted from her lifespan. If/When the Queen Bee has run out of Hit Points,
All remaining alive Bees automatically run out of hit points. There is only 1 Queen Bee.
* Worker Bee. Worker Bees have a lifespan of 75 Hit Points. When a Worker Bee is hit, 10 Hit
Points are deducted from his lifespan. There are 5 Worker Bees.
* Drone Bee. Drone Bees have a lifespan of 50 Hit Points. When a Drone Bee is hit, 12 Hit
Points are deducted from his lifespan. There are 8 Drone Bees.
<br>
<br>
  
Gameplay:


To play, there must be a button that enables a user to HIT a random bee. The selection of a bee must
be random. When the bees are all dead, the game must be able to reset itself with full life bees for
another round. Constraints:

Hints:
* A hive class is a plus.
* A game manager class should be considered.
* A QueenBee class is a must.