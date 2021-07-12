function Main_nav(){
    $("div > div > div > a").hover(function(){          // when mouse is hover/on the a tag
        $(this).children("svg").css('background-color', '#cccccc');
        $(this).children("svg").css('box-shadow', '0px 0px 8px rgba(0, 0, 0, 0.19)');
        
        $(this).children("span").css('font-weight', '500');
    },
    function(){                                                       // when mouse is out of   the a tag
        if($(this).hasClass("selected_nav")){
            $(this).children("svg").css('background-color', '#ffffff');
            $(this).children("svg").css('box-shadow', '0px 0px 8px rgba(0, 0, 0, 0.19)');
            
            $(this).children("span").css('font-weight', '500');
        }
        else{
            $(this).children("svg").css('background-color', '#eeeeee');
            $(this).children("svg").css('box-shadow', '0px 0px 8px rgba(0, 0, 0, 0.1)');
            
            $(this).children("span").css('font-weight', '600');
        }
    });
}

function Side_nav(){
    $("body > section > div > div > a").hover(function(){          // when mouse is hover/on the a tag
        $(this).children("svg").css('background-color', '#cccccc');
        $(this).children("svg").css('box-shadow', '0px 0px 8px rgba(0, 0, 0, 0.19)');
        
        $(this).children("span").css('font-weight', '500');
    },
    function(){                                                       // when mouse is out of   the a tag
        if($(this).hasClass("selected_nav")){
            $(this).children("svg").css('background-color', '#ffffff');
            $(this).children("svg").css('box-shadow', '0px 0px 8px rgba(0, 0, 0, 0.19)');
            
            $(this).children("span").css('font-weight', '500');
        }
        else{
            $(this).children("svg").css('background-color', '#eeeeee');
            $(this).children("svg").css('box-shadow', '0px 0px 8px rgba(0, 0, 0, 0.1)');
            
            $(this).children("span").css('font-weight', '600');
        }
    });
}

function Selected_nav(){
    $(".selected_nav").children("svg").css('background-color', '#ffffff');
    $(".selected_nav").children("svg").css('box-shadow', '0px 0px 8px rgba(0, 0, 0, 0.19)');
            
    $(".selected_nav").children("span").css('font-weight', '500');
}

