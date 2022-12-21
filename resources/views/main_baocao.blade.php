<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <title>{{ $pageTitle }}</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="{{ url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet') }}"
        type="text/css" />
    <link href="{{ url('assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    <link href="{{ url('assets/admin/pages/css/tasks.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- END PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
    <link href="{{ url('assets/global/css/components-rounded.css') }}" id="style_components" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/admin/layout4/css/layout.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/admin/layout4/css/themes/light.css') }}" rel="stylesheet" type="text/css"
        id="style_color" />
    <link href="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet"
        type="text/css" />

    {{-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" /> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="{{ url('images/LIFESOFT.png') }}" type="image/x-icon">
    <style type="text/css">
        /* .header tr td {
            padding-top: 0px;
            padding-bottom: 5px;
        }        */

        table tr td:first-child {
            text-align: center;
        }

        table,
        p {
            width: 90%;
            margin: auto;
        }

        th {
            text-align: center;
        }

        td,
        th {
            padding: 5px;
        }

        p {
            padding: 5px;
        }

        .sangtrangmoi {
            page-break-before: always
        }

        span {
            text-transform: uppercase;
            font-weight: bold;
        }

        @media print {
            .in {
                display: none !important;
            }

            #myBtn {
                display: none !important;
            }
        }

        #fixNav {
            /*background: #f7f7f7;*/
            background: #f9f9fa;
            width: 100%;
            height: 35px;
            display: block;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.5);
            /*Đổ bóng cho menu*/
            position: fixed;
            /*Cho menu cố định 1 vị trí với top và left*/
            top: 0;
            /*Nằm trên cùng*/
            left: 0;
            /*Nằm sát bên trái*/
            z-index: 100000;
            /*Hiển thị lớp trên cùng*/
        }

        #fixNav ul {
            margin: 0;
            padding: 0;
        }

        #fixNav ul li {
            list-style: none inside;
            width: auto;
            float: left;
            line-height: 35px;
            /*Cho text canh giữa menu*/
            color: #fff;
            padding: 0;
            margin-left: 20px;
            margin-top: 1px;
            position: relative;
        }

        #fixNav ul li a {
            text-transform: uppercase;
            white-space: nowrap;
            /*Cho chữ trong menu không bị wrap*/
            padding: 0 10px;
            color: #fff;
            display: block;
            font-size: 0.8em;
            text-decoration: none;
        }
    </style>
    @yield('style_css')
    <script>
        function ExDoc() {
            var sourceHTML = document.getElementById("data").innerHTML;
            var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
            var fileDownload = document.createElement("a");
            document.body.appendChild(fileDownload);
            fileDownload.href = source;
            fileDownload.download = $('#title').val() + '.doc';
            fileDownload.click();
            document.body.removeChild(fileDownload);
        }

        function exportTableToExcel() {
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableHTML = '';
            //Tiêu đề
            var data_header = document.getElementById('data_header');
            if (data_header) {
                tableHTML = tableHTML + data_header.outerHTML.replace(/ /g, '%20');
            }

            //Nội dung 1
            var data_body = document.getElementById('data_body');
            if (data_body) {
                tableHTML = tableHTML + data_body.outerHTML.replace(/ /g, '%20');
            }
            //Nội dung 2
            var data_body1 = document.getElementById('data_body1');
            if (data_body1) {
                tableHTML = tableHTML + data_body1.outerHTML.replace(/ /g, '%20');
            }
            //Nội dung 3
            var data_body2 = document.getElementById('data_body2');
            if (data_body2) {
                tableHTML = tableHTML + data_body2.outerHTML.replace(/ /g, '%20');
            }
            //Nội dung 4
            var data_body3 = document.getElementById('data_body3');
            if (data_body3) {
                tableHTML = tableHTML + data_body3.outerHTML.replace(/ /g, '%20');
            }
            //Nội dung 5
            var data_body4 = document.getElementById('data_body4');
            if (data_body4) {
                tableHTML = tableHTML + data_body4.outerHTML.replace(/ /g, '%20');
            }
            //Nội dung 6
            var data_body5 = document.getElementById('data_body5');
            if (data_body5) {
                tableHTML = tableHTML + data_body5.outerHTML.replace(/ /g, '%20');
            }

            //Chữ ký
            var data_footer = document.getElementById('data_footer');
            if (data_footer) {
                tableHTML = tableHTML + data_footer.outerHTML.replace(/ /g, '%20');
            }
            //Xác nhận
            var data_footer1 = document.getElementById('data_footer1');
            if (data_footer1) {
                tableHTML = tableHTML + data_footer1.outerHTML.replace(/ /g, '%20');
            }

            // Specify file name
            var filename = $('#title').val() + '.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }
    </script>
</head>

<body style="font:normal 11px Times, serif;">
    <div class="in">
        <nav id="fixNav">
            <ul>
                <li>
                    <button type="button" class="btn btn-success btn-xs text-right"
                        style="border-radius: 20px; margin-left: 50px" onclick="window.print()">
                        <i class="fa fa-print"></i> In dữ liệu
                    </button>
                </li>
                <li>
                    <button type="button" class="btn btn-primary btn-xs" style="border-radius: 20px;"
                        onclick="ExDoc()">
                        <i class="fa fa-file-word-o"></i> File Word
                    </button>
                </li>
                <li>
                    <button type="button" class="btn btn-info btn-xs" style="border-radius: 20px;"
                        onclick="exportTableToExcel()">
                        <i class="fa fa-file-excel-o"></i> File Excel
                    </button>
                </li>
            </ul>
        </nav>
    </div>

    <div id="data" style="position: relative; margin-top: 35px; margin-bottom:20px;">
        @yield('content')
    </div>
</body>

</html>
