 $(document).ready(function(){
  slideUp();
  createMes();
  createAno();
  radioButtonMes();
  radioButtonAno(); 
  modal();
  // traduzirTabelas();
});
 function modal(){
   
}

function slideUp(){

    $(".alert-success").fadeTo(5000, 500).slideUp(500, function(){
        $(".alert-success").slideUp(500);
    });
    $(".alert-danger").fadeTo(5000, 500).slideUp(500, function(){
        $(".alert-danger").slideUp(500);
    });
}
function createMes(){

    var select = $("<select>");
    select.addClass("col-md-2").addClass("form-control");
    select.attr("name","duracao-select");   
    select.attr("id","mes-select");

    var option0 = $("<option>").text("1 mes");
    select.append(option0);
    for(var i = 2 ; i <= 12; i++){
        var option = $("<option>").text(i +" meses");
        option.attr("value",""+i+" meses");
        select.append(option);
    }

    return select;
}
function createAno(){

    var select = $("<select>");
    select.addClass("col-md-2").addClass("form-control");
    select.attr("name","duracao-select");
    select.attr("id","ano-select");

    var option0 = $("<option>").text("1 ano");
    select.append(option0);

    for(var i = 2 ; i <= 5; i++){
        var option = $("<option>").text(i + " anos");
        option.attr("value",""+i+" anos");
        select.append(option);
    }

    return select;
}

function radioButtonMes(){
   $("#mes").change(function(){
    mes = createMes();
    div =$(".select-custom");    
    div.append(mes);
    $("#ano-select").remove();
}); 
}

function radioButtonAno(){
  $("#ano").change(function(){
    ano = createAno();
    div =$(".select-custom");    
    div.append(ano);
    $("#mes-select").remove();
});  
}






