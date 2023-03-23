# Dealer REST API

## Tools

- Laravel 8
- PHP 8
- MongoDB 4.2

## Prasyarat Instalasi

1. Anda wajib memiliki PHP package mongodb. Jika tidak memiliki, silahkan download file __dll__ di [link berikut](https://pecl.php.net/package/mongodb/1.13.0/windows)
2. Ekstrak file __php_mongodb.dll__ ke dalam folder __path/to/php/ext__ milik anda
3. Buka file __php.ini__ dan tambahkan tulisan `extension=mongodb`

## Petunjuk Instalasi

1. Buka command-prompt
2. __Clone__ project dealer-api ini dengan perintah
    `git clone https://github.com/siannas/dealer-api.git`
3. Masuk ke dalam folder `cd .\dealer-api\`
4. Jalankan perintah `copy .\.env.example .env` untuk menyalin .env file
5. Dalam file .env, ubahlah _DB_URI_ & _DB_DATABASE_ sesuai koneksi MongoDB anda
6. Jalankan perintah `composer install`
7. Impor semua data dengan perintah `php artisan db:seed`
8. `php artisan serve` untuk menjalankan server pengembangan

## Testing Fitur

Testing terdiri dari uji fitur pada API endpoint _/api/login_, _/api/stok_, _/api/penjualan_, dan _/api/laporan_. Jalankan perintah `composer test` untuk mengujinya.

| ![Screenshot of testing result](/images/composer-test.png) | 
|:--:| 
| *Screenshot of testing result* |

## Petunjuk Penggunaan

1. Fitur Login
    
    <details><summary><code>POST</code> <code><b>/api/login</b></code> <code>(Melakukan Autentikansi)</code></summary>

    ##### Parameters

    > None

    ##### Data-Raw

    > | name      | data type | example  | description |
    > |-----------|-----------|----------|--------------|
    > | email |  string   | "admin@gmail.com" | Gunakan email ini sebagai default |
    > | password |  string   | "admin" | Password default dari email _admin@gmail.com_  |


    ##### Responses

    > | http code     | content-type                      | response                                                            |
    > |---------------|-----------------------------------|---------------------------------------------------------------------|
    > | `200`         | `application/json`                | `{"success": true, "user":{...}, "token":"my-token"}`                                |

    ##### Example cURL

    > ```javascript
    >   curl -X POST -H "Content-Type: application/json" -H "Accept: application/json" --data-raw @post.json http://localhost:8000/api/login
    > ```

    </details>

    <details><summary><i>Screenshot</i></summary>

    | ![Screenshot of login](/images/login-postman.png) | 
    |:--:| 
    | *Login using Postman* |

2. Data Stok Kendaraan

    <details><summary><code>GET</code> <code><b>/api/stok?token={token}</b></code> <code>(Mendapatkan data stok kendaraan belum terjual)</code></summary>

    ##### Parameters

    > | name      |  type     | data type               | description                                                           |
    > |-----------|-----------|-------------------------|-----------------------------------------------------------------------|
    > | token      |  required | string   | Token yang didapatkan saat login  |


    ##### Responses

    > | http code     | content-type                      | response                                                            |
    > |---------------|-----------------------------------|---------------------------------------------------------------------|
    > | `200`         | `application/json`                | `{"total": 10, "mobil": {"count": 3, "data": [...], "motor": {"count": 3, "data": [...]} }`                                                                |  
    > | `401`         | `application/json`                  | `{"message":"Unauthenticated."}`                                  |

    ##### Example cURL

    > ```javascript
    >   curl -X GET -H "Content-Type: application/json" -H "Accept: application/json" http://localhost:8000/api/stok?token=my-token
    > ```

    </details>

    <details><summary><i>Screenshot</i></summary>

    | ![Screenshot of Cek Stok](/images/stok-postman.png) | 
    |:--:| 
    | *Checking Vehicles on sale using Postman* |

    | ![Screenshot of Cek Stok](/images/stok-browser.png) | 
    |:--:| 
    | *Checking Vehicles on Browser* |

3. Data Penjualan Kendaraan

    <details><summary><code>GET</code> <code><b>/api/penjualan?token={token}</b></code> <code>(Mendapatkan data kendaraan yang telah terjual)</code></summary>

    ##### Parameters

    > | name      |  type     | data type               | description                                                           |
    > |-----------|-----------|-------------------------|-----------------------------------------------------------------------|
    > | token      |  required | string   | Token yang didapatkan saat login  |


    ##### Responses

    > | http code     | content-type                      | response                                                            |
    > |---------------|-----------------------------------|---------------------------------------------------------------------|
    > | `200`         | `application/json`                | `{"total": 10, "total revenue": 999999, "mobil": {"count": 3, "revenue": 999, "penjualan": [...], "motor": {"count": 3,  "revenue": 999, "penjualan": [...]} }`                                                                |  
    > | `401`         | `application/json`                  | `{"message":"Unauthenticated."}`                                  |

    ##### Example cURL

    > ```javascript
    >   curl -X GET -H "Content-Type: application/json" -H "Accept: application/json" http://localhost:8000/api/penjualan?token=my-token
    > ```

    </details>

    <details><summary><i>Screenshot</i></summary>

    | ![Screenshot of Cek Stok](/images/penjualan-postman.png) | 
    |:--:| 
    | *Retrieve Sold Vehicles Data using Postman* |

    | ![Screenshot of Cek Stok](/images/penjualan-browser.png) | 
    |:--:| 
    | *Retrieve Sold Vehicles Data on Browser* |

4. Data Laporan Penjualan per Kendaraan

    <details><summary><code>GET</code> <code><b>/api/laporan?token={token}</b></code> <code>(Mendapatkan Laporan Penjualan per Kendaraan)</code></summary>

    ##### Parameters

    > | name      |  type     | data type               | description                                                           |
    > |-----------|-----------|-------------------------|-----------------------------------------------------------------------|
    > | token      |  required | string   | Token yang didapatkan saat login  |

    ##### Data-Raw

    > | name      | data type | example  | description |
    > |-----------|-----------|----------|--------------|
    > | dateStart |  string   | "2023-03-01" | Tanggal awal laporan yang diinginkan  |
    > | dateDiff |  integer   | 7 | Rentang hari pengelompokan laporan penjualan, jika 7 artinya pengelompokkan perpekan  |
    > | tipeKendaraan |  array   | [1] | Tipe kendaraan yang ingin diambil laporannya, [1] artinya motor, [2] artinya mobil, jika [1,2] artinya keduanya  |


    ##### Responses

    > | http code     | content-type                      | response                                                            |
    > |---------------|-----------------------------------|---------------------------------------------------------------------|
    > | `200`         | `application/json`                | `{{"total": 10, "total revenue": 999999, "detil": [...{"count":2, "date start": "2023-03-01", "date end": "2023-03-07", "revenue": 999, "penjualan":[...]}] }`                                                                |  
    > | `401`         | `application/json`                  | `{"message":"Unauthenticated."}`                                  |

    ##### Example cURL

    > ```javascript
    >   curl -X GET -H "Content-Type: application/json" -H "Accept: application/json" --data-raw @get.json http://localhost:8000/api/laporan?token=my-token
    > ```

    </details>

    <details><summary><i>Screenshot</i></summary>

    | ![Screenshot of Cek Stok](/images/laporan-postman.png) | 
    |:--:| 
    | *Sale Report using Postman* |

    | ![Screenshot of Cek Stok](/images/laporan-browser.png) | 
    |:--:| 
    | *Sale Report on Browser* |

