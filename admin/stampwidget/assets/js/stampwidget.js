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
  $("a.tab-toggle").on("click", function () {
    $(".tab-pane").hide();
    $($(this).attr("href")).show();
  });
  $(".tab-toggle").on("click", function () {
    $(".timeline-thumbnail").removeClass("selected");
    $(this).closest("li").addClass("selected");

    var indexs = $(this).closest("li").index();

    $("ol li").not($(this).closest("li")).removeClass("active");

    $("ol")
      .find("li:eq(" + indexs + ")")
      .not($(this).closest("li"))
      .addClass("active");
  });
  $(".tab-pane:empty").each(function () {
    $('.nav-tabs a[href="#' + this.id + '"]')
      .closest("li")
      .hide();
  });
  for (var i = 0; i < layerinfo.length; i++) {   
    drawLayer(layerinfo[i]);
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
$("body").on("change", ".ttext", function () {
  var key = $(this).closest("div.tab-pane").attr("id");
  var layer = findLrIndex(wscript, parseInt(layer));
  layer["text"] = this.value; 
  document.getElementsByClassName("tspacing")[0].value = layer["spacing"];
  //$("form#dynamic-form111").submit();
  drawLayer(layer);
});

$("body").on("change", ".ttype", function () {
  var key = $(this).closest("div.tab-pane").attr("id");
  var layer = findLrIndex(wscript, parseInt(key)); 
  layer["type_id"] = parseInt(this.value);
  layer["rotate"] = 0;
  //$("form#dynamic-form111").submit();
  drawLayer(layer);
});
$("body").on("change", ".tcenterx", function () {
  var clid = $(this).closest("div.tab-pane").attr("id");
  var key = parseInt(clid.substring(1, clid.length));
  var clidx = findLrIndex(wscript, clid);

  layer["centerX"] = this.value;
  layer["centerY"] = this.value;
  // $("form#dynamic-form111").submit();
  drawLayer(layer);
});
$("body").on("change", ".tcentery", function () {
  var key = $(this).closest("div.tab-pane").attr("id");
  var layer = findLrIndex(wscript, parseInt(key));
  layer["centerY"] = this.value;
  //$("form#dynamic-form111").submit();
  drawLayer(layer);
});
$("body").on("change", ".tradiusx", function () {
  var key = $(this).closest("div.tab-pane").attr("id");
  var layer = findLrIndex(wscript, parseInt(key));
  layer["radiusX"] = this.value;
  layer["radiusY"] = this.value;
  //$("form#dynamic-form111").submit();
  drawLayer(layer);
});
$("body").on("change", ".tradiusy", function () {
  var key = $(this).closest("div.tab-pane").attr("id");
  var layer = findLrIndex(wscript, parseInt(layer));
  layer["radiusY"] = this.value;
  drawLayer(layer);
});
$("body").on("change", ".tangles", function () {
  var key = $(this).closest("div.tab-pane").attr("id");
  var layer = findLrIndex(wscript, parseInt(key));
  layer["angleStart"] = this.value;
  drawLayer(layer);
});
$("body").on("change", ".tanglee", function () {
  var key = $(this).closest("div.tab-pane").attr("id");
  var layer = findLrIndex(wscript, parseInt(key));
  layer["angleEnd"] = this.value;
  drawLayer(layer);
});
$("body").on("change", ".trotate", function () {
  var key = $(this).closest("div.tab-pane").attr("id");
  var layer = findLrIndex(wscript, parseInt(key));
  layer["rotate"] = this.value;
  var atext = parseInt(layer["text"]);
  var sa = parseInt(layer["angleStart"]);
  var spacing = parseInt(layer["spacing"]);
  var type = parseInt(layer["type_id"]);
  var rotate = parseInt(layer["rotate"]);
  var rad = parseInt(layer["radiusX"]);
  var cx = parseInt(layer["centerX"]);
  var cy = parseInt(layer["centerY"]);
  const params2 = f_svg_text_arc(
    cx,
    cy,
    rad,
    rad,
    sa,
    spacing,
    atext.length,
    rotate,
    type
  );
  document.getElementById("layer-" + key + "-pathtext").value =
    JSON.stringify(params2);
  $("form#dynamic-form111").submit();
  drawLayer(layer);
});
$("body").on("change", ".tfont", function () {
  var key = $(this).closest("div.tab-pane").attr("id");
  var layer = findLrIndex(wscript, parseInt(key));
  layer["font"] = this.value;
  $("form#dynamic-form111").submit();
  drawLayer(layer);
});
$("body").on("change", ".tfontsz", function () {
  var key = $(this).closest("div.tab-pane").attr("id");
  var layer = findLrIndex(wscript, parseInt(key));
  layer["fontSize"] = this.value;
  //$("form#dynamic-form111").submit();
  drawLayer(layer);
});
$("body").on("change", ".tspacing", function () {
  var key = $(this).closest("div.tab-pane").attr("id");
  var layer = findLrIndex(wscript, parseInt(key));
  layer["spacing"] = this.value;
  let spacing = parseInt(this.value);
  var atext = layer["text"];
  var rotate = parseInt(layer["rotate"]);
  var type = parseInt(layer["type_id"]);
  var rad = parseInt(layer["radiusX"]);
  var cx = parseInt(layer["centerX"]);
  var cy = parseInt(layer["centerY"]);
  var sa;
  switch (type) {
    case 1:
      sa =
        spacing <= 180 ? 180 + (180 - spacing) / 2 : 180 - (spacing - 180) / 2;
      break;
    case 3:
      sa =
        spacing < 180 ? 180 - (180 - spacing) / 2 : 180 - (spacing - 180) / 2;
      break;
  }

  layer["angleStart"] = sa;

  document.getElementById("layer-" + key + "-anglestart").value = sa;
  document.getElementById("layer-" + key + "-rotate-source").value = 0;
  const params2 = f_svg_text_arc(
    cx,
    cy,
    rad,
    rad,
    sa,
    spacing,
    atext.length,
    rotate,
    type
  );
  document.getElementById("layer-" + key + "-pathtext").value =
    JSON.stringify(params2);

  // $("form#dynamic-form111").submit();

  drawLayer(layer);
});
$("body").on("beforeSubmit", "form#dynamic-form111", function () {
  var form = $(this);
  // return false if form still have some validation errors
  console.log(wscript);
  if (form.find(".has-error").length) {
    return false;
  }
  $.ajax({
    url: form.attr("action"),
    type: "post",
    data: form.serialize(),
    success: function (response) {
      console.log(response);
    },
    error: function () {
      console.log("internal server error");
    },
  });
  return false;
});

function download_image() {
  $("form#dynamic-form111").submit(function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
  });
  $.ajax({
    url: "/site/ajax-save-img",
    type: "post",
    data: {
      img: $("#stampDesign").getCanvasImage(),
    },
    success: function (response) {},
    error: function () {
      console.log("internal server error");
    },
  });
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
function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
  var angleInRadians = ((angleInDegrees - 90) * Math.PI) / 180.0;

  return {
    x: centerX + radius * Math.cos(angleInRadians),
    y: centerY + radius * Math.sin(angleInRadians),
  };
}

