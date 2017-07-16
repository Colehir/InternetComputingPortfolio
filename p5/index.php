<?php
                        function currencyConverter($currency_from,$currency_to,$currency_input){
                            

                            $amount = urlencode($currency_input);
                            $from_Currency = urlencode($currency_from);
                            $to_Currency = urlencode($currency_to);
                            $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
                            $get = explode("<span class=bld>",$get);
                            $get = explode("</span>",$get[1]);  
                            $currency_output = preg_replace("/[^0-9\.]/", null, $get[0]);

                            return $currency_output;
                        }

                        $currency_from = "";
                        $currency_to = "";
                        $currency_input="";
                        $currency = "";
                        $output = " ";

                        if (isset($_POST['currency_from']) && isset($_POST['currency_to']) && isset($_POST['currency_input']))
                        {
                            $currency_input = $_POST['currency_input'];
                            if(is_numeric($currency_input))
                            {
                            $currency_from = $_POST['currency_from'];
                            $currency_to = $_POST['currency_to'];
                            

                            $currency = currencyConverter($currency_from,$currency_to,$currency_input);
                            $output = "$currency_input $currency_from is equal to $currency $currency_to";
                            }
                            else
                            {
                                $output = "Enter a number!";fc
                            }
                            // Populate a specific paragraph or div with result
                        }
echo <<<_END

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Currency Conversion</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                       <h1 class="brand-heading">Currency Conversion</h1>
                        <form method="post" action="index.php">
                            <label>Enter amount:</label>
                            <input type="text" name="currency_input" />
                            </br>
                            <label>Select currency (from):</label>
                            <select name="currency_from">
                                <option value="USD">US Dollar</option>
                                <option value="MXN">Mexican Peso</option>
                                <option value="CAD">Canadian Dollar</option>
                            </select>
                            </br>
                            <label>Select currency (to):</label>
                            <select name="currency_to">
                                <option value="USD">US Dollar</option>
                                <option value="MXN">Mexican Peso</option>
                                <option value="CAD">Canadian Dollar</option>
                            </select>
                            </br>
                            <input id = "convert" type="submit" value="Convert!" />
                            <p>$output</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Cole Hirapara</p>
            <p>Greyscale template from Startbootstrap.com</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>

</body>
_END;
