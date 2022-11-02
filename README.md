## Laravel Api

Clone the laravel file from the git repository.
After cloning the file update your PHP version to PHP 7.4 or later.
-- run command "composer run post-root-package-install" (This will create the required .env file)

-- run command "composer run post-create-project-cmd" (This sets the APP_KEY value in your .env file)

-- update the .env file with your DB configuration and App url

APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

-- run command "PHP artisan migrate"

(This will run the dB migration files and create all necessary tables.
If you haven't created your DB before running this command, you'd be asked if it should be created for you.
Type yes then enter).
or
(you create your database manually and use "-- run command PHP artisan migrate" to migrate all the tables )

After the Creation of the necessary tables to do unit test for the code, you can just do
--- run command "PHP artisan test"

     To run each API using PostMan:

      Requirement 1
       When the endpoint:
      To Get the External book record from the ice and fire endpoint

     Request Url:
      GET /api/v1/external-books?name=A Game of Thrones

     Sample Response:
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
            "number of pages": 694,
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

      Request for the creation of books

        Request Url
        POST /api/v1/create

          Payload

             name
             isbn
             authors
             country
            number_of_pages
            publisher
             release_date

    Sample Response
     {
        "status_code":201,
        "status":"success",
        "data":{
                 "book":{
                         "name":"My First Book",
                          "isbn":"123-3213243567",
                "authors":[
                            "John Doe"
                          ],
        "number_of_pages":350,
        "publisher":"Acme Books",
        "country":"United States",
        "release_date":"2019-08-01"
        }
    }

    Requirement 3
        Get all books in saved in the database record

    Request Url
        GET /api/v1/Getbook

    Sample Response:
    {
    "status_code": "200",
    "Status": "successs",
    "data": [
        [
        {
            "name": "william cole",
            "isbn": "isbn-123567",
            "authors": [
            "Oreoluw"
            ],
            "number_of_page": 2330,
            "publisher": "Oreoluwa",
            "country": "Nigeria",
            "release_date": "2020-11-20"
        },
        ]
      ]
    }

        Requirement 4

        Updating book using the id of the book

       Request Url

       PATCH /api/v1/Update/:id

       sample payload
        {
            "name":"william",
            "isbn":"1222--111133",
            "authors":"cole william",
            "country":"Gobe",
            "number_of_pages":"2222",
            "publisher":"slele",
            "release_date":"2012-12-19"
        }

    sample response
        {
            "status_code":200,
            "status":"success",
            "message":"The book My First Book was updated successfully",
            "data":{
                    "id":1,
                    "name":"My First Updated Book",
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

            Requirement 5
            To Delete books using the id of the book or record in the database

            Request url:
            DELETE. /api/v1/Delete/:id

            Sample Response
            {
            "status_code": "204",
            "status": "william cole has been deleted successfully",
            "data": []
            }

            Request Url:
            POST /api/v1/Deletebook/:id/delete

        Sample Response
        {
        "status_code": "204",
        "status": "william cole has been deleted successfully",
        "data": []
        }

        Requirement 6
        To show books using the id of the book or record in the database

        Request Url
        GET /api/v1/show/:id

        Sample Response
        {
            "status_code": "200",
            "status": "success",
            "data": {
                "id": 6,
                "name": "william cole",
                "isbn": "isbn-123567",
                "authors": [
                "Oreoluw"
                ],
                "number_of_page": 2330,
                "publisher": "Oreoluwa",
                "country": "Nigeria",
                "release_date": "2020-11-20"
          }
