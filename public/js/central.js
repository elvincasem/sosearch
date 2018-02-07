
 FusionCharts.ready(function(){
	  
	  
	  var jsonlabel = JSON.parse(document.getElementById("region").value);
	  var jsonvalues = JSON.parse(document.getElementById("region_values").value);
	  var selectedcountry = "";
	  
    var fusioncharts = new FusionCharts({
    type: 'scrollColumn2d',
    renderAt: 'chart-container',
    width: '1024',
    height: '450',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": selectedcountry,
            "subcaption": "",
            "xaxisname": "Region",
            "yaxisname": "No. of HEI",
            "showvalues": "1",
            "placeValuesInside": "1",
            "rotateValues": "0",
            "valueFontColor": "#ffffff",
            "numberprefix": "",

            //Cosmetics
            "baseFontColor": "#333333",
            "baseFont": "Arial",
            "captionFontSize": "18",
            "subcaptionFontSize": "14",
            "subcaptionFontBold": "3",
            "showborder": "0",
            "paletteColors": "#0075c2",
            "bgcolor": "#FFFFFF",
            "showalternatehgridcolor": "0",
            "showplotborder": "0",
            "labeldisplay": "WRAP",
            "divlinecolor": "#CCCCCC",
            "showcanvasborder": "0",
            "linethickness": "3",
            "plotfillalpha": "100",
            "plotgradientcolor": "",
            "numVisiblePlot": "12",
            "divlineAlpha": "100",
            "divlineColor": "#999999",
            "divlineThickness": "1",
            "divLineIsDashed": "1",
            "divLineDashLen": "1",
            "divLineGapLen": "1",
            "scrollheight": "10",
            "flatScrollBars": "1",
            "scrollShowButtons": "0",
            "scrollColor": "#cccccc",
            "showHoverEffect": "1",
        },
        "categories": [{
            "category":  
                jsonvalues
			
        }],
        "dataset": [{
            "data": 
                jsonvalues
			
        }]
    }
}
);
    fusioncharts.render();
});


function savesy(){
	

			var school_year = document.getElementById("school_year").value;
					
					
			if(school_year!=""){
							
					//check duplicate user
					$.ajax({
                    url: 'academicyear/checksy',
                    type: 'post',
                    data: {school_year: school_year},
                    success: function(response) {
						//console.log(response);
						duplicateid = JSON.parse(response);
						var numberofduplicate = parseInt(duplicateid.duplicateid);
						//alert(numberofduplicate);
						//console.log(last);
						
						if(numberofduplicate==0){
							
							$.bootstrapGrowl('<h4><strong>Saving School Year</strong></h4> <p>Please do not close this window...</p>', {
								type: 'success',
								delay: 100000,
								allow_dismiss: true,
								offset: {from: 'top', amount: 20}
							});
							
							$.ajax({
								url: 'academicyear/savesy',
								type: 'post',
								data: {school_year: school_year},
								success: function(response) {
									
									location.reload();
									
								}
							});
						}else{
							
							$.bootstrapGrowl('<h4><strong>Error!</strong></h4> <p>Duplicate School Year.</p>', {
								type: 'danger',
								delay: 3000,
								allow_dismiss: true,
								offset: {from: 'top', amount: 20}
							});
						}
						
						
                    }
                });

			}//end if all fields are not blank
			else{
				
                $.bootstrapGrowl('<h4><strong>Error</strong></h4> <p>School Year Empty.</p>', {
                    type: 'danger',
                    delay: 3000,
                    allow_dismiss: true,
                    offset: {from: 'top', amount: 20}
                });
				
				//alert("Please fill up the required fields.");
				//setTimeout(function () { $("#username").focus(); }, 20);
			}
}

function deletesy(id){
	
	var r = confirm("Are your sure you want to delete this record?");
    if (r == true) {
        //alert ("You pressed OK!");
		//var person = prompt("Please enter Administrator Password");
		//if (person =='superadmin') {
		$.ajax({
                    url: 'schoolyear/deletesy',
                    type: 'post',
                    data: {syid: id},
                    success: function(response) {
						//console.log(response);
						 $.bootstrapGrowl('<h4><strong>Success</strong></h4> <p>School Year Deleted.</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						setTimeout(function () { location.reload(); }, 20);
						
                    }
                });
		//}else{
			//alert("Invalid Password");
		//}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

function changeyear(){
	
	var selected_year = document.getElementById("yearfilter").value;
	var monthfilter = document.getElementById("monthfilter").value;
	window.location.href = "../../filter/"+selected_year+"/"+monthfilter;
}
