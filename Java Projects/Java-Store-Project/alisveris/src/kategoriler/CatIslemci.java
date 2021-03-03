package kategoriler;

import urunler.*;

import java.util.ArrayList;
import java.util.List;

public class CatIslemci extends BaseCategory{
    @Override
    public List<BaseUrun> getUrunler() {

        List<BaseUrun> urunList = new ArrayList<>();
        urunList.add(new UrIntel());
        urunList.add(new UrAmd());

        return urunList;
    }

    @Override
    public String getName() {
        return "İşlemci";
    }
}
