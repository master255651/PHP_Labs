<!DOCTYPE html>
<html>
<head>
<style>
*{
 margin: 0;
 padding: 0;
}

html{
    width: 100vw;
    height: 100vh;
}

body{
 background-repeat: no-repeat;
 background-attachment: fixed;
 background-size: cover;
 background-position: top;
 background-image:url(http://bit.ly/2gPLxZ4);
 width: 100%;
 height: 100%;
 font-family: Arial, Helvetica;
 letter-spacing: 0.02em;
  font-weight: 400;
 -webkit-font-smoothing: antialiased; 
}

.blurred-box{
  position: relative;
  width: 250px;
  height: 350px;
  top: calc(25% - 175px);
  left: calc(50% - 125px);
  background: inherit;
  border-radius: 2px;
  overflow: hidden;
}

.blurred-box:after{
 content: '';
 width: 300px;
 height: 300px;
 background: inherit; 
 position: absolute;
 left: -25px;
 left position
 right: 0;
 top: -25px;  
 top position 
 bottom: 0;
 box-shadow: inset 0 0 0 200px rgba(255,255,255,0.15);
 filter: blur(10px);
}

.user-login-box{
  position: relative;
  margin-top: 50px;
  text-align: center;
  z-index: 1;
}
.user-login-box > *{
  display: inline-block;
  width: 200px;
}

.user-icon{
  width: 100px;
  height: 100px;
  position: relative;
  border-radius: 50%;
  background-size: contain;
}

.user-name{
  margin-top: 15px;
  margin-bottom: 15px;
  color: white;
}

input.user-password{
  width: 120px;
  height: 18px;
  opacity: 0.4;
  border-radius: 2px;
  padding: 5px 15px;
  border: 0;
}

td { 
    padding: 15px;
}

table{
    margin-left: auto; 
    margin-right: auto;
    border-spacing: 200px;
}

h1 {
  font-family: "Trebuchet MS", sans-serif;
  font-size: 5em;
  letter-spacing: -2px;
  border-bottom: 2px solid black;
  text-transform: uppercase;
 }

 .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  border-radius: 12px;
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<div>
    <h1> 
        Book Sharing System 
        <img src="Images/open-book.png" width="100" height="100" alt="Фотография">
    </h1>
</div>

<table>
    <tr>
       <td>
            <div class="blurred-box">
                <div class="user-login-box">
                    <span class="user-icon" style="background-image: url('Images/eye.png');"></span>
                    <div class="user-name">Show</div>
                    <button class="button button1" onClick='location.href="ShowBooksForm.html"'>Go to form</button>
                </div>
            </div>
        </td>
        <td>
            <div class="blurred-box">
                <div class="user-login-box">
                <span class="user-icon" style="background-image: url('Images/download-file.png');"></span>
                    <div class="user-name">Add new</div>
                    <button class="button button1" onClick='location.href="AddForm.html"'>Go to form</button>
                </div>
            </div>
        </td>
        <td>
            <div class="blurred-box">
                <div class="user-login-box">
                <span class="user-icon" style="background-image: url('Images/delete-button.png');"></span>
                    <div class="user-name">Average price of books</div>
                    <button class="button button1" onClick='location.href="AveragePriceRequest.php"'>Go to form</button>
                </div>
            </div>
        </td>
    </tr>
</table>

</body>
</html>
