<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<div class="w3-border" id="id_table1"></div>

<script>
	class crudtable {
		constructor(id,tablename) {
			this.request = new XMLHttpRequest();
			this.request2 = new XMLHttpRequest();
			this.id = id;
			this.data = "";
			this.start = 0;
			this.size = 10;
			this.search = "";
			this.sorting = "id";
			this.direction = "ASC";
			this.tablename = tablename;
		}

		//###############################################
		//# Callback if data received
		//###############################################
		receivedata() {
			if (this.request.readyState == 4 && this.request.status == 200 ) {
				var jsondata = JSON.parse(this.request.responseText);
				this.setdata(jsondata);
				this.rendertable();
				var searchelement = document.getElementById(this.getname()+'_search');
				searchelement.focus();
				searchelement.selectionStart = searchelement.selectionEnd = searchelement.value.length;
			}
		}
		//###############################################
		//# Callback if data received
		//###############################################
		receiverows() {
			if (this.request2.readyState == 4 && this.request2.status == 200 ) {
				var jsondata = JSON.parse(this.request2.responseText);
				this.rows = jsondata["rows"];
				console.log("rows="+this.rows);
			}
		}
		//###############################################
		//# Request data
		//# respecting the limits, start and size
		//###############################################
		getdata() {
			var _this = this;
			this.request.onreadystatechange = function(){_this.receivedata()};
			this.request.open("GET",baseurl+"/main/gettable/"+this.tablename+"/"+this.sorting+"/"+this.direction+"/"+this.start+"/"+this.size+"/"+this.search, true);
			this.request.send();
		}
		//###############################################
		//# Request the total numbers of rows
		//###############################################
		getrows() {
			var _this = this;
			this.request2.onreadystatechange = function(){_this.receiverows()};
			this.request2.open("GET",baseurl+"/main/getrows/"+this.tablename+"/"+this.search, true);
			this.request2.send();
		}
		//###############################################
		//# Return the class instance name
		//###############################################
		getname() {
			for (var name in window) {
				if (window[name]==this) {
					return name;
				}
			}
		}
		//###############################################
		//# Render the datatable
		//###############################################
		rendertable() {
			if(this.data == "") {
				return;
			}
			var outstr = '<div class="w3-container">' +
									 '<div class="w3-bar">'+
									 '<button class="w3-bar-item w3-button w3-green w3-large" onclick="'+this.getname()+'.renderform();"><i class="far fa-plus-square"></i> Neuer Eintrag</button>'+
									 '<input class="w3-bar-item w3-large" id="'+this.getname()+'_search" type="search" placeholder="search"'+
									 'oninput="'+this.getname()+'.setsearch(this.value);" value="'+this.search+'">'+
									 '<div class="w3-bar-item w3-large">[ '+this.data.table[0].title+' ]</div>'+
									 '</div>'+
									 '<div class="w3-responsive" style="overflow:scroll">' +
									 '<table class="w3-table-all w3-border">';
		  outstr += '<thead><tr class="w3-dark-grey">';
			outstr += '<th>Options';
			outstr += '</th>';
			for (var field of this.data.fields) {
			  outstr += '<th onclick="'+this.getname()+'.setorder(\''+field.name+'\');">'+field.lable;
				if(field.name==this.sorting) {
					if(this.direction=="ASC") {
						//outstr += '&nbsp;<i class="fas fa-arrow-up"></i>';
						outstr += '&nbsp;&uarr;';
					} else {
						//outstr += '&nbsp;<i class="fas fa-arrow-down"></i>';
						outstr += '&nbsp;&darr;';
					}
				}

				outstr += '</th>';
			}
			outstr += '</tr></thead><tbody>';
			for (var id in this.data.data) {
				outstr += '<tr>';
				outstr += '<td>';
				outstr += '<i class="far fa-edit" style="font-size:22px" onclick="'+this.getname()+'.renderform('+id+');"></i>&nbsp;';
				outstr += '<i class="far fa-trash-alt" style="font-size:22px" onclick="'+this.getname()+'.deleterow('+id+');"></i>';
				outstr += '</td>';
				for (var field of this.data.fields) {
					if(this.data.data[id][field.name]===undefined) {
						outstr += '<td></td>';
					} else {
						outstr += '<td>'+this.data.data[id][field.name]+'</td>';
					}
			  }

				outstr += '</tr>';
			}
			outstr += '</tbody></table>';
			outstr += this.renderpagination();
			outstr += '<div id="'+ this.id+'_modalform" class="w3-modal"></div></div>';

			outstr += '</div>';
			document.getElementById(this.id).innerHTML = outstr;
		}
		//###############################################
		//# Render the data form for a table id
		//# todo: render form without dataid. Creat
		//###############################################
		renderform(dataid) {
			if(this.data == "") {
				return;
			}
			var outstr = '<div class="w3-modal-content">\
										<form action="">\
										<header class="w3-container w3-blue"> \
   									<span onclick="document.getElementById(\''+this.id+'_modalform'+'\').style.display=\'none\'" \
   									class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>\
   									<h3>Edit</h3>\
  									</header>\
										<div class="w3-container" id="'+this.id+"_form"+'">';

			outstr += '<input type="hidden" name="id" value="'+dataid+'">';

			for (var field of this.data.fields) {
				var lablestr = "</br>";
				switch(field.type) {
					case "textarea":
					  outstr += '<label><b>'+field.lable+'</b></label>';
						outstr += '<textarea class="w3-input" ';
					break;
					case "select":
						outstr += '<label><b>'+field.lable+'</b></label>';
						outstr += '<select class="w3-select" ';
					break;
					case "datalist":
						outstr += '<label><b>'+field.lable+'</b></label>';
						outstr += '<datalist class="w3-input" ';
					break;
					case "checkbox":
						outstr += '<input class="w3-check" ';
						lablestr = '<label><b>'+field.lable+'</b></label></br></br>';
					break;
					default:
					  outstr += '<label><b>'+field.lable+'</b></label>';
						outstr += '<input class="w3-input" ';
					break;
				}
				for (var key in field) {
					// undefined fields
					if ( field[key] == null || field[key] == 0 ) {
						continue;
					}
					// filter keys
					switch(key) {
						case "id":
						case "id_table":
						case "lable":
							continue;
						break;
					}
				  outstr += " "+key+'="'+field[key]+'" ';
				}
				if(dataid!==undefined) {
					outstr += ' value="'+this.data.data[dataid][field.name]+'" ';
				}
				outstr += '>';
				outstr += lablestr;
 			}
			outstr += '</div><div class="w3-container w3-border-top w3-padding-16 w3-light-grey">\
        				 <button onclick="document.getElementById(\''+this.id+'_modalform'+'\').style.display=\'none\'" type="button" class="w3-button w3-red">Cancel</button>\
								 <button onclick="'+this.getname()+'.sendform(this)" type="button" class="w3-button w3-green">Submit</button>\
      		 			 </div></form>';
			outstr += '</div>';
			document.getElementById(this.id+'_modalform').innerHTML = outstr;
			document.getElementById(this.id+'_modalform').style.display='block';
		}
		//###############################################
		//# Render a pagination control
		//# todo: onclick, jump to page
		//###############################################
		renderpagination() {
			var outstr = '<div class="w3-bar">';
			var pages = Math.ceil(this.rows / this.size);
			var page = ( this.start / this.size ) + 1;
			for (var i = 1;i <= pages; i++) {
				if ( i==page ) {
					outstr += '<a href="#" class="w3-button w3-green">'+i+'</a>';
				} else {
					outstr += '<a href="#" class="w3-button" onclick="'+this.getname()+'.gotopage('+i+')">'+i+'</a>';
				}
			}
			outstr += '</div>';
			return outstr;
		}
		//###############################################
		//# go to page
		//###############################################
		gotopage(pagenr) {
			this.start = this.size * (pagenr - 1);
			this.getdata();
		}
		//###############################################
		//# set searchstring
		//###############################################
		setsearch(searchstring) {
			this.search = searchstring;
			this.getrows();
			this.getdata();
		}
		//###############################################
		//# set order
		//###############################################
		setorder(orderby) {
			if(this.sorting==orderby) {
				if(this.direction=="ASC") {
					this.direction = "DESC";
				} else {
					this.direction = "ASC";
				}
			} else {
				this.sorting = orderby;
			}
			this.getrows();
			this.getdata();
		}

		sendform(myself) {
			//var formobj = document.getElementById(this.id+'_form');
			var elem   = myself.form.elements;
	    var url    = myself.form.action;
			console.log(elem);
			console.log(url);
			var data={fields:{}};
			for (var i = 0; i < elem.length; i++) {
				switch(elem[i].type) {
					case "button":
						continue;
					break;
          case "select-one":
          	data["fields"][elem[i].name] = elem[i].options[elem[i].selectedIndex].value;
          break;
          case "checkbox":
          case "radio":
            if (!elem[i].checked) {
              data["fields"][elem[i].name] = 0;
            } else {
							data["fields"][elem[i].name] = 1;
						}
          break;
					default:
						data["fields"][elem[i].name] = elem[i].value;
					break;
        }
	    }
			var jsonstring = JSON.stringify(data);
			console.log(jsonstring);
			if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var xmlhttp=new XMLHttpRequest();
	    } else {
        // code for IE6, IE5
        var xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp.open("POST",baseurl+"/main/updatetable/"+this.tablename,true);
			xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xmlhttp.onload = this.rendertable();
	    xmlhttp.send("json="+jsonstring);
			document.getElementById(this.id+'_modalform').style.display="none";
			this.request.open("GET",baseurl+"/main/gettable/"+this.tablename, true);
			this.request.send();
	    return xmlhttp.responseText;

		}

		setdata(data) {
			this.data = data;
			console.log(data);
		}

		deleterow(id) {
			var answer = confirm("Delete row nr:"+id);
		  if (answer == true) {
		    console.log("DELETE:"+id);
		  } else {
		    console.log("Abort DELETE:"+id);
		  }

		}
	}

	var baseurl = "<?php echo base_url();?>index.php";
	var table1 = new crudtable("id_table1","fields");
	window.onload = function () {
		table1.getrows();
		table1.getdata();
	}

</script>
