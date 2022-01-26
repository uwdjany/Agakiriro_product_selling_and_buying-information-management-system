var index=0;
Slider();
function Slider(){
    var i;
    var clas=document.getElementsByClassName("slides");
    for(i=0;i<clas.length;i++){
        clas[i].style.display="none";
    }
    index++;
    if(index>clas.length){
       index=1; 
    }
    clas[index-1].style.display="block";
    setTimeout(Slider,3000);
}