package urunler;

public class UrAmd extends BaseUrun {
    @Override
    public int getFiyat() {
        return 2500;
    }

    @Override
    public String getMarka() {
        return "Amd";
    }

    @Override
    public String getName() {
        return "Ryzen 7 2700x";
    }
}
