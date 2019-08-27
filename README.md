# character-manager

# api documentation

endpoint : /api/v1
headers :
Accept application/json
Content-type application/json

## Characters

get /character
get /character/:id
post /character {name, description, build_url}
put /character/:id {name, decription, build_url}
del /character/:id

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
