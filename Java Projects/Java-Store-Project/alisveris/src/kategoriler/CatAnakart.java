package kategoriler;

import urunler.BaseUrun;
import urunler.UrAsus;
import urunler.UrGigabyte;

import java.util.ArrayList;
import java.util.List;

public class CatAnakart extends BaseCategory {
    @Override
    public List<BaseUrun> getUrunler() {

        List<BaseUrun> urunList = new ArrayList<>();
        urunList.add(new UrGigabyte());
        urunList.add(new UrAsus());

        return urunList;
    }

    @Override
    public String getName() {
        return "Anakart";
    }
}
