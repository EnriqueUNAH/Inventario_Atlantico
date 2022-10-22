//Muestra contraseña
//valida que no se puedan insertar espacios
//
function mostrarPassword(){
        var cambio = document.getElementById("yourPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});


    function validar_espacio(e, campo)
    {
		key = e.keyCode ? e.keyCode : e.which;
		if (key == 32) {return false;}
    }
	
	function maximo(campo,limite)
      {
      if(campo.value.length>=limite){
      campo.value=campo.value.substring(0,limite);
      }
      }

	  
	  function checkForm(form){
		if(form.username.value == "") {
		  alert("Error: Debe escribir Usuario!");
		  form.username.focus();
		  return false;
		}
	}

	  function checkPassword(){
		var myregex = /^(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}$/; 
	   if(myregex.test(valor)){
		   alert(valor+" es valido :-) !");
		   return true;        
	   }else{
		  alert(valor+" NO es valido!");
		   return false;        
	   }   
	 }