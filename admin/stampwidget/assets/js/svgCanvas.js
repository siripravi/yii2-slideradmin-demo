class SvgEditor {
	constructor(canvas, width=200, height=200) {	  
	  this.canvas = canvas;	  
	  this.temporaryId = SvgEditor.nextAutoIncrementedId;	
	  SvgEditor.nextAutoIncrementedId += 1;
		
		const svgns = "http://www.w3.org/2000/svg";
		let newRect = document.createElementNS(svgns, "rect");

		newRect.setAttribute("x", "0");
		newRect.setAttribute("y", "0");
		newRect.setAttribute("width", "250");
		newRect.setAttribute("height", "250");
		newRect.setAttribute("fill", "none");
		
		canvas.appendChild(newRect);
		
		let circle = document.createElementNS(svgns, "circle");

		circle.setAttribute("cx", "125");
		circle.setAttribute("cy", "125");
		circle.setAttribute("r", "123");		
		circle.setAttribute("fill", "none");
		circle.setAttribute("stroke", "#2f69c2");
		circle.setAttribute("stroke-width", "2");

		canvas.appendChild(circle);
	}
}
SvgEditor.nextAutoIncrementedId = 0;

/*function RoundText(props) {	
    const key = props.data.id,
          title = props.data.titleValue,
		  sta  = props.data.firstValue, 
		  swa  = props.data.secondValue ,
		  rax  = props.data.thirdValue ,
		  flip =  props.data.flip;
               		  
    const arcText = new ArcText(title, sta, swa, 
        "125", "125",rax, rax,"1", flip);
        return (    
            <g  key = {key} fontSize='24' fontStyle='bold' fontFamily='Arial' fill='#345' stroke='none' position='absolute' fontWeight='bold' >
            { 
               arcText.f_svg_text_arc().map(([x,y,r,c]) => {
                       return  <text  transform={`translate(${x}, ${y}) rotate(${r})`}> <tspan lengthAdjust="spacing" className="rtext">{c}</tspan> </text>
               })
             }            
			</g>   
        
        );
}*/
