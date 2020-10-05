

var set = document.getElementById('SpecificationsPane');
var info = set.getElementsByClassName('InfoPaneColumn');

var params = new URLSearchParams(window.location.search);
const range = params.get('Range');

let content = document.getElementById('OverviewPane');
// content = document.getElementById('OverviewPane');

for(var i = 0 ; i < content.childNodes.length; i++){
    str = content.childNodes[i].innerText;
    if(str=='' || content.childNodes[i].tagName == 'H1'){
        content.removeChild(content.childNodes[i]);     
    }
}

let titles = [];
let specs = [];

for(var j = 0; j < info.length; j++) {
    var areas = info[j].getElementsByTagName('font');
    for(var i = 0; i < areas.length; i++) {
        if(areas[i].color == '#F58303'){
          titles.push(areas[i].innerHTML);
        } else{
           specs.push(areas[i].innerHTML);
        }
      }
}

let specification = [];

for ( var i = 0; i < titles.length; i++){
    {
        specification.push({
            "title" : titles[i],
            "value" : specs[i].split("<br>")
        });
    }
}

for(var i = 0; i < pictureSelectorArray.length; i++){
    pictureSelectorArray[i]= pictureSelectorArray[i].replace("../", "https://www.proac-loudspeakers.com/");
}
 
var mainimg = document.querySelector("#SpeakerCloseUpInner > img").src;
mainimg = mainimg.replace("../", "https://www.proac-loudspeakers.com/");

let description = document.getElementById('SpeakerDescription');
let output = {};

var t = setTimeout(function(){
    output = {
        title : description.getElementsByTagName('h1')[0].innerText,
        subtitle : description.getElementsByTagName('p')[0].innerText,
        content : content.innerHTML,
        specification : specification,
        gallery: pictureSelectorArray,
        featured: mainimg,
        range : range
    };
    
    console.log(output);

}, 500); 

