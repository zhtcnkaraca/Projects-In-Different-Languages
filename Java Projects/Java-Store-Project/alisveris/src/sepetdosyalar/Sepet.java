package sepetdosyalar;

import urunler.BaseUrun;

import java.util.ArrayList;
import java.util.List;

public class Sepet {

    List<BaseUrun> urunList = new ArrayList<>();

    private static Sepet instance;

    public static Sepet getInstance() {

        if (instance == null) {
            instance = new Sepet();
        }
        return instance;
    }

    public void urunEkle(BaseUrun urun) {
        this.urunList.add(urun);
    }

    public void urunCikar(int index) {
        this.urunList.remove(index);
    }

    public void urunfull() {
        this.urunList.removeAll(urunList);
    }

    public void show() {
        int toplam = 0;
        for (int i = 0; i < urunList.size(); i++) {
            System.out.println((i + 1) + "." + urunList.get(i).getName() + " - " + urunList.get(i).getFiyat() + " TL ");
            toplam += urunList.get(i).getFiyat();
        }
        System.out.println("Total sepet fiyatı: " + toplam);
    }

}


