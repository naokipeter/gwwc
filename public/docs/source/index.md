---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://gwwc.dev/docs/collection.json)
<!-- END_INFO -->

#Authentication
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login

> Example request:

```bash
curl -X POST "http://gwwc.dev/api/login"  \
-H "Accept: application/json" \
--data "email=zoie.cartwright@gmail.com&password=gwwc"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/login",
    "method": "POST",
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/login`


<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## Logout

> Example request:

```bash
curl -X POST "http://gwwc.dev/api/logout" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/logout",
    "method": "POST",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

#Donation
<!-- START_2429f48454ca1a6b8d804d5403cd69c8 -->
## Get all donations

> Example request:

```bash
curl -X GET "http://gwwc.dev/api/users/1/donations" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1/donations",
    "method": "GET",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/{user}/donations`

`HEAD api/users/{user}/donations`


<!-- END_2429f48454ca1a6b8d804d5403cd69c8 -->

<!-- START_7972b1e5c440f19feaf35ab411c8cb5c -->
## Create a donation

> Example request:

```bash
curl -X POST "http://gwwc.dev/api/users/1/donations" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
--data "currency=CHF&amount=100&date=2017-02-21&user_id=1"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1/donations",
    "method": "POST",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/{user}/donations`


<!-- END_7972b1e5c440f19feaf35ab411c8cb5c -->

<!-- START_6c4c5f99b85073cc654a0368927778dc -->
## Get a donation

> Example request:

```bash
curl -X GET "http://gwwc.dev/api/users/1/donations/1" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1/donations/1",
    "method": "GET",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/{user}/donations/{donation}`

`HEAD api/users/{user}/donations/{donation}`


<!-- END_6c4c5f99b85073cc654a0368927778dc -->

<!-- START_17422eb2028def02043fecce2ab52f70 -->
## Update a donation

> Example request:

```bash
curl -X PUT "http://gwwc.dev/api/users/1/donations/1" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1/donations/1",
    "method": "PUT",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/users/{user}/donations/{donation}`

`PATCH api/users/{user}/donations/{donation}`


<!-- END_17422eb2028def02043fecce2ab52f70 -->

<!-- START_dc2755c4418bd14e1faf45025d9849e2 -->
## Delete a donation

> Example request:

```bash
curl -X DELETE "http://gwwc.dev/api/users/1/donations/1" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
--data "charity=Foobar"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1/donations/1",
    "method": "DELETE",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/users/{user}/donations/{donation}`


<!-- END_dc2755c4418bd14e1faf45025d9849e2 -->

#Income
<!-- START_7116cc7eb23b5337ea7c5da4c44eb5b3 -->
## Get all incomes

> Example request:

```bash
curl -X GET "http://gwwc.dev/api/users/1/incomes" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1/incomes",
    "method": "GET",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/{user}/incomes`

`HEAD api/users/{user}/incomes`


<!-- END_7116cc7eb23b5337ea7c5da4c44eb5b3 -->

<!-- START_59128a1ca8d509d81b9ec3c30aa541ff -->
## Create an income

> Example request:

```bash
curl -X POST "http://gwwc.dev/api/users/1/incomes" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
--data "currency=CHF&amount=100&year=2017&user_id=1&percentage_pledged=10"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1/incomes",
    "method": "POST",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/{user}/incomes`


<!-- END_59128a1ca8d509d81b9ec3c30aa541ff -->

<!-- START_bea6cc6226050d23263644cbe1f85ffc -->
## Get an income

> Example request:

```bash
curl -X GET "http://gwwc.dev/api/users/1/incomes/1" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1/incomes/1",
    "method": "GET",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/{user}/incomes/{income}`

`HEAD api/users/{user}/incomes/{income}`


<!-- END_bea6cc6226050d23263644cbe1f85ffc -->

<!-- START_c2b93fcfb6e62d482bbb1f179ec2aa6f -->
## Update an income

> Example request:

```bash
curl -X PUT "http://gwwc.dev/api/users/1/incomes/1" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1/incomes/1",
    "method": "PUT",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/users/{user}/incomes/{income}`

`PATCH api/users/{user}/incomes/{income}`


<!-- END_c2b93fcfb6e62d482bbb1f179ec2aa6f -->

<!-- START_e571848a62defe2659bc55b80604335e -->
## Delete an income

> Example request:

```bash
curl -X DELETE "http://gwwc.dev/api/users/1/incomes/1" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
--data "amount=1000"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1/incomes/1",
    "method": "DELETE",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/users/{user}/incomes/{income}`


<!-- END_e571848a62defe2659bc55b80604335e -->

#User
<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## Get all users

> Example request:

```bash
curl -X GET "http://gwwc.dev/api/users" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users",
    "method": "GET",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->

<!-- START_8f99b42746e451f8dc43742e118cb47b -->
## Get a user

> Example request:

```bash
curl -X GET "http://gwwc.dev/api/users/1" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1",
    "method": "GET",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/{user}`

`HEAD api/users/{user}`


<!-- END_8f99b42746e451f8dc43742e118cb47b -->

<!-- START_48a3115be98493a3c866eb0e23347262 -->
## Update a user

> Example request:

```bash
curl -X PUT "http://gwwc.dev/api/users/1" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/1",
    "method": "PUT",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/users/{user}`

`PATCH api/users/{user}`


<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## Delete a user

> Example request:

```bash
curl -X DELETE "http://gwwc.dev/api/users/1" \
-H "Accept: application/json" \
-H "Authorization: Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
--data "name=Fritz"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://gwwc.dev/api/users/2",
    "method": "DELETE",
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/users/{user}`


<!-- END_d2db7a9fe3abd141d5adbc367a88e969 -->
