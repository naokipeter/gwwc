<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Giving</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
              padding-top: 50px;
            }
            .starter-template {
              padding: 40px 15px;
              text-align: center;
              display: none;
            }
            .navbar {
                background-color: #6c0000;
            }
            .navbar a.navbar-brand {
                color: white;
            }
            .table>tbody>tr>td {
                text-align: left;
            }
            .progress-bar {
                text-align: left;
                padding-left: 1em;
            }
            h1 {
                margin-top: 40px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">My Giving</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <!--<li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>-->
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#" id="welcome"></a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>

        <div class="container">

            <div class="starter-template">
                <h1>Your pledge</h1>

                <p class="lead">
                    You pledged <strong id="pledge"></strong> of your future income on <span id="pledge-date"></span>. This year you've donated <strong id="donated"></strong> so far. <span id="status"></span>
                </p>

                <div class="progress">
                  <div id="pledge-progress" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"     style="min-width: 2em;"></div>
                </div>

                <h1>Your donations</h1>

                <table class="table" id="donations">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Charity</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

                <h1>Your income</h1>

                <table class="table" id="incomes">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Amount</th>
                            <!--<th>Pledged</th>
                            <th>Donated</th>-->
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

        </div><!-- /.container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><\/script>')</script>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
        <script type="text/javascript">
            var api      = "{{ $api }}";      // API endpoint
            var userId   = {{ $user }};       // User ID
            var apiToken = "{{ $apiToken }}"; // API token

            // Queried data
            var user      = null;
            var donations = null;
            var incomes   = null;

            // Misc
            var donatedThisYear  = 0;
            var incomeThisYear   = 0;
            var pledgeDate       = null;
            var pledgePercentage = 0;
            var incomesPerYear   = {};

            /**------------------------------------------
             * Routes
             *-------------------------------------------
             */
            jQuery(document).ready(function($) {
                /**------------------------------------------
                 * Get user
                 *-------------------------------------------
                 */
                $.get(resource('users', userId)).done(function(data) {
                    // Show welcome message
                    $('#welcome').text('Welcome, ' + data.name);

                    // Show pledge amount
                    $('#pledge').text(data.pledge + '%');

                    // Add date
                    pledgeDate = new Date(data.pledged_at);
                    $('#pledge-date').text(formatDate(pledgeDate));

                    // Save for setup
                    pledgePercentage = data.pledge / 100;
                    user             = data;

                    // Display content (if ready)
                    setup();
                });

                /**------------------------------------------
                 * Get donations
                 *-------------------------------------------
                 */
                $.get(resource('donations')).done(function(data) {
                    var sum         = 0;
                    var currentYear = new Date().getFullYear();

                    // Calculate sum of this year's donations
                    for (var i = 0; i < data.length; i++) {
                        if (currentYear == data[i].date.substr(0,4)) {
                            sum += parseInt(data[i].amount);
                        }
                    }
                    $('#donated').text(formatAmount(sum, 'USD'));

                    // Show donations in overview
                    for (var i = 0; i < data.length; i++) {
                        // Add row to donation table
                        var row = $('<tr><td>' + data[i].date + '</td><td>' + formatAmount(data[i].amount, data[i].currency) + '</td><td>' + data[i].charity + '</td></tr>');
                        $('#donations tbody').append(row);
                    }

                    // Save for setup
                    donations       = data;
                    donatedThisYear = sum;

                    // Display content (if ready)
                    setup();
                });

                /**------------------------------------------
                 * Get incomes
                 *-------------------------------------------
                 */
                $.get(resource('incomes')).done(function(data) {
                    // Show past incomes in overview
                    for (var i = 0; i < data.length; i++) {
                        incomesPerYear[data[i].year] = data[i];

                        // Add row to incomes table
                        var row = $('<tr id="income-' + data[i].year + '"><td>' + data[i].year + '</td><td>' + formatAmount(data[i].amount, data[i].currency) + '</td></tr>');
                        $('#incomes tbody').append(row);
                    }

                    // Save for setup
                    incomes = data;

                    // Display content (if ready)
                    setup();
                });
            });

            /**
             * Setup function to format widgets, text, etc. and display contents
             */
            function setup() {
                if (!user || !donations || !incomes) {
                    // Still waiting for other calls to finish. Wait for next call.
                    return;
                }

                // Get income due this year
                var now      = new Date();
                var progress = 0; // Percentage of this year's income donated so far.
                if (incomes.length > 0 && incomes[0].year == now.getFullYear() && incomes[0].amount >= 0) {
                    // Check if it's the first year of pledge. If so, just take the corresponding share.
                    if (pledgeDate.getFullYear() == now.getFullYear()) {
                        incomeThisYear = (12 - pledgeDate.getMonth()) / 12 * incomes[0].amount;
                    } else {
                        incomeThisYear = incomes[0].amount;
                    }
                    progress = Math.floor(donatedThisYear / (incomeThisYear * pledgePercentage) * 100);
                }

                // Compute width for progress bar
                var width = Math.min(progress, 100);
                jQuery('#pledge-progress').css('width', width + '%').prop('aria-valuenow', width).text(width + '%');

                // Make appropriate call to action in lead text
                if (progress >= 100) {
                    jQuery('#status').text('You fulfilled your pledge successfully!');
                } else {
                    var toBeDonated = incomeThisYear * pledgePercentage - donatedThisYear;
                    jQuery('#status').text('You can still allocate ' + formatAmount(toBeDonated, 'USD') + ' to the most effective charities of your choice.');
                }

                //TODO Compute donated share in the past
                /*var sums = totalDonationsPerYear(donations);
                for (var year in incomesPerYear) {
                    if (year in sums) {
                        var share = Math.floor(sums[year] / parseFloat(incomesPerYear[year].amount));
                    }
                };*/

                // Display contents
                jQuery('.starter-template').show();
            }

            /**
             * Add up donations per year
             * @todo Add currency conversion support
             */
            function totalDonationsPerYear(donations) {
                var sums = {};
                for (var i = 0; i < donations.length; i++) {
                    var key = donations[i].date.substr(0,4);
                    if (!(key in sums)) {
                        sums[key] = 0;
                    }
                    sums[key] += parseInt(donations[i].amount);
                }

                return sums;
            }

            /**
             * Helper function for talking to the API
             */
            function resource(resource, id) {
                var path = api + '/users';
                if (resource != 'users') {
                    path += '/' + userId + '/' + resource;
                }
                if (id) {
                    path += '/' + id;
                }
                return {url: path, headers: {"Authorization": "Bearer " + apiToken}} ;
            }

            /**
             * Helper function to format amounts
             */
            function formatAmount(amount, currency) {
                var formattedAmount = numberWithCommas(amount);
                switch (currency) {
                    case 'USD':
                        return '$' + formattedAmount;
                    case 'GBP':
                        return '£' + formattedAmount;
                    case 'EUR':
                        return formattedAmount + ' €';
                    default:
                        return currency + ' ' + formattedAmount;
                }
            }

            /**
             * Number with commas
             */
            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            /**
             * Format date
             */
            function formatDate(date) {
              var monthNames = [
                "January", "February", "March",
                "April", "May", "June", "July",
                "August", "September", "October",
                "November", "December"
              ];

              var day        = date.getDate();
              var monthIndex = date.getMonth();
              var year       = date.getFullYear();

              return day + ' ' + monthNames[monthIndex] + ' ' + year;
            }
        </script>
    </body>
</html>
