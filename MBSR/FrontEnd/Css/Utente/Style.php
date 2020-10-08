<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Mansalva&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=NTR&display=swap" rel="stylesheet">
<style type="text/css">
<?php include 'griglia_css.php';?>

/*impostazioni body rgba(71,249,130,0.34);*/

.row::after {
  content: "";
  clear: both;
  display: table;
}
body{
    background-color: rgba(71,249,130,0.08);
   
    font-family: 'Quicksand', sans-serif;
    } 
* {
  box-sizing: border-box;
}
h1{
    font-family: 'NTR', sans-serif;
    font-size:12vw;
    color:#7CB9E8;
    }
  @media only screen and (min-width: 760px) {
  h1 {
    font-size:3vw;
  }
}
.titolo{
    font-family: 'NTR', sans-serif;
    font-size:10vw;
    color:#7CB9E8;
    }
  @media only screen and (min-width: 760px) {
  .titolo {
    margin-top:3%;
    font-size:2vw;
  }
}
/* Impostazioni Link*/

a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
  color:grey;
}

a:hover {
  text-decoration: underline;
  color:blue;
}

a:active {
  text-decoration: underline;
}

.joy{text-align:center;}
.jay{
    float:right;
    width:100%;
    left:35%;
    text-align:left;
    
    }
/*RESPONSIVE PER MONITOR MAGGIORI DI 760PX 
 @media only screen and (min-width: 768px) {
    h1{font-size:4vw;
      }
   
  }
  @media only screen and (min-width: 768px) {
    
    p{font-size:2vw;
      }
  }
  
  
  Con r classe modifico p nella pagina iniziale*/
   .adesivo {
	
  	position: -webkit-sticky;
  	position: sticky;
	top: 0;
	/*width:75%;
	margin-left:12.5%; 
	background-color: rgba(255,51,0);*/
    
}
.attak{
	
	top:0;
	background-color:#ffcc90; /*background-color:#FFFF4A rgba(255,51,0);*/
  	border-radius:25px;
  	padding:4%;
    font-size:6vw;
  	z-index: 3;
  	 
}@media only screen and (min-width: 760px) {
 .attak {
    font-size:2vw;
    margin-left:12.5%;
  }
}
 .roi{
    margin:auto;
    bottom:2%;
    widht:75%;
    font-size:6vw;
    color:black;
    
    
    }   
    @media only screen and (min-width: 760px) {
    .roi{
    font-size:1.5vw;
  }
}
   /*con questo coloro  di azzurro <b> nel <div class=tenda>*/ 
 .color{
    color:black;
    font-size:7vw;
    text-align:centred;
    font-family: 'Noto Sans JP', sans-serif;
    line-height:1.6;
    }   
    @media only screen and (min-width: 760px) {
   .color {
        font-size:2vw;
  }
 }
.bianco{
    color: white;
    font-size:7vw;
    
    }   
    @media only screen and (min-width: 760px) {
    .bianco{
        font-size:1.8vw;
  }
 }
 /* Messaggio di ERRORE*/
 .errore{
    color:red;
    font-size:4vw;
   }
    @media only screen and (min-width: 760px) {
     .errore{
    font-size:1.4vw;
  }
}
 /* Impostazioni sfondo delle categorie occupazionali*/
.tenda {
  width: 98%;
  height:auto;
  margin-left:1%;
  margin-right:1%;
  background-color: white;
 padding:8% 6%;/* 2% 3%;
 margin-left:5%;
 margin-right:5%;*/
 margin-bottom:7%;
 border-style: none;
 border-radius:25px;
 box-shadow: 2px 2px 7px 1px #99CECC;
 text-align: left;
}
@media only screen and (min-width: 600px) {
.tenda {
    width: 75%;
    padding: 2% 3%;
    top:5%;
    margin-bottom:3%;
    margin-left:12.5%;
    margin-right:12.5%;
  }
}
.collegamento{  
    font-size:4vw;
    margin-bottom:5%;
    font-family: 'Noto Sans JP', sans-serif;
    line-height:1.6;
 }
     @media only screen and (min-width: 760px) {
   .collegamento{
    font-size:1.2vw;
     margin-left:2%;
  }
}
.consegna{  
    font-size:6vw;
    margin-bottom:5%;
    font-family: 'Noto Sans JP', sans-serif;
    line-height:1.6;
 }
     @media only screen and (min-width: 760px) {
   .consegna{
    font-size:1.5vw;
     margin-left:12.5%;
  }
}

 /* Messaggio di ERRORE*/
 .errore{
    color:red;
    font-size:4vw;
   }
    @media only screen and (min-width: 760px) {
     .errore{
    font-size:1.4vw;
  }
}
    /*  @media only screen and (min-width: 768px) {
   .tenda { padding:2% 3%;
              
            }
 Stile del checkbox*/
