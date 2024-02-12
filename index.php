<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <style>
    /* Styles for the modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }
    
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }
    
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    
    /* Styles for the form */
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group input[type="text"],
    .form-group input[type="password"],
    .form-group input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    .form-group input[type="submit"] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    .form-group input[type="submit"]:hover {
        background-color: #45a049;
    }
/* Styles for the navigation bar */
body {
  font-family: Bodoni; /* Change font family to Bodoni */
  margin: 0;
  padding: 0;
}


    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: flex;
      align-items: center;
      color: rgb(143, 142, 142);
      text-align: center;
      padding: 15px 10px; /* Adjust the padding for better vertical alignment */
      text-decoration: none;
      line-height: 3.0; /* Adjust the line height for better vertical alignment */
    }

    li a img {
      margin-right: 8px; /* Adjust the margin as needed */
      max-height: 50px; /* Set the maximum height of the image */
    }

    li a:hover {
      background-color: #555;
    }

    /* Style the dropdown content */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
      z-index: 1;
    }

    /* Style the dropdown links */
    .dropdown-content a {
      color: black;
      padding: 1px 3px;
      text-decoration: none;
      display: block;
    }

    /* Change color on hover */
    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    /* Show the dropdown on click */
    .dropdown.active .dropdown-content {
      display: block;
    }

    /* Add arrow down */
    .dropbtn::after {
      content: " \25BC"; /* Unicode character for down arrow */
      font-size: 0.6em; /* Adjust the font size as needed */
    }
    /* Styles for the navigation bar */
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: pink; /* Change background color to pink */
}

  </style>
</head>
<body>

<ul>
    <li>
      <a href="index.html">
        <img src="https://ahcefi.net/pluginfile.php/1/theme_adaptable/logo/1635643645/ahcefi-logo.png" alt="Home Icon">
      </a>
    </li>
    <li><a href="index.html">Home</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#enroll">Enroll Now</a></li>
    <li class="dropdown">
      <a href="login.php" class="dropbtn">More</a>
      <!-- The Modal -->
      <div class="modal" id="loginModal">
          <div class="modal-content">
              <span class="close">&times;</span>
              <h2>Login</h2>
              <form action="login.php" method="post">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
        <input type="submit" value="Login">
    </div>
</form>


<script>
    // JavaScript for the modal
    var modal = document.getElementById("loginModal");
    var link = document.querySelector(".dropbtn");
    var span = document.getElementsByClassName("close")[0];

    // Open modal when "Login" link is clicked
    document.querySelector('a[href="login.php"]').addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // JavaScript for the dropdown menu
    document.addEventListener("DOMContentLoaded", function() {
        var dropdown = document.querySelector('.dropdown');

        dropdown.addEventListener('click', function() {
            this.classList.toggle('active');
        });

        window.addEventListener('click', function(event) {
            if (!event.target.matches('.dropbtn')) {
                dropdown.classList.remove('active');
            }
        });
    });
</script>