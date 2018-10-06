<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8" />
		<title>MySite</title>
		<link rel="stylesheet" type="text/css" href="styles/main_page.css" />
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
				})(".sort1")
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
				})(".sort2")
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
				})(".sort3")
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
				})(".sort4")
			});
		</script>
	</head>
  
  
	<body class="main_wrap">
		<?php //запросы в БД						
			$connection = mysql_connect("localhost", "root", "fsociety");
			mysql_select_db("zoo");
				
				
			//отправка в таблицу "Животные"
			if(isset($_POST['animal_send'])){ 	
				$name         = $_POST["animal_name"];
				$breed        = $_POST["animal_breed"];
				$animal_class = $_POST["animal_class"];
				$birth_date   = $_POST["animal_birth_date"];
				$birth_place  = $_POST["animal_birth_place"];
				$id_employee  = $_POST["animal_id_employee"];
				$photo_dir    = $_POST["animal_photo_dir"];
				$id_parent1   = $_POST["animal_id_parent1"];
				$id_parent2   = $_POST["animal_id_parent2"];
				$about        = $_POST["animal_about"];
				
				if ($photo_dir == "") $photo_dir='NULL';
				if ($id_parent1 == "") $id_parent1 = 'NULL';
				if ($id_parent2 == "") $id_parent2 = 'NULL';
				
				if ($name != "") {
					$query = "INSERT INTO animal VALUES(
								NULL,
								'".$name."',
								'".$breed."',
								".$animal_class.",
								'".$birth_date."',
								'".$birth_place."',
								".$id_employee.",
								'".$photo_dir."',
								".$id_parent1.",
								".$id_parent2.",
								'".$about."'
								);";
					mysql_query($query);
				}
			}
			
			//отправка в таблицу "Сотрудники"
			if(isset($_POST['employee_send'])){ 	
				$name         = $_POST["employee_name"];
				$post         = $_POST["employee_post"];
				$salary       = $_POST["employee_salary"];
				$birth        = $_POST["employee_birth"];
				$address      = $_POST["employee_adress"];
				$about        = $_POST["employee_about"];
				
				if ($name != "") {
					$query = "INSERT INTO employee VALUES(
								NULL,
								'".$name."',
								'".$post."',
								".$salary.",
								'".$birth."',
								'".$address."',
								'".$about."'
								);";
					mysql_query($query);
				}
			}
				
			//отправка в таблицу "Пища"
			if(isset($_POST['food_send'])){ 	
				$id           = $_POST["food_id_class"];
				$food         = $_POST["food_food"];
				$name         = $_POST["food_seller_name"];
				$adress       = $_POST["food_seller_adress"];
				$phone        = $_POST["food_seller_phone"];
				
				if ($name != "") {
					$query = "INSERT INTO class_food VALUES(
								NULL,
								".$id.",
								'".$food."',
								'".$name."',
								'".$adress."',
								'".$phone."'
								);";
					mysql_query($query);
				}
			}
					
			//удаление из таблицы "Животные"
			if(isset($_POST['remove_animal'])){ 						
				$query = "DELETE FROM animal WHERE id_animal=".$_POST["animal_toDelete"].";";
				mysql_query($query);
			} 	
				

			//удаление из таблицы "Сотрудники"
			if(isset($_POST['remove_employee'])){ 						
				$query = "DELETE FROM employee WHERE id_employee=".$_POST["employee_toDelete"].";";
				mysql_query($query);
			} 	

			//удаление из таблицы "Пища"
			if(isset($_POST['remove_food'])){ 						
				$query = "DELETE FROM class_food WHERE id=".$_POST["food_toDelete"].";";
				mysql_query($query);
			} 	
			
			mysql_close;
		?>	
		
		
		<center>
			<div class="header">
				<img style="margin-top: 25px" src="images/headerImages/logo.png" />
				<h1 style="background: yellow">Добро пожаловать в MySQL зоопарк!</h1>
			</div>
		</center>
		
		
		<div class="wraper">
			<form action="index.php" method="POST">
				<table style="margin-left: 5%; width: 30%; float: left"> <!-- ввод данных о новом животном -->
						<tr>
							<td>Кличка животного:</td>
							<td><input type="text" value="" name="animal_name"/></td>
						</tr>
						<tr>
							<td>Зоологический класс:</td>
							<td><input type="number" value="" name="animal_class" /></td>
						</tr>
						<tr>
							<td>Порода:</td>
							<td><input type="text" value="" name="animal_breed" /></td>
						</tr>
						<tr>
							<td>Дата рождения:</td>
							<td><input type="text" value="" name="animal_birth_date" /></td>
						</tr>
						<tr>
							<td>Место рождения(прибытия):</td>
							<td><input type="text" value="" name="animal_birth_place" /></td>
						</tr>
						<tr>
							<td>Обслуживающий сотрудник:</td>
							<td><input type="number" value="" placeholder="ID Сотрудника" name="animal_id_employee" /></td>
						</tr>
						<tr>
							<td>Ссылка на фото:</td>
							<td><input type="text" value="" name="animal_photo_dir" /></td>
						</tr>
						<tr>
							<td>Родитель 1 (id):</td>
							<td><input type="text" value="" placeholder="Если из зоопарка" name="animal_id_parent1" /></td>
						</tr>
						<tr>
							<td>Родитель 2 (id):</td>
							<td><input type="text" value="" placeholder="Если из зоопарка" name="animal_id_parent2" /></td>
						</tr>
						<tr>
							<td>О животном:</td>
							<td><input type="text" value="" placeholder="Не обязательно" name="animal_about" /></td>
						</tr>
						<tr> 
						    <td><p>   </p></td>
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
							<td><input style="float: right" type="number" name="animal_toDelete"></td>
							<td><input type="submit" name="remove_animal" value="Убить животное"/></td>
						</tr>
						<tr> 
						    <td><p>   </p></td>
						</tr>
					</table>
				<div style="float: left; margin-left: 5%"> <!-- таблица "Классы животных" -->
					<?php //таблица "Классы животных"
							$connection = mysql_connect("localhost", "root", "fsociety");
							mysql_select_db("zoo");
							mysql_set_charset("utf8");

							$query = "SELECT * FROM class";
							$result = mysql_query($query);

					
							echo "<table class=\"sort1\" id=\"sort1\" border=\"4px\">
								<tr  id=\"zag\">
									<td style=\"background-color: PaleGoldenrod; width: 75px;  height: 50px; cursor: pointer\"><center> ID</center></td>
									<td style=\"background-color: PaleGoldenrod; width: 200px; height: 50px; cursor: pointer\"><center> Класс</center></td>
								</tr>";
					
				
					
							while($row = mysql_fetch_array($result))
							{ 
								echo "<tr>
										<td style=\"background-color: white;\">".$row['id_class']."</td>
										<td class=\"sor1\">".$row['class_name']."</td>
									</tr>";
							}

							echo "</table>"; 
							mysql_close();
						?>
				</div>
				<?php //показать таблицу "Животне"			
					$connection = mysql_connect("localhost", "root", "fsociety");
					mysql_select_db("zoo");
					mysql_set_charset("utf8");

					$query = "SELECT * FROM animal";
					$result = mysql_query($query);

					
					echo "<table align=\"center\" style=\"width: 96%\" class=\"sort2\" id=\"sort2\" border=\"4px\">
					      <tr  id=\"zag\">
							<td class=\"sor\" style=\"cursor: pointer\"><center> ID</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Кличка</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Порода</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Класс</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Дата рождения</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Место рождения</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Обслуж. сотрудник</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Родитель 1</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Родитель 2</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> О животном</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Фото</center></td>
						  </tr>";
					
				
				
					while($row = mysql_fetch_array($result))
					{ 
						echo "<tr>
								<td class=\"sor1\">".$row['id_animal']."</td>
								<td class=\"sor1\">".$row['name']."</td>
								<td class=\"sor1\">".$row['breed']."</td>
								<td class=\"sor1\">".$row['animal_class']."</td>
								<td class=\"sor1\">".$row['birth_date']."</td>
								<td class=\"sor1\">".$row['birth_place']."</td>
								<td class=\"sor1\">".$row['id_employee']."</td>
								<td class=\"sor1\">".$row['id_parent1']."</td>
								<td class=\"sor1\">".$row['id_parent2']."</td>
								<td class=\"sor1\">".$row['about']."</td>
								<td class=\"sor1\"> <a href=\"".$row['photo_dir']."\"> <img  class=\"sor_img\" alt=\"Нет Фото\" src=\"".$row['photo_dir']."\"/></a></td>
							</tr>";
					}

					echo "</table>"; 
					mysql_close();
			?>
				
				<hr>
				<hr>
				<h1 align="center" style="background: GreenYellow">Еда животных (поставщики)!</h1>
				<hr>
				<hr>
				
				<table style="margin-left: 33%; width: 33%; float: left"> <!-- ввод данных о новом диллере еды -->
						<tr>
							<td>ID класса:</td>
							<td><input type="number" value="" name="food_id_class"/></td>
						</tr>
						<tr>
							<td>Продукт:</td>
							<td><input type="text" value="" name="food_food" /></td>
						</tr>
						<tr>
							<td>Поставщик:</td>
							<td><input type="text" value="" name="food_seller_name" /></td>
						</tr>
						<tr>
							<td>Адрес поставщика:</td>
							<td><input type="text" value="" name="food_seller_adress" /></td>
						</tr>
						<tr>
							<td>Контакт:</td>
							<td><input type="text" value="" name="food_seller_phone" /></td>
						</tr>
						<tr> 
						    <td><p>   </p></td>
						</tr>
						<tr>
							<!-- добавление сотрудника -->
							<td colspan="2"><center><input type="submit" name="food_send" value="Отправить"/></center></td>
						</tr>
						<tr> 
						    <td><p>   </p></td>
						</tr>
						<tr>
							<!-- удаление сотрудника -->
							<td><input style="float: right" type="number" name="food_toDelete"></td>
							<td><input type="submit" name="remove_food" value="Класс больше не ест этого"/></td>
						</tr>
						<tr> 
						    <td><p>   </p></td>
						</tr>
				</table>
				<?php //показать таблицу "Еда"
					$connection = mysql_connect("localhost", "root", "fsociety");
					mysql_select_db("zoo");
					mysql_set_charset("utf8");

					$query = "SELECT * FROM class_food";
					$result = mysql_query($query);

					
					echo "<table style=\"margin-left: 2%; margin-right: 2%; float: left\" class=\"sort4\" id=\"sort4\" border=\"4px\">
					      <tr  id=\"zag\">
						    <td class=\"sor\" style=\"cursor: pointer\"><center> ID</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> ID класса</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Еда</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Ф. И. О. поставщика</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Адрес поставщика</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Контакт поставщика</center></td>
						  </tr>";
					
				
				
					while($row = mysql_fetch_array($result))
					{ 
						echo "<tr>
								<td class=\"sor1\">".$row['id']."</td>
								<td class=\"sor1\">".$row['id_class']."</td>
								<td class=\"sor1\">".$row['food']."</td>
								<td class=\"sor1\">".$row['seller_name']."</td>
								<td class=\"sor1\">".$row['seller_adress']."</td>
								<td class=\"sor1\">".$row['seller_phone']."</td>
							</tr>";
					}

					echo "</table>"; 
					mysql_close();
			?>
				
				<hr style="text-align: center; width: 100%; float: left;">
				<hr style="text-align: center; width: 100%; float: left;">
				<h1 align="center" style="text-align: center; width: 100%; float: left; background: GreenYellow">Сотрудники зоопарка!</h1>
				<hr style="text-align: center; width: 100%; float: left;">
				<hr style="text-align: center; width: 100%; float: left;">
				
				<table style="margin-left: 33%; width: 33%; float: left"> <!-- ввод данных о новом сотруднике -->
						<tr>
							<td>Имя сотрудника:</td>
							<td><input type="text" value="" name="employee_name"/></td>
						</tr>
						<tr>
							<td>Должность:</td>
							<td><input type="text" value="" name="employee_post" /></td>
						</tr>
						<tr>
							<td>Зарплата:</td>
							<td><input type="number" value="" name="employee_salary" /></td>
						</tr>
						<tr>
							<td>Дата рождения:</td>
							<td><input type="text" value="" name="employee_birth" /></td>
						</tr>
						<tr>
							<td>Место проживания:</td>
							<td><input type="text" value="" name="employee_adress" /></td>
						</tr>
						<tr>
							<td>О сотруднике:</td>
							<td><input type="text" value="" name="employee_about" /></td>
						</tr>
						<tr> 
						    <td><p>   </p></td>
						</tr>
						<tr>
							<!-- добавление сотрудника -->
							<td colspan="2"><center><input type="submit" name="employee_send" value="Отправить"/></center></td>
						</tr>
						<tr> 
						    <td><p>   </p></td>
						</tr>
						<tr>
							<!-- удаление сотрудника -->
							<td><input style="float: right" type="number" name="employee_toDelete"></td>
							<td><input type="submit" name="remove_employee" value="Убить сотрудника"/></td>
						</tr>
						<tr> 
						    <td><p>   </p></td>
						</tr>
				</table>
				<?php //показать таблицу "Сотрудники"
					$connection = mysql_connect("localhost", "root", "fsociety");
					mysql_select_db("zoo");
					mysql_set_charset("utf8");

					$query = "SELECT * FROM employee";
					$result = mysql_query($query);

					
					echo "<table style=\"margin-left: 2%; margin-right: 2%; float: left\" class=\"sort3\" id=\"sort3\" border=\"4px\">
					      <tr  id=\"zag\">
							<td class=\"sor\" style=\"cursor: pointer\"><center> ID</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Ф. И. О.</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Должность</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Зарплата</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Дата рождения</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> Адрес</center></td>
							<td class=\"sor\" style=\"cursor: pointer\"><center> О сотруднике</center></td>
						  </tr>";
					
				
				
					while($row = mysql_fetch_array($result))
					{ 
						echo "<tr>
								<td class=\"sor1\">".$row['id_employee']."</td>
								<td class=\"sor1\">".$row['name']."</td>
								<td class=\"sor1\">".$row['post']."</td>
								<td class=\"sor1\">".$row['salary']."</td>
								<td class=\"sor1\">".$row['birth']."</td>
								<td class=\"sor1\">".$row['address']."</td>
								<td class=\"sor1\">".$row['about']."</td>
							</tr>";
					}

					echo "</table>"; 
					mysql_close();
			?>
			
				
			
			</form>
		</div>
		
		
		
		
		
	</body>
</html>