/* The container */

.container {
    display: block;
    position: relative;
   /* padding: 5%;*/
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 6vw;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    
}
@media only screen and (min-width: 760px) {
 .container  {
    font-size: 1.5vw;
    /*padding:2%;*/
  }
}

/* Hide the browser's default checkbox */
.container input[type=checkbox] {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
    
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 7vw;
    width: 7vw;
    background-color: red/*#eee*/;
    
}
@media only screen and (min-width: 760px) {
.checkmark  {
    height: 1.8vw;
    width: 1.8vw;
  }
}
/* On mouse-over, add a yellow background color */
.container:hover input[type=checkbox] ~ .checkmark {
    background-color: #fff70f;
}

/* When the checkbox is checked, add a green background */
.container input[type=checkbox]:checked ~ .checkmark {
    background-color: #00FF00 /*#2196F3*/;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input[type=checkbox]:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    
}
/*fine stile checkbox


tasto conferma
*/
.floatdx{
    width: 75%;
    float:right;
    }
    
/* @media only screen and (min-width: 768px) {
 .floatdx   { width: 25% ;
              
            }
 
}  */  
input[type=text]{
    float:right;
  display: inline-block;
  border-radius: 20px;
  background-color:rgba(71,249,130,0.08);
  border: none;
  outline: none;
  color:#7CB9E8; ;
  text-align: center;
  font-size: 7vw;
  padding: 20px;
  width: 80%;
  transition: all 1s;
  cursor: pointer;
  margin-top:4%;
  margin-bottom:4%;
  margin-right:20%;
  box-shadow:2px 2px 15px 0px   #99CECC;
}
@media only screen and (min-width: 600px) {
  input[type=text]  {
   font-size: 2vw;
  }
}
input[type=text] {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.4s;
}

input[type=text]:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.4s;
}

input[type=text]:hover  {
  padding-right: 25px;
  background-color: rgba(71,249,130,0.08);
  box-shadow: 2px 2px 7px 1px #FF7E00;
}

input[type=text]:hover :after {
  opacity: 1;
  right: 0;
  
}
input[type=text]:active {
  background-color: rgba(71,249,130,0.08);
  box-shadow: 2px 2px 7px 1px #FF7E00;
  transform: translateY(4px);
}

/*submit*/
input[type=submit] {
  float:left;
  display: inline-block;
  border-radius: 20px;
  background-color:#7CB9E8;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 7vw;
  padding: 20px;
  width: 70%;
  transition: all 1s;
  cursor: pointer;
  margin: 2%;
  box-shadow:2px 2px 15px 0px   #99CECC;
}
@media only screen and (min-width: 600px) {
  input[type=submit]  {
   font-size: 2vw;
  }
}
input[type=submit] {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.4s;
}

input[type=submit]:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.4s;
}

input[type=submit]:hover  {
  padding-right: 25px;
  background-color: #0063FF;
}

input[type=submit]:hover :after {
  opacity: 1;
  right: 0;
  
}
input[type=submit]:active {
  background-color: #7CB9E8;
  box-shadow: 1px 1px 7px 0px  #99CECC;
  transform: translateY(4px);
}

/* impostazioni range*/
.slider {
  -webkit-appearance: none;
  width: 80%;
  height: 15px;
  margin-top:5%;
  background: orange;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 50px;
  border-radius:25px;
  background:#7482FF;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 50px;
  border-radius:25px;
  background:  #7482FF;
  cursor: pointer;
}
<?php require 'bottone_radio.php';?>
input[type=password] {
  
  display: inline-block;
  border-radius: 20px;
  background-color:rgba(71,249,130,0.08);
  border: none;
  outline: none;
  color:#7CB9E8; ;
  text-align: center;
  font-size: 7vw;
  padding: 20px;
  width: 80%;
  transition: all 1s;
  cursor: pointer;
  margin-top:6%;
 
 box-sizing: border-box;
  
  box-shadow:2px 2px 15px 0px   #99CECC;
}
@media only screen and (min-width: 600px) {
 input[type=password]{
   font-size: 1.4vw;
  }
}
 input[type=password] {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.4s;
}
</style>
