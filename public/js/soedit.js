
function addapr(){
	
			$('#updateapr').prop("disabled", true);    
			$('#saveproject').prop("disabled", false);    
			//document.getElementById("aprdate").value ="";
			//document.getElementById("aprno").value="";

			//setTimeout(function () { $("#aprno").focus(); }, 30);
}


function saveapr(){
	
			$('#saveapr').prop("disabled", true);    
			var aprdate = document.getElementById("aprdate").value;
			var aprno = document.getElementById("aprno").value;
			
			
			//check duplicate aprno
			$.ajax({
			url: 'apr/checkaprduplicate',
			type: 'post',
			data: {aprno: aprno},
			success: function(response) {
				//console.log(response);
				var lastid = JSON.parse(response);
				if(lastid.duplicate==0){
					
					$.ajax({
						url: 'apr/saveapr',
						type: 'post',
						data: {aprdate: aprdate,aprno:aprno},
						success: function(response) {
							console.log(response);
							var lastid = JSON.parse(response);
							//var lastid = parseInt(convertresponse.lastid);
							//console.log(last);
							window.location.href = "apr/details/"+lastid;
						}
						});
				}else{
					
					alert("APR No. is already used.");
					$('#saveapr').prop("disabled", false);    
					
				}
			}
			});
			//saveapr
			

}	

function deleteapr(id){
	
	var r = confirm("Are your sure you want to delete this APR?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'apr/deleteapr',
                    type: 'post',
                    data: {aprid: id},
                    success: function(response) {
						location.reload();
                    }
                });
		}else{
			alert("Invalid Password");
		}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

function deleteapritem(id){
	
	var r = confirm("Are your sure you want to delete this item?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: '../deleteapritem',
                    type: 'post',
                    data: {aprid: id},
                    success: function(response) {
						console.log(response);
						//location.reload();
						$('#general-table').load(document.URL +  ' #general-table');
                    }
                });
		}else{
			alert("Invalid Password");
		}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

function updateso(){
	
		var so_id = document.getElementById("so_id").value;
		var instcode = document.getElementById("instcode").value;
		var number_of_students = document.getElementById("number_of_students").value;
		var grad_month = document.getElementById("grad_month").value;
		var grad_day = document.getElementById("grad_day").value;
		var grad_year = document.getElementById("grad_year").value;
		var sem_enrolled = document.getElementById("sem_enrolled").value;
		var acad_year = document.getElementById("acad_year").value;
		var prog_id = document.getElementById("prog_id").value;
		var assigned_to = document.getElementById("assigned_to").value;
		
		//get item details
		$.ajax({
                    url: 'soedit/updateso',
                    type: 'post',
                    data: {so_id: so_id,instcode:instcode,number_of_students:number_of_students,grad_month:grad_month,grad_day:grad_day,grad_year:grad_year,sem_enrolled:sem_enrolled,acad_year:acad_year,prog_id:prog_id,assigned_to:assigned_to},
                    success: function(response) {
						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Item Updated!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						setTimeout(function () { location.reload(); }, 200);
                    }
		});
}



function updatename(nameindex){
	
		var lname = document.getElementById("lname-"+nameindex).value;
		var fname = document.getElementById("fname-"+nameindex).value;
		var mname = document.getElementById("mname-"+nameindex).value;
		var name_status = document.getElementById("name_status-"+nameindex).value;
		
		$.ajax({
                    url: 'soedit/updatename',
                    type: 'post',
                    data: {nameindex: nameindex,lname:lname,fname:fname,mname:mname,name_status:name_status},
                    success: function(response) {
						console.log(response);
						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Item Updated!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						setTimeout(function () { location.reload(); }, 100);
                    }
		});
}


function deletename(id){
	
	var r = confirm("Are your sure you want to delete this record?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'soedit/deletename',
                    type: 'post',
                    data: {id: id},
                    success: function(response) {
						console.log(response);
						setTimeout(function () { location.reload(); }, 100);
						
                    }
                });
		}else{
			alert("Invalid Password");
		}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}







