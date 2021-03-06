## BC ASSIGNMENT BY SACHIN ADLINGE
<hr>
<br><br>
<strong>INSTRUCTIONS TO RUN THE APPLICATION</strong>
<hr>
This application was developed in Laravel 5.7 and hence make sure the following pre-requisites exist at your end
<br>
<strong>Pre-requisites</strong>
<ul>
    <li>You have Laravel 5.7 installed</li>
    <li>Composer installed</li>
    <li>POSTMAN app installed</li>
</ul>
<br>
<strong>Steps to Run the application:</strong>
<ol>
    <li>create a project folder locally</li>
    <li>open terminal and go to project directory</li>
    <li>run command <strong>git init</strong></li>
    <li>run command <strong>git remote add origin https://github.com/sac2811/bc-test-tip.git</strong></li>
    <li>run command <strong>git pull origin master</strong></li>
    <li>run command <strong>composer install</strong></li>
    <li>run command <strong>php artisan key:generate</strong> (in case the installation does not generate the key automatically)</li>
    <li>rename <strong>.env.example</strong> to <strong>.env</strong></li>
    <li>change database name, username and password in .env</li>
    <li>create the database locally with the same name as given in .env and assign user rights to this db</li>
    <li>run command <strong>php artisan migrate</strong></li>
    <li>run command <strong>php artisan db:seed</strong></li>
    <li>run command <strong>php artisan passport:install</strong></li>
</ol>
<br>
<br>
<strong>Testing with Postman</strong>
<ul>
    <li>You can find the postman collection <strong>"BC-Test-Collection.postman_collection.json"</strong> in the project root directory</li>
    <li>
        <strong>Register API: POST http://domain.local/api/register</strong>
        <ul>
            <li>
                REQUEST
                <ul>
                    <li>enter values for all required parameters</li>
                </ul>
            </li>
            <li>
                RESPONSE
                <ul>
                    <li>"token" is returned. Use this token in all CRUD request headers</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <strong>Login API: POST http://domain.local/oauth/token</strong>
        <ul>
            <li>
                REQUEST
                <ul>
                    <li>enter username and password of your choice</li>
                    <li>grant_type should be 'password'</li>
                    <li>client_id should be 2</li>
                    <li>for client_secret go to your database table oauth_clients and look for the column "secret" whose id is 2</li>
                </ul>
            </li>
            <li>
                RESPONSE
                <ul>
                    <li>JSON data of login record</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <strong>Create API: POST http://domain.local/api/tips</strong>
        <ul>
            <li>
                HEADERS
                <ul>
                    <li>Accept application/json</li>
                    <li>Authorization Bearer [token received in Register API]</li>
                </ul>
            </li>
            <li>
                REQUEST
                <ul>
                    <li>title</li>
                    <li>description</li>
                </ul>
            </li>
            <li>
                RESPONSE
                <ul>
                    <li>JSON data of created record</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <strong>Read One API: GET http://domain.local/api/tips/1</strong>
        <ul>
            <li>
                HEADERS
                <ul>
                    <li>Accept application/json</li>
                    <li>Authorization Bearer [token received in Register API]</li>
                </ul>
            </li>
            <li>
                REQUEST
                <ul>
                    <li>N/A</li>
                </ul>
            </li>
            <li>
                RESPONSE
                <ul>
                    <li>JSON data of record with id=1</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <strong>Read All API: GET http://tip-local/api/tips</strong>
        <ul>
            <li>
                HEADERS
                <ul>
                    <li>Accept application/json</li>
                    <li>Authorization Bearer [token received in Register API]</li>
                </ul>
            </li>
            <li>
                REQUEST
                <ul>
                    <li>N/A</li>
                </ul>
            </li>
            <li>
                RESPONSE
                <ul>
                    <li>JSON data of all records</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <strong>Update API: PUT http://domain.local/api/tips/1?title=Tip_2&description=Tip_description_2</strong>
        <ul>
            <li>
                HEADERS
                <ul>
                    <li>Accept application/json</li>
                    <li>Authorization Bearer [token received in Register API]</li>
                </ul>
            </li>
            <li>
                REQUEST
                <ul>
                    <li>N/A</li>
                </ul>
            </li>
            <li>
                RESPONSE
                <ul>
                    <li>JSON data of updated record</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <strong>DELETE http://domain.local/api/tips/1</strong>
        <ul>
            <li>
                HEADERS
                <ul>
                    <li>Accept application/json</li>
                    <li>Authorization Bearer [token received in Register API]</li>
                </ul>
            </li>
            <li>
                REQUEST
                <ul>
                    <li>N/A</li>
                </ul>
            </li>
            <li>
                RESPONSE
                <ul>
                    <li>JSON data of deleted record</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>
<br>
<br>
<strong>Unit Testing with PHPUnit</strong>
<br>
Open your terminal and type command ./vendor/bin/phpunit
<br>
<br>
<strong>Logging</strong>
<br>
All requests are handled with custom Logger class. View logs of all the requests in /storage/logs/laravel.log file
<br>
<br>
<strong>PSR check</strong>
<br>
open terminal, navigate to project root directory and run command (don't forget the dot in the end of this command):
phpcs --ignore=*/vendor/* --standard=PSR2 .
<br>
