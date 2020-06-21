######################
### Exotic Animals ###
######################

Github-Link: https://github.com/ic19b065/BIC4ExoticAnimals.git

### Inhalte/Funktionen ###

# List Animals #
Animals -> List
Hier wird eine Liste aller Animals ausgegeben.
Es gibt ebenfalls die Möglichkeit, ein Animal zu bearbeiten. Durch klicken des "Edit"-Button kommt man auf die entsprechende Seite.
Durch klicken des "Show"-Button kann ein einzelens Animal angezeigt werden.

# Create Animal #
Animals -> Create
Hier kann ein neues Animal angelegt werden.

# Search Animal #
Animal -> Search
Hier kann nach Animals gesucht werden.

# List Species #
Species -> List
Hier wird eine Liste aller Species ausgegeben.
Es gibt ebenfalls die Möglichkeit, eine Species zu bearbeiten. Durch klicken des "Edit"-Button kommt man auf die entsprechende Seite.
Durch klicken des "Show"-Button kann eine einzelne Species angezeigt werden.

### Technologie ###

(Backend implementiert mit Laravel)
Frontend implementiert mit VueJS
Registrierung der Components in app.js

# implementierte VUE-Components #
Animals.vue - abrufen und auflisten aller Animals
CreateAnimal.vue - anlegen eines neuen Animal
CreateSpecies.vue - anlegen einer neuen Species
SearchAnimal.vue - suchen nach einem Animal (laden aller Animals und anschließendes durchinterieren und suchen)
ShowAnimal.vue - Anzeigen eines einzelnen Animal
ShowSpecies.vue - Anzeigen einer einzelnen Species
Species.vue - abrufen und auflisten aller Species

# Views - Components #

animal
create view: CreateAnimal.vue
edit view:	CreateAnimal.vue (mit isEditable und Übergabe des entsprechenden Animal als currentAnimal)
index view: Animals.vue
search view: SearchAnimal.vue
show view: ShowAnimal.vue

species
create view: CreateSpecies.vue
edit view: CreateSpecies.vue (mit isEditable und Übergabe der entsprechenden Species als currentSpecies)
index view: Species.vue
show view: ShowSpecies.vue
