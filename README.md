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
    <li>run command git pull origin master</li>
    <li>run command composer install</li>
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
</ul>
