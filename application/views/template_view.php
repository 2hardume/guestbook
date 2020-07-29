<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Гостевая книга</title>

        <!-- Bootstrap -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/font-awesome.min.css" rel="stylesheet">
        <link href="../../css/templatemo_style.css" rel="stylesheet">

        <link href="../../css/circle.css" rel="stylesheet">
        <link rel="stylesheet" href="../../css/nivo-slider.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap-datetimepicker.css" />
        <link href="../../css/stars.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/modernizr.custom.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
	</head>

	<body>
        <header>
            <div id="templatemo_top" class="mainTop">
                <div class="container">
                    <div class="row">
                        <div class="hidden-xs hidden-sm col-md-6">
                            <div class="mailme">
                                <a href="mailto:info@company.com"><i class="fa fa-envelope"></i>info@company.com</a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="socials">
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter soc"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook soc"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss soc"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble soc"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram soc"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- e/o mainTop -->
        </header>
        <div class="mWrapper" style="margin: 0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="logo">
                            <a href="/"><img src="../../images/logo.png" alt="Гостевая книга"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="templatemo_services">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if (isset($data['status']) ) {
                            if ($data['status'] == "postOk") {
                                echo '<div class="alert alert-success" role="alert"><strong>Отлично!</strong> Запись добавлена!</div>';
                            } elseif ($data['status'] == 'postBad') {
                                echo '<div class="alert alert-danger" role="alert"><strong>Ошибка!</strong> Не удалось выполнить действие. Возможно, какие-то поля были не заполнены.</div>';
                            }
                        }?>
                        <?php include 'application/views/'.$content_view; ?>
                    </div>
                </div>
            </div>
        </div>
	</body>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/moment.min.js"></script>
    <script src="../../js/moment-with-locales.min.js"></script>
    <!--script type="text/javascript" src="../../js/daterangepicker.min.js"></script-->
    <script src="../../js/bootstrap-datetimepicker.min.js"></script>
    <script src="../../js/bootstrap-formhelpers-datepicker.js"></script>
    <script src="../../js/bootstrap-formhelpers-timepicker.js"></script>
    <script src="../../js/bootstrap-formhelpers-phone.js"></script>

    <!-- Инициализация Bootstrap DateTimePicker -->
    <script>
        $(function () {
            $('#datetimepicker').datetimepicker({
                locale: 'ru',
                format: "YYYY/MM/DD HH:mm",
                minDate: moment().subtract(1, 'month'),
                maxDate: moment()
            });
        });
    </script>
</html>