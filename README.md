# character-manager

# api documentation

```
endpoint : /api/v1
headers :
  Accept application/json
  Content-type application/json
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
**Requires Authorization Type : Bearer Token**

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
**Requires Authorization Type : Bearer Token**

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

del /character/:id
**Requires Authorization Type : Bearer Token**
`[]`

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

put /user/:id {name, email, is_available, main_char_id}
**Requires Authorization Type : Bearer Token**
