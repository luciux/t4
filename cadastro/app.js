function button(){

	var inseri = window.document.getElementById("incluir");
	var deleta = window.document.getElementById("excluir");
	
	inseri.addEventListener("click", showFormIns);
	deleta.addEventListener("click", showFormDel)
}

function showFormIns(){
	
	var esconde = window.document.getElementById("incluir");
	var escondeFormEx = window.document.getElementById("deletaB");
	var mostra = window.document.getElementById("incluiB");
	var mostraBtEx = window.document.getElementById("excluir");
	
	mostraBtEx.style.display = "block";
	esconde.style.display = "none";
	mostra.style.display = "block";
	escondeFormEx.style.display = "none";
	
}

function showFormDel(){
	
	var mostraBI = window.document.getElementById("incluir");//MOSTRA BOTAO INCLUIR
	var esconde = window.document.getElementById("incluiB"); //ESCONDE FORMULARIO DE INSERCAO
	var escondeEX =  window.document.getElementById("excluir"); // ESCONDE BOTAO DE DELETAR
	var mostraFormEx = window.document.getElementById("deletaB"); // MOSTRA FORMULARIAO DE DELETAR
	
	escondeEX.style.display = "none";
	
	esconde.style.display = "none";
	
	mostraBI.style.display = "block";
	
	mostraBI.style.float = "right";
	
	mostraFormEx.style.display = "block";
	
}

function load(){

    window.addEventListener("load", button);
}

