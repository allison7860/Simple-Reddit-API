// Links
var currentpage = location.href.split("/").slice(-1);
var list = document.getElementsByTagName("li");

for (var x = 0; x < list.length; x++ ) {
    var link = list[x].firstChild.attributes.href.nodeValue;
    if (link == currentpage[0]) {
        list[x].setAttribute('style','color:red');
        // list[x].style["font-weight"] = "bold";
    }
}
