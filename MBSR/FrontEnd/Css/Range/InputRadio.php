.riga{
width:100%;
display:block;
margin-top:3%;
}

/* The container */
.container {
  display: inline-block;
  width:5%;
  height:70px;
  position: relative;
 margin-left:3%;
  margin-bottom: 12px;
  cursor: pointer;
  
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.risp{
  display: block;
  width:5%;
  position: absolut;
  bottom:0;
  left:0;
  text-align:center;
  margin-bottom: 12px;
  cursor: pointer;
  
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: -16px;
  left: -10px;
  
  height: 30px;
  width: 30px;
  margin:20px;
  background-color: #72B5A7;
  border-radius: 50%;
  border:3px solid #73A9C2;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #A8C9D9;
   border:3px solid #A8C9D9;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: white;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 2px;
	left: 2px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	background: #73A9C2;
    
}