$("#itemqty").keypress(function (e) {
    if (e.which == 13) {
        
			saveapritem();
		
    }
});
$("#itemlist").keypress(function (e) {
	 if (e.which == 13) {
        //alert('enter key is pressed');
		var item = document.getElementById("itemlist").value;
		var itemqty = document.getElementById("itemqty").value;
		var itemid = parseInt(item);
		//get item details
		$.ajax({
                    url: '../getitemdetails',
                    type: 'post',
                    data: {itemid: itemid},
                    success: function(response) {
						//add item to database
						var aprid = document.getElementById("aprid").value;
						var data = JSON.parse(response);
						var description = data.description;
						var unit = data.unit;
						var unitcost = data.unitCost;
						$.ajax({
							url: '../saveapritem',
							type: 'post',
							data: {itemid: itemid,itemqty:itemqty,aprid:aprid,description:description,unit:unit,unitcost:unitcost},
							success: function(response) {
								console.log(response);
								$('#general-table').load(document.URL +  ' #general-table');
								document.getElementById("itemlist").value="";
								document.getElementById("itemqty").value="1";
								$("#itemlist").focus(); 
								
								
								//$("#itemlist").focus(); 
								//setTimeout(function () { $("#itemlist").focus(); }, 20);
								//location.reload();
							},
							error: function(e){
								alert("error");
							}
						});
                    }
		});
			
		
    }
	
});

function saveunitprice(apritemsid){
	var unitprice = document.getElementById("unitprice-"+apritemsid).value;
	var availability = document.getElementById("availability-"+apritemsid).value;
	//alert(unitprice);
	$.ajax({
		url: '../updateunitprice',
		type: 'post',
		data: {apritemsid: apritemsid,unitprice:unitprice,availability:availability},
		success: function(response) {
			console.log(response);
			//location.reload();
			$('#general-table').load(document.URL +  ' #general-table');
			$('#totalamount').load(document.URL +  ' #totalamount');
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Item Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
		}
	});
	
	$('#general-table').load(document.URL +  ' #general-table');
}

function aprpreview(){
	
	//get values
}

function printapr()
{
	var DocumentContainer = document.getElementById('aprprintbody');
	var WindowObject = window.open("", "PrintWindow",
	"width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
	WindowObject.document.writeln(DocumentContainer.innerHTML);
	WindowObject.document.close();
	setTimeout(function(){
		WindowObject.focus();
		WindowObject.print();
		WindowObject.close();
	},50);
}

function generatepo(){
			
	
}

function addpo(){
			var podate = document.getElementById("podate").value;
			var prid = document.getElementById("prid").value;
			var pono = document.getElementById("pono").value;
			var placeofdelivery = document.getElementById("placeofdelivery").value;
			var dateofdelivery = document.getElementById("dateofdelivery").value;
			var deliveryterm = document.getElementById("deliveryterm").value;
			var paymentterm = document.getElementById("paymentterm").value;
			var prnomodal = document.getElementById("aprnomodal").value;
			var modeofprocurementpo = document.getElementById("modeofprocurementpo").value;
			var supplierpo = document.getElementById("supplierpo").value;
			
			
			

			
			if(supplierpo == ""){
				alert("Please select Supplier");
			}
			else if(pono==""){
				alert("Please fill up PO No.");
			}

			else{
				
				$.ajax({
				url: '../checkpono',
				type: 'post',
				data: {pono:pono},
				success: function(response) {
					var duplicatepo = response;
					if(duplicatepo>=1){
						alert("Duplicate PO No.")
					}else{
						$.ajax({
						url: '../addpo',
						type: 'post',
						data: {podate: podate,prid:prid,pono:pono,placeofdelivery:placeofdelivery,dateofdelivery:dateofdelivery,deliveryterm:deliveryterm,paymentterm:paymentterm,prnomodal:prnomodal,modeofprocurementpo:modeofprocurementpo,supplierpo:supplierpo},
						success: function(response) {
							
							//var lastid = JSON.parse(response);
							
							//alert(response);
							window.location.href = "../../purchaseorder/details/"+response;
						}
						});
						
					}
				}
				});
				
				
			}
			
	
}	