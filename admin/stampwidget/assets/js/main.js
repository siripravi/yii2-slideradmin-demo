var root = document.body
var count= 0
var Splash = {
    view: function() {
        return m("a", {href: "#!/hello"}, "Enter!")
    }
}
var increment = function(){
	m.request({
		method: "PUT",
		url: "//rem-rest-api.herokuapp.com/api/tutorial/1",
		body: {count : count + 1},
		withCredentials:true
		
	}).then(function(data){
		count = parseInt(data.count);
	})
}
var Hello = {
    view: function() {
        return [
		m("h1", "Click the below button!"),
	m("button",{onclick:increment}, count + ' clicks')
		]
    }
}
m.route(root, "/splash", {
    "/splash": Splash,
    "/hello": Hello,
})
