var btPlus = document.getElementById('btPlus');
var btMoins = document.getElementById('btMoins');
var nb = document.getElementById('nb');
var cpt = parseInt(nb.innerText);
btPlus.addEventListener('click',function(){
    cpt = cpt+1;
    nb.innerHTML = cpt.toString()
});
btMoins.addEventListener('click',function(){
    cpt = cpt-1;
    nb.innerHTML = cpt.toString()
});

