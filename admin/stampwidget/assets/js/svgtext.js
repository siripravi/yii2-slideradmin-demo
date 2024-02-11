(function ($) {
  "use strict";
  var canvas = document.getElementById("RoundText");
  new SvgEditor(canvas, 250, 250);

  function RoundText(data) {
    const key =data.id,
      title =data.titleValue,
      sta =data.firstValue,
      swa =data.secondValue,
      rax =data.thirdValue,
      flip =data.flip;
    var tpath = "";
    const arcText = new ArcText(
      title,
      sta,
      swa,
      "125",
      "125",
      rax,
      rax,
      "1",
      flip
    );

    tpath +=
      `<g  key = ${key} fontSize='24' fontStyle='bold' fontFamily='Arial' fill='#345' stroke='none' position='absolute' fontWeight='bold' >`;
      arcText
        .f_svg_text_arc()
        .map(([x, y, r, c]) => {
          tpath += `<text  transform= "translate(${x}, ${y}) rotate(${r})"> <tspan lengthAdjust="spacing" className="rtext">{c}</tspan> </text>`;
        });

    tpath += "</g>  ";
    return tpath;
  }

  $("body").on("change", ".ttype", function () {
    var key = $(this).closest("div.tab-pane").attr("id");
    var layer = findLrIndex(wscript, parseInt(key)); 
    layer["type_id"] = parseInt(this.value);
    layer["rotate"] = 0;
    //$("form#dynamic-form111").submit();
    drawLayer(layer);
  });

  
function drawLayer(layerinfo) {  
  // editCText(layerinfo);

}
})(jQuery);
