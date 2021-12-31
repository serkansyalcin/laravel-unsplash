Laravel 8 > API ile Unsplash servisinden fotoğrafların çekilip, veritabanına kaydedilmesi uygulaması.

Çalıştırmak için;

1.Adım: composer update

2.Adım: Env Dosyasının Düzenlenmesi

İlk olarak veri tabanı bilgileri girilmeli.

UNSPLASH_CLIENT_ID="Yi9aXBa-lrFQ4PgVJcsjRoSO1zkgd20-wuc1O12aK_Y"

ADMIN_EMAIL="serkan.syalcin@hotmail.com"

3.Adım: php artisan migrate 

3.Adım: php artisan serve komutu ile projeyi çalıştırmak

4.Adım istediğimiz kategorinin adını artisan komutu ile girip, kategoriye ait görsellerin veri tabanına kayıt edilmesini sağlamak;

>> php artisan topic:get architecture

Hepsi Bu kadar.

Eklenen kategoriye ait görselelrin tutulduğu tablo.
![image](https://user-images.githubusercontent.com/26199757/147833729-a48e1a6d-2ca3-4824-ae9c-e682165ed654.png)

Eklelen kategorilerin tutulduğu tablo.
![image](https://user-images.githubusercontent.com/26199757/147833754-702b9044-333b-49e8-aee5-4b6d58e95c3e.png)

