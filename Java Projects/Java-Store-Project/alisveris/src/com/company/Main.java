package com.company;

import kategoriler.*;
import sepetdosyalar.Sepet;
import urunler.BaseUrun;
import kullanicilar.Kullanicilar;
import kullanicilar.KullaniciBilgileri;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class Main {


    public static void main(String[] args) {
        program();
    }

    public static void program(){
        Kullanicilar kullanici = new Kullanicilar();
        KullaniciBilgileri kullaniciBilgileri = new KullaniciBilgileri();
        int kullaniciIndex =1;
        for (int i =0; i<3;i++){
            kullanici = new Kullanicilar();
            if(i==0){
                kullanici.kullaniciAdi ="Zahit Can Karaca";
                kullanici.kullaniciAdress ="Seyrantepe huzur sokkak 77/9";
            }
            else if(i==1){
                kullanici.kullaniciAdi ="Taha Kaya";
                kullanici.kullaniciAdress ="Feriköy neşet sokkak 20/3";
            }
            else{
                kullanici.kullaniciAdi ="Enes Civan";
                kullanici.kullaniciAdress ="Okmeydanı güllü sokak 4/2";
            }

            kullaniciBilgileri.kullanicilar.add(kullanici);
        }
        while(kullaniciIndex == 1 || kullaniciIndex == 2 || kullaniciIndex == 3 ) {
            System.out.println("Kullanıcı Seçiniz");
            for (int i =0; i<3;i++){

                System.out.print((i+1) + ")" + kullaniciBilgileri.kullanicilar.get(i).kullaniciAdi + "\t");
                System.out.println("Adress: " + kullaniciBilgileri.kullanicilar.get(i).kullaniciAdress);
            }



            // Sepet sepet = Sepet.getInstance();

            System.out.println("Kendin Topla sitemize hoş geldiniz. (Siteden Çıkmak için -1 giriniz)");
            Scanner scannerKullanici = new Scanner(System.in);
            kullaniciIndex = Integer.parseInt(scannerKullanici.nextLine());
            if(kullaniciIndex ==-1){
                break;
            }else if(kullaniciIndex > 3 || kullaniciIndex <1){
                break;
            }

            System.out.println("Kategoriler: (Sepet listeleme için -2, Çıkmak için -1 e basınız.)***");

            List<BaseCategory> categoryList = new ArrayList<>();

            categoryList.add(new CatAnakart());
            categoryList.add(new CatEkrankartı());
            categoryList.add(new CatHafiza());
            categoryList.add(new CatIslemci());
            categoryList.add(new CatKasa());
            categoryList.add(new CatRam());

            for (int i = 0; i < categoryList.size(); i++) {
                System.out.println((i + 1) + "." + categoryList.get(i).getName());
            }

            Scanner scanner = new Scanner(System.in);
            int secenek = Integer.parseInt(scanner.nextLine());

            while (secenek != -1) {
                while (secenek == -2) {
                    if (secenek == -1) {
                        return;
                    }
                    sepetIslemleri(kullaniciBilgileri.kullanicilar.get(kullaniciIndex-1).kullaniciSepeti);
                    System.out.println("Kategoriler: (Sepet listeleme için -2, Çıkmak için -1 e basınız.)**");
                    for (int i = 0; i < categoryList.size(); i++) {
                        System.out.println((i + 1) + "." + categoryList.get(i).getName());
                    }
                    secenek = Integer.parseInt(scanner.nextLine());

                }
                if(secenek == -1){
                    break;
                }

                System.out.println("Ürünler: (Çıkmak için -1 e basınız.)");

                //kategori bulma
                BaseCategory category = categoryList.get(secenek - 1);

                //kategoriye ait ürünleri getirme
                List<BaseUrun> urunList = category.getUrunler();

                for (int i = 0; i < urunList.size(); i++) {
                    System.out.println((i + 1) + "." + urunList.get(i).getName()
                            + " - " + urunList.get(i).getMarka() + " - " + urunList.get(i).getFiyat() + " TL "
                            + " - " + urunList.get(i).getMensei());
                }

                System.out.println("Satin almak istediginiz ürünü seçiniz: ");
                secenek = Integer.parseInt(scanner.nextLine());
                System.out.println("Bu üründen satın almak istediginiz adeti giriniz: Not : Girilen adet sıfır ve daha az bir değer olursa sepete 1 ürün eklenecektir");
                Scanner scannerAdet = new Scanner(System.in);
                int urunAdedi = Integer.parseInt(scannerAdet.nextLine());
                if (urunAdedi <= 0){
                    urunAdedi = 1;
                }
                BaseUrun urun = urunList.get(secenek - 1);
                for (int i = 0; i<urunAdedi; i++){
                    kullaniciBilgileri.kullanicilar.get(kullaniciIndex-1).kullaniciSepeti.urunEkle(urun);
                }


                System.out.println("Kategoriler: (Sepet listeleme için -2, Çıkmak için -1 e basınız.)*");
                for (int i = 0; i < categoryList.size(); i++) {
                    System.out.println((i + 1) + "." + categoryList.get(i).getName());
                }
                secenek = Integer.parseInt(scanner.nextLine());


            }
        }
        System.out.println("Teşekkürler. İyi günler dileriz.");
    }


    public static void sepetIslemleri(Sepet sepet) {
        //Sepet sepet = Sepet.getInstance();

        System.out.println("Ürün silmek için index giriniz: (Devam etmek için -1 giriniz) veya (Onaylamak için -3 giriniz)");
        sepet.show();

        Scanner scanner = new Scanner(System.in);
        int secenek = Integer.parseInt(scanner.nextLine());
        if (secenek > 0) {
            sepet.urunCikar(secenek - 1);
        }
        else if(secenek == -3){
            sepet.urunfull();
            System.out.println("Sepetiniz onaylanmıştır. Ürünleriniz adresinize gönderilmek üzere yola çıkmıştır.");
            program();
        }


    }

}
