function mensajesError(elemento,mensaje){

	$("#"+elemento+"_help").append( "<i class='fa fa-warning'></i> "+mensaje );

	$( "#"+elemento ).parent().addClass( "has-error" );

}


// book

function validate_book(edit){

	var edit = edit || 0;

	var errors = 0;

	vaciar_errores();

	// title

	if(!$("#title").val()){
		mensajesError("title","required");
		errors++;
	}

	// author

	if(!$("#id_author").val()){
		mensajesError("id_author","required");
		errors++;
	}

	// publication

	if(!$("#publication").val()){
		mensajesError("publication","required");
		errors++;
	}

	// ISBN

	if(!$("#ISBN").val()){
		mensajesError("ISBN","required");
		errors++;
	}
	else if(!/^[a-zA-Z0-9]+$/.test($("#ISBN").val())){
		
		mensajesError("ISBN","must be alphanumeric");
		errors++;

	}

	// price

	if(!$("#price").val()){
		mensajesError("price","required");
		errors++;
	}
	else{

		if($("#price").val()<=0){
			mensajesError("price","must be bigger than zero");
			errors++;
		}

	}

	// image url

	if($("#image_url").val()){
		
        $("<img>", {
            src: $("#image_url").val(),
            error: function() { 
            	mensajesError("image_url","must be valid image url");
				errors++;
            }
        });

	}

	if(edit!="edit")

		validate_isbn();

	if(errors>0)
		return false;	

	return true;

}


function vaciar_errores(){
	$(".text-danger").empty();
	$("*").removeClass("has-error");
}


// filters

$(function(){

	$("#filters_btn").click(function(e){

		e.preventDefault();

		var errors = 0;

		vaciar_errores();

		// author		

		if($("#author").val()){

			if(!/^[a-zA-Z\s]+$/.test($("input[name=author]").val())){
				mensajesError("author","Please, only letters allowed");
				errors++;
			}

		}

		// price

		if($("#price").val()){
			
			if($("#price").val()<=0){
				mensajesError("price","must be bigger than zero");
				errors++;
			}

		}

		if(errors==0)
			$("form[name=filters_form]").submit();			

	});

});



// validate ISBN

function validate_isbn(){

	// desactivar boton login

    $("#btn_submit_book").prop('disabled','disabled');
    
    $.ajax({
        url: base_url+"books/validate_isbn/", 
        type: "POST", 
        dataType: 'json',                      
        data: {
            isbn: $("#ISBN").val()
        },   
        beforeSend: function(){
            
            // animation

            $("#search_animation").html("<strong><i class='fa fa-spinner fa-spin'></i> Wait please...</strong>");   

            $("#ISBN").prop("disabled",true);        

        },                 
        success: function(data){

            // quitar la "animacion"  
            $("#search_animation").empty();

            $("#btn_submit_book").prop('disabled',false);

            $("#ISBN").prop("disabled",false);

            if(data.response=="exist"){
            	$("#ISBN_help").empty();
            	mensajesError("ISBN","the ISBN code '"+$("#ISBN").val()+"' already exist, please select another");                                
            }

            if(data.response=="no_exist" && $("#ISBN").val()){
            	$("#ISBN_help").empty();
            	$( "#ISBN").parent().toggleClass( "has-error" );
            }

        },
        error: function (data){

            alert("oops, houston we have a problem!");

        }
    });

}



// author

function validate_author(){

	var errors = 0;

	vaciar_errores();

	// name

	if(!$("#name").val()){
		mensajesError("name","required");
		errors++;
	}
	else if(!/^[a-zA-Z\s]+$/.test($("#name").val())){
		mensajesError("name","Please, only letters allowed");
		errors++;
	}

	// lastname

	if(!$("#lastname").val()){
		mensajesError("lastname","required");
		errors++;
	}
	else if(!/^[a-zA-Z\s]+$/.test($("#lastname").val())){
		mensajesError("lastname","Please, only letters allowed");
		errors++;
	}


	if(errors>0)
		return false;

	return true;

}