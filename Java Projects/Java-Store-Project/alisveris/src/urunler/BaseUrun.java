package urunler;

import com.company.Main;
import kategoriler.BaseCategory;
import sepetdosyalar.Sepet;

public abstract class BaseUrun {

    public abstract int getFiyat();

    public abstract String getMarka();

    public abstract String getName();


    public String getMensei() {
        return "TR";
    }

}
