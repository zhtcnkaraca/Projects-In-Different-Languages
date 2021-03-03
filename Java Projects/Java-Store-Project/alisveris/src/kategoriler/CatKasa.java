package kategoriler;

import urunler.*;

import java.util.ArrayList;
import java.util.List;

public class CatKasa extends BaseCategory{
    @Override
    public List<BaseUrun> getUrunler() {

        List<BaseUrun> urunList = new ArrayList<>();
        urunList.add(new UrPowerboost());
        urunList.add(new UrGametech());

        return urunList;
    }

    @Override
    public String getName() {
        return "Kasa";
    }
}
