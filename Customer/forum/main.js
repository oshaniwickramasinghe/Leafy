var myVar = setInterval(LoadData, 2000);

http_request = new XMLHttpRequest();

function LoadData(){
$.ajax({
url: 'view.php',
type: "POST",
dataType: 'json',
success: function(data) {
    $('#MyTable tbody').empty();
    for (var i=0; i<data.length; i++) {
        var commentId = data[i].id;
        if(data[i].parent_comment == 0){
        var row = $('<tr><td><b><img src="../images/profilepic_icon.svg" width="30px" height="30px" style="margin-left:-60%"/>'+ data[i].customer + ' <br><i style="margin-left:-50%"> '+ data[i].date + ':</i></b></br><p style="margin-left:-20%">' + data[i].post + '</br><br><a  onclick="showModal(); return false;"data-id="'+ commentId +'" title="Add this item" class="open-ReplyModal" href="#ReplyModal" style  = "margin-left:52%"><i class="fa-solid fa-reply"></i>Reply</a>'+'</p></td></tr>');
        $('#record').append(row);
        for (var r = 0; (r < data.length); r++)
                {
                    if ( data[r].parent_comment == commentId)
                    {
                        var comments = $('<tr style = " background-color: #f5e2e257"><td  ><b><img src="../images/profilepic_icon.svg" width="30px" height="30px" style="margin-left:-40%" /> Re: ' + data[r].customer + ' <br><i style="margin-left:-22%"> ' + data[r].date + ':</i></b></br><p style="margin-left:auto" >'+ data[r].post +'</p></td></tr>');
                        $('#record').append(comments);
                    }
                }
        }
    }
},

error: function(jqXHR, textStatus, errorThrown){
    alert('Error: ' + textStatus + ' - ' + errorThrown);
}
});
}



$(document).on("click", ".open-ReplyModal", function () {
     var commentid = $(this).data('id');
     $(".modal-body #commentid").val( commentid );
});



//Post data to the server

$(document).ready(function() {
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var id = document.forms["frm"]["Pcommentid"].value;
		var name = document.forms["frm"]["name"].value;
		var msg = document.forms["frm"]["msg"].value;
		if(name!="" && msg!=""){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					id: id,
					name: name,
					msg: msg,
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						document.forms["frm"]["Pcommentid"].value = "";
						document.forms["frm"]["name"].value = "";
						document.forms["frm"]["msg"].value = "";
						LoadData();
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});

//Reply comment

$(document).ready(function() {
	$('#btnreply').on('click', function() {
		$("#btnreply").attr("disabled", "disabled");
		var id = document.forms["frm1"]["Rcommentid"].value;
		// var name = document.forms["frm1"]["Rname"].value;
		var msg = document.forms["frm1"]["Rmsg"].value;
		if(  msg!=""){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					id: id,
					// name: name,
					msg: msg,
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#btnreply").removeAttr("disabled");
						document.forms["frm1"]["Rcommentid"].value = "";
						// document.forms["frm1"]["Rname"].value = "";
						document.forms["frm1"]["Rmsg"].value = "";
						LoadData(); 
						$("#ReplyModal").modal("hide");
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});


function showModal() {
	document.getElementById("id01").style.display = "flex";
}

function hideModal() {
	document.getElementById("id01").style.display = "none";
}