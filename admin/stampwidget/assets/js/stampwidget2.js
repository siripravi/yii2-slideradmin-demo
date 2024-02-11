var layerinfo = wscript;
console.log(wscript);
const cos = Math.cos;
const sin = Math.sin;
const pi = Math.PI;
const abs = Math.abs;
var unit = 250 / 100;

const stPath =
  "M16,22.375L7.116,28.83l3.396-10.438l-8.883-6.458l10.979,0.002L16.002,1.5l3.391,10.434h10.981l-8.886,6.457l3.396,10.439L16,22.375L16,22.375z";

$(function () { 
  $(".tab-pane:empty").each(function () {
    $('.nav-tabs a[href="#' + this.id + '"]')
      .closest("li")
      .hide();
  });
  for (var i = 0; i < layerinfo.length; i++) {   
    //drawLayer(layerinfo[i]);
  }
 
  const position = { x: 0, y: 0 };
  var flip = $("#flip").val();
  $('button[data-bs-toggle="tab"]').on("shown.bs.tab", function (e) {
    var id = $(e.target).attr("id");
    var len = id.length;
    var lid = "L" + id.substring(0, len - 4);   
    $("canvas").setLayer(lid, {
      bringToFront: true,
    });
  });
});

function drawLayer(layerinfo) {  
  editCText(layerinfo);
}

function flipText() {
  var flip = false;
  var checkBox = document.getElementById("flip");
  if (checkBox.checked == true) {
    flip = true;
  } else {
    flip = false;
  }
}
function editCText(linfo) {
  console.log("EDIT TEXT:", linfo);
  var atext = linfo["text"];
  var pathId = "P" + linfo["id"];
  var textId = "#T" + linfo["id"];
  var fName = linfo["font"];
  var startAngle = parseInt(linfo["angleStart"]);
  var rotate = parseInt(linfo["rotate"]);
  var centerX = parseInt(linfo["centerX"]);
  var centerY = centerX;
  var radiusX = parseInt(linfo["radiusX"]);
  var radiusY = radiusX;
  var spacing = parseInt(linfo["spacing"]);
  var fSize = parseInt(linfo["fontSize"]);
  var type = parseInt(linfo["type_id"]);

  //align text on top horizontally
  if (type == 1)
    startAngle =
      spacing <= 180 ? 180 + (180 - spacing) / 2 : 180 - (spacing - 180) / 2;
  if (type == 3)
    startAngle =
      spacing < 180 ? 180 - (180 - spacing) / 2 : 180 - (spacing - 180) / 2;     

  linfo["angleStart"] = startAngle;
  console.log("st : " + linfo["angleStart"]);
  const canvas = document.getElementById("h-o-l-ds");
  //var bbox = renderedTextSize( "W",fName,fSize );
  //console.log("text height: "+bbox.height);
  //radiusX = radiusY -= bbox.height;

  /*const params = f_svg_ellipse_arc([
							centerX,
							centerY
						], [
							radiusX,
							radiusY
						], [
							startAngle / 180 * pi,
							spacing / 180 * pi
						], rotate / 180 * pi,type);
			*/
  const params2 = f_svg_text_arc(
    centerX,
    centerY,
    radiusX,
    radiusY,
    startAngle,
    spacing,
    atext.length,
    rotate,
    type
  );
 
  const arca = document.getElementById("RangText" + linfo["id"]);
  arca.setAttribute("font-size", fSize + "px");
  linfo["pathText"] = JSON.stringify(params2);
 
  for (var j = 0; j < params2.length; j++) {
    let txt = document.getElementById("txt" + linfo["id"] + j);
    var tsp = document.getElementById("tsp" + linfo["id"] + j);
    //  console.log(params2[i][0]+" - "+ params2[i][1]);
    //let txt = document.createElementNS("http://www.w3.org/2000/svg", "text");
    let tr = "translate(" + params2[j][0] + "," + params2[j][1] + ")";
    let rt = "rotate(" + params2[j][2] + " )";
    txt.setAttribute("transform", tr + " " + rt);
   
    tsp.setAttribute("lengthAdjust", "spacing");
  }
 
}

function findLrIndex(arr, key) {
  var result = arr.find((x) => x.id === key);
  /*for(var i = 0; i < arr.length; i++) {
   if(arr[i]["id"] === key) {
     return i;
   }
}*/
  console.log("RESULT:", key);
  return result;
}