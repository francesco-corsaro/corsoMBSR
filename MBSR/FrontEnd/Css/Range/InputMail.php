.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}
@media only screen and (min-width: 760px) {
.input-container {
    width: 70%;
    padding:4%;
	margin-left:15%;
  	margin-right:15%;
  	margin-bottom: 4%;
}
}
.icon {
  padding: 10px;
  background: #F7FBFE;
  color: dodgerblue;
  min-width: 50px;
  text-align: center;
  font-size:1.5em;
}

.input-field {
  width: 100%;
  padding: 10px;
  background-color:#F7FBFE;
  margin-bottom:5%;
  outline: none;
  border: 2px solid  #7CB9E8;
  border-radius:25px;
  font-size:1em
}

@media only screen and (min-width: 760px) {
	.input-field {
	width: 70%;
 	
  	padding: 1%;
  	
	}
}
.input-field:focus {
  border: 5px solid  #7CB9E8;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 3% 2%;
  border: none;
  cursor: pointer;
  width: 50%;
  margin-left:25%;
  margin-right:25%;
  margin-bottom:10%;
  opacity: 0.9;
  border-radius:25px;
   font-size: 1em;
}
@media only screen and (min-width: 760px) {
	.btn {
	width: 20%;
 	margin-left:80%;
  	margin-right:0%;
  	padding: 2% 1%;
	}
}
.btn:hover {
  opacity: 1;
}