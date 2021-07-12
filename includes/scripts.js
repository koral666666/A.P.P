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
                GASES.forEach(function(gas_name) {
                    if(gas_name == document.getElementById("gases_select").options[document.getElementById("gases_select").selectedIndex].value.toLowerCase()) {
                        document.getElementById(gas_name + WRAPPER_POSTFIX).className = "visible_element";
                    }
                    else {
                        document.getElementById(gas_name + WRAPPER_POSTFIX).className = "invisible_element";
                    }
                });
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
                COMPS.forEach(function(comp_name) {
                    if(document.getElementById("filter_edit_select").options[document.getElementById("filter_edit_select").selectedIndex].value == comp_name) {
                        document.getElementById(comp_name + "_wrapper").className = "";
                    }
                    else {
                        document.getElementById(comp_name + "_wrapper").className = "invisible_element";
                    }
                    
                });
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


function Disable_all_toggle(){
    
    function none_Toggle_edit_End_add_purifier(){
        $("#edit_purifier").css("display","block");
        $("#add_purifier").css("display","none");

        $("#edit_add_btn").css("display","none");
        $("#add").css("display","none");
    }

    $("#edit_add_btn").html("");

    function none_Toggle_gas_measurements_data_And_edit(){
        $("#Gas_Measurements_data").css("display","block");
        $("#Gas_Measurements_edit").css("display","none");
    
        $("#Gas_Measurements_data_edit").css("display","none");
    }
    function none_Toggle_cooling_unit_data_And_edit(){
        $("#Cooling_Units_data").css("display","block");
        $("#Cooling_Units_edit").css("display","none");
    
        $("#Cooling_Units_data_edit").css("display","none");
    }

    function none_Toggle_Components_data_And_edit(){
        $("#Components_data").css("display","block");
        $("#Components_edit").css("display","none");
    
        $("#Components_data_edit").css("display","none");
    }

    none_Toggle_gas_measurements_data_And_edit();
    none_Toggle_cooling_unit_data_And_edit();
    none_Toggle_Components_data_And_edit();
    none_Toggle_edit_End_add_purifier();
    $("#add_purifier").css("display","none");
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

function add_new_emp_form_validation(){
    var form = document.querySelector("#add_new_emp");
    form.addEventListener("submit", function(event){
        if(form.checkValidity() == false){
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add("was-validated");
    });
}

function edit_emp_form_validation(){
    var form = document.querySelector("#edit_emp");
    form.addEventListener("submit", function(event){
        if(form.checkValidity() == false){
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add("was-validated");
    });
}

NAME = "question_mark";

function set_user_pic(){
    var el = $("#userPic");
    var name = el.data("name").toLowerCase();
    NAME = name;
    el.css({"background-image" : `url("images/${name}.png")`});
}

function set_severity_color(){
    $(".severityColor").each(function(){
        var el = $(this);
        var colorName = el.data("name");
        el.css({"background-image" : `url("images/${colorName}.svg")`});
    })
}

GASES = ["co", "lead", "nitrogen", "co2"];
WRAPPER_POSTFIX = "_section";
SECTION_POSTFIX = "_gas_ratio_data";
GAS_DIV_POSTFIX = "_gas_ratio_div";
RANGE_POSTFIX = "_gas_ratio";

function change_gas(gas_select) {
    selected_gas_name = gas_select.options[gas_select.selectedIndex].value.toLowerCase();
    GASES.forEach(function(gas_name) {
        console.log(gas_name);
        if(gas_name == selected_gas_name) {
            document.getElementById(gas_name + GAS_DIV_POSTFIX).classList.remove("invisible_element");
        }
        else {
            document.getElementById(gas_name + GAS_DIV_POSTFIX).classList.add("invisible_element");
        }
    });
}

function set_gas(gas_data) {
    // gas_name= change_gas(gas_data);
    // console.log(gas_name);
    // console.log(gas_data);
    GASES.forEach(function(gas_name) {
        document.getElementById(gas_name + SECTION_POSTFIX).innerHTML = gas_data[gas_name];
        document.getElementById(gas_name + RANGE_POSTFIX).value = gas_data[gas_name];

    })
}

function load_gas(purifier_id) {
    xhttp_gas = new XMLHttpRequest();
    xhttp_gas.onload = function() {
        if(xhttp_gas.readyState == XMLHttpRequest.DONE) {
            if(xhttp_gas.status==200) {
                const gas_data = JSON.parse(this.responseText);
                set_gas(gas_data);
                load_components(purifier_id);
                console.log(gas_data);
            }
        }
        
    }
    xhttp_gas.open("GET", "get_gas.php?purifier_id="+purifier_id,true); //
    xhttp_gas.send(); 
}

COMPS = ["352", "364", "465"];
WORKING_SPAN_POSTFIX = "_working_span";

function set_componenets(comp_data) {
    console.log(comp_data);
    document.getElementById("no_components_data_wrapper").style.display = "none";
    document.getElementById("components_data_wrapper").classList.remove("invisible_element");

    COMPS.forEach(function(comp_name) {
        working = (comp_data[comp_name] == "1") ? " Working" : " Not Working";
        document.getElementById(comp_name + WORKING_SPAN_POSTFIX).innerHTML = working;
    });
}

function load_components(purifier_id) {
    console.log("hello");
    xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(xhttp.status==200) {
            if(this.responseText!="") {
                const comp_data = JSON.parse(this.responseText);
                set_componenets(comp_data);
            }
        }
    }
    xhttp.open("GET", "get_comp.php?purifier_id="+purifier_id);
    xhttp.send(); 
}

function set_purifier(purifier_data) {
    document.getElementById("group_number").innerHTML = purifier_data["group_number"];
    document.getElementById("location").innerHTML     = purifier_data["street"] + " St. " + purifier_data["street_num"] + " " + purifier_data["region"];
    //load_purifier(purifier_data["purifier_id"]);
    load_gas(purifier_data["purifier_id"]);
}

// load_purifier-ajax

function load_purifier(purifier_id) {
    xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(xhttp.status==200) {
            const purifier_data = JSON.parse(this.responseText);
            set_purifier(purifier_data);
        }
        else{
            console.log("error");
        }
    
    }
    xhttp.open("GET", "get_purifier.php?purifier_id="+purifier_id);
    xhttp.send(); 
}


function set_user(users_data) {
    document.getElementById("employee_id").value         = users_data["user_id"];
    document.getElementById("employee_first_name").value = users_data["first_name"];
    document.getElementById("employee_last_name").value  = users_data["last_name"];
    document.getElementById("employee_password").value   = users_data["password"];
    document.getElementById("employee_email").value      = users_data["user_email"];

    var department = "";
    switch (users_data["user_type"]) {
        case '4':
            department = "Region supervisor";
            break;

        case '3':
            department = "HR manager";
            break;
        case '2':
            department = "Technician";
            break;
        case '1':
            department = "Chemist";
            break;
    }

    if(department)
        document.getElementById("employee_department").value = department;
}

// load_user-ajax

function load_user(user_id){
    xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        if(xhttp.status==200){
            const users_data = JSON.parse(this.responseText);
            set_user(users_data);
        }
    };
    xhttp.open("GET", "get_employees.php?user_id="+user_id);
    xhttp.send(); 
}



