<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Edit profile page - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            background: #f5f5f5;
        }

        /**
 * Panels
 */
        /*** General styles ***/
        .panel {
            box-shadow: none;
        }

        .panel-heading {
            border-bottom: 0;
        }

        .panel-title {
            font-size: 17px;
        }

        .panel-title>small {
            font-size: .75em;
            color: #999999;
        }

        .panel-body *:first-child {
            margin-top: 0;
        }

        .panel-footer {
            border-top: 0;
        }

        .panel-default>.panel-heading {
            color: #333333;
            background-color: transparent;
            border-color: rgba(0, 0, 0, 0.07);
        }

        form label {
            color: #999999;
            font-weight: 400;
        }

        .form-horizontal .form-group {
            margin-left: -15px;
            margin-right: -15px;
        }

        @media (min-width: 768px) {
            .form-horizontal .control-label {
                text-align: right;
                margin-bottom: 0;
                padding-top: 7px;
            }
        }

        .profile__contact-info-icon {
            float: left;
            font-size: 18px;
            color: #999999;
        }

        .profile__contact-info-body {
            overflow: hidden;
            padding-left: 20px;
            color: #999999;
        }

        .profile-avatar {
            width: 200px;
            position: relative;
            margin: 0px auto;
            margin-top: 196px;
            border: 4px solid #f3f3f3;
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdeys">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <form class="form-horizontal" method="post">
                    @csrf
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                class="img-circle profile-avatar" alt="User avatar">
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">User info</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">Location</label>
                                {{-- <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div> --}}
                                <div class="wrap">
                                    <input type="hidden" id="latitude" name="latitude" oninput="getMap()">
                                    <input type="hidden" id="longitude" name="longitude" oninput="getMap()">

                                    <div id="map"></div>
                                </div>

                                <script>
                                    function showPosition(position) {
                                        var latitude = position.coords.latitude;
                                        var longitude = position.coords.longitude;

                                        document.getElementById('latitude').value = latitude;
                                        document.getElementById('longitude').value = longitude;

                                        var osmUrl =
                                        `https://www.openstreetmap.org/?mlat=${latitude}&mlon=${longitude}#map=15/${latitude}/${longitude}`;

                                        document.getElementById('map').innerHTML =
                                            `<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="${osmUrl}"></iframe>`;
                                    }

                                    function showError(error) {
                                        var errorMessage = `Error getting your location: ${error.message}`;
                                        console.error(errorMessage);
                                        alert(errorMessage);
                                    }

                                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                                </script>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Company name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Position</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Contact info</h4>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mobile number</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">E-mail address</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Security</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Current password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">New password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>
</body>

</html>
