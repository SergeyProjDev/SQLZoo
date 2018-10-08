<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf8" />
		<title>MySite</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<script> //сортировка
			window.addEventListener("DOMContentLoaded", function() {
				(function(f) {
					function g(c) {
						return function(b, a) {
							b = b.cells[c].textContent;
							a = a.cells[c].textContent;
							b = +b || b;
							a = +a || a;
							return b > a ? 1 : b < a ? -1 : 0
						}
					}
					var d = document.querySelector(f),
						e = [].slice.call(d.rows, 1);
					[].slice.call(d.rows[0].cells).forEach(function(c, b) {
						var a = 0;
						c.addEventListener("click", function() {
							e.sort(g(b));
							a && e.reverse();
							e.forEach(function(a) {
								d.appendChild(a)
							});
							a ^= 1
						})
					})
				})(".sortable1")
			});
			window.addEventListener("DOMContentLoaded", function() {
				(function(f) {
					function g(c) {
						return function(b, a) {
							b = b.cells[c].textContent;
							a = a.cells[c].textContent;
							b = +b || b;
							a = +a || a;
							return b > a ? 1 : b < a ? -1 : 0
						}
					}
					var d = document.querySelector(f),
						e = [].slice.call(d.rows, 1);
					[].slice.call(d.rows[0].cells).forEach(function(c, b) {
						var a = 0;
						c.addEventListener("click", function() {
							e.sort(g(b));
							a && e.reverse();
							e.forEach(function(a) {
								d.appendChild(a)
							});
							a ^= 1
						})
					})
				})(".sortable2")
			});
			window.addEventListener("DOMContentLoaded", function() {
				(function(f) {
					function g(c) {
						return function(b, a) {
							b = b.cells[c].textContent;
							a = a.cells[c].textContent;
							b = +b || b;
							a = +a || a;
							return b > a ? 1 : b < a ? -1 : 0
						}
					}
					var d = document.querySelector(f),
						e = [].slice.call(d.rows, 1);
					[].slice.call(d.rows[0].cells).forEach(function(c, b) {
						var a = 0;
						c.addEventListener("click", function() {
							e.sort(g(b));
							a && e.reverse();
							e.forEach(function(a) {
								d.appendChild(a)
							});
							a ^= 1
						})
					})
				})(".sortable3")
			});
		</script>
	</head>














	
	<body class="main_wrap">
		<!--блок с запросами-->
			<?php
				$connection = mysql_connect("localhost", "root", "fsociety");
				mysql_select_db("zoo");
				$query="";
			
			
			
				//отправка в таблицу "Сотрудники"
				if(isset($_POST['employee_send'])){ 	
					$name         = $_POST["employee_name"];
					$id_post      = $_POST["employee_id_post"];
					$salary       = $_POST["employee_salary"];
					$started_work = $_POST["employee_started_work"];
					$birth        = $_POST["employee_birth"];
					$sex          = $_POST["employee_sex"];
				
					$query = "INSERT INTO employee VALUES(
								NULL,
								'".$name."',
								".$id_post.",
								".$salary.",
								'".$started_work."',
								'".$birth."',
								'".$sex."'
							  );";
				    mysql_query($query);
				}
				
				//удаление из таблицы "Сотрудники"
				if(isset($_POST['remove_employee'])){ 						
					$query = "DELETE FROM employee WHERE id_employee=".$_POST["employee_toDelete"].";";
					mysql_query($query);
				}
				
	
				//отправка в таблицу "Животные"               
				if(isset($_POST['animal_send'])){ 	
					$name            = $_POST["name"];
					$id_cage         = $_POST["id_cage_inp"];
					$id_animal_class = $_POST["id_animal_class"];
					$predator        = $_POST["predator"];
					$sex             = $_POST["animal_sex"];
					$weight          = $_POST["weight"];
					$height          = $_POST["height"];
					$need_warm       = $_POST["need_warm"];
					$birth_date      = $_POST["birth_date"];
					$id_birth_place  = $_POST["id_birth_place"];
					$id_gone_place   = $_POST["id_gone_place"];
					$arrived_date    = $_POST["arrived_date_inp"];
					$gone_date       = $_POST["gone_date_inp"];
				
					if ($id_gone_place == "") $id_gone_place = "NULL";
					if ($arrived_date == "") $arrived_date = "NULL";
						else $arrived_date = "'".$arrived_date."'";
					if ($gone_date == "") $gone_date = "NULL";
						else $gone_date = "'".$gone_date."'";
					
					$query = "INSERT INTO animal VALUES(
								NULL,
								'".$name."',
								".$id_cage.",
								".$id_animal_class.",
								'".$predator."',
								'".$sex."',
								".$weight.",
								".$height.",
								'".$need_warm."',
								'".$birth_date."',
								".$id_birth_place.",
								".$id_gone_place.",
								".$arrived_date.",
								".$gone_date."
							  );";
				    mysql_query($query);
					
					
					
					$w_id = mysql_insert_id();
					if ($arrived_date.is_null) $arrived_date = $birth_date;	
					$query = "INSERT INTO animal_cage VALUES(
								".$w_id.",
								".$id_cage.",
								'".$arrived_date."',
								NULL
							  );";
					mysql_query($query);	
								
				}
				
				//удаление из таблицы "Животные"
				if(isset($_POST['remove_animal'])){ 
					$del = $_POST['animal_toDelete'];	
					$query = "DELETE FROM animal WHERE id_animal = $del;";
					
					mysql_query($query);
				}                                                       
					
				//кастомный запрос печать струдников
				if(isset($_POST['castom_query_print_employee'])){
					$where = $_POST['where_employe'];
					$colname = $_POST['colname_employe'];
					$todo = $_POST['todo_employe'];
					$value = $_POST['value_employe'];
					
					$conn = new mysqli("localhost", "root", "fsociety", "zoo");
					if ($where==";") $query = "SELECT * FROM employee;";
						else 
							if (ctype_digit($value)) $query = "SELECT * FROM employee WHERE $colname $todo $value ORDER BY $colname;";
								else
									if ($todo == "") $query = "SELECT * FROM employee WHERE $colname $value ORDER BY $colname;";
										else $query = "SELECT * FROM employee WHERE $colname $todo '$value' ORDER BY $colname;";
											
					
					$result = $conn->query($query);
					
					echo "<script>
							var winPrint = window.open('', '', 'left=100,top=100,width=800,height=600,toolbar=0,scrollbars=0,status=0');
							winPrint.document.write('<table style=\"border-color: Black; width: 98%; margin-left: 2%; margin-right: 2%;\" class=\"sortable\" id=\"sortable\" border=\"1px\">');
							winPrint.document.write('<tr  id=\"zag\">');
							winPrint.document.write('<td class=\"sortable\" style=\"width: 3%;  cursor: pointer\"><center> ID</center></td>');
							winPrint.document.write('<td class=\"sortable\" style=\"width: 40%; cursor: pointer\"><center> Ф. И. О.</center></td>');
							winPrint.document.write('<td class=\"sortable\" style=\"width: 1%;  cursor: pointer\"><center> ID Должности</center></td>');
							winPrint.document.write('<td class=\"sortable\" style=\"width: 10%; cursor: pointer\"><center> Зарплата</center></td>');
							winPrint.document.write('<td class=\"sortable\" style=\"width: 20%; cursor: pointer\"><center> Работает с</center></td>');
							winPrint.document.write('<td class=\"sortable\" style=\"width: 20%; cursor: pointer\"><center> День рождения</center></td>');
							winPrint.document.write('<td class=\"sortable\" style=\"width: 2%;  cursor: pointer\"><center> Пол</center></td>');
							winPrint.document.write('</tr>');
						  ";
					
					while($row = $result->fetch_assoc()) {
						echo "winPrint.document.write('<tr>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['id_employee']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['name']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['id_post']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['salary']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['started_work']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['birth']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['sex']."</center></td>');
							  winPrint.document.write('</tr>');";
								$count++;
						}
					
					echo "winPrint.document.write('</table>');
						winPrint.document.write('<div style=\"float: right; margin-right: 5%\">Всего записей: ".$count." </div>');
						winPrint.document.close();
						winPrint.print();
						winPrint.close();
						winPrint.focus();
	
					</script>";
					
					$conn->close();	
				}
						
				//кастомный запрос печать животных
				if(isset($_POST['castom_query_print_animal'])){
					$where = $_POST['where_animal'];
					$colname = $_POST['colname_animal'];
					$todo = $_POST['todo_animal'];
					$value = $_POST['value_animal'];
					
					
					$conn = new mysqli("localhost", "root", "fsociety", "zoo");
					if ($where==";") 
						$query = "SELECT * FROM animal;";
							else 
								if (ctype_digit($value)) $query = "SELECT * FROM animal WHERE $colname $todo $value;";
										else 
											if ($todo.is_null) $query = "SELECT * FROM animal WHERE $colname $value;";
												else 
													$query = "SELECT * FROM animal WHERE $colname $todo '$value';";
					
					$result = $conn->query($query);
					echo "<script>
							var winPrint = window.open('', '', 'left=100,top=100,width=800,height=600,toolbar=0,scrollbars=0,status=0');
							winPrint.document.write('<table style=\"border-color: Black; width: 98%; margin-left: 2%; margin-right: 2%;\" class=\"sortable\" id=\"sortable\" border=\"1px\">');
							winPrint.document.write('<tr  id=\"zag\">');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 3%;  cursor: pointer\"><center> ID</center></td> 			');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 40%; cursor: pointer\"><center> Кличка</center></td> 		');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 1%;  cursor: pointer\"><center> ID клетки</center></td> 		');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 10%; cursor: pointer\"><center> ID класса</center></td> 		');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 20%; cursor: pointer\"><center> Хищ / Трав</center></td> 	');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 20%; cursor: pointer\"><center> Пол</center></td> 			');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 2%;  cursor: pointer\"><center> Вес</center></td> 			');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 3%;  cursor: pointer\"><center> Рост</center></td> 			');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 20%; cursor: pointer\"><center> Дата рождения</center></td> 	');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 40%; cursor: pointer\"><center> Тепло</center></td> 			');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 10%; cursor: pointer\"><center> ID где родился</center></td> ');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 1%;  cursor: pointer\"><center> ID куда уехал</center></td> 	');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 1%;  cursor: pointer\"><center> Дата приезда</center></td> 	');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 20%; cursor: pointer\"><center> Дата ухода</center></td> 	');
							winPrint.document.write('</tr>');
						  ";
					
					while($row = $result->fetch_assoc()) {
						echo "
							winPrint.document.write('<tr>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['id_animal']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['name']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['id_cage']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['id_animal_class']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['predator']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['sex']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['weight']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['height']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['birth_date']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['need_warm']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['id_birth_place']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['id_gone_place']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['arrived_date']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['gone_date']."</center></td>');
							winPrint.document.write('</tr>');";
							$count++;
						}
					
					echo "winPrint.document.write('</table>');
						winPrint.document.write('<div style=\"float: right; margin-right: 5%\">Всего записей: ".$count." </div>');
						winPrint.document.close();
						winPrint.print();
						winPrint.close();
						winPrint.focus();
	
					</script>";
				}

				//кастомный запрос печать животных_сотрудников
				if(isset($_POST['castom_query_print_animal_employee'])){
					$where = $_POST['where_animal_employee'];
					$colname = $_POST['colname_animal_employee'];
					$todo = $_POST['todo_animalemployee'];
					$value = $_POST['value_animal_employee'];
					
					$conn = new mysqli("localhost", "root", "fsociety", "zoo");
					if ($where==";") 
						$query = "SELECT * FROM animal_employee ORDER BY date_ends;";
							else 
								if (ctype_digit($value)) $query = "SELECT * FROM animal_employee WHERE $colname $todo $value ORDER BY $colname;";
										else $query = "SELECT * FROM animal_employee WHERE $colname $todo '$value' ORDER BY $colname;";
											
					if ($todo == "") $query = "SELECT * FROM animal_employee WHERE $colname $value ORDER BY $colname;";
									
					$result = $conn->query($query);
					echo "<script>
							var winPrint = window.open('', '', 'left=100,top=100,width=800,height=600,toolbar=0,scrollbars=0,status=0');
							winPrint.document.write('<table style=\"border-color: Black; width: 98%; margin-left: 2%; margin-right: 2%;\" class=\"sortable\" id=\"sortable\" border=\"1px\">');
							winPrint.document.write('<tr>');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 10%;  cursor: pointer\"><center> ID животного</center></td> 			');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 10%; cursor: pointer\"><center> ID сотрудника</center></td> 		');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 30%;  cursor: pointer\"><center> Взят на учет</center></td> 		');
								winPrint.document.write('<td class=\"sortable\" style=\"width: 30%; cursor: pointer\"><center> Снят с учета</center></td> 		');
							winPrint.document.write('</tr>');
						  ";
					
					while($row = $result->fetch_assoc()) {
						echo "
							winPrint.document.write('<tr>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['id_animal']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['id_employee']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['date_starts']."</center></td>');
								winPrint.document.write('<td class=\"sortable_body\"><center>".$row['date_ends']."</center></td>');
							winPrint.document.write('</tr>');";
							$count++;
						}
					
					echo "winPrint.document.write('</table>');
						winPrint.document.write('<div style=\"float: right; margin-right: 5%\">Всего записей: ".$count." </div>');
						winPrint.document.close();
						winPrint.print();
						winPrint.close();
						winPrint.focus();
	
					</script>";
					
					$conn->close();	
				}
				
				//переселить
				if(isset($_POST['update_cage'])){
					$id_animal = $_POST['id_animal_lv'];
					$id_cage = $_POST['id_cage_lv'];
					$date = $_POST['date_lv'];
					
					
					$query = "UPDATE animal SET id_cage = ".$id_cage." WHERE id_animal = ".$id_animal.";";
					mysql_query($query);
					
					$query = "UPDATE animal_cage SET gone_date = '".$date."' WHERE id_animal = ".$id_animal." AND gone_date IS NULL;";
					mysql_query($query);
					
					$query = "INSERT INTO animal_cage VALUES (".$id_animal.", ".$id_cage.", '".$date."', NULL)";
					mysql_query($query);
				}
				
				//история переселений показать
				if (isset($_POST['show_animal_cage'])){
					$id_animal = $_POST['id_animal_for_find'];
					$query = "SELECT * FROM animal_cage WHERE id_animal = ".$id_animal.";";
					$result = mysql_query($query);
					
					
					echo "<script>
							var winPrint = window.open('', '', 'left=100,top=100,width=800,height=600,toolbar=0,scrollbars=0,status=0');
							winPrint.document.write('<title>".$query."</title>  <br /><br />');
								winPrint.document.write('<table style=\"border-color: Black; width: 98%; margin-left: 2%; margin-right: 2%;\" class=\"sortable\" id=\"sortable\" border=\"1px\">');
								winPrint.document.write('<tr>');
									winPrint.document.write('<td class=\"sortable\" style=\"width: 10%;  cursor: pointer\"><center> ID Животного</center></td> 			');
									winPrint.document.write('<td class=\"sortable\" style=\"width: 10%;  cursor: pointer\"><center> ID клетки</center></td> 		');
									winPrint.document.write('<td class=\"sortable\" style=\"width: 20%; cursor: pointer\"><center> Дата заезда</center></td> 		');
									winPrint.document.write('<td class=\"sortable\" style=\"width: 20%; cursor: pointer\"><center> Дата Выезда</center></td> 		');
								winPrint.document.write('</tr>');";
							
							$count = 0;
							while($row = mysql_fetch_array($result)){
								echo "
									winPrint.document.write('<tr>');
										winPrint.document.write('<td class=\"sortable_body\"><center>".$row['id_animal']."</center></td>');
										winPrint.document.write('<td class=\"sortable_body\"><center>".$row['id_cage']."</center></td>');
										winPrint.document.write('<td class=\"sortable_body\"><center>".$row['come_date']."</center></td>');
										winPrint.document.write('<td class=\"sortable_body\"><center>".$row['gone_date']."</center></td>');
									winPrint.document.write('</tr>');";
									$count++;
							}
					

					echo "winPrint.document.write('</table>');
							winPrint.document.write('<div style=\"float: right; margin-right: 5%\">Всего записей: ".$count." </div>');
							winPrint.document.close();
							winPrint.print();
							winPrint.close();
							winPrint.focus();
	
						</script>";		
				}
				
				//взят на учет
				if(isset($_POST['employee_animals'])){
					$id_animal = $_POST['id_animal_empl'];
					$id_employee = $_POST['id_employee_anim'];
					$date = $_POST['date_empl'];
					
					$query = "INSERT INTO animal_employee VALUES ($id_animal, $id_employee, '$date', NULL)";
					mysql_query($query);
				}
				
				//снят с учета
				if(isset($_POST['animals_employee'])){
					$id_animal = $_POST['id_animal_empl_out'];
					$id_employee = $_POST['id_employee_anim_out'];
					$date = $_POST['date_empl_out'];
					
					$query = "UPDATE animal_employee SET date_ends = '$date' WHERE id_animal = $id_animal AND id_employee = $id_employee;";
					mysql_query($query);
				}
				
				mysql_close;
			?>		
		<!--блок с запросами-->
	
	
	
		<form action="index.php" method="POST">
		<center>
			<div class="header">
				<img style="margin-top: 25px" src="images/headerImages/logo.png" />
				<h1 style="background: yellow">Добро пожаловать в MySQL зоопарк!</h1>
			</div>
			<div class="wrapper">
				
				<!-- Развертка страницы -->
				
					<!-- ввод данных о новом сотруднике, показ таблицы "Должности" и "Сотрудники"-->
						<table style="margin-left: 10%; width:650px"> <!--Новый сотрудник-->
						<tr>
							<td>Ф. И. О. сотрудника:</td>
							<td><center><input style="width: 250px; text-align: center" type="text" value="" name="employee_name"/></center></td>
							<td rowspan="6"> 
								<?php //показать таблицу "Должности"
									$connection = mysql_connect("localhost", "root", "fsociety");
									mysql_select_db("zoo");
						
									$query = "SELECT * FROM post;";
									$result = mysql_query($query);
									
									echo "<table style=\"border-color: DarkRed; margin-left: 2%; margin-right: 2%;\" class=\"sortable\" id=\"sortable\" border=\"3px\">
										<tr  id=\"zag\">
											<td class=\"sortable\" style=\"сursor: pointer\"><center> ID </center></td>
											<td class=\"sortable\" style=\"cursor: pointer\"><center> Название должности </center></td>
										</tr>";
										
									while($row = mysql_fetch_array($result))
									{ 
										echo "<tr>
												<td class=\"sortable_body\">".$row['id_post']."</td>
												<td class=\"sortable_body\">".$row['post_name']."</td>
											</tr>";
									}
						
									echo "</table>"; 
									mysql_close();
								?>
							</td>
						</tr>
						<tr>
							<td>ID должность:</td>
							<td>
								<center>
									<select style="width: 100px; text-align: center" type="text"  name="employee_id_post">
										<option>1</option>   
										<option>2</option>   
										<option>3</option>
										<option>4</option>   
										<option>5</option>
									</select>
								</center>
							</td>
						</tr>
						<tr>
							<td>Зарплата:</td>
							<td>
								<center>
									<input style="width: 150px; text-align: center" type="number" value="" name="employee_salary" />
								</center>
							</td>
						</tr>
						<tr>
							<td>Принят на работу:</td>
							<td>
								<center>
									<input style="width: 150px; text-align: center" type="text" value="" placeholder="гггг-мм-дд" name="employee_started_work" 
											pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" 
											oninvalid="setCustomValidity('Неверный формат даты. Требуемый формат: 9999-12-31')"/>
								</center>
							</td>
						</tr>
						<tr>
							<td>День рождения:</td>
							<td>
								<center>
									<input style="width: 150px; text-align: center" type="text" value="" placeholder="гггг-мм-дд" name="employee_birth"
												pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" 
												oninvalid="setCustomValidity('Неверный формат даты. Требуемый формат: 9999-12-31')"/>
								</center>
							</td>
						</tr>
						<tr>
							<td>Пол:</td>
							<td>
								<center>
									<select style="width: 100px; text-align: center" type="text"  name="employee_sex">
											<option>м</option>
											<option>ж</option>
									</select>
								</center>
							</td>
						</tr>
						<tr> 
							<td><p>   </p></td>
						</tr>
						<tr>
							<td colspan="2"><center><input type="submit" name="employee_send" value="Отправить"/></center></td>
						</tr>
						<tr> <!-- добавление сотрудника -->
							<td><p>   </p></td>
						</tr>
						<tr> <!-- удаление сотрудника -->
							<td colspan="2">
								<center>
									<input style="float: left; text-align: center;margin-left: 100px; width: 50px" type="number" name="employee_toDelete"/>
									<input style="float: left" type="submit" name="remove_employee" value="Удалить сотрудника"/>
								</center>
							</td>
						</tr>
						<tr> 
							<td><p>   </p></td>
						</tr>
						</table>
						<?php //Сотрудники вывод
							$connection = mysql_connect("localhost", "root", "fsociety");
							mysql_select_db("zoo");
		
							$query = "SELECT * FROM employee;";
							$result = mysql_query($query);
		
							
							echo "
								<table style=\"border-color: DarkRed; width: 90%; margin-left: 2%; margin-right: 2%;\" class=\"sortable1\" id=\"sortable1\" border=\"3px\">
								<tr  id=\"zag\">
									<td class=\"sortable\" style=\"width: 3%; cursor: pointer\"><center> ID</center></td>
									<td class=\"sortable\" style=\"width: 30%;cursor: pointer\"><center> Ф. И. О.</center></td>
									<td class=\"sortable\" style=\"width: 2%; cursor: pointer\"><center> ID Должности</center></td>
									<td class=\"sortable\" style=\"width: 10%; cursor: pointer\"><center> Зарплата</center></td>
									<td class=\"sortable\" style=\"width: 20%;cursor: pointer\"><center> Работает с</center></td>
									<td class=\"sortable\" style=\"width: 20%;cursor: pointer\"><center> День рождения</center></td>
									<td class=\"sortable\" style=\"width: 2%; cursor: pointer\"><center> Пол</center></td>
								</tr>
								";
							
						
						
							while($row = mysql_fetch_array($result))
							{ 
								echo "<tr>
										<td class=\"sortable_body\"><center>".$row['id_employee']."</center></td>
										<td class=\"sortable_body\"><center>".$row['name']."</center></td>
										<td class=\"sortable_body\"><center>".$row['id_post']."</center></td>
										<td class=\"sortable_body\"><center>".$row['salary']."</center></td>
										<td class=\"sortable_body\"><center>".$row['started_work']."</center></td>
										<td class=\"sortable_body\"><center>".$row['birth']."</center></td>
										<td class=\"sortable_body\"><center>".$row['sex']."</center></td>
									</tr>";
							}
		
							echo "</table>";
								$a = mysql_query("SELECT COUNT(1) FROM employee");
								$b = mysql_fetch_array( $a );	
								echo "<div style=\"float: right; margin-right: 5%\"> Всего записей:".$b[0]."</div>";
							mysql_close();
						?>		
						
						<div style="margin-top: 10px"/>
						
						<div class="tooltip"> <!--запрос на печать-->
							SELECT * FROM employee
								<select name="where_employe">
									<option>WHERE</option>
									<option>;</option>
								</select>
								<select name="colname_employe">
									<option>id_employee</option>
									<option>name</option>
									<option>id_post</option>
									<option>salary</option>
									<option>started_work</option>
									<option>birth</option>
									<option>sex</option>				
								</select>
								<select name="todo_employe"> 
									<option>&lt;</option>   
									<option>&lt;=</option>   
									<option>=</option>   
									<option>&gt;=</option>     
									<option>&gt;</option>	 
									<option></option>
								</select>
							<input style="width: 250px; text-align: left" type="text" name="value_employe"/>;
							<input type="submit" name="castom_query_print_employee" value="Ok"/>
							<span class="tooltiptext">
								ID - id_employee <br>
								Ф. И. О. - name <br>
								ID Должности - id_post <br>
								Зарплата - salary <br>
								Работает с - started_work <br>
								День рождения - birth <br>
								Пол - sex
							</span>
						</div>
						
						<div style="margin-top: 150px" />
					<!-- ввод данных о новом сотруднике, показ таблицы "Должности" и "Сотрудники"-->
					

					
					<hr style="border-color:DarkRed">
					
					
					
					<!-- вывод данных о новом животном, показ таблицы "Классы", "Зоопарки", "Клетки" и "Животные" -->
						<div style="margin-top: 10px" />
						<table style="margin-left: 2%; margin-right: 2%; width:800px"> 
							<tr>
								<td>Кличка животного:</td>
								<td><center><input style="width: 100px; text-align: center" type="text" value="" name="name"/></center></td>
								<td rowspan="13"> 
									<center>
										<?php //показать таблицу "Классы"
										$connection = mysql_connect("localhost", "root", "fsociety");
										mysql_select_db("zoo");
							
										$query = "SELECT * FROM animal_class;";
										$result = mysql_query($query);
										
										echo "<table style=\"border-color: DarkRed; margin-left: 2%; margin-right: 2%;\" class=\"sortable\" id=\"sortable\" border=\"3px\">
											<tr  id=\"zag\">
												<td class=\"sortable\" style=\"сursor: pointer\"><center> ID </center></td>
												<td class=\"sortable\" style=\"cursor: pointer\"><center> Название класса </center></td>
											</tr>";
											
										while($row = mysql_fetch_array($result))
										{ 
											echo "<tr>
													<td class=\"sortable_body\">".$row['id_animal_class']."</td>
													<td class=\"sortable_body\">".$row['animal_class_name']."</td>
												</tr>";
										}
							
										echo "</table>"; 
										mysql_close();
									?>
											<div style="margin-top: 25px"/>
										<?php //показать таблицу "Клетки"
										$connection = mysql_connect("localhost", "root", "fsociety");
										mysql_select_db("zoo");
							
										$query = "SELECT * FROM cage;";
										$result = mysql_query($query);
										
										echo "<table style=\"border-color: DarkRed; margin-left: 2%; margin-right: 2%;\" class=\"sortable\" id=\"sortable\" border=\"3px\">
											<tr  id=\"zag\">
												<td class=\"sortable\" style=\"сursor: pointer\"><center> ID </center></td>
												<td class=\"sortable\" style=\"cursor: pointer\"><center> Клетки </center></td>
											</tr>";
											
										while($row = mysql_fetch_array($result))
										{ 
											echo "<tr>
													<td class=\"sortable_body\">".$row['id_cage']."</td>
													<td class=\"sortable_body\">".$row['cage_type']."</td>
												</tr>";
										}
							
										echo "</table>"; 
										mysql_close();
									?>
									</center>
								</td>
								<td style="width: 250px" rowspan="13">
									<?php //показать таблицу "Зоопарки"
										$connection = mysql_connect("localhost", "root", "fsociety");
										mysql_select_db("zoo");
							
										$query = "SELECT * FROM zoos;";
										$result = mysql_query($query);
										
										echo "<table style=\"width: 98%; margin-left: 1%; margin-right: 1%; border-color: DarkRed;\" class=\"sortable\" id=\"sortable\" border=\"3px\">
											<tr>
												<td class=\"sortable\"><center> ID </center></td>
												<td class=\"sortable\"><center> Название зоопарка </center></td>
											</tr>";
											
										while($row = mysql_fetch_array($result))
										{ 
											echo "<tr>
													<td class=\"sortable_body\"><center>".$row['id_zoo']."</center></td>
													<td class=\"sortable_body\">".$row['zoo_name']."</td>
												</tr>";
										}
							
										echo "</table>"; 
										
										mysql_close();
									?>
								</td>
							</tr>
							<tr>
								<td>ID класса:</td>
								<td><center><input style="width: 50px; text-align: center" type="number" value="" name="id_animal_class" /></center></td>
							</tr>
							<tr>
								<td>ID клетки:</td>
								<td><center><input style="width: 50px; text-align: center" type="number" value="" name="id_cage_inp" /></center></td>
							</tr>
							<tr>
								<td>Хищник/Травоядное:</td>
								<td>
									<center><select style="width: 50px; text-align: center" type="text" name="predator" >
												<option>х</option>
												<option>т</option>
											</select>
									</center>
								</td>
							</tr>
							<tr>
								<td>Пол:</td>
								<td>
									<center><select style="width: 50px; text-align: center" type="text" name="animal_sex">
												<option>м</option>
												<option>ж</option>
											</select>
									</center>
								</td>
							</tr>
							<tr>
								<td>Рост:</td>
								<td><center><input style="width: 75px; text-align: center" type="number" value="" step="any" name="height" /></center></td>
							</tr>
							<tr>
								<td>Вес:</td><td><center><input style="width: 75px; text-align: center" type="number" step="any" value="" name="weight" /></center></td>
							</tr>
							<tr>
								<td>Теплолюбивое/Холодостойкое:</td>
								<td><center><select style="width: 50px; text-align: center" type="text" name="need_warm">
												<option>т</option>
												<option>х</option>
											</select>
								</center>
								</td>
							</tr>
							<tr>
								<td>День рождения:</td>
								<td><center><input style="width: 150px; text-align: center" type="text" value="" placeholder="гггг-мм-дд" name="birth_date" 
													pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" 
													oninvalid="setCustomValidity('Неверный формат даты. Требуемый формат: 9999-12-31')"/>
								</center>
								</td>
							</tr>
							<tr>
								<td>ID места рождения:</td><td><center><input style="width: 50px; text-align: center" type="number" value="" name="id_birth_place" /></center></td>
							</tr>
							<tr>
								<td>(*)ID места продажи (ухода):</td><td><center><input style="width: 50px; text-align: center" type="number" value="" name="id_gone_place" /></center></td>
							</tr>
							<tr>
								<td>(*)Дата прибытия:</td>
								<td><center><input style="width: 100px; text-align: center" type="text" value="" name="arrived_date_inp" 
													pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" 
													oninvalid="setCustomValidity('Неверный формат даты. Требуемый формат: 9999-12-31')"/>
								</center>
								</td>
							</tr>
							<tr>
								<td>(*)Дата продажи (ухода):</td>
								<td><center><input style="width: 100px; text-align: center" type="text" value="" name="gone_date_inp" 
													pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" 
													oninvalid="setCustomValidity('Неверный формат даты. Требуемый формат: 9999-12-31')"/>
								</center>
								</td>
							</tr>
							<tr>
								<!-- добавление животного -->
								<td colspan="2"><center><input type="submit" name="animal_send" value="Отправить"/></center></td>
							</tr>
							<tr> 
								<td><p>   </p></td>
							</tr>
							<tr>
								<!-- удаление животного -->
								<td colspan="2">
								<div style="float: left; margin-left: 100px">ID:</div>
									<center>
										<input style="float: left; text-align: center; margin-left: 5px; width: 50px" type="number" name="animal_toDelete">
										<input style="float: left; margin-left: 5px;" type="submit" name="remove_animal" value="Удалить Животное"/>
									</center>
								</td>
							</tr>
							<tr> 
								<td><p>   </p></td>
							</tr>
						</table>
					
					
					<?php //"Животные вывод"
						$connection = mysql_connect("localhost", "root", "fsociety");
						mysql_select_db("zoo");
		
						$query = "SELECT * FROM animal;";
						$result = mysql_query($query);
		
						
						echo "<table style=\"border-color: DarkRed; width: 98%; margin-left: 1%; margin-right: 1%;\" class=\"sortable2\" id=\"sortable2\" border=\"3px\">
							<tr  id=\"zag\">
								<td class=\"sortable\" style=\"width: 5%; cursor: pointer\"><center> ID</center></td>
								<td class=\"sortable\" style=\"width: 15%;cursor: pointer\"><center> Кличка</center></td>
								<td class=\"sortable\" style=\"width: 5%; cursor: pointer\"><center> ID клетки</center></td>
								<td class=\"sortable\" style=\"width: 5%; cursor: pointer\"><center> ID класса</center></td>
								<td class=\"sortable\" style=\"width: 5%; cursor: pointer\"><center> Хищ. / траво.</center></td>
								<td class=\"sortable\" style=\"width: 5%; cursor: pointer\"><center> Пол</center></td>
								<td class=\"sortable\" style=\"width: 10%;cursor: pointer\"><center> Вес</center></td>
								<td class=\"sortable\" style=\"width: 10%;cursor: pointer\"><center> Рост</center></td>
								<td class=\"sortable\" style=\"width: 5%; cursor: pointer\"><center> Тепло</center></td>
								<td class=\"sortable\" style=\"width: 10%;cursor: pointer\"><center> Дата рождения</center></td>
								<td class=\"sortable\" style=\"width: 5%; cursor: pointer\"><center> ID где родился</center></td>
								<td class=\"sortable\" style=\"width: 5%; cursor: pointer\"><center> ID куда уехал</center></td>
								<td class=\"sortable\" style=\"width: 10%;cursor: pointer\"><center> Дата прибытия</center></td>
								<td class=\"sortable\" style=\"width: 10%;cursor: pointer\"><center> Дата ухода</center></td>
							</tr>";
						
					
					
						while($row = mysql_fetch_array($result))
						{ 
							echo "<tr>
									<td class=\"sortable_body\"><center>".$row['id_animal']."</center></td>
									<td class=\"sortable_body\"><center>".$row['name']."</center></td>
									<td class=\"sortable_body\"><center>".$row['id_cage']."</center></td>
									<td class=\"sortable_body\"><center>".$row['id_animal_class']."</center></td>
									<td class=\"sortable_body\"><center>".$row['predator']."</center></td>
									<td class=\"sortable_body\"><center>".$row['sex']."</center></td>
									<td class=\"sortable_body\"><center>".$row['weight']."</center></td>
									<td class=\"sortable_body\"><center>".$row['height']."</center></td>
									<td class=\"sortable_body\"><center>".$row['need_warm']."</center></td>
									<td class=\"sortable_body\"><center>".$row['birth_date']."</center></td>
									<td class=\"sortable_body\"><center>".$row['id_birth_place']."</center></td>
									<td class=\"sortable_body\"><center>".$row['id_gone_place']."</center></td>
									<td class=\"sortable_body\"><center>".$row['arrived_date']."</center></td>
									<td class=\"sortable_body\"><center>".$row['gone_date']."</center></td>
								</tr>";
						}
		
						echo "</table>";
							$a = mysql_query("SELECT COUNT(1) FROM animal");
							$b = mysql_fetch_array( $a );	
							echo "<div style=\"float: right; margin-right: 5%\"> Всего записей:".$b[0]."</div>";
						mysql_close();
					?>		
					<div style="margin-top: 20px" />
					<div class="tooltip">
						SELECT * FROM animal 
							<select name="where_animal">
								<option>WHERE</option>                          <option>;</option>
							</select>
							<select name="colname_animal">
								<option>id_animal</option>				<option>name</option>
								<option>id_cage</option>				<option>id_animal_class</option>
								<option>predator</option>				<option>sex</option>
								<option>weight</option>                 <option>height</option>
								<option>need_warm</option>				<option>birth_date</option>
								<option>id_birth_place</option>			<option>id_gone_place</option>
								<option>arrived_date</option>			<option>gone_date</option>											
							</select>
							<select name="todo_animal"> 
								<option><</option>    <option><=</option>   
								<option>=</option>    <option>>=</option>     
								<option>></option>    <option></option>
							</select>
						<input style="width: 250px; text-align: left" type="text" name="value_animal"/>;
						<input type="submit" name="castom_query_print_animal" value="Ok"/>
						<span class="tooltiptext">
							ID - id_animal <br>
							Кличка - name <br>
							ID Клетки - id_cage <br>
							ID Класса - id_animal_class <br>
							Хищ./Трав. - predator <br>
							Пол - sex <br>
							Вес - weight <br>
							Рост - height  <br>
							Тепло - need_warm <br>
							Дата рождения - birth_date <br>
							ID родился - id_birth_place <br>
							ID переехал - id_gone_place <br>
							Дата прибытия - arrived_date <br>
							Дата ухода - gone_date
						</span>
					</div>
					
						
					<div style="margin-top: 150px" />
					<!-- вывод данных о новом животном, показ таблицы "Классы", "Зоопарки", "Клетки" и "Животные" -->
				
				
				
					<hr>
					<!--UPDATE animal cage -->
					<h4>Переселить животное</h4>
						<table>
							<tr>
								<td>ID животного</td>
								<td><input style="weight: 150px" type="number" name="id_animal_lv"/></td>
							</tr>
							<tr>
								<td>Новая клетка</td>
								<td><input style="weight: 150px" type="number" name="id_cage_lv"/></td>
							</tr>
							<tr>
								<td>Дата переселения</td>
								<td><input style="weight: 150px" type="text" name="date_lv"
										pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" 
										oninvalid="setCustomValidity('Неверный формат даты. Требуемый формат: 9999-12-31')"/>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<center>
										<input type="submit" value="Переселить" name="update_cage"/>
									</center>
								</td>
							</tr>
						</table>
						<br>
						ID животного: <input type="number" name="id_animal_for_find" style="weight: 150px"/><input type="submit" name="show_animal_cage" value="История проживания"/>
					<!--UPDATE animal cage -->
				
				
					<br><br><hr><br>
				
				
					<!--животное-сотрудник-->
					<h4>Животное-сотрудник</h4>
						<table>
							<tr>
								<td>ID животного</td>
								<td><input style="weight: 150px" type="number" name="id_animal_empl"/></td>
								<td style="weight: 150px"></td>
								<td>ID животного</td>
								<td><input style="weight: 150px" type="number" name="id_animal_empl_out"/></td>
							</tr>
							<tr>
								<td>ID сотрудника </td>
								<td><input style="weight: 150px" type="number" name="id_employee_anim"/></td>
								<td style="weight: 150px"></td>
								<td>ID сотрудника</td>
								<td><input style="weight: 150px" type="number" name="id_employee_anim_out"/></td>
							</tr>
							<tr>
								<td>Взят на учет (дата)</td>
								<td><input style="weight: 150px" type="text" name="date_empl" placeholder="гггг-мм-дд"
										pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" 
										oninvalid="setCustomValidity('Неверный формат даты. Требуемый формат: 9999-12-31')"/>
								</td>
								<td style="weight: 150px"></td>
								<td>Снят с учета (дата)</td>
								<td><input style="weight: 150px" type="text" name="date_empl_out" placeholder="гггг-мм-дд"
										pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" 
										oninvalid="setCustomValidity('Неверный формат даты. Требуемый формат: 9999-12-31')"/>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<center>
										<input type="submit" value="Взят на учет" name="employee_animals"/>
									</center>
								</td>
								<td style="weight: 150px"></td>
								<td colspan="2">
									<center>
										<input type="submit" value="Снят c учета" name="animals_employee"/>
									</center>
								</td>
							</tr>
						</table>
						<div style="margin-top: 25px"/>
						<?php //"Животные_сотрудники" надо написать
						$connection = mysql_connect("localhost", "root", "fsociety");
						mysql_select_db("zoo");
		
						$query = "SELECT * FROM animal_employee;";
						
						$result = mysql_query($query);
		
						
						echo "<table style=\"border-color: DarkRed; width: 90%; margin-left: 5%; margin-right: 5%;\" class=\"sortable3\" id=\"sortable3\" border=\"3px\">
							<tr>
								<td class=\"sortable\" style=\"width: 10%; cursor: pointer\"><center> ID животного</center></td>
								<td class=\"sortable\" style=\"width: 10%; cursor: pointer\"><center> ID сотрудника</center></td>
								<td class=\"sortable\" style=\"width: 40%; cursor: pointer\"><center> Дата взятия на учет</center></td>
								<td class=\"sortable\" style=\"width: 40%; cursor: pointer\"><center> Дата снятия с учета</center></td>
							</tr>";
						
					
					
						while($row = mysql_fetch_array($result))
						{ 
							echo "<tr>
									<td class=\"sortable_body\"><center>".$row['id_animal']."</center></td>
									<td class=\"sortable_body\"><center>".$row['id_employee']."</center></td>
									<td class=\"sortable_body\"><center>".$row['date_starts']."</center></td>
									<td class=\"sortable_body\"><center>".$row['date_ends']."</center></td>
								</tr>";
						}
		
						echo "</table>";
							
						mysql_close();
					?>
						<div style="margin-top: 20px" />
								<div class="tooltip">
									SELECT * FROM animal_employee 
										<select name="where_animal_employee">
											<option>WHERE</option>                          <option>;</option>
										</select>
										<select name="colname_animal_employee">
											<option>id_animal</option>				<option>id_employee</option>
											<option>date_starts</option>			<option>date_ends</option>										
										</select>
									<select name="todo_animalemployee"> 
										<option><</option>   <option><=</option>   
										<option>=</option>    <option>>=</option>     
										<option>></option>    <option><pre></pre></option>
									</select>
									<input style="width: 250px; text-align: left" type="text" name="value_animal_employee"/>;
									<input type="submit" name="castom_query_print_animal_employee" value="Ok"/>
									<span class="tooltiptext">
										ID животного - id_animal <br>
										ID сотрудника - id_employee <br>
										Взят на учет - date_starts <br>
										Дата снятия с учета - date_ends
									</span>
								</div>	
						<div style="margin-top: 150px"/>
						<hr>
					<!--животное-сотрудник-->
				
				
				
				
				
				
					
				<!-- Развертка страницы -->
				
			</div>
					
				
		</center>
		</form>
	</body>
</html>