$(document).ready(function(){ 
    set_user_pic();
    
    if($("body").hasClass("home_page_class")){
        Main_nav();
        Selected_nav();
    }
    if($("body").hasClass("alerts_class")){
        Main_nav();
        Side_nav();
        Selected_nav();
    }
    if($("body").hasClass("abnormality_alerts_class")){
        $("header > div > div > div:nth-child(4) > a:first-child").addClass("selected_nav");
        Main_nav();
        Side_nav();
        Selected_nav();
        set_severity_color();
    }
    else{
        if($("header > div > div > div:nth-child(4) > a:first-child").hasClass("selected_nav"))
            $("header > div > div > div:nth-child(4) > a:first-child").removeClass("selected_nav");
    }
    if($("body").hasClass("purifier_class")){
        if(document.getElementById("purifier_source").selectedIndex != -1) {
            load_purifier(document.getElementById("purifier_source").options[document.getElementById("purifier_source").selectedIndex].value);

            document.getElementById("purifier_source").onchange = function() {
                console.log("454");
                load_purifier(document.getElementById("purifier_source").options[document.getElementById("purifier_source").selectedIndex].value);
            }
        }
        else {
            alert("Loading");
        }
        Main_nav();
        Side_nav();
        Selected_nav();
        if(NAME == "yoav"){
            All_toggle();
        }
        else{
            Disable_all_toggle();
        }
        Pie_chart();
    }


    if($("body").hasClass("reports_class")){
        Main_nav();
        Side_nav();
        Selected_nav();
        Line_chart();
        action_buttons();
    }

    if($("body").hasClass("employees_class")){
        Main_nav();
        Side_nav();
        Selected_nav();
    }

    if($("body").hasClass("add_new_employee_class")){
        $("header > div > div > div:nth-child(4) > a:last-child").addClass("selected_nav");
        Selected_nav();
        Main_nav();
        Side_nav();
        add_new_emp_form_validation();
    }
    else{
        if($("header > div > div > div:nth-child(4) > a:last-child").hasClass("selected_nav")){
            $("header > div > div > div:nth-child(4) > a:last-child").removeClass("selected_nav");
        }
    }
    if($("body").hasClass("edit_employee_class")){
        $("header > div > div > div:nth-child(5) > a:last-child").addClass("selected_nav");
        Selected_nav();
        Main_nav();
        Side_nav();
        edit_emp_form_validation();
    }
    else{
        if($("header > div > div > div:nth-child(5) > a:last-child").hasClass("selected_nav")){
            $("header > div > div > div:nth-child(5) > a:last-child").removeClass("selected_nav");
        }
    }

    if($("body").hasClass("edit_employee_class")){
        if(document.getElementById("emp_select").selectedIndex != -1) {
            load_user(document.getElementById("emp_select").options[document.getElementById("emp_select").selectedIndex].value);
            document.getElementById("emp_select").onchange = function() {
                load_user(document.getElementById("emp_select").options[document.getElementById("emp_select").selectedIndex].value);
            };
        }
    }
    
});
