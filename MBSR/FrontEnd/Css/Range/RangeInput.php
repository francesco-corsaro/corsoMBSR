.slidecontainer {
  width:auto ;
  margin-right:auto;
  margin-left:auto;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #FFDAB9;
  outline: none;
  opacity: 1;
  -webkit-transition: .2s;
  transition: opacity .2s;
  border-radius:25px;
}

.slider:hover {
  opacity: 1;
  background:#FFE8D3 ;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width:25px;
  height: 25px;
  background: #7CB9E8;
  cursor: pointer;
  border-radius:25px;
}
.slider::-webkit-slider-thumb:hover {
width: 12.5px;
  height: 45px;
}
.slider::-moz-range-thumb {
 width: 25px;
  height: 25px;
  background: #7CB9E8;
  cursor: pointer;
  border-radius:25px;
}
.slider::-moz-range-thumb:hover {
width: 12.5px;
  height: 45px;
}

.colSin{
width:50%; 
display:inline-block;
margin-bottom:5%;
text-align:left;
}
.colDx{
width:50%; display:inline-block; float:right; text-align:right;margin-bottom:5%;
}
