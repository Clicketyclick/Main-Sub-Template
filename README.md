# Main-Sub-Template
Screen template to process sub processes

(Relativly) simple mockup for testing sub processes on a web page.

In this example you press a button and a sub process (`loop.php`) will run and dynamicly update fields on the main screen using Javascript.

The main screen is build using:
1. A screen layout
2. Screen elements to insert into layout template
3. Naming elements and localisation

all included into the main page `index.php`.

![Sequence Diagram](http://www.plantuml.com/plantuml/proxy?src=https://raw.githubusercontent.com/Clicketyclick/Main-Sub-Template/master/doc/sequence.puml)

## Screen

![Wireframe](http://www.plantuml.com/plantuml/proxy?src=https://raw.githubusercontent.com/Clicketyclick/Main-Sub-Template/master/doc/screen.puml)


```console
├───cfg		General configuration
├───css		Style Sheets
├───doc		Documentation
├───js		Javascripts
├───lib		PHP libraries
├───scr		Screen templates
└───src		Source of sub processes
```

Dir| File | Description
---|---|---
.\		|favicon.ico		|FAV icon
.\		|index.php			|Index file
.\		|LICENSE			|License
.\		|README.md			|This file
.\		|run.cmd			|Start php webserver
.\		|version.txt		|Version number Semantic
||
cfg\	|config.json		|General configuration
|
css\	|scr_layout.css		|Styling
|
doc\	|screen.puml		|
doc\	|sequence.puml		|
|
js\		|screen.js			|Screen Javascripts
|
lib\	|getGitInfo.php		|Extract info from .git
|
scr\	|scr_data.json		|Naming elements and localisation
scr\	|scr_elements.php	|Screen elements to insert into layout template
scr\	|scr_layout.php		|Screen layout
|
src\	|loop.php			| Sub process example

