function Mapper(options) {

	this.pos = (options !== void 0 && options.pos !== void 0)?options.pos:[0,0];
	this.moves = (options !== void 0 && options.moves !== void 0)?options.moves:1;
	this.overlap = (options.overlap !== undefined)?options.overlap:true;
}

Mapper.prototype.run = function () {

	var map = [];
	
	for (var i = 0; i < this.moves; i++) {
		
		var newPos = this.pos;	
		var counter = 0;
		
		while (newPos === this.pos) {
		
			newPos = this.pos;
			var overlapped = false;
						
			var dir = Math.floor(Math.random()*(3+1));
			
			if(dir === 0){
				newPos = [this.pos[0], this.pos[1]-1]; //up
			} else if(dir === 1){
				newPos = [this.pos[0]+1, this.pos[1]]; //right
			} else if(dir === 2){
				newPos = [this.pos[0], this.pos[1]+1]; //down
			} else if(dir === 3){
				newPos = [this.pos[0]-1, this.pos[1]]; //left
			}
			
			
			for (var m = 0; m < map.length; m++) {
				if (map[m][0] === newPos[0] && map[m][1] === newPos[1]){
									
					if(!this.overlap){
						newPos = this.pos;
					} else {
						overlapped = true;
					}
										
				}
			}
			
			if(overlapped){
				this.moves++;
				break;
			}
			
			counter++;
			
			if(counter > 100){
				this.moves++;
				
				var randDir = Math.floor(Math.random() * (3 - 0 + 1)) + 0;
				
				if(randDir === 0){
					newPos = [this.pos[0], this.pos[1]-1]; //up
				} else if(randDir === 1){
					newPos = [this.pos[0]+1, this.pos[1]]; //right
				} else if(randDir === 2){
					newPos = [this.pos[0], this.pos[1]+1]; //down
				} else if(randDir === 3){
					newPos = [this.pos[0]-1, this.pos[1]]; //left
				}
				
				break;
			}
						
		}
		
		this.pos = newPos;		
		map.push(this.pos);
		
	}
	
	console.log(this.moves + ' moves');

	return map;

};