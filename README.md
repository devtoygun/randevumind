# RandevuMind

RandevuMind, randevu ile calisan isletmeler icin gelistirilen abonelik tabanli bir SaaS projesidir.

## Hedef

Guzellik salonlari, kuaforler, tattoo studyolari, dis klinikleri ve benzeri isletmelerin:

- musteri kayitlarini
- seans / hak takibini
- odeme gecmisini
- anlik randevu yonetimini
- hatirlatma sureclerini

tek bir sistem uzerinden yonetebilmesini saglamak.

## Mimari Baslangici

- `apps/api`: Next.js tabanli backend ve panel API katmani
- `apps/web`: React Router tabanli musteri / on yuz uygulamasi

## Veritabani Onerisi

Bu urun icin ilk onerim `PostgreSQL`.

Sebep:

- iliskisel veri modeli musteri, randevu, paket, seans hakki ve odeme takibi icin uygun
- cok kullanicili SaaS senaryolarinda guvenilir
- ileride raporlama ve filtreleme ihtiyaclarinda esnek
- `Prisma` ile birlikte Node.js tarafinda hizli gelistirme deneyimi sunar

## Ilk Yol Haritasi

1. Monorepo yapisini netlestir.
2. Backend temelini kur.
3. Frontend temelini kur.
4. Ortak domain modellerini tasarla.
5. Kimlik dogrulama, randevu ve odeme akislarini ekle.
