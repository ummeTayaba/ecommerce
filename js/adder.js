

function domCreator(container, id, src, itemName, cPara, price, count, prev)
{
    //TODO:add all the variables to the code
    var row = $('<div></div>').addClass('row');
    var col = $('<div></div>').addClass('col-md-6 col-md-offset-3');
    var card = $('<div></div>').addClass('card');

    var cardImg = $('<div></div>').addClass('card-image');
    var img = $('<img></img>').addClass('img-responsive').load(function(){
      $(container).fadeIn(2350);
    }).attr("src", src);
    var imgSpan = $('<span></span>').addClass('card-title').text('Name: ' + itemName);
    cardImg.append(img, imgSpan);

    var cardContent = $('<div></div>').addClass('card-content');
    var cardPara = $('<p></p>').text('Description: ' + cPara);
    cardContent.append(cardPara);


    var cardAction = $('<div></div>').addClass('card-action');
    var cardLink = $('<a></a>').addClass('mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect').text('Add to Cart');
    cardAction.append(cardLink);

    console.log(prev);
    
    cardLink.click(function(){
      
      var count = document.getElementById(id);
      var item = parseInt(count.innerHTML);
      if(item >= 1)
      {
        count.innerHTML = item - 1;
        var item = {
          'name': itemName,
          'price':price,
          'details': cPara,
          'prev': prev
        };
        sessionStorage.setItem(id, JSON.stringify(item));
        
        $.ajax({
          url: "http://localhost/php/update.php",
          type: "get", //send it through get method
          data:{
                 "update":"true",
                 "id": id, 
                 "cat": findOpenedTab(),
          },
          success: function(response) {
            //Do Something
            alert('added to cart');
          }
        });
      }
      else
      {
        alert('no item left');
      }
    });

    var cardContentP = $('<div></div>').addClass('card-content');
    var cardParaP = $('<p></p>').text('Price: ' + price);
    cardContentP.append(cardParaP);

    var cardContentA = $('<div></div>').addClass('card-content');
    var cardParaA = $('<p></p>').text('Items Available: ');
    var spanA = $('<span></span>').text(count).attr("id", id);
    cardParaA.append(spanA);
    cardContentA.append(cardParaA);


    card.append(cardImg, cardContent, cardContentP, cardAction, cardContentA);
    col.append(card);
    row.append(col);
    $(container).append(row).hide();
}

function showMax(value)
{
  document.getElementById('max_val').innerHTML = value;
}



function showMin(value)
{
  document.getElementById('min_val').innerHTML = value;
}
function callDom(container, response)
{
  var json = $.parseJSON(response);
  $(container).empty();

  for(var c = 0; c < json.length; c++)
  {
    domCreator(container, json[c].id, json[c].img, json[c].name, json[c].desc, json[c].price, json[c].count, json[c].prev);//TODO: add property here after ajax parsing
    
  }
}

$("div#tt4.icon").click(showPop);
$("button#cancel").click(hidePop);

function showPop()
{
  $("div.container-fluid.pop_up_container").show(1000, function()
    {
      $("section").css({"background-color": "black", "opacity": "0.1"});  
      
    });
}

function hidePop()
{
  $("div.container-fluid.pop_up_container").hide(1000, function()
    {
      $("section").css({"background-color": "initial", "opacity": "initial"});  
    });

}


$(function() {
    goSearch(1000000, 0, 1, "");
    goSearch(1000000, 0, 2, "");
    goSearch(1000000, 0, 3, "");
    
});


function initFind()
{
  var cat = findOpenedTab();
  var max = $("span#max_val").html();
  var min = $("span#min_val").html();
  var key = document.getElementById("keyword").value;
  goSearch(max, min, cat, key);
  hidePop();
}

function goSearch(max, min, cat, key)
{
  $.ajax({
    url: "http://localhost/php/items.php",
    type: "get", //send it through get method
    data:{
           "find":"true",
           "max": max,
           "min": min,
           "cat": cat,
           "key": key
    },
    success: function(response) {
      //Do Something
      if(cat == 1)
      {
        callDom("#men_acc", response);
      }
      else if(cat == 2)
      {
        callDom("#women_acc", response);
      }else
      {
        callDom("#children_acc", response);
      }
    }
  });
}


function findOpenedTab()
{
  if($('a#men').hasClass('is-active'))
  {
    return 1;
  }
  else if($('a#women').hasClass('is-active'))
  {
    return 2;
  }
  else
  {
    return 3;
  }

}
