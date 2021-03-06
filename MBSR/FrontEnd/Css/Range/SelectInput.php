

/*the container must be positioned relative:*/
.custom-select {
    position: relative;
    margin-bottom:5%;
}

.custom-select select {
    display: none; /*hide original SELECT element:*/
}

.select-selected {
    
    border: 3px solid #9F4F00;
}

/*style the arrow inside the select element:*/
.select-selected:after {
    position: absolute;
    content: "";
    top: 14px;
    right: 10px;
    width: 0;
    height: 0;
    border: 6px solid transparent;
    border-color: #7CB9E8 transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
    border-color: transparent transparent #7CB9E8 transparent;
    top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
    color: black;
    padding: 8px 16px;
    border: 1px solid #7CB9E8;
    border-radius:50px;
    cursor: pointer;
    user-select: none;
}

/*style items (options):*/
.select-items {
    position: absolute;
    background-color: #E7F2FB;
    border-radius:20px;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
    display: none;
}

.select-items div:hover, .same-as-selected {
    background-color: rgba(0, 0, 0, 0.1);
}