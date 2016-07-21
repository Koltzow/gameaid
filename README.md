# GameAid
Javascript library of 2D game helpers.

# Mapper

Mapper simulates a character freely walking around. Every step is logged. This can be used to generate the base of walkable tiles for you game.

First include the script somewhere before your `</body>`.

```html
<script src="lib/mapper.js" type="text/javascript"></script>
```

Then just create a new instance of Mapper with options (default is shown). 

Pos sets the starting position for your mapper. 

Moves is exact number of total, unique tiles that will be logged. 

Overlap tells the mapper if it can walk freely over previously logged tiles or if it should avoid it. If a mapper i stuck in a spiral it will force itself out. Overlapping tend to generate compact tilemaps, while no overlapping tend to generate more linear routes.

```javascript
var mapper = new Mapper({
	pos: [0,0],
	moves: 10,
	overlap: true
});
```

You can then return a random map array by calling `mapper.run()`.

```javascript
var map = mapper.run();
```

Se mapper in action with the rainbow visualizer located in `examples/mapper`. Drag with your mouse to se overflowing tiles.