function describeArc(x, y, radius, startAngle, endAngle) {
  var start = polarToCartesian(x, y, radius, endAngle);
  var end = polarToCartesian(x, y, radius, startAngle);
  var largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";
  var d = [
    "M",
    start.x,
    start.y,
    "A",
    radius,
    radius,
    0,
    largeArcFlag,
    0,
    end.x,
    end.y,
  ].join(" ");
  return d;
}
/*** works for top circle text  ***/
function circPath(x, y, r) {
  return [
    "M",
    x,
    y,
    "m",
    -r,
    "0a",
    r,
    r,
    0,
    1,
    1,
    r * 2,
    "0a",
    r,
    r,
    0,
    1,
    1,
    -r * 2,
    0,
  ].join(" ");
}
function circlePath(cx, cy, r) {
  return (
    "M " +
    cx +
    " " +
    cy +
    " m -" +
    r +
    ", 0 a " +
    r +
    "," +
    r +
    " 0 1,1 " +
    r * 2 +
    ",0 a " +
    r +
    "," +
    r +
    " 0 1,1 -" +
    r * 2 +
    ",0"
  );
}
/*const SVG_XML_HEADER = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>';
			// The default SVG filename in case the data-filename attribute isn't set.
			const DEFAULT_SVG_FILENAME = 'cake.svg';			
			let svg_container = document.querySelector('.svg-container');			
			let svg_image = svg_containepaper.querySelector('.svg-image');			
			let svg_filename = svg_image.getAttribute('data-filename') || DEFAULT_SVG_FILENAME;			
			let svg_code = SVG_XML_HEADER + "\n" + svg_image.innerHTML.trim();
			let download_button = document.querySelector('#svg_download');			
			download_button.addEventListener('click', function (event) {			
			var a = document.createElement('a');			
			a.setAttribute('href', 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent(svg_code));			
			a.setAttribute('download', svg_filename);			
			a.style.display = 'none';			
			document.body.appendChild(a);			
			a.click();			
			document.body.removeChild(a);  
	}); */

