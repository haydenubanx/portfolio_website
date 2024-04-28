<?php
//
//This File contains a function which formats the data results from SQL
//Queries for output to the tables and echos out the results
//



//Function for formatting table data
function tableFormatting($inData) {

    //Creates variable to store number of rows of data output
    $inDataRowCount = mysqli_num_rows($inData);


    //If there are results to be output
    if ($inDataRowCount > 0) {


        //Creates Header Row for field names
        $fieldNames = mysqli_fetch_fields($inData);

        //Creates variable to store the header row containing field names
        $headerRow = '';

        //For every field in the table, place it in header tags
        foreach($fieldNames as $fieldCounter) {
            $headerRow .= '<th>' . $fieldCounter->name . '</th>';
        }


        // create rows of data
        $rows = mysqli_fetch_all($inData, MYSQLI_ASSOC);
        $dataRows = '';

        //For every row in the table
        foreach ($rows as $row) {
            //Add opening row tag at beginning of new row
            $dataRows .= '<tr>';

            //For every cell in the row
            foreach ($fieldNames as $fieldCounter) {
                //Add cell tags and data into cell
                $dataRows .= '<td>' . $row[$fieldCounter->name] . '</td>';
            }

            //Add closing row tag at end of row
            $dataRows .= '</tr>';
        }


        //returns the statement to be output as the table including the header row and datarows
        return '<table><tr>' . $headerRow . '</tr>' . $dataRows . '</table>';

    }


}


?>