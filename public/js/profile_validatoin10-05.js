function submitTeacherProfile() {
	var requiredValues = [document.dataDisplay.firstName.value, document.dataDisplay.lastName.value, document.dataDisplay.email.value];
	var cleared = true;
	var i = -1; while (++i<requiredValues.length) {
		if ((requiredValues[i]=="") ||
			(requiredValues[i]==" ") ||
			(requiredValues[i]==null) ||
			(requiredValues[i]=="undefined")
			) {
			alert("First Name, Last Name and Email are required entries\nPlease check your input.\nThis form cannot be submitted.");
			cleared = false;
			break;
		}
	}
	if (cleared)	return true;
	else	return false;
}

function trimString(str) {
	str = this != window? this : str;
	return str.replace(/^\s+/g, '').replace(/\s+$/g, '');
}

function checkNumeric(objName) {
	var numberfield = objName;
	if (chkNumeric(objName) == false) {
		numberfield.select();
		numberfield.focus();
		return false;
	}
	else	return true;
}

function isZip(s){
	s = s.value;
    reZip = new RegExp(/(^\d{5}$)|(^\d{5}-\d{4}$)/);
    if(!reZip.test(s)){
         alert("Zip Code Is Not Valid");
         return false;
    }
	return true;
}

function chkNumeric(objName) {
	// only allow 0-9 be entered, plus any values passed
	var checkOK = "0123456789,.-";
	var checkStr = objName;
	var allValid = true;
	var decPoints = 0;
	var allNum = "";
	if (checkStr.value=="") return false;
	if (parseInt(checkStr.value)!=checkStr.value) {
		alertsay = "Please enter only numeric values\n \""
		alertsay = alertsay + checkOK + "\" in this field."
		alert(alertsay);
		return (false);
	}
	else	return true;
/*	for (i = 0;  i < checkStr.value.length;  i++) {
		ch = checkStr.value.charAt(i);
		for (j = 0;  j < checkOK.length;  j++)
		if (ch == checkOK.charAt(j))
		break;
		if (j == checkOK.length) {
		allValid = false;
		break;
		}
		if (ch != ",")
		allNum += ch;
		}
		if (!allValid)
		{
		alertsay = "Please enter only numeric values\n \""
		alertsay = alertsay + checkOK + "\" in this field."
		alert(alertsay);
		return (false);
		}
*/
}$( document ).ready(function() {// function to select one of the checkbox at a time - begins/*$(':checkbox').on('change',function(){ var th = $(this), name = th.prop('name');  if(th.is(':checked')){     $(':checkbox[name="'  + name + '"]').not($(this)).prop('checked',false);     }});*/// function to select one of the checkbox at a time - ends /*$('.number-only').keypress(function(e) {	if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;  })  .on("cut copy paste",function(e){	e.preventDefault();  });*/    // function to accept numbers only -- beings  $(".number-only").keypress(function (e) {     //if the letter is not digit then display error and don't type anything     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {        //display error message        $("#"+this.id+"errmsg").css("color", "red").show().delay(800).fadeOut("slow");               return false;    }	   });   // function to accept numbers only -- ends      // function to validate zipcode -- beings  $(".number-only").blur(function (e) {		if($(this).val()!=''){	//console.log($(this).val());	var zipId=this.id;	var zipType=(zipId=='s_zip')?'H':'S';	var csrf_token = $("input[name=_token]").val();	//alert(csrf_token);	//console.log('<?php echo Yii::app()->request->baseUrl;?>);	$.ajax({			type: 'POST',            url: "http://teachers.musikalessons.com/prospectives/zipValidate",            data: {                validate_zip: $(this).val(),				zip_type:zipType,				_token: csrf_token            },            dataType : 'json',			beforeSend:function()			{				//$("#"+zipId+"errmsg").css("color", "red").show().text('Validating zipcode');				$("#isvalidzip").val('');			},			success: function(result) {				alert('hello'+result);			if(result==false)			{				//alert(zipId+"errmsg");				$("#"+zipId+"errmsg").css("color", "red").show().delay(1000).fadeOut("slow").text('Invalid zipcode supplied');				$("#isvalidzip").val(0);							}else{				//alert(zipId+"errmsg1111");				$("#"+zipId+"errmsg").text('');				}			},			error: function(e,ajaxOptions, thrownError) {			console.log("inside error"+e.status);			console.log(thrownError);			}        });     }   });$( "#frmPStudents" ).submit(function( event ) {	if(($('#isvalidzip').val()!='') && ($('#isvalidzip').val()==0))	{		alert("Please check the supplied zipcode");		return false;	}    if ($('[name="s_location[]"]:checked').length<=0) {      alert('Please select at least one checkbox');      return false;    }	if ($('[name="lstInstr[]"]:checked').length<=0) {      alert('Please select at least one the  INSTRUMENT(S) radio button');      return false;    }		if(($("#s_zip").val().length>0) && ($('[name="s_location[]"]').eq(0).prop('checked')==false))	{		alert("Please select 'In Student\'s Home' checkbox for the supplied zipcode "+$("#s_zip").val()+".");		return false;	}		if(($("#s_location_zipt").val().length>0) && ($('[name="s_location[]"]').eq(1).prop('checked')==false))	{		alert("Please select 'At my location/studio' checkbox for the supplied zipcode "+ $("#s_location_zipt").val()+".");		return false;	}		if($('[name="s_location[]"]:checked').length>0)	{		var isEmpty=0;		$(this).find('.chkit').each(function () {			if(((this.checked) && ($(this).val()=='0') && ($.trim($("#s_zip").val())=='')))			{									alert("Please supply the zipcode value");					$("#s_zip").focus();					isEmpty=1;			}			if(((this.checked) && ($(this).val()=='1') && ($.trim($("#s_location_zipt").val())=='')))			{				alert("Please supply the zipcode value");					$("#s_location_zipt").focus();					isEmpty=1;			}		});				if(isEmpty) return false;		else return true;	}			return true;	});// FUNCTION TO VALIDATE FORM - ENDS});  /*$.ajax({			type: "POST",			url: "http://teachers.musikalessons.com/prospectives/",			data: {				 sid:scene_id			},			success: function(data) {				alert(data);				location.reload(true);			}		});*/