const f_matrix_times = ([[a, b], [c, d]], [x, y]) => [
  a * x + b * y,
  c * x + d * y,
];
const f_rotate_matrix = (x) => {
  const cosx = cos(x);
  const sinx = sin(x);
  return [
    [cosx, -sinx],
    [sinx, cosx],
  ];
};

const f_vec_add = ([a1, a2], [b1, b2]) => [a1 + b1, a2 + b2];

const f_svg_text_arc = (cx, cy, rx, ry, sta, swa, tl, rot, type) => {
  var tvals = [];
  var sta = (sta / 180) * pi;
  var dd = (swa / tl / 180) * pi;

  var swa = (swa / 180) * pi;
  swa = swa % (2 * pi);
  const rotMatrix = f_rotate_matrix((rot / 180) * pi);
  for (i = 0; i < tl; i++) {
    const [sX, sY] = f_vec_add(
      f_matrix_times(rotMatrix, [rx * cos(sta), ry * sin(sta)]),
      [cx, cy]
    );
    var r = type == 1 ? (sta * 180) / pi + 90 : (sta * 180) / pi + 270;
    tvals[i] = [sX, sY, r];
    let f = type == 1 ? 1 : -1;
    sta = sta + f * dd;
  }
  return tvals;
};
const f_svg_ellipse_arc = ([cx, cy], [rx, ry], [sta, swa], rot, type) => {
  swa = swa % (2 * pi);
  const rotMatrix = f_rotate_matrix(rot);
  const [sX, sY] = f_vec_add(
    f_matrix_times(rotMatrix, [rx * cos(sta), ry * sin(sta)]),
    [cx, cy]
  );
  const [eX, eY] = f_vec_add(
    f_matrix_times(rotMatrix, [rx * cos(sta + swa), ry * sin(sta + swa)]),
    [cx, cy]
  );
  const fA = swa > pi ? 1 : 0;
  const fS = swa > 0 ? 1 : 0;
  //const fA = ((type == 1) ? 0 : 1);
  // const fS = ((type == 3) ? 0 : 1);
  if (type == 1)
    return [
      " M ",
      sX,
      " ",
      sY,
      " A ",
      rx,
      ry,
      (rot / pi) * 180,
      fA,
      fS,
      eX,
      eY,
    ];
  //return [" M ", sX, " ", sY, " A ", rx, ry, rot / pi * 180, 0, 1, eX, eY];
  if (type == 3)
    return [" M ", sX, " ", sY, " A ", rx, ry, (rot / pi) * 180, 1, 0, eX, eY];
};

function bboxText(svgDocument, string, font, fontSize) {
  var data = document.createTextNode(string);
  var svgElement = document.createElementNS(
    "http://www.w3.org/2000/svg",
    "text"
  );
  data.attr("font-family", font);
  data.attr("font-size", fontSize);
  svgElement.appendChild(data);
  svgDocument.documentElement.appendChild(svgElement);
  var bbox = svgElement.getBBox();
  svgElement.parentNode.removeChild(svgElement);
  return bbox.height;
}
/*function renderedTextSize(string, font, fontSize) {
    var paper = Raphael(0, 0, 0, 0)
    paper.canvas.style.visibility = 'hidden'
    var el = paper.text(0, 0, string)
    el.attr('font-family', font)
    el.attr('font-size', fontSize)
    var bBox = el.getBBox()
    paper.remove()
    return {
        width: bBox.width,
        height: bBox.height
    }
}*/
