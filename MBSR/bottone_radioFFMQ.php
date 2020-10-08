/* The container */
.contenitore {
  display: inline;
  position: relative;
  padding-left: 35px;
   margin-top:10%;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 30px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.contenitore input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.buttondo {
  position: absolute;
 
  top: 0;
  left: 50%;
  height: 25px;
  width: 25px;
  background-color: #DF6E00;
  border-radius: 50%;
  
}

/* On mouse-over, add a grey background color */
.contenitore:hover input ~ .buttondo {
  background-color:#FF8E20 ;
}

/* When the radio button is checked, add a blue background */
.contenitore input:checked ~ .buttondo {
  background-color:#FF7E00;/*tangerine yellow*/
  box-shadow: 2px 2px 7px 1px #FF7E00;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.buttondo:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.contenitore input:checked ~ .buttondo:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.contenitore .buttondo:after {
 	top: 8px;
	left: 8px;
	width: 10px;
	height: 10px;
	border-radius: 50%;
	background: white;
}
