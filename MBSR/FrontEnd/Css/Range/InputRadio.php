.riga{
width:100%;
display:block;


}

/* The container */
.container {
  display: inline;
  position: relative;
  padding-left: 30px;
  padding-right:5px;
  padding-bottom:35px;
  margin-bottom: 31%;
  cursor: pointer;
  font-size: 15px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
@media only screen and (min-width: 760px) {
.container {
	font-size: 20px;
	padding-left: 35px;
	padding-right:15px;
}
}
.risp{
  display: block;
  width:5%;
  position: absolute;
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
  top: 0;
  left: 0;
  
  height: 30px;
  width: 30px;
  
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