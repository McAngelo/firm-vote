<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/uniform.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.tools.js"></script>
    <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>

<body class="wrapped">

<div id="title"></div>

<a href="#" id="download">Download Here</a><br>
<a href="#" id="download2">Download Here</a><br>
<a href="#" id="download3">Download Here</a><br>

<div class="TTWForm-container">

    <div class="TTWForm-wrapper wrapped">


        <form enctype="multipart/form-data" action="process_form.php" class="TTWForm clearfix"
              method="post" novalidate="">

			<div id="field1-container" class="field f_100">
                <label for="field3">
                    Title
                </label>
                <select name="field3" id="field3" required="required">
                    <option id="field3-1" value="Option 1">
                        None
                    </option>
                    <option id="field3-2" value="Option 2">
                        Mr.
                    </option>
                    <option id="field3-3" value="Option 3">
                        Miss
                    </option>
                    <option id="field3-4" value="Option 4">
                        Mrs.
                    </option>
                    
                </select>
            </div>
            
            <div id="field2-container" class="field f_100">
                <label for="field1">
                    Surname
                </label>
                <input name="field1" id="field1" required="required" type="text">
            </div>
            
            <div id="field3-container" class="field f_100">
                <label for="field1">
                    First Name
                </label>
                <input name="field1" id="field1" required="required" type="text">
            </div>
            
            <div id="field4-container" class="field f_100">
                <label for="field1">
                    Other Names
                </label>
                <input name="field1" id="field1" required="required" type="text">
            </div>


           <!-- <div id="field2-container" class="field f_100">
                <label for="field2">
                    Text Area
                </label>
                <textarea rows="5" cols="20" name="field2" id="field2" required="required"></textarea>
            </div>


            


            <div id="field6-container" class="field f_100">
                <label for="field6">
                    File
                </label>
                <input size="48" name="field6" id="field6" required="required" type="file">
            </div>-->


            <div id="field5-container" class="field f_100 radio-group required">
                <label for="field4-1">
                    Radio Buttons
                </label>


                <div class="option clearfix">
                    <input name="field4" id="field4-1" value="Option 1" type="radio" checked>
                    <span class="option-title">
                         Male
                    </span>
                </div>


                <div class="option clearfix">
                    <input name="field4" id="field4-2" value="Option 2" type="radio">
                    <span class="option-title">
                         Female
                    </span>
                </div>


               <!-- <div class="option clearfix">
                    <input name="field4" id="field4-3" value="Option 3" type="radio">
                    <span class="option-title">
                         Option 3
                    </span>
                </div>-->
            </div>
            
           <!-- <div id="field3-container" class="field f_100">
                <label for="field3">
                    Title
                </label>
                <select name="field3" id="field3" required="required">
                    <option id="field3-1" value="Option 1">
                        None
                    </option>
                    <option id="field3-2" value="Option 1">
                        Mr.
                    </option>
                    <option id="field3-3" value="Option 2">
                        Miss
                    </option>
                    <option id="field3-4" value="Option 3">
                        Mrs.
                    </option>
                    
                </select>
            </div>
            
            <div id="field3-container" class="field f_100">
                <label for="field3">
                    Title
                </label>
                <select name="field3" id="field3" required="required">
                    <option id="field3-1" value="Option 1">
                        None
                    </option>
                    <option id="field3-2" value="Option 1">
                        Mr.
                    </option>
                    <option id="field3-3" value="Option 2">
                        Miss
                    </option>
                    <option id="field3-4" value="Option 3">
                        Mrs.
                    </option>
                    
                </select>
            </div>-->
            

            <!--<div id="field5-container" class="field f_100 checkbox-group required">
                <label for="field5-1">
                    Checkboxes
                </label>


                <div class="option clearfix">
                    <input name="field5[]" id="field5-1" value="Option 1" type="checkbox">
                    <span class="option-title">
                         Option 1
                    </span>
                    <br>
                </div>


                <div class="option clearfix">
                    <input name="field5[]" id="field5-2" value="Option 2" type="checkbox">
                    <span class="option-title">
                         Option 2
                    </span>
                    <br>
                </div>


                <div class="option clearfix">
                    <input name="field5[]" id="field5-3" value="Option 3" type="checkbox">
                    <span class="option-title">
                         Option 3
                    </span>
                    <br>
                </div>
            </div>-->


            <div id="form-submit" class="field f_100 clearfix submit">
                <input value="Submit" type="submit">
            </div>
        </form>
    </div>
</div>

</body>
</html>