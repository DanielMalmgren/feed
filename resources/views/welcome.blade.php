<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Itsam feed</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Instruktioner</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    För att få en RSS ifrån en kalender, gör så här:<br><br>
                                    1. I kalenderns inställningar, lägg till så att servicekontot calendar-reader@feed-331213.iam.gserviceaccount.com har rättighet att läsa ifrån kalendern.<br>
                                    Det ska då se ut så här:<br>
                                    <img src="images/Kalenderdelning.png"><br><br>
                                    2. Fyll i relevanta fält nedan<br>
                                    <br>
                                    <label for="googleid">Kalenderns mailadress: </label>
                                    <input type="text" class="form-control" style="border-width:2px;" id="googleid" name="googleid" oninput="updateUrl()"><br><br>
                                    <label style="color: rgba(113,128,150)" for="maxEvents">Max händelser att visa: </label>
                                    <input type="number" class="form-control" style="border-width:2px;" id="maxEvents" name="maxEvents" oninput="updateUrl()"><br><br>

                                    <label style="color: rgba(113,128,150)" for="period">Period:</label>
                                    <select name="period" id="period" onchange="updateUrl()">
                                        <option value="all">Samtliga händelser</option>
                                        <option value="today">Idag</option>
                                        <option value="rest_of_today">Idag (endast kommande)</option>
                                        <option value="this_week">Denna vecka</option>
                                        <option value="rest_of_this_week">Denna vecka (endast kommande)</option>
                                        <option value="tomorrow">Imorgon</option>
                                        <option value="next_week">Nästa vecka</option>
                                        <option value="days">Begränsat antal dagar</option>
                                    </select>
                                    <br><br>

                                    <div id="maxDaysSetting" style="display:none">
                                        <label style="color: rgba(113,128,150)" for="maxDays">Max dagar att visa: </label>
                                        <input type="number" class="form-control" style="border-width:2px;" id="maxDays" name="maxDays" oninput="updateUrl()" value="30"><br><br>
                                    </div>

                                    <label style="color: rgba(113,128,150)" for="filter">Ord att filtrera händelser på: </label>
                                    <input type="text" class="form-control" style="border-width:2px;" id="filter" name="filter" oninput="updateUrl()"><br><br><br>
                                    3. RSS:en för din kalender finns nu på följande adress:<br>
                                    <div id="url">Visas när korrekt adress fyllts i!</div>
                                </div>
                            </div>
                        </div>

                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" language="javascript">
            function validateEmail(email) {
                const re = /\S+@\S+\.\S+/;
                return re.test(email);
            }

            function updateUrl() {
                var period=document.getElementById("period").value;
                if(period=='days') {
                    document.getElementById("maxDaysSetting").style.display="block";
                } else {
                    document.getElementById("maxDaysSetting").style.display="none";
                }

                var googleid=document.getElementById('googleid').value;
                if (validateEmail(googleid)) {
                    var url="https://feed.itsam.se/calendar/rss?id="+googleid;
                    var maxEvents=document.getElementById('maxEvents').value;
                    if(maxEvents != '') {
                        url=url+'&maxEvents='+maxEvents
                    }
                    var maxDays=document.getElementById('maxDays').value;
                    if(period != 'all' && period != 'days') {
                        url=url+'&period='+period
                    }
                    if(period=='days') {
                        url=url+'&maxDays='+maxDays
                    }
                    var filter=document.getElementById('filter').value;
                    if(filter != '') {
                        url=url+'&filter='+filter
                    }
                    document.getElementById("url").innerHTML = '<a href="'+url+'">'+url+'</a>';
                } else {
                    document.getElementById("url").innerHTML = 'Visas när korrekt adress fyllts i!';
                }
            }
        </script>

    </body>
</html>
