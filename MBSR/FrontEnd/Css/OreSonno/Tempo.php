
input[type=time] {
    border: none;
    color: #2a2c2d;
    font-size: 14px;
    font-family: helvetica;
    width: 150px;
}

/* Wrapper around the hour, minute, second, and am/pm fields as well as
 the up and down buttons and the 'X' button */
input[type=time]::-webkit-datetime-edit-fields-wrapper {
    display: flex;
}

/* The space between the fields - between hour and minute, the minute and
 second, second and am/pm */
input[type=time]::-webkit-datetime-edit-text {
    padding: 19px 4px;
}

/* The naming convention for the hour, minute, second, and am/pm field is
 `-webkit-datetime-edit-{field}-field` */

/* Hour */
input[type=time]::-webkit-datetime-edit-hour-field {
    background-color: #f2f4f5;
    border-radius: 15%;
    padding: 19px 13px;
}

/* Minute */
input[type=time]::-webkit-datetime-edit-minute-field {
    background-color: #f2f4f5;
    border-radius: 15%;
    padding: 19px 13px;
}

/* AM/PM */
input[type=time]::-webkit-datetime-edit-ampm-field {
    background-color: #7155d3;
    border-radius: 15%;
    color: #fff;
    padding: 19px 13px;
}
