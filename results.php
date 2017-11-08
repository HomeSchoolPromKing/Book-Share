<!DOCTYPE html>
<head>
	<title>BookShare</title>
	<link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
</head>
<body>
	<!--///// Navbar /////-->
	<div class="nav">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="login.html">Login</a></li>
			<li><a href="#">My Profile</a></li>
		</ul>
	</div>
	
	<!--///// Results /////-->
	<div class="container">
		<div class="container-left">
			<img id="results-img" src="images/book-image.jpg" alt="Book Title by Author"/>
			<h3>Book Title</h3>
			<h4>Edition</h4>
			<p>by <a href="#">Author</a><p>
			
			<form>
				<input class="button-styles" type="button" value="Make a Listing"><br>
				<input class="button-styles" type="button" value="Save">
			</form>
		<!-- Book Description -->
			<div class="book-desc">
				<p>
					<strong>Publisher:</strong>
					
				</p>
				<p>
					<strong>Date Published:</strong>
					
				</p>
				<p>
					<strong>ISBN-10:</strong>
					
				</p>
				<p>
					<strong>ISBN-13:</strong>
			
				</p>
			</div>
		</div>

		<div class="container-right">
			<p>Listings for "$search"</p>
			<table>
				<tr>
					<th>User</th>
					<th>Book Condition</th>
					<th>Wants</th>
					<th>Contact</th>
				</tr>
				
				<tr>
					<td>Username1</td>
					<td>As New</td>
					<td>Money</td>
					<td><a href="#">Contact User</a></td>
				</tr>
				
				<tr>
					<td>Username2</td>
					<td>Fine</td>
					<td>Money</td>
					<td><a href="#">Contact User</a></td>
				</tr>
				
				<tr>
					<td>Username3</td>
					<td>Very Good</td>
					<td>Money</td>
					<td><a href="#">Contact User</a></td>
				</tr>
				
				<tr>
					<td>Username4</td>
					<td>Good</td>
					<td>Trade</td>
					<td><a href="#">Contact User</a></td>
				</tr>
				
				<tr>
					<td>Username5</td>
					<td>Fair</td>
					<td>Trade</td>
					<td><a href="#">Contact User</a></td>
				</tr>
				
				<tr>
					<td>Username6</td>
					<td>Poor</td>
					<td>Donate</td>
					<td><a href="#">Contact User</a></td>
				</tr>
			</table>
		</div>
	</div>
		
	<!--///// Footer /////-->
	<footer class="footer">
		<p>&copy; Bookshare 2017</p>
	</footer>	
</body>
</html>