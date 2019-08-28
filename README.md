# character-manager

# api documentation

```
endpoint : /api/v1
headers :
  Accept  application/json
  Content-type  application/json
Authorization:
  Type    Bearer Token
```

## Users

get /user

```javascript
{
    "data": [
        {
            "id": "12586014-a87a-4ace-906f-e28397ab8f71",
            "name": "Nemetruc",
            "email": "nemetruc@fakemail.com",
            "is_available": 1,
            "main_char_id": "3bf01e02-3268-4943-a159-7292e603b2df",
            "characters": [
                {
                    "id": "3bf01e02-3268-4943-a159-7292e603b2df",
                    "user_id": "12586014-a87a-4ace-906f-e28397ab8f71",
                    "name": "Néméclic",
                    "description": "Support scrapper",
                    "build_url": "http://gw2skills.net/editor/?PeAYDAA-e",
                    "created_at": "2019-08-27 07:34:59",
                    "updated_at": "2019-08-27 07:34:59"
                },
            ]
        },
    ],
    "links": {
        "first": "http://localhost:8000/api/v1/user?page=1",
        "last": "http://localhost:8000/api/v1/user?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http://localhost:8000/api/v1/user",
        "per_page": 15,
        "to": 5,
        "total": 5
    }
}
```

get /user/:id

```javascript
{
    "data": {
        "id": "12586014-a87a-4ace-906f-e28397ab8f71",
        "name": "Nemetruc",
        "email": "nemetruc@fakemail.com",
        "is_available": 1,
        "main_char_id": "3bf01e02-3268-4943-a159-7292e603b2df",
        "characters": [
            {
                "id": "32dccaec-f52f-4811-87cf-efb39e6cb737",
                "user_id": "12586014-a87a-4ace-906f-e28397ab8f71",
                "name": "Némé Bear",
                "description": "Amazing support scrapper",
                "build_url": "http://gw2skills.net/editor/?PeAYDAA-e",
                "created_at": "2019-08-27 07:34:42",
                "updated_at": "2019-08-27 08:23:27"
            },
        ]
    }
}
```

post /register {name, email, password, is_available}

```javascript
{
    "id": "38371527-59c3-4a6b-ad35-346e7ab3a27d",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvcmVnaXN0ZXIiLCJpYXQiOjE1NjY5MTI1NTMsImV4cCI6MTU2NjkxNjE1MywibmJmIjoxNTY2OTEyNTUzLCJqdGkiOiJqcjdlNjB4aldOM3Q3Q1NwIiwic3ViIjoiMzgzNzE1MjctNTljMy00YTZiLWFkMzUtMzQ2ZTdhYjNhMjdkIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.PvdHOfw9-z7evtTWtxdoxc2_TfX248c8VOtO7JyAT1E",
    "token_type": "bearer",
    "expires_in": 3600
}
```

post /login {email, password}

```javascript
{
    "id": "38371527-59c3-4a6b-ad35-346e7ab3a27d",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvcmVnaXN0ZXIiLCJpYXQiOjE1NjY5MTI1NTMsImV4cCI6MTU2NjkxNjE1MywibmJmIjoxNTY2OTEyNTUzLCJqdGkiOiJqcjdlNjB4aldOM3Q3Q1NwIiwic3ViIjoiMzgzNzE1MjctNTljMy00YTZiLWFkMzUtMzQ2ZTdhYjNhMjdkIiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.PvdHOfw9-z7evtTWtxdoxc2_TfX248c8VOtO7JyAT1E",
    "token_type": "bearer",
    "expires_in": 3600
}
```

put /user/:id {name, email, is_available, main_char_id}
**Requires Authorization**

```javascript
{
    "id": "38371527-59c3-4a6b-ad35-346e7ab3a27d",
    "name": "Nemetruc",
    "email": "nemetruc@fakemail.com",
    "is_available": 1,
    "main_char_id": "6bf64ec7-9655-4015-a3de-ee8f90dab22a",
    "created_at": "2019-08-27 13:29:13",
    "updated_at": "2019-08-27 13:34:07"
}
```

## Characters

get /character

```javascript
{
    "data": [
        {
            "id": "32dccaec-f52f-4811-87cf-efb39e6cb737",
            "name": "Némé Bear",
            "description": "Amazing support scrapper",
            "build_url": "http://gw2skills.net/editor/?PeAYDAA-e",
            "user": {
                "id": "12586014-a87a-4ace-906f-e28397ab8f71",
                "name": "Nemetruc",
                "is_available": 1
            }
        },
    ],
    "links": {
        "first": "http://localhost:8000/api/v1/character?page=1",
        "last": "http://localhost:8000/api/v1/character?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http://localhost:8000/api/v1/character",
        "per_page": 15,
        "to": 3,
        "total": 3
    }
}
```

get /character/:id

```javascript
{
    "data": {
        "id": "32dccaec-f52f-4811-87cf-efb39e6cb737",
        "name": "Némé Bear",
        "description": "Amazing support scrapper",
        "build_url": "http://gw2skills.net/editor/?PeAYDAA-e",
        "user": {
            "id": "12586014-a87a-4ace-906f-e28397ab8f71",
            "name": "Nemetruc",
            "is_available": 1
        }
    }
}
```

post /character {name, description, build_url}
**Requires Authorization**

```javascript
{
    "data": {
        "id": "cb291faf-3a5c-4acf-8b59-912904f1dfd3",
        "name": "Nemeteo",
        "description": "Hybrid Tempest",
        "build_url": "http://gw2skills.net/editor/?PeAYDAA-e",
        "user": {
            "id": "12586014-a87a-4ace-906f-e28397ab8f71",
            "name": "Nemetruc",
            "is_available": 1
        }
    }
}
```

put /character/:id {name, decription, build_url}
**Requires Authorization**

```javascript
{
    "data": {
        "id": "32dccaec-f52f-4811-87cf-efb39e6cb737",
        "name": "Némé Bear",
        "description": "Amazing support Firebrand",
        "build_url": "http://gw2skills.net/editor/?PeAYDAA-e",
        "user": {
            "id": "12586014-a87a-4ace-906f-e28397ab8f71",
            "name": "Nemetruc",
            "is_available": 1
        }
    }
}
```

delete /character/:id
**Requires Authorization**

`[]`

## Raid

get /raid ; returns the main character of currently available users

```javascript
{
    "data": [
        {
            "id": "6bf64ec7-9655-4015-a3de-ee8f90dab22a",
            "name": "NemeBear",
            "description": "Support firebrand",
            "build_url": "http://gw2skills.net/editor/?PeAYDAA-e",
            "user": {
                "id": "38371527-59c3-4a6b-ad35-346e7ab3a27d",
                "name": "Nemetruc",
                "is_available": 1
            }
        }
    ]
}
```
