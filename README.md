
## Laravel Api 

Requirement 1
When the endpoint:
GET /api/external-books?name=:nameOfABook

is requested, your application should query the Ice And Fire API and use the data received to
respond with precisely the following JSON structure if there are results;

        {
    "status_code": "200",
    "status": "success",
    "data": [
        {
            "name": "A Game of Thrones",
            "isbn": "978-0553103540",
            "authors": [
                "George R. R. Martin"
            ],
            "numberOfPages": 694,
            "publisher": "Bantam Books",
            "country": "United States",
            "mediaType": "Hardcover",
            "released": "1996-08-01T00:00:00"
        }
    ]
}
            Or precisely this JSON structure if the Books API returns no results;
            {
        "status_code":404,
        "Status":"not found",
        "data":[]
        }

        Requirement 2

        POST /api/v1/create
        is requested with the following data to create books
                ● name
                ● isbn
                ● authors
                ● country
                ● number_of_pages
                ● publisher
                ● release_date

        passing them has form data in postman

        Requirement 3

        GET /api/v1/Get_book

        sample Response

        {
            "status_code": "200",
            "Status": "successs",
            "data": [
                [
                    {
                        "name": "william",
                        "isbn": "1222--111133",
                        "authors": [
                            "cole william"
                        ],
                        "number_of_page": null,
                        "publisher": "slele",
                        "country": "Gobe",
                        "release_date": "2012-12-19"
                    },
                    {
                        "name": "cole",
                        "isbn": "1222--11112",
                        "authors": [
                            "wale"
                        ],
                        "number_of_page": null,
                        "publisher": "slele",
                        "country": "nigeria",
                        "release_date": "2012-12-10"
                    },
                    {
                        "name": "cole",
                        "isbn": "1222--11112",
                        "authors": [
                            "wale"
                        ],
                        "number_of_page": null,
                        "publisher": "slele",
                        "country": "nigeria",
                        "release_date": "2012-12-10"
                    },
                    {
                        "name": "cole",
                        "isbn": "1222--11112",
                        "authors": [
                            "wale"
                        ],
                        "number_of_page": null,
                        "publisher": "slele",
                        "country": "nigeria",
                        "release_date": "2012-12-10"
                    },
                    {
                        "name": "rosemary",
                        "isbn": "1222--111133",
                        "authors": [
                            "wale_reay"
                        ],
                        "number_of_page": "2222",
                        "publisher": "slele",
                        "country": "nigeria",
                        "release_date": "2012-12-10"
                    },
                    {
                        "name": "rosemary",
                        "isbn": "1222--111133",
                        "authors": [
                            "wale_reay"
                        ],
                        "number_of_page": "2222",
                        "publisher": "slele",
                        "country": "nigeria",
                        "release_date": "2012-12-11"
                    },
                    {
                        "name": "rosemary",
                        "isbn": "1222--111133",
                        "authors": [
                            "wale_reay"
                        ],
                        "number_of_page": "2222",
                        "publisher": "slele",
                        "country": "America",
                        "release_date": "2012-12-11"
                    },
                    {
                        "name": "rosemary",
                        "isbn": "1222--111133",
                        "authors": [
                            "yessss"
                        ],
                        "number_of_page": "2222",
                        "publisher": "slele",
                        "country": "America",
                        "release_date": "2012-12-11"
                    },
                    {
                        "name": "rosemary",
                        "isbn": "1222--111133",
                        "authors": [
                            "yessss"
                        ],
                        "number_of_page": "2222",
                        "publisher": "slele",
                        "country": "America",
                        "release_date": "2012-12-19"
                    }
                ]
            ]
        }


        is requested, your solution will return a list of books from the local database and can also search 
        using name (string), country (string), publisher (string) and
        release date (year, integer).


        example
        /api/v1/Get_book/Gameofthrone


        To search 

        GET /api/v1/Get_book/"value to search"
        {
            "status_code": "200",
            "Status": "successs",
            "data": [
                [
                    {
                        "name": "rosemary",
                        "isbn": "1222--111133",
                        "authors": [
                            "wale_reay"
                        ],
                        "number_of_page": "2222",
                        "publisher": "slele",
                        "country": "America",
                        "release_date": "2012-12-11"
                    },
                    {
                        "name": "rosemary",
                        "isbn": "1222--111133",
                        "authors": [
                            "yessss"
                        ],
                        "number_of_page": "2222",
                        "publisher": "slele",
                        "country": "America",
                        "release_date": "2012-12-11"
                    },
                    {
                        "name": "rosemary",
                        "isbn": "1222--111133",
                        "authors": [
                            "yessss"
                        ],
                        "number_of_page": "2222",
                        "publisher": "slele",
                        "country": "America",
                        "release_date": "2012-12-19"
                    }
                ]
            ]
        }



        Response 

        Requirement 3

        PATCH /api/v1/books/:id

        post variable has body( json on postman ) to update table record


        sample post

        {
        "name":"william",
        "isbn":"1222--111133",
        "authors":"cole william",
        "country":"Gobe",
        "number_of_pages":"2222",
        "publisher":"slele",
        "release_date":"2012-12-19"

        }

        sample Response

        {
            "status_code": "200",
            "Status": "successs",
            "data": [
                [
                    {
                        "name": "rosemary",
                        "isbn": "1222--111133",
                        "authors": [
                            "wale_reay"
                        ],
                        "number_of_page": "2222",
                        "publisher": "slele",
                        "country": "America",
                        "release_date": "2012-12-11"
                    },
                ]
                ]
                }


        Requirement 3

        DELETE /api/v1/books/id

        Or

        POST /api/v1/books/:id/delete
        is requested with a specific :id in the URL to delete record from database

        Response sample
        {
        "status_code":204,
        "status":"success",
        "message":"The book ‘My first book’ was deleted successfully",
        "data":[]
        }


        Requirement 4 

        GET /api/v1/books/:id
        is requested with a specific :id in the URL. it should show the specific book

        resonse

        {
            "status_code":200,
            "status":"success",
            "data":{
            "id":1,
            "name":"My First Book",
            "isbn":"123-3213243567",
            "authors":[
                "John Doe"
                ],
            "number_of_pages":350,
            "publisher":"Acme Books Publishing",
            "country":"United States",
            "release_date":"2019-01-01"
            }
        }