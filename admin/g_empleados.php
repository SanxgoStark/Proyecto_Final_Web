<?php

	include "header.php"; // cabecera con enlaces hacia css
	// HEADER.PHP CONTIENE EL SESSION START POR ESO SE COLOCA PRIMERO EN INCLUDE
   include "menu.php";

?>

<html>
<head>
	<title></title>
</head>
<body>

<div style="text-align: center;width: 100%">
	<h1 style="">Gestion de empleados</h1>
	<p class="text-success">Gestion de Empleados</p>
</div>


<script language="javascript">


            function doSearch() {
                var tableReg = document.getElementById('regTable');
                var searchText = document.getElementById('searchTerm').value.toLowerCase();
                for (var i = 1; i < tableReg.rows.length; i++) {
                    var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                    var found = false;
                    for (var j = 0; j < cellsOfRow.length && !found; j++) {
                        var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                        if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                            found = true;
                        }
                    }
                    if (found) {
                        tableReg.rows[i].style.display = '';
                    } else {
                        tableReg.rows[i].style.display = 'none';
                    }
                }
            }
        </script>
<div>
		<img src="../img/search.png">
        <input id="searchTerm" type="text" onkeyup="doSearch()"/>
        <br>
        <div style="width: 40%">
        <table  id="regTable" class="table table-hover">
            <tr class="table-active"><td>Id</td><td>Name</td><td>Surname</td><td>Gender</td><td>Age</td></tr>
            <tr class="table-primary"><td>1</td><td>John</td><td>Doe</td><td>M</td><td>30</td></tr>
            <tr class="table-primary"><td>2</td><td>Jane</td><td>Doe</td><td>F</td><td>31</td></tr>
            <tr class="table-primary"><td>3</td><td>Will</td><td>Smith</td><td>M</td><td>25</td></tr>
            <tr class="table-primary"><td>4</td><td>Bill</td><td>Gates</td><td>M</td><td>56</td></tr>
        </table>
        </div>
</div>
</body>
</html>