function All_toggle(){
    var toggle_edit_End_add     = 0;
    var toggle_gas_measurements = 0;
    
    function Toggle_edit_End_add_purifier(){
        $("#edit_purifier").css("display","block");
        $("#add_purifier").css("display","none");
    
        $("#edit_add_btn").on("click", function(){
            if(toggle_edit_End_add){
                $(this).children("span").html("&plus;");
                $("#edit_purifier").css("display","block");
                $("#add_purifier").css("display","none");
                toggle_edit_End_add = 0;

                var form = document.querySelector("#purifier_form");
                form.addEventListener("submit", function(event){
                    if(form.checkValidity() == false){
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                });
            }
            else{
                $(this).children("span").html("&times;");
                $("#edit_purifier").css("display","none");
                $("#add_purifier").css("display","block");
                toggle_edit_End_add = 1;

                var form = document.querySelector("#add_new");
                form.addEventListener("submit", function(event){
                    if(form.checkValidity() == false){
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                });
            }
        });

        $("#add").on("click", function(){
            $("#edit_purifier").css("display","none");
            $("#add_purifier").css("display","block");
            toggle_edit_End_add = 1;
        });
    }

    function Toggle_gas_measurements_data_And_edit(){
        $("#Gas_Measurements_data").css("display","block");
        $("#Gas_Measurements_edit").css("display","none");
    
        $("#Gas_Measurements_data_edit").on("click", function(){
            if(toggle_gas_measurements){
                $(this).css('background-image', 'url("images/edit.svg")');
                $("#Gas_Measurements_data").css("display","block");
                $("#Gas_Measurements_edit").css("display","none");
                toggle_gas_measurements = 0;
            }
            else{
                $(this).css('background-image', 'url("images/close.svg")');
                $("#Gas_Measurements_data").css("display","none");
                $("#Gas_Measurements_edit").css("display","block");
                toggle_gas_measurements = 1;
            }
        });
    }

    function Toggle_cooling_unit_data_And_edit(){
        $("#Cooling_Units_data").css("display","block");
        $("#Cooling_Units_edit").css("display","none");
    
        $("#Cooling_Units_data_edit").on("click", function(){
            if(toggle_gas_measurements){
                $(this).css('background-image', 'url("images/edit.svg")');
                $("#Cooling_Units_data").css("display","block");
                $("#Cooling_Units_edit").css("display","none");
                toggle_gas_measurements = 0;
            }
            else{
                $(this).css('background-image', 'url("images/close.svg")');
                $("#Cooling_Units_data").css("display","none");
                $("#Cooling_Units_edit").css("display","block");
                toggle_gas_measurements = 1;
            }
        });
    }

    function Toggle_Components_data_And_edit(){
        $("#Components_data").css("display","block");
        $("#Components_edit").css("display","none");
    
        $("#Components_data_edit").on("click", function(){
            if(toggle_gas_measurements){
                $(this).css('background-image', 'url("images/edit.svg")');
                $("#Components_data").css("display","block");
                $("#Components_edit").css("display","none");
                toggle_gas_measurements = 0;
            }
            else{
                $(this).css('background-image', 'url("images/close.svg")');
                $("#Components_data").css("display","none");
                $("#Components_edit").css("display","block");
                toggle_gas_measurements = 1;
            }
        });
    }

    Toggle_gas_measurements_data_And_edit();
    Toggle_cooling_unit_data_And_edit();
    Toggle_Components_data_And_edit();
    Toggle_edit_End_add_purifier();
}

function Pie_chart(){
   google.charts.load('current', {'packages':['corechart']});                                   
   google.charts.setOnLoadCallback(drawChart);
   
   function drawChart() {
       var data = google.visualization.arrayToDataTable([                                  
       ['Matter', 'State'],
       ['Liquid', 60],
       ['', 0],
       ['', 0],
       ['', 0],
       ['', 0],
       ['Gas', 40]
   ]);
     
    var options = {'title':' ', 'width':200, 'height':100, 'backgroundColor':'#eee'};       

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
    chart.draw(data, options);
   }
}

function Line_chart(){
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Sulfur Oxide', 'Carbon Monoxide', 'Carbon Dioxide', 'Nitrogen Oxide', 'Tetraethyllead'],
        [1,  48, 56, 4,  83],
        [2,  12, 97, 18, 75],
        [3,  99, 34, 64, 66],
        [4,  2,  15, 72, 23]
      ]);

      var options = {curveType: 'function', backgroundColor:'#eee', isStacked: true,  vAxis: {gridlines: {count: 0}}, hAxis: {gridlines: {count: 0}}, colors:['#468847', '#2B532C', '#6DB66D', '#468C46']};

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
}

function action_buttons(){
    $("#print").on("click", function(){
        window.print();
        return false;
    });

    $("#send").on("click", function(e){
        e.preventDefault();
            $.ajax({
                  url:'http://se.shenkar.ac.il/students/2020-2021/web1/dev_208/reports.html',
                  type:'POST',
                  data:{'message':$('#p_div').html(),'subject':'A.P.P'},
                  success:function(data) {
                        alert('You data has been successfully e-mailed: ' + data);
                  }
            });
    });

}


$(document).ready(function(){
    if($("#home_page"))
        Main_nav();
    if($("#alerts"))
        Main_nav();
    if("#abnormality_alerts"){
            Main_nav();
            Side_nav();
            Selected_nav();
        }
    if("#purifier"){
        Main_nav();
        Side_nav();
        All_toggle();
        Pie_chart();
    }
    if("#reports"){
        Main_nav();
        Side_nav();
        Line_chart();
        action_buttons()
    }
});



window.onload = function(){
    
}



function makeSelected () {
    const selectObj = document.querySelector('#purifier_source');
    const index = selectObj.dataset.selected;
    console.log(index);
    selectObj.options[index-1].selected = true;
}
window.onload = function init() {
    makeSelected();
}