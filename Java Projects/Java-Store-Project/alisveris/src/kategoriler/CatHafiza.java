package kategoriler;

import urunler.*;

import java.util.ArrayList;
import java.util.List;

public class CatHafiza extends BaseCategory{
    @Override
    public List<BaseUrun> getUrunler() {

        List<BaseUrun> urunList = new ArrayList<>();
        urunList.add(new UrSamsunghdd());
        urunList.add(new UrSamsungss2());
        urunList.add(new UrKingstonehdd());
        urunList.add(new UrKingstonesssd1());

        return urunList;
    }

    @Override
    public String getName() {
        return "Hafıza";
    }
}
