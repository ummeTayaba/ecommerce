var id = document.getElementById('value').value;

function Item(name, price, prev)
{
	this.name = name;
	this.price = price;
    this.prev = prev;
    console.log(prev);
}


var array = [];

for(var key in sessionStorage)
{
	var str = sessionStorage.getItem(key);
	var j = $.parseJSON(str);
	var item = new Item(j.name, j.price, j.prev);
	addToTable(item);
	array.push(item);
}

function addToTable(item)
{
    var table = $('#data');
    var tr = $('<tr></tr>');
    var nameTd = $('<td></td>').addClass("mdl-data-table__cell--non-numeric").text(item.name);
    var priceTd = $('<td></td>').text(item.price);
    tr.append(nameTd);
    tr.append(priceTd);
    table.append(tr);
}


function goBuy()
{
   var jsonString = JSON.stringify(array);
   $.ajax({
        type: "POST",
        url: "http://localhost/php/buy.php",
        data: {'data' : jsonString, 'id': id}, 
        cache: false,

        success: function(response){
            console.log(response);
            alert('You will get it after 7 days. Check your delivery report for progress.');
        }
    });
}