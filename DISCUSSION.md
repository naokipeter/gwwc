# Discussion

This file contains some comments about decisions and tradeoffs I made.

## Backend

### Limitations
* No currency conversion for past or present, i.e. $1 = £1 = €1 = ...
* Dummy data can be inconsistent. E.g. a user who has made the pledge in 2017 may have donations 
and incomes from previous years.
* No tests for resource classes

### Choice of framework
This is my first project with Laravel. I gave it a try because it looked less verbose and 
more opinionated than Symfony. It has a lot of handy conventions and a few unique featuers 
like Valet. The things I missed most are:
* The clear separation of domain logic and application logic (as in Doctrine ORM)
* Automatic migration file generation based on class properties (as in Doctrine Migrations)
* Inside-class annotations for routing, authorization, persistence, etc.
* Nelmio ApiDoc Bundle 

I followed this tutorial here: https://www.toptal.com/laravel/restful-laravel-api-tutorial

## Frontend

### Limitations
* Creation, Update and Deletion of resources not implemented
* Currency in the paragraph below the Pledge heading is always USD
* The JavaScript code could need some refactoring

### Choice of framework
I used jQuery for making queries to the backend. If the frontend wasn't required to be a
single-page webapp, I'd have used a server-side template engine and perhaps pjax. I tend
to do without more powerful frontend libraries (React, Angular, Ember) when there's no
compelling reason for the domain logic to reside in the frontend, mainly because frontend 
libraries (except jQuery) tend to have shorter shelf-lives and often oblige you to 
duplicate some parts of your backend code (e.g. model, validation logic, etc.). 
For webapps that do need a fat client, I mainly used the Cappuccino Framework and 
the Ratatosk REST client in the past. For projects that need to support mobile browsers 
and/or native mobile apps, I'd use Ionic.

