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


![image](https://user-images.githubusercontent.com/26199757/147833729-a48e1a6d-2ca3-4824-ae9c-e682165ed654.png)
