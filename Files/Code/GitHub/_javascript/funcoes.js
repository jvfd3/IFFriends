let valor=0;
function mostraCampo(obj) {
    var select=document.getElementById('Sexo')
    var txt = document.getElementById("Texto")
    txt.style.visibility = (select.value == 'outros') 
    ? "visible"
    : "hidden";
}
startList = function() {
    if (document.all&&document.getElementById) {
    navRoot = document.getElementById("menuDropDown");
    for (i=0; i<navRoot.childNodes.length; i++) {
    node = navRoot.childNodes[i];
    if (node.nodeName=="LI") {
    node.onmouseover=function() {
    this.className+=" over";
      }
      node.onmouseout=function() {
      this.className=this.className.replace
      (" over", "");
       }
       }
      }
     }
    }
window.onload=startList;

//minimizar e maximizar a aba de amigos online
(function($) {
    $(document).ready(function() {
        var $chatbox = $('.chatbox'),
            $chatboxTitle = $('.chatbox__title');
        $chatboxTitle.on('click', function() {
            if(document.getElementById("on").style.height != "85%"){
                valor = document.getElementById("on").style.height;
                document.getElementById("on").style.height = "85%";
            }else{
                
                document.getElementById("on").style.height = valor;
            }
        });
        
    });
})(jQuery);
botao = function() {
var $input = document.getElementById('foto-video'),
    $fileName = document.getElementById('file-name');

$input.addEventListener('change', function(){
  $fileName.textContent = this.value;
});}
window.onload=botao;