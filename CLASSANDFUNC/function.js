<!--
function ckLogIn(){
	if ((document.forms['Login'].elements['user'].value != '')&&(document.forms['Login'].elements['pass'].value != '')){
		document.getElementById('ACT').disabled = false;
	}else{
		document.getElementById('ACT').disabled = true;
	}
}

function chgImgF(){
	if ( document.forms['chgImg'].elements['pics'].value != '' ){
		document.getElementById('ACT').disabled = false;
	}else{
		document.getElementById('ACT').disabled = true;
	}
}

function chgSelTxt(nForm,nMaster,nSlave,num,diff){
	cDiv=document.forms[nForm+num].elements[nMaster+num].value;
	cTar=document.forms[nForm+num].elements[nSlave+num];

	cTar.options.length=0;
	cTar.options[0]=new Option('','');
	if (cDiv!='') {
       for(var i = 0; i < contenuto[cDiv+'Num'];i++){
          cTar.options[i+1]=new Option(contenuto[diff+cDiv+i],contenuto[cDiv+i]);
       }
    }
}

function categoryOrd(questo){

	tDiv = document.getElementById('div'+questo);
	tNew = document.forms['modORD'].elements['new'+questo].selectedIndex;
	tOld = document.forms['modORD'].elements['old'+questo].value;

	if ( tNew == tOld ) return;

    var su = true;
	var diff = tNew-tOld;
    var i = 0; var jj = 0;
	if (tNew < tOld ){su = false; diff = tOld-tNew;} 

	if (su){
		for(i=0;i<datiCategory['num'];i++){
			if  ((tOld < i)&&(i <= tNew)){
                for(jj=0;jj<datiCategory['num'];jj++){
				    if (i == document.forms['modORD'].elements['new'+datiCategory[jj]].selectedIndex){
                        document.forms['modORD'].elements['new'+datiCategory[jj]].selectedIndex--;
				        document.forms['modORD'].elements['old'+datiCategory[jj]].value--;
                        document.getElementById('div'+datiCategory[jj]).style.top = (parseInt(document.getElementById('div'+datiCategory[jj]).style.top)-altDiv) + 'px';
                    }
                }
            }
		}
        document.forms['modORD'].elements['new'+questo].selectedIndex++;
        tDiv.style.top = (parseInt(tDiv.style.top)+((diff+1)*altDiv)) + 'px';
	}else{
		for(i=(datiCategory['num']-1);i > -1;i--){
			if  ((tOld > i)&&(i >= tNew)){
                for(jj=0;jj<datiCategory['num'];jj++){
				    if (i == document.forms['modORD'].elements['new'+datiCategory[jj]].selectedIndex){
                        document.forms['modORD'].elements['new'+datiCategory[jj]].selectedIndex++;
				        document.forms['modORD'].elements['old'+datiCategory[jj]].value++;
                        document.getElementById('div'+datiCategory[jj]).style.top = (parseInt(document.getElementById('div'+datiCategory[jj]).style.top)+altDiv) + 'px';
                    }
                }
			}
		}
        document.forms['modORD'].elements['new'+questo].selectedIndex--;
        tDiv.style.top = (parseInt(tDiv.style.top)-((diff+1)*altDiv)) + 'px';
	}
	document.forms['modORD'].elements['old'+questo].value = tNew;
}

//-->

