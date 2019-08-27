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
                    "id": "32dccaec-f52f-4811-87cf-efb39e6cb737",
                    "user_id": "12586014-a87a-4ace-906f-e28397ab8f71",
                    "name": "Némé Bear",
                    "description": "Amazing support scrapper",
                    "build_url": "http://gw2skills.net/editor/?PeAYDAA-e",
                    "created_at": "2019-08-27 07:34:42",
                    "updated_at": "2019-08-27 08:23:27"
                },
                {
                    "id": "3bf01e02-3268-4943-a159-7292e603b2df",
                    "user_id": "12586014-a87a-4ace-906f-e28397ab8f71",
                    "name": "Néméclic",
                    "description": "Support scrapper",
                    "build_url": "http://gw2skills.net/editor/?PeAYDAA-e",
                    "created_at": "2019-08-27 07:34:59",
                    "updated_at": "2019-08-27 07:34:59"
                }
            ]
        },
        {
            "id": "b8b16c7b-13e4-40c8-aca7-48f88afa8aca",
            "name": "Balecan",
            "email": "balecan@fakemail.com",
            "is_available": 1,
            "main_char_id": "7fabfba9-cf9c-4556-8018-e77fd33b1915",
            "characters": [
                {
                    "id": "7fabfba9-cf9c-4556-8018-e77fd33b1915",
                    "user_id": "b8b16c7b-13e4-40c8-aca7-48f88afa8aca",
                    "name": "Tharane",
                    "description": "Support firebrand",
                    "build_url": "http://gw2skills.net/editor/?PeAYDAA-e",
                    "created_at": "2019-08-27 07:36:46",
                    "updated_at": "2019-08-27 07:36:46"
                }
            ]
        },
        {
            "id": "c65d74bf-773d-4c31-8027-08d6539a0833",
            "name": "Tydresic",
            "email": "tydresic@fakemail.com",
            "is_available": 0,
            "main_char_id": null,
            "characters": []
        },
        {
            "id": "ef549807-fe96-4b06-842a-6690c428fd35",
            "name": "Etiad",
            "email": "etiad@fakemail.com",
            "is_available": 0,
            "main_char_id": null,
            "characters": []
        },
        {
            "id": "ea1c18d5-cb8f-4727-9f38-786975772463",
            "name": "Leeroy",
            "email": "lerroy@fakemail.com",
            "is_available": 1,
            "main_char_id": null,
            "characters": []
        }
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
            {
                "id": "3bf01e02-3268-4943-a159-7292e603b2df",
                "user_id": "12586014-a87a-4ace-906f-e28397ab8f71",
                "name": "Néméclic",
                "description": "Support scrapper",
                "build_url": "http://gw2skills.net/editor/?PeAYDAA-e",
                "created_at": "2019-08-27 07:34:59",
                "updated_at": "2019-08-27 07:34:59"
            }
        ]
    }
}
```

put /user/:id {}
