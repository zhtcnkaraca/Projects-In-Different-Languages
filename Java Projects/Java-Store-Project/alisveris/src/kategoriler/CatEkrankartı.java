package kategoriler;

import urunler.*;

import java.util.ArrayList;
import java.util.List;

public class CatEkrankartı extends BaseCategory {
    @Override
    public List<BaseUrun> getUrunler() {

        List<BaseUrun> urunList = new ArrayList<>();
        urunList.add(new UrMsigtx1080());
        urunList.add(new UrAsusrogstrixrtx2080());

        return urunList;
    }

    @Override
    public String getName() {
        return "Ekran Kartı";
    }
}
