<p>Fill out the form and then see how we relate!</p>

<form action="game.php" method="post">
<table width="600" border="0" cellpadding="0" cellspacing="0">
	  <tr>
		<td>Your Name:</td>
		<td><input type="text" name="name" size="30" /></td>
	  </tr>
	  <tr>
		<td>Your favorite animal:</td>
		<td>
			<input type="radio" name="animal"  value="zebra" checked="checked" /> <img src="images/zebra.jpg" height="50" width="50" alt="Zebra" />
			<input type="radio" name="animal"  value="cat"/> <img src="images/cat.jpg" height="50" width="50" alt="Cat" />
			<input type="radio" name="animal"  value="dog"/> <img src="images/dog.jpg" height="50" width="50" alt="Dog" />
			<input type="radio" name="animal"  value="snake"/> <img src="images/snake.jpg" height="50" width="50" alt="Snake" />
			<input type="radio" name="animal"  value="cockroach"/> <img src="images/cockroach.jpg" height="50" width="50" alt="Cockroach" />
		</td>
	  </tr>
	  <tr>
		<td>Your favorite color:</td>
		<td>
			<select name="color">
				<option value="red">Red</option>
				<option value="yellow">Yellow</option>
				<option value="green">Green</option>
				<option value="blue">Blue</option>
				<option value="purple">Purple</option>
				<option value="orange">Orange</option>
				<option value="pink">Pink</option>
			</select>
		</td>
	  </tr>
	  <tr>
		<td>Your favorite thing to do in your spare time:</td>
		<td>
			<select name="hobby">
				<option value="reading">Read</option>
				<option value="sleeping">Sleep</option>
				<option value="studying">Study</option>
				<option value="playing video games">Play video games</option>
				<option value="shopping">Shop</option>
				<option value="exercising">Exercise</option>
				<option value="eating">Eat</option>
			</select>
		</td>
	  </tr>
	  <tr>
		<td>Your age:</td>
		<td><input type="text" name="age" size="30" maxlength="3" /></td>
	  </tr>

	  <tr>
	  	<td></td>
		<td><input type="submit" name="submit" value="Submit!" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" name="reset" value="Reset" /></td>
	  </tr>
</table>
